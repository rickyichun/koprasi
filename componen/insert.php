<?php
include "basisdata.php";
include "cek-login.php" ;
ini_set('date.timezone', 'Asia/Jakarta');
$mode = $_GET['mode'];
$iduser = $_SESSION['user_id'];
$fullname = $_SESSION['fullname'];
$timestamp	= date('Y-m-d h:m:s');

switch ($mode) {
	case 1:
	//insert master
		$kode    	= $_POST['kode'];
		$nama	 	= $_POST['nama'];
		// $jenis	    = $_POST['jenis'];
		$margin	    = $_POST['margin'];
		$hargah		= $_POST['hargabeli'];
		$qty		= $_POST['qty'];
		$satuan		= $_POST['satuan'];
		
		//hilangkan rp pada harga
		$harga_str = preg_replace("/[^0-9]/", '', $hargah);
		$hargabeli = (int) $harga_str;

		//CEK KODE BARANG Duplicate
		$qcek=mysqli_query($conn, "SELECT * from barang WHERE kodebrg='$kode' OR namabrg='$nama'");
		$cek=mysqli_num_rows($qcek);
		if($cek>0){
			echo "<script>alert('Input Gagal! Kode Barang/Nama Barang Duplicate!'); window.location = '../inputbarang.php'</script>";
		} else {

			//hitung harga jual
			if($margin<=1){
				$hargajualan = $hargabeli + ($margin * $hargabeli);
				$hargajual =ceil($hargajualan);
				
			} else {
				$hargajual = $hargabeli + $margin ;
			}

			//pembulatan
			if (substr($hargajual,-2)>0 && substr($hargajual,-2)<=49){
				$hargajual=round($hargajual,-2)+100;
			} else if(substr($hargajual,-2)>=50) {
				$hargajual=round($hargajual,-2);
			}
			
			$query = mysqli_query($conn, "INSERT INTO barang (id, kodebrg, namabrg, jenis, hargabeli, hargajual, qty, satuan, margin, tglupdate)
			VALUES ('', '$kode', '$nama', 1, '$hargabeli', '$hargajual', '$qty', '$satuan', '$margin', '$timestamp')");
			
				//ambil ID barang
				$tampil=mysqli_query($conn, "SELECT * from barang order by id desc LIMIT 1");
				$data=mysqli_fetch_array($tampil);
				$ide = $data['id'];
				
			$qmasuk = mysqli_query($conn, "INSERT INTO riw_masuk (id, noform, tgltrx, idbarang, qtyin, hargabeli, hargaavg, status, idsup, iduser, tglupdate)
			VALUES ('', 'S.Awal', '2025-01-01', '$ide', '$qty', '$hargabeli', '$hargabeli', 'Done', 1, 1, '$timestamp')");
			

			// $query1 = mysqli_query($conn, "INSERT INTO margin (id, idbarang, margin, tglupdate)
			// VALUES ('', '$ide', '$margin', '$timestamp')");

			// //simpanLog
			// $keter = $fullname." menambahkan barang BARU ".$nama ; 
			// $querylog = mysqli_query($conn, "INSERT INTO daf_log (id, keterangan, iduser, tanggal)
			// VALUES ('', '$keter','$iduser','$timestamp')");
			
			if ($query){
				echo "<script>alert('Data Barang Berhasil dimasukan!'); window.location = '../barang.php'</script>";	
			} else {
				echo "<script>alert('Data Barang Gagal dimasukan!'); window.location = '../barang.php'</script>";	
			}
		}
			
		break;

    case 2:
    //insert Peserta
    $nama    	    = $_POST['nama'];
    $jk	 	        = $_POST['jk'];
    $binbinti	 	= $_POST['binbinti'];
    $tmptlhr        = $_POST['tmptlhr'];
    $tgllhr         = $_POST['tgllhr'];
    $nik	    	= $_POST['nik'];
    $alamat 		= $_POST['alamat'];
    $kongsi1		= $_POST['kongsi1'];
    $kongsi2		= $_POST['kongsi2'];
    $kongsi3		= $_POST['kongsi3'];
    $notlp	    	= $_POST['notlp'];
    $noagt = 123123321;
    
    $query = mysqli_query($conn, "INSERT INTO anggota (id, noagt, nama, jk, binbinti, tempatlhr, tgllhr, nik, alamat, kongsi1, kongsi2, kongsi3, notelp)
        VALUES ('', '$noagt', '$nama', '$jk', '$binbinti', '$tmptlhr', '$tgllhr', '$nik', '$alamat', '$kongsi1', '$kongsi2', '$kongsi3', '$notlp')");

        
    if ($query){
        echo "<script>alert('Data Anggota Berhasil dimasukan!'); window.location = '../datapeserta.php'</script>";	
    } else {
        echo "<script>alert('Data Anggota Gagal dimasukan!'); window.location = '../datapeserta.php'</script>";	
    }
    
        
    break;
}
?>