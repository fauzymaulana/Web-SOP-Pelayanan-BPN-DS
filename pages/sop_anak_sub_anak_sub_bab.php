<?php
include '../connect/koneksi.php';
session_start();

//akses session login
if (!isset($_SESSION['email'])) {
  // header('location:./index.php');
  echo "<script>window.location='../index.php';alert('Anda harus login dulu!');</script>";

  exit;
}
$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
//akhir akses session login

//get nama kumpulan uU
$get_id = $_GET['id'];
$get_id_bab_utama_sop = $_GET['id_bab_utama_sop'];
$get_id_sub_bab_sop = $_GET['id_sub_bab_sop'];
$get_id_anak_sub_bab_sop = $_GET['id_anak_sub_bab_sop'];
$get_id_sub_anak_sub_bab_sop = $_GET['id_sub_anak_sub_bab_sop'];

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>ATR/BPN</title>
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
  <!-- Theme style -->
  <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
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
              <li><a href="../pages/empty.php"><i class="fa fa-angle-double-right"></i> Kumpulan Undang-Undang</a></li>
              <li class="active"><a href="../pages/lihat_sk.php"><i class="fa fa-angle-double-right"></i> Pembuatan SK</a></li>

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
          <?php } ?>
        <?php } ?>

        <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <?php
              $result = mysqli_query($con, "SELECT * FROM tb_sub_anak_sub_bab_sop JOIN tb_nama_uu USING(id) JOIN tb_bab_utama_sop USING(id) JOIN tb_sub_bab_sop USING(id) JOIN tb_anak_sub_bab_sop USING(id)  WHERE tb_sub_anak_sub_bab_sop.id_sub_anak_sub_bab_sop='$get_id_sub_anak_sub_bab_sop' AND tb_bab_utama_sop.id_bab_utama_sop='$get_id_bab_utama_sop' AND tb_sub_bab_sop.id_sub_bab_sop= '$get_id_sub_bab_sop' AND tb_anak_sub_bab_sop.id_anak_sub_bab_sop='$get_id_anak_sub_bab_sop'");
              while ($data = mysqli_fetch_array($result)) :
                // $db_nama_uu = $data['nama_uu'];
              ?>

                <div class="box-header">
                  <h4 class="box-title" style="margin-top: 20px;">Nama PP '<?= $data['nama_uu']; ?>'</h4>
                </div><!-- /.box-header -->

                <hr>

                <div class="box-body">
                  <div class="form-group row">
                    <span class="col-md-1"></span>
                    <h5 class="col-md-1" style="text-align: right;"><?= $data['urutan_bab_utama_sop']; ?>.</h5>
                    <div class="col-md-6">
                      <h5><?= $data['judul_bab_utama_sop']; ?></h5>
                      <input type="text" id="judul_bab_utama" name="judul_bab_utama" value="<?= $data['judul_bab_utama_sop']; ?>" disabled hidden>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span class="col-md-2"></span>
                    <h5 class="col-md-1" style="width: 10px; margin-top: -10px;"><?= $data['urutan_sub_bab']; ?>.</h5>
                    <div class="col-md-6">

                      <h5 style="margin-top: -10px;"><?= $data['judul_sub_bab']; ?></h5>
                      <input type="text" id="inp_urutan_bab_utama" name="inp_urutan_sub_bab" value="<?= $data['judul_sub_bab']; ?>" disabled hidden>

                    </div>
                  </div>
                  <div class="form-group row">
                    <span class="col-md-2"></span>
                    <span class="col-md-1" style="width: 10px; margin-top: -10px;"> </span>
                    <h5 class="col-md-1" style=" width: 10px; margin-left: 30px; margin-top: -10px; text-align: left;"><?= $data['urutan_anak_sub_bab']; ?>.</h5>
                    <div class="col-md-6">

                      <h5 style="margin-top: -10px;"><?= $data['judul_anak_sub_bab']; ?></h5>
                      <input type="text" id="inp_urutan_bab_utama" name="inp_urutan_sub_bab" value="<?= $data['judul_anak_sub_bab']; ?>" disabled hidden>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span class="col-md-2"></span>
                    <!-- <span class="col-md-1"> </span> -->
                    <span class="col-md-1" style="width: 10px; margin-top: -10px;"> </span>
                    <h5 class="col-md-1" style=" width: 10px; margin-left: 60px; margin-top: -10px; text-align: left;"><?= $data['urutan_sub_anak_sub_bab']; ?>&#41;</h5>
                    <div class="col-md-6">

                      <h5 style="margin-top: -10px;"><?= $data['judul_sub_anak_sub_bab']; ?></h5>
                      <input type="text" id="inp_urutan_bab_utama" name="inp_urutan_sub_bab" value="<?= $data['judul_sub_anak_sub_anak_sub_bab']; ?>" disabled hidden>
                    </div>
                  </div>

                  <hr>
                  <div class="box-header justify-content-between ml-auto">
                    <button type="button" class="btn btn-success pull-right" style="margin-top: 10px; margin-right: 8px;" id="hidetable" onclick="hideTable()" aria-pressed="true">
                      <i class="fa fa-eye"></i> Lihat Data Bab
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-top: 10px; margin-right: 8px;" id="unhidetable" onclick="unhideTable()" aria-pressed="true">
                      <i class="fa fa-plus"></i> Tambah Sub Bab
                    </button>
                  </div>



                  <div class="0 kotak" id="ktk" style="display: none;">
                    <form action="../proses/tambah_sop_sub_anak_sub_anak_sub_bab_tanpa_sub_bab.php" method="POST">
                      <input type="number" id="txt_id_sub_bab" name="txt_id_sub_bab" value="<?= $get_id ?>" readonly hidden>
                      <input type="text" id="txt_id_bab_utama_sop_sub_bab" name="txt_id_bab_utama_sop_sub_bab" value="<?= $get_id_bab_utama_sop ?>" readonly hidden>
                      <input type="text" id="txt_id_sub_bab_sop_sub_bab" name="txt_id_sub_bab_sop_sub_bab" value="<?= $get_id_sub_bab_sop ?>" readonly hidden>
                      <input type="text" id="txt_id_anak_sub_bab_sop_sub_bab" name="txt_id_anak_sub_bab_sop_sub_bab" value="<?= $get_id_anak_sub_bab_sop ?>" readonly hidden>
                      <input type="text" id="txt_id_sub_anak_sub_bab_sop_sub_bab" name="txt_id_sub_anak_sub_bab_sop_sub_bab" value="<?= $get_id_sub_anak_sub_bab_sop ?>" readonly hidden>


                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Dasar Hukum</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_dasar_hukum_sub_bab" name="txt_dasar_hukum_sub_bab" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Persyaratan</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_persyaratan_sub_bab" name="txt_persyaratan_sub_bab" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Biaya</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_biaya_sub_bab" name="txt_biaya_sub_bab" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Waktu</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_waktu_sub_bab" name="txt_waktu_sub_bab" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab_sub_bab" id="num_bab_sub_bab">Keterangan</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_keterangan_sub_bab" name="txt_keterangan_sub_bab" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-9">
                          <input type="submit" name="submit" id="submit" class="col btn btn-primary" value="Simpan">
                        </div>
                      </div>
                    </form>
                  </div>


                  <div class="1 kotak" id="ktkk" style="display: none;">
                    <div class="box-body table-responsive ">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead class="bg-olive">
                          <tr>
                            <th class="text-center" width="50px">#</th>
                            <th class="text-center" width="150px">Dasar Hukum</th>
                            <th class="text-center">Persyaratan</th>
                            <th class="text-center">Biaya</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center" width="190px">Aksi</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php


                          $no = 1;
                          $select_tb_pasal = mysqli_query($con, "SELECT * FROM tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab JOIN tb_nama_uu USING(id)  WHERE id_sub_anak_sub_bab_sop= '$get_id_sub_anak_sub_bab_sop'");
                          if (mysqli_num_rows($select_tb_pasal) > 0) {
                            while ($dt = mysqli_fetch_array($select_tb_pasal)) {
                          ?>

                              <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $dt['dasar_hukum']; ?></td>
                                <td class="text-center"><?= $dt['persyaratan']; ?></td>
                                <td class="text-center"><?= $dt['biaya']; ?></td>
                                <td class="text-center"><?= $dt['waktu']; ?></td>
                                <td class="text-center"><?= $dt['keterangan']; ?></td>
                                <td class="text-center">

                                  <?php
                                  $id_modal = $dt['id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab'];
                                  ?>
                                  <button data-toggle="modal" data-target="#exampleModal<?= $id_modal ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah</button>

                                  <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="../proses/hapus_sop_anak_sub_anak_sub_bab.php?id=<?= $dt['id']; ?>&id_bab_utama_sop=<?= $dt['id_bab_utama_sop']; ?>&id_sub_bab_sop=<?= $dt['id_sub_bab_sop']; ?>&id_anak_sub_bab_sop=<?= $dt['id_anak_sub_bab_sop']; ?>&id_sub_anak_sub_bab_sop=<?= $dt['id_sub_anak_sub_bab_sop']; ?>&id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab=<?= $dt['id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>

                                </td>
                              </tr>
                          <?php

                            }
                          } else {
                            // colspan adalah merge column, 6 adalah banyaknya kolom yang mau di merger
                            // klo rowspan adalah merge baris 
                            echo '
												<tr>
												<td colspan="7" class="text-center">Tidak ada data.</td>
												</tr>
												';
                          }

                          ?>
                        </tbody>

                      </table>
                    </div><!-- /.box-body -->
                  </div>
                  <!-- akhir select option Ya -->


                </div><!-- /.box body -->
              <?php
              endwhile;
              ?>
            </div> <!-- /.box -->
          </div>

        </div>
      </section><!-- /.content -->
    </aside><!-- /.right-side -->
  </div><!-- ./wrapper -->


  <!-- Modal Tambah-->
  <?php
  $bab_romawi = array(
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    '10',
    '11',
    '12',
    '13',
    '14',
    '15',
    '16',
    '17',
    '18',
    '19',
    '20'
  );
  ?>
  <div class="modal fade" id="exampleModaltam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="POST">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;
            </button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Sub Anak Sub Bab Pembahasan SOP</h4>

          </div>
          <div class="modal-body">
            <div class="control-group">
              <div class="form-group row">
                <label class="col-md-3" name="num_bab" id="num_bab"> Sub Anak Sub Bab </label>
                <div class="col-md-9">
                  <select class="select form-control" id="select_bab" name="select_bab" required>
                    <?php
                    foreach ($bab_romawi as $key_bab_romawi => $value_bab_romawi) {
                      echo '<option value="' . $value_bab_romawi . '">' . $value_bab_romawi . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3" name="num_bab" id="num_bab">Judul </label>
                <div class="col-md-9">
                  <input type="text" id="judul_bab" name="judul_bab" class="form-control" required>
                </div>
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
  </div>
  <!-- End Modal -->

  <!-- Start Modal Edit -->
  <div class="modal fade" id="exampleModal<?= $id_modal ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php
    $query_edit = mysqli_query($con, "SELECT * FROM tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab JOIN tb_nama_uu USING(id)  WHERE id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab = '$id_modal'");

    while ($data = mysqli_fetch_array($query_edit)) :
      $id_modal = $data['id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab'];
    ?>

      <form action="../proses/edit_modal_anak_sub_anak_sub_bab_sop_tanpa_sub_bab.php?id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab=<?= $id_modal ?>" method="POST">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Ubah Data</h4>

            </div>
            <div class="modal-body">
              <div class="control-group">
                <input type="number" id="txt_id_modal" name="txt_id_modal" value="<?= $get_id ?>" readonly hidden>
                <input type="text" id="txt_id_bab_utama_sop_modal" name="txt_id_bab_utama_sop_modal" value="<?= $get_id_bab_utama_sop ?>" readonly hidden>
                <input type="text" id="txt_id_sub_bab_sop_modal" name="txt_id_sub_bab_sop_modal" value="<?= $get_id_sub_bab_sop ?>" readonly hidden>
                <input type="text" id="txt_id_anak_sub_bab_sop_modal" name="txt_id_anak_sub_bab_sop_modal" value="<?= $get_id_anak_sub_bab_sop ?>" readonly hidden>
                <input type="text" id="txt_id_sub_anak_sub_bab_sop_modal" name="txt_id_sub_anak_sub_bab_sop_modal" value="<?= $get_id_sub_anak_sub_bab_sop ?>" readonly hidden>
                <div class="form-group row">
                  <label class="col-md-3" name="num_bab" id="num_bab">Dasar Hukum</label>
                  <div class="col-md-9">
                    <textarea class="ckeditor col-md-8" id="txt_dasar_hukum_modal" name="txt_dasar_hukum_modal" rows="10" cols="80"><?= $data['dasar_hukum'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3" name="num_bab" id="num_bab">Persyaratan</label>
                  <div class="col-md-9">
                    <textarea class="ckeditor col-md-8" id="txt_persyaratan_modal" name="txt_persyaratan_modal" rows="10" cols="80"><?= $data['persyaratan'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3" name="num_bab" id="num_bab">Biaya</label>
                  <div class="col-md-9">
                    <textarea class="ckeditor col-md-8" id="txt_biaya_modal" name="txt_biaya_modal" rows="10" cols="80"><?= $data['biaya'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3" name="num_bab" id="num_bab">Waktu</label>
                  <div class="col-md-9">
                    <textarea class="ckeditor col-md-8" id="txt_waktu_modal" name="txt_waktu_modal" rows="10" cols="80"><?= $data['waktu'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3" name="num_bab_sub_bab" id="num_bab_sub_bab">Keterangan</label>
                  <div class="col-md-9">
                    <textarea class="ckeditor col-md-8" id="txt_keterangan_modal" name="txt_keterangan_modal" rows="10" cols="80"><?= $data['keterangan'] ?></textarea>
                    <input type="datetime" id="tanggal_modal" name="tanggal_modal" value="<?= $data['tanggal_pembuatan']; ?>" readonly hidden>
                  </div>
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

  <!-- add new calendar event modal -->
  <!-- jQuery 2.1.1 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <!-- DATA TABES SCRIPT -->
  <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
  <!-- CK Editor -->
  <script src="../js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="../js/plugins/ckeditor/adapters/jquery.js" type="text/javascript"></script>



  <!-- page script -->
  <script type="text/javascript">
    // $(window).on('load',function(){
    //   $('#myModal').modal('show');
    // });

    function hideTable() {
      var ktkk = document.getElementById("ktkk");
      var ktk = document.getElementById("ktk");
      if (ktkk.style.display === "none") {
        ktkk.style.display = "block";
        ktk.style.display = "none";

      } else {
        ktkk.style.display = "none";
      }
    }

    function unhideTable() {
      var ktkk = document.getElementById("ktkk");
      var ktk = document.getElementById("ktk");
      var hidetable = document.getElementById("hidetable");
      var unhidetable = document.getElementById("unhidetable");
      if (ktk.style.display === "none") {
        ktk.style.display = "block";
        ktkk.style.display = "none";


      } else {
        ktk.style.display = "none";
      }
    }
  </script>


</body>

</html>