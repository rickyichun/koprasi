<?php
include "componen/basisdata.php";
$tanggal = $_POST['tanggal'];
$bulan   = $_POST['bulan'];
$tahun   = $_POST['tahun'];
$tahun2d = $_POST['thn'];
$process = mysqli_query($conn, "SELECT * from daf_invoice WHERE MONTH(tgltrx)='$bulan' and YEAR(tgltrx)='$tahun' ORDER BY id DESC LIMIT 1");
$datah   = mysqli_fetch_array($process);
    if(mysqli_num_rows($process)!=null){
        $noLm          = $datah['noinvoice'];
        $bln           = $bulan;
        $thn           = $tahun2d;
        $tgl           = sprintf("%02s", $tanggal);
        // $blnTkt        = sprintf("%02s", (int) substr($noLm, 4, 2));
        $blnTkt        = sprintf("%02s", (int) substr($noLm, 3, 2));
        $ThnTkt        = sprintf("%02s", (int) substr($noLm, 0, 2));
        $noU           = (int) substr($noLm, 7, 3);
        $noUrut        = (int) $noU + 1;
        // $noform        = $thn."/". $bln ."/".$tgl."/".sprintf("%03s", $noUrut);
        $noform        = $thn.$bln.$tgl.sprintf("%03s", $noUrut);
    } else{
        $bln           = $bulan;
        $thn           = $tahun2d;  
        $tgl           = sprintf("%02s", $tanggal);
        $noU           = 0;
        $noUrut        = (int) $noU + 1;
        $noform        = $thn.$bln.$tgl.sprintf("%03s", $noUrut);    
    }
    //Cek no invoice Double
    $query3        = mysqli_query($conn, "SELECT * FROM daf_invoice WHERE noinvoice='$noform'");
    $ceknoinv      = mysqli_num_rows($query3);
    if($ceknoinv > 0){
        $noSama = $noUrut+1;
        // $noforms = $thn."/". $bln ."/".$tgl."/".sprintf("%03s", $noSama); 
        $noforms = $thn.$bln.$tgl.sprintf("%03s", $noSama); 
    } else{
        $noforms=$noform;
    }
    echo $noforms;