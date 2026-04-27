<?php
require_once 'includes/db.php';

// AUTOMATIC DATABASE FIX: Add SEO columns if they don't exist
$cols_to_check = [
    'meta_title' => "ALTER TABLE blogs ADD COLUMN meta_title VARCHAR(255) AFTER title",
    'tags' => "ALTER TABLE blogs ADD COLUMN tags VARCHAR(255) AFTER category",
    'canonical_url' => "ALTER TABLE blogs ADD COLUMN canonical_url VARCHAR(255) AFTER meta_description"
];
foreach ($cols_to_check as $col => $sql) {
    $check = $pdo->query("SHOW COLUMNS FROM blogs LIKE '$col'");
    if (!$check->fetch()) { $pdo->exec($sql); }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: blogs.php?status=deleted");
    exit();
}

// Handle Add/Edit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $meta_title = $_POST['meta_title'];
    $slug = !empty($_POST['slug']) ? $_POST['slug'] : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    $content = $_POST['content'];
    $meta_description = $_POST['meta_description'];
    $canonical_url = $_POST['canonical_url'];
    $status = $_POST['status'];
    
    // Image Upload
    $featured_image = $_POST['existing_image'] ?? '';
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $target_dir = "../assets/img/blog/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
        
        $file_name = time() . '_' . basename($_FILES["featured_image"]["name"]);
        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file)) {
            $featured_image = "assets/img/blog/" . $file_name;
        }
    }

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update
        $stmt = $pdo->prepare("UPDATE blogs SET title=?, meta_title=?, slug=?, category=?, tags=?, content=?, featured_image=?, meta_description=?, canonical_url=?, status=? WHERE id=?");
        $stmt->execute([$title, $meta_title, $slug, $category, $tags, $content, $featured_image, $meta_description, $canonical_url, $status, $_POST['id']]);
        $msg = "updated";
    } else {
        // Insert
        $stmt = $pdo->prepare("INSERT INTO blogs (title, meta_title, slug, category, tags, content, featured_image, meta_description, canonical_url, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $meta_title, $slug, $category, $tags, $content, $featured_image, $meta_description, $canonical_url, $status]);
        $msg = "added";
    }
    header("Location: blogs.php?status=$msg");
    exit();
}

$stmt = $pdo->query("SELECT * FROM blogs ORDER BY id DESC");
$blogs = $stmt->fetchAll();

include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold">Blog Management (CMS)</h2>
            <p class="text-muted">Manage your SEO-optimized articles for NexGen Systems.</p>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blogModal" onclick="clearForm()">
                <i class="bi bi-plus-lg me-2"></i> Create New Post
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
                        <th class="ps-4">Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blogs as $blog): ?>
                    <tr>
                        <td class="ps-4"><img src="../<?php echo $blog['featured_image']; ?>" width="60" class="rounded"></td>
                        <td><strong><?php echo $blog['title']; ?></strong></td>
                        <td><?php echo $blog['category']; ?></td>
                        <td><span class="badge bg-<?php echo $blog['status'] == 'Published' ? 'success' : 'secondary'; ?>"><?php echo $blog['status']; ?></span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary me-2" onclick='editBlog(<?php echo json_encode($blog, JSON_HEX_APOS); ?>)'>
                                <i class="bi bi-pencil"></i>
                            </button>
                            <a href="blogs.php?delete=<?php echo $blog['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this blog?')">
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

<!-- Blog Modal -->
<div class="modal fade" id="blogModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="blog_id">
                <input type="hidden" name="existing_image" id="existing_image">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Create SEO Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Blog Title</label>
                                <input type="text" name="title" id="blog_title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Meta Title (SEO Title)</label>
                                <input type="text" name="meta_title" id="blog_meta_title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">URL Slug</label>
                                <input type="text" name="slug" id="blog_slug" class="form-control" placeholder="auto-generated-if-empty">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" id="blog_category" class="form-select">
                                    <option>Technology</option>
                                    <option>SEO</option>
                                    <option>Marketing</option>
                                    <option>Web Dev</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tags (Comma separated)</label>
                                <input type="text" name="tags" id="blog_tags" class="form-control" placeholder="seo, tech, web">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" id="blog_meta_desc" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Canonical URL</label>
                                <input type="text" name="canonical_url" id="blog_canonical" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" id="blog_content" class="form-control" rows="8" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Featured Image</label>
                                <input type="file" name="featured_image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" id="blog_status" class="form-select">
                                    <option value="Published">Published</option>
                                    <option value="Draft">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100 py-2">Save SEO Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function clearForm() {
    document.getElementById('blog_id').value = '';
    document.getElementById('blog_title').value = '';
    document.getElementById('blog_meta_title').value = '';
    document.getElementById('blog_slug').value = '';
    document.getElementById('blog_category').value = 'Technology';
    document.getElementById('blog_tags').value = '';
    document.getElementById('blog_content').value = '';
    document.getElementById('blog_meta_desc').value = '';
    document.getElementById('blog_canonical').value = '';
    document.getElementById('blog_status').value = 'Published';
    document.getElementById('modalTitle').innerText = 'Create SEO Post';
}

function editBlog(blog) {
    document.getElementById('blog_id').value = blog.id;
    document.getElementById('blog_title').value = blog.title;
    document.getElementById('blog_meta_title').value = blog.meta_title || '';
    document.getElementById('blog_slug').value = blog.slug;
    document.getElementById('blog_category').value = blog.category;
    document.getElementById('blog_tags').value = blog.tags || '';
    document.getElementById('blog_content').value = blog.content;
    document.getElementById('blog_meta_desc').value = blog.meta_description || '';
    document.getElementById('blog_canonical').value = blog.canonical_url || '';
    document.getElementById('blog_status').value = blog.status;
    document.getElementById('existing_image').value = blog.featured_image;
    document.getElementById('modalTitle').innerText = 'Edit SEO Post';
    new bootstrap.Modal(document.getElementById('blogModal')).show();
}
</script>

<?php include 'includes/footer.php'; ?>



