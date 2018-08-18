<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
require('../fpdf17/fpdf.php');
require('../koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_obat ORDER BY id_obat ASC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_obat = "";
$column_nama_obat = "";
$column_jenis_obat = "";
$column_kategori = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_obat 			= $row["id_obat"];
    $nama_obat 			= $row["nama_obat"];
	$jenis_obat 		= $row["jenis_obat"];
    $kategori 			= $row["kategori"];
	
    $column_id_obat 	= $column_id_obat.$id_obat."\n";
    $column_nama_obat 	= $column_nama_obat.$nama_obat."\n";
	$column_jenis_obat 	= $column_jenis_obat.$jenis_obat."\n";
    $column_kategori 	= $column_kategori.$kategori."\n";

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA OBAT',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Berikut List Data Obat',0,0,'C');
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

$pdf->SetX(20);
$pdf->Cell(10,8,'No.',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(100,8,'Nama Obat',1,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(30,8,'Jenis Obat',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(30,8,'Kategori Obat',1,0,'C',1);


$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(10,6,$column_id_obat,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(100,6,$column_nama_obat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(130);
$pdf->MultiCell(30,6,$column_jenis_obat,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(30,6,$column_kategori,1,'C');

$pdf->Output();
}
?>
