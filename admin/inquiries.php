<?php
require_once 'includes/db.php';
session_start();

if ($_SESSION['role'] == 'Employee') {
    header("Location: index.php");
    exit();
}

// Handle Status Update
if (isset($_GET['id']) && isset($_GET['status'])) {
    $stmt = $pdo->prepare("UPDATE inquiries SET status = ? WHERE id = ?");
    $stmt->execute([$_GET['status'], $_GET['id']]);
    header("Location: inquiries.php");
    exit();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM inquiries WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: inquiries.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM inquiries ORDER BY id DESC");
$inquiries = $stmt->fetchAll();

include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="container-fluid">
    <h2 class="fw-bold mb-4">Inquiries & Leads</h2>

    <div class="card p-0 border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inquiries as $inq): ?>
                    <tr>
                        <td class="ps-4"><?php echo date('M d, H:i', strtotime($inq['created_at'])); ?></td>
                        <td><strong><?php echo $inq['name']; ?></strong></td>
                        <td><?php echo $inq['email']; ?></td>
                        <td><small><?php echo substr($inq['message'], 0, 50); ?>...</small></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-<?php 
                                    echo $inq['status'] == 'New' ? 'danger' : ($inq['status'] == 'Read' ? 'primary' : ($inq['status'] == 'In Progress' ? 'warning' : 'success')); 
                                ?> dropdown-toggle" data-bs-toggle="dropdown">
                                    <?php echo $inq['status']; ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="inquiries.php?id=<?php echo $inq['id']; ?>&status=Read">Read</a></li>
                                    <li><a class="dropdown-item" href="inquiries.php?id=<?php echo $inq['id']; ?>&status=In Progress">In Progress</a></li>
                                    <li><a class="dropdown-item" href="inquiries.php?id=<?php echo $inq['id']; ?>&status=Closed">Closed</a></li>
                                </ul>
                            </div>
                        </td>
                        <td class="text-end pe-4">
                            <a href="inquiries.php?delete=<?php echo $inq['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete inquiry?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>



