<?php
//Imports 
include_once('test_session.php');
include_once('pdo_connect.php');

// Récupere la table à exporter
if (isset($_GET['t']) && !empty($_GET['t'])) {
    //Lire et écrit les data
    try {
        //ouvre un flux
        header('content-Type:text/csv');
        header('content-Disposition:attachement;Filename="export.csv"');
        $stream = fopen('php://output', 'w');
        $t = $_GET['t'];
        $sql = "select * from $t";
        $qry = $cnn->prepare($sql);
        $qry->execute();
        $cCount = $qry->columnCount();

        for ($j = 0; $j <  $cCount; $j++) {
            $headers[] = $qry->getColumnMeta($j)["name"];
        }
        fputcsv($stream, $headers, ";");
        while ($row = $qry->fetch()) {
            fputcsv($stream, $row, ";");
        }
        //Fermeture fichier et connexion
        fclose($stream);
        unset($cnn);
    } catch (Exception $th) {
        echo $th->getMessage();
    }
} else {
    echo 'Aucune table trouvée !';
}
