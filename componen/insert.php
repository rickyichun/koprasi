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
		$noagt 			= 'coba123321';
		
		$query = mysqli_query($conn, "INSERT INTO anggota (id, noagt, nama, jk, binbinti, tempatlhr, tgllhr, nik, alamat, kongsi1, kongsi2, kongsi3, notelp)
			VALUES ('', '$noagt', '$nama', '$jk', '$binbinti', '$tmptlhr', '$tgllhr', '$nik', '$alamat', '$kongsi1', '$kongsi2', '$kongsi3', '$notlp')");

			
		if ($query){
			echo "<script>alert('Data Anggota Berhasil dimasukan!'); window.location = '../datapeserta.php'</script>";	
		} else {
			echo "<script>alert('Data Anggota Gagal dimasukan!'); window.location = '../datapeserta.php'</script>";	
		}
     
    break;
	
	case 3:
		//insert Invoice Sementara
		$tgl		= $_POST['tgl'];
		$idbarang	= $_POST['barang'];
		$qty		= $_POST['qty'];
		$pelanggan	= $_POST['pelanggan'];
		$marketing	= 1;
		$noform 	= $_POST['noform'];
		$status		= 'onProses';
		$ppn 		= 'no';

			//ambil master
			$tampil2=mysqli_query($conn, "SELECT * from barang WHERE id='$idbarang'");
			$data2	=mysqli_fetch_array($tampil2);
			$hargajual 	= $data2['hargajual'];
			$hargabeli 	= $data2['hargabeli'];
			$qtylama 	= $data2['qty'];
			$margin 	= $data2['margin'];
			$namabrg 	= $data2['namabrg'];		

		//cek barang double
		$query3 	= mysqli_query($conn, "SELECT * FROM tmp_invoice WHERE idbrg = '$idbarang'");
		$cekbrgdbl  = mysqli_num_rows($query3);
		$brg   		= mysqli_fetch_array($query3);
		
		//cek noInvoice
		$ceknoin  = is_numeric($noform);

		if($ceknoin != true){
			echo "<script>alert('No Invoice Gagal, silahkan ulangi proses input keluar!'); window.location = '../penjualan.php'</script>";	
		} else if ($cekbrgdbl>0){
			$noform = $brg['noinvoice'];
			echo "<script>alert('Barang $namabrg sudah di input di invoice!'); window.location = '../inputmultiple.php?inv=$noform'</script>";	
		} else {

			//hitung QTY
			$totalqty	  = $qtylama-$qty;
			
			//cekstok	
			if($totalqty<0){
				echo "<script>alert('Saldo Minus, Transaksi Gagal dimasukan!'); window.location = '../penjualan.php'</script>";
			} else {
				
				$query = mysqli_query($conn, "INSERT INTO tmp_invoice (id, noinvoice, tgltrx, idbrg, qty, hargajual, hargabeli, margin, idpel, iduser, idmkt, status, ppn, tglupdate)
					VALUES ('', '$noform', '$tgl', '$idbarang','$qty', '$hargajual', '$hargabeli', '$margin','$pelanggan','$iduser', '$marketing','$status', '$ppn', '$timestamp')");
				//simpanLog
				// $keter = $fullname." menambahkan barang ".$namabrg." pada Inovice ".$noform ; 
				// $querylog = mysqli_query($conn, "INSERT INTO daf_log (id, keterangan, iduser, tanggal)
				// VALUES ('', '$keter','$iduser','$timestamp')");
				if ($query){
					echo "<script>alert('Berhasil, silahkan tambah item lainnya!'); window.location = '../inputmultiple.php?inv=$noform'</script>";	
				} else {
					echo "<script>alert('Transaksi Keluar Gagal dimasukan!'); window.location = '../penjualan.php'</script>";	
				}
			}
		}
		
		break;

	case 4:
		//insert Invoice Final
		$noform		= $_GET['inv'];
			//pindah tabel
			$simpan = mysqli_query($conn, "INSERT INTO riw_keluar (noform, tgltrx, idbarang, qtyout, hargajual, hargabeli, margin, margin_sls, idpel, status,  iduser, idmkt, tglupdate) SELECT noinvoice, tgltrx, idbrg, qty, hargajual, hargabeli, margin, margin_sls, idpel, status, iduser,  idmkt, tglupdate FROM tmp_invoice WHERE noinvoice='$noform'");
			//tambah Daf_Invoice
			$dat	= mysqli_query($conn, "SELECT * from daf_invoice where noinvoice='$noform'");
			$cekinv = mysqli_num_rows($dat);
			if($cekinv == 0){
				$simpan1 =mysqli_query($conn, "INSERT INTO daf_invoice (noinvoice, tgltrx, idpel, idmkt, status, ppn, tglupdate) SELECT noinvoice, tgltrx, idpel, idmkt, 'onProses', ppn, tglupdate FROM tmp_invoice WHERE noinvoice='$noform' LIMIT 1");
			}	
			$tampil = mysqli_query($conn, "SELECT * from tmp_invoice");
			while($data=mysqli_fetch_array($tampil)){
				$idpel 		= $data['idpel'];
				$idbarang 	= $data['idbrg'];
				$noform 	= $data['noinvoice'];
				$marginpel 	= $data['hargajual']-$data['hargabeli'];
				$qty 		= $data['qty'];
				// $query 		= mysqli_query($conn, "INSERT INTO margin_pel (id, idpel, idbrg, noform, margin) VALUES ('', '$idpel', '$idbarang','$noform', '$marginpel')");	
			// update stok barang
			$tampil1 = mysqli_query($conn, "SELECT * from barang WHERE id='$idbarang'");
			$data1	 = mysqli_fetch_array($tampil1);
			$qtylama = $data1['qty'];
			$totalqty = $qtylama-$qty;
				if($totalqty==0){
					$query1 = mysqli_query($conn, "UPDATE barang SET  qty='$totalqty', hargabeli=0, hargajual=0, tglupdate='$timestamp' WHERE id='$idbarang'");
				} else {
					$query1 = mysqli_query($conn, "UPDATE barang SET  qty='$totalqty', tglupdate='$timestamp' WHERE id='$idbarang'");
				}
			}
			
		if($query1){
			//simpanLog
			// $keter = $fullname." menerbitkan Inovice ".$noform ; 
			// $querylog = mysqli_query($conn, "INSERT INTO daf_log (id, keterangan, iduser, tanggal)
			// VALUES ('', '$keter','$iduser','$timestamp')");
			$hapus =mysqli_query($conn, "TRUNCATE TABLE tmp_invoice");
				echo "<script>alert('Berhasil, Invoce telah terbit!'); window.location = '../daftarinvoice.php'</script>";
		} else {
				echo "<script>alert('Transaksi Keluar Gagal dimasukan!'); window.location = '../penjualan.php'</script>";	
			}
		
		break;

	case 5:
		//batalkan Nota
			//simpanLog
			// $keter = $fullname." mebatalkan Nota "; 
			// $querylog = mysqli_query($conn, "INSERT INTO daf_log (id, keterangan, iduser, tanggal)
			// VALUES ('', '$keter','$iduser','$timestamp')");

		$hapus =mysqli_query($conn, "TRUNCATE TABLE tmp_nota");
		
		if($hapus){
				echo "<script>alert('Berhasil, Nota telah dibatalkan!'); window.location = 'masuk.php'</script>";	
		} else {
				echo "<script>alert('Nota Gagal dibatalkan!'); window.location = 'masuk.php'</script>";	
			}
			
		break;

}
?>