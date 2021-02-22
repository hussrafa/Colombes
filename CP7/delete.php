<?php

include_once('test_session.php');
include_once('pdo_connect.php');

if (isset($_GET['t']) && !empty($_GET['t'])) {
    $table = $_GET['t'];
}

if (isset($_GET['k']) && !empty($_GET['k'])) {
    $primaryKey = $_GET['k'];
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}

try {
    $sql = "Delete from $table where " . $primaryKey . "=:" . $primaryKey;
    $qry = $cnn->prepare($sql);
    $paramList = array(":$primaryKey" => $id);
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
