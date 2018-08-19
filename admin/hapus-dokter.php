<?php
include "../koneksi.php";
$id_dokter = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_dokter WHERE id_dokter='$id_dokter'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'dokter.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'dokter.php'</script>";	
}
?>