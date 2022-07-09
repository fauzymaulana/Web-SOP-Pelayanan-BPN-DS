<?php
include '../connect/koneksi.php';
$txt_id = $_POST['txt_id_modal'];
$txt_id_bab_utama_sop_modal = $_POST['txt_id_bab_utama_sop_modal'];

$id_modal = $_GET['id_bab_utama_sop_tanpa_sub_bab'];

$txt_dasar_hukum_modal = $_POST['txt_dasar_hukum_modal'];
$txt_persyaratan_modal = $_POST['txt_persyaratan_modal'];
$txt_biaya_modal = $_POST['txt_biaya_modal'];
$txt_waktu_modal = $_POST['txt_waktu_modal'];
$txt_keterangan_modal = $_POST['txt_keterangan_modal'];
$tanggal_modal = $_POST['tanggal_modal'];


$sql_edit = "UPDATE tb_bab_utama_sop_tanpa_sub_bab SET dasar_hukum = '$txt_dasar_hukum_modal', persyaratan='$txt_persyaratan_modal',biaya='$txt_biaya_modal',waktu='$txt_waktu_modal',keterangan='$txt_keterangan_modal' WHERE id_bab_utama_sop_tanpa_sub_bab = '$id_modal'";

if (mysqli_query($con, $sql_edit)) {
    header("location:../pages/sop_sub_bab.php?id=" . $txt_id . "&id_bab_utama_sop=" . $txt_id_bab_utama_sop_modal . "&pesan=berhasil");
} else {
    header("location:../pages/sop_sub_bab.php?id=" . $txt_id . "&id_bab_utama_sop=" . $txt_id_bab_utama_sop_modal . "&pesan=berhasil");
  
}

