<?php
include "../koneksi.php";
$id_dokter       = $_POST['id_dokter'];
$nama_dokter     = $_POST['nama_dokter'];
$spesialisasi    = $_POST['spesialisasi'];
$alamat   	   	 = $_POST['alamat'];
$no_hp           = $_POST['no_hp'];

$query = mysqli_query($koneksi, "UPDATE tb_dokter SET nama_dokter='$nama_dokter', spesialisasi='$spesialisasi', alamat='$alamat', no_hp='$no_hp' WHERE id_dokter='$id_dokter'")or die(mysql_error());
if ($query){
header('location:dokter.php');	
} else {
	echo "gagal";
    }
?>