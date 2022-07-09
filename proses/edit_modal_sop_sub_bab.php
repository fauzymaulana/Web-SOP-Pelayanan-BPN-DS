<?php
include '../connect/koneksi.php';

$id = $_POST['txt_id_modal_sub_bab'];
$id_bab_utama = $_POST['txt_id_bab_utama'];
$id_sub_bab = $_POST['txt_id_sub_bab'];
$edit_select_bab = $_POST['edit_select_bab'];
$edit_judul_bab = $_POST['edit_judul_bab'];



$sql_edit = "UPDATE tb_sub_bab_sop SET  urutan_sub_bab =  '$edit_select_bab', judul_sub_bab = '$edit_judul_bab' WHERE id_sub_bab_sop = '$id_sub_bab'";

if (mysqli_query($con, $sql_edit)) {
    header("location:../pages/sop_sub_bab.php?id=" . $id . "&id_bab_utama_sop=" . $id_bab_utama . "&pesan=berhasil");
} else {
    header("location:../pages/sop_sub_bab.php?id=" . $id . "&id_bab_utama_sop=" . $id_bab_utama . "&pesan=gagal");
    
}

