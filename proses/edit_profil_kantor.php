<?php
include '../connect/koneksi.php';
$id_kntr = $_GET['id_profil_kantor'];

if (isset($_POST['submit'])) {
  $judul_kantor = $_POST['judul_kantor'];
  $gambar_kantor = $_FILES['gambar_kantor']['name'];
  $gambar_kantor_size = $_FILES['gambar_kantor']['size'];
  $deskripsi_kantor = $_POST['deskripsi_kantor'];

  $query_tampil = mysqli_query($con, "SELECT * FROM tb_profil_kantor ORDER BY id_profil_kantor DESC LIMIT 0,1");
  while ($data_kantor = mysqli_fetch_array($query_tampil)) {
    $id_kntr = $data_kantor['id_profil_kantor'];
    $judul_kantor = $data_kantor['judul_profil_kantor'];
    $gambar_kantor = $data_kantor['gambar_profil_kantor']['name'];

  }

  // timestamp
  $tz = 'Asia/Jakarta';
  $dt = new DateTime("now", new DateTimeZone($tz));
  $time = $dt->format('Y-m-d G:i:s');

  if ($gambar_kantor_size > 2097152) {
    // echo "<script>alert('Maksimal ukuran adalah 2MB.');window.location='../pengaturan.php';</script>";
    header("location:../pages/pengaturan.php?pesan=ukuranfile");
  } else {

    // cek dulu gambarnya jika ada jalankan program ini
    if ($gambar_kantor != "") {


      $require_ekstensi = array('png', 'jpg', 'jepg');
      // memisahkan nama file dengan ekstensinya
      $dot_pemisah = explode('.', $gambar_kantor);
      $ekstensi = strtolower(end($dot_pemisah));
      // nama file yang berada di dalam direktori temporer server
      $file_tmp = $_FILES['gambar_kantor']['tmp_name'];
      // membuat karakter random acak berdasarkan waktu upload
      $tgl = md5(date('Y-m-d h:i:s'));
      // menyatukan karakter tanggal dengan nama file aslinya
      $nama_gambar_baru = $tgl . '-' . $gambar_kantor;

      // mengecek apakah ekstensi file sesuai dengan ekstensi file yang diupload 
      if (in_array($ekstensi, $require_ekstensi) === true) {

        // memindahkan file kedalam folder "Gambar"
        move_uploaded_file($file_tmp, '../gambar/' . $nama_gambar_baru);
        $tampung_nama = '../gambar/' . $nama_gambar_baru;
        // cek dimensi gambar
        $max_img_width = 1000; // piksel
        $max_img_height = 1000; // piksel
        $img_info = array();

        if (!($img_info = getimagesize($tampung_nama))) {
          header("location:../pages/pengaturan.php?pesan=dimensi");

         
          
        }else{
          if (($img_info[0] === $max_img_width) && ($img_info[1] === $max_img_height)) {
            // query
            $query_insert = "UPDATE tb_profil_kantor SET gambar_profil_kantor='$tampung_nama', judul_profil_kantor='$judul_kantor', deskripsi_kantor='$deskripsi_kantor' WHERE id_profil_kantor='$id_kntr'";
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
        header("location:../pages/pengaturan.php?pesan=atribut");
      }
    } else {
      
      header("location:../pages/pengaturan.php?pesan=atribut");
    }

  }
}
