<?php
include 'koneksi.php';

// Hash password admin
$usernameAdmin = '@admin1';
$plaintextPasswordAdmin = 'cimey';
$hashedPasswordAdmin = password_hash($plaintextPasswordAdmin, PASSWORD_DEFAULT);

$queryAdmin = "UPDATE admin SET password='$hashedPasswordAdmin' WHERE username='$usernameAdmin'";
if ($koneksi->query($queryAdmin) === TRUE) {
    echo "Password admin berhasil di-hash.<br>";
} else {
    echo "Error: " . $koneksi->error . "<br>";
}

// Hash password user
$usernameUser = '@user1';
$plaintextPasswordUser = 'cmy';
$hashedPasswordUser = password_hash($plaintextPasswordUser, PASSWORD_DEFAULT);

$queryUser = "UPDATE user SET password='$hashedPasswordUser' WHERE username='$usernameUser'";
if ($koneksi->query($queryUser) === TRUE) {
    echo "Password user berhasil di-hash.<br>";
} else {
    echo "Error: " . $koneksi->error . "<br>";
}
?>
