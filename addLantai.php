<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("Location:login.php?pesan=belum_login");
}
include 'koneksi.php';
$id = $_SESSION['username'];
?>

<?php
include 'koneksi.php';
$username = $_SESSION['username'];
$user = mysqli_query($koneksi, "SELECT * FROM admin where username='$username'");
while ($data_users = mysqli_fetch_array($user)) {
    $nama = $data_users['nama'];
}
?>

<?php
include 'koneksi.php';
$asset = mysqli_query($koneksi, "SELECT * FROM lantai");
?>

<?php
include_once 'koneksi.php';

if (isset($_POST['add'])) {

    $idLantai = $_POST['idGedung'] . " - " . $_POST['namaLantai'];
    $idGedung = $_POST['idGedung'];
    $namaLantai = $_POST['namaLantai'];
    mysqli_query($koneksi, "INSERT INTO lantai VALUES('$idLantai','$idGedung',$namaLantai)");
    header("Location: rLantai.php");
}
?>

<?php
include_once 'koneksi.php';

if (isset($_POST['update'])) {

    $idLantai = $_POST['idLantai'];
    $idGedung = $_POST['idGedung'];
    $namaLantai = $_POST['namaLantai'];
    mysqli_query($koneksi, "UPDATE lantai set idGedung='$idGedung', namaLantai='$namaLantai' where  idLantai='$idLantai'");
    header("Location: rLantai.php");
}
?>

<?php
include 'koneksi.php';

if ($_GET['idLantai'] == 'y') {
    echo "";
    $cek = 0;
} else {
    $idLantai = $_GET['idLantai'];
    $lantai = mysqli_query($koneksi, "SELECT * FROM lantai where idLantai='$idLantai'");
    while ($data_lantai = mysqli_fetch_array($lantai)) {
        $idLantai = $data_lantai['idLantai'];
        $idGedung = $data_lantai['idGedung'];
        $namaLantai = $data_lantai['namaLantai'];
    }
    $cek = mysqli_num_rows($lantai);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3"><sup>Sistem Informasi</sup> Manajemen Aset</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Aset</span></a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAset" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Bagian Aset</span>
                </a>
                <div id="collapseAset" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="rPerangkat.php">Perangkat</a>
                        <a class="collapse-item" href="rGedung.php">Gedung</a>
                        <a class="collapse-item" href="rLantai.php">Lantai</a>
                        <a class="collapse-item" href="rRuangan.php">Ruangan</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

         
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="modal-header">
                            <div class="d-flex flex-column bd-highlight">
                                <?php
                                if ($cek > 0) {
                                    echo "
                                    <div class='bd-highlight'>
                                        <h1 class='h3 text-gray-800'>Edit Lantai</h1>
                                    </div>
                                    <div class='bd-highlight'>
                                        <p>Edit Lantai merupakan form untuk mengubah data Lantai yang sudah ada di sistem sebelumnya.</p>
                                    </div>";
                                } else {
                                    echo "
                                    <div class='bd-highlight'>
                                        <h1 class='h3 text-gray-800'>Tambah Lantai</h1>
                                    </div>
                                    <div class='bd-highlight'>
                                        <p>Tambah Lantai merupakan form untuk menambahkan data Lantai di sebuah gedung kedalam sistem.</p>
                                    </div>";
                                }
                                ?>
                            </div>
                        </div>
                        <form action="addLantai.php" method="POST" enctype="multipart/form-data">
                            <div class="form-floating mb-3 mt-3">
                                <div class="container">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <?php
                                                if ($cek > 0) {
                                                    echo "
                                                    <input type='text' name='idLantai' id='idLantai' class='form-control' value='$idLantai' placeholder='idLantai' disabled>
                                                    <input type='hidden' name='idLantai' id='idLantai' class='form-control' value='$idLantai' placeholder='ID Gedung'>
                                                    <label for='idLantai' class='align-self-center'>ID Lantai</label>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                        if ($cek > 0) {
                                            echo "<div class='col-6'>";
                                        } else {

                                            echo "<div class='col-12'>";
                                        }
                                        ?>
                                        <div class="form-floating">
                                            <?php
                                            if ($cek > 0) {
                                                echo "
                                                <select name='idGedung' class='form-select pt-2' aria-label='Default select example' disabled>
                                                <option selected>$idGedung</option>";
                                                echo "
                                                </select>";
                                                echo "<input type='hidden' name='idGedung' id='idGedung' class='form-control' value='$idGedung' placeholder='ID Gedung'>";
                                            } else {
                                                echo "
                                                <select name='idGedung' class='form-select pt-2' aria-label='Default select example'>
                                                <option selected>Pilih Nama Gedung</option>";
                                                $asset = mysqli_query($koneksi, "SELECT * FROM gedung");
                                                while ($data_asset = mysqli_fetch_array($asset)) {
                                                    echo "<option value='$data_asset[idGedung]'>$data_asset[namaGedung]</option>";
                                                }
                                                echo "
                                                </select>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <?php
                                            if ($cek > 0) {
                                                echo "
                                                    <input type='number' name='namaLantai' id='namaLantai' class='form-control' value='$namaLantai' placeholder='namaLantai'>
                                                    <label for='namaLantai' class='align-self-center'>Nama Lantai</label>";
                                            } else {
                                                echo "
                                                    <input type='number' name='namaLantai' id='namaLantai' class='form-control' placeholder='namaLantai'>
                                                    <label for='namaLantai' class='align-self-center'>Nama Lantai</label>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="rLantai.php"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button></a>
                        <?php
                        if ($cek > 0) {
                            echo "
                                    <input type='submit' name='update' value='Save' class='btn btn-primary'></input>";
                        } else {
                            echo "
                                    <input type='submit' name='add' value='Save' class='btn btn-primary'></input>";
                        }
                        ?>
                        <!-- Example single danger button -->

                    </div>
                    </form>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>