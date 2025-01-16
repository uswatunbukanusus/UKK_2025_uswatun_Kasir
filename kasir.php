<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Simulated database with an array
$kasir = [
    ['id' => 1, 'nama' => 'Kasir 1', 'email' => 'kasir1@example.com'],
    ['id' => 2, 'nama' => 'Kasir 2', 'email' => 'kasir2@example.com'],
];

// Add cashier
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $id = count($kasir) + 1; // New ID
    $kasir[] = ['id' => $id, 'nama' => $nama, 'email' => $email];
}

// Delete cashier
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    foreach ($kasir as $key => $value) {
        if ($value['id'] == $idToDelete) {
            unset($kasir[$key]);
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
    <title>Kelola Kasir</title>
</head>
<body>
    <div class="container">
        <h2>Kelola Kasir</h2>
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama Kasir" required>
            <input type="email" name="email" placeholder="Email Kasir" required>
            <button type="submit" name="tambah">Tambah Kas ir</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kasir as $k): ?>
                <tr>
                    <td><?php echo $k['id']; ?></td>
                    <td><?php echo $k['nama']; ?></td>
                    <td><?php echo $k['email']; ?></td>
                    <td>
                        <a href="?delete=<?php echo $k['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kasir ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>