<?php
//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).
include("../conn.php");
require_once('tcpdf_include.php');



$code = $_GET['code'];    
$identite_patient = "SELECT * FROM patient where pat_id = $code";
$resultpat= mysqli_query($conn, $identite_patient);
$pat = mysqli_fetch_assoc($resultpat);

$identite = "SELECT * FROM rdv ";
$rs= mysqli_query($conn, $identite);
$rdv = mysqli_fetch_assoc($rs);


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// get the current page break margin
		$bMargin = $this->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
		// set bacground image
		$img_file = K_PATH_IMAGES.'dentaire.jpg';
		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();

		$this->SetXY(13,3.4);
		//Cell(width , height , text , border , end line , [align] )
		$this->SetTextColor(51,122,183);
		 $this->Ln(1.4);
		 $this->SetX(8);
		 $this->SetFont('timesBI', '', 10);
		
		$this->Cell(120	,5,'DOCTEUR Ahmed Ahmed ',0,0);
		
		$this->SetFont('aefurat', '', 15);
		$this->SetX(-45);
		$this->Cell(169	,5,'الدكتور احمد احمد',0,1);//end of line
		
		$this->SetX(7);
		
		//set font to arial, regular, 12pt
		$this->SetFont('timesI', '', 10);
		$this->SetTextColor(51,122,183);
		$this->Cell(150	,4,'Specialiste des maladies et chirurgie',0,0);
		$this->SetX(-65);
		$this->SetTextColor(51,122,183);
		$this->SetFont('aefurat', '', 10);
		$this->SetX(-47);
		$this->Cell(150	,5,' أخصائي طب وجراحة الأسنان  ',0 ,0 );
		
		
		$this->SetY(21);
		$this->SetX(146);
		$this->Cell(150	,5,' حاصل على دبلوم الدولة في جراحة الأسنان   ',0 ,0 );
		
		$this->SetY(26);
		$this->SetX(140);
		$this->Cell(150	,5,' رئيس سابق  في دبلوم الدولة في جراحة الأسنان   ',0 ,0 );
		
		
		
		$this->SetY(19);
		$this->SetDrawColor(240,240,240); 
		$this->SetLineWidth(0.9);
		$this->Line(6.13,$this->GetY(),63.13,$this->GetY());
		
		$this->SetX(180);
		$style = array('width' => 0.9, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(240, 240, 240));
		$this->Line(159,$this->GetY(),208,$this->GetY(), $style ) ;
		
		
		$this->SetY(21);
		$this->SetX(-240);
		
		$this->SetFont('times', '', 10);
		$this->SetTextColor(51,122,183);
		$html = <<<EOD
		<ul style="list-style-type: circle;  ">
		<li>
		Titulaire dun diplôme dEtat de docteur <br>
		 en chirurgie dentaire
		</li>
		<li>
		Titulaire dun diplôme dEtat de docteur <br>
		
		</li>
		</ul>
		EOD;
		$this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	

		$this->Cell(89	,5,'',0,1);//end of line
$this->SetTextColor(1,1,1);
$this->SetFont('courierBI', '', 10);

$this->SetXY(-188,61);
$this->SetTextColor(51,122,183);

$this->Cell(72	,5,'Date :',0,1);

$this->SetXY(17,79);
$this->SetTextColor(51,122,183);

$this->Cell(69	,6,'Patient :',0,1);
$this->SetY(61);
$this->SetX(40);

$this->SetTextColor(1,1,1);
$this->SetY(47);
// print some spot colors
$this->SetFont('dejavusans', 'BI U', 12);
$this->MultiCell(170,20,("ORDONNANCE"),0, 'C'); 

	}



	
}

// create new PDF document

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('sabah');
$pdf->SetTitle('Ordonnance');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(_FILE_).'/lang/eng.php')) {
// 	require_once(dirname(_FILE_).'/lang/eng.php');
// 	$pdf->setLanguageArray($l);
// }

// ---------------------------------------------------------

// set font
$core_fonts = array('courier', 'courierB', 'courierI', 'courierBI', 'helvetica', 'helveticaB', 'helveticaI', 'helveticaBI', 'times', 'timesB', 'timesI', 'timesBI', 'symbol', 'zapfdingbats');

// add a page
$pdf->AddPage();





$pdf->Image('sans.jpg',0,0,210);
//set font to arial, bold, 14pt


$pdf->SetTextColor(1,1,1);
$pdf->SetFont('courierBI', '', 10);


$pdf->SetY(61);
$pdf->SetX(40);
$pdf->SetTextColor(1,1,1);
$pdf->MultiCell(105,5,utf8_decode($rdv['date']),0, 'L'); 

$pdf->SetY(79.7);
$pdf->SetX(40);
$pdf->MultiCell(105,5,utf8_decode(strtoupper($pat['nom'])) ,0, 'L'); 





$pdf->SetY(110);

$query = "SELECT * FROM `medicament` ORDER BY `id_med` ASC ";
$result = mysqli_query($conn, $query);  

if(mysqli_num_rows($result) > 0)  
{  
$i=1;
$numResults = mysqli_num_rows($result);
$counter = 0; 


while($row1 = mysqli_fetch_array($result))  
{ 
	$pdf->SetTextColor(51,122,183);

    $current_y = $pdf->GetY()+8;
    $current_x = $pdf->GetX()+25;

    $ttttt = $pdf->GetY()+11;
    $current_x = $current_x;
    $pdf->SetXY($current_x, $ttttt);  
	$pdf->SetFont('dejavusans', '', 12);
    $pdf->MultiCell(7,5,$i++,0, 'C'); 
	$pdf->SetFont('dejavusans', 'BI U', 12);
    $current_x = $current_x+10;
    $pdf->SetXY($current_x, $ttttt); 
	$pdf->MultiCell(105,5,utf8_decode($row1['nom_med']),0, 'L'); 
    $current_x = $current_x+40;
    $pdf->SetXY($current_x, $ttttt); 
	$pdf->SetFont('dejavusans', 'BI U', 12);
	$pdf->MultiCell(105,5,utf8_decode($row1['dosage']),0, 'L'); 
	$pdf->SetFont('courierBI', '', 11);
    $pdf->SetTextColor(1,1,1);

	$current_x = $current_x+24;

    $pdf->SetXY($current_x, $ttttt); 
	$pdf->Cell(72	,5,'2cp/2j ',0,1);    

   


}
}


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Ordonnance', 'I');

//============================================================+
// END OF FILE
//============================================================+