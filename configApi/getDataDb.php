<?php
include '../connect/koneksi.php';
// tb_nama_uu 
// tabel paling utama untuk menampilkan ke mobile
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE status = 'Draft'");
$json_response_nama_uu = array();

if (mysqli_num_rows($query_nama_uu) > 0) {
  while ($data = mysqli_fetch_array($query_nama_uu)) {
    $id_nama_uu = $data['id'];
    
    $json_response_nama_uu[] = $data;
    echo $id_nama_uu;
  }
  echo json_encode(array(   'tb_nama_uu' => $json_response_nama_uu));
}


// $query_sk_pra_bab_pasal = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal");
// $json_response_nama_uu = array();

// if (mysqli_num_rows($result_nama_uu) > 0) {
//   while ($data = mysqli_fetch_array($result_nama_uu)) {
//     $json_response_nama_uu[] = $data;
//   }
//   echo json_encode(array(   'tb_nama_uu' => $json_response_nama_uu));
// }


?>