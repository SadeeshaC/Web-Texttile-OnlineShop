<?php
session_start();
include ("connection.php");

$username = $_POST["un"];
$password = $_POST["pw"];
$rememberme = $_POST["rm"];

if (empty($username)) {
    echo ("Please Enter Your Username");
} else if (empty($password)) {
    echo ("Please Enter Your Password");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `username`='" . $username . "' AND `password`='" . $password . "'");
    $rowscount = $rs->num_rows;
    $row = $rs->fetch_assoc();

    if ($rowscount == 1) {
        if ($row["status"] == 1) {
            //Active User
            echo ("success");
            $_SESSION["u"] = $row;

            if ($rememberme == "true") {
                //Set Cookies
                setcookie("username", $username, time() + (60 * 60 * 60 * 365));
                setcookie("password", $password, time() + (60 * 60 * 60 * 365));
            } else {
                //Destroy Cookies
                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }

        } else {
            echo ("Inactive User");
        }
    } else {
        echo ("Invalid Username or Password");
    }
}
?>