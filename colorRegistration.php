<?php
include ("connection.php");
$color = $_POST["color"];

if (empty($color)) {
    echo ("Please Enter Your Color");
} else if (strlen($color) > 25) {
    echo ("Your Color Shuld be less than 25 Charactors");
} else {
    $rs = Database::search("SELECT * FROM `color` WHERE `color_name`='" . $color . "'");
    $row = $rs->num_rows;
    if ($row > 0) {
        echo ("Already Exit Color");
    } else {
        Database::iud("INSERT INTO `color` (`color_name`)VALUES('" . $color . "')");
        echo ("success");
    }
}

?>