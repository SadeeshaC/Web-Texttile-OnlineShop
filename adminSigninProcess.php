<?php
session_start();
include ("connection.php");

$username = $_POST["un"];
$password = $_POST["pw"];

if (empty($username)) {
    echo ("Please Enter Username");
} else if (empty($password)) {
    echo ("Please Enter Password");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password`='" . $password . "'");
    $row = $rs->num_rows;
    if (!$row == 0) {
        $data = $rs->fetch_assoc();
        if ($data["user_type_id"] == 1) {
            echo ("Success");
            $_SESSION["a"] = $data;
        } else {
            echo ("You Don`t have an Admin Account.");
        }
    } else {
        echo ("Invalid User Details");
    }
}
?>