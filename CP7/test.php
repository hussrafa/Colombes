
<?php
// phpinfo();

setlocale(LC_TIME, "fr-FR");
function printname($nom, $dt)
{
    echo "<h1>salut ,</h1><p> je m'appelle $nom et je travaille chez les darons coderus depuis le $dt </p>";
}
printname("Mohamed", date("d/m/Y", mktime(0, 0, 0, 11, 2, 2020)));

?>
