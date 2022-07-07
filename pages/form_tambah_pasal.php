<?php
error_reporting(0);
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
$get_id_pasal = 0;
$get_id_pasal = $_GET['id_pasal'];

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
  <?php

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



        <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Formulir Tambah Pasal</h3>
              </div><!-- /.box-header -->

              <?php
              if($get_id_pasal == 0){

                  $result = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id= '$get_id'");
                  while ($dt = mysqli_fetch_array($result)) {
                    $nama_uu_pasal = $dt['nama_uu'];
                  }
                  
                  $nomor_bab = '';
                  $judul_bab = '';
                  $nomor_urut_pasal = '';
                  $isi_pasal = '';

                    foreach ($bab_romawi as $key_bab_romawi => $value_bab_romawi) {
                      if ($value_bab_romawi != $nomor_bab) {
                        $selec = "";
                      }
                    }
 
                $route_process = 'simpan_pasal_serta_bab.php';

              }else if($get_id_pasal != 0){
                $query_edit_pasal = mysqli_query($con, "SELECT * from tb_pasal WHERE id_pasal = '$get_id_pasal'");
                while($data_pasal = mysqli_fetch_assoc($query_edit_pasal)){
                  $nomor_bab = $data_pasal['nomor_bab'];
                  $judul_bab = $data_pasal['judul_bab'];
                  $nomor_urut_pasal = $data_pasal['nomor_urut_pasal'];
                  $isi_pasal = $data_pasal['isi_pasal'];
                  $nama_uu_pasal = $data_pasal['nama_uu_pasal'];
                }
                $route_process = 'edit_pasal_serta_bab.php?id='.$get_id.'&id_pasal='.$get_id_pasal;

                foreach ($bab_romawi as $key_bab_romawi => $value_bab_romawi) {
                  if ($value_bab_romawi == $nomor_bab) {
                    $selec = "selected";
                  }
                }

              }
              ?>

              <div class="box-body">
                <hr>
                <form action="../proses/<?= $route_process ?>" id="form" method="POST">
                  <div class="form-group row">
                    
                      <span class="col-md-3">Nama Kumpulan UU</span>
                      <div class="col-md-9">
                        <input type="text" name="undang_undang_select" id="undang_undang_select" class="form-control" value="<?= $nama_uu_pasal ?>" required readonly>

                      </div>                    
                  </div>


                  <div class="form-group row">
                    <span class="col-md-3">BAB</span>
                    <div class="col-md-9">
                      <select class="select form-control" id="nomor_bab" name="nomor_bab" >
                        <?php
                        foreach ($bab_romawi as $key_bab_romawi => $value_bab_romawi) {
                          echo "<option value= '$value_bab_romawi' $selec >$value_bab_romawi</option>";
                        }
                        ?>
                        <option value="<?=$value_bab_romawi?>"><?=$value_bab_romawi?></option>
                      </select>
                      <!-- <input type="text" name="pilihan_bab" id="pilihan_bab" class="form-control" value="<?= $pilihan_bab; ?>" required readonly> -->
                    </div>
                    <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                  </div>

                  <div class="form-group row">
                    <span class="col-md-3">Nama Bab</span>
                    <div class="col-md-9">
                      <!-- <input type="text" name="title_bab<?= $i ?>" id="title_bab" class="form-control col-md-8" value="<?= $title_bab; ?>" required readonly> -->
                      <input type="text" name="title_bab" id="title_bab" class="form-control col-md-8" value="<?=$judul_bab?>" required>
                    </div>
                    <!-- <span class="col-md-8"><?= $title_bab; ?></span> -->
                  </div>

                  <div class="control-group inpGroup">


                    <!-- <div class="form-group text-center row justify-content-center">
                                                <div class="col">
                                                    <h4 name="num_bab" id="num_bab">Pasal <?= $i ?> </h4> <input type="text" name="judul_pasal<?= $i ?>" id="judul_pasal" class="form-control hidden" value="Pasal <?= $i ?>" required readonly>
                                                </div>

                                            </div> -->

                    <div class="form-group row">
                      <label class="col-md-3" name="num_bab" id="num_bab">No. Urut Pasal </label>
                      <div class="col-md-9">
                        <input type="number" class="form-control" id="no_urut_pasal" name="no_urut_pasal" value="<?=$nomor_urut_pasal?>" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3" name="num_bab" id="num_bab">Isi Pasal</label>
                      <div class="col-md-9">
                        <textarea class="ckeditor col-md-8" id="isi_pasal" name="isi_pasal" rows="10" cols="80" required><?= $isi_pasal ?></textarea>
                      </div>
                    </div>
                  </div>



                  <div class="form-group row">
                    <label class="col-md-3"></label>
                    <div class="col-md-9">
                      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Pasal</button> -->
                      <input type="submit" name="submit" id="submit" class="col btn btn-primary" value="Simpan">
                      <!-- <input type="hidden" name="get_jlh_psl" readonly id="get_jlh_psl" value="<?= $jlh_pasal; ?>"> -->
                    </div>
                  </div>
                </form>
              </div>
              <!--  </form> -->
            </div><!-- /.box body -->
          </div> <!-- /.box -->
        </div>

  </div>
  </section><!-- /.content -->
  </aside><!-- /.right-side -->
  </div><!-- ./wrapper -->

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

    // event onchange untuk milih jumlah bab dengan select option
    $(document).ready(function() {
      // $('.inp_bab').inp_bab()


      $('#inp_bab').on('change', function() {
        const selectedSelect = $('#inp_bab').val();
        // $('#myModal').modal('show');
        $('#sp').text(selectedSelect);
        $("#asp").val(selectedSelect);
      });

      //   $(document).ready(function() {
      //   $('.inp_pasal').inp_pasal()
      // });
      var z = "<?= $i ?>";
      $('#inp_pasal' + z).on('change', function() {
        const po = $('#inp_pasal' + z).val();
        $('#asb' + z).val(po);
        if (po == true) {
          var hsl = document.getElementById("pasal_tampil");
          hsl.innerHTML = "<input type='text' id='a' name='a' placeholder='ini pasal'>";
        }
        if (po == false) {
          hsl.innerHTML = "";
        }

      });

    });
  </script>


</body>

</html>