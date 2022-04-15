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
$query_nama_uu = "SELECT * FROM tb_nama_uu  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_sk_pra_bab_pasal  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_bab_utama_sop  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_bab_utama_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_sub_bab_sop  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_sub_bab_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_anak_sub_bab_sop  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_anak_sub_bab_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_sub_anak_sub_bab_sop  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_sub_anak_sub_bab_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_anak_sub_anak_sub_bab_sop  WHERE id = '$id_nama_uu';";
$query_nama_uu .= "SELECT * FROM tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab  WHERE id = '$id_nama_uu';";
// $query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu JOIN tb_sk_pra_bab_pasal USING(id) JOIN tb_bab_utama_sop USING(id) JOIN tb_bab_utama_sop_tanpa_sub_bab USING(id) JOIN tb_sub_bab_sop USING(id) JOIN tb_sub_bab_sop_tanpa_sub_bab USING(id) JOIN tb_anak_sub_bab_sop USING(id) JOIN tb_anak_sub_bab_sop_tanpa_sub_bab USING(id) JOIN tb_sub_anak_sub_bab_sop USING(id) JOIN tb_sub_anak_sub_bab_sop_tanpa_sub_bab USING(id) JOIN tb_anak_sub_anak_sub_bab_sop USING(id) JOIN tb_anak_sub_anak_sub_bab_sop_tanpa_sub_bab USING(id) WHERE id = '$id_nama_uu'");
// $tampung = mysqli_multi_query($con, $query_nama_uu);
if (mysqli_multi_query($con, $query_nama_uu)) {
  do{
    if ($tampung = mysqli_store_result($con)) {
      while ($data = mysqli_fetch_assoc($tampung)) {
        // printf("%s\n", $data['nama_uu']);
        // $id_nama = $data['id'];
        
    // echo $id_nama_uu."\n";
    $json_response_detail_nama_uu[] = $data;
    // echo json_encode(array(   
    //   'tb_nama_uu' => $json_response_detail_nama_uu));
      }
      mysqli_free_result($tampung);
    }
    if (mysqli_more_results($con)) {
      printf("--------\n");
      echo json_encode(array(   
        'tb_nama_uu' => $json_response_detail_nama_uu));
    }
  }while (mysqli_next_result($con));
}
// if (mysqli_num_rows($tampung) > 0) {
  
  // echo json_encode(array(   'tb_nama_uu' => $json_response_nama_uu));
  // echo json_encode(array(   'tb_sk_pra_bab_pasal' => $json_response_nama_uu));
// }


// $query_sk_pra_bab_pasal = mysqli_query($con, "SELECT * FROM tb_sk_pra_bab_pasal");
// $json_response_nama_uu = array();

// if (mysqli_num_rows($result_nama_uu) > 0) {
//   while ($data = mysqli_fetch_array($result_nama_uu)) {
//     $json_response_nama_uu[] = $data;
//   }
//   echo json_encode(array(   'tb_nama_uu' => $json_response_nama_uu));
// }


?>