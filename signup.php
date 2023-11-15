<?php

require_once 'config.php';
include 'dbConnect.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code)
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
        $mail->Subject = 'Email Verification for Movie Ticket Booking System';
        $mail->Body    = "Thanks for your registration. <br>
        Click the link below to verify your email address <a href='http://localhost/MTBS/verify?email=$email&v_code=$v_code'>Verifiy</a>";
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}


if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $user_exist_query = "SELECT * from `user_info` WHERE `email`='$email' AND `verified`=1";
    $result = mysqli_query($con, $user_exist_query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['email'] == $_POST['email']) {
                echo "
                <script>
                alert('$result_fetch[email] - Email already taken');
                window.location.href='signup';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('$result_fetch[email] - Email available for registration');
                </script>
                ";
            }
        } else {
            $v_code = bin2hex(random_bytes(16));
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
            $query = "INSERT INTO `user_info`(`email`, `password`,`fullname`,`v_code`,`verified`) VALUES ('$email','$password','$fullname', '$v_code','0')";
            if (mysqli_query($con, $query) && sendMail($email, $v_code)) {
                echo "
                <script>
                alert('Registration successful. Please check your email');
                window.location.href='login';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Server Down');
                window.location.href='signup';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
        alert('Can not run query');
        window.location.href='signup';
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
    <title>MTBS | Sign Up</title>
</head>

<body class="overflow-x-hidden">
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->
    <!-- main start  -->
    <main class="bg-light">
        <div class="d-flex flex-column align-items-center justify-content-center py-5">
            <div class="g-light p-3 border border-warning shadow-lg p-3 mb-5 bg-body-warning rounded">
                <h2 class="text-muted text-center pt-2">Enter your MTBS signup details</h2>
                <form class="p-3" action="signup" method="POST" autocomplete="off">
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="text" name="fullname" placeholder="Enter your full name" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="email" name="email" placeholder="Enter your email" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="password" id="myInput" name="password" placeholder="Enter your password" required class="form-control px-3 py-2 ">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <label for="showpass">
                            <div class="input-field">
                                <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;Show Password
                            </div>
                        </label>
                    </div>
                    <button class="btn btn-width btn-outline-success bg-success text-light" name="submit" type="submit">Sign Up</button>
                    <div class="text-center mt-3 text-muted">Already a member? <a href="login">Sign In</a></div>
                    <div class="text-center mt-3 text-muted">
                        <a href="forgetpassword">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <!-- main end  -->

    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->
    <!-- jQuery library link -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- external js link  -->
    <script type="text/javascript" src="externals/js/script.js"></script>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- internal script link  -->
    <script>
        function myFunction() {
            let x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>