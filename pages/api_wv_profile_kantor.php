<?php
include '../connect/koneksi.php';


$query_profile_kantor = mysqli_query($con, "SELECT * FROM tb_profil_kantor ORDER BY id_profil_kantor ASC LIMIT 1");
$json_response_kantor = array();

while ($data_kantor = mysqli_fetch_array($query_profile_kantor)) {
  // $json_response_detail_bab_utama_sop_tanpa_sub_bab[] = $data_bab_utamaa;
  array_push($json_response_kantor, array(
    "id_profil_kantor" => $data_kantor['id_profil_kantor'],
    "gambar_profil_kantor" => $data_kantor['gambar_profil_kantor'],
    "judul_profil_kantor" => $data_kantor['judul_profil_kantor'],
    "deskripsi_kantor" => $data_kantor['deskripsi_kantor'],
    "created_at" => $data_kantor['created_at']

  ));
}

$json_response_kantor = json_encode(array(
  "status" => "success",
  "result" => $json_response_kantor
));



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- bootstrap 3.0.2 -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- font Awesome -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

  <style>
    .horizontal_line{
      border-top: 2px solid black;
      height: 2px;
      width: 170px;
    }
  </style>

</head>

<body class="skin-black">

  <?php
  $json_response_kantor = json_decode($json_response_kantor, true);
  ?>
  <section class="content">

    <div class="row" style="margin-top: 20px;">

      <center>
        <img src="../gambar/<?= $json_response_kantor["result"][0]['gambar_profil_kantor'] ?>" height="200px" class="mx-auto d-block" alt="kantor pertanahan deli serdang">
      </center>     

    </div>

    <div class="row" style="margin-top: 20px;">
      <center>
      <div class="col-md-2">
        <h4 class="text-justify"><strong><?= $json_response_kantor["result"][0]['judul_profil_kantor'] ?></strong></h4>
      </div>
      
      </center>
    </div>


    <div class="row" style="margin-top: 20px;">
      <div class="col-md-1">
        <label>Deskripsi Kantor :</label>
      </div>
      <div class="col-md-2">
        <p class="text-justify"><?= $json_response_kantor["result"][0]['deskripsi_kantor'] ?></p>
      </div>
    </div>

    



  </section>


  <!-- jQuery 2.0.2 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>



</body>

</html>