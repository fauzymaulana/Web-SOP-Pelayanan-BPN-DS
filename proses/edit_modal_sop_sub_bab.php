<?php
include '../connect/koneksi.php';
$txt_id_modal_sub_bab = $_POST['txt_id_modal_sub_bab'];
$txt_id_bab_utama_sop_modal_sub_bab = $_POST['txt_id_bab_utama_sop_modal_sub_bab'];
$get_id_sub_bab_sop = $_GET['id_sub_bab_sop'];

$edit_select_bab = $_POST['edit_select_bab'];
$edit_judul_bab = $_POST['edit_judul_bab'];
$edit_tgl_bab_modal = $_POST['edit_tgl_bab_modal'];


$sql_edit = "UPDATE tb_sub_bab_sop SET id_sub_bab_sop='$get_id_sub_bab_sop', id_bab_utama_sop='$txt_id_bab_utama_sop_modal_sub_bab', id = '$txt_id_modal_sub_bab', urutan_sub_bab =  '$edit_select_bab', judul_sub_bab = '$edit_judul_bab', tanggal_pembuatan='$edit_tgl_bab_modal' WHERE id_sub_bab_sop = '$get_id_sub_bab_sop'";

if (mysqli_query($con, $sql_edit)) {
    header("location:../pages/sop_sub_bab.php?id=" . $txt_id_modal_sub_bab . "&id_bab_utama_sop=" . $txt_id_bab_utama_sop_modal_sub_bab . "&pesan=berhasil");
} else {
    header("location:../pages/sop_sub_bab.php?id=" . $txt_id_modal_sub_bab . "&id_bab_utama_sop=" . $txt_id_bab_utama_sop_modal_sub_bab . "&pesan=gagal");
    
}

