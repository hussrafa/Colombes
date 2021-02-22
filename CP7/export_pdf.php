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
        $this->Image('photos/logo1.jpg', 0, 0,40,20);
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
$pdf->AddPage('P', 'A4', 0);

// Test
for ($i = 1; $i < 1001; $i++) {
    $pdf->Cell(0, 10, 'Ligne n° ' . $i, 1, 2);
}

// Renvoi du résultat
$pdf->Output('I', 'export.pdf');
