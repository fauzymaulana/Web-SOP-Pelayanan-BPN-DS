<?php
include '../connect/koneksi.php';
$get_id = $_GET['id'];

$id_bab_utama_sop = $_POST['txt_id_modal'];
$judul_bab_edit = $_POST['judul_bab_edit'];
$select_bab_edit = $_POST['select_bab_edit'];


$sql_edit = "UPDATE tb_bab_utama_sop SET urutan_bab_utama_sop = '$select_bab_edit', judul_bab_utama_sop = '$judul_bab_edit'  WHERE id_bab_utama_sop = '$id_bab_utama_sop'";

if (mysqli_query($con, $sql_edit)) {
  header("location:../pages/sop_bab.php?id=" . $get_id . "&pesan=berhasil");
} else {
  header("location:../pages/sop_bab.php?id=" . $get_id . "&pesan=gagal");
    // echo"<script>alert('Data gagal di ubah!');history.go(-1);</script>";
    
}

