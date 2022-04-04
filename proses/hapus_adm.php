<?php

include '../connect/koneksi.php';

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_admin WHERE id = '$id'";

if($con->query($query)) {
    header("location: ../lihatadmin.php?pesan=berhasil");
} else {
    header("location: ../lihatadmin.php?pesan=gagal");
}

?>