<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    require_once('koneksi.php');

    $edit = "UPDATE tb_admin SET nama = '$name', email = '$email', password = '$pass' WHERE id = '$id'";

    if (mysqli_query($con,$edit)) {
        header('Location:editadmin.php?');
        echo "Data Berhasil Diubah";
    
    }else {
        header('Location:editadmin.php?');
        echo "Data gagal Diubah";
    }

    mysqli_close($con);
}

?>