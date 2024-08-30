<?php

include("connection.php");

$pid = $_POST["pid"];
$qty = $_POST["qty"];
$price = $_POST["price"];

if ($pid == 0) {
    echo ("Please Select Product name");
} else if (empty($qty)) {
    echo ("Please enter Quantity");
} else if (!is_numeric($qty)) {
    echo ("Only numbers can be enterd fro qty");
} else if (strlen($qty) > 10) {
    echo ("Your qty Should be less than 10 caractor");
} else if (empty($price)) {
    echo ("Please enter Unit Price");
} else if (!is_numeric($price)) {
    echo ("Only numbers can be enterd fro price");
} else {
    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id`='" . $pid . "' AND `price`='" . $price . "'");
    $num = $rs->num_rows;
    $data = $rs->fetch_assoc();

    if ($num == 1) {
        //update
        $new_qty = $data['qty'] + $qty;
        Database::iud("UPDATE `stock` SET `qty`='" . $new_qty . "' WHERE `id`='" . $data["id"] . "'");
        echo ("update_stock");
    } else {
        //insert
        Database::iud("INSERT INTO `stock`(`price`,`qty`,`product_id`,`status_status_id`)VALUES('" . $price . "','" . $qty . "','" . $pid . "','1')");
        echo ("new_stock_add");
    }
}
