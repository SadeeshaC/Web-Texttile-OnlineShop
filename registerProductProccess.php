<?php

include("connection.php");

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$color = $_POST["color"];
$size = $_POST["size"];
$desc = $_POST["desc"];

if (empty($pname)) {
    echo ("Please Enter Product Name");
} else if (strlen($pname) > 30) {
    echo ("Your product name should be less than 30 caractors");
} else if ($brand == "0") {
    echo ("Please Select Brand");
} else if ($cat == "0") {
    echo ("Please Select Category");
} else if ($color == "0") {
    echo ("Please Select Color");
} else if ($size == "0") {
    echo ("Please Select Size");
} else if (empty($desc)) {
    echo ("Please Enter Discription");
} else if (strlen($desc) > 100) {
    echo ("Your Description should be less than 100 caractors");
} else if (empty($_FILES["image"])) {
    echo ("Please Select Product Image");
} else {

    $rs = Database::search("SELECT * FROM `product` WHERE `name`='" . $pname . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Product has been already registerd");
    } else {
        $path = "Resources/productImg//" . uniqid() . ".png";
        move_uploaded_file($_FILES["image"]["tmp_name"], $path);

        Database::iud("INSERT INTO `product`(`name`,`discription`,`img_path`,`brand_id`,`size_id`,`category_id`,`color_id`,`status_id`)
            VALUES('" . $pname . "','" . $desc . "','" . $path . "','" . $brand . "','" . $size . "','" . $cat . "','" . $color . "','1')");
        echo ("succsess");
    }
}
