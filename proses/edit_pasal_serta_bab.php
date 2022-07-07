<?php
include '../connect/koneksi.php';
$get_id = $_GET['id'];
$id_pasal = $_GET['id_pasal'];

$undang_undang_select = $_POST['undang_undang_select'];
$nomor_bab = $_POST['nomor_bab'];
$title_bab = $_POST['title_bab'];
$no_urut_pasal = $_POST['no_urut_pasal'];
$isi_pasal = $_POST['isi_pasal'];


$sql_edit = "UPDATE tb_pasal SET nomor_bab = '$nomor_bab', judul_bab = '$title_bab', nomor_urut_pasal = '$no_urut_pasal', isi_pasal = '$isi_pasal'  WHERE id_pasal = '$id_pasal'";

if (mysqli_query($con, $sql_edit)) {
  header("location:../pages/form_tambah_pasal_per_nama_uu.php?id=" . $get_id . "&pesan=berhasil");
} else {
  header("location:../pages/form_tambah_pasal_per_nama_uu.php?id=" . $get_id . "&pesan=gagal");
  		// echo die("<script>alert('Data gagal')</script>" . mysqli_errno($con) . "-" . mysqli_error($con));
    // echo"<script>alert('Data gagal di ubah!');history.go(-1);</script>";
    
}

