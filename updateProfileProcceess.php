<?php
include("connection.php");
session_start();
$user = $_SESSION["u"];

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["em"];
$mobile = $_POST["mb"];
$password = $_POST["pw"];
$no = $_POST["no"];
$adress_1 = $_POST["ad_1"];
$adress_2 = $_POST["ad_2"];

if (empty($fname)) {
    echo ("Please Enter Your First Name");
} else if (strlen($fname) > 20) {
    echo ("Your First Name Should be Less than 20 Characters");
} else if (empty($lname)) {
    echo ("Please Enter Your First Name");
} else if (strlen($lname) > 20) {
    echo ("Your Last Name Should be Less than 20 Characters");
} else if (empty($email)) {
    echo ("Please Enter Email Address");
} else if (strlen($email) > 100) {
    echo ("Your Email Address Should be Less than 100 Characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address is Invalid");
} else if (empty($mobile)) {
    echo ("Please Enter Mobile Number");
} else if (strlen($mobile) != 10) {
    echo ("Your Mobile Number must contain 10 Characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your mobile Number is Invalid");
} else if (empty($password)) {
    echo ("Please Enter Password");
} else if (strlen($password) < 5 || strlen($password) > 40) {
    echo ("Your Password must contain 5-45 Characters");
} else if (empty($no)) {
    echo ("Please Enter Address No");
} else if (strlen($no) > 10) {
    echo ("Your No Should be Less than 10 Characters");
} else if (empty($adress_1)) {
    echo ("Please Enter Address line 1");
} else if (strlen($adress_1) > 45) {
    echo ("Your No Should be Less than 45 Characters");
} else if (empty($adress_2)) {
    echo ("Please Enter Address line 1");
} else if (strlen($adress_2) > 45) {
    echo ("Your No Should be Less than 45 Characters");
} else {
    Database::iud("UPDATE `user` SET 
    `fname`='" . $fname . "',
    `lname`='" . $lname . "',
    `email`='" . $email . "',
    `mobile`='" . $mobile . "',
    `password`='" . $password . "',
    `no`='" . $no . "',
    `line_1`='" . $adress_1 . "',
    `line_2`='" . $adress_2 . "' WHERE `id`='".$user["id"]."'");

    echo ("success");

    $rs = Database::search("SELECT * FROM `user` WHERE `id`='" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo ("Update_Success");
}

?>