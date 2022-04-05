<?php

include '../connect/koneksi.php';

//get id
$get_id = $_GET['id'];
$get_id_bab_utama_sop = $_GET['id_bab_utama_sop'];

$query = "DELETE FROM tb_bab_utama_sop WHERE id_bab_utama_sop = '$get_id_bab_utama_sop'";

if($con->query($query)) {
  header("location:../pages/sop_bab.php?id=" . $get_id . "&pesan=berhasil");
    // echo"<script>alert('Data Berhasil dihapus.');window.location='../sop_anak_sub_anak_sub_bab.php?id=$get_id&id_bab_utama_sop=$get_id_bab_utama_sop&id_sub_bab_sop=$get_id_sub_bab_sop&id_anak_sub_bab_sop=$get_id_anak_sub_bab_sop&id_sub_anak_sub_bab_sop=$get_id_sub_anak_sub_bab_sop&id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab=$get_id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab;</script>";
    

} else {
  header("location:../pages/sop_bab.php?id=" . $get_id . "&pesan=gagal");
    // echo "DATA GAGAL DIHAPUS!";
}

?>