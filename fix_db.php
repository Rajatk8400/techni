<?php
require_once 'admin/includes/db.php';

try {
    // Check if email column exists in admins
    $stmt = $pdo->query("SHOW COLUMNS FROM admins LIKE 'email'");
    if (!$stmt->fetch()) {
        $pdo->exec("ALTER TABLE admins ADD COLUMN email VARCHAR(100) NOT NULL UNIQUE AFTER username");
        echo "Added email column.<br>";
    }

    // Check if role column exists in admins
    $stmt = $pdo->query("SHOW COLUMNS FROM admins LIKE 'role'");
    if (!$stmt->fetch()) {
        $pdo->exec("ALTER TABLE admins ADD COLUMN role ENUM('Admin', 'Manager', 'Employee') DEFAULT 'Admin' AFTER password");
        echo "Added role column.<br>";
    }

    echo "Database update complete! You can now delete this file.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>



