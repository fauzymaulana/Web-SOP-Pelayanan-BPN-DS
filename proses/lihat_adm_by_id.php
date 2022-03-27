<?php

$id = $_GET['id'];

require_once('koneksi.php');

$lihat = "SELECT * FROM tb_admin WHERE id=$id";

$var = mysqli_query($con,$lihat);

$result = array();
$row = mysqli_fetch_array($var);
array_push($result, array(
    'id'       =>  $row['id'],
    'nama'     =>  $row['nama'],
    'email'    =>  $row['email'],
    'password' =>  $row['password']
));

echo json_encode(array('result'=>$result));

mysqli_close($con);

?>