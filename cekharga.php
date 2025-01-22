<?php
include "componen/basisdata.php";
$mode = $_GET['mode'];

switch ($mode) {
	case 1:
        $cek = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * from barang where id = '$cek'";
        $process = mysqli_query($conn, $sql);
        $harga = mysqli_fetch_array($process);
        echo "Rp. ".number_format($harga['hargajual'],0,',','.')."<br/> Sisa Stock = ".$harga['qty']." ".$harga['satuan'];
        break;

    case 2:
        $cek = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * from barang where id = '$cek'";
        $process = mysqli_query($conn, $sql);
        $harga = mysqli_fetch_array($process);
        echo $harga['satuan'];
        break;
    }