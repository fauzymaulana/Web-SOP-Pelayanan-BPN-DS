<?php
if (isset($_POST['submit'])) {
	$inp_jlh_bab = $_POST['inp_jlh_bab'];
	header("location: ../form_pembuatan_bab.php");
	echo $inp_jlh_bab; 

	// header("location: ../form_pembuatan_sk.php");
}
?>