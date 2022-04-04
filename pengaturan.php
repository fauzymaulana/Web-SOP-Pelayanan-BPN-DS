<?php
include './connect/koneksi.php';
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
    <a href="#" class="logo">
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
          <li class="active">
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
              <li><a href="lihatadmin.php"><i class="fa fa-angle-double-right"></i> Data Pengguna Admin</a></li>
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

      <!-- Main content -->
      <section class="content">

      <?php if (isset($_GET['pesan'])) { ?>
          <?php if ($_GET['pesan'] == "berhasil") { ?>
            <div class="alert alert-success show" role="alert">
              <label>Data <strong>Berhasil</strong> di proses.</label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php } elseif ($_GET['pesan'] == "gagal") { ?>
            <div class="alert alert-danger show" role="alert">
             <label> Data <strong>Gagal</strong> di prose!.</label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php } elseif ($_GET['pesan'] == "ukuranfile") { ?>
            <div class="alert alert-danger show" role="alert">
             <label> Ukuran file maks. <strong>2MB!</strong></label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php } elseif ($_GET['pesan'] == "atribut") { ?>
            <div class="alert alert-danger show" role="alert">
             <label> Atribut gambar harus  <strong>.png</strong> atau <strong>.jpg!</strong></label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php } elseif ($_GET['pesan'] == "dimensi") { ?>
            <div class="alert alert-danger show" role="alert">
             <label> Ukuran dimensi tidak sesuai</label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php } ?>
        <?php } ?>
        <!-- SAMPAI SINI, tinggal membuat parameter di header API nya -->


        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Profil Kantor</h3>
              </div><!-- /.box-header -->
              <!-- form start -->

              <?php
              $query_tampil = mysqli_query($con, "SELECT * FROM tb_profil_kantor ORDER BY id_profil_kantor DESC LIMIT 0,1");

              while ($data_kantor = mysqli_fetch_array($query_tampil)) :
                $id_kntr = $data_kantor['id_profil_kantor'];
              ?>
                <form role="form" action="./proses/tambah_profil_kantor.php?id_profil_kantor=<?= $id_kntr ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul profil</label>
                      <input type="text" class="form-control" name="judul_kantor" id="exampleInputEmail1" value="<?= $data_kantor['judul_profil_kantor'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Foto profil kantor*</label>
                      <input type="file" id="gambar_kantor" class="form-control" name="gambar_kantor" value="<?= $data_kantor['gambar_profil_kantor']['name']; ?>">
                      <p class="help-block">* file diwajibkan menggunakan ekstensi .png</p>
                      <p class="help-block">** dimensi gambar wajib berukuran: lebar 1000px X tinggi 1000px</p>
                      <img src="gambar/<?= $data_kantor['gambar_profil_kantor']; ?>" width="400px" height="400px">

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Deskripsi</label>
                      <textarea class="ckeditor" id="deskripsi_kantor" name="deskripsi_kantor"><?= $data_kantor['deskripsi_kantor'] ?></textarea>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                <?php
              endwhile;

                ?>
                </form>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box box-warning">
              <div class="box-header">
                <h3 class="box-title">Profil Penulis</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
              <?php
                $query_profil = mysqli_query($con, "SELECT * FROM tb_profil_penulis ORDER BY id_profil_penulis DESC LIMIT 0,1");

                while ($data_penulis = mysqli_fetch_array($query_profil)) :
                  $id_penulis = $data_penulis['id_profil_penulis'];
                ?>
                
                  <form role="form" action="./proses/tambah_profil_penulis.php?id_profil_penulis=<?= $id_penulis ?>" method="POST" enctype="multipart/form-data">
                  
                    <!-- text input -->
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" id="exampleInputFile" class="form-control" name="gambar_penulis" value="<?= $data_penulis['gambar_penulis']['name']; ?>">
                      <p class="help-block">* file diwajibkan menggunakan ekstensi .png</p>
                      <p class="help-block">** dimensi gambar wajib berukuran: lebar 177px X tinggi 236px</p>
                      <img src="gambar/penulis/<?= $data_penulis['gambar_penulis']; ?>" width="177px" height="236px">
                    </div>
                    <div class="form-group">
                      <label>Nama Penulis</label>
                      <input type="text" class="form-control" name="nama_penulis" value="<?=$data_penulis['nama_profil_penulis']?>"/>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="ckeditor" name="deksripsi_penulis"><?=$data_penulis['deskripsi_penulis']?></textarea>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                <?php
                endwhile;
                ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
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
  <!-- CK Editor -->
  <script src="./js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="./js/plugins/ckeditor/adapters/jquery.js" type="text/javascript"></script>

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