<?php
require_once('koneksi.php');

$lihat = "SELECT * FROM tb_admin";

$var = mysqli_query($con,$lihat);

$result = array();

while ($row = mysqli_fetch_array($var)) {
    array_push($result,array(
        'id' => $row['id'],
        'name' => $row['nama'] ));
}

echo json_encode(array('result' =>$result));
mysqli_close($con);

?>