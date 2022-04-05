<?php
include '../connect/koneksi.php';

$get_id = $_GET['id'];
$get_id_bab_utama_sop = $_GET['id_bab_utama_sop'];

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_bab_utama_sop = $_POST['id_bab_utama_sop'];
    
    $txt_dasar_hukum = $_POST['txt_dasar_hukum'];
    $txt_persyaratan = $_POST['txt_persyaratan'];
    $txt_biaya = $_POST['txt_biaya'];
    $txt_waktu = $_POST['txt_waktu'];
    $txt_keterangan = $_POST['txt_keterangan'];
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $time = $dt->format('Y-m-d G:i:s');
    

    // query insert
    $input_sop_sub_bab_tanpa_sub_bab = "INSERT INTO tb_bab_utama_sop_tanpa_sub_bab(id,id_bab_utama_sop,dasar_hukum,persyaratan,biaya,waktu,keterangan,tanggal_pembuatan) VALUES ('$id','$id_bab_utama_sop','$txt_dasar_hukum','$txt_persyaratan','$txt_biaya','$txt_waktu','$txt_keterangan','$time')";

    if (mysqli_query($con, $input_sop_sub_bab_tanpa_sub_bab)) {

        header("location:../pages/sop_sub_bab.php?id=" . $id . "&id_bab_utama_sop=" . $id_bab_utama_sop . "&pesan=berhasil");
        
    } else {

        header("location:../pages/sop_sub_bab.php?id=" . $id . "&id_bab_utama_sop=" . $id_bab_utama_sop . "&pesan=gagal");
    }
}
