<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);

$sql = "select * from admin where password='$password' and username='$username'";

$query = mysqli_query($koneksi, $sql);

$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:index.php");
} else {
    header("location:login.php?pesan=gagal");
}
