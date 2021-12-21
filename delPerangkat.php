<?php
include 'koneksi.php';
$serialNumber = $_GET['serialNumber'];
$result = mysqli_query($koneksi, "DELETE FROM perangkat WHERE serialNumber='$serialNumber'");
header("Location: rPerangkat.php?");
