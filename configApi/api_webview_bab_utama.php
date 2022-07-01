<?php
include '../connect/koneksi.php';


// tb_nama_uu 
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE status = 'Publish'");
while ($data_nama_uu = mysqli_fetch_array($query_nama_uu)) {
  $id_nama_uu = $data_nama_uu['id'];
  $nama_uu = $data_nama_uu['nama_uu'];
}

$id_bab_utama_sop = $_GET['id_bab_utama_sop'];
$query_wv_bab_utama_sop = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop_tanpa_sub_bab WHERE id_bab_utama_sop = '$id_bab_utama_sop'");
$json_response_webview_bab_utama_sop = array();

while ($data_webview_bab_utamaa = mysqli_fetch_array($query_wv_bab_utama_sop)) {
  // $json_response_detail_bab_utama_sopp[] = $data_bab_utamaa;
  array_push($json_response_webview_bab_utama_sop, array(
    "id_bab_utama_sop_tanpa_sub_bab" => $data_webview_bab_utamaa['id_bab_utama_sop_tanpa_sub_bab'],
    "id" => $data_webview_bab_utamaa['id'],
    
    "dasar_hukum" => $data_webview_bab_utamaa['dasar_hukum'],
    "persyaratan" => $data_webview_bab_utamaa['persyaratan'],
    "biaya" => $data_webview_bab_utamaa['biaya'],
    "waktu" => $data_webview_bab_utamaa['waktu'],
    "keterangan" => $data_webview_bab_utamaa['keterangan'],
    "tanggal_pembuatan" => $data_webview_bab_utamaa['tanggal_pembuatan'],
    "status"      => "webview"
  ));
}

// echo json_encode($json_response_webview_bab_utama_sop);

?>