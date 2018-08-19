<?php
include "../koneksi.php";
$id_rekmed = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_rekmed WHERE id_rekmed='$id_rekmed'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'rekap.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'rekap.php'</script>";	
}
?>