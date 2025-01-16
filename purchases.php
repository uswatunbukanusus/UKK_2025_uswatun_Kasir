<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Simulated database with an array
$purchases = [
    ['id' => 1, 'product_id' => 1, 'quantity' => 5, 'purchase_date' => '2023-10-01'],
    ['id' => 2, 'product_id' => 2, 'quantity' => 3, 'purchase_date' => '2023-10-02'],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembelian</title>
</head>
<body>
    <div class="container">
        <h2>Data Pembelian</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Produk</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pembelian</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchases as $p): ?>
                <tr>
                    <td><?php echo $p['id']; ?></td>
                    <td><?php echo $p['product_id']; ?></td>
                    <td><?php echo $p['quantity']; ?></td>
                    <td><?php echo $p['purchase_date']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>