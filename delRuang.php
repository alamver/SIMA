<?php
include 'koneksi.php';
$idRuang = $_GET['idRuang'];
$result = mysqli_query($koneksi, "DELETE FROM ruangan WHERE idRuang='$idRuang'");
header("Location: rRuangan.php");
