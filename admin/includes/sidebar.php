<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar d-flex flex-column">
    <div class="text-center mb-4 pt-4 px-3">
        <img src="../assets/img/logo/nexgen_logo.png" alt="NexGen Logo" class="img-fluid mb-2" style="max-height: 50px;">
        <h5 class="fw-bold text-white mb-0">NexGen Systems</h5>
        <small class="text-muted text-uppercase tracking-wider" style="font-size: 0.7rem;">Admin Control Panel</small>
    </div>
    <div class="nav flex-column mb-auto">
        <a href="index.php" class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
            <i class="bi bi-speedometer2 me-3"></i> Dashboard
        </a>
        
        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Manager')): ?>
        <a href="clients.php" class="<?php echo $current_page == 'clients.php' ? 'active' : ''; ?>">
            <i class="bi bi-people me-3"></i> Clients
        </a>
        <a href="services.php" class="<?php echo $current_page == 'services.php' ? 'active' : ''; ?>">
            <i class="bi bi-laptop me-3"></i> Services
        </a>
        <a href="inquiries.php" class="<?php echo $current_page == 'inquiries.php' ? 'active' : ''; ?>">
            <i class="bi bi-envelope-paper me-3"></i> Inquiries
        </a>
        <?php endif; ?>

        <a href="blogs.php" class="<?php echo $current_page == 'blogs.php' ? 'active' : ''; ?>">
            <i class="bi bi-journal-text me-3"></i> Blogs CMS
        </a>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin'): ?>
        <a href="users.php" class="<?php echo $current_page == 'users.php' ? 'active' : ''; ?>">
            <i class="bi bi-shield-lock me-3"></i> Team
        </a>
        <?php endif; ?>

        <a href="settings.php" class="<?php echo $current_page == 'settings.php' ? 'active' : ''; ?>">
            <i class="bi bi-gear me-3"></i> Web Settings
        </a>
    </div>
    <div class="p-3">
        <a href="logout.php" class="text-danger border border-danger rounded text-center py-2 px-3">
            <i class="bi bi-box-arrow-right me-2"></i> Sign out
        </a>
    </div>
</div>
<div class="main-content">



