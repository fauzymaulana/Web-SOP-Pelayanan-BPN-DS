<?php
include '../connect/koneksi.php';
$txt_id_modal_sub_bab = $_POST['txt_id_modal_sub_bab'];
$txt_id_bab_utama_sop_modal_sub_bab = $_POST['txt_id_bab_utama_sop_modal_sub_bab'];
$get_id_sub_bab_sop_modal_sub_bab = $_POST['txt_id_sub_bab_sop_modal_sub_bab'];
$get_id_anak_sub_bab_sop_modal_sub_bab = $_POST['txt_id_anak_sub_bab_sop_modal_sub_bab'];
$get_id_sub_anak_sub_bab_sop_modal_sub_bab = $_POST['txt_id_sub_anak_sub_bab_sop_modal_sub_bab'];

// $get_id_sub_bab_sop = $_GET['id_sub_anak_sub_bab_sop'];

$edit_select_bab = $_POST['edit_select_bab'];
$edit_judul_bab = $_POST['edit_judul_bab'];
$edit_tgl_bab_modal = $_POST['edit_tgl_bab_modal'];


$sql_edit = "UPDATE tb_sub_anak_sub_bab_sop SET id='$txt_id_modal_sub_bab',id_bab_utama_sop='$txt_id_bab_utama_sop_modal_sub_bab', id_sub_bab_sop='$get_id_sub_bab_sop_modal_sub_bab', id_anak_sub_bab_sop='$get_id_anak_sub_bab_sop_modal_sub_bab',  urutan_sub_anak_sub_bab =  '$edit_select_bab', judul_sub_anak_sub_bab = '$edit_judul_bab', tanggal_pembuatan='$edit_tgl_bab_modal' WHERE id_sub_anak_sub_bab_sop = '$get_id_sub_anak_sub_bab_sop_modal_sub_bab'";

if (mysqli_query($con, $sql_edit)) {
    echo"<script>alert('Data Berhasil diubah.');history.go(-1);</script>";
} else {
    echo"<script>alert('Data gagal di ubah!');history.go(-1);</script>";
    
}

