<?php
include '../connect/koneksi.php';
$id_penulis = $_GET['id_profil_penulis'];

if (isset($_POST['submit'])) {
  $nama_penulis = $_POST['nama_penulis'];
  $gambar_penulis = $_FILES['gambar_penulis']['name'];
  $gambar_penulis_size = $_FILES['gambar_penulis']['size'];
  $deksripsi_penulis = $_POST['deksripsi_penulis'];

  // timestamp
  $tz = 'Asia/Jakarta';
  $dt = new DateTime("now", new DateTimeZone($tz));
  $time = $dt->format('Y-m-d G:i:s');

  if ($gambar_penulis_size > 2097152) {
    // echo "<script>alert('Maksimal ukuran adalah 2MB.');window.location='../pengaturan.php';</script>";
    header("location:../pages/pengaturan.php?pesan=ukuranfile");
  } else {

    // cek dulu gambarnya jika ada jalankan program ini
    if ($gambar_penulis != "") {


      $require_ekstensi = array('png', 'jpg', 'jepg');
      // memisahkan nama file dengan ekstensinya
      $dot_pemisah = explode('.', $gambar_penulis);
      $ekstensi = strtolower(end($dot_pemisah));
      // nama file yang berada di dalam direktori temporer server
      $file_tmp = $_FILES['gambar_penulis']['tmp_name'];
      // membuat karakter random acak berdasarkan waktu upload
      $tgl = md5(date('Y-m-d h:i:s'));
      // menyatukan karakter tanggal dengan nama file aslinya
      $nama_gambar_baru = $tgl . '-' . $gambar_penulis;

      // mengecek apakah ekstensi file sesuai dengan ekstensi file yang diupload 
      if (in_array($ekstensi, $require_ekstensi) === true) {

        // memindahkan file kedalam folder "Gambar"
        move_uploaded_file($file_tmp, '../gambar/penulis/' . $nama_gambar_baru);
        $tampung_nama = '../gambar/penulis/' . $nama_gambar_baru;
        // cek dimensi gambar 3X4
        $max_img_width = 177; // piksel
        $max_img_height = 236; // piksel
        $img_info = array();

        if (!($img_info = getimagesize($tampung_nama))) {
          // echo "<script>alert('Dimensi gambar tidak sesuai.');window.location='../pengaturan.php';</script>";
          header("location:../pages/pengaturan.php?pesan=dimensi");

         
          
        }else{
          
          if (($img_info[0] === $max_img_width) && ($img_info[1] === $max_img_height)) {
            // query
            $query_insert = "UPDATE tb_profil_penulis SET nama_profil_penulis = '$nama_penulis', deskripsi_penulis='$deksripsi_penulis',gambar_penulis='$nama_gambar_baru' WHERE id_profil_penulis='$id_penulis'";

            // $query_insert = "INSERT INTO tb_profil_penulis(nama_profil_penulis, deskripsi_penulis, gambar_penulis, created_at) VALUES('$nama_penulis', '$deksripsi_penulis', '$nama_gambar_baru', '$time')";
            $result = mysqli_query($con, $query_insert);
            if (!$result) {
              header("location:../pages/pengaturan.php?pesan=gagal");
              // die("Data gagal disimpan" . mysqli_errno($con) . "-" . mysqli_error($con));
            } else {
              header("location:../pages/pengaturan.php?pesan=berhasil");
            }
          } else {
            header("location:../pages/pengaturan.php?pesan=dimensi");

          } 
        }

      } else {
        // echo "<script>alert('Gunakan gambar png atau jpg.');window.location='../pengaturan.php';</script>";
        header("location:../pages/pengaturan.php?pesan=atribut");
      }
    } else {
      
      header("location:../pages/pengaturan.php?pesan=atribut");
    }

  }

}
