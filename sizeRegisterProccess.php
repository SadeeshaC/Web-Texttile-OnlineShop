<?php
include ("connection.php");
$size = $_POST["size"];

if (empty($size)) {
    echo ("Please Enter Your size");
} else if (strlen($size) > 10) {
    echo ("Your Color Shuld be less than 25 Charactors");
} else {
    $rs = Database::search("SELECT * FROM `size` WHERE `size_name`='" . $size . "'");
    $row = $rs->num_rows;
    if ($row > 0) {
        echo ("Already Exit size");
    } else {
        Database::iud("INSERT INTO `size`(`size_name`)VALUES('" . $size . "')");
        echo ("success");
    }
}
?>