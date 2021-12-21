<?php
include 'koneksi.php';
$asset = mysqli_query($koneksi, "SELECT aset.*,perangkat.*,ruangan.*,lantai.*,gedung.* FROM aset,perangkat,ruangan,lantai,gedung WHERE perangkat.serialNumber=aset.serialNumber AND ruangan.idRuang=aset.idRuang AND lantai.idLantai=ruangan.idLantai AND lantai.idGedung=gedung.idGedung");
?>

<?php
include_once 'koneksi.php';

if (isset($_POST['add'])) {

    $data_no = mysqli_query($koneksi, "SELECT * FROM aset");
    $no = mysqli_num_rows($data_no) + 1;
    $ikmn = $_POST['ikmn'];
    $idRuang = $_POST['idRuang'];
    $serialNumber = $_POST['serialNumber'];
    $kondisi = $_POST['kondisi'];
    $status = $_POST['status'];
    $pengadaan = $_POST['pengadaan'];
    $dipasang = $_POST['dipasang'];
    $keterangan = $_POST['keterangan'];
    mysqli_query($koneksi, "INSERT INTO aset VALUES($no,'$ikmn','$idRuang','$serialNumber','$kondisi','$status','$pengadaan','$dipasang','$keterangan')");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aset</title>
    <!-- <link href="#" rel="shortcut icon"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css" />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #fcfcfc;
            color: black;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #a1a1a1;
            color: white;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">Admin</a>
        <a href="#">Aplikasi</a>
        <a href="#">Aset</a>
        <a href="#">Gedung</a>
        <a href="#">Perangkat</a>
    </div>

    <div id="main">
        <div class="d-flex flex-column bd-highlight" style="height: 100%;">
            <div class="bd-highlight">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="me-3"></div>
                    <button class="openbtn" onclick="openNav()"><strong>☰</strong></button>
                    <div class="d-flex flex-row-reverse bd-highlight" style="width: 100%;">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split me-3" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                                <!-- <?php echo $name; ?> -->
                            </button>
                            <ul class="dropdown-menu">
                                <li> <a class="dropdown-item" href="rProfil.php"><i class="far fa-user-circle me-3" style="font-size: 20px;"></i> Profil</a></li>
                                <divide>
                                    <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-3" style="font-size: 20px;"></i> Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="p-2 bd-highlight mb-5">
                <div class="col align-self-center">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="d-flex flex-column bd-highlight align-items-stretch">
                                            <h3 class="card-title">Daftar Aset</h3>
                                            <div class="p-2 bd-highlight" style="height: 100%;">
                                                <div class="d-flex justify-content-center">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped">
                                                            <thead>
                                                                <th>No</th>
                                                                <th>IKMN</th>
                                                                <th>Serial Number</th>
                                                                <th>Kategori</th>
                                                                <th>Merk</th>
                                                                <th>Gedung</th>
                                                                <th>Lantai</th>
                                                                <th>Ruangan</th>
                                                                <th>Kondisi</th>
                                                                <th>Status</th>
                                                                <th>Garansi</th>
                                                                <th>Life Time</th>
                                                                <th>Pengadaan</th>
                                                                <th>Dipasang</th>
                                                                <th>Keterangan</th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $i = 1;
                                                                while ($data_asset = mysqli_fetch_array($asset)) {
                                                                    echo "<tr>";
                                                                    echo "<td>" . $i . "</td>";
                                                                    echo "<td>" . $data_asset['ikmn'] . "</td>";
                                                                    echo "<td>" . $data_asset['serialNumber'] . "</td>";
                                                                    echo "<td>" . $data_asset['kategori'] . "</td>";
                                                                    echo "<td>" . $data_asset['merk'] . "</td>";
                                                                    echo "<td>" . $data_asset['namaGedung'] . "</td>";
                                                                    echo "<td>" . $data_asset['namaLantai'] . "</td>";
                                                                    echo "<td>" . $data_asset['namaRuang'] . "</td>";
                                                                    echo "<td>" . $data_asset['kondisi'] . "</td>";
                                                                    echo "<td>" . $data_asset['status'] . "</td>";
                                                                    echo "<td>" . $data_asset['garansi'] . "</td>";
                                                                    echo "<td>" . $data_asset['lifeTime'] . "</td>";
                                                                    echo "<td>" . $data_asset['pengadaan'] . "</td>";
                                                                    echo "<td>" . $data_asset['dipasang'] . "</td>";
                                                                    echo "<td>" . $data_asset['keterangan'] . "</td>";
                                                                    echo "<td>
                                                    <div class='d-flex justify-content-evenly'>
												        <button class='btn btn-primary'><a class='p-2' style='color:White' href='addAset.php?serialNumber=$data_asset[serialNumber]'>Edit</a></button>
												        <button class='btn btn-danger'><a style='color:White' href='delAset.php?serialNumber=$data_asset[serialNumber]'>Delete</a></button>
                                                       
                                                    </div>
                                                </td>";
                                                                    echo "</tr>";
                                                                    $i = $i + 1;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#asetAdd">
                                                Tambah Asset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="https://unpkg.com/react/umd/react.production.min.js" crossorigin></script>

    <script src="https://unpkg.com/react-dom/umd/react-dom.production.min.js" crossorigin></script>

    <script src="https://unpkg.com/react-bootstrap@next/dist/react-bootstrap.min.js" crossorigin></script>

    <script>
        var Alert = ReactBootstrap.Alert;
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>