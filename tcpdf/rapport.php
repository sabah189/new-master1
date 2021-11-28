
<?php
// cell( width, height , border (0=no border , 1=bordered) , end line(0=continue , 1=newline) ,align L or C or R )
include("../conn.php");
require_once('tcpdf_include.php');
$code = $_GET['code'];    
$identite_patient = "SELECT * FROM patient where pat_id = $code ";
$resultpat= mysqli_query($conn, $identite_patient);
$patients = mysqli_fetch_assoc($resultpat);
$nom_prenom = strtoupper($patients['nom'] );
$datenais = $patients['ddn'];
$age= $patients['adresse'];

$identite_doc ="SELECT * FROM docteur";
$resultdoc= mysqli_query($conn, $identite_doc);
$doc = mysqli_fetch_assoc($resultdoc);
$nom_doc = strtoupper($doc['nomDoc'] );
$adresse=$doc['adresse'];
$telephone=$doc['telephone'];




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
		$this->Cell(150	,5,' رئيس سابق في دبلوم الدولة في جراحة الأسنان   ',0 ,0 );
		
		
		
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
$this->MultiCell(105,5,date("F j, Y"),0, 'L'); 

$this->SetY(47);
// print some spot colors
$this->SetFont('dejavusans', 'BI U', 12);
$this->MultiCell(170,20,(" Certificat"),0, 'C'); 

	}



	
}



$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage('p', 'A4', 'mm' ); 
$pdf->SetFont('dejavusans', '', 12);
$h = 7;
$retrait = "         ";





$pdf->Cell(89	,5,'',0,1);//end of line
$pdf->SetTextColor(1,1,1);
$pdf->SetFont('courierBI', '', 10);


$pdf->SetXY(-188,61);


$pdf->SetXY(19,79);



$pdf->SetY(79.7);
$pdf->SetX(40);
$pdf->MultiCell(105,5, $nom_prenom ,0, 'L'); 





       

        $pdf->Ln(23);
        $pdf->SetFont('dejavusans', '', 12);
        $h = 7;
        $retrait = "           ";
        $pdf->SetY(112);
        $pdf->SetX(9);
        $pdf->Write($h, $retrait .  "JE SOUSSIGNE (E)   : " );
        $pdf->SetFont('', 'BI');
       $pdf -> Write($h, $nom_doc  . "\n" );
       $pdf->Ln(2);
        $pdf->SetFont('', '');

        $pdf->Write($h, $retrait .  "DOCTEUR EN MEDECINE, CERTIFIE    \n" );
        $pdf->Ln(2);
        $pdf->SetFont('', '');
        $pdf->Write($h, $retrait .  "AVOIR EXAMINE AUJOURDHUI M. / Mme  :  " );

        $pdf->SetFont('', 'BI');
        $pdf -> Write($h, $nom_prenom  . "\n" );
        $pdf->Ln(2);

        $pdf->SetFont('', '');

        $pdf->Write($h, $retrait .  "LE/LA PATIENT(E) EST EN BONNE SANTE PHYSIQUE ET NE SOUFFRE PAS DE
           GRAVES MALADIES          
    " );
        $pdf->Ln(2);
           $pdf->Write($h, $retrait . "CHRONIQUES OU VENERIENNES, DE TUBERCULOSE NI D’AUTRE MALADIE
            MORTELLE. 
" );
         $pdf->Ln(2);

$pdf->Output();

?>





