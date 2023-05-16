<?php
include 'koneksiDB.php'; 

//$id = '1';
$id = $_POST['id'];

 $hasil  = mysqli_query($koneksi,"select * from kuis_hdr inner join member on (khdr_mb_id = mb_id) where khdr_id = '".$id."'");
 
 if(mysqli_num_rows($hasil)> 0){

 while ($row = mysqli_fetch_assoc($hasil)) {
	 
	 $nama =  $row['mb_nama'];
	 $nilai =  $row['khdr_nilai'];
	 
 }
 
 }
 
 require('fpdf182/fpdf.php');
 
 // intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',30);
// mencetak string 
$pdf->setY(50);
$pdf->Cell(280,10,'SERTIFIKAT UJIAN',0,1,'C');

$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->setY(70);
$pdf->Cell(280,10,'Dengan ini diberikan kepada',0,1,'C');

$pdf->SetFont('Arial','B',24);
// mencetak string 
$pdf->setY(90);
$pdf->Cell(280,10,$nama,0,1,'C');

$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->setY(110);
$pdf->Cell(280,10,'Telah mengikuti ujian dengan nilai',0,1,'C');

$pdf->SetFont('Arial','B',24);
// mencetak string 
$pdf->setY(120);
$pdf->Cell(280,10,$nilai,0,1,'C');

$filename="./..//sertifikat/".$id.".pdf";
$pdf->Output($filename,'F');
//$pdf->Output();


?>