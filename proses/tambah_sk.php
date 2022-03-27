<?php

include '../connect/koneksi.php';
for ($i=1; $i <= $_POST['aspp']; $i++) { 
	$judul_bab = $_POST['judul_bab'.$i];
	$bab = $_POST['bab'.$i];

	$input = "INSERT INTO tb_test(textt,texttt) VALUES ('$judul_bab', '$bab')";
    if ($con->query($input)) {
        // header("location: ../form_pembuatan_sk.php");
        // echo "<script>alert('Data berhasil di tambahkan!');</script>";
        echo "return confirm('Berhasil Menambahkan Data.')";
    }else {
        // header("location: ../form_pembuatan_sk.php");
        // echo "<script>alert('Data gagal di tambahkan!');</script>". mysqli_error($con);
        echo "Gagal";
    }
    
}
$con->close();

?>