<?php

include("connection.php");
session_start();

$user = $_SESSION["u"];
$stock_id = $_POST["stock_id"];
$qty = $_POST["qty"];

$rs = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '" . $stock_id . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $data = $rs->fetch_assoc();
    $stock_qty = $data["qty"];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $user['id'] . "' AND `stock_stock_id`='" . $stock_id . "'");
    $num2 = $rs2->num_rows;

    if ($num2 > 0) {
        //Update Corde
        $data2 = $rs2->fetch_assoc();
        $new_qty = $qty + $data2['cart_qty'];

        if ($stock_qty >= $new_qty) {
            Database::iud("UPDATE `cart` SET `cart_qty`='" . $new_qty . "' WHERE `cart_id`='" . $data2["cart_id"] . "'");
            echo ("Cart Update Successfuly");
        } else {
            echo ("Stock Quantity has been Exceeded!");
        }
    } else {
        //Insert Corde
        if ($stock_qty >= $qty) {
            Database::iud("INSERT INTO `cart`(`cart_qty`,`user_id`,`stock_stock_id`)VALUES('" . $qty . "','" . $user["id"] . "','" . $stock_id . "')");
            echo ("Cart Insert Successfuly");
        } else {
            echo ("Stock Quantity has been Exceeded!");
        }
    }
} else {
    echo ("Your stock is not found");
}

?>
