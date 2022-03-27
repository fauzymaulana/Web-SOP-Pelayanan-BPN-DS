<?php

include '../connect/koneksi.php';

$get_id_sub_anak_sub_bab_sop = $_GET['id_sub_anak_sub_bab_sop'];


$query = "DELETE FROM tb_sub_anak_sub_bab_sop WHERE id_sub_anak_sub_bab_sop = '$get_id_sub_anak_sub_bab_sop'";

if($con->query($query)) {
    echo"<script>alert('Data Berhasil dihapus.');</script>";
} else {
    echo"<script>alert('Data Berhasil dihapus.');</script>";
    // echo "DATA GAGAL DIHAPUS!";
}

?>