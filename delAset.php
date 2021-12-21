<?php
include 'koneksi.php';
$serialNumber = $_GET['serialNumber'];
$result = mysqli_query($koneksi, "DELETE FROM aset WHERE serialNumber='$serialNumber'");
header("Location: index.php");
