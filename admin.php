<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        nav {
            margin: 20px 0;
        }
        ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        li {
            margin: 10px;
        }
        a {
            text-decoration: none;
            color: #35424a;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            background: #e2e2e2;
        }
        a:hover {
            background: #e8491d;
            color: #ffffff;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat datang, Admin</h1>
    </header>
    <div class="container">
        <h2>Profil Admin</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="profile_picture" accept="image/*" required>
            <button type="submit" name="upload">Upload Foto Profil</button>
        </form>
        <img src="path/to/profile_picture.jpg" alt="Profile Picture" class="profile-pic">
        
        <nav>
            <ul>
                <li><a href="manage_users.php"><i class="fas fa-users"></i> Kel ola Pengguna</a></li>
                <li><a href="manage_products.php"><i class="fas fa-box"></i> Kelola Produk</a></li>
                <li><a href="manage_customers.php"><i class="fas fa-user-friends"></i> Kelola Pelanggan</a></li>
                <li><a href="sales.php"><i class="fas fa-shopping-cart"></i> Data Penjualan</a></li>
                <li><a href="purchases.php"><i class="fas fa-receipt"></i> Data Pembelian</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>