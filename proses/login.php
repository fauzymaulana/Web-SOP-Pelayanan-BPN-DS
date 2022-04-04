<?php

session_start();

include '../connect/koneksi.php';

$email = $_POST['email'];
$pass = $_POST['password'];

$login = "SELECT * FROM tb_admin WHERE email ='".$email."' AND password ='".$pass."' LIMIT 1";

$result = mysqli_query($con,$login);

$jumlah = mysqli_num_rows($result);

if ($jumlah>0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["id"] = $row["id"];
    $_SESSION["nama"] = $row["nama"];
    $_SESSION["email"] = $row["email"];
    

    header("location: ../pages/dashboard.php");
}else {
    echo "Username atau Password salah";
     header('location: ../index.php');
}

?>