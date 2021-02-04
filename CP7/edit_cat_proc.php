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

//Teste si UPDATE ou INSERT
if (isset($_GET['k']) && !empty($_GET['k'])) {
    $update = true;
} else {
    $update = false;
}
// Récupération de l'image a televerser
//var_dump($_FILES);
if (isset($_FILES['PHOTO']) && $_FILES['PHOTO']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file_exts = ['jpeg', 'gif', 'png', 'jpg', 'webp'];
    //$file_ext = strtolower(explode('/', $_FILES['PHOTO']['type'])[1]);
    $file_ext = strtolower(substr($_FILES['PHOTO']['type'], (strpos($_FILES['PHOTO']['type'], '/') + 1)));
    //explode to split the string
    $file_size = $_FILES['PHOTO']['size'];
    $file_temp = $_FILES['PHOTO']['tmp_name'];
    //Teste si pas d'erreurs
    $errors = [];
    if (!in_array($file_ext, $file_exts)) {
        array_push($errors, "<br/><p>Extenstion du fichier non autorisée : " . implode(',', $file_exts) . "");
    }
    if ($file_size > (int)$_POST["MAX_FILE_SIZE"]) {
        array_push($errors, "<br/><p>File size exteeded . allowed size : " . ((int)$_POST["MAX_FILE_SIZE"]) / 1024 . " ko maxium");
    }
    if (count($errors) > 0) {
        foreach ($errors as $e) {
            echo $e;
        }
        $append = ($_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : "");
        echo "<br/><a href='edit_cat_form.php{$append}'>Back to form</a>";
        exit();
    } else {
        //lire le contenu du fichier a stocker 
        $bin = file_get_contents($file_temp);
        $bin64encode = 'data:' . $_FILES['PHOTO']['type'] . ';base64,' . base64_encode($bin);
        $params[3] = $bin64encode;
    }
} else {
    if ($update) {
        $params[3] = $params[4];
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
if (!$update) {
    $sql = "INSERT INTO categories(CODE_CATEGORIE,NOM_CATEGORIE,DESCRIPTION,PHOTO) VALUES(?,?,?,?)";
} else {
    $sql = "UPDATE categories set NOM_CATEGORIE=?,DESCRIPTION=?,PHOTO=? where CODE_CATEGORIE=?";
}
$res = mysqli_query($conn, $sql);
if (mysqli_stmt_prepare($qry, $sql)) {
    //lie les parametres a la requete preparee
    //mysqli_stmt_bind_param($qry, "issb", ...$params);
    if (!$update) {
        mysqli_stmt_bind_param($qry, "isss", $params[0], $params[1], $params[2], $params[3]);
    } else {
        mysqli_stmt_bind_param($qry, "sssi", $params[1], $params[2], $params[3], $params[0]);
    }
    //exécute la requéte
    $res = mysqli_stmt_execute($qry);
    if ($res) {
        echo "<p>" . ($update ? "update" : "saved") . " successfully</p>";
    } else {
        echo "<p>Prepare error: " . mysqli_error($conn) . "</p>";
    }
    //ferme le statement
    mysqli_stmt_close($qry);
}
//ferme le connexion
mysqli_close($conn);


//redirection

header('location:edit_cat_list.php');
