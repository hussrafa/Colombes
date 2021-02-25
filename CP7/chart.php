<?php
include_once('test_session.php');
include_once('pdo_connect.php');

//Récupére les paramétres de l'url
$e = 5;
$a = 2019;
if (isset($_GET['e']) && !empty($_GET['e'])) {
    $e = $_GET['e'];
}
if (isset($_GET['a']) && !empty($_GET['a'])) {
    $a = $_GET['a'];
}

// Prépare et exécute la requette

$sql = 'select e.NO_EMPLOYE,e.nom,year(c.date_commande) as annee,month(c.date_commande) as mois,sum((d.PRIX_UNITAIRE*d.QUANTITE)*(1-d.REMISE))as ca
        from employes e
        join commandes c
        on e.no_employe = c.no_employe
        join details_commandes d on c.no_commande=d.no_commande
        where year(c.date_commande)=:date_commande and e.NO_EMPLOYE=:no_employe
        group by e.NO_EMPLOYE,e.nom,year(c.date_commande) ,month(c.date_commande) ';
$qry = $cnn->prepare($sql);
$vals = array(":date_commande" => $a, ":no_employe" => $e);
$qry->execute($vals);
$data = $qry->fetchAll();

// Génére la zone de dessin
$w = 640;
$h = 426;
$img = imagecreatetruecolor($w, $h);
//$img = imagecreatefromjpeg('pics/bk.jpg');


// Crayons de couleur
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
$trans = imagecolorallocatealpha($img, 255, 255, 255, 75);

// Fond transparrent
imagefilledrectangle($img, 0, 0, $w, $h, $trans);

if (count($data) > 0) {
    // variables de calcul
    $gap = 20;
    $wbar = ($w - ($gap * 2)) / count($data);
    $hmax = $h - ($gap * 2);
    $val_max = 150000; // CA max

    // Dessine l'histogramme via requéte
    for ($i = 0; $i < count($data); $i++) {
        // Barres
        $hbar = round(($data[$i]["ca"] * ($hmax - $gap)) / $val_max);
        $alea = imagecolorallocatealpha($img, rand(0, 255), rand(0, 255), rand(0, 255), 5);
        imagefilledrectangle($img, $gap + ($i * $wbar), $hmax - $hbar, $gap + ($i * $wbar) + $wbar, $h - $gap, $alea);
        //imagerectangle($img, $gap + ($i * $wbar), $hmax - $hbar, $gap + ($i * $wbar) + $wbar, $h - $gap, $$white);
        // Labels :
        imagestring($img, 8, $gap + ($i * $wbar) + 12, ($h - $hbar - (3 * $gap)), round($data[$i]['ca'] / 1000) . 'kE', $black);

        //Graduation en bas des barres
        imagestring($img, 5, $gap + ($i * $wbar) + $wbar / 2, $h - $gap, $data[$i]['mois'], $black);
    }

    // Axes et titres
    imageline($img, $gap, $h - $gap, $w - $gap, $h - $gap, $black);
    imageline($img, $gap, $gap, $gap, $h - $gap, $black);
    imagestring($img, 10, $w * .25, $gap, "CA par vendeur $e pour l'anee $a", $black);
} else {
    imagestring($img, 50, 250, 150, "No data", $black);
}

//affiche le résultat
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
