<?php
include '../connect/koneksi.php';
$txt_id_modal = $_POST['txt_id_modal'];


$mod_nama_kumpulan_uu = $_POST['mod_nama_kumpulan_uu'];
$mod_status = $_POST['mod_status'];
$edit_tgl_nama_uu = $_POST['edit_tgl_nama_uu'];

$id = $_GET['id'];

$sql_edit = "UPDATE tb_nama_uu SET id='$txt_id_modal', nama_uu =  '$mod_nama_kumpulan_uu', status = '$mod_status', tanggal_pembuatan='$edit_tgl_nama_uu' WHERE id = '$id'";

// INI MASIH EROR, dianya masih bisa membuat publish lebih dari 1, seharusnya pubish  itu hanya 1, tidak boleh lebih.
$selectPaksaStatus = mysqli_query($con,"SELECT status FROM tb_nama_uu WHERE status = 'Publish'");
while ($dt = mysqli_fetch_array($selectPaksaStatus)) { 
  $pub = $dt['status'];
  if (mysqli_num_rows($selectPaksaStatus) > 1) {
    $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET status='Draft' WHERE id != '$id'";
    header("location:../pages/empty.php?pesan=berhasil");
    // echo "<script>window.location='../empty.php';alert('Data berhasil disimpan!');</script>";
  } elseif (mysqli_num_rows($selectPaksaStatus) < 1) {
    $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET status='Publish' WHERE id = '$id'";
    header("location:../pages/empty.php?pesan=berhasil");
  }
  else {
    header("location:../pages/empty.php?pesan=error");
    // echo "<script>alert('Status Publish tidak boleh lebih dari 1!');</script>";
    $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET status='Draft' WHERE id = '$id'";
  }
}

if (mysqli_query($con, $sql_edit)) {

  // if ('Publish' === $mod_status) {
  //   $returnPublish = 'Publish';
  // } elseif ('Draft' === $mod_status) {
  //   $returnDraft = 'Draft';
  // } else {
  //   $returnDraft = 'Draft';
  // }
  
  
  
} else {
  header("location:../pages/empty.php?pesan=gagal");
}
