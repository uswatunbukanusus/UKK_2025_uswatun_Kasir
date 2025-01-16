<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'petugas') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Petugas Dashboard</title>
</head>
<body>
    <h1>Selamat datang, Petugas</h1>
    <ul>
        <li><a href="penjualan.php">Kelola Penjualan</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
