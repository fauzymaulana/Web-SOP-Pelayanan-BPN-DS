<?php
//sampai di tambah bab dan pasal.php
// bingung konsep penambahan field tabel secara dinamis menyesuaikan inputan user jumlah pasal per bab
include './connect/koneksi.php';

session_start();

// include './proses/input_jumlah_pasal_per_b.php';

if (!isset($_SESSION['email'])) {
  // header('location:./index.php');
  echo "<script>window.location='./index.php';alert('Anda harus login dulu!');</script>";

  exit;
}

$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];



$get_id = $_GET['id'];
// $sql_sk_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id= '$get_id'");
// while ($data = mysqli_fetch_array($sql_sk_nama_uu)) {
//   $nama_uu = $data['nama_uu'];
// }

// $sql_sk_sk_pra_bab_nama_uu = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal WHERE nama_uu_bab = '$nama_uu'");
// while($dt = mysqli_fetch_array($sql_sk_sk_pra_bab_nama_uu)):
//   $nama_uu_pra_bab = $dt['nama_uu_bab'];

// if ($nama_uu === $nama_uu_pra_bab){
//   echo $dt['nama_pejabat_lembaga_instansi'];

// }
// endwhile;





// $sql_sk_bab = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id= '$get_id'");




// // post data modal box yang di lihat_bab.php
// $select_bab = 0;
// if (isset($_POST['submit'])) {
//   $select_bab = $_POST['select_bab'];
//   $select_bab   = strval($select_bab);
//   $title_bab = $_POST['title_bab'];
//   $input_jumlah_pasal = $_POST['input_jumlah_pasal']; 
//   $undang_undang_select_all = $_POST['undang_undang_select_all'];
// }


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
  <!-- <?php
        // Data isi select optioon jumlah bab
        $jumlah_bab = array(
          '-- Pilih Jumlah Bab --',
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
        ?> -->
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
            <a href="dashboard.php">
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
              <li class="active"><a href="lihat_sk.php"><i class="fa fa-angle-double-right"></i> Pembuatan SK</a></li>
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



        <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Formulir Atribut Surat Keterangan</h3>
              </div><!-- /.box-header -->

              <div class="box-body">
                <?php
                // $get_id = $_GET['id'];
                $result = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id= '$get_id'");
                while ($dt = mysqli_fetch_array($result)) {
                  $nama_uu = $dt['nama_uu'];
                }

                $sql_sk_sk_pra_bab_nama_uu = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal WHERE nama_uu_bab = '$nama_uu'");
                // while($dta = mysqli_fetch_array($sql_sk_sk_pra_bab_nama_uu)){ $nama_uu_pra_bab = $dta['nama_uu_bab'];}

                // echo $dt['nama_pejabat_lembaga_instansi'];
                // while($data = mysqli_fetch_array($sql_sk_sk_pra_bab_nama_uu)):
                //   $nama_uu_pra_bab = $dt['nama_uu_bab'];



                while ($data = mysqli_fetch_array($sql_sk_sk_pra_bab_nama_uu)) :
                  $nama_uu_pra_bab = $data['nama_uu_bab'];
                  if ($nama_uu === $nama_uu_pra_bab) {

                    // echo $data['nama_uu'];

                ?>
                    <hr>
                    <form action="./proses/tambah_lihat_sk_bab_pasal.php" id="form" method="POST">
                      <div class="form-group row">
                        <span class="col-md-3">Nama Kumpulan UU</span>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="nama_kumpulan_uu" id="nama_kumpulan_uu" value="<?= $data['nama_uu_bab']; ?>" required readonly>
                          <!-- <select class="select form-control" id="nama_kumpulan_uu" name="nama_kumpulan_uu" disabled>
                          <option disabled selected><?= $data['nama_uu']; ?></option>
                        </select> -->
                        </div>

                        <!-- <label class="col-md-8"><?= $undang_undang_select_all; ?></label> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Kepala Lembaga Intansi</span>
                        <div class="col-md-8">
                          <input type="text" name="kepala_lembaga_instansi" id="kepala_lembaga_instansi" value="<?= $data['kepala_lembaga_instansi']; ?>" class="form-control" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Nama Pejabat Lembaga Intansi</span>
                        <div class="col-md-8">
                          <input type="text" name="nama_pejabat_lembaga_instansi" id="nama_pejabat_lembaga_instansi" value="<?= $data['nama_pejabat_lembaga_instansi']; ?>" class="form-control" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Lokasi Pengesahan</span>
                        <div class="col-md-8">
                          <input type="text" name="lokasi_pengesahan" id="lokasi_pengesahan" class="form-control" value="<?= $data['lokasi_pengesahan']; ?>" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Tanggal Pengesahan</span>
                        <div class="col-md-8">
                          <input type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" class="form-control" value="<?= $data['tanggal_pengesahan']; ?>" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Menimbang</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="menimbang" name="menimbang" rows="10" cols="80" required><?= $data['menimbang']; ?></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Mengingat</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="mengingat" name="mengingat" rows="10" cols="80" required><?= $data['mengingat']; ?></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Menetapkan</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="menetapkan" name="menetapkan" rows="10" cols="80" required><?= $data['menetapkan']; ?></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $title_bab; ?></span> -->
                      </div>

                      <!-- <?php
                            // for ($i=1; $i <= $input_jumlah_pasal; $i++) { 

                            //
                            ?>

                       <div class="control-group inpGroup">
                        <hr>

                        <div class="form-group text-center row justify-content-center">
                          <div class="col">
                            <h4 name="num_bab" id="num_bab">Pasal <?= $i ?> </h4> <input type="text" name="judul_pasal<?= $i ?>" id="judul_pasal" class="form-control hidden" value="Pasal <?= $i ?>" required readonly>
                          </div>
                          
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3" name="num_bab" id="num_bab">Isi Pasal <?= $i ?> </label> 
                          <div class="col-md-9">
                            <textarea class="ckeditor col-md-8" id="isi_pasal" name="isi_pasal<?= $i ?>" rows="10" cols="80" required></textarea>
                          </div>
                        </div>
                      </div>

                      <?php
                      // }
                      ?> -->

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab"></label>
                        <div class="col-md-9">
                          <input type="submit" name="submit" id="submit" class="col btn btn-primary" value="Simpan">
                          <!-- <input type="text" name="get_jlh_psl" readonly id="get_jlh_psl" value="<?= $input_jumlah_pasal; ?>"> -->
                        </div>
                      </div>
                    </form>
                  <?php
                  } elseif ($nama_uu !== $nama_uu_pra_bab) {
                  ?>
                    <form action="./proses/tambah_lihat_sk_bab_pasal.php" id="form" method="POST">
                      <div class="form-group row">
                        <span class="col-md-3">Nama Kumpulan UU</span>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="nama_kumpulan_uu" id="nama_kumpulan_uu" required readonly>
                          <!-- <select class="select form-control" id="nama_kumpulan_uu" name="nama_kumpulan_uu" disabled>
                          <option disabled selected><?= $data['nama_uu']; ?></option>
                        </select> -->
                        </div>

                        <!-- <label class="col-md-8"><?= $undang_undang_select_all; ?></label> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Kepala Lembaga Intansi</span>
                        <div class="col-md-8">
                          <input type="text" name="kepala_lembaga_instansi" id="kepala_lembaga_instansi"  class="form-control" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Nama Pejabat Lembaga Intansi</span>
                        <div class="col-md-8">
                          <input type="text" name="nama_pejabat_lembaga_instansi" id="nama_pejabat_lembaga_instansi" class="form-control" required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Lokasi Pengesahan</span>
                        <div class="col-md-8">
                          <input type="text" name="lokasi_pengesahan" id="lokasi_pengesahan" class="form-control"  required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Tanggal Pengesahan</span>
                        <div class="col-md-8">
                          <input type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" class="form-control"  required>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Menimbang</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="menimbang" name="menimbang" rows="10" cols="80" required></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Mengingat</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="mengingat" name="mengingat" rows="10" cols="80" required></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $select_bab; ?></span> -->
                      </div>

                      <div class="form-group row">
                        <span class="col-md-3">Menetapkan</span>
                        <div class="col-md-8">
                          <textarea class="ckeditor" id="menetapkan" name="menetapkan" rows="10" cols="80" required></textarea>
                        </div>
                        <!-- <span class="col-md-8"><?= $title_bab; ?></span> -->
                      </div>

                      <!-- <?php
                            // for ($i=1; $i <= $input_jumlah_pasal; $i++) { 

                            //
                            ?>

                       <div class="control-group inpGroup">
                        <hr>

                        <div class="form-group text-center row justify-content-center">
                          <div class="col">
                            <h4 name="num_bab" id="num_bab">Pasal <?= $i ?> </h4> <input type="text" name="judul_pasal<?= $i ?>" id="judul_pasal" class="form-control hidden" value="Pasal <?= $i ?>" required readonly>
                          </div>
                          
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3" name="num_bab" id="num_bab">Isi Pasal <?= $i ?> </label> 
                          <div class="col-md-9">
                            <textarea class="ckeditor col-md-8" id="isi_pasal" name="isi_pasal<?= $i ?>" rows="10" cols="80" required></textarea>
                          </div>
                        </div>
                      </div>

                      <?php
                      // }
                      ?> -->

                      <div class="form-group row">
                        <label class="col-md-3" name="num_bab" id="num_bab"></label>
                        <div class="col-md-9">
                          <input type="submit" name="submit" id="submit" class="col btn btn-primary" value="Simpan">
                          <!-- <input type="text" name="get_jlh_psl" readonly id="get_jlh_psl" value="<?= $input_jumlah_pasal; ?>"> -->
                        </div>
                      </div>
                    </form>

                <?php

                  }
                endwhile;

                ?>
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