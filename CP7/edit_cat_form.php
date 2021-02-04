<?php
if (isset($_GET["k"]) && !empty($_GET["k"])) {
    $flag = false;
    $conn = mysqli_connect("localhost", "root", "greta", "northwind");
    if (!$conn) {
        echo "<p>Error connection Mysql : " . mysqli_connect_error() . "</p>";
        die();
    }
    $qryToExecute = "select * from categories where CODE_CATEGORIE=" . $_GET["k"] . "";
    $res = mysqli_query($conn, $qryToExecute);
    if ($res) {
        $row =  mysqli_fetch_array($res);
        if ($row !== null) {
            $catCode = $row["CODE_CATEGORIE"];
            $nomCat = $row["NOM_CATEGORIE"];
            $desc = $row["DESCRIPTION"];
            $photo = $row["PHOTO"];
            $flag = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>Edition des catégories</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item"><a href="edit_cat_list.php">Liste des catégories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edition Catégories</li>
            </ol>
        </nav>
        <form action="edit_cat_proc.php<?php echo ($_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : "") ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="CODE_CATEGORIE">code catégorie : </label>
                <input type="number" name="CODE_CATEGORIE" value="<?php echo (isset($_GET["k"]) && !empty($_GET["k"]) && $flag) ? ($catCode) : "" ?>" id="CODE_CATEGORIE" class="form-control" pattern="[0-9]{1,6}" required>
            </div>
            <div class="form-group">
                <label for="NOM_CATEGORIE">Nom catégorie : </label>
                <input type="text" name="NOM_CATEGORIE" id="NOM_CATEGORIE" value="<?php echo (isset($_GET["k"]) && !empty($_GET["k"]) && $flag) ? ($nomCat) : "" ?>" class="form-control" required pattern="[A-Za-z\u00C0-\00FF '\-]{1,25}">
            </div>
            <div class="form-group">
                <label for="DESCRIPTION">DESCRIPTION : </label>
                <textarea name="DESCRIPTION" id="DESCRIPTION" cols="121" rows="10" class="form-control"><?php echo (isset($_GET["k"]) && !empty($_GET["k"]) && $flag) ? ($desc) : "" ?></textarea>
            </div>
            <div class=" form-group">
                <label for="PHOTO">PHOTO : </label>
                <input type="file" name="PHOTO" id="PHOTO" class="form-control" accept=".jpeg,.gif,.jpg,.png,.webp">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000">
            </div>
            <div class=" form-group">
                <input type="hidden" name="UPDATE_PHOTO" value="<?php echo (isset($_GET["k"]) && !empty($_GET["k"]) && $flag) ? ($photo) : "" ?>">
            </div>
            <div class="form-group">
                <div style="text-align: left;">
                    <input type="submit" value="<?php echo (isset($_GET["k"]) && !empty($_GET["k"]) && $flag) ? "update" : "submit" ?>" class="btn btn-success">
                    <a href="edit_cat_list.php"><input class="btn btn-secondary" type="button" value="Back to list"></a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>