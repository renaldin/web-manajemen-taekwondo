<?php
session_start();
include '../dbconnect.php';
if (!isset($_SESSION['log']) == "Logged") {
    header("location:../index.php");
}

// Menangkap add input
if (isset($_POST["adduser"])) {
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO login (namalengkap, email, password, role)
          values('$namalengkap','$email','$password', '$role')";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

    if ($sql) {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_user.php'>
                    <div class='alert alert-success text-right' role='alert'>
                    <h5>Data berhasil ditambahkan!!</h5>
                  </div>
                    ";
    } else {
        // Jika Gagal, Lakukan :
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_user.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal ditambahkan!!</h5>
                  </div>
                    ";
    }
};

// Menangkap edit input
if (isset($_POST["edituser"])) {
    $userid = $_POST['userid'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "UPDATE login SET namalengkap='$namalengkap', email='$email', role='$role', password='$password' WHERE userid='$userid'";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

    if ($sql) {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_user.php'>
                    <div class='alert alert-success text-right' role='alert'>
                    <h5>Data berhasil diedit!!</h5>
                  </div>
                    ";
    } else {
        // Jika Gagal, Lakukan :
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_user.php'>
                    <div class='alert alert-danger text-right' role='alert'>
                    <h5>Data gagal diedit!!</h5>
                  </div>
                    ";
    }
};

// Hapus anak
if (isset($_GET["deleteuser"])) {

    $userid = $_GET['userid'];

    $query = "DELETE FROM login WHERE userid='$userid'";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_user.php'>
    <div class='alert alert-success text-right' role='alert'>
    <h5>Data berhasil dihapus!!</h5>
    </div>
    ";
    } else {
        echo "<br><meta http-equiv='refresh' content='5; URL=kelola_user.php'>
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
    <title>Admin Panel - Kelola User Admin</title>
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
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Taekwondo
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kelola_program.php">Program Latihan</a></li>
                                    <li><a href="kelola_profil.php">Profil Dojang</a></li>
                                    <li><a href="kelola_kepengurusan.php">Kepengurusan Dojang</a></li>
                                    <li><a href="kelola_anak.php">Data Latihan Anak</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="kelola_user.php"><i class="fa fa-user"></i><span>Kelola User Admin</span></a></li>
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
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Kelola User Admin</h4>
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
                                <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#add">Tambah User Admin</a>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr style="background-color: blue; color: white;">
                                            <th class="text-center" width="20px">No.</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th width="30px">Role</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody>
                                        <?php
                                        $user = mysqli_query($conn, "SELECT * from login order by userid ASC");
                                        $no = 1;
                                        while ($u = mysqli_fetch_array($user)) {

                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $u['namalengkap'] ?></td>
                                                <td><?= $u['email'] ?></td>
                                                <td><?= $u['role'] ?></td>
                                                <td class="text-center" width="120px">
                                                    <a href="" class="btn btn-sm btn-xs btn-success" data-toggle="modal" data-target="#edit<?= $u['userid'] ?>" style="margin-bottom: 4px;"><i class="fa fa-pencil"></i></a>
                                                    <form action="kelola_user.php" method="GET">
                                                        <input type="hidden" name="userid" id="" value="<?= $u['userid'] ?>">
                                                        <button onclick="return confirm('Apakah anda yakin ingin menghapus ?')" type="submit" name="deleteuser" class="btn btn-danger btn-sm btn-xs" style="margin-bottom: 4px;" value=""><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
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


        <!-- Modal Add User -->
        <div id="add" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data User</h4>
                    </div>

                    <div class="modal-body">
                        <form action="kelola_user.php" method="post">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input name="namalengkap" type="text" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" id="">
                                    <option value="">--Pilih Role--</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input name="adduser" type="submit" class="btn btn-primary" value="Tambah">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Add User -->

        <!-- Modal Edit User -->
        <?php
        $user = mysqli_query($conn, "SELECT * from login order by userid ASC");
        while ($u = mysqli_fetch_array($user)) { ?>
            <div id="edit<?= $u['userid'] ?>" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data User</h4>
                        </div>

                        <div class="modal-body">
                            <form action="kelola_user.php" method="post">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input name="userid" type="hidden" class="form-control" value="<?= $u['userid'] ?>">
                                    <input name="namalengkap" type="text" class="form-control" value="<?= $u['namalengkap'] ?>" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" value="<?= $u['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" value="<?= $u['password'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control" id="">
                                        <option value="<?= $u['role'] ?>"><?= $u['role'] ?></option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input name="edituser" type="submit" class="btn btn-primary" value="Edit">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- End Modal Edit User -->


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