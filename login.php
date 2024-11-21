<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $koneksi->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Cek di tabel admin
    $queryAdmin = "SELECT * FROM admin WHERE username='$username'";
    $resultAdmin = $koneksi->query($queryAdmin);

    if ($resultAdmin->num_rows > 0) {
        $admin = $resultAdmin->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            // Set session dan arahkan ke dashboard admin
            $_SESSION['role'] = 'admin';
            $_SESSION['username'] = $username;
            header("Location: admin_dashboard.php"); // Mengarahkan ke admin dashboard
            exit(); // Hentikan eksekusi lebih lanjut
        } else {
            $error = "Password admin salah!";
        }
    } else {
        $error = "Admin tidak ditemukan!";
    }

    // Cek di tabel user jika username tidak ditemukan di admin
    $queryUser = "SELECT * FROM user WHERE username='$username'";
    $resultUser = $koneksi->query($queryUser);

    if ($resultUser->num_rows > 0) {
        $user = $resultUser->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set session dan arahkan ke dashboard user
            $_SESSION['role'] = 'user';
            $_SESSION['username'] = $username;
            header("Location: user_dashboard.php"); // Mengarahkan ke user dashboard
            exit(); // Hentikan eksekusi lebih lanjut
        } else {
            $error = "Password user salah!";
        }
    } else {
        $error = "User tidak ditemukan!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Comic Sans MS', sans-serif;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ffefd5, #ffb6c1);
        }
        .container {
            max-width: 380px;
            width: 100%;
            padding: 20px;
        }
        .card {
            background-color: #fff9e9;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 25px;
            text-align: center;
            position: relative;
        }
        .card::before {
            content: '🐻';
            font-size: 50px;
            position: center;
            top: -35px;
            left: calc(50% - 25px);
            background: #ffb6c1;
            padding: 15px;
            border-radius: 50%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #ff6f61;
            font-size: 26px;
            margin-top: 25px;
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 14px;
            color: #ff6f9c;
            text-align: left;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            margin-bottom: 15px;
            border: 2px solid #ffcfda;
            border-radius: 30px;
            background-color: #fffaf0;
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.1);
        }
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #ff85a1;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .btn:hover {
            background-color: #ff5f80;
        }
        .error {
            color: #ff4d4d;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .footer-text {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h3 class="card-title">🌸 Welcome Back, Friend!</h3>

            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

            <form action="" method="POST">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>

                <button type="submit" name="login" class="btn">Let's Go!</button>
            </form>
            <p class="footer-text">Have a great day! 🌸</p>
        </div>
    </div>

</body>
</html>
