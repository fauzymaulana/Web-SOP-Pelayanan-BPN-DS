<?php

include '../connect/koneksi.php';

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_admin WHERE id = '$id'";

if($con->query($query)) {
    header("location: ../lihatadmin.php");
?>
 <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> Success alert preview. This alert is dismissable.
                                    </div>
    <?php
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>