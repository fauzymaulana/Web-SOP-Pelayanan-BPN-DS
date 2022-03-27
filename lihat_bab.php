
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

        <?php
        $selected = [0];
        // if ($selected == "-- Pilih Bab --") {
        //   echo "Silahkan Pilih Bab.!";
        // }
        // elseif ($selected == 'BAB I') {
        //   # code...
        // }
        $bab_romawi = array(
          'BAB I' , 
          'BAB II',
          'BAB III',
          'BAB IV',
          'BAB V',
          'BAB VI',   
          'BAB VII');

          ?>


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
                  <li class="">
                    <a href="dashboard.php">
                      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                  </li>
                  <li>
                    <a href="register.php">
                      <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                    </a>
                  </li>
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-bar-chart-o"></i>
                      <span>Pengguna</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="lihatadmin.php"><i class="fa fa-angle-double-right active"></i> Data Pengguna Admin</a></li>
                            <!-- <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                              <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li> -->
                            </ul>
                          </li>
                          <li class="treeview">
                            <a href="#">
                              <i class="fa fa-laptop"></i>
                              <span>Undang-Undang</span>
                              <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                              <li class="active"><a href="empty.php"><i class="fa fa-angle-double-right"></i> Kumpulan Undang-Undang</a></li>
                              <li><a href="lihat_sk.php"><i class="fa fa-angle-double-right"></i> Pembuatan SK</a></li>
                              <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Pembuatan SOP</a></li>
                              <li><a href="lihat_bab.php"><i class="fa fa-angle-double-right"></i> Kumpulan Bab</a></li>
                              <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> T</a></li>
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
                              <div class="box-header justify-content-between ml-auto">
                                <h3 class="box-title">Data Kumpulan Bab</h3>
                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" style="margin-top: 10px; margin-right: 8px;"><i class="fa fa-plus"></i> Tambah Kumpulan Bab</button>
                              </div><!-- /.box-header -->

                              <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Judul Kumpulan Undang-Undang</th>
                                      <th>Tanggal Pembuatan</th>
                                      <th>Aksi</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                   <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= $dt['nama_uu']; ?></td>
                                    <td><?= $dt['tanggal_pembuatan']; ?></td>
                                    <td>

                                      <a href="lihat.php?id=<?= $dt['id'];?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                      <a href="edit.php?id=<?= $dt['id'];?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Ubah</a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                        </div>
                      </div>



                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="form_pembuatan_bab.php" method="POST">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Form Tambah BAB</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="control-group">
                                  <div class="form-group row">
                                    <label class="col-md-3" name="num_bab" id="num_bab">BAB </label>        
                                    <div class="col-md-9">
                                      <select class="col-md-6 select form-control" id="select_bab" name="select_bab" required>
                                        <?php
                                        foreach ($bab_romawi as $key_bab_romawi => $value_bab_romawi) {
                                          echo '<option value="'.$value_bab_romawi.'">'.$value_bab_romawi.'</option>'; 
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>


                                  <div class="form-group row">
                                    <label class="col-md-3" name="num_bab" id="num_bab">Judul Bab </label>
                                    <div class="col-md-9">
                                      <input type="text" class="col-md-6 form-control" name="title_bab" id="title_bab" required>

                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label class="col-md-3" name="num_bab" id="num_bab">Jumlah Pasal </label>        
                                    <div class="col-md-9">
                                      <input type="text" class="col-md-6 form-control" name="input_jumlah_pasal" id="input_jumlah_pasal" required>
                                      <input type="text" class="col-md-6 form-control" name="record_select" id="record_select">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label class="col-md-3" name="num_bab" id="num_bab">Nama Kumpulan Undang-Undang </label>        
                                    <div class="col-md-9">
                                      <select class="col-md-6 select form-control" id="undang_undang_select_all" name="undang_undang_select_all" required>
                                        <option disabled selected>-- Pilih Undang-Undang --</option>

                                        <?php
                                        include './connect/koneksi.php';

                                        $lihat = "SELECT * FROM tb_nama_uu";

                                        $var = mysqli_query($con,$lihat);

                                        while ($row = mysqli_fetch_array($var)) :
                                          ?>
                                          <option value="<?=$row['nama_uu']?>"><?=$row['nama_uu']?></option>
                                          <?php

                                        // foreach ($bab_romawi as $key_bab_romawi => $value_bab_romawi) {
                                        //   echo '<option value="'.$key_bab_romawi.'">'.$value_bab_romawi.'</option>'; 
                                        // }
                                        endwhile;
                                        ?>
                                      </select>
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

            $(document).ready(function() {
              //event melakukan get data select option tanpa button submit dengan javascript
              // $('#select_bab').on('change', function(){
              //   const selected_Select = $('#select_bab').val();
              //   $("#record_select").val(selected_Select);
              // });

            });
          </script>

        </body>
        </html>