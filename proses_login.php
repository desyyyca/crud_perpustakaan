
<?php
session_start();

function login() {

    $username = "admin";
    $password = "12345";

    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == $username && $pass == $password) {

        $_SESSION['username'] = $user;

        header("Location: index.php");
        exit;

    } else {

        header("Location: login.php?pesan=gagal");
        exit;

    }
}

if (isset($_POST['login'])) {
    login();
}
?>
