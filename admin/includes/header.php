<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Force login if not logged in and not on the login page
if (!isset($_SESSION['id']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexGen Systems Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f7f6; margin: 0; padding: 0; }
        .wrapper { display: flex; align-items: stretch; width: 100%; }
        .sidebar { 
            width: 260px;
            min-width: 260px;
            background-color: #1a1d21;
            color: #fff;
            transition: all 0.3s;
            height: 100vh;
            position: sticky;
            top: 0;
        }
        .sidebar a { color: rgba(255,255,255,0.7); text-decoration: none; padding: 12px 20px; display: block; font-size: 0.9rem; }
        .sidebar a:hover { background-color: #2c3136; color: white; }
        .sidebar a.active { background-color: #913BFF; color: white; border-radius: 4px; margin: 5px 10px; }
        .main-content { 
            width: 100%;
            padding: 30px;
            min-height: 100vh;
        }
        @media (max-width: 992px) {
            .wrapper { flex-direction: column; }
            .sidebar { width: 100%; height: auto; position: relative; }
            .main-content { padding: 15px; }
        }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); border-radius: 10px; margin-bottom: 20px; }
        .fw-bold { color: #2c3e50; }
        .chart-container { position: relative; height: 300px; width: 100%; }
    </style>
</head>
<body>
<div class="wrapper">



