<?php
include '../connect/koneksi.php';

if (isset($_POST['submit'])) {

    $txt_id_sub_bab = $_POST['txt_id_sub_bab'];
    $txt_id_bab_utama_sop_sub_bab = $_POST['txt_id_bab_utama_sop_sub_bab'];
    $txt_id_sub_bab_sop_sub_bab = $_POST['txt_id_sub_bab_sop_sub_bab'];
    $txt_id_anak_sub_bab_sop_sub_bab = $_POST['txt_id_anak_sub_bab_sop_sub_bab'];
    
    $txt_dasar_hukum_sub_anak = $_POST['txt_dasar_hukum_sub_bab'];
    $txt_persyaratan_sub_anak = $_POST['txt_persyaratan_sub_bab'];
    $txt_biaya_sub_anak = $_POST['txt_biaya_sub_bab'];
    $txt_waktu_sub_anak = $_POST['txt_waktu_sub_bab'];
    $txt_keterangan_sub_anak = $_POST['txt_keterangan_sub_bab'];
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $time = $dt->format('Y-m-d G:i:s');
    
    // query insert
    $input_sop_anak_sub_bab_tanpa_sub_bab = "INSERT INTO  tb_anak_sub_bab_sop_tanpa_sub_bab(id,id_bab_utama_sop,id_sub_bab_sop,id_anak_sub_bab_sop,dasar_hukum,persyaratan,biaya,waktu,keterangan,tanggal_pembuatan) VALUES ('$txt_id_sub_bab','$txt_id_bab_utama_sop_sub_bab','$txt_id_sub_bab_sop_sub_bab','$txt_id_anak_sub_bab_sop_sub_bab', '$txt_dasar_hukum_sub_anak','$txt_persyaratan_sub_anak','$txt_biaya_sub_anak','$txt_waktu_sub_anak','$txt_keterangan_sub_anak','$time')";

    if (mysqli_query($con, $input_sop_anak_sub_bab_tanpa_sub_bab)) {
        echo"<script>alert('Data Berhasil ditambahkan.');</script>";
        header("location:../sop_sub_anak_sub_bab.php?id=" . $txt_id_sub_bab . "&id_bab_utama_sop=" . $txt_id_bab_utama_sop_sub_bab . "&id_sub_bab_sop=" .$txt_id_sub_bab_sop_sub_bab . "&id_anak_sub_bab_sop=" .$txt_id_anak_sub_bab_sop_sub_bab);
        
    } else {
        echo"<script>alert('Data gagal di tambahkan!');</script>";
        header("location:../sop_sub_anak_sub_bab.php?id=" . $txt_id_sub_bab . "&id_bab_utama_sop=" . $txt_id_bab_utama_sop_sub_bab . "&id_sub_bab_sop=" .$txt_id_sub_bab_sop_sub_bab . "&id_anak_sub_bab_sop=" .$txt_id_anak_sub_bab_sop_sub_bab);
        
    }
}