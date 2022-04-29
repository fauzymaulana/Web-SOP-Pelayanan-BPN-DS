<?php
include '../connect/koneksi.php';
// tb_nama_uu 
// tabel paling utama untuk menampilkan ke mobile
$query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE status = 'Publish'");
while ($data_nama_uu = mysqli_fetch_array($query_nama_uu)) {
  $id_nama_uu = $data_nama_uu['id'];
  $nama_uu = $data_nama_uu['nama_uu'];

  // echo $id_nama_uu."\n";
}



// $query_nama_uu = mysqli_query($con, "SELECT * FROM tb_nama_uu WHERE id = '$id_nama_uu'");
// while ($dataa = mysqli_fetch_array($query_nama_uu)) {
  
//   array_push($json_response_detail_nama_uu, array(
//     "id" => $dataa['id'],
//     "nama_uu" => $dataa['nama_uu'],
//     "status" => $dataa['status'],
//     "tanggal_pembuatan" => $dataa['tanggal_pembuatan']
//   ));
//   // $json_response_detail_nama_uu[] = $data;
// }

// $json_response_detail_sk = array();
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

// $json_response_detail_pasal = array();
// $query_pasal = mysqli_query($con, "SELECT * FROM tb_pasal WHERE nama_uu_pasal = '$nama_uu' ORDER BY nomor_urut_pasal ASC");

// while ($data_pasal = mysqli_fetch_array($query_pasal)) {
//   array_push($json_response_detail_pasal, array(
//     "id_pasal" => $data_pasal['id_pasal'],
//     "nomor_bab" => $data_pasal['nomor_bab'],
//     "judul_bab" => $data_pasal['judul_bab'],
//     "nomor_urut_pasal" => $data_pasal['nomor_urut_pasal'],
//     "isi_pasal" => $data_pasal['isi_pasal'],
//     "nama_uu_pasal" => $data_pasal['nama_uu_pasal'],
//     "tanggal_pembuatan" => $data_pasal['tanggal_pembuatan']
  
//   ));

// }
$tampil = json_encode($json_response_detail_sk);
echo  $tampil;
// echo  "<br>";
// echo  json_encode($json_response_detail_pasal);
?>