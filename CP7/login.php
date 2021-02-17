<?php
// 1. vérif et sécurisation des variables $_POST
// isset , !empty et htmlspecialchars
if (isset($_POST["mailogin"]) && !empty($_POST["mailogin"])) {
    $mailogin = htmlspecialchars($_POST["mailogin"], false);
}
if (isset($_POST["pwdlogin"]) && !empty($_POST["pwdlogin"])) {
    $pwdlogin = htmlspecialchars($_POST["pwdlogin"], false);
}

//2. Crypter l'addresse mail et le mot de passe
// mail en MD5 / pass en SHA2, SHA1 et MD5

$crypteedmail = md5($mailogin);
$cryptedpwd = hash(
    'sha512',
    sha1($pwdlogin, false) . $crypteedmail,
    false
);

//3. Tester via connection PDO si l'utilisateur existe
// select count(*)=>1 ou 0 / SELECT *=> rowcount()

try {
    include_once('config.php');
    $pdo = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . "";
    $conn = new PDO($pdo, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $sql = "select fname from users where mail=? and pass=?";
    $qry = $conn->prepare($sql);
    $val = [$crypteedmail, $cryptedpwd];
    $qry->execute($val);
    //3a. Si utilisateur reconnu alors router vers bo.php
    if ($qry->rowCount() > 0) {
        //demarre  une session
        $row=$qry->fetch();
        session_start();
        $_SESSION["connected"]=true;
        $_SESSION["session_id"]=session_id();
        $_SESSION["fname"]=$row["fname"];
        $_SESSION["mail"]=$_POST["mailogin"];       
        header('location:bo.php');
    }
    //3b. sinon router vers index.php avec variable dans
    //querystring -> afficher message dans index.php
    else {
        header('location:index.php?lg=failed');
    }
} catch (Exception $e) {
    echo "ERREUR : " . $e->getMessage();
}
