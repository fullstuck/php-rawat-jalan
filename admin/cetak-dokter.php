<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
require('../fpdf17/fpdf.php');
require('../koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_dokter ORDER BY id_dokter ASC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_dokter = "";
$column_nama_dokter = "";
$column_spesialisasi = "";
$column_alamat = "";
$column_no_hp = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_dokter 		= $row["id_dokter"];
    $nama_dokter 	= $row["nama_dokter"];
	$spesialisasi 	= $row["spesialisasi"];
    $alamat 		= $row["alamat"];
	$no_hp 			= $row["no_hp"];
	
	
    $column_id_dokter	 	= $column_id_dokter.$id_dokter."\n";
    $column_nama_dokter 	= $column_nama_dokter.$nama_dokter."\n";
	$column_spesialisasi 	= $column_spesialisasi.$spesialisasi."\n";
    $column_alamat 			= $column_alamat.$alamat."\n";
	$column_no_hp	 		= $column_no_hp.$no_hp."\n";

	

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA DOKTER',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Berikut List Data Dokter',0,0,'C');
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

$pdf->SetX(5);
$pdf->Cell(10,8,'No.',1,0,'C',1);
$pdf->SetX(15);
$pdf->Cell(50,8,'Nama Dokter',1,0,'C',1);
$pdf->SetX(65);
$pdf->Cell(70,8,'Spesialisasi',1,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(40,8,'Alamat',1,0,'C',1);
$pdf->SetX(175);
$pdf->Cell(30,8,'No. HP',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,6,$column_id_dokter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,6,$column_nama_dokter,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(70,6,$column_spesialisasi,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(40,6,$column_alamat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(175);
$pdf->MultiCell(30,6,$column_no_hp,1,'C');


$pdf->Output();
}
?>
