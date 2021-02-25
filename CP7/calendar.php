<?php
include_once('singleton.php');
include_once('constants.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.js"></script>
    <script src="js/calendar.js"></script>
</head>

<body class="container">
    <h1>Calendrier des commandes</h1>
    <div class="btn-group" role="group" aria-label="Basic example"></div>
    <a href="new_command.php" class="btn btn-secondary">command</a>
    <div id="calendar"></div>
</body>

</html>