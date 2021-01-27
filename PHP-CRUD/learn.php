<?php

// $nos = "5";

// $myarray = array("name" => "hussain", "age" => 25, "ville" => "karaikal");

// foreach ($myarray as $e => $k) {
//     echo ".$e. and .$k.<br>";
// }

// echo (is_numeric($nos));

// var_dump($_POST);

$fnameerr = $lnameerr = "";
$flag = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (is_null($_POST["fname"]) || $_POST["fname"] == "") {
        $fnameerr = "First name is required";
    } else {
        echo "The entered first name is " . $_POST["fname"] . "<br>";
    }
    if (is_null($_POST["lname"]) || $_POST["lname"] == "") {
        $lnameerr = "Last name is required";
    } else {
        echo "The entered last name is " . $_POST["lname"] . "<br>";
    }

    if (empty($fnameerr) && empty($lnameerr)) {
        $flag = 1;
    }
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div>
        <div>
            <label for="fname">First Name</label>
        </div>
        <div>
            <input type="text" name="fname" id="fname" value="<?php echo ($flag==0) ? $_POST['fname'] : ''; ?>">
            <span><?php echo $fnameerr; ?></span>
        </div>
        
    </div>

    <div>
        <div>
            <label for="lname">Last Name</label>
        </div>
        <div>
            <input type="text" name="lname" id="lname">
            <span><?php echo $lnameerr; ?></span>
        </div>
        
    </div>
    <button type="submit">Submit</button>
</form>