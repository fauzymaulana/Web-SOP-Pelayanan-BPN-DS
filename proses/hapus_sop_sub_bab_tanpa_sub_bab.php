<?php

include '../connect/koneksi.php';

//get id
$get_id = $_GET['id'];
$get_id_bab_utama_sop = $_GET['id_bab_utama_sop'];
// $get_id_sub_bab_sop = $_GET['id_sub_bab_sop'];
// $get_id_anak_sub_bab_sop = $_GET['id_anak_sub_bab_sop'];
// $get_id_sub_anak_sub_bab_sop = $_GET['id_sub_anak_sub_bab_sop'];
// $get_id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab = $_GET['id_anak_sub_anak_sub_bab_sop_tanpa_sub_bab'];
$get_id_hapus = $_GET['id_bab_utama_sop_tanpa_sub_bab'];

$query = "DELETE FROM tb_bab_utama_sop_tanpa_sub_bab WHERE id_bab_utama_sop_tanpa_sub_bab = '$get_id_hapus'";

if($con->query($query)) {

    header("location:../pages/sop_sub_bab.php?id=" . $get_id . "&id_bab_utama_sop=" . $get_id_bab_utama_sop . "&pesan=berhasil");  

} else {
    header("location:../pages/sop_sub_bab.php?id=" . $get_id . "&id_bab_utama_sop=" . $get_id_bab_utama_sop . "&pesan=berhasil");
}

?>