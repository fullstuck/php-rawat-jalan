<?php
include "../koneksi.php";
$id_obat       = $_POST['id_obat'];
$nama_obat     = $_POST['nama_obat'];
$jenis_obat    = $_POST['jenis_obat'];
$kategori      = $_POST['kategori'];

$query = mysqli_query($koneksi, "UPDATE tb_obat SET nama_obat='$nama_obat', jenis_obat='$jenis_obat', kategori='$kategori' WHERE id_obat='$id_obat'")or die(mysql_error());
if ($query){
header('location:obat.php');	
} else {
	echo "gagal";
    }
?>