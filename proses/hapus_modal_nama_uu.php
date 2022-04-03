<?php

include '../connect/koneksi.php';

//get id
$get_id = $_GET['id'];

$query = "DELETE FROM tb_nama_uu WHERE id = '$get_id'";

if($con->query($query)) {
    echo"<script>alert('Data Berhasil dihapus.');history.go(-1);</script>";
} else {
    echo"<script>alert('Data Berhasil dihapus.');history.go(-1);</script>";
    
}

?>