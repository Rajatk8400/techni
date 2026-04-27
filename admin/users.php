<?php
require_once 'includes/db.php';
session_start();

if ($_SESSION['role'] !== 'Admin') {
    header("Location: index.php");
    exit();
}
// Add authentication check here later - Only Admins should access this

// AUTOMATIC DATABASE FIX: Check if email/role columns exist
$check_email = $pdo->query("SHOW COLUMNS FROM admins LIKE 'email'");
if (!$check_email->fetch()) {
    $pdo->exec("ALTER TABLE admins ADD COLUMN email VARCHAR(100) NOT NULL UNIQUE AFTER username");
}
$check_role = $pdo->query("SHOW COLUMNS FROM admins LIKE 'role'");
if (!$check_role->fetch()) {
    $pdo->exec("ALTER TABLE admins ADD COLUMN role ENUM('Admin', 'Manager', 'Employee') DEFAULT 'Admin' AFTER password");
}

// Handle Add User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    try {
        $stmt = $pdo->prepare("INSERT INTO admins (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $role]);
        header("Location: users.php?status=added");
    } catch (PDOException $e) {
        $error = "Error adding user: " . $e->getMessage();
    }
}

// Handle Delete User
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM admins WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: users.php?status=deleted");
}

$stmt = $pdo->query("SELECT id, username, email, role, created_at FROM admins ORDER BY id DESC");
$users = $stmt->fetchAll();

include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold">User Management</h2>
            <p class="text-muted">Manage your team roles and access levels.</p>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-person-plus me-2"></i> Add New User
            </button>
        </div>
    </div>

    <?php if(isset($_GET['status'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            User <?php echo $_GET['status']; ?> successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><strong><?php echo $user['username']; ?></strong></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <span class="badge <?php 
                                    echo $user['role'] == 'Admin' ? 'bg-danger' : ($user['role'] == 'Manager' ? 'bg-primary' : 'bg-secondary'); 
                                ?>">
                                    <?php echo $user['role']; ?>
                                </span>
                            </td>
                            <td><?php echo date('M d, Y', strtotime($user['created_at'])); ?></td>
                            <td>
                                <a href="users.php?delete=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
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
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select">
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Employee">Employee</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_user" class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>



