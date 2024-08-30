<?php

include("connection.php");
session_start();
$user = $_SESSION["u"];

if (empty($_FILES["profile_img"])) {
    echo ("empty");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $data = $rs->fetch_assoc();

    if (!empty($data["profile_path"])) {
        unlink($data["profile_path"]); //Dlete From the Project
    }
    $path = "Resources/profileImage//" . uniqid() . ".png";
    move_uploaded_file($_FILES["profile_img"]["tmp_name"], $path);

    Database::iud("UPDATE `user` SET `profile_path` = '" . $path . "' WHERE `id`='" . $user["id"] . "'");
    echo ($path);
    
}
?>