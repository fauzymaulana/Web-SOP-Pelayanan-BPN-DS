<?php 
include '../connect/koneksi.php';
// include '../form_pembuatan_bab.php';

if (isset($_POST['submit'])) {
  // sampe sini errornya, 
  // error karena $_POST nya ga dapet punya foem siapa

  $undang_undang_select = $_POST['undang_undang_select'];
  $pilihan_bab = $_POST['pilihan_bab'];
  // $select_bab   = strval($select_bab);
  $title_bab = $_POST['title_bab'];
  var_dump($undang_undang_select);
  echo "  - \n";
  var_dump($pilihan_bab);
  echo " - \n";
  var_dump($title_bab);
  echo " - \n";

  for ($i=1; $i <= $_POST['get_jlh_psl']; $i++) { 
   $judul_pasal = $_POST['judul_pasal'.$i];
   $isi_pasal = $_POST['isi_pasal'.$i];

   
   var_dump($judul_pasal);
   echo " - \n";
   var_dump($isi_pasal);
   echo " - \n";

  // ini menmabah kolom field 1 (tanpa dinamis) dengan menggunakan PHP (BERHASIL) 
  //  $sql = "ALTER TABLE tb_bab ADD 'judul_pasal' VARCHAR(20) NOT NULL AFTER 'judul_bab', ADD 'isi_pasal' VARCHAR(3000) NOT NULL AFTER 'judul_pasal'";
  //  $add_field_dinamis = mysqli_query($con,$sql);

  //  if ($sql !== false) {
  //    echo "Kolom Berhasil Ditambahkan";
  //  }else{
  //   echo "Kolom gagal Ditambahkan". mysqli_error();

  // }
}



//     $input = "INSERT INTO tb_bab VALUES ('$judul_bab', '$isi_bab')";
//     mysqli_query($con, $input);
// $index = 0;
// foreach ($judul_bab as $data_judul) {
// 	$input .= "('".$data_judul."','".$isi_bab[$index]."'),";
// 	$index++;
// }
//     $input = substr($input, 0, strlen($input) - 1).";";

// $input = "INSERT INTO tb_test(textt,texttt) VALUES ('$judul_bab', '$isi_bab')";
//     if (mysqli_query($con, $input)) {
//         // header("location: ../form_pembuatan_sk.php");
//         // echo "<script>alert('Data berhasil di tambahkan!');</script>";
//         echo "return confirm('Berhasil Menambahkan Data.')";
//     }else {
//         header("location: ../form_pembuatan_sk.php");
//         // echo "<script>alert('Data gagal di tambahkan!');</script>". mysqli_error($con);
//         echo "Gagal";
//     }

mysqli_close($con);

}
?>