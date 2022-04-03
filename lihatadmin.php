<?php
session_start();

if (!isset($_SESSION['email'])) {
  echo "<script>window.location='./index.php';alert('Anda harus login dulu!');</script>";

  exit;
}

$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- bootstrap 3.0.2 -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- font Awesome -->
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <!-- fullCalendar -->
  <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <!-- DATA TABLES -->
  <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
</head>

<body class="skin-black">
  <!-- header logo: style can be found in header.less -->
  <header class="header">
    <a href="index.php" class="logo">
      <!-- Add the class icon to your logo image or logo icon to add the margining -->
      Aplikasi Buku Saku
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-right">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-user"></i>
              <span><?= $_SESSION['nama']; ?> <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header bg-light-blue">
                <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                <p>
                  <?= $_SESSION['nama']; ?>

                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="./proses/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
          </div>
          <div class="pull-left info">
            <p>Hello, <?= $_SESSION['nama']; ?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li>
            <a href="dashboard.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li>
          <a href="pengaturan.php">
              <i class="fa fa-cogs"></i><span> Pengaturan</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Pengguna</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li  class="active"><a href="lihatadmin.php"><i class="fa fa-angle-double-right"></i> Data Pengguna Admin</a></li>
              <!-- <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                    <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li> -->
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-copy"></i>
              <span>Undang-Undang</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="empty.php"><i class="fa fa-angle-double-right"></i> Kumpulan Undang-Undang</a></li>
              <li><a href="lihat_sk.php"><i class="fa fa-angle-double-right"></i> Pembuatan SK</a></li>
              <!-- <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Pembuatan SOP</a></li>
              <li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
              <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li> -->
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Pengguna
          <small>Data Pengguna Admin</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Pengguna</a></li>
          <li class="active">Data Pengguna Admin</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Pengguna Admin</h3>
                <button type="button" class="btn btn-primary pull-right" style="margin-top: 8px; margin-right:8px" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-plus"></i> Tambah Data</button>
              </div><!-- /.box-header -->

              <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-olive">
                    <tr>
                      <th class="text-center" width="50px">#</th>
                      <th class="text-center">Nama Lengkap</th>
                      <th class="text-center" width="350px">Email</th>
                      <th class="text-center" width="200px">Tanggal Daftar</th>
                      <th class="text-center" width="100px">Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include './connect/koneksi.php';

                    $no = 1;
                    $data = mysqli_query($con, "SELECT * from tb_admin order by tanggal_daftar DESC");
                    while ($dt = mysqli_fetch_array($data)) {
                    ?>

                      <tr>
                        <!-- <?php $dtid = $dt['id']; ?> -->
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $dt['nama']; ?></td>
                        <td><?= $dt['email']; ?></td>
                        <td class="text-center"><?= $dt['tanggal_daftar']; ?></td>
                        <td class="text-center">

                          <a href="editadmin.php?id=<?= $dt['id']; ?>" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="ubah data pengguna"><i class="fa fa-pencil"></i></a>
                          <!-- <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#dataadmin<?= $dtid; ?>"><i class="fa fa-pencil"></i></button> -->
                          <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="./proses/hapus_adm.php?id=<?= $dt['id']; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="hapus data pengguna"><i class="fa fa-times"></i></a>

                        </td>
                      </tr>
                    <?php

                    }
                    ?>


                  </tbody>

                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
        </div>

        <!-- Modal tambah admin -->
        <div class="modal" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h4>
              </div>
              <form action="./proses/tambah_adm.php" method="POST">
                <!-- <form action="./proses/tambah_adm.php" method="POST"> -->
                <div class="modal-body">
                  <div class="container-fluid">

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="validationServer01">Nama Lengkap</label><span class="text-red">*</span></label>
                          <input type="text" class="form-control is-invalid" name="namamodal" id="validationServer01" placeholder="Nama Lengkap" required>
                          <!--  <div class="invalid-feedback">
                                    Masukkan nama lengkap.-->
                        </div>
                        <div class="form-group">
                          <label for="validationServer02">Email</label><span class="text-red">*</span></label>
                          <input type="email" class="form-control is-invalid" name="emailmodal" id="validationServer02" placeholder="Email" required>
                          <!-- <div class="invalid-feedback">
                                    Masukkan email.
                                </div> -->
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="validationServer03">Password</label><span class="text-red">*</span></label>
                        <input type="password" class="form-control is-invalid" name="passwmodal" id="validationServer03" placeholder="Password" required>
                        <input type="checkbox" id="a" onclick="myFunction()"> Lihat Password
                        <script>
                          function myFunction() {
                            var x = document.getElementById("validationServer03");
                            if (x.type === "password") {
                              x.type = "text";
                            } else {
                              x.type = "password";
                            }
                          }
                        </script>
                        <!-- <div class="invalid-feedback">
                            Masukkan password.
                        </div> -->
                      </div>
                      <div class="form-group">
                        <label for="validationServer04">Current Password</label><span class="text-red">*</span></label>
                        <input type="password" class="form-control is-invalid" name="cpasswmodal" id="validationServer04" placeholder="Current Password" required>
                        <!-- <div class="invalid-feedback">Masukkan current password.</div> -->
                      </div>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">

                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End modal tambah admin -->


        
</div>

</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
  $(function() {
    $("#example1").dataTable();
    $('#example2').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": false,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": false
    });
  });
</script>

</body>

</html>