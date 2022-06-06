<?php
include '../connect/koneksi.php';


// tb_nama_uu 
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE status = 'Publish'");
while ($data_nama_uu = mysqli_fetch_array($query_nama_uu)) {
  $id_nama_uu = $data_nama_uu['id'];
  $nama_uu = $data_nama_uu['nama_uu'];
}

$query_sk_pra_bab_pasal = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal JOIN tb_pasal ON tb_pasal.nama_uu_pasal = tb_sk_pra_bab_pasal.nama_uu_bab WHERE tb_sk_pra_bab_pasal.id = '$id_nama_uu' ORDER BY tb_pasal.nomor_urut_pasal ASC");
$json_response_detail_sk = array();

while ($data_sk = mysqli_fetch_array($query_sk_pra_bab_pasal)) {
  array_push($json_response_detail_sk, array(
    "id_sk_pra_bab" => $data_sk['id_sk_pra_bab'],
    "id" => $data_sk['id'],
    "nama_uu_bab" => $data_sk['nama_uu_bab'],
    "kepala_lembaga_instansi" => $data_sk['kepala_lembaga_instansi'],
    "nama_pejabat_lembaga_instansi" => $data_sk['nama_pejabat_lembaga_instansi'],
    "lokasi_pengesahan" => $data_sk['lokasi_pengesahan'],
    "tanggal_pengesahan" => $data_sk['tanggal_pengesahan'],
    "menimbang" => $data_sk['menimbang'],
    "mengingat" => $data_sk['mengingat'],
    "menetapkan" => $data_sk['menetapkan'],
    "tanggal_pembuatan" => $data_sk['tanggal_pembuatan'],

    "id_pasal" => $data_sk['id_pasal'],
    "nomor_bab" => $data_sk['nomor_bab'],
    "judul_bab" => $data_sk['judul_bab'],
    "nomor_urut_pasal" => $data_sk['nomor_urut_pasal'],
    "isi_pasal" => $data_sk['isi_pasal'],
    "nama_uu_pasal" => $data_sk['nama_uu_pasal'],
    "tanggal_pembuatan" => $data_sk['tanggal_pembuatan']
  ));
  // $json_response_detail_nama_uu[] = $data;
}

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

<section class="content">
    <div class="row">
      <div class="col-xs-2">

      </div>
    </div>
</section>


  <!-- jQuery 2.0.2 -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <!-- DATA TABES SCRIPT -->
  <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

</body>

</html>