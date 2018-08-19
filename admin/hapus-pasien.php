<?php
include "../koneksi.php";
$id_pasien = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_pasien WHERE id_pasien='$id_pasien'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'pasien.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'pasien.php'</script>";	
}
?>