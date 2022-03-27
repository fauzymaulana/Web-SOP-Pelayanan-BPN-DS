<?php
include '../connect/koneksi.php';

if (isset($_POST['submit'])) {
    $nama_uu = $_POST['nama_kumpulan_uu'];
    // $time = date('Y-m-d G:i:s');
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $time = $dt->format('Y-m-d G:i:s');

    $input = "INSERT INTO tb_nama_uu (nama_uu,tanggal_pembuatan) VALUES ('$nama_uu','$time');";

    $input .= "INSERT INTO tb_sk_pra_bab_pasal(nama_uu_bab,kepala_lembaga_instansi,nama_pejabat_lembaga_instansi,lokasi_pengesahan,tanggal_pengesahan,menimbang,mengingat,menetapkan,tanggal_pembuatan) VALUES ('$nama_uu', '', '', '', '', '', '', '', '$time')";

    

    if (mysqli_multi_query($con, $input) === TRUE) {
        // header("location: ../empty.php");
        echo "<script>alert('Data berhasil di tambahkan!');</script>";
        // echo "return confirm('Berhasil Menambahkan Data.')";
    }else {
        // header("location: ../empty.php");
        echo "<script>alert('Data gagal di tambahkan!');</script>". mysqli_error($con);
        // echo "Gagal";
    }

    mysqli_close($con);
}
?>