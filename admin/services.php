<?php
require_once 'includes/db.php';
session_start();

// Force login
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// AUTOMATIC DATABASE FIX: Create services table if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    short_description TEXT,
    content TEXT,
    icon_image VARCHAR(255),
    status ENUM('Active', 'Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Handle Delete
if (isset($_GET['delete'])) {
    if ($_SESSION['role'] == 'Employee') {
        header("Location: services.php?error=unauthorized");
        exit();
    }
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: services.php?status=deleted");
    exit();
}

// Handle Add/Edit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $short_desc = $_POST['short_description'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    
    // Image Upload
    $icon_image = $_POST['existing_image'] ?? 'assets/img/icon/s-1.png';
    if (isset($_FILES['icon_image']) && $_FILES['icon_image']['error'] == 0) {
        $target_dir = "../assets/img/icon/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
        
        $file_name = time() . '_' . basename($_FILES["icon_image"]["name"]);
        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($_FILES["icon_image"]["tmp_name"], $target_file)) {
            $icon_image = "assets/img/icon/" . $file_name;
        }
    }

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update
        $stmt = $pdo->prepare("UPDATE services SET title=?, short_description=?, content=?, icon_image=?, status=? WHERE id=?");
        $stmt->execute([$title, $short_desc, $content, $icon_image, $status, $_POST['id']]);
        $msg = "updated";
    } else {
        // Insert
        $stmt = $pdo->prepare("INSERT INTO services (title, short_description, content, icon_image, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $short_desc, $content, $icon_image, $status]);
        $msg = "added";
    }
    header("Location: services.php?status=$msg");
    exit();
}

$stmt = $pdo->query("SELECT * FROM services ORDER BY id DESC");
$services = $stmt->fetchAll();

include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold">Services Management</h2>
            <p class="text-muted">Manage the services you offer to your clients.</p>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceModal" onclick="clearForm()">
                <i class="bi bi-plus-lg me-2"></i> Add New Service
            </button>
        </div>
    </div>

    <?php if(isset($_GET['status'])): ?>
        <div class="alert alert-success alert-dismissible fade show"><?php echo ucfirst($_GET['status']); ?> successfully! <button class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>

    <div class="card p-0 border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Icon</th>
                        <th>Service Title</th>
                        <th>Short Description</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $srv): ?>
                    <tr>
                        <td class="ps-4">
                            <div class="bg-light p-2 rounded d-inline-block">
                                <img src="../<?php echo $srv['icon_image']; ?>" width="35">
                            </div>
                        </td>
                        <td><strong><?php echo $srv['title']; ?></strong></td>
                        <td><small class="text-muted"><?php echo substr($srv['short_description'], 0, 60); ?>...</small></td>
                        <td><span class="badge bg-<?php echo $srv['status'] == 'Active' ? 'success' : 'secondary'; ?>"><?php echo $srv['status']; ?></span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary me-2" onclick='editService(<?php echo json_encode($srv, JSON_HEX_APOS); ?>)'>
                                <i class="bi bi-pencil"></i>
                            </button>
                            <a href="services.php?delete=<?php echo $srv['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this service?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($services)): ?>
                        <tr><td colspan="5" class="text-center py-4 text-muted">No services found. Add your first service!</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Service Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="service_id">
                <input type="hidden" name="existing_image" id="existing_image">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Service Title</label>
                        <input type="text" name="title" id="service_title" class="form-control" placeholder="e.g. Website Development" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Short Description (Shows on list)</label>
                        <textarea name="short_description" id="service_short_desc" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Content (Service Details Page)</label>
                        <textarea name="content" id="service_content" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Service Icon/Image</label>
                                <input type="file" name="icon_image" class="form-control">
                                <small class="text-muted">Best size: 64x64px (PNG/SVG)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" id="service_status" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100 py-2">Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function clearForm() {
    document.getElementById('service_id').value = '';
    document.getElementById('service_title').value = '';
    document.getElementById('service_short_desc').value = '';
    document.getElementById('service_content').value = '';
    document.getElementById('service_status').value = 'Active';
    document.getElementById('existing_image').value = '';
    document.getElementById('modalTitle').innerText = 'Add New Service';
}

function editService(srv) {
    document.getElementById('service_id').value = srv.id;
    document.getElementById('service_title').value = srv.title;
    document.getElementById('service_short_desc').value = srv.short_description;
    document.getElementById('service_content').value = srv.content;
    document.getElementById('service_status').value = srv.status;
    document.getElementById('existing_image').value = srv.icon_image;
    document.getElementById('modalTitle').innerText = 'Edit Service';
    new bootstrap.Modal(document.getElementById('serviceModal')).show();
}
</script>

<?php include 'includes/footer.php'; ?>



