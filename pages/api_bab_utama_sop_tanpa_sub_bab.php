<?php
include '../connect/koneksi.php';


// tb_nama_uu 
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE status = 'Publish'");
while ($data_nama_uu = mysqli_fetch_array($query_nama_uu)) {
  $id_nama_uu = $data_nama_uu['id'];
  $nama_uu = $data_nama_uu['nama_uu'];
}


$id_bab_utama_sop = $_GET['id_bab_utama_sop'];
$query_bab_utama_sop_tanpa_sub_bab = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop_tanpa_sub_bab JOIN tb_bab_utama_sop ON tb_bab_utama_sop.id_bab_utama_sop = tb_bab_utama_sop_tanpa_sub_bab.id_bab_utama_sop WHERE tb_bab_utama_sop_tanpa_sub_bab.id_bab_utama_sop = '$id_bab_utama_sop'");
$json_response_detail_bab_utama_sop_tanpa_sub_bab = array();

while ($data_bab_utamaa = mysqli_fetch_array($query_bab_utama_sop_tanpa_sub_bab)) {
  // $json_response_detail_bab_utama_sop_tanpa_sub_bab[] = $data_bab_utamaa;
  array_push($json_response_detail_bab_utama_sop_tanpa_sub_bab, array(
    "id_bab_utama_sop_tanpa_sub_bab" => $data_bab_utamaa['id_bab_utama_sop_tanpa_sub_bab'],
    "id" => $data_bab_utamaa['id'],
    "id_bab_utama_sop" => $data_bab_utamaa['id_bab_utama_sop'],
    "ada_sub_bab_bab_utama_tanpa_sub_bab" => $data_bab_utamaa['ada_sub_bab_bab_utama_tanpa_sub_bab'],
    "dasar_hukum" => $data_bab_utamaa['dasar_hukum'],
    "persyaratan" => $data_bab_utamaa['persyaratan'],
    "biaya" => $data_bab_utamaa['biaya'],
    "waktu" => $data_bab_utamaa['waktu'],
    "keterangan" => $data_bab_utamaa['keterangan'],
    "tanggal_pembuatan" => $data_bab_utamaa['tanggal_pembuatan'],
    "judul_bab" => $data_bab_utamaa['judul_bab_utama_sop'],
    "status" => "webview"
  ));
}

$json_response_detail_bab_utama_sop_tanpa_sub_bab = json_encode($json_response_detail_bab_utama_sop_tanpa_sub_bab);

;
// echo $json_response_detail_bab_utama_sop_tanpa_sub_bab;


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

</head>

<body class="skin-black">

  <?php
  $json_response_detail_bab_utama_sop_tanpa_sub_bab = json_decode($json_response_detail_bab_utama_sop_tanpa_sub_bab, true);
  
  ?>
  <section class="content">

    <div class="row" style="margin-top: 10px;">
      <p class="col-md-12 text-center"><?= $json_response_detail_bab_utama_sop_tanpa_sub_bab[0]['judul_bab'] ?></p>
    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-1">
        <label>Dasar Hukum :</label>
      </div>
      <div class="col-md-2">
        <p class="text-justify"><?= $json_response_detail_bab_utama_sop_tanpa_sub_bab[0]['dasar_hukum'] ?></p>
      </div>
    </div>


    <div class="row" style="margin-top: 20px;">
      <div class="col-md-1">
        <label>Persyaratan :</label>
      </div>
      <div class="col-md-2">
        <p class="text-justify"><?= $json_response_detail_bab_utama_sop_tanpa_sub_bab[0]['persyaratan'] ?></p>
      </div>
    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-1">
        <label>Biaya :</label>
      </div>
      <div class="col-md-2">
        <p class="text-justify"><?= $json_response_detail_bab_utama_sop_tanpa_sub_bab[0]['biaya'] ?></p>
      </div>
    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-1">
        <label>Waktu :</label>
      </div>
      <div class="col-md-2">
        <p class="text-justify"><?= $json_response_detail_bab_utama_sop_tanpa_sub_bab[0]['waktu'] ?></p>
      </div>
    </div>

    <div class="row" style="margin-top: 20px;">
      <div class="col-md-1">
        <label>Keterangan :</label>
      </div>
      <div class="col-md-2">
        <p class="text-justify"><?= $json_response_detail_bab_utama_sop_tanpa_sub_bab[0]['keterangan'] ?></p>
      </div>
    </div>

    

  </section>


  <!-- jQuery 2.0.2 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  

</body>

</html>