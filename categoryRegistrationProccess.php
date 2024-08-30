<?php

include ("connection.php");

$category = $_POST["category"];

if (empty($category)) {
    echo ("Please Enter Category");
} else if (strlen($category) > 25) {
    echo ("Your Category Name Shuld be less than 25 Charactors");
} else {
    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name`='" . $category . "'");
    $row = $rs->num_rows;
    if ($row > 0) {
        echo ("Category Already Exit");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`)VALUES('" . $category . "')");
        echo ("success");
    }
}

?>