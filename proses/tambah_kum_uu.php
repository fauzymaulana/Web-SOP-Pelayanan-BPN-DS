<?php
include '../connect/koneksi.php';

if (isset($_POST['submit'])) {
    $nama_uu = $_POST['nama_kumpulan_uu'];
    $status = $_POST['status'];
    // $time = date('Y-m-d G:i:s');
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $time = $dt->format('Y-m-d G:i:s');

    $input = "INSERT INTO tb_nama_uu (nama_uu,status,tanggal_pembuatan) VALUES ('$nama_uu','$status','$time');";

    $input .= "INSERT INTO tb_sk_pra_bab_pasal(nama_uu_bab,kepala_lembaga_instansi,nama_pejabat_lembaga_instansi,lokasi_pengesahan,tanggal_pengesahan,menimbang,mengingat,menetapkan,tanggal_pembuatan) VALUES ('$nama_uu', '', '', '', '', '', '', '', '$time')";

    

    if (mysqli_multi_query($con, $input) === TRUE) {
        // header("location: ../empty.php");
        echo "<script>window.location='../empty.php';alert('Data berhasil ditambahkan!');</script>";
        // echo "<script>alert('Data berhasil di tambahkan!');history.go(-1);</script>";
        // echo "return confirm('Berhasil Menambahkan Data.')";
    }else {
        // header("location: ../empty.php");
        echo "<script>window.location='../empty.php';alert('Data gagal di tambahkan!');</script>";
        // echo "<script>alert('Data gagal di tambahkan!');history.go(-1);</script>". mysqli_error($con);
        // echo "Gagal";
    }

    mysqli_close($con);
}
?>