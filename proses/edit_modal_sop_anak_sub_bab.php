<?php
include '../connect/koneksi.php';

$txt_id = $_POST['txt_id'];
$txt_id_bab_utama = $_POST['txt_id_bab_utama'];
$txt_id_sub_bab = $_POST['txt_id_sub_bab'];
$txt_id_anak_sub_bab = $_POST['txt_id_anak_sub_bab'];
$edit_select_bab = $_POST['edit_select_bab'];
$edit_judul_bab = $_POST['edit_judul_bab'];


$sql_edit = "UPDATE tb_anak_sub_bab_sop SET urutan_anak_sub_bab =  '$edit_select_bab', judul_anak_sub_bab = '$edit_judul_bab' WHERE id_anak_sub_bab_sop = '$txt_id_anak_sub_bab'";

if (mysqli_query($con, $sql_edit)) {
    header("location:../pages/sop_anak_sub_bab.php?id=" .$txt_id . "&id_bab_utama_sop=" . $txt_id_bab_utama . "&id_sub_bab_sop=" . $txt_id_sub_bab . "&pesan=berhasil");
} else {
    header("location:../pages/sop_anak_sub_bab.php?id=" .$txt_id . "&id_bab_utama_sop=" . $txt_id_bab_utama . "&id_sub_bab_sop=" . $txt_id_sub_bab . "&pesan=gagal");
    
    
}

