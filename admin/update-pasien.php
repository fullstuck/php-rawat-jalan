<?php
include "../koneksi.php";
$id_pasien       = $_POST['id_pasien'];
$no_badge        = $_POST['no_badge'];
$nama_pasien     = $_POST['nama_pasien'];
$jenis_kelamin   = $_POST['jenis_kelamin'];
$tgl_lahir       = $_POST['tgl_lahir'];
$tempat_lahir    = $_POST['tempat_lahir'];
$usia      		 = $_POST['usia'];
$agama      	 = $_POST['agama'];
$alamat          = $_POST['alamat'];
$no_hp           = $_POST['no_hp'];

$query = mysqli_query($koneksi, "UPDATE tb_pasien SET no_badge='$no_badge', nama_pasien='$nama_pasien', jenis_kelamin='$jenis_kelamin', tgl_lahir='$tgl_lahir',
tempat_lahir='$tempat_lahir', usia='$usia', agama='$agama', alamat='$alamat', no_hp='$no_hp' WHERE id_pasien='$id_pasien'")or die(mysql_error());
if ($query){
header('location:pasien.php');	
} else {
	echo "gagal";
    }
?>