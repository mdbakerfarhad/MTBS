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
    <!-- external css link  -->
    <link rel="stylesheet" href="externals/css/style.css">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>MTBS | Pricing</title>
</head>

<body class="overflow-x-hidden">
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->
    <!-- main start  -->
    <main>
        <section class="px-2">
            <div class="pricing-header pb-3 pb-md-4 mx-auto text-center">
                <h1 class="text-center">Pricing</h1>
                <p class="fs-5 text-body-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque molestiae odit veritatis error. Consectetur quam reiciendis dignissimos deleniti facere. Eveniet, animi assumenda, in accusantium possimus illum et, cumque nostrum minus voluptate facere? Nobis, commodi velit repellendus est soluta blanditiis veniam quaerat earum repellat, harum iste sint ratione quam, itaque provident?</p>
            </div>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-warning">
                        <div class="card-header py-3 text-bg-warning border-warning">
                            <h4 class="my-0 fw-normal">Regular</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">BDT. 100<small class="text-body-secondary fw-light">/person</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>One Movie Shows</li>
                                <li>Popcorn</li>
                                <li>3D Glass Support</li>
                                <li>Help center access</li>
                            </ul>
                            <a type="button" href="index#now-showing" class="w-100 btn btn-lg btn-warning">Book Tickets</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-warning">
                        <div class="card-header py-3 text-bg-warning border-warning">
                            <h4 class="my-0 fw-normal">Premium</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">BDT. 300<small class="text-body-secondary fw-light">/person</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>One Movie Shows</li>
                                <li>Popcorn & Cold Drinks</li>
                                <li>3D Glass Support</li>
                                <li>Help center access</li>
                            </ul>
                            <a type="button" href="index#now-showing" class="w-100 btn btn-lg btn-warning">Book Tickets</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-warning">
                        <div class="card-header py-3 text-bg-warning border-warning">
                            <h4 class="my-0 fw-normal">Vip</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">BDT. 500<small class="text-body-secondary fw-light">/person</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>One Movie Shows</li>
                                <li>Popcorn, Colddrinks & Special Seat</li>
                                <li>3D Glass Support</li>
                                <li>Help center access</li>
                            </ul>
                            <a type="button" href="index#now-showing" class="w-100 btn btn-lg btn-warning">Book Tickets</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       
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
</body>

</html>