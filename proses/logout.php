<?php

session_start();

$_SESSION['id'];
$_SESSION['nama'];
$_SESSION['email'];

unset($_SESSION['id']);
unset($_SESSION['nama']);
unset($_SESSION['email']);


session_unset();
session_destroy();
header("location: ../index.php");

?>