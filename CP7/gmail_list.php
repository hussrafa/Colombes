<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daron Codeurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>Accés boite aux lettres Gmail</h1>
        <table class="table-striped table">
            <thead>
                <th>DE</th>
                <th>OBJET</th>
                <th>RECU LE</th>
                <th>TAILLE (Ko)</th>
            </thead>
            <tbody>
                <?php
                // Import
                include_once('constants.php');
                // Tentative de connexion a la BAL
                $Inbox = imap_open(MB_HOST, MB_USER, MB_PASS) or die('<div class="alert alert-danger">Connexion au serveur de messagerie impossible : ' . imap_last_error() . '</div>');
                // Récupere tous les emails
                $emails = imap_search($Inbox, 'ALL');
                if ($emails) {
                    $html = '';
                    //Trie les mails du plus récent  au plus ancien
                    rsort($emails);
                    // Pour chaque mail
                    foreach ($emails as $id) {
                        //Lit les infos de l'email
                        $email = imap_fetch_overview($Inbox, $id);
                        $html .= '<tr style="font-weight:' . ($email[0]->seen === 1 ? '' : 'bold') . '">';
                        $html .= '<td>' . imap_utf8($email[0]->from) . '</td>';
                        $html .= '<td><a target="_blank" href=http://' . $_SERVER['HTTP_HOST'] . '/Colombes/CP7/gmail_read.php?id=' . imap_utf8($id) . '>' .  imap_utf8($email[0]->subject) . '</a></td>';
                        $html .= '<td>' . date('Y-m-d H:i:s', $email[0]->udate) . '</td>';
                        $html .= '<td>' . imap_utf8(round(((int)$email[0]->size) / 1024)) . ' Ko</td>';
                        $html .= '</tr>';
                    }
                    echo $html;
                }
                // Ferme la connexion
                imap_close($Inbox);
                ?>
            </tbody>
        </table>
    </div>

</body>
<style>

</style>

</html>