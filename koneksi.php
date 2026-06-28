<?php
$host = "localhost"; // Nama host, default 'localhost'
$user = "root"; // Username database Anda
$password = ""; // Password database Anda
$database = "desainweb"; // Nama database yang akan dihubungkan

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
echo "Koneksi ke database berhasil!";
?>