<?php
include '../connect/koneksi.php';

$txt_id_modal = $_POST['txt_id_modal'];
$mod_nama_kumpulan_uu = $_POST['mod_nama_kumpulan_uu'];
$mod_status = $_POST['mod_status'];
$edit_tgl_nama_uu = $_POST['edit_tgl_nama_uu'];

// $id = $_GET['id'];

$selectPaksaStatus = mysqli_query($con, "SELECT status FROM tb_nama_uu WHERE status = 'Publish'");

if (mysqli_num_rows($selectPaksaStatus) > 0) {
  if ($mod_status == 'Publish') {
    $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET nama_uu =  '$mod_nama_kumpulan_uu', status='Draft' WHERE id = '$txt_id_modal'";
    if (mysqli_query($con, $queryUpdatePaksaStatus) == true) {
      header("location:../pages/empty.php?pesan=error");
    }
  } else {
    $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET nama_uu =  '$mod_nama_kumpulan_uu', status = '$mod_status' WHERE id = '$txt_id_modal'";
    if (mysqli_query($con, $queryUpdatePaksaStatus) == true) {
      header("location:../pages/empty.php?pesan=berhasil");
    }
  }
} elseif (mysqli_num_rows($selectPaksaStatus) == 0) {

  $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET nama_uu =  '$mod_nama_kumpulan_uu', status = '$mod_status' WHERE id = '$txt_id_modal'";
  if (mysqli_query($con, $queryUpdatePaksaStatus) == true) {
    header("location:../pages/empty.php?pesan=berhasil");
    // echo die("<script>alert('Data berhasil')</script>" . mysqli_errno($con) . "-" . mysqli_error($con));
  }
} else {


  $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET status='Draft' WHERE id = '$txt_id_modal'";
  if (mysqli_query($con, $queryUpdatePaksaStatus) == true) {
    header("location:../pages/empty.php?pesan=gagal");
  }
}
