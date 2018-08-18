<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
require('../fpdf17/fpdf.php');
require('../koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_rekmed a JOIN tb_pasien b ON a.id_pasien=b.id_pasien 
JOIN tb_dokter c ON a.id_dokter=c.id_dokter ORDER BY tgl_rekmed DESC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_rekmed = "";
$column_tgl_rekmed = "";
$column_id_pasien = "";
$column_id_dokter = "";
$column_nama_obat = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_rekmed 		= $row["id_rekmed"];
    $tgl_rekmed 	= $row["tgl_rekmed"];
	$id_pasien 		= $row["nama_pasien"];
    $id_dokter 		= $row["nama_dokter"];
	$nama_obat 		= $row["nama_obat"];
	
	
    $column_id_rekmed 		= $column_id_rekmed.$id_rekmed."\n";
    $column_tgl_rekmed 		= $column_tgl_rekmed.$tgl_rekmed."\n";
	$column_id_pasien 		= $column_id_pasien.$id_pasien."\n";
    $column_id_dokter 		= $column_id_dokter.$id_dokter."\n";
	$column_nama_obat 		= $column_nama_obat.$nama_obat."\n";
	

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA REKAP MEDIS',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Berikut List Data Rekap Medis',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(207,207,207);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX(10);
$pdf->Cell(10,8,'No.',1,0,'C',1);
$pdf->SetX(20);
$pdf->Cell(30,8,'Tgl. Rekap',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(30,8,'Nama Pasien',1,0,'C',1);
$pdf->SetX(80);
$pdf->Cell(30,8,'Nama Dokter',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(80,8,'Nama Obat',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);



$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(10,6,$column_id_rekmed,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(30,6,$column_tgl_rekmed,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(30,6,$column_id_pasien,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(80);
$pdf->MultiCell(30,6,$column_id_dokter,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(80,6,$column_nama_obat,1,'L');

$pdf->Output();
}
?>
