<?php
session_start();
include '../dbconnect.php';
if (!isset($_SESSION['log']) == "Logged") {
    header("location:../index.php");
}

// Menangkap add input
if (isset($_POST["addanak"])) {
    $namaanak = $_POST['namaanak'];
    $tingkat_sabuk = $_POST['tingkat_sabuk'];
    $perkembangan_latihan = $_POST['perkembangan_latihan'];

    $query = "insert into anak (namaanak, tingkat_sabuk, perkembangan_latihan)
          values('$namaanak','$tingkat_sabuk','$perkembangan_latihan')";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

    if ($sql) {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_anak.php'>
                    <div class='alert alert-success text-right' role='alert'>
                    <h5>Data berhasil ditambahkan!!</h5>
                  </div>
                    ";
    } else {
        // Jika Gagal, Lakukan :
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_anak.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal ditambahkan!!</h5>
                  </div>
                    ";
    }
};

// Menangkap edit input
if (isset($_POST["editanak"])) {
    $idanak = $_POST['idanak'];
    $namaanak = $_POST['namaanak'];
    $tingkat_sabuk = $_POST['tingkat_sabuk'];
    $perkembangan_latihan = $_POST['perkembangan_latihan'];

    $query = "UPDATE anak SET namaanak='$namaanak', tingkat_sabuk='$tingkat_sabuk', perkembangan_latihan='$perkembangan_latihan' WHERE idanak='$idanak'";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

    if ($sql) {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_anak.php'>
                    <div class='alert alert-success text-right' role='alert'>
                    <h5>Data berhasil diedit!!</h5>
                  </div>
                    ";
    } else {
        // Jika Gagal, Lakukan :
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_anak.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal diedit!!</h5>
                  </div>
                    ";
    }
};

// Hapus anak
if (isset($_GET["deleteanak"])) {

    $idanak = $_GET['idanak'];

    $query = "DELETE FROM anak WHERE idanak='$idanak'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_anak.php'>
    <div class='alert alert-success text-right' role='alert'>
    <h5>Data berhasil dihapus!!</h5>
    </div>
    ";
    } else {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_anak.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal dihapus!!</h5>
                  </div>
                    ";
    }
};


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Panel - Kelola Data Latihan Anak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><span>Home</span></a></li>
                            <li><a href="../"><i class="fa fa-sign-in"></i><span>Kembali ke Taekwondo</span></a></li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Taekwondo
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kelola_program.php">Program Latihan</a></li>
                                    <li><a href="kelola_profil.php">Profil Dojang</a></li>
                                    <li><a href="kelola_kepengurusan.php">Kepengurusan Dojang</a></li>
                                    <li class="active"><a href="kelola_anak.php">Data Latihan Anak</a></li>
                                </ul>
                            </li>
                            <li><a href="kelola_user.php"><i class="fa fa-user"></i><span>Kelola User Admin</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>

                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3>
                                    <div class="date">
                                        <script type='text/javascript'>
                                            <!--
                                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            var date = new Date();
                                            var day = date.getDate();
                                            var month = date.getMonth();
                                            var thisDay = date.getDay(),
                                                thisDay = myDays[thisDay];
                                            var yy = date.getYear();
                                            var year = (yy < 1000) ? yy + 1900 : yy;
                                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                            //
                                            -->
                                        </script></b>
                                    </div>
                                </h3>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- page title area end -->
            <div class="main-content-inner">


                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-child"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Kelola Data Latihan Anak</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- overview area end -->
                <!-- market value area start -->
                <div class="row mb-5" style="margin-top: -38px;">
                    <div class="col-12">
                        <div class="card-body">
                            <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#add">Tambah Data Latihan Anak</a>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr style="background-color: blue; color: white;">
                                        <th class="text-center" width="20px">No.</th>
                                        <th>Nama Anak</th>
                                        <th class="text-center">Tingkat Sabuk</th>
                                        <th>Perkembangan Latihan</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $anak = mysqli_query($conn, "SELECT * from anak order by idanak ASC");
                                    $no = 1;
                                    while ($a = mysqli_fetch_array($anak)) {

                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $a['namaanak'] ?></td>
                                            <td class="text-center"><?= $a['tingkat_sabuk'] ?></td>
                                            <td><?= $a['perkembangan_latihan'] ?></td>
                                            <td class="text-center" width="120px">
                                                <a href="" class="btn btn-sm btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $a['idanak'] ?>" style="margin-bottom: 4px;"><i class="fa fa-pencil"></i></a>
                                                <form action="kelola_anak.php" method="GET">
                                                    <input type="hidden" name="idanak" id="" value="<?= $a['idanak'] ?>">
                                                    <button onclick="return confirm('Apakah anda yakin ingin menghapus ?')" type="submit" name="deleteanak" class="btn btn-danger btn-sm btn-xs" style="margin-bottom: 4px;" value=""><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->

        <!-- Modal Add Data Latihan Anak -->
        <div id="add" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Latihan Anak</h4>
                    </div>

                    <div class="modal-body">
                        <form action="kelola_anak.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Anak</label>
                                <input name="namaanak" type="text" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Tingkat Sabuk</label>
                                <input name="tingkat_sabuk" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Perkembangan Latihan</label>
                                <textarea class="form-control" name="perkembangan_latihan" id="" cols="30" rows="5" required></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input name="addanak" type="submit" class="btn btn-primary" value="Tambah">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Add Data Latihan Anak -->

        <!-- Modal Add Data Latihan Anak -->
        <?php
        $anak = mysqli_query($conn, "SELECT * from anak order by idanak ASC");
        while ($a = mysqli_fetch_array($anak)) { ?>
            <div id="edit<?= $a['idanak'] ?>" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data Latihan Anak</h4>
                        </div>

                        <div class="modal-body">
                            <form action="kelola_anak.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input name="idanak" type="hidden" class="form-control" value="<?= $a['idanak'] ?>">
                                    <label>Nama Anak</label>
                                    <input name="namaanak" type="text" class="form-control" value="<?= $a['namaanak'] ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Tingkat Sabuk</label>
                                    <input name="tingkat_sabuk" type="text" class="form-control" value="<?= $a['tingkat_sabuk'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Perkembangan Latihan</label>
                                    <textarea class="form-control" name="perkembangan_latihan" id="" cols="30" rows="5" required><?= $a['perkembangan_latihan'] ?></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input name="editanak" type="submit" class="btn btn-primary" value="Edit">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- End Modal Add Data Latihan Anak -->

        <!-- footer area start-->
        <footer>
            <div class=" footer-area">
                <p>© 2021 Taekwondo. All rights reserved</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>