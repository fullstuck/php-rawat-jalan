<?php
include "../koneksi.php";
$id_obat = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_obat WHERE id_obat='$id_obat'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'obat.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'obat.php'</script>";	
}
?>