<?php

session_start();

include "basisdata.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$dat	  = mysqli_query($conn, "SELECT * from tb_user where username='$username' and password='$password'");
$data	  = mysqli_fetch_array($dat);
$cek  	  = mysqli_num_rows($dat);
$iduser	  = $data['user_id'];
$fullname = $data['fullname'];
$role	  = $data['role'];

if($cek > 0){
	// kalau username dan password sudah terdaftar di database
	// buat session dengan nama username dengan isi nama user yang login
   
	$_SESSION['username'] = $username;
	$_SESSION['role']  	  = $role;
	$_SESSION['user_id']  = $iduser;
	$_SESSION['fullname']  = $fullname;
	$_SESSION['cekmasuk']  = "terverif";

	//simpanLog
	// $timestamp	= date('Y-m-d h:m:s');
	// $keter = $fullname." melakukan login" ; 
	// $querylog = mysqli_query($conn, "INSERT INTO daf_log (id, keterangan, iduser, tanggal)
	// VALUES ('', '$keter','$iduser','$timestamp')");

	// redirect ke halaman users [menampilkan semua users]
	header('location:../index.php');
} else {
	// kalau username ataupun password tidak terdaftar di database
	
	header('location:../login.php?error=1');
}
?>