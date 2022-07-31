<?php
require('include/fpdf.php');
include_once 'inc/class.perpus.php';

	$user = 'root';
	$pass = '';
	$db = 'db_perpus';
	$host = 'localhost';

	$koneksi = mysqli_connect($host, $user, $pass, $db) or mysqli_errno();
class myPDF extends FPDF{
	function header()
	{
		$this->Image('img/baru.jpg',1,0.5,50);
		$this->SetFont('Arial', 'B', 24);
		$this->Cell(220,5,'Perpustakaan Andreas Novito Sano', 0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(221,10,'Villa Bekasi Indah 2 Jl. Edelweis F Blok E7 No 34 - Tambun Selatan',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(221,2,'Kabupaten Bekasi Jawa Barat 17510',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(221,9.5,'Telepon(021)11111111,  Fax.(021)88888888',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(221,1,'Email : andreasnovitoandi17@gmail.com',0,0,'C');
		$this->Line(5, 40, 205, 40);
		$this->Line(5, 41, 205, 41);
		$this->Ln(11);
		$this->Cell(60,0.1,'Tanggal Cetak : '.date("d F Y"), 0,0,'C');
		$this->Ln(10);
		$this->SetFont('Times','B',12);
		$this->Cell(190,10,'LAPORAN DATA ANGGOTA PERPUSTAKAAN',0,0,'C');
		$this->Ln(20);
		
	}

	function footer()
	{
		$this->SetY(-130);
		$this->SetFont('Arial', '', 10);
		$this->Cell(300,5,'Mengetahui,',0,0,'C');
		$this->Ln();
		$this->SetFont('Arial', '', 10);
		$this->Cell(315,5,'Kepala Perpustakaan', 0,0,'C');
		$this->Ln(30);
		$this->SetFont('Arial', 'U', 10);
		$this->Cell(321,5,'(Pius Arya Krisna Yudha)', 0,0,'C');
		// $this->Line(5, 200, 290, 200);
		$this->SetY(-10);
		$this->Line(5, 288, 205, 288);
		$this->SetFont('Arial','',8);
		$this->Cell(38,10,'Bagian Pengelola Perpustakaan',0,0,'C');
		$this->Cell(300,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		// $this->Cell(50,10,'Di Cetak Pada : '.date("d/m/y"),0,0,'R');
		// $this->Cell(450,10,"Di Cetak Pada : ".date("D/m/Y"),0,0,'R');
	}

	function headertable()
	{
		$this->SetFont('Arial','B', 8);
		$this->Cell(20,8,'NIS',1,0,'C');
		$this->Cell(28,8,'NAMA',1,0,'C');
		$this->Cell(29,8,'TEMPAT LAHIR',1,0,'C');
		$this->Cell(30,8,'TANGGAL LAHIR',1,0,'C');
		$this->Cell(25,8,'JENIS KELAMIN',1,0,'C');
		$this->Cell(28,8,'JURUSAN',1,0,'C');
		$this->Cell(30,8,'TAHUN MASUK',1,0,'C');
		$this->Ln();

	}
	function data()
	{
		date_default_timezone_set('Asia/Jakarta');
		global $koneksi;
		$this->SetFont('Times','B', 8);
		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_anggota");
 		while ($row = mysqli_fetch_assoc($sql)) {
 			$this->SetFont('Arial','', 8);
			$this->Cell(20,8,$row['nim'],1,0,'C');
			$this->Cell(28,8,$row['nama'],1,0,'C');
			$this->Cell(29,8,$row['tempat_lahir'],1,0,'C');
			$this->Cell(30,8,$row['tgl_lahir'],1,0,'C');
			$this->Cell(25,8,$row['jk'],1,0,'C');
			$this->Cell(28,8,$row['prodi'],1,0,'C');
			$this->Cell(30,8,$row['thn_masuk'],1,0,'C');
			$this->Ln();

		}
	}
}


$pdf = new myPDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
$pdf->headertable();
$pdf->data();
// $pdf->headerTable($lap_dep);
$pdf->Output();

?>