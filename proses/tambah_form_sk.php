<?php 
include '../connect/koneksi.php';

if (isset($_POST['submit'])) {
	for ($i=0; $i < $_POST['jlh_form']; $i++) { 
		
	
    $judul_bab = $_POST['judul_bab'.$i];
    $isi_bab = $_POST['bab'.$i];

    var_dump($judul_bab);
    echo " batas\n";
    var_dump($isi_bab);
    
    
    // $input = "INSERT INTO tb_test(textt,texttt) VALUES ('$judul_bab', '$isi_bab')";
    // mysqli_query($con, $input);
// $index = 0;
// foreach ($judul_bab as $data_judul) {
// 	$input .= "('".$data_judul."','".$isi_bab[$index]."'),";
// 	$index++;
// }
//     $input = substr($input, 0, strlen($input) - 1).";";

// $input = "INSERT INTO tb_test(textt,texttt) VALUES ('$judul_bab', '$isi_bab')";
    // if (mysqli_query($con, $input)) {
    //     // header("location: ../form_pembuatan_sk.php");
    //     // echo "<script>alert('Data berhasil di tambahkan!');</script>";
    //     echo "return confirm('Berhasil Menambahkan Data.')";
    // }else {
    //     header("location: ../form_pembuatan_sk.php");
    //     // echo "<script>alert('Data gagal di tambahkan!');</script>". mysqli_error($con);
    //     echo "Gagal";
    // }
}
    mysqli_close($con);

}
 ?>