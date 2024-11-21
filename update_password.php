<?php
include 'koneksi.php';

$username = 'admin1'; // Ganti sesuai user
$newPassword = 'password_baru';

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$query = "UPDATE admin SET password='$hashedPassword' WHERE username='$username'";
if ($koneksi->query($query) === TRUE) {
    echo "Password berhasil diperbarui!";
} else {
    echo "Error: " . $koneksi->error;
}
?>
