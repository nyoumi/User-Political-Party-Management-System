<?php
date_default_timezone_set("Africa/Harare");
require '../db/DB.php';
require 'fpdf/fpdf.php';

//getting notification
$column = array('id', 'id_no', 'firstname', 'lastname', 'DOB', 'gender', 'department', 'province_id', 'district', 'branch', 'cell');

$query = "SELECT id, id_no, firstname, lastname, DOB, gender, department, province_id, district, branch, cell FROM people";
$statement = $db->prepare($query);
$statement->execute();
$count = $statement->rowCount();
$result = $statement->fetchAll();


class PDF extends FPDF
{

	var $angle = 0;
	// Page header
	function Header()
	{
		$image_file='../images/zanu.jpg';
		$this->Image($image_file,20,10,40,27);
		
		// Set font
		$this->SetFont('Arial', 'B', 14);
		// Title
		$this->SetX(85);
		$this->Cell(100, 5, "ZANU PF DOCUMENTS", 0, 0, 'C');
		$this->Ln(5);
		$this->SetX(85);
		$this->SetFont('Times', 'B', 12);
		$this->Cell(100, 10, "User Info For Zanu PF ", 0, 0, 'C');
		$this->ln(30);
	}

	function Rotate($angle, $x = -1, $y = -1)
	{
		if ($x == -1)
			$x = $this->x;
		if ($y == -1)
			$y = $this->y;
		if ($this->angle != 0)
			$this->_out('Q');
		$this->angle = $angle;
		if ($angle != 0) {
			$angle *= M_PI / 180;
			$c = cos($angle);
			$s = sin($angle);
			$cx = $x * $this->k;
			$cy = ($this->h - $y) * $this->k;
			$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
		}
	}

	//water marks
	function temporaire($texte)
	{
		$this->SetFont('Arial', 'B', 50);
		$this->SetTextColor(203, 203, 203);
		$this->Rotate(45, 55, 190);
		$this->Text(55, 190, $texte);
		$this->Rotate(0);
		$this->SetTextColor(0, 0, 0);
	}



	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetTextColor(0, 0, 0);
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial', 'BI', 9);
		//Page number
		$date = date('D jS M Y');
		$this->SetX(15);
		$this->Cell(0, 10, 'User Information PDF Printed on : ' . $date, 0, 0, 'C');
		$this->Cell(0, 10, 'Page ' . $this->PageNo() . ' of {nb}', 0, 0, 'R');
	}
	function headerTable()
	{
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(30, 10, 'Id', 1, 0, 'C');
		$this->Cell(30, 10, 'Name', 1, 0, 'C');
		$this->Cell(30, 10, 'Surname', 1, 0, 'C');
		$this->Cell(30, 10, 'Gender', 1, 0, 'C');
		$this->Cell(30, 10, 'Position', 1, 0, 'C');
		$this->Cell(30, 10, 'Province', 1, 0, 'C');
		$this->Cell(30, 10, 'District', 1, 0, 'C');
		$this->Cell(30, 10, 'Branch', 1, 0, 'C');
		$this->Cell(30, 10, 'Cell', 1, 0, 'C');
		$this->ln();
	}
	function viewTable($db)
	{
		$query = "SELECT id, id_no, firstname, lastname, DOB, gender, department, province_id, district, branch, cell FROM people";
		$statement = $db->prepare($query);
		$statement->execute();
		$count = $statement->rowCount();
		$result = $statement->fetchAll();

		foreach ($result as $row) {
			$this->SetFont('Times', '', 12);
			$this->Cell(30, 10, $row['id'], 1, 0, 'L');
			$this->Cell(30, 10, $row['firstname'], 1, 0, 'L');
			$this->Cell(30, 10, $row['lastname'], 1, 0, 'L');
			$this->Cell(30, 10, $row['gender'], 1, 0, 'L');
			$this->Cell(30, 10, $row['department'], 1, 0, 'L');
			$this->Cell(30, 10, get_province($db,$row['province_id']), 1, 0, 'L');
			$this->Cell(30, 10, $row['district'], 1, 0, 'L');
			$this->Cell(30, 10, $row['branch'], 1, 0, 'L');
			$this->Cell(30, 10, $row['cell'], 1, 0, 'L');
			$this->ln();
		}
	
	}
	
}
function get_province($db,$pid){
	$query2 = "SELECT * FROM provinces where province_id=$pid";
	$statement2 = $db->prepare($query2);
	$statement2->execute();
	$count2 = $statement2->rowCount();
	$result2 = $statement2->fetchAll();

	$province_name=$result2[0]['province_name'];
	return $province_name;
}
//get Data from the database 
$tt = 0;
$k = 1;
$l = 0;
$i = 0;
$total = 9;
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable($db);

$pdf->Ln();


$pdf->Output('../files/user_report_' . date('Y-m-d') . '.pdf', 'F');

header('Location:../index.php');
