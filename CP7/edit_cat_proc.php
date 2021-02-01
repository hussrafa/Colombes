<?php


//Connecxion a la BDD via MYSQLI
$conn = mysqli_connect("localhost", "root", "greta", "northwind");
$sql = "INSERT INTO categories(CODE_CATEGORIE,NOM_CATEGORIE,DESCRIPTION) VALUES({$_POST['CODE_CATEGORIE']},'{$_POST['NOM_CATEGORIE']}','{$_POST['DESCRIPTION']}')";
echo $sql;
$res = mysqli_query($conn, $sql);
var_dump($res);
