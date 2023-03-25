<?php
session_start();
include '../dbconnect.php';
if (!isset($_SESSION['log']) == "Logged") {
    header("location:../index.php");
}

// Menangkap add input
if (isset($_POST["addprogram"])) {
    $namaprogram = $_POST['namaprogram'];
    $deskripsi = $_POST['deskripsi'];

    $nama_file = $_FILES['gambar']['name'];
    $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
    $random = crypt($nama_file, time());
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "../program/" . $random . '.' . $ext;
    $pathdb = "program/" . $random . '.' . $ext;


    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" | $tipe_file == "image/jpg") {
        if ($ukuran_file <= 5000000) {
            if (move_uploaded_file($tmp_file, $path)) {

                $query = "insert into program (namaprogram, gambar, deskripsi)
          values('$namaprogram','$pathdb','$deskripsi')";
                $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

                if ($sql) {
                    echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                    <div class='alert alert-success text-right' role='alert'>
                    <h5>Data berhasil ditambahkan!!</h5>
                  </div>
                    ";
                } else {
                    // Jika Gagal, Lakukan :
                    echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal ditambahkan!!</h5>
                  </div>
                    ";
                }
            } else {
                // Jika gambar gagal diupload, Lakukan :
                echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal ditambahkan!! Ada masalah di upload gambar.</h5>
                  </div>
                    ";
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal ditambahkan!! Ukuran file terlalu besar.</h5>
                  </div>
                    ";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal ditambahkan!! Gambar harus diisi dan format file harus jpeg/jpg/png.</h5>
                  </div>
                    ";
    }
};

// Menangkap edit input
if (isset($_POST["editprogram"])) {
    if ($_FILES['gambar']) {
        $namaprogram = $_POST['namaprogram'];
        $deskripsi = $_POST['deskripsi'];
        $idprogram = $_POST['idprogram'];


        $nama_file = $_FILES['gambar']['name'];
        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
        $random = crypt($nama_file, time());
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $path = "../program/" . $random . '.' . $ext;
        $pathdb = "program/" . $random . '.' . $ext;


        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" | $tipe_file == "image/jpg") {
            if ($ukuran_file <= 5000000) {
                if (move_uploaded_file($tmp_file, $path)) {

                    $query = "UPDATE program SET namaprogram='$namaprogram', deskripsi='$deskripsi', gambar='$pathdb' WHERE idprogram='$idprogram'";
                    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

                    if ($sql) {
                        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                        <div class='alert alert-success text-right' role='alert'>
                        <h5>Data derhasil ditambahkan!!</h5>
                      </div>
                        ";
                    } else {
                        // Jika Gagal, Lakukan :
                        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                        <div class='alert alert-danger text-right' role='alert'>
                        <h5>Data gagal ditambahkan!!</h5>
                      </div>
                        ";
                    }
                } else {
                    // Jika gambar gagal diupload, Lakukan :
                    echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                        <div class='alert alert-danger text-right' role='alert'>
                        <h5>Data gagal ditambahkan!! Ada masalah di upload gambar.</h5>
                      </div>
                        ";
                }
            } else {
                // Jika ukuran file lebih dari 1MB, lakukan :
                echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                        <div class='alert alert-danger text-right' role='alert'>
                        <h5>Data gagal ditambahkan!! Ukuran file terlalu besar.</h5>
                      </div>
                        ";
            }
        } else {
            // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
            echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
                        <div class='alert alert-danger text-right' role='alert'>
                        <h5>Data gagal ditambahkan!! Gambar harus diisi dan format file harus jpeg/jpg/png.</h5>
                      </div>
                        ";
        }
    }
};

// Hapus program
if (isset($_GET["deleteprogram"])) {

    $idprogram = $_GET['idprogram'];

    $query = "DELETE FROM program WHERE idprogram='$idprogram'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
    <div class='alert alert-success text-right' role='alert'>
    <h5>Data berhasil dihapus!!</h5>
    </div>
    ";
    } else {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_program.php'>
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
    <title>Admin Panel - Kelola Program</title>
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
                                    <li class="active"><a href="kelola_program.php">Program Latihan</a></li>
                                    <li><a href="kelola_profil.php">Profil Dojang</a></li>
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
                                        <h4 class="header-title mb-0">Kelola Program Latihan</h4>
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
                                <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#add">Tambah Program Latihan</a>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr style="background-color: blue; color: white;">
                                            <th class="text-center" width="20px">No.</th>
                                            <th>Nama Program</th>
                                            <th>Deskripsi</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center" width="">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $program = mysqli_query($conn, "SELECT * from program order by idprogram ASC");
                                        $no = 1;
                                        while ($p = mysqli_fetch_array($program)) {

                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $p['namaprogram'] ?></td>
                                                <td><?= $p['deskripsi'] ?></td>
                                                <td class="text-center"><img title=" " alt=" " src="../<?php echo $p['gambar'] ?>" width="80px" height="80px" /></td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-sm btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $p['idprogram'] ?>" style="margin-bottom: 4px;"><i class="fa fa-pencil"></i></a>
                                                    <form action="kelola_program.php" method="GET">
                                                        <input type="hidden" name="idprogram" id="" value="<?= $p['idprogram'] ?>">
                                                        <button onclick="return confirm('Apakah anda yakin ingin menghapus ?')" type="submit" name="deleteprogram" class="btn btn-danger btn-sm btn-xs" style="margin-bottom: 4px;" value=""><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->


        <!-- Modal Add Program Latihan -->
        <div id="add" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Program</h4>
                    </div>

                    <div class="modal-body">
                        <form action="kelola_program.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Program Latihan</label>
                                <input name="namaprogram" type="text" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input name="deskripsi" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input name="gambar" type="file" class="form-control">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input name="addprogram" type="submit" class="btn btn-primary" value="Tambah">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Add Program Latihan -->

        <!-- Modal Edit Program Latihan -->
        <?php
        $program = mysqli_query($conn, "SELECT * from program order by idprogram ASC");
        while ($p = mysqli_fetch_array($program)) { ?>
            <div id="edit<?= $p['idprogram'] ?>" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Program</h4><br>
                        </div>

                        <div class="modal-body">
                            <h6>(Gambar harus diinput kembali)</h6><br>
                            <form action="kelola_program.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="idprogram" id="" value="<?= $p['idprogram'] ?>">
                                    <label>Nama Program Latihan</label>
                                    <input name="namaprogram" type="text" class="form-control" value="<?= $p['namaprogram'] ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input name="deskripsi" type="text" class="form-control" value="<?= $p['deskripsi'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input name="gambar" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <img src="../<?= $p['gambar'] ?>" width="100px" height="100px" alt="">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input name="editprogram" type="submit" class="btn btn-primary" value="Edit">
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