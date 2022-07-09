<?php

include '../connect/koneksi.php';

session_start();

if (!isset($_SESSION['email'])) {
  echo "<script>window.location='../index.php';alert('Anda harus login dulu!');</script>";

  exit;
}

$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];


$get_id = $_GET['id'];


$select_bab = 'I';
if (isset($_POST['submit'])) {
  $select_bab = $_POST['select_bab'];
  $select_bab = strval($select_bab);
  $judul_bab = $_POST['judul_bab'];
  $tz = 'Asia/Jakarta';
  $dt = new DateTime("now", new DateTimeZone($tz));
  $time = $dt->format('Y-m-d G:i:s');

  $input_bab_sop = "INSERT INTO tb_bab_utama_sop(id,ada_sub_bab_bab_utama,urutan_bab_utama_sop,judul_bab_utama_sop,tanggal_pembuatan) VALUES ('$get_id','1','$select_bab','$judul_bab','$time')";

  if (mysqli_query($con, $input_bab_sop)) {
    header("location:../pages/sop_bab.php?id=" . $get_id . "&pesan=berhasil");
    // echo "<script>alert('Data berhasil di tambahkan!');</script>";
    // ;window.location:../pages/sop_bab.php?id=" . $get_id ."

  } else {

    header("location:../pages/sop_bab.php?id=" . $get_id . "&pesan=gagal");
    // echo "<script>alert('Data gagal di tambahkan!');</script>" . mysqli_error($con);
    // echo "Gagal";
  }
}


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
              <div class="box-header justify-content-between ml-auto">
                <?php
                $result = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id= '$get_id'");
                while ($dt = mysqli_fetch_array($result)) :
                  $db_nama_uu = $dt['nama_uu'];
                ?>
                  <h4 class="box-body">Data Kumpulan UU '<?= $dt['nama_uu'] ?>'</h4>



                  <!-- <a href="form_tambah_pasal.php?id=<?= $dt['id']; ?>" class="btn btn-primary pull-right" style="margin-top: 10px; margin-right: 8px;"><i class="fa fa-plus"></i> Tambah Pasal</a> -->
                <?php
                endwhile;
                ?>
                <button data-toggle="modal" data-target="#modalCreate" class="btn btn-primary pull-right" style="margin-top: 10px; margin-right: 8px;">
                  <i class="fa fa-plus"></i> Tambah Bab Utama
                </button>

              </div> <!-- /.box-header -->

              <div class="box-body table-responsive ">
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="bg-olive">
                    <tr>
                      <th class="text-center" width="50px">#</th>
                      <th class="text-center" width="120px">Urutan Pembahasan</th>
                      <th class="text-center">Bab Pembahasan Utama</th>
                      <th class="text-center" width="200px">Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php


                    $no = 1;
                    $select_tb_pasal = mysqli_query($con, "SELECT * from tb_bab_utama_sop JOIN tb_nama_uu USING(id) WHERE id = '$get_id' ORDER BY id_bab_utama_sop ASC");
                    if (mysqli_num_rows($select_tb_pasal) > 0) {
                      while ($data = mysqli_fetch_array($select_tb_pasal)) {
                        $id_bab_utama_sop = $data['id_bab_utama_sop'];
                    ?>

                        <tr>
                          <td class="text-center"><?= $no++; ?></td>
                          <td class="text-center"><?= $data['urutan_bab_utama_sop']; ?></td>
                          <td><?= $data['judul_bab_utama_sop']; ?></td>
                          <td class="text-center">
                            <a href="../pages/sop_sub_bab.php?id=<?= $data['id']; ?>&id_bab_utama_sop=<?= $data['id_bab_utama_sop']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</a>

                            <button data-toggle="modal" data-target="#modalEdit" class="btn btn-info btn-xs" data-id="<?= $data['id_bab_utama_sop']; ?>" data-nama="<?= $data['judul_bab_utama_sop']; ?>" data-urut="<?= $data['urutan_bab_utama_sop']; ?>" id="tombolUbah">
                              <i class="fa fa-pencil"></i> Ubah
                            </button>

                            <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="../proses/hapus_sop_bab.php?id=<?=$get_id?>&id_bab_utama_sop=<?=$id_bab_utama_sop?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>

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
            </div><!-- /.box -->
          </div>
        </div>

        <!-- Modal Tambah-->

        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="" method="POST">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;
                  </button>
                  <h4 class="modal-title" id="exampleModalLabel">Tambah Bab Pembahasan SOP</h4>
                </div>
                <?php
                $bab_romawi = array(
                  'I',
                  'II',
                  'III',
                  'IV',
                  'V',
                  'VI',
                  'VII',
                  'VIII',
                  'IX',
                  'X',
                  'XI',
                  'XII',
                  'XIII',
                  'XIV',
                  'XV'
                );
                ?>
                <div class="modal-body">
                  <div class="control-group">
                    <div class="form-group row">
                      <label class="col-md-3" name="num_bab" id="num_bab"> Bab </label>
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
                      <label class="col-md-3" name="num_bab" id="num_bab">Judul Bab </label>
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


        <!-- Modal Edit-->
        <?php
        $bab_romawi_edit = array(
          'I',
          'II',
          'III',
          'IV',
          'V',
          'VI',
          'VII',
          'VIII',
          'IX',
          'X',
          'XI',
          'XII',
          'XIII',
          'XIV',
          'XV'
        );
        ?>
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="../proses/edit_modal_sop_bab.php?id=<?=$get_id?>&id_bab_utama_sop=<?=$id_bab_utama_sop?>" method="POST">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;
                  </button>
                  <h4 class="modal-title" id="exampleModalLabel">Ubah Data Bab Pembahasan SOP</h4>
                </div>
                <?php
                $query_select = mysqli_query($con,"SELECT * FROM tb_bab_utama_sop WHERE id_bab_utama_sop = $id_bab_utama_sop");

                while ($data_edit_sop_bab = mysqli_fetch_array($query_select)) :
                ?>
                <div class="modal-body">
                  <div class="control-group">
                    <div class="form-group row">
                    <input type="number" id="id" name="txt_id_modal" readonly hidden>
                      <label class="col-md-3" name="num_bab" id="num_bab"> Bab </label>
                      <div class="col-md-9">
                        <select class="select form-control" id="select_bab_edit" name="select_bab_edit">
                          <?php
                          foreach ($bab_romawi_edit as $key_bab_romawi_edit => $value_bab_romawi_edit) {
                            if ($value_bab_romawi_edit == $data_edit_sop_bab['urutan_bab_utama_sop']) {
                              $selec = "selected";
                            }else{
                              $selec = "";
                            }
                            echo "<option value= '$value_bab_romawi_edit' $selec >$value_bab_romawi_edit</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3" name="num_bab" id="num_bab">Judul Bab </label>
                      <div class="col-md-9">
                        <input type="text" id="judul_bab_edit" name="judul_bab_edit" class="form-control" >
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                endwhile;
                ?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- End Modal -->

  </div>
  </div>
  </div>

  </section><!-- /.content -->
  </aside><!-- /.right-side -->
  </div><!-- ./wrapper -->

  <!-- add new calendar event modal -->


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
    // $(function() {
    //     $("#example1").dataTable();
    //     $('#example2').dataTable({
    //         "bPaginate": false,
    //         "bLengthChange": false,
    //         "bFilter": false,
    //         "bSort": true,
    //         "bInfo": false,
    //         "bAutoWidth": false
    //     });
    // });



    $(document).on('click', '#tombolUbah', function() {
      let id = $(this).data('id');
      let nama = $(this).data('nama');
      let nomor_urut = $(this).data('urut');

      $('.modal-body #id').val(id);
      $('.modal-body #select_bab_edit').val(nomor_urut);
      $('.modal-body #judul_bab_edit').val(nama);
    });
  </script>

</body>

</html>