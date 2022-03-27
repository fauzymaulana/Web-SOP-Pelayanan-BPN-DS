<?php

include '../connect/koneksi.php';

//get id
$get_id = $_GET['id'];
$get_id_bab_utama_sop = $_GET['id_bab_utama_sop'];
$get_id_sub_bab_sop = $_GET['id_sub_bab_sop'];

$query = "DELETE FROM tb_sub_bab_sop WHERE id_sub_bab_sop = '$get_id_sub_bab_sop'";

if($con->query($query)) {
    echo"<script>alert('Data Berhasil dihapus.');history.go(-1);</script>";
    // echo"<script>alert('Data Berhasil dihapus.');window.location='../sop_anak_sub_anak_sub_bab.php?id=$get_id&id_bab_utama_sop=$get_id_bab_utama_sop&id_sub_bab_sop=$get_id_sub_bab_sop&id_anak_sub_bab_sop=$get_id_anak_sub_bab_sop&id_sub_anak_sub_bab_sop=$get_id_sub_anak_sub_bab_sop&id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab=$get_id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab;</script>";
    

} else {
    echo"<script>alert('Data Berhasil dihapus.');history.go(-1);</script>";
    // echo "DATA GAGAL DIHAPUS!";
}

?>