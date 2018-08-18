<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
require('../fpdf17/fpdf.php');
require('../koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_pasien ORDER BY id_pasien ASC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_pasien = "";
$column_no_badge = "";
$column_nama_pasien = "";
$column_usia = "";
$column_alamat = "";
$column_no_hp = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_pasien 		= $row["id_pasien"];
    $no_badge	 	= $row["no_badge"];
	$nama_pasien 	= $row["nama_pasien"];
    $usia		 	= $row["usia"];
	$alamat		 	= $row["alamat"];
    $no_hp		 	= $row["no_hp"];
	
    $column_id_pasien	 	= $column_id_pasien.$id_pasien."\n";
    $column_no_badge	 	= $column_no_badge.$no_badge."\n";
	$column_nama_pasien 	= $column_nama_pasien.$nama_pasien."\n";
    $column_usia		 	= $column_usia.$usia."\n";
	$column_alamat		 	= $column_alamat.$alamat."\n";
    $column_no_hp		 	= $column_no_hp.$no_hp."\n";

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PASIEN',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Berikut List Data Pasien',0,0,'C');
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
$pdf->Cell(20,8,'No. Badge',1,0,'C',1);
$pdf->SetX(40);
$pdf->Cell(50,8,'Nama Pasien',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(15,8,'Usia',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(65,8,'Alamat',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(30,8,'No. HP',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(10,6,$column_id_pasien,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(20,6,$column_no_badge,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(50,6,$column_nama_pasien,1,'L');

$pdf->SetY($Y_Table_Position);	
$pdf->SetX(90);
$pdf->MultiCell(15,6,$column_usia,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(65,6,$column_alamat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(30,6,$column_no_hp,1,'C');

$pdf->Output();
}
?>
