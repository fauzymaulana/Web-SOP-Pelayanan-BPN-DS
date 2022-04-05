<?php

include '../connect/koneksi.php';

//get id
$get_id = $_GET['id'];
$get_id_bab_utama_sop = $_GET['id_bab_utama_sop'];
$get_id_sub_bab_sop = $_GET['id_sub_bab_sop'];
$get_id_anak_sub_bab_sop = $_GET['id_anak_sub_bab_sop'];

$query = "DELETE FROM tb_anak_sub_bab_sop WHERE id_anak_sub_bab_sop = '$get_id_anak_sub_bab_sop'";

if($con->query($query)) {
    header("location:../pages/sop_anak_sub_bab.php?id=" .$get_id . "&id_bab_utama_sop=" . $get_id_bab_utama_sop . "&id_sub_bab_sop=" . $get_id_sub_bab_sop . "&pesan=berhasil");
    

} else {
    header("location:../pages/sop_anak_sub_bab.php?id=" .$get_id . "&id_bab_utama_sop=" . $get_id_bab_utama_sop . "&id_sub_bab_sop=" . $get_id_sub_bab_sop . "&pesan=gagal");
}

?>