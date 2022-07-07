<?php

include '../connect/koneksi.php';

//get id
$get_id = $_GET['id'];
$get_pasal = $_GET['id_pasal'];

$query = "DELETE FROM tb_pasal WHERE id_pasal = '$get_pasal'";

if($con->query($query)) {

    header("location:../pages/form_tambah_pasal_per_nama_uu.php?id=" . $get_id. "&pesan=berhasil");
    // echo die("<script>alert('Data gagal')</script>" . mysqli_errno($con) . "-" . mysqli_error($con));

} else {
    header("location:../pages/form_tambah_pasal_per_nama_uu.php?id=" . $get_id. "&pesan=gagal");
}

?>