<?php
include '../connect/koneksi.php';


// tb_nama_uu 
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE status = 'Publish'");
while ($data_nama_uu = mysqli_fetch_array($query_nama_uu)) {
  $id_nama_uu = $data_nama_uu['id'];
  $nama_uu = $data_nama_uu['nama_uu'];
}

$query_bab_utama_sopp = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop WHERE id = '$id_nama_uu'");
$json_response_detail_bab_utama_sop = array();

while ($data_bab_utamaa = mysqli_fetch_array($query_bab_utama_sopp)) {
  // $json_response_detail_bab_utama_sopp[] = $data_bab_utamaa;
  array_push($json_response_detail_bab_utama_sop, array(
    "id_bab_utama_sop" => $data_bab_utamaa['id_bab_utama_sop'],
    "id" => $data_bab_utamaa['id'],
    "urutan_bab_utama_sop" => $data_bab_utamaa['urutan_bab_utama_sop'],
    "judul_bab_utama_sop" => $data_bab_utamaa['judul_bab_utama_sop'],
    "tanggal_pembuatan" => $data_bab_utamaa['tanggal_pembuatan'],
    "status"      => "2021"
  ));
}

echo json_encode($json_response_detail_bab_utama_sop);

?>