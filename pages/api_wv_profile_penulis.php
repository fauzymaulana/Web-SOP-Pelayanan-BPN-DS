<?php
include '../connect/koneksi.php';


$query_profile_penulis = mysqli_query($con, "SELECT * FROM tb_profil_penulis ORDER BY id_profil_penulis ASC LIMIT 1");
$json_response_penulis = array();

while ($data_profile = mysqli_fetch_array($query_profile_penulis)) {
  // $json_response_detail_bab_utama_sop_tanpa_sub_bab[] = $data_bab_utamaa;
  array_push($json_response_penulis, array(
    "id_profil_penulis" => $data_profile['id_profil_penulis'],
    "nama_profil_penulis" => $data_profile['nama_profil_penulis'],
    "deskripsi_penulis" => $data_profile['deskripsi_penulis'],
    "gambar_penulis" => $data_profile['gambar_penulis'],
    "created_at" => $data_profile['created_at']

  ));
}

$json_response_penulis = json_encode(array(
  "status" => "success",
  "result" => $json_response_penulis
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
  $json_response_penulis = json_decode($json_response_penulis, true);
  ?>
  <section class="content">

    <div class="row" style="margin-top: 20px;">

      <center>
        <img src="../gambar/penulis/<?= $json_response_penulis["result"][0]['gambar_penulis'] ?>" width="136px" height="170px" class="mx-auto d-block" alt="penulis">
      </center>

      <!-- <?php $img = $json_response_penulis["result"][0]['gambar_penulis'];
            $data = base64_encode($img); ?>
            <?= $data ?> -->
      

    </div>

    <div class="row" style="margin-top: 20px;">
      <center>
      <div class="col-md-2">
        <h4 class="text-justify"><strong><?= $json_response_penulis["result"][0]['nama_profil_penulis'] ?></strong></h4>
        <div class="horizontal_line"></div>
      </div>
      
      </center>
    </div>


    <div class="row" style="margin-top: 20px;">
      <div class="col-md-1">
        <label>Deskripsi Penulis :</label>
      </div>
      <div class="col-md-2">
        <p class="text-justify"><?= $json_response_penulis["result"][0]['deskripsi_penulis'] ?></p>
      </div>
    </div>

    



  </section>


  <!-- jQuery 2.0.2 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>



</body>

</html>