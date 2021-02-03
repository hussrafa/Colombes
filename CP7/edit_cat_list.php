<?php
// Ouvre la BDD en MYSQLI
$conn = mysqli_connect("localhost", "root", "greta", "northwind");
if (!$conn) {
    echo "<p>Error connection Mysql : " . mysqli_connect_error() . "</p>";
    die();
}
$qryToExecute = "select * from categories";
$res = mysqli_query($conn, $qryToExecute);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Liste des catégories</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liste Catégories</li>
            </ol>
        </nav>
        <table class="table table-stripped table-dark">
            <thead>
                <tr>
                    <?php
                    $html = '';
                    if ($res) {
                        while ($col = mysqli_fetch_field($res)) {
                            $html .= "<th>{$col->name}</th>";
                        }
                        echo $html;
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $html = '';
                if ($res) {
                    while ($row = mysqli_fetch_array($res)) {
                        $html .= "<tr><td><a target='_blank' style='color:#fff;' href=edit_cat_form.php?k=" . $row["CODE_CATEGORIE"] . ">{$row["CODE_CATEGORIE"]}</a></td>";
                        $html .= "<td>{$row["NOM_CATEGORIE"]}</td>";
                        $html .= "<td>{$row["DESCRIPTION"]}</td>";
                        $html .= '<td><img style="width:150px;" src="' . $row["PHOTO"] . '"/></td></tr>';
                    }

                    echo $html;
                }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>