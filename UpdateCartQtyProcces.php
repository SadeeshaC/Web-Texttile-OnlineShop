<?php

include("connection.php");

$cart_id = $_POST["c_id"];
$new_qty = $_POST["new_qty"];

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.`stock_id` 
    WHERE `cart_id`='" . $cart_id . "'");

$num = $rs->num_rows;

if ($num > 0) {
    //cart item found
    $d = $rs->fetch_assoc();
    if ($d["qty"] >= $new_qty) {
        Database::iud("UPDATE `cart` SET `cart_qty`='" . $new_qty . "' WHERE `cart_id`='" . $cart_id . "'");
        echo ("success");
    } else {
        echo ("cart item not found");
    }
} else {
    //cart item not found
    echo ("cart item not found");
}

?>