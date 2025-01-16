<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Simulated database with an array
$sales = [
    ['id' => 1, 'product_id' => 1, 'customer_id' => 1, 'quantity' => 2, 'sale_date' => '2023-10-01'],
    ['id' => 2, 'product_id' => 2, 'customer_id' => 2, 'quantity' => 1, 'sale_date' => '2023-10-02'],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
</head>
<body>
    <div class="container">
        <h2>Data Penjualan</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Produk</th>
                    <th>ID Pelanggan</th>
                    <th>Jumlah</th>
                    <th>Tanggal Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $s): ?>
                <tr>
                    <td><?php echo $s['id']; ?></td>
                    <td><?php echo $s['product_id']; ?></td>
                    <td><?php echo $s['customer_id']; ?></td>
                    <td><?php echo $s['quantity']; ?></td>
                    <td><?php echo $s['sale_date']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>