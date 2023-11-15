<?php
session_start();
require_once 'config.php';
include 'dbConnect.php';
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

<body class="overflow-x-hidden">
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->
    <!-- main start  -->
    <main class="bg-light">

        <?php

        if (isset($_GET['email']) && isset($_GET['resettoken'])) {
            date_default_timezone_set('Asia/Dhaka');
            $date = date("Y-m-d");
            $email = mysqli_real_escape_string($con,$_GET['email']);
            $query = " SELECT * FROM `user_info` WHERE `email`='$email' AND `resettoken`='$_GET[resettoken]' AND `resettokenexpire`='$date'";
            $result = mysqli_query($con, $query);
            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    echo "
                    <div class='d-flex flex-column align-items-center justify-content-center py-5'>
                        <div class='bg-light p-3 border border-warning shadow-lg p-3 mb-5 bg-body-warning rounded'>
                            <h2 class='text-muted text-center pt-2'>Enter your new password</h2>
                            <form class='p-3' action='' method='POST' autocomplete='off'>
                                <div class='form-group py-2'>
                                    <div class='input-field'> 
                                        <input type='password' id='myInput' name='password' placeholder='Enter your password' required class='form-control px-3 py-2'> 
                                    </div>
                                    <input type='hidden' name='email' value='$_GET[email]'> 
                                </div>
                                <div class='form-group py-2'>
                                <label for='showpass'>
                                    <div class='input-field'>
                                        <input type='checkbox' id='showpass' onclick='myFunction()'>&nbsp;Show Password
                                    </div>
                                </label>
                            </div>
                                    <button class='btn btn-width btn-outline-warning bg-warning text-dark' name='submit' type='submit'>Update Password</button>
                            </form>
                        </div>
                    </div>
                    ";
                } else {
                    echo "
                    <script>
                    alert('Server down!! Try again');
                    window.location.href='updatepassword';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('Can not run query');
                window.location.href='updatepassword';
                </script>
                ";
            }
        } else {
            echo "
            <script>
            window.location.href='index';
            </script>
            ";
        }

        ?>
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

        <?php
        if (isset($_POST['submit'])) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $update = "UPDATE `user_info` SET `password`='$password',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `email`='$email'";
            if (mysqli_query($con, $update)) {
                echo "
                <script>
                alert('Password changed successfully');
                window.location.href='login';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Server down!! Try again');
                window.location.href='updatepassword';
                </script>
                ";
            }
        }
        ?>
</body>

</html>