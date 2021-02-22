<?php

include_once('test_session.php');
include_once('pdo_connect.php');

// Récup dans une varaible tableau associatif la clé et la valeur de chaque colonee
//Exemple pour USERS: array('mail'=>'toto@tit.org','fname'=>'toto') 
$update = false;

if (isset($_GET['t']) && !empty($_GET['t'])) {
    $table = $_GET['t'];
}

if (isset($_GET['k']) && !empty($_GET['k'])) {
    $primaryKey = $_GET['k'];
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $update = true;
}

$paramList = array();
foreach ($_POST as $key => $value) {
    //$temp = array($key => $value);
    $paramList[":$key"] = htmlspecialchars($value);
    //array_push($paramList, $temp);
}
// Test1 : vérif si les variables T,K et ID sont présentes : isset
// et si T et k ne sont pas vides

// Test 2 : Verif si la variable ID est vide
// Alors INSERT

if (!$update) {
    $sql = "Insert into $table";
    $insertInto = "(";
    $valuesInto = "(";
    foreach ($paramList as $key => $value) {
        $insertInto .= str_replace(":", "", $key) . ",";
        $valuesInto .=  $key . ",";
    }
    $insertInto = substr($insertInto, 0, strlen($insertInto) - 1) . ")";
    $valuesInto = substr($valuesInto, 0, strlen($valuesInto) - 1) . ")";
    $sql .= $insertInto . " values " . $valuesInto;
} else {
    $sql = "update $table set ";
    $updateValues = "";
    foreach ($paramList as $key => $value) {
        $updateValues .= str_replace(":", "", $key) . "=" . $key . ",";
    }
    $updateValues = substr($updateValues, 0, strlen($updateValues) - 1);
    $sql .= $updateValues . " where " . $primaryKey . "=:" . $primaryKey;
}

try {
    $qry = $cnn->prepare($sql);
    $vals = $paramList;
    $qry->execute($vals);
    if ($qry) {
        echo "success";
        header('location:lists.php?' . $_SERVER["QUERY_STRING"]);
    } else {
        echo "error";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
// sinon update

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>

</body>

</html>