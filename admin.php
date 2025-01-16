<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Handle profile picture upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["profile_picture"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
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
            transition: background-color 0.3s;
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            color: #ffffff;
            font-weight: bold;
            padding: 15px 20px;
            border-radius: 5px;
            background: #e8491d;
            transition: background 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        a:hover {
            background: #35424a;
            transform: translateY(-2px);
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
            margin : 10px 0;
            transition: transform 0.3s;
        }
        .profile-pic:hover {
            transform: scale(1.1);
        }
        .upload-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .upload-btn:hover {
            background: #218838;
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
            <button type="submit" name="upload" class="upload-btn">Upload Foto Profil</button>
        </form>
        <img src="uploads/<?php echo isset($_FILES['profile_picture']) ? htmlspecialchars(basename($_FILES['profile_picture']['name'])) : 'default.jpg'; ?>" alt="Profile Picture" class="profile-pic">
        
        <nav>
            <ul>
                <li><a href="manage_users.php"><i class="fas fa-users"></i> Kelola Pengguna</a></li>
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