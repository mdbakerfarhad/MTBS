<?php
session_start();
require_once 'config.php';
include 'dbConnect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $reset_token)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'arafatakash5@gmail.com';                     //SMTP username
        $mail->Password   = 'evlqvmxfagsegkud';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if 

        //Recipients
        $mail->setFrom('arafatakash5@gmail.com', 'Movie Ticket Booking System');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link For Fatima Perfumes & Gift Inc';
        $mail->Body    = "We got a reset password request from you. <br>
        Click the link below to reset your password <a href='http://localhost/MTBS/updatepassword?email=$email&resettoken=$reset_token'>Reset Password</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $query = " SELECT * FROM `user_info` WHERE `email`='$email'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Dhaka');
            $date = date("Y-m-d");
            $query = "UPDATE `user_info` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `email`='$_POST[email]'";
            if (mysqli_query($con, $query) && sendMail($_POST['email'], $reset_token)) {
                echo "
                <script>
                alert('Password reset link sent to mail');
                window.location.href='login';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Server down!! Try again');
                window.location.href='forgetpassword';
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('Email not found');
            window.location.href='signup';
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Can not run query');
        window.location.href='fogetpassword';
        </script>
       ";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css link  -->
    <link rel="stylesheet" href="externals/css/style.css">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>MTBS | Forget Password</title>
</head>

<body>
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->
    <!-- main start  -->
    <main class="forget-page bg-light">
        <div class="d-flex flex-column align-items-center justify-content-center py-5">
            <div class="bg-light p-3 border border-warning shadow-lg p-3 mb-5 bg-body-warning rounded">
                <h2 class="text-muted text-center pt-2">Enter your MTBS email address</h2>
                <form class="p-3" action="forgetpassword" method="POST" autocomplete="off">
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="email" name="email" value="<?php if (isset($_COOKIE['useremail'])) {
                                                                        echo $_COOKIE['useremail'];
                                                                    }  ?>" placeholder="Enter your Email" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <button class="btn btn-width btn-outline-warning text-dark" name="submit" type="submit">Send Reset Link</button>
                </form>
            </div>
        </div>
    </main>
    <!-- main end  -->

    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->

    <!-- jQuery library is required. -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script type="text/javascript" src="externals/js/script.js"></script>
</body>

</html>