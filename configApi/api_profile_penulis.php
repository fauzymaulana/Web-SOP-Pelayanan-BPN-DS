<?php
include '../connect/koneksi.php';

$query_profile_penulis = mysqli_query($con, "SELECT * FROM tb_profil_penulis ORDER BY id_profil_penulis DESC LIMIT 1");
$json_response_detail_profil_penulis = array();

while ($data_penulis = mysqli_fetch_array($query_profile_penulis)) {
  // $json_response_detail_bab_utama_sopp[] = $data_bab_utamaa;
  array_push($json_response_detail_profil_penulis, array(

    // "id_profil_penulis" => $data_penulis[0],
    // "nama_profil_penulis" => $data_penulis[1],
    // "deskripsi_penulis" => $data_penulis[2],
    // "gambar_penulis" => $data_penulis[3],
    // "created_at" => $data_penulis[4]

    "id_profil_penulis" => $data_penulis['id_profil_penulis'],
    "nama_profil_penulis" => $data_penulis['nama_profil_penulis'],
    "deskripsi_penulis" => $data_penulis['deskripsi_penulis'],
    "gambar_penulis" => $data_penulis['gambar_penulis'],
    "created_at" => $data_penulis['created_at']
  ));
}

echo json_encode($json_response_detail_profil_penulis);
// echo json_encode(array("status"=>"201","result"=>$json_response_detail_profil_penulis));


?>