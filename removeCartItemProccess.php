<?php
    include("connection.php");
    $cart_id = $_POST["cart_id"];

    Database::iud("DELETE FROM `cart` WHERE `cart_id`='".$cart_id."'");
    echo("Item Remove Successfuly");
?>