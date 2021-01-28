<?php
include_once("functions.php");
echo average("20", "40", "85", "100");
echo "<br>" . (averageSansargs("20", "40", "85", "100", array(5, 5, array(5))));
echo "<br><select>";
echo generateOption($valList);
echo "</select>";
        // var_dump(is_date("1956-12-23"));
