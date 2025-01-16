<?php
$host = "localhost";       // Host server
$user = "root";            // Username database
$password = "";            // Password database
$dbname = "kasiruswa1";        // Nama database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Pesan jika koneksi berhasil (opsional, bisa dihapus jika tidak diperlukan)
// echo "Koneksi berhasil";
?>