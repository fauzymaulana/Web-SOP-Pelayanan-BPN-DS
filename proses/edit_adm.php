<?php

include '../connect/koneksi.php';

// $id = $_GET['id'];
if (isset($_POST['submit'])) {

  $id = $_POST['id'];
  $idd = intval($id);
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $tgl = $_POST['date'];

  $edit = "UPDATE tb_admin SET nama = '$nama', email = '$email', password = '$password', tanggal_daftar = '$tgl' WHERE id = '$idd'";

  if (mysqli_query($con,$edit)===TRUE) {
    header('Location:../lihatadmin.php');
    echo "Data Berhasil Diubah";
    
  }else {
    header('Location:../lihatadmin.php');
    echo "Data gagal Diubah" . mysqli_error($con);
  }

  mysqli_close($con);
}

?>