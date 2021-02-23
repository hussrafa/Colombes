<?php
//Imports 
include_once('test_session.php');
include_once('pdo_connect.php');
include_once('fpdf/fpdf.php'); // http://www.fpdf.org

// classe qui étend FPDF
class MyPDF extends FPDF
{


    // surcharge la méthode HEADER : personnalise
    public function Header()
    {
        // Logo
        $this->Image('photos/logo1.jpg', 0, 0, 40, 20);
        // Typo
        $this->SetTextColor(255, 0, 0);
        $this->SetFont('Arial', 'B', 20);
        //Texte
        $this->Cell(0, 10, 'Les Darons Codeurs', 0, 0, 'C');
        //  Saut de ligne
        $this->Ln(20);
    }
    // Surcharge la methode FOOTER : personnalise
    public function Footer()
    {
        //Postionnement a 1,5 cm du bas
        $this->SetY(-15);
        // Typo
        $this->SetFont('Times', 'I', 15);
        // Texte 
        $this->cell(0, 5, 'Page ' . $this->PageNo() . ' sur {nb}', 0, 0, 'C');
    }
}


//Appelle la classe créée ci-dessus : impression en PDF
$pdf = new MyPDF();
//Gestion de nombre de page
$pdf->AliasNbPages();

// Creation de la page
$pdf->AddPage('L', 'A4', 0);

// Test

$pdf->SetFont('Times', '', 10);
//Impression contenu table
// for ($i = 1; $i < 1001; $i++) {
//     $pdf->Cell(0, 10, 'Ligne n° ' . $i, 1, 2);
// }

try {
    if (isset($_GET['t']) && !empty($_GET['t'])) {
        $t = $_GET['t'];
        $sql = "select * from $t";
        $qry = $cnn->prepare($sql);
        $qry->execute();
        $cCount = $qry->columnCount();
        $width = 277 / $cCount;
        $height = 10;
        $pdf->SetTextColor(255,255,255);
        for ($j = 0; $j <  $cCount; $j++) {
            $pdf->Cell($width, $height, utf8_decode($qry->getColumnMeta($j)['name']), 1, 0,'C',true);
        }
        $pdf->ln($height);
        $pdf->SetTextColor(0,0,0);
        while ($row = $qry->fetch(PDO::FETCH_NUM)) {
            for ($j = 0; $j <  $cCount; $j++) {
                $pdf->Cell($width, $height, utf8_decode($row[$j]), 1,0, 'L', 0);
            }
            $pdf->ln($height);
        }
    } else {
        $pdf->MultiCell(0, 30, 'Table non trouvée');
    }
} catch (Exception $e) {
    $pdf->MultiCell(0, 30, $e->getMessage());
}

// Renvoi du résultat
$pdf->Output('I', 'export.pdf');
