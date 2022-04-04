<?php
include '../connect/koneksi.php';

if (isset($_POST['submit'])) {
    $name = $_POST['namamodal'];
    $email = $_POST['emailmodal'];
    $passw = $_POST['passwmodal'];
    $pass = $_POST['cpasswmodal'];
    // $time = date('Y-m-d G:i:s');
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $time = $dt->format('Y-m-d G:i:s');

    $input = "INSERT INTO tb_admin (nama,email,password,tanggal_daftar) VALUES ('$name','$email','$pass', '$time')";

    

    if (mysqli_query($con, $input)) {
        header("location: ../lihatadmin.php?pesan=berhasil");
        // echo "<script>alert('Data berhasil di tambahkan!');</script>";
    }else {
        header("location: ../lihatadmin.php?pesan=gagal");
        // echo "<script>alert('Data gagal di tambahkan!');</script>". mysqli_error($con);
    }

    mysqli_close($con);
}
?>