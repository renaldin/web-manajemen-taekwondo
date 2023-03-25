<?php
session_start();
include '../dbconnect.php';
if (!isset($_SESSION['log']) == "Logged") {
    header("location:../index.php");
}

// Menangkap edit input
if (isset($_POST["editprofil"])) {
    if ($_FILES['logo']) {
        $nama = $_POST['nama'];
        $berdiri = $_POST['berdiri'];
        $alamat = $_POST['alamat'];
        $id_profil = $_POST['id_profil'];


        $nama_file = $_FILES['logo']['name'];
        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
        $random = crypt($nama_file, time());
        $ukuran_file = $_FILES['logo']['size'];
        $tipe_file = $_FILES['logo']['type'];
        $tmp_file = $_FILES['logo']['tmp_name'];
        $path = "../profil/" . $random . '.' . $ext;
        $pathdb = "profil/" . $random . '.' . $ext;


        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" | $tipe_file == "image/jpg") {
            if ($ukuran_file <= 5000000) {
                if (move_uploaded_file($tmp_file, $path)) {

                    $query = "UPDATE profil SET nama='$nama', berdiri='$berdiri', alamat='$alamat', logo='$pathdb' WHERE id_profil='$id_profil'";
                    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

                    if ($sql) {
                        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_profil.php'>
                        <div class='alert alert-success text-right' role='alert'>
                        <h5>Data derhasil diupdate!!</h5>
                      </div>
                        ";
                    } else {
                        // Jika Gagal, Lakukan :
                        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_profil.php'>
                        <div class='alert alert-danger text-right' role='alert'>
                        <h5>Data gagal diupdate!!</h5>
                      </div>
                        ";
                    }
                } else {
                    // Jika gambar gagal diupload, Lakukan :
                    echo "<br><meta http-equiv='refresh' content='5; URL=kelola_profil.php'>
                        <div class='alert alert-danger text-right' role='alert'>
                        <h5>Data gagal diupdate!! Ada masalah di upload gambar.</h5>
                      </div>
                        ";
                }
            } else {
                // Jika ukuran file lebih dari 1MB, lakukan :
                echo "<br><meta http-equiv='refresh' content='5; URL=kelola_profil.php'>
                        <div class='alert alert-danger text-right' role='alert'>
                        <h5>Data gagal diupdate!! Ukuran file terlalu besar.</h5>
                      </div>
                        ";
            }
        } else {
            // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
            echo "<br><meta http-equiv='refresh' content='5; URL=kelola_profil.php'>
                        <div class='alert alert-danger text-right' role='alert'>
                        <h5>Data gagal diupdate!! Gambar harus diisi dan format file harus jpeg/jpg/png.</h5>
                      </div>
                        ";
        }
    }
};


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Panel - Kelola Profil Dojang</title>
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
                                    <li class="active"><a href="kelola_profil.php">Profil Dojang</a></li>
                                    <li><a href="kelola_kepengurusan.php">Kepengurusan Dojang</a></li>
                                    <li><a href="kelola_anak.php">Data Latihan Anak</a></li>
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
                                    <div class="icon"><i class="fa fa-product-hunt"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Kelola Profil Dojang</h4>
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
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $profil = mysqli_query($conn, "SELECT * from profil");
                                $no = 1;
                                while ($p = mysqli_fetch_array($profil)) {

                                ?>
                                    <a href="" class="btn btn-sm btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $p['id_profil'] ?>" style="margin-bottom: 4px;"><i class="fa fa-pencil"></i> Edit Profil</a>
                                    <div class="card-group">
                                        <div class="card">
                                            <center><img src="../<?= $p['logo'] ?>" width="60%" alt="Image Logo"></center>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Nama Perguruan : <?= $p['nama'] ?></h5>
                                                <p class="card-text">
                                                <table>
                                                    <tr>
                                                        <th width="120px">Tahun Berdiri</th>
                                                        <td width="20px">:</td>
                                                        <td><?= $p['berdiri'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td>:</td>
                                                        <td><?= $p['alamat'] ?></td>
                                                    </tr>
                                                </table>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->

        <!-- Modal Edit Program Latihan -->
        <?php
        $profil = mysqli_query($conn, "SELECT * from profil");
        while ($p = mysqli_fetch_array($profil)) { ?>
            <div id="edit<?= $p['id_profil'] ?>" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Profil</h4><br>
                        </div>

                        <div class="modal-body">
                            <h6>(Logo harus diinput kembali)</h6><br>
                            <form action="kelola_profil.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id_profil" id="" value="<?= $p['id_profil'] ?>">
                                    <label>Nama Perguruan</label>
                                    <input name="nama" type="text" class="form-control" value="<?= $p['nama'] ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Berdiri</label>
                                    <input name="berdiri" type="number" class="form-control" value="<?= $p['berdiri'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" id="" cols="30" rows="7"><?= $p['alamat'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input name="logo" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <img src="../<?= $p['logo'] ?>" width="100px" height="100px" alt="">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input name="editprofil" type="submit" class="btn btn-primary" value="Edit">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- End Modal Edit Program Latihan -->


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