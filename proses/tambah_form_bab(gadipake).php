<?php 
include '../connect/koneksi.php';

if (isset($_POST['submit'])) {
	for ($i=0; $i < $_POST['get_jlh_psl']; $i++) { 
		
       $select_bab = $_POST['select_bab'];
       $title_bab = $_POST['title_bab'];

       $judul_pasal = $_POST['judul_pasal'.$i];
       $isi_pasal = $_POST['isi_pasal'.$i];

       var_dump($select_bab);
       echo " batas\n";
       var_dump($title_bab);
       echo " batas\n";
       var_dump($judul_pasal);
       echo " batas\n";
       var_dump($isi_pasal);



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