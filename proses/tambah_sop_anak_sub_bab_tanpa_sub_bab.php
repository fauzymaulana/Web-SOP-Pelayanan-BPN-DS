<?php
include '../connect/koneksi.php';
$get_id = $_GET['id'];
$get_id_bab_utama_sop = $_GET['id_bab_utama_sop'];
$get_id_sub_bab_sop = $_GET['id_sub_bab_sop'];
$get_id_anak_sub_bab_sop = $_GET['id_anak_sub_bab_sop'];


if (isset($_POST['submit'])) {

    $txt_id_sub_bab = $_POST['txt_id_sub_bab'];
    $txt_id_bab_utama_sop_sub_bab = $_POST['txt_id_bab_utama_sop_sub_bab'];
    $txt_id_sub_bab_sop_sub_bab = $_POST['txt_id_sub_bab_sop_sub_bab'];
    $txt_id_anak_sub_bab_sop_sub_bab = $_POST['txt_id_anak_sub_bab_sop_sub_bab'];
    

    // $inp_bab_pembahasan = $_POST['inp_bab_pembahasan'];
    // $inp_urutan_bab_utama = $_POST['inp_urutan_bab_utama'];
    // $inp_urutan_bab_utama = $_POST['inp_urutan_bab_utama'];
    // $sub_bab_utamaa = $_POST['sub_bab_utamaa'];
    // $sub_bab_utamaa = strval($sub_bab_utamaa);
    $txt_dasar_hukum = $_POST['txt_dasar_hukum_sub_bab'];
    $txt_persyaratan = $_POST['txt_persyaratan_sub_bab'];
    $txt_biaya = $_POST['txt_biaya_sub_bab'];
    $txt_waktu = $_POST['txt_waktu_sub_bab'];
    $txt_keterangan = $_POST['txt_keterangan_sub_bab'];
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $time = $dt->format('Y-m-d G:i:s');
    // var_dump($txt_id_sub_bab);
    // echo "\n"; 
    // var_dump($txt_id_bab_utama_sop_sub_bab);
    // echo "\n"; 
    // var_dump($txt_id_sub_bab_sop);

    
    // query insert
    $input_sop_anak_sub_bab_tanpa_sub_bab = "INSERT INTO tb_bab_utama_sop_tanpa_sub_bab(id,id_bab_utama_sop,id_sub_bab_sop,dasar_hukum,persyaratan,biaya,waktu,keterangan,tanggal_pembuatan) VALUES ('$id','$id_bab_utama_sop','$id_sub_bab_sop','$txt_dasar_hukum','$txt_persyaratan','$txt_biaya','$txt_waktu','$txt_keterangan','$time')";

    if (mysqli_query($con, $input_sop_anak_sub_bab_tanpa_sub_bab)) {
        // $aa = "?id{$get_id}&id_bab_utama_sop={$get_id_bab_utama_sop}";

        // header("location:../sop_sub_bab.php".$aa);
        echo "<script>alert('Data berhasil di tambahkan!');</script>";
        header("location:../sop_anak_sub_bab.php?id=" . $id . "&id_bab_utama_sop=" . $id_bab_utama_sop . "&id_sub_bab_sop=" . $id_sub_bab_sop);
        // echo "return confirm('Berhasil Menambahkan Data.')";
    } else {
        // $aa = "?id{$get_id}&id_bab_utama_sop={$get_id_bab_utama_sop}";

        // header("location:../sop_sub_bab.php".$aa);
        echo "<script>alert('Data gagal di tambahkan!');</script>" . mysqli_error($con);
        header("location:../sop_sub_bab.php?id=" . $id . "&id_bab_utama_sop=" . $id_bab_utama_sop . "&id_sub_bab_sop=" . $id_sub_bab_sop);
        // echo "Gagal";
    }
}
