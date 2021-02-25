<?php
include_once('singleton.php');
include_once('constants.php');
include_once('model.php');
//Renvoie les commandes pasees sous la forme d'un objet JSON
Singleton::setConfiguration(HOST, 3306, DB, USER, PASS);
echo Singleton::getAllData("SELECT CONCAT(CO.NO_COMMANDE,'-',CL.SOCIETE) AS title,CO.DATE_COMMANDE AS start,IFNULL(CO.DATE_COMMANDE,CO.DATE_ENVOI) AS end FROM commandes CO JOIN clients CL ON CO.CODE_CLIENT=CL.CODE_CLIENT");

