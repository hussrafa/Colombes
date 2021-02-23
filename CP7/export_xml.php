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
        $root = new SimpleXMLElement("<$t/>");
        while ($row = $qry->fetch()) {
            $child = $root->addChild(substr($t, 0, strlen($t) - 1));
            foreach ($row as $key => $value) {
                $child->addChild(strtolower($key), $value);
            }
        }
        unset($cnn);
        header('content-Type:text/xml');
        echo $root->asXML();
    } catch (Exception $th) {
        echo $th->getMessage();
    }
} else {
    echo 'Aucune table trouvée !';
}
