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
        <div class="d-flex ml-5 mt-5" style="flex-wrap: wrap">
            <?php
            include_once('config.php');
            try {
                $pdo = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . "";
                $conn = new PDO($pdo, DB_USERNAME, DB_PASSWORD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $sql = "select  t.table_name,t.table_rows,c.column_name from information_schema.tables t inner join information_schema.columns c on t.table_schema=c.table_schema and t.table_name=c.table_name
                where t.table_schema=? and c.column_key=?";
                $qry = $conn->prepare($sql);
                $vals = [DB_NAME, 'PRI'];
                $qry->execute($vals);
                $html = '';
                while ($ligne = $qry->fetch()) {
                    $html .= '<div class="card m-2" style="width: 18rem;">
                              <img src="./photos/sql.png" class="card-img-top myimg p-2" alt="sql table">
                              <div class="card-body">
                              <h5 class="card-title">' . $ligne['TABLE_NAME'] . '</h5>
                              <p class="card-text">Primary Key: ' . $ligne["COLUMN_NAME"] . '</p>
                              <p class="card-text">Nombre de lignes : ' . $ligne["TABLE_ROWS"] . '</p>
                              <a href="lists.php?pg=' . $ligne['TABLE_NAME'] . '&pk=' . $ligne["COLUMN_NAME"] . '" class="btn btn-primary">Details</a>
                              </div>
                              </div>';
                }
                echo $html;
                unset($conn);
            } catch (Exception $e) {
                echo "ERREUR : " . $e->getMessage();
            }
            ?>
        </div>
    </div>
</body>
<style>
   
</style>

</html>