<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div style="width: 100%; overflow: auto;">
            <?php
            try {
                if (isset($_GET["pg"])) {
                    include_once('config.php');
                    $pdo = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . "";
                    $conn = new PDO($pdo, DB_USERNAME, DB_PASSWORD);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $sql = "select * from " . htmlspecialchars($_GET["pg"]) . "";
                    $qry = $conn->query($sql);
                    $col = '';
                    $col = "<table class='table table-striped table-dark'><thead>";
                    $col .= "<tr>";
                    $data = $qry->fetchAll();
                    for ($i = 0; $i < $qry->columnCount(); $i++) {
                        $colArray = $qry->getColumnMeta($i);
                        $col .= "<th>" . strtoupper($colArray["name"]) . "</th>";
                    }
                    // foreach ($data as $key => $value) {
                    //     foreach ($value as $k => $v) {
                    //         if ($key === 0) {
                    //             $col .= "<th>" . $k . "</th>";
                    //         }   
                    //     }
                    //     break;
                    // }
                    $col .= "</tr>";
                    $col .= "</thead>";
                    $col .= "<tbody>";
                    foreach ($data as  $key => $value) {
                        $col .= "<tr>";
                        foreach ($value as $k => $v) {
                            $col .= "<td>" . $v . "</td>";
                        }
                        $col .= "</tr>";
                    }
                    $col .= "</tbody>";
                    $col .= "</table>";
                    echo $col;
                }
            } catch (Exception $e) {
                echo "ERREUR : " . $e->getMessage();
            }
            ?>
        </div>
    </div>
</body>
</html>
}