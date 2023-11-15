<?php
session_start();
require_once 'config.php'; 
include 'dbConnect.php';

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $email = mysqli_real_escape_string($con,$_GET['email']);
    $query = "SELECT * from `user_info` WHERE `email`='$email' AND `v_code`='$_GET[v_code]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 0) {
                $update = "UPDATE `user_info` SET `verified`='1' WHERE `email`='$result_fetch[email]'";
                if (mysqli_query($con, $update)) {
                    echo "
                    <script>
                    alert('Email verification successful');
                    window.location.href='login';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                    alert('Can not run query');
                    window.location.href='login';
                    </script>
                    ";  
                }
            } else {
                echo "
                <script>
                alert('Email already verified');
                window.location.href='login';
                </script>
                ";
            }
        }else {
            echo "
            <script>
            alert('Email not registered yet');
            window.location.href='signup';
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Can not run query');
        window.location.href='login';
        </script>
        ";
    }
}