<?php
include_once('constants.php');
try {
    // Tentative de connexion
    $cnn = new PDO('mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8', USER, PASS);
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $err) {
    echo $err->getMessage();
}