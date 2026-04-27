<?php
require_once 'includes/db.php';
session_start();

if ($_SESSION['role'] == 'Employee') {
    header("Location: index.php");
    exit();
}

// Handle Add/Edit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_client'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service_opted'];
    $status = $_POST['status'];

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $stmt = $pdo->prepare("UPDATE clients SET name=?, email=?, phone=?, service_opted=?, status=? WHERE id=?");
        $stmt->execute([$name, $email, $phone, $service, $status, $_POST['id']]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO clients (name, email, phone, service_opted, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $service, $status]);
    }
    header("Location: clients.php?status=saved");
    exit();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: clients.php?status=deleted");
    exit();
}

$stmt = $pdo->query("SELECT * FROM clients ORDER BY id DESC");
$clients = $stmt->fetchAll();

include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold">Client Directory</h2>
            <p class="text-muted">Manage your business clients and their service status.</p>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clientModal" onclick="clearForm()">
                <i class="bi bi-person-plus me-2"></i> Add Client
            </button>
        </div>
    </div>

    <div class="card p-0 border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Client Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                    <tr>
                        <td class="ps-4"><strong><?php echo $client['name']; ?></strong></td>
                        <td><?php echo $client['email']; ?></td>
                        <td><?php echo $client['phone']; ?></td>
                        <td><?php echo $client['service_opted']; ?></td>
                        <td><span class="badge bg-<?php echo $client['status'] == 'Active' ? 'success' : 'secondary'; ?>"><?php echo $client['status']; ?></span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary me-2" onclick="editClient(<?php echo htmlspecialchars(json_encode($client)); ?>)">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <a href="clients.php?delete=<?php echo $client['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete client?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($clients)): ?>
                        <tr><td colspan="6" class="text-center py-4">No clients found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Client Modal -->
<div class="modal fade" id="clientModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="id" id="client_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add New Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Client Name</label>
                        <input type="text" name="name" id="client_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="client_email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" id="client_phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Service Opted</label>
                        <select name="service_opted" id="client_service" class="form-select">
                            <option>Website Development</option>
                            <option>SEO Services</option>
                            <option>Digital Marketing</option>
                            <option>Google Ads</option>
                            <option>Graphic Design</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" id="client_status" class="form-select">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_client" class="btn btn-primary w-100">Save Client</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function clearForm() {
    document.getElementById('client_id').value = '';
    document.getElementById('client_name').value = '';
    document.getElementById('client_email').value = '';
    document.getElementById('client_phone').value = '';
    document.getElementById('client_status').value = 'Active';
    document.getElementById('modalTitle').innerText = 'Add New Client';
}

function editClient(client) {
    document.getElementById('client_id').value = client.id;
    document.getElementById('client_name').value = client.name;
    document.getElementById('client_email').value = client.email;
    document.getElementById('client_phone').value = client.phone;
    document.getElementById('client_service').value = client.service_opted;
    document.getElementById('client_status').value = client.status;
    document.getElementById('modalTitle').innerText = 'Edit Client';
    new bootstrap.Modal(document.getElementById('clientModal')).show();
}
</script>

<?php include 'includes/footer.php'; ?>



