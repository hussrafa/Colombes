<?php
// Imports
include_once('test_session.php');
include_once('pdo_connect.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northwind Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body class="container">
    <?php
    // Message si pas d'info dans l'URL
    if (!isset($_GET['t']) || empty($_GET['t']) || !isset($_GET['k']) || empty($_GET['k'])) {
        echo '<p class="alert alert-warning"><strong>Attention !</strong> Aucune donnée à afficher : <a href="bo.php">retour au back-office</a></p>';
        exit();
    }
    // Affiche les titres
    $t = $_GET['t'];
    $k = $_GET['k'];
    $id = $_GET['id'];
    echo '<h1>Base de données : ' . DB . '</h1>';
    echo '<h2>Table : ' . $t . '</h2>';
   
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item"><a href="bo.php">Back-Office</a></li>
            <li class="breadcrumb-item"><a href="<?php echo 'list.php?t=' . $t . '&k=' . $k; ?>">Liste</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edition</li>
        </ol>
    </nav>

    <form action="save.php?<?php echo $_SERVER['QUERY_STRING'] ?>" method="post">
        <?php
        try {
            // Prépare la requête
            if (!empty($id)) {
                // Si ID alors retrouve la ligne
                $sql = "SELECT * FROM $t WHERE $k = ?";
                $qry = $cnn->prepare($sql);
                $vals = array($id);
                $qry->execute($vals);
                $row = $qry->fetch();
            } else {
                // Sinon requête vide pour lire colonnes
                $sql = "SELECT * FROM $t WHERE 1 = 2";
                $qry = $cnn->prepare($sql);
                $qry->execute();
                for ($i = 0; $i < $qry->columnCount(); $i++) {
                    $row[$qry->getColumnMeta($i)['name']] = '';
                }
            }
            // Ajoute LABEL/INPUT
            $html = '';
            foreach ($row as $key => $val) {
                $html .= '<div class="form-group">';
                $html .= '<label for="' . $key . '">' . $key . '</label>';
                $html .= '<input class="form-control" type="text" id="' . $key . '" name="' . $key . '" value="' . $val . '"/>';
                $html .= '</div>';
            }
            // SUBMIT
            $html .= '<input type="submit" value="Enregistrer" class="btn btn-info"/>';
            echo $html;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
        ?>
    </form>

</body>

</html>