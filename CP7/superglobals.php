<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>North Traders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>SERVER</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Key
                    </th>
                    <th>
                        value
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SERVER as $key => $value) {
                    echo "<tr>";
                    echo "<td>{$key}</td>";
                    echo "<td>{$value}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div>
            <h2>ENV</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Key
                        </th>
                        <th>
                            value
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($_ENV as $key => $value) {
                        echo "<tr>";
                        echo "<td>{$key}</td>";
                        echo "<td>{$value}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div>
            <h2>COOKIE</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Key
                        </th>
                        <th>
                            value
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    setcookie('granola', 'test');
                    setcookie('prince', 'chanteur pop des anées 80', time() + 24 * 60 * 60, '/');
                    foreach ($_COOKIE as $key => $value) {
                        echo "<tr>";
                        echo "<td>{$key}</td>";
                        echo "<td>{$value}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div>
            <h2>GET</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Key
                        </th>
                        <th>
                            value
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_GET as $key => $value) {
                        echo "<tr>";
                        echo "<td>{$key}</td>";
                        echo "<td>{$value}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div>
            <h2>session</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Key
                        </th>
                        <th>
                            value
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    $_SESSION["test"] = "key";
                    foreach ($_SESSION as $key => $value) {
                        echo "<tr>";
                        echo "<td>{$key}</td>";
                        echo "<td>{$value}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>