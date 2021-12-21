<?php
include 'koneksi.php';
$idGedung = $_GET['idGedung'];
$result = mysqli_query($koneksi, "DELETE FROM gedung WHERE idGedung='$idGedung'");
header("Location: rGedung.php?");
