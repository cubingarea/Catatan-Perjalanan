<?php

include('config.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$q = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$row = mysqli_fetch_array($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['foto'] = $row['foto'];

    header('location: ./user/index.php');
} else {
    header('location:login.php?error=4');
}
