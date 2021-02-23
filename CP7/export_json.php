<?php
//Imports 
include_once('test_session.php');
include_once('pdo_connect.php');

// Récupere la table à exporter
if (isset($_GET['t']) && !empty($_GET['t'])) {
    //Lire et écrit les data
    try {
        $t = $_GET['t'];
        $sql = "select * from $t";
        $qry = $cnn->prepare($sql);
        $qry->execute();
        $cCount = $qry->columnCount();
        // lit et renvoie les data
        $elem = $qry->fetchAll(PDO::FETCH_OBJ);
        // while ($row = $qry->fetch()) {
        //     // $keys = array();
        //     // foreach ($row as $key => $value) {
        //     //     $keys[$key] = $value;
        //     // }
        //     $elem[] = $row;
        // }
        unset($cnn);
        header('content-Type:application/json; charset=utf8');
        echo json_encode($elem,JSON_NUMERIC_CHECK);
    } catch (Exception $th) {
        echo $th->getMessage();
    }
} else {
    echo 'Aucune table trouvée !';
}
