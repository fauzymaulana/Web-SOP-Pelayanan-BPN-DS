<?php

include '../connect/koneksi.php';

if (isset($_POST['submit'])) {
	// $get_id = $_GET['id'];
	$nama_kumpulan_uu = $_POST['nama_kumpulan_uu'];
	$kepala_lembaga_instansi = $_POST['kepala_lembaga_instansi'];
	$nama_pejabat_lembaga_instansi = $_POST['nama_pejabat_lembaga_instansi'];
	$lokasi_pengesahan = $_POST['lokasi_pengesahan'];
	$tanggal_pengesahan = $_POST['tanggal_pengesahan'];
	$menimbang = $_POST['menimbang'];
	$mengingat = $_POST['mengingat'];
	$menetapkan = $_POST['menetapkan'];

	// timestamp
	$tz = 'Asia/Jakarta';
	$dt = new DateTime("now", new DateTimeZone($tz));
	$time = $dt->format('Y-m-d G:i:s');

	$sql = "INSERT INTO tb_sk_pra_bab_pasal VALUES ('','$nama_kumpulan_uu', '$kepala_lembaga_instansi', '$nama_pejabat_lembaga_instansi', '$lokasi_pengesahan', '$tanggal_pengesahan', '$menimbang', '$mengingat', '$menetapkan', '$time')";

	if (mysqli_query($con, $sql)) {
		header("location:../pages/lihat_sk.php?pesan=berhasil");
		// echo "<script>window.location='../lihat_sk.php';alert('Data berhasil ditambahkan!');</script>";
	} else {
		header("location:../pages/lihat_sk.php?pesan=gagal");
		// echo "<script>window.location='../lihat_sk.php';alert('Data gagal ditambahkan!');</script>".mysqli_error($con);
		// echo die("<script>alert('Data gagal')</script>" . mysqli_error($con));
	}
}