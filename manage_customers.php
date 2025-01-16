<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Simulated database with an array
$customers = [
    ['id' => 1, 'name' => 'Pelanggan 1', 'email' => 'pelanggan1@example.com', 'phone' => '08123456789'],
    ['id' => 2, 'name' => 'Pelanggan 2', 'email' => 'pelanggan2@example.com', 'phone' => '08123456780'],
];

// Add customer
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = count($customers) + 1; // New ID
    $customers[] = ['id' => $id, 'name' => $name, 'email' => $email, 'phone' => $phone];
}

// Delete customer
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    foreach ($customers as $key => $value) {
        if ($value['id'] == $idToDelete) {
            unset($customers[$key]);
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
    <title>Kelola Pelanggan</title>
</head>
<body>
    <div class="container">
        <h2>Kelola Pelanggan</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Nama Pelanggan" required>
            <input type="email" name="email" placeholder="Email Pelanggan" required>
            <input type="text" name="phone" placeholder="Telepon Pelanggan" required>
            <button type="submit" name="add_customer">Tambah Pelanggan</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
 </thead>
            <tbody>
                <?php foreach ($customers as $c): ?>
                <tr>
                    <td><?php echo $c['id']; ?></td>
                    <td><?php echo $c['name']; ?></td>
                    <td><?php echo $c['email']; ?></td>
                    <td><?php echo $c['phone']; ?></td>
                    <td>
                        <a href="?delete=<?php echo $c['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>