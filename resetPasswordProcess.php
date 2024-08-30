<?php

include("connection.php");

$vcode = $_POST["vcode"];
$new_pw = $_POST["np"];
$new_pw_2 = $_POST["np2"];

if ($new_pw == $new_pw_2) {
    $rs = Database::search("SELECT * FROM `user` WHERE `v_code`='" . $vcode . "'");
    $num = $rs->num_rows;
    if ($num > 0) {
        $d = $rs->fetch_assoc();
        Database::iud("UPDATE `user` SET `password`='" . $new_pw_2 . "',`v_code`=NULL WHERE `id`='" . $d["id"] . "'");
        echo("success");
    } else {
        echo ("User not found");
    }
} else {
    echo ("Not Mach Password");
}

?>