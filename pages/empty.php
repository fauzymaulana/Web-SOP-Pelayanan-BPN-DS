<?php
session_start();

if (!isset($_SESSION['email'])) {
  echo "<script>window.location='../index.php';alert('Anda harus login dulu!');</script>";

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
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- font Awesome -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <!-- fullCalendar -->
  <link href="../css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <!-- DATA TABLES -->
  <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

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
                <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
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
                  <a href="../proses/logout.php" class="btn btn-default btn-flat">Sign out</a>
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
            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
          </div>
          <div class="pull-left info">
            <p>Hello, <?= $_SESSION['nama']; ?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li>
            <a href="../pages/dashboard.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li>
          <a href="../pages/pengaturan.php">
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
              <li><a href="../pages/lihatadmin.php"><i class="fa fa-angle-double-right"></i> Data Pengguna Admin</a></li>
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
              <li class="active"><a href="../pages/empty.php"><i class="fa fa-angle-double-right"></i> Kumpulan Undang-Undang</a></li>
              <li><a href="../pages/lihat_sk.php"><i class="fa fa-angle-double-right"></i> Pembuatan SK</a></li>
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
             <label> Data <strong>Gagal</strong> di proses!.</label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php } elseif ($_GET['pesan'] == "error") { ?>
            <div class="alert alert-danger show" role="alert">
             <label> Status <strong>Publish</strong> tidak boleh lebih dari 1.</label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php } ?>
        <?php } ?>

        <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <div class="box-header justify-content-between ml-auto">
                <h3 class="box-title">Data Kumpulan Undang-Undang</h3>
                <a href="../pages/empty2.php" class="btn btn-primary pull-right text-white" style="margin-top: 10px; margin-right: 8px;"><i class="fa fa-plus text-white"></i> Tambah Kumpulan UU</a>
              </div><!-- /.box-header -->

              <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-olive">
                    <tr>
                      <th class="text-center" width="40px">#</th>
                      <th class="text-center">Judul Kumpulan Undang-Undang</th>
                      <th class="text-center" width="150px">Tanggal Pembuatan</th>
                      <th class="text-center" width="70px">Status Tampil</th>
                      <th class="text-center" width="120px">Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../connect/koneksi.php';

                    $no = 1;
                    $data = mysqli_query($con, "SELECT * from tb_nama_uu order by tanggal_pembuatan DESC");
                    if (mysqli_num_rows($data) > 0) {
                      while ($dt = mysqli_fetch_array($data)) {
                        $id = $dt['id'];
                    ?>

                        <tr>
                          <td class="text-center"><?= $no++; ?></td>
                          <td><?= $dt['nama_uu']; ?></td>
                          <td class="text-center"><?= $dt['tanggal_pembuatan']; ?></td>
                          <?php
                          $status = $dt['status'];
                          if ($status === "Publish") {
                            $bg = "bg-green";
                          } else {
                            $bg = "bg-yellow";
                          }
                          ?>
                          <td class="stat text-center"><span class="badge justify-content-center <?= $bg ?>"><?= $status ?></span></td>
                          <td class="text-center">

                            <!-- <a href="lihat.php?id=<?= $dt['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</a> -->
                            <!-- <a href="edit.php?id=<?= $dt['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Ubah</a> -->
                            <button data-toggle="modal" data-target="#editModal<?=$id?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah</button>
                            <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="../proses/hapus_modal_nama_uu.php?id=<?= $dt['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>



                          </td>
                        </tr>
                    <?php

                      }
                    } else {
                      echo '
												<tr class="text-center">
												<td colspan="5">Tidak ada data.</td>
												</tr>
												';
                    }
                    ?>


                  </tbody>

                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="../proses/tambah_adm.php" method="POST">
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
  </div>

  </section><!-- /.content -->
  </aside><!-- /.right-side -->
  </div><!-- ./wrapper -->

  <!-- Start Modal Edit -->
  <div class="modal fade" id="editModal<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php
    $query_edit = mysqli_query($con, "SELECT * from tb_nama_uu WHERE id = '$id'");

    while ($data = mysqli_fetch_array($query_edit)) :
      $id = $data['id'];
    ?>

      <form action="../proses/edit_modal_kumpulan_uu.php?id=<?= $id ?>" method="POST">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Ubah Data</h4>

            </div>
            <div class="modal-body">
              <div class="control-group">
                <input type="number" id="txt_id_modal" name="txt_id_modal" value="<?= $id ?>" readonly hidden> 
                <?php
                  $status_select = array('Draft', 'Publish');
                  $status = 'Draft';
                  ?>

                <div class="form-group row">
                  <div class="col-md-3">
                    <label>Nama kump. UU</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="mod_nama_kumpulan_uu" class="form-control" value="<?=$data['nama_uu']?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3">
                    <label>Status Tampil</label>
                  </div>
                  <div class="col-md-9">
                  <input type="hidden" id="edit_tgl_nama_uu" name="edit_tgl_nama_uu" class="form-control" value="<?=$data['tanggal_pembuatan']?>" readonly>
                    <select class="select form-control" id="status" name="mod_status">
                      <?php
                      foreach ($status_select as $key_status_select => $value_status_select) {
                        if ($value_status_select == $data['status']) {
                          $selec = "selected";
                        }else{
                          $selec = "";
                        }
                        echo "<option value= '$value_status_select' $selec >$value_status_select</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
              </div>
            </div>
          </div>
      </form>
    <?php
    endwhile; ?>
  </div>

  <!-- End Modal -->

  <!-- jQuery 2.0.2 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <!-- DATA TABES SCRIPT -->
  <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

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