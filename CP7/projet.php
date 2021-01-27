<?php
$listtech = [
    "NRJ" => ["name" => "Energies renewelable", "budget" => 40000, "technos" => ["web" => ["HTML", "CSS", "JS"], "Mobile" => ["React native"]]],
    "H20" => ["name" => "Traitement", "budget" => 750000, "technos" => ["client" => ["Java", "Oracle"], "RWD" => ["MongoDB", "Node", "Angular"]]],
    "RDC" => ["name" => "Gestion de mangement", "technos" => ["webstatic" => ["HTML", "CSS", "JS"]]]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Projet
                    </th>
                    <th>
                        Budget
                    </th>
                    <th>
                        Techologies
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listtech as $c => $k) {
                    echo "<tr>";
                    $flag = true;
                    foreach ($k as $cc => $ck) {
                        if ($cc == "name") {
                            echo "<td>" . $c . " - " . $ck . "</td>";
                        } else if ($cc == "budget") {
                            echo "<td>" . number_format($ck, 2, ',', ' ')  . " €</td>";
                        }
                        if (count($k) === 2 && $flag) {
                            echo "<td></td>";
                            $flag = false;
                        }
                        if ($cc == "technos") {
                            echo "<td>";
                            foreach ($ck as $coc => $koc) {
                                echo "<ul>" . $coc . "";
                                foreach ($koc as $lastchild => $keylastchild) {
                                    echo "<li>" . $keylastchild . "</li>";
                                }
                                echo "</ul>";
                            }
                            echo "</td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
        include_once("functions.php");
        $myage = age("2021-07-24", "1991-01-27");
        echo "{$myage}";
        ?>

    </div>
</body>

</html>