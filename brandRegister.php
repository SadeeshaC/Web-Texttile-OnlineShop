<?php

include ("connection.php");

$barnd = $_POST["brand"];

if (empty($barnd)) {
    echo ("Please Enter Your Brand Name");
} else if (strlen($barnd) > 25) {
    echo ("Your Brand Name Shuld be less than 25 Charactors");
} else {
    $rs = Database::search("SELECT * FROM `brand` WHERE `brand_name` ='" . $barnd . "'");
    $row = $rs->num_rows;
    if ($row > 0) {
        echo ("Brand Name Already Exit");
    } else {
        Database::iud("INSERT INTO `brand`(`brand_name`)VALUES('" . $barnd . "')");
        echo ("Success");
    }
}

?>