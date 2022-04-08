<?php
include '../connect/koneksi.php';
//sampai di tambah bab dan pasal.php
// bingung konsep penambahan field tabel secara dinamis menyesuaikan inputan user jumlah pasal per bab

session_start();

// include './proses/input_jumlah_pasal_per_b.php';
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




$select_bab = '1';
if (isset($_POST['submit'])) {
  $select_bab = $_POST['select_bab'];
  $select_bab = strval($select_bab);
  $judul_bab = $_POST['judul_bab'];
  $tz = 'Asia/Jakarta';
  $dt = new DateTime("now", new DateTimeZone($tz));
  $time = $dt->format('Y-m-d G:i:s');

  $input_sub_bab_sop = "INSERT INTO tb_sub_bab_sop(id_bab_utama_sop,id,urutan_sub_bab,judul_sub_bab,tanggal_pembuatan) VALUES ('$get_id_bab_utama_sop','$get_id','$select_bab','$judul_bab','$time')";

  if (mysqli_query($con, $input_sub_bab_sop)) {
    header("location: ../pages/sop_sub_bab.php?id=" . $get_id . "&id_bab_utama_sop=" . $get_id_bab_utama_sop . "&pesan=berhasil");
    // echo "<script>alert('Data berhasil di tambahkan!');</script>";
    // echo "return confirm('Berhasil Menambahkan Data.')";
  } else {
    // echo "<script>alert('Data gagal di tambahkan!');</script>" . mysqli_error($con);
    header("location: ../pages/sop_sub_bab.php?id=" . $get_id . "&id_bab_utama_sop=" . $get_id_bab_utama_sop . "&pesan=gagal");
  }
}
$selectedSel = '0';

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
  <!-- Theme style -->
  <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>

<body class="skin-black">
  <?php
  // if ($selected == "-- Pilih Bab --") {
  //   echo "Silahkan Pilih Bab.!";
  // }
  // elseif ($selected == 'BAB I') {
  //   # code...
  // }
  $bab_romawi = array(
    'BAB I',
    'BAB II',
    'BAB III',
    'BAB IV',
    'BAB V',
    'BAB VI',
    'BAB VII'
  );



  // Data isi select optioon jumlah bab
  $jumlah_pasal = array(
    '-- Pilih Jumlah Pasal --',
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
    '20',
    '21',
    '22',
    '23',
    '24',
    '25',
    '26',
    '27',
    '28',
    '29',
    '30'
  );

  $opsi_pasal = array('Tidak', 'Ya');
  ?>
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
              $result = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop JOIN tb_nama_uu USING(id) WHERE id_bab_utama_sop= '$get_id_bab_utama_sop'");
              while ($data = mysqli_fetch_array($result)) :
                // $db_nama_uu = $data['nama_uu'];
              ?>

                <div class="box-header">
                  <h3 class="box-title">Nama PP '<?= $data['nama_uu']; ?>'</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <div class="form-group row">
                    <span class="col-md-3">Bab Pembahasan</span>
                    <div class="col-md-9">
                      <select class="select form-control" id="bab_pembahasan" name="bab_pembahasan" disabled>
                        <option disabled selected><?= $data['judul_bab_utama_sop']; ?></option>
                      </select>
                      <input type="text" id="inp_bab_pembahasan" name="inp_bab_pembahasan" value="<?= $data['judul_bab_utama_sop']; ?>" disabled hidden>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span class="col-md-3">Urutan Bab Pembahasan</span>
                    <div class="col-md-9">
                      <select class="select form-control" id="urutan_bab_utama" name="urutan_bab_utama" disabled>
                        <option disabled selected><?= $data['urutan_bab_utama_sop']; ?></option>
                      </select>
                      <input type="text" id="inp_urutan_bab_utama" name="inp_urutan_bab_utama" value="<?= $data['urutan_bab_utama_sop']; ?>" disabled hidden>
                    </div>
                  </div>

                  <div class="form-group row">
                    <span class="col-md-3">Sub Bab Pembahasan</span>
                    <div class="col-md-9">
                      <?php
                      $sub_bab_utamaa = '0';
                      ?>
                      <select class="select form-control" id="sub_bab_utamaa" name="sub_bab_utamaa">
                        <option value="0">Tidak</option>
                        <option value="1">Ya</option>
                      </select>
                    </div>
                  </div>
                  <hr>

                  <div class="0 kotak" id="ktk" hidden>
                  <div class="box-header justify-content-between ml-auto">
                    <button type="button" class="btn btn-success pull-right" style="margin-top: 10px; margin-right: 8px;" id="hidetable" onclick="hideTable()" aria-pressed="true">
                      <i class="fa fa-eye"></i> Lihat Data Bab
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-top: 10px; margin-right: 8px;" id="unhidetable" onclick="unhideTable()" aria-pressed="true">
                      <i class="fa fa-plus"></i> Tambah Sub Bab
                    </button>
                  </div>
                  

                  <div class="box-body" id="forminp" style="display: none;">
                    <form action='../proses/tambah_sop_sub_bab_tanpa_sub_bab.php' method="POST">
                      <input type="number" id="id" name="id" value="<?=$get_id?>" readonly hidden>
                      <input type="number" id="id_bab_utama_sop" name="id_bab_utama_sop" value="<?=$get_id_bab_utama_sop?>" readonly hidden >
                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Dasar Hukum</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_dasar_hukum" name="txt_dasar_hukum" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Persyaratan</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_persyaratan" name="txt_persyaratan" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Biaya</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_biaya" name="txt_biaya" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Waktu</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_waktu" name="txt_waktu" rows="10" cols="80" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab">Keterangan</label>
                        <div class="col-md-9">
                          <textarea class="ckeditor col-md-8" id="txt_keterangan" name="txt_keterangan" rows="10" cols="80" required></textarea>
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

                  <div class="box-body table-responsive" id="tabel" style="display: none;">
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
                          $select_tb_pasal = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop_tanpa_sub_bab JOIN tb_nama_uu USING(id)  WHERE id_bab_utama_sop= '$get_id_bab_utama_sop'");
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
                                  $id_modal = $dt['id_bab_utama_sop_tanpa_sub_bab'];
                                  ?>
                                  <button data-toggle="modal" data-target="#exampleModal<?=$id_modal?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah</button>

                                  <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="../proses/hapus_sop_sub_bab_tanpa_sub_bab.php?id=<?= $dt['id']; ?>&id_bab_utama_sop=<?= $dt['id_bab_utama_sop']; ?>&id_bab_utama_sop_tanpa_sub_bab=<?= $dt['id_bab_utama_sop_tanpa_sub_bab']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>

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



                  <!-- Select option Ya -->
                  <div class="1 kotak" id="ktkk" hidden>
                    <div class="box-header justify-content-between ml-auto">
                      <button type="button" class="btn btn-primary pull-right" style="margin-top: 10px; margin-right: 10px;" data-toggle="modal" data-target="#exampleModala">
                        <i class="fa fa-plus"></i> Tambah Sub Bab
                      </button>
                    </div>

                    <div class="box-body table-responsive ">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead class="bg-maroon">
                          <tr>
                            <th class="text-center" width="50px">#</th>
                            <th class="text-center" width="150px">Urutan Pembahasan</th>
                            <th class="text-center">Sub Bab Pembahasan</th>
                            <th class="text-center" width="190px">Aksi</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php


                          $no = 1;
                          $select_tb_pasal = mysqli_query($con, "SELECT * FROM tb_sub_bab_sop JOIN tb_nama_uu USING(id)  WHERE id_bab_utama_sop= '$get_id_bab_utama_sop'");
                          if (mysqli_num_rows($select_tb_pasal) > 0) {
                            while ($dt = mysqli_fetch_array($select_tb_pasal)) {
                              $id_modal_edit = $dt['id_sub_bab_sop'];
                          ?>

                              <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $dt['urutan_sub_bab']; ?></td>
                                <td><?= $dt['judul_sub_bab']; ?></td>
                                <td class="text-center">
                                  <a href="../pages/sop_anak_sub_bab.php?id=<?= $data['id']; ?>&id_bab_utama_sop=<?= $data['id_bab_utama_sop']; ?>&id_sub_bab_sop=<?= $dt['id_sub_bab_sop'];?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                  
                                  <button data-toggle="modal" data-target="#editModalSubBab<?= $id_modal_edit ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah</button>

                                  <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="./proses/hapus_sop_sub_bab.php?id=<?= $dt['id']; ?>&id_bab_utama_sop=<?=$dt['id_bab_utama_sop']?>&id_sub_bab_sop=<?=$dt['id_sub_bab_sop']?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>

                                </td>
                              </tr>
                          <?php

                            }
                          } else {
                            // colspan adalah merge column, 6 adalah banyaknya kolom yang mau di merger
                            // klo rowspan adalah merge baris 
                            echo '
												<tr>
												<td colspan="6" class="text-center">Tidak ada data.</td>
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
  <div class="modal fade" id="exampleModala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="POST">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;
            </button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Sub Bab Pembahasan SOP</h4>

          </div>
          <div class="modal-body">
            <div class="control-group">
              <div class="form-group row">
                <label class="col-md-3" name="num_bab" id="num_bab"> Sub Bab </label>
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
                <label class="col-md-3" name="num_bab" id="num_bab">Judul Sub Bab </label>
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
  <div class="modal fade" id="exampleModal<?=$id_modal?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <?php
    $query_edit = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop_tanpa_sub_bab JOIN tb_nama_uu USING(id)  WHERE id_bab_utama_sop_tanpa_sub_bab = '$id_modal'");

    while ($data = mysqli_fetch_array($query_edit)) :
      // $id_modal = $data['id_bab_utama_sop_tanpa_sub_bab'];
    ?>

      <form action="../proses/edit_modal_bab_utama_sop_tanpa_sub_bab.php?id_bab_utama_sop_tanpa_sub_bab=<?=$id_modal?>" method="POST">
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


  <!-- Start Modal -->
  <div class="modal fade" id="editModalSubBab<?=$id_modal_edit?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php
    $bab_romawi_edit = array(
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

    $query_edit = mysqli_query($con, "SELECT * FROM tb_sub_bab_sop JOIN tb_nama_uu USING(id)  WHERE id_bab_utama_sop = '$get_id_bab_utama_sop' && id_sub_bab_sop = '$id_modal_edit'");

    while ($data_sop = mysqli_fetch_array($query_edit)) :
      $id_modal_edit = $data_sop['id_sub_bab_sop'];
    ?>

      <form action="../proses/edit_modal_sop_sub_bab.php?id_sub_bab_sop=<?=$id_modal_edit?>" method="POST">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Ubah Data</h4>

            </div>

            <div class="modal-body">
            <div class="control-group">
            <input type="hidden" id="txt_id_modal_sub_bab" name="txt_id_modal_sub_bab" value="<?= $get_id ?>" readonly>
                      <input type="hidden" id="txt_id_bab_utama_sop_modal_sub_bab" name="txt_id_bab_utama_sop_modal_sub_bab" value="<?= $get_id_bab_utama_sop ?>" readonly >
              <div class="form-group row">
                <label class="col-md-3" name="num_bab" id="num_bab"> Sub Bab </label>
                <div class="col-md-9">
                  <select class="select form-control" id="edit_select_bab" name="edit_select_bab" required>
                    <?php
                    foreach ($bab_romawi_edit as $key_bab_romawi_edit => $value_bab_romawi_edit) {
                      if ($value_bab_romawi_edit == $data_sop['urutan_sub_bab']) {
                        $selec = "selected";
                      }else{
                        $selec = "";
                      }
                      echo "<option value ='$value_bab_romawi_edit' $selec>$value_bab_romawi_edit</option>";
                      // echo '<option value="' . $value_bab_romawi_edit . '">' . $value_bab_romawi_edit . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3" name="num_bab" id="num_bab">Judul Sub Bab </label>
                <div class="col-md-9">
                  <input type="text" id="edit_judul_bab" name="edit_judul_bab" class="form-control" value="<?=$data_sop['judul_sub_bab']?>">
                  
                </div>
              </div>
              <input type="hidden" id="edit_tgl_bab_modal" name="edit_tgl_bab_modal" class="form-control" value="<?=$data_sop['tanggal_pembuatan']?>" readonly>
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


    // $(function() {
    //   $("#example1").dataTable();
    //   $('#example2').dataTable({
    //     "bPaginate": false,
    //     "bLengthChange": false,
    //     "bFilter": false,
    //     "bSort": true,
    //     "bInfo": true,
    //     "bAutoWidth": false
    //   });
    // });

    function hideTable() {
    
      var tabel = document.getElementById("tabel");
      var forminp = document.getElementById("forminp");
      if (tabel.style.display === "none") {

        tabel.style.display = "block";
        forminp.style.display = "none";

      } else {
        tabel.style.display = "none";
      }
    }

    function unhideTable() {
      var tabel = document.getElementById("tabel");
      var forminp = document.getElementById("forminp");
      if (forminp.style.display === "none") {
        forminp.style.display = "block";
        tabel.style.display = "none";


      } else {
        forminp.style.display = "none";
      }
    }


    // functione hide / show based select option
    // var selectedSel = '0';
    $('#ktk').show();
    $('#sub_bab_utamaa').on('change', function() {
      var selectedSel = $('#sub_bab_utamaa').val();
      // console.log(selectedSel);
      if ($(this).val() == 0) {
        $('#ktk').show();
        $('#ktkk').hide();
      } else {
        $('#ktk').hide();
        $('#ktkk').show();

      }
    });


    // event onchange untuk milih jumlah bab dengan select option 
    // $('.kotak').hide();
    //   $('#sub_bab_utama').change(function() {
    //     $('.kotak').hide();
    //     $('.' + $(this).val()).show();
    //   }).trigger('change');
    $(document).ready(function() {
      // $('.inp_bab').inp_bab()
      $('#inp_bab').on('change', function() {
        const selectedSelect = $('#inp_bab').val();
        // $('#myModal').modal('show');
        $('#sp').text(selectedSelect);
        $("#asp").val(selectedSelect);
      });
    });
  </script>


</body>

</html>