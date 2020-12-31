<?php
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
if(!isset($_SESSION)){
	session_start();
	ob_start();
	//header( "HTTP/* 404 NOT FOUND" );
} 
$koneksi=mysqli_connect("localhost","root","","epemilu");
//$koneksi=mysqli_connect("localhost","id8592240_epemilu321","crew321123","id8592240_epemilu");
$root_base = "epemilu/";
$img_loc=$root_base."img/";
setlocale(LC_ALL,'id_ID');
function chk_login(){
	$koneksi = $GLOBALS['koneksi'];
	if(isset($_SESSION['user']['login'])){
		$nim = $_SESSION['user']['login']['nim'];
		//$email = $_SESSION['tbl_user']['login']['email'];

		$qlogin = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE nim = '$nim'") or die(get_error());
		if(mysqli_num_rows($qlogin)==1){
			return mysqli_fetch_assoc($qlogin);
		}else{
			echo "<script>alert('Silakan Login Untuk Melanjutkan');window.location='index.php';</script>; ";
			//header("location=login.php");
		}
	}else{		
		echo "<script>alert('Silakan Login Untuk Melanjutkan');window.location='index.php';</script>; ";
		//header("location=login.php");
	}}
function get_error(){
	$koneksi = $GLOBALS['koneksi'];
	$data = "<!DOCTYPE html>
	<html>
	<head>
		<title>Get Some Errors</title>
		
	</head>
	<body style='
    /* background: #ffd400; */
    text-align: center;
    font-size: 2em;
    color: #ffc800;'>
    <p>
	Situs ini mengalami beberapa masalah,
	Mohon maaf atas kedidaknyamanannya.
	:(
	</p>
	</body>
	</html>";
	return $data.$koneksi->error;
	}
/*$ = $koneksi->query("SELECT * FROM `transaksi` WHERE `status` = 1");
while ($btrans = $atrans->fetch_assoc()) {
	$data['date'] = strtotime($btrans['tanggal_transaksi'])-strtotime("+2hour");
  $data['days'] = floor($data['date']/86400);
  $data['hour'] = floor(($data['date'] % 86400)/3600);
  $data['min'] = floor(($data['date'] % 3600)/60);
  $data['sec'] = ($data['date']%60);
	if($data['date']<0){
		$abarang = $koneksi->query("SELECT * FROM transaksi_barang tb INNER JOIN barang b on tb.id_barang = b.id_barang  WHERE id_transaksi=".$btrans['id_transaksi']);
		while ($bbarang = $abarang->fetch_assoc()) {
			$jum=$bbarang['jumlah']+$bbarang['stok_barang'];
			$koneksi->query("UPDATE `barang` SET `stok_barang`=$jum WHERE id_barang=".$bbarang['id_barang']);
		}
        $koneksi->query("UPDATE `transaksi` SET `status`=5 WHERE id_transaksi=".$btrans['id_transaksi']);
      }
}*/
?>