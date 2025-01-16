<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Simulated database with an array
$products = [
    ['id' => 1, 'name' => 'Produk 1', 'price' => 10000, 'stock' => 50],
    ['id' => 2, 'name' => 'Produk 2', 'price' => 20000, 'stock' => 30],
];

// Add product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $id = count($products) + 1; // New ID
    $products [] = ['id' => $id, 'name' => $name, 'price' => $price, 'stock' => $stock];
}

// Delete product
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    foreach ($products as $key => $value) {
        if ($value['id'] == $idToDelete) {
            unset($products[$key]);
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk</title>
</head>
<body>
    <div class="container">
        <h2>Kelola Produk</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Nama Produk" required>
            <input type="number" name="price" placeholder="Harga" required>
            <input type="number" name="stock" placeholder="Stok" required>
            <button type="submit" name="add_product">Tambah Produk</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                <tr>
                    <td><?php echo $p['id']; ?></td>
                    <td><?php echo $p['name']; ?></td>
                    <td><?php echo $p['price']; ?></td>
                    <td><?php echo $p['stock']; ?></td>
                    <td>
                        <a href="?delete=<?php echo $p['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>