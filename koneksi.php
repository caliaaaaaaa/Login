<?php
$host = 'localhost';
$user = 'root';
$password = ''; // Ganti jika ada password
$database = 'multi_role_login';

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
