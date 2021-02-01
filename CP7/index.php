<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Northwind Tranders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    Accueil </li>
                <li class="breadcrumb-item active"><a href="edit_cat_form.php">Catégories</a></li>
            </ol>
        </nav>
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">Projet fil rouge en HTML, CSS, JS, PHP et MySQL basé sur le jeu de donées Northwind</p>
            <?php
            $diff = (strtotime(date('Y-m-d')) - strtotime(date('2020-11-02'))) / 60 / 60 / 24;
            echo 'Développé par Hussain,Daron Coder depuis ".$diff." Jours.'; ?>
            <hr class="my-4">
            <p>Cliquer sur le buton ci-dessous pour accéder au back-office(user et mot de passe requis):</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Connexion</a>
        </div>
        <?php include_once("menu.php"); ?>
        <h2>Members d'équipe</h2>
        <section id="team">
            <?php
            include_once("team.php");

            echo "<div class='d-flex ml-5' style='flex-wrap: wrap;'>";
            $color = "";
            $maried = "";

            for ($i = 0; $i < count($members); $i++) {
                $color = $members[$i][2] == "F" ? "girl" : "boy";
                echo "<div class='mt-2 mr-2'>";
                echo "<div class='card " . $color . "' style='width: 15rem;'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $members[$i][0] . "</h5>";
                echo "<p class='card-text'>" . (string)$members[$i][1] . " ans</p>";
                if ($members[$i][2] == "F" and $members[$i][3] === true) {
                    $maried = "Mariée";
                } else if ($members[$i][2] == "M" and $members[$i][3] === true) {
                    $maried = "Marié";
                } else {
                    $maried = "Célibataire";
                }
                echo "<p class='card-text'>" . $maried . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
            ?>
        </section>
        <!-- <img src="..." class="card-img-top" alt="..."> -->
    </div>
</body>

</html>