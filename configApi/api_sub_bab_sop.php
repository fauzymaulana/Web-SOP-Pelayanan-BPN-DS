<?php
include '../connect/koneksi.php';


// tb_nama_uu 
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE status = 'Publish'");
while ($data_nama_uu = mysqli_fetch_array($query_nama_uu)) {
  $id_nama_uu = $data_nama_uu['id'];
  $nama_uu = $data_nama_uu['nama_uu'];
}

$id_bab_utama_sop = $_GET['id_bab_utama_sop'];
$query_sub_bab_sop = mysqli_query($con, "SELECT * FROM tb_sub_bab_sop WHERE id = '$id_nama_uu' AND id_bab_utama_sop = '$id_bab_utama_sop' AND ada_sub_bab = '1' ");
//AND id_bab_utama_sop = '16'
$json_response_detail_sub_bab_sop = array();

while ($data_sub_bab_sop = mysqli_fetch_array($query_sub_bab_sop)) {
  array_push($json_response_detail_sub_bab_sop, array(
    "id_sub_bab_sop" => $data_sub_bab_sop['id_sub_bab_sop'],
    "id_bab_utama_sop" => $data_sub_bab_sop['id_bab_utama_sop'],
    "id" => $data_sub_bab_sop['id'],
    "urutan_sub_bab" => $data_sub_bab_sop['urutan_sub_bab'],
    "judul_sub_bab" => $data_sub_bab_sop['judul_sub_bab'],
    "tanggal_pembuatan" => $data_sub_bab_sop['tanggal_pembuatan'],
    "status"      => "201"
  ));
}

echo json_encode($json_response_detail_sub_bab_sop);

?>