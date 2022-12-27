<?php 
include('../koneksi/koneksi.php');
$tag = $_POST['tag'];
if(empty($tag)){
	header("Location:index.php?include=tag&notif=tambahtagkosong");
}else{
	$sql = "insert into `tag` (`tag`) values ('$tag')";
	mysqli_query($koneksi,$sql);
header("Location:index.php?include=tag&notif=tambahtagberhasil");	
}
?>