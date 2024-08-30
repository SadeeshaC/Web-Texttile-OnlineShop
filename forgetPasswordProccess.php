<?php

include("connection.php");

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$email = $_POST['email'];
$vcode = uniqid();

$rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
$num = $rs->num_rows;

if ($num > 0) {
    Database::iud("UPDATE `user` SET `v_code`='" . $vcode . "' WHERE `email`='" . $email . "'");

    $mail = new PHPMailer(true);

    try {
        $mail = new PHPMailer;

        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chathubashinijithmi@gmail.com';
        $mail->Password = 'ijjcbccmftjbetdo';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('chathubashinijithmi@gmail.com', 'Online Store');
        $mail->addReplyTo('************************', 'Reset Password');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Reset your account password';
        $mail->Body    = '<table style="width: 100%; font-family: sans-serif;">
    <tbody>
        <tr>
            <td align="center">
                <table>

                    <tr>
                        <td align="center">
                            <a href="#" style="font-size: 35px; text-decoration: none; font-weight: bold; color: black;">Online Store</a>
                            <hr />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h1 style="font-size: 25px; font-weight:600; line-height: 45px;">Reset Your Password</h1>
                            <p style="margin-bottom: 25px;">You can change your password by clicking the button below.</p>
                            <div>
                                <a href="http://localhost/online_store/resetPassword.php?vcode='.$vcode.'" style="text-decoration: none; display: inline-block; border-radius: 6px; background-color:blueviolet;
                                color: white; padding:10px">
                                    <span>Reset Password</span>
                                </a>
                            </div>
                            <p style="margin-top: 15px;">If you didn\'t ask you reset your password, you can ignore this email.</p>
                            <hr />
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <p style="font-size: 13px;">&copy; 2024 OnlineStore.lk || All Right Reserved</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </tbody>
</table>';

        $mail->send();
        echo ('success');
    } catch (Exception $e) {
        echo ("Massage could not be sent. Mailer Error:{$email->ErrorInfo}");
    }
} else {
    echo ("User Not Found! Please check your Email");
}
?>