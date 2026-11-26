
<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Perpustakaan</title>
    <link rel="stylesheet" href="style.css?v=5">
</head>

<body class="halaman-login">

    <div class="login">

        <h2>Selamat Datang</h2>
        <p class="subtitle">Perpustakaan Digital</p>

        <?php
        if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') {
            echo "<p class='error'>Username atau password salah!</p>";
        }
        ?>

        <form action="proses_login.php" method="POST">

            <label>Username</label>
            <input type="text" name="username"
            placeholder="Masukkan username" required>

            <label>Password</label>
            <input type="password" name="password"
            placeholder="Masukkan password" required>

            <button type="submit" name="login">Login</button>

        </form>

        <p class="footer">Silakan masuk untuk melanjutkan.</p>

    </div>

</body>
</html>
