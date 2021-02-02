<?php
//Sécurité : step 2
// protége les saisies d'une éventuelle injection
$params = [];
foreach ($_POST as $key => $value) {
    if (isset($key) && !empty($key)) {
        $params[] = htmlspecialchars($value);
    } else {
        $params[] = null;
    }
}
// Récupération de l'image a televerser
//var_dump($_FILES);
if (isset($_FILES['PHOTO']) && $_FILES['PHOTO']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file_exts = ['jpeg', 'gif', 'png', 'jpg', 'webp'];
    //$file_ext = strtolower(explode('/', $_FILES['PHOTO']['type'])[1]);
    $file_ext = substr($_FILES['PHOTO']['type'], (strpos($_FILES['PHOTO']['type'], '/') + 1));
    //explode to split the string
    $file_size = $_FILES['PHOTO']['size'];
    $file_temp = $_FILES['PHOTO']['tmp_name'];
    //Teste si pas d'erreurs
    $errors = [];
    if (!in_array($file_ext, $file_exts, true)) {
        array_push($errors, "<br/><p>Extenstion du fichier non autorisée : " . implode(',', $file_exts) . "");
    }
    if ($file_size > (int)$_POST["MAX_FILE_SIZE"]) {
        array_push($errors, "<br/><p>File size exteeded . allowed size : " . ((int)$_POST["MAX_FILE_SIZE"]) / 1024 . " ko maxium");
    }
    if (count($errors) > 0) {
        foreach ($errors as $e) {
            echo $e;
        }
        echo "<br/><a href='edit_cat_form.php'>Back to form</a>";
        exit();
    } else {
        //lire le contenu du fichier a stocker 
        $bin = file_get_contents($file_temp);
        $bin64encode = 'data:' . $_FILES['PHOTO']['type'] . ';base64,' . base64_encode($bin);
        $params[3]=$bin64encode;
    }
}
//var_dump($params);
//Connecxion a la BDD via MYSQLI
$conn = mysqli_connect("localhost", "root", "greta", "northwind");
if (!$conn) {
    echo "<p>Failed to open connection " . mysqli_connect_error() . "</p>";
    exit();
}
//prepration de la requete
$qry = mysqli_stmt_init($conn);
$sql = "INSERT INTO categories(CODE_CATEGORIE,NOM_CATEGORIE,DESCRIPTION,PHOTO) VALUES(?,?,?,?)";

$res = mysqli_query($conn, $sql);
if (mysqli_stmt_prepare($qry, $sql)) {
    //lie les parametres a la requete preparee
    //mysqli_stmt_bind_param($qry, "issb", ...$params);
    mysqli_stmt_bind_param($qry, "isss", $params[0], $params[1], $params[2], $params[3]);
    //exécute la requéte
    $res = mysqli_stmt_execute($qry);
    if ($res) {
        echo "<p>Saved successfully</p>";
    } else {
        echo "<p>Prepare error: " . mysqli_error($conn) . "</p>";
    }
    //ferme le statement
    mysqli_stmt_close($qry);
}
//ferme le connexion
mysqli_close($conn);
