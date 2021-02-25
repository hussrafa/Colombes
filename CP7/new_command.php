<?php
include_once('singleton.php');
include_once('constants.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body class="container">
    <h1>Prise de commande</h1>
    <form action="new_order_save.php" method="post">
        <div class="form-group">
            <label for="NO_COMMANDE">N° Commande</label>
            <input type="number" name="NO_COMMANDE" id="NO_COMMANDE" class="form-control" value="12000">
        </div>
        <div class="form_group">
            <label for="CODE_CLIENT">client</label>
            <?php
            Singleton::setConfiguration(HOST, 3306, DB, USER, PASS);
            echo Singleton::getHtmlSelect('CODE_CLIENT', 'SELECT CODE_CLIENT,SOCIETE FROM clients');
            ?>
        </div>
        <div class="form_group">
            <label for="NO_EMPLOYE">Vendeur</label>
            <?php
            echo Singleton::getHtmlSelect('NO_EMPLOYE', 'SELECT NO_EMPLOYE,CONCAT(PRENOM,\'\',NOM) as employe FROM employes');
            ?>
        </div>
        <div class="form-group">
            <label for="DATE_ENVOI">Date d'envoi</label>
            <input type="date" name="DATE_ENVOI" id="DATE_ENVOI" class="form-control">
        </div>
        <div class="form-group">
            <label for="DATE_ENVOI">Frais de port</label>
            <input type="text" name="PORT" id="PORT" class="form-control">
        </div>
        <input type="submit" value="valider la commande" class="btn btn-primary">
    </form>
</body>

</html>