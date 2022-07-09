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
    $queryUpdatePaksaStatus = "UPDATE tb_nama_uu l, tb_sk_pra_bab_pasal s SET l.nama_uu =  '$mod_nama_kumpulan_uu', l.status='Draft', s.nama_uu_bab='$mod_nama_kumpulan_uu' WHERE l.id = '$txt_id_modal' AND s.id='$txt_id_modal'";
    // $queryUpdatePaksaStatus = "UPDATE tb_nama_uu l, tb_sk_pra_bab_pasal s ON(tb_nama_uu.id = tb_sk_pra_bab_pasal.id) SET tb_nama_uu.nama_uu =  '$mod_nama_kumpulan_uu', tb_nama_uu.status='Draft', tb_sk_pra_bab_pasal='$mod_nama_kumpulan_uu' WHERE tb_nama_uu.id = '$txt_id_modal'";

    if (mysqli_query($con, $queryUpdatePaksaStatus) == true) {
      header("location:../pages/empty.php?pesan=error");
    }
  } else {
    // $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET nama_uu =  '$mod_nama_kumpulan_uu', status = '$mod_status' WHERE id = '$txt_id_modal'";

    $queryUpdatePaksaStatus = "UPDATE tb_nama_uu l, tb_sk_pra_bab_pasal s  SET l.nama_uu =  '$mod_nama_kumpulan_uu', l.status='$mod_status', s.nama_uu_bab='$mod_nama_kumpulan_uu' WHERE l.id = '$txt_id_modal' AND s.id='$txt_id_modal'";

    if (mysqli_query($con, $queryUpdatePaksaStatus) == true) {
      header("location:../pages/empty.php?pesan=berhasil");
    }
    // header("location:../pages/empty.php?pesan=berhasil");
    // echo die("<script>alert('Data berhasil')</script>" . mysqli_errno($con) . "-" . mysqli_error($con));
  }
} elseif (mysqli_num_rows($selectPaksaStatus) == 0) {

  // $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET nama_uu =  '$mod_nama_kumpulan_uu', status = '$mod_status' WHERE id = '$txt_id_modal'";

  $queryUpdatePaksaStatus = "UPDATE tb_nama_uu l, tb_sk_pra_bab_pasal s SET l.nama_uu =  '$mod_nama_kumpulan_uu', l.status='$mod_status', s.nama_uu_bab='$mod_nama_kumpulan_uu' WHERE l.id = '$txt_id_modal' AND s.id = '$txt_id_modal'";
  if (mysqli_query($con, $queryUpdatePaksaStatus) == true) {
    header("location:../pages/empty.php?pesan=berhasil");
    // echo die("<script>alert('Data berhasil')</script>" . mysqli_errno($con) . "-" . mysqli_error($con));
  }
} else {


  // $queryUpdatePaksaStatus = "UPDATE tb_nama_uu SET status='Draft' WHERE id = '$txt_id_modal'";

  $queryUpdatePaksaStatus = "UPDATE tb_nama_uu l, tb_sk_pra_bab_pasal s SET l.nama_uu =  '$mod_nama_kumpulan_uu', l.status='Draft', s.nama_uu_bab='$mod_nama_kumpulan_uu' WHERE l.id = '$txt_id_modal'AND s.id= '$txt_id_modal'";
  if (mysqli_query($con, $queryUpdatePaksaStatus) == true) {
    header("location:../pages/empty.php?pesan=gagal");
  }
}
