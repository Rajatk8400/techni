<?php
require_once 'includes/db.php';

// Handle Banner Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_banner'])) {
    $page = $_POST['page_name'];
    $heading = $_POST['heading'];
    
    // Update Heading
    $stmt = $pdo->prepare("INSERT INTO site_config (page_name, section, setting_key, setting_value) 
                           VALUES (?, 'banner', 'heading', ?) 
                           ON DUPLICATE KEY UPDATE setting_value = ?");
    $stmt->execute([$page, $heading, $heading]);

    // Handle Image Upload
    if (isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] == 0) {
        $target_dir = "../assets/img/banners/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
        
        $file_name = $page . "_banner_" . time() . ".png";
        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_file)) {
            $img_path = "assets/img/banners/" . $file_name;
            $stmt = $pdo->prepare("INSERT INTO site_config (page_name, section, setting_key, setting_value) 
                                   VALUES (?, 'banner', 'image', ?) 
                                   ON DUPLICATE KEY UPDATE setting_value = ?");
            $stmt->execute([$page, $img_path, $img_path]);
        }
    }
    header("Location: settings.php?status=updated");
    exit();
}

// Fetch all settings
$stmt = $pdo->query("SELECT * FROM site_config");
$configs = [];
while ($row = $stmt->fetch()) {
    $configs[$row['page_name']][$row['setting_key']] = $row['setting_value'];
}

include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="container-fluid">
    <h2 class="fw-bold mb-4">Website Configuration</h2>

    <?php if(isset($_GET['status'])): ?>
        <div class="alert alert-success">Settings updated successfully!</div>
    <?php endif; ?>

    <div class="row g-4">
        <!-- HOME PAGE BANNER -->
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-house me-2"></i> Home Page Banner</h5>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="page_name" value="home">
                    <div class="mb-3">
                        <label class="form-label">Hero Heading</label>
                        <textarea name="heading" class="form-control" rows="2"><?php echo $configs['home']['heading'] ?? 'Grow Your Business with Website Development, SEO & Digital Marketing'; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banner Image</label>
                        <?php if(isset($configs['home']['image'])): ?>
                            <img src="../<?php echo $configs['home']['image']; ?>" class="img-fluid rounded mb-2 d-block" style="max-height: 100px;">
                        <?php endif; ?>
                        <input type="file" name="banner_image" class="form-control">
                    </div>
                    <button type="submit" name="update_banner" class="btn btn-primary w-100">Update Home Banner</button>
                </form>
            </div>
        </div>

        <!-- ABOUT PAGE BANNER -->
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-info-circle me-2"></i> About Page Banner</h5>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="page_name" value="about">
                    <div class="mb-3">
                        <label class="form-label">Banner Heading</label>
                        <input type="text" name="heading" class="form-control" value="<?php echo $configs['about']['heading'] ?? 'About Us'; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banner Image</label>
                        <?php if(isset($configs['about']['image'])): ?>
                            <img src="../<?php echo $configs['about']['image']; ?>" class="img-fluid rounded mb-2 d-block" style="max-height: 100px;">
                        <?php endif; ?>
                        <input type="file" name="banner_image" class="form-control">
                    </div>
                    <button type="submit" name="update_banner" class="btn btn-primary w-100">Update About Banner</button>
                </form>
            </div>
        </div>

        <!-- SERVICES PAGE BANNER -->
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-laptop me-2"></i> Services Page Banner</h5>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="page_name" value="services">
                    <div class="mb-3">
                        <label class="form-label">Banner Heading</label>
                        <input type="text" name="heading" class="form-control" value="<?php echo $configs['services']['heading'] ?? 'Our Services'; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banner Image</label>
                        <?php if(isset($configs['services']['image'])): ?>
                            <img src="../<?php echo $configs['services']['image']; ?>" class="img-fluid rounded mb-2 d-block" style="max-height: 100px;">
                        <?php endif; ?>
                        <input type="file" name="banner_image" class="form-control">
                    </div>
                    <button type="submit" name="update_banner" class="btn btn-primary w-100">Update Services Banner</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>



