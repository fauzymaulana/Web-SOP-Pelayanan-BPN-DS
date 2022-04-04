<?php

include '../connect/koneksi.php';

//get id
$get_id = $_GET['id'];

$query = "DELETE FROM tb_nama_uu WHERE id = '$get_id'";

if($con->query($query)) {
    header("location:../pages/empty.php?pesan=berhasil");
} else {
    header("location:../pages/empty.php?pesan=gagal");
    
}

?>