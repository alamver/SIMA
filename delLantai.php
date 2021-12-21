<?php
include 'koneksi.php';
$idLantai = $_GET['idLantai'];
$result = mysqli_query($koneksi, "DELETE FROM lantai WHERE idLantai='$idLantai'");
header("Location: rLantai.php");
