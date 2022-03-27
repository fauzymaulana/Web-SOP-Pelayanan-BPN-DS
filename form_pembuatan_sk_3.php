
<?php
session_start();

if (!isset($_SESSION['email'])) {
  // header('location:./index.php');
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
          '30');
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
                      <li><a href="form_pembuatan_sk.php"><i class="fa fa-angle-double-right"></i> Pembuatan SK</a></li>
                      <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Pembuatan SOP</a></li>
                      <li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                      <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
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
                        <h3 class="box-title">Formulir Tambah Surat Keterangan</h3>
                      </div><!-- /.box-header -->

                      <div class="box-body">
                        <hr>
                        <form action="./proses/tambah_form_sk.php" method="POST">
                          <div class="form-group row">
                            <span class="col-md-3">Kumpulan Undang-Undang</span>
                            <span class="col-md-8">Kumpulan Undang-Undang</span>
                          </div>

                          <div class="form-group row">
                            <span class="col-md-3">Lembaga Instansi</span>
                            <span class="col-md-8">Kepala iNtansi</span>
                          </div>

                          <div class="form-group row">
                            <span class="col-md-3">Menimbang</span> 
                            <div class="col-md-9">
                              <!-- <div class='pad'> -->

                                <textarea class="ckeditor" id="mengingat" name="mengingat" rows="10" cols="80">

                                </textarea>                        

                                <!-- </div> -->

                              </div>
                            </div>

                            <div class="form-group row">
                              <span class="col-md-3">Mengingat</span> 
                              <div class="col-md-9">
                                <textarea class="ckeditor" id="mengingat" name="mengingat" rows="10" cols="80">

                                </textarea>
                              </div>
                            </div>

                            <div class="form-group row">
                              <span class="col-md-3">Menetapkan</span> 
                              <div class="col-md-9">
                                <textarea class="ckeditor" id="mengingat" name="mengingat" rows="10" cols="80">

                                </textarea>
                              </div>
                            </div>

                            <div class="form-group row">
                              <!-- <span class="col-md-3">Jumlah BAB</span>  -->
                            <!-- <div class="col-md-9">
                              <div class="row">

                                <select class="col-md-6 select form-control" id="sel_jumlah_bab" name="sel_jumlah_bab">
                                  <?php
                                  foreach ($jumlah_bab as $key => $value) {
                                    echo '<option value="'.$key.'">'.$value.'</option>';
                                  }
                                  ?>
                                </select>
                                

                               
                                
                              </div>
                            </div> -->
                          </div>

                          

                          <div class="control-group">
                            <div class="form-group row">
                              <label class="col-md-3" name="num_bab" id="num_bab">Bab <?= $id; ?> </label> 
                              <div class="col-md-9">
                                <input type="text" name="bab1" id="bab1" class="form-control col-md-8" placeholder="Masukkan judul bab" required>
                                <textarea class="ckeditor col-md-8" id="bab" name="bab" rows="10" cols="80" required></textarea>


                              </div>
                            </div>
                          </div>
                          
                          
                          <!-- Tambah Form Dinamis -->
                          <div class="copy hide">
                            <div class="control-group">
                              <div class="form-group row">
                                <label class="col-md-3" name="num_bab_" id="num_bab_">Bab <!-- <?php foreach ($arr as $r) {
                                 echo $id++; }?> --></label> 
                                 <div class="col-md-9">
                                  <input type="text" name="bab1[]" id="bab1" class="form-control col-md-8" placeholder="Masukkan judul bab" required>
                                  <textarea class="ckeditor col-md-8" id="bab" name="bab[]" rows="10" cols="80" required>

                                  </textarea>
                                  
                                  <input type="button"  name="submit_jumlah_bab" id="submit_jumlah_bab" class=" col btn btn-primary remove" value="Remove">
                                </div>
                              </div>
                            </div>  
                          </div>
                          <!-- End Tambah Form Dinamis -->
                          <div class="after-add-m">

                          </div>

                          <div class="control-group">
                            <div class="form-group row">
                              <div class="col-md-3"></div> 
                              <div class="col-md-9">

                                <input type="button"  name="submit_jumlah_bab" id="submit_jumlah_bab" class=" col btn btn-primary add-m"   value="Add">
                                <input type="button"  name="submit" id="submit" class="col btn btn-primary" value="Simpan">


                              </div>
                            </div>
                          </div>


                          <?php
                          $id = 1;
                          
                          ?>
                          


                        </div>
                      </form>
                    </div><!-- /.box body -->
                  </div>   <!-- /.box -->
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



          $(document).ready(function(){
            var count = 1;
            $(".add-m").click(function(){
                // var g = $(".after-add-m").html();
                // $(".copy").after(g);
                var f = $(".copy").html();
                $(".after-add-m").after(f);
                if (count < 20) {
                  count++;
                }
              });

            $("body").on("click", ".remove", function(){
              $(this).parents(".control-group").remove();
            });
          });

            // var count = 0;

            // var a = document.getElementById("submit_jumlah_bab");
            // var res = document.getElementById("num_bab");
            // a.onclick = function(){
            //   count++;
            //   res.innerHTML = count;
            // }
          </script>
        </body>
        </html>