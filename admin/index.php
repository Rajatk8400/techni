<?php
require_once 'includes/db.php';
// Add authentication check here later
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold">Dashboard Overview</h2>
            <p class="text-muted">Welcome back, Admin!</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card p-3 border-start border-primary border-4">
                <div class="d-flex align-items-center">
                    <div class="fs-1 text-primary me-3"><i class="bi bi-people"></i></div>
                    <div>
                        <h5 class="card-title text-muted mb-0">Total Clients</h5>
                        <h3 class="fw-bold">12</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-start border-warning border-4">
                <div class="d-flex align-items-center">
                    <div class="fs-1 text-warning me-3"><i class="bi bi-envelope-paper"></i></div>
                    <div>
                        <h5 class="card-title text-muted mb-0">Pending Inquiries</h5>
                        <h3 class="fw-bold">8</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-start border-success border-4">
                <div class="d-flex align-items-center">
                    <div class="fs-1 text-success me-3"><i class="bi bi-journal-text"></i></div>
                    <div>
                        <h5 class="card-title text-muted mb-0">Published Blogs</h5>
                        <h3 class="fw-bold">15</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Chart -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card p-4 h-100">
                <h5 class="fw-bold mb-4">Monthly Sales & Revenue</h5>
                <div class="chart-container" style="height: 350px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card p-4 h-100">
                <h5 class="fw-bold mb-4">Recent Inquiries</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        John Doe <span class="badge bg-primary rounded-pill">New</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Sarah Smith <span class="badge bg-warning rounded-pill">Urgent</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Mike Ross <span class="badge bg-secondary rounded-pill">Read</span>
                    </li>
                </ul>
                <a href="inquiries.php" class="btn btn-outline-primary btn-sm mt-3">View All</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [12000, 19000, 15000, 25000, 22000, 30000],
                    borderColor: '#913BFF',
                    backgroundColor: 'rgba(145, 59, 255, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>

<?php include 'includes/footer.php'; ?>



