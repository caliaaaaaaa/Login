<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Comic Sans MS', sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #f0e68c, #ffd1dc);
        }
        .container {
            width: 400px;
            padding: 20px;
            background-color: #fff9e9;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .header {
            font-size: 24px;
            color: #ff6f61;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .header img {
            width: 50px;
            height: 50px;
        }
        .welcome-message {
            color: #ff85a1;
            font-size: 20px;
            margin-bottom: 15px;
        }
        .description {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #ff85a1;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .logout-btn:hover {
            background-color: #ff6f61;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="https://img.icons8.com/cotton/64/000000/crown--v1.png" alt="Crown Icon">
            <h2>Admin Dashboard</h2>
        </div>
        <p class="welcome-message">Selamat datang, Admin <?php echo $_SESSION['username']; ?>! 🎉</p>
        <p class="description">Ini adalah halaman admin. Gunakan dengan bijak ya! 😊</p>
        <a href="logout.php" class="logout-btn">Logout 🚪</a>
        <p class="footer">Terima kasih telah menjadi bagian dari tim kami! 🌟</p>
    </div>

</body>
</html>
