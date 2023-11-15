<?php
require_once 'config.php';
include 'dbConnect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="10; url=index">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- external css link  -->
    <link rel="stylesheet" href="externals/css/style.css">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>404 Page Not Found</title>
</head>

<body>

    <!-- main start  -->
    <main>
        <div class="d-flex flex-column gap-4 align-items-center justify-content-center text-center error-pages">
            <i class="fa-regular fa-face-sad-tear"></i>
            <h1>404</h1>
            <h3>Page Not Found</h3>
            <p>The page you are looking for doesn't exist. <br> So go back and choose a new direction.</p>
            <div class="d-inline">
                <a href="index" class="py-2 px-4 bg-warning border rounded-4 text-decoration-none text-dark">Go to home</a>
            </div>
        </div>
    </main>
    <!-- main end  -->


    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script type="text/javascript" src="externals/js/script.js"></script>
</body>

</html>