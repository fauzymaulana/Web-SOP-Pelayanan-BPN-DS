<?php
include '../connect/koneksi.php';
// tb_nama_uu 
// tabel paling utama untuk menampilkan ke mobile
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE status = 'Publish'");
while ($data_nama_uu = mysqli_fetch_array($query_nama_uu)) {
  $id_nama_uu = $data_nama_uu['id'];

  // echo $id_nama_uu."\n";
}

$json_response_detail_nama_uu = array();
// $query_nama_uu = "SELECT * FROM tb_nama_uu  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_sk_pra_bab_pasal  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_bab_utama_sop  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_bab_utama_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_sub_bab_sop  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_sub_bab_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_anak_sub_bab_sop  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_anak_sub_bab_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_sub_anak_sub_bab_sop  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_sub_anak_sub_bab_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_anak_sub_anak_sub_bab_sop  WHERE id = '$id_nama_uu';";
// $query_nama_uu .= "SELECT * FROM tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
// $query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu JOIN tb_sk_pra_bab_pasal USING(id) JOIN tb_bab_utama_sop USING(id) JOIN tb_bab_utama_sop_tanpa_sub_bab USING(id) JOIN tb_sub_bab_sop USING(id) JOIN tb_sub_bab_sop_tanpa_sub_bab USING(id) JOIN tb_anak_sub_bab_sop USING(id) JOIN tb_anak_sub_bab_sop_tanpa_sub_bab USING(id) JOIN tb_sub_anak_sub_bab_sop USING(id) JOIN tb_sub_anak_sub_bab_sop_tanpa_sub_bab USING(id) JOIN tb_anak_sub_anak_sub_bab_sop USING(id) JOIN tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab USING(id) WHERE id = '$id_nama_uu'");
// tb nama uu
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id = '$id_nama_uu'");
while ($dataa = mysqli_fetch_array($query_nama_uu)) {
  
  array_push($json_response_detail_nama_uu, array(
    "id" => $dataa['id'],
    "nama_uu" => $dataa['nama_uu'],
    "status" => $dataa['status'],
    "tanggal_pembuatan" => $dataa['tanggal_pembuatan']
  ));
  // $json_response_detail_nama_uu[] = $data;
}



$query_sk_pra_bab_pasal = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal WHERE id = '$id_nama_uu'");
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
    "tanggal_pembuatan" => $data_sk['tanggal_pembuatan']
  ));
  // $json_response_detail_nama_uu[] = $data;
}


$query_bab_utama_sop = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop WHERE id = '$id_nama_uu'");
$json_response_detail_bab_utama_sop = array();
while ($data_bab_utama = mysqli_fetch_array($query_bab_utama_sop)) {
  array_push($json_response_detail_bab_utama_sop, array(
    "id_bab_utama_sop" => $data_bab_utama['id_bab_utama_sop'],
    "id" => $data_bab_utama['id'],
    "urutan_bab_utama_sop" => $data_bab_utama['urutan_bab_utama_sop'],
    "judul_bab_utama_sop" => $data_bab_utama['judul_bab_utama_sop'],
    "tanggal_pembuatan" => $data_bab_utama['tanggal_pembuatan']
  ));
}


$query_bab_utama_sop = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop WHERE id = '$id_nama_uu'");
$json_response_detail_bab_utama_sop = array();
while ($data_bab_utama = mysqli_fetch_array($query_bab_utama_sop)) {
  array_push($json_response_detail_bab_utama_sop, array(
    "id_bab_utama_sop" => $data_bab_utama['id_bab_utama_sop'],
    "id" => $data_bab_utama['id'],
    "urutan_bab_utama_sop" => $data_bab_utama['urutan_bab_utama_sop'],
    "judul_bab_utama_sop" => $data_bab_utama['judul_bab_utama_sop'],
    "tanggal_pembuatan" => $data_bab_utama['tanggal_pembuatan']
  ));
}


$query_bab_utama_sop_tanpa_sub_bab = mysqli_query($con, "SELECT * FROM tb_bab_utama_sop_tanpa_sub_bab WHERE id = '$id_nama_uu'");
$json_response_detail_bab_utama_sop_tanpa_sub_bab = array();
while ($data_bab_utama_tanpa_sub_bab = mysqli_fetch_array($query_bab_utama_sop_tanpa_sub_bab)) {
  array_push($json_response_detail_bab_utama_sop_tanpa_sub_bab, array(
    "id_bab_utama_sop_tanpa_sub_bab" => $data_bab_utama_tanpa_sub_bab['id_bab_utama_sop_tanpa_sub_bab'],
    "id" => $data_bab_utama_tanpa_sub_bab['id'],
    "id_bab_utama_sop" => $data_bab_utama_tanpa_sub_bab['id_bab_utama_sop'],
    "dasar_hukum" => $data_bab_utama_tanpa_sub_bab['dasar_hukum'],
    "persyaratan" => $data_bab_utama_tanpa_sub_bab['persyaratan'],
    "biaya" => $data_bab_utama_tanpa_sub_bab['biaya'],
    "waktu" => $data_bab_utama_tanpa_sub_bab['waktu'],
    "keterangan" => $data_bab_utama_tanpa_sub_bab['keterangan'],
    "tanggal_pembuatan" => $data_bab_utama_tanpa_sub_bab['tanggal_pembuatan']
  ));
}

$query_sub_bab_sop = mysqli_query($con, "SELECT * FROM tb_sub_bab_sop WHERE id = '$id_nama_uu'");
$json_response_detail_sub_bab_sop = array();
while ($data_sub_bab_sop = mysqli_fetch_array($query_sub_bab_sop)) {
  array_push($json_response_detail_sub_bab_sop, array(
    "id_sub_bab_sop" => $data_sub_bab_sop['id_sub_bab_sop'],
    "id_bab_utama_sop" => $data_sub_bab_sop['id_bab_utama_sop'],
    "id" => $data_sub_bab_sop['id'],
    "urutan_sub_bab" => $data_sub_bab_sop['urutan_sub_bab'],
    "judul_sub_bab" => $data_sub_bab_sop['judul_sub_bab'],
    "tanggal_pembuatan" => $data_sub_bab_sop['tanggal_pembuatan']
  ));
}


$json_response_detail_sub_bab_sop_tanpa_sub_bab = array();
while ($data_sub_bab_sop_tanpa_sub_bab = mysqli_fetch_array($query_sub_bab_sop_tanpa_sub_bab)) {
  array_push($json_response_detail_sub_bab_sop_tanpa_sub_bab, array(
    "id_sub_bab_sop_tanpa_sub_bab" => $data_sub_bab_sop_tanpa_sub_bab['id_sub_bab_sop_tanpa_sub_bab'],
    "id" => $data_sub_bab_sop_tanpa_sub_bab['id'],
    "id_bab_utama_sop" => $data_sub_bab_sop_tanpa_sub_bab['id_bab_utama_sop'],
    "dasar_hukum" => $data_sub_bab_sop_tanpa_sub_bab['dasar_hukum'],
    "persyaratan" => $data_sub_bab_sop_tanpa_sub_bab['persyaratan'],
    "biaya" => $data_sub_bab_sop_tanpa_sub_bab['biaya'],
    "waktu" => $data_sub_bab_sop_tanpa_sub_bab['waktu'],
    "keterangan" => $data_sub_bab_sop_tanpa_sub_bab['keterangan'],
    "tanggal_pembuatan" => $data_sub_bab_sop_tanpa_sub_bab['tanggal_pembuatan']
  ));
}


$query_anak_sub_bab_sop = mysqli_query($con, "SELECT * FROM tb_anak_sub_bab_sop WHERE id = '$id_nama_uu'");
$json_response_detail_anak_sub_bab_sop = array();
while ($data_anak_sub_bab_sop = mysqli_fetch_array($query_anak_sub_bab_sop)) {
  array_push($json_response_detail_anak_sub_bab_sop, array(
    "id_anak_sub_bab_sop" => $data_anak_sub_bab_sop['id_anak_sub_bab_sop'],
    "id" => $data_anak_sub_bab_sop['id'],
    "id_bab_utama_sop" => $data_anak_sub_bab_sop['id_bab_utama_sop'],
    "id_sub_bab_sop" => $data_anak_sub_bab_sop['id_sub_bab_sop'],
    "urutan_anak_sub_bab" => $data_anak_sub_bab_sop['urutan_anak_sub_bab'],
    "judul_anak_sub_bab" => $data_anak_sub_bab_sop['judul_anak_sub_bab'],
    "tanggal_pembuatan" => $data_anak_sub_bab_sop['tanggal_pembuatan']
  ));
}


$query_anak_sub_bab_sop_tanpa_sub_bab = mysqli_query($con, "SELECT * FROM tb_anak_sub_bab_sop_tanpa_sub_bab WHERE id = '$id_nama_uu'");
$json_response_detail_sub_bab_sop_tanpa_sub_bab = array();
while ($data_sub_bab_sop_tanpa_sub_bab = mysqli_fetch_array($query_anak_sub_bab_sop_tanpa_sub_bab)) {
  array_push($json_response_detail_sub_bab_sop_tanpa_sub_bab, array(
    "id_sub_bab_sop_tanpa_sub_bab" => $data_sub_bab_sop_tanpa_sub_bab['id_sub_bab_sop_tanpa_sub_bab'],
    "id" => $data_sub_bab_sop_tanpa_sub_bab['id'],
    "id_bab_utama_sop" => $data_sub_bab_sop_tanpa_sub_bab['id_bab_utama_sop'],
    "dasar_hukum" => $data_sub_bab_sop_tanpa_sub_bab['dasar_hukum'],
    "persyaratan" => $data_sub_bab_sop_tanpa_sub_bab['persyaratan'],
    "biaya" => $data_sub_bab_sop_tanpa_sub_bab['biaya'],
    "waktu" => $data_sub_bab_sop_tanpa_sub_bab['waktu'],
    "keterangan" => $data_sub_bab_sop_tanpa_sub_bab['keterangan'],
    "tanggal_pembuatan" => $data_sub_bab_sop_tanpa_sub_bab['tanggal_pembuatan']
  ));
}


echo json_encode(array(
  ['tb_nama_uu' => $json_response_detail_nama_uu],
  ['tb_sk_pra_bab_pasal' => $json_response_detail_sk],
  ['tb_bab_utama_sop' => $json_response_detail_bab_utama_sop],
  ['tb_bab_utama_sop_tanpa_sub_bab' => $json_response_detail_bab_utama_sop_tanpa_sub_bab],
  ['tb_sub_bab_sop' => $json_response_detail_sub_bab_sop],
  ['tb_sub_bab_sop_tanpa_sub_bab' => $json_response_detail_sub_bab_sop_tanpa_sub_bab],
  ['tb_anak_sub_bab_sop' => $json_response_detail_anak_sub_bab_sop]
));












// $tampung = mysqli_multi_query($con, $query_nama_uu);
// if($tampung = mysqli_store_result($con)){
//       while ($data = mysqli_fetch_array($tampung)) {

//         // $id_nama = $data['id'];

//     // echo $id_nama_uu."\n";
//     $json_response_detail_nama_uu_nama_uu[] = $data;
//       }
//       echo json_encode(array(   
//       'tb_anak_sub_bab_sop' => $json_response_detail_nama_uu_nama_uu));


//       

// echo json_encode(array(   'tb_nama_uu' => $json_response_nama_uu));
// echo json_encode(array(   'tb_sk_pra_bab_pasal' => $json_response_nama_uu));


// $query_sk_pra_bab_pasal = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal");
// $json_response_nama_uu = array();

// if (mysqli_num_rows($result_nama_uu) > 0) {
//   while ($data = mysqli_fetch_array($result_nama_uu)) {
//     $json_response_nama_uu[] = $data;
//   }
//   echo json_encode(array(   'tb_nama_uu' => $json_response_nama_uu));
// }
mysqli_close($con);
?>