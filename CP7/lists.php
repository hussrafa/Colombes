<?php
// Imports
include_once('test_session.php');
include_once('pdo_connect.php');

// Récupère la page active si existe
if (isset($_GET['pg']) && !empty($_GET['pg'])) {
    $pg = (int) $_GET['pg'];
} else {
    $pg = 1;
}

// Récupère le nombre de lignes actif si existe
if (isset($_GET['nb']) && !empty($_GET['nb'])) {
    $nb = (int) $_GET['nb'];
} else {
    $nb = 4;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Northwind Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script>
        function fnDelete(e, id) {
            event.preventDefault();
            let conf = confirm("Are you sure to delete ?");
            if (conf == true) {
                window.location = e.href;
            }
        }
    </script>
</head>

<body class="container">
    <?php
    // Message si pas d'info dans l'URL
    if (!isset($_GET['t']) || empty($_GET['t']) || !isset($_GET['k']) || empty($_GET['k'])) {
        echo '<p class="alert alert-warning"><strong>Attention !</strong> Aucune donnée à afficher : <a href="bo.php">retour au back-office</a></p>';
        exit();
    }

    // Teste si table et colonne existent via information_schema
    // A FAIRE PLUS TARD

    // Affiche les titres
    $t = $_GET['t'];
    $k = $_GET['k'];
    echo '<h1>Base de données : ' . DB . '</h1>';
    echo '<h2>Table : ' . $t . '</h2>';
    echo '<div style="text-align:right;"><a class="btn btn-success m-1" href="edit.php?t=' . $t . '&k=' . $k . '&id=">Add</a>';
    echo '<a class="btn btn-danger m-1" href="export_pdf.php?t=' . $t . '">Export pdf </a> ';
    echo '<a class="btn btn-secondary m-1" href="export_csv.php?t=' . $t . '">Export CSV </a> ';
    echo '<a class="btn btn-info m-1" href="export_xml.php?t=' . $t . '">Export XML </a> ';
    echo '<a class="btn btn-primary m-1" href="export_json.php?t=' . $t . '">Export JSON </a> ';
    echo '</div>';
    // Exécute et lit la requête
    try {
        $start = ($pg - 1) * $nb;
        $sql = 'SELECT * FROM ' . $t . ' LIMIT ' . $start . ',' . $nb;
        $qry = $cnn->prepare($sql);
        $qry->execute();
    } catch (PDOException $err) {
        echo '<p class="alert alert-danger">' . $err->getMessage() . '</p>';
    }
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
            <li class="breadcrumb-item"><a href="bo.php">Back-Office</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste</li>
        </ol>
    </nav>

    <table class="table table-striped">
        <thead>
            <tr>
                <?php
                // Affiche le nom des colonnes
                $html = '';
                $types = [];
                for ($i = 0; $i < $qry->columnCount(); $i++) {
                    // Récupère les infos de la colonne
                    $meta = $qry->getColumnMeta($i);
                    // Affiche le nom de la colonne
                    $html .= '<th>' . $meta['name'] . '</th>';
                    // Stocke le type de données de la colonne
                    $types[$meta['name']] = $meta['native_type'];
                }
                $html .= '<th></th><th></th>';
                echo $html;
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Affiche les data
            $html = '';
            while ($row = $qry->fetch()) {
                $html .= '<tr>';
                foreach ($row as $key => $val) {
                    // Alignement selon le type de la colonne
                    switch ($types[$key]) {
                        case 'LONG':
                        case 'NEWDECIMAL':
                            $align = 'right';
                            break;
                        case 'DATE':
                            $align = 'center';
                            break;
                        default:
                            $align = 'left';
                    }
                    // Selon BLOB ou TEXT
                    if ($types[$key] == 'BLOB') {
                        $html .= '<td><img style="width:5rem" src="' . $val . '"/></td>';
                    } else {
                        $html .= '<td align="' . $align . '">' . $val . '</td>';
                    }
                }
                // Ajoute boutons UPDATE et DELETE
                $html .= '<td><a class="btn btn-warning btn-sm" href="edit.php?t=' . $t . '&k=' . $k . '&id=' . $row[$k] . '">MAJ</a></td>';
                $html .= '<td><a class="btn btn-danger btn-sm" href="delete.php?t=' . $t . '&k=' . $k . '&id=' . $row[$k] . '" onclick="fnDelete(this,' . $row[$k] . ')">SUPPR</a></td>';
                $html .= '</tr>';
            }
            echo $html;
            ?>
        </tbody>
    </table>

    <nav>
        <ul class="pagination flex-wrap justify-content-center">
            <?php
            // Calcule la pagination
            $res = $cnn->query("SELECT COUNT(*) AS total FROM $t");
            $row = $res->fetch();
            $pgs = ceil($row['total'] / $nb);
            // Affiche la pagination
            $html = '';
            for ($i = 1; $i <= $pgs; $i++) {
                $href = $_SERVER['PHP_SELF'] . '?t=' . $t . '&k=' . $k .  '&pg=' . $i . '&nb=' . $nb;
                $html .= '<li class="page-item ' . ($pg === $i ? 'active' : '') . '"><a class="page-link" href="' . $href . '">' . $i . '</a></li>';
            }
            echo $html;
            unset($cnn);
            ?>
        </ul>
    </nav>
</body>

</html>