<?php
date_default_timezone_set('Africa/Lagos');

$tk = $_POST["trelloKartenName"];
$datum = date("d.m.Y");
$pdfAuthor = "www.e-dynamics.de";

$title = 'Anforderungsprofil Sales';
$logo = '<img width="100px" src="logo.png">';

$anfN = $_POST["anfordererName"];
$dienN = $_POST["dienstleisterName"];
$anfT = $_POST["anforderungsTyp"];
$aB = $_POST["allgemeineBeschreibung"];
$port = $_POST["portal"];
$con = $_POST["container"]; //Array

$seite = $_POST["seite"]; //Array
$check = $_POST["checkout"]; //Array
$ss = $_POST["spezielleSeiten"];

$jsFields = $_POST["scriptFields"]; //Array
$vars = $_POST["variablen"]; //Array
$wBed = $_POST["welcheBedingungen"];
$wBes = $_POST["welcheBesonderheiten"];


$pdfName = "Anforderungsprofil_Analytics_". $tk .".pdf";

//////////////////////////// Inhalt des PDFs als HTML-Code \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$html = '
<table cellpadding="5" cellspacing="0" style="width: 100%; ">
	<tr>
		<td width="100%"><h1>'. $tk .'</h1>
        </td>
	</tr>
</table>
<h3>Allgemeine Informationen</h3>
<table cellpadding="5" cellspacing="0" style="width: 100%;"  border="1">
<tr><td>
<b>Trello Karte: </b>'.nl2br(trim($tk)).'<br>
<b>Ansprechpartner: </b>'.nl2br(trim($anfN)).'<br>
<b>Dienstleister: </b>'.nl2br(trim($dienN)).'<br>
<b>Anforderungstyp: </b>'.$anfT.'<br>
<b>Allgemeine Beschreibung: </b>'.$aB.'<br>
</td></tr>
</table>
<h3>Portal/ Container </h3>
<table cellpadding="5" cellspacing="0" style="width: 100%;" border="1">
    <tr style="background-color: #FA7626; color: #ffffff; padding:5px;">
        <th><b>Portal</b></th>
        <th><b>Container</b></th>
    </tr>
    <tr>
    <td> '. $port .'</td>
    <td>';
if(count($con) > 0) {
    foreach ($con as $key => $value) {
        $html .=  $value . "<br>";
    }
}

$html .= '</td></tr></table>
<h3>Seitenbeschreibung</h3>
<table cellpadding="5" cellspacing="0" style="width: 100%;"  border="1">
<tr><td>
<b>Bereiche der Seite: </b>';
if(count($seite) > 0) {
    $numItems = count($seite);
    $i = 0;
    foreach ($seite as $key => $value) {
        $html .=  $value;
        if(++$i !== $numItems) {
          $html .= ", ";
        }
    }
}
if(count($check) > 0) {
    $html .= '<br><b>Schritte im Checkout: </b>';
    foreach ($check as $key => $value) {
        $html .=  $value;
        if(++$i !== $numItems) {
          $html .= ", ";
        }
    }
}
$html .= '<br><b>Seiten-URLs: </b>' . $ss;
$html .= '</td></tr></table>
<h3>Scripts</h3>
<table cellpadding="5" cellspacing="0" style="width: 100%;"  border="1">
<tr style="background-color: #FA7626; color: #ffffff; padding:5px;">
    <th><b>Bereich</b></th>
    <th><b>Script</b></th>
</tr>
';

if(count($jsFields) > 0) {
    foreach ($jsFields as $key => $value) {
        list ($bereich, $script) = split('[|.-]', $value);
        $html .=  '<tr>';
        $html .=  '<td>'. $bereich . '</td>';
        $html .=  '<td>'. $script . '</td>';
        $html .=  '</tr>';
    }
}
$html .= '</table>';
$html .= '<h3>Variablen </h3>
<table cellpadding="5" cellspacing="0" style="width: 100%;" border="1">
    <tr style="background-color: #FA7626; color: #ffffff; padding:5px;">
        <th><b>Parametername</b></th>
        <th><b>Beschreibung</b></th>
        <th><b>Typ</b></th>
        <th><b>Werte/ Beispielwerte</b></th>
        <th><b>Trennzeichen</b></th>
    </tr>';

if(count($vars) > 0) {
    foreach ($vars as $key => $value) {
        list ($name, $descr ,$typ, $wert, $trenn) = split('[|.-]', $value);
        $html .=  '<tr><td>'. $name .'</td>
                  <td>'. $descr .'</td>
                  <td>'. $typ .'</td>
                  <td>'. $wert .'</td>
                  <td>'. $trenn .'</td></tr>';
    }
}
$html .= '</table>';

//////////////////////////// Erzeugung des PDF Dokuments \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

// TCPDF Library laden
require_once('tcpdf/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MAXPDF extends TCPDF {

    //Page header
    public function Header() {
        $datum = date("d.m.Y");
        $header= <<<EOT
Anforderungsprofil Sales
EOT;
        $this->SetFont('dejavusans', 'N', 9);

        // Logo
        $image_file = K_PATH_IMAGES.'../logo.jpg';
        $this->Image($image_file, 10, 10, 26, '', 'JPG', '', 'R', false, 0, 'L', false, false, 0, false, false, false);
        // Set font

        // Title
        //$this->Cell(0, 30, $header, 0, true, 'R', 0, '', 0, false, 'M', 'M');
        $this->Cell($w=0, $h=12, $header, $border=0, $ln=0, $align='R', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='R');

        $this->Cell($w=0, $h=22, $datum, $border=0, $ln=0, $align='R', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='R');
        $lx = 20;
        $this->Line(8,$lx, 200,$lx);
    }

    // Page footer
    public function Footer() {
        $this->SetY(-15);
        // Set font
        $this->SetFont('dejavusans', 'N', 9);
        // Page number
        //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        $this->Cell($w=0, $h=14, $this->getAliasNumPage().'/'.$this->getAliasNbPages(), $border=0, $ln=0, $align='L', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='M', $valign='R');
        $this->Cell($w=0, $h=0, 'erstellt mit Hilfe des', $border=0, $ln=0, $align='R', $fill=0, $link="", $stretch=0, $ignore_min_height=false, $calign='T', $valign='R');
        $this->Cell($w=0, $h=14, 'e-dynamics Anforderungswizard', $border=0, $ln=0, $align='R', $fill=0, $link='http://localhost/trelloAnf/', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M');

        //$this->MultiCell(0, 10, $this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, '', 0, '', 0, false, 'T', 'M');
        //$lx = 278;
        //$this->Line(8,$lx, 200,$lx);
    }
}

// Erstellung des PDF Dokuments
$pdf = new MAXPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Dokumenteninformationen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($pdfAuthor);
$pdf->SetTitle('Anforderungprofil '.$tk);
$pdf->SetSubject('Anforderungprofil '.$tk);


// Header und Footer Informationen
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Auswahl des Font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Auswahl der MArgins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Automatisches Autobreak der Seiten
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Image Scale
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Schriftart
$pdf->SetFont('dejavusans', '', 10);

// Neue Seite
$pdf->AddPage();
$y = $pdf->getY();
// Fügt den HTML Code in das PDF Dokument ein
$pdf->writeHTML($html, true, false, true, false, '');
// reset pointer to the last page
$pdf->lastPage();
//Ausgabe der PDF

//Variante 1: PDF direkt an den Benutzer senden:
$pdf->Output($pdfName, 'I');

//Variante 2: PDF im Verzeichnis abspeichern:
//$pdf->Output(dirname(__FILE__).'/'.$pdfName, 'F');
//echo 'PDF herunterladen: <a href="'.$pdfName.'">'.$pdfName.'</a>';

?>
