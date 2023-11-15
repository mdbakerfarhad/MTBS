<?php
require_once 'config.php';
include 'dbConnect.php';
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($_POST['item']) && $_POST['item'] != "") {
    $item = $_POST['item'];
    $result = mysqli_query($con, "SELECT * FROM `all_movie_info` WHERE `id`='$item'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $rating = $row['rating'];
    $item = $row['item'];
    $image = $row['movie_image'];
    $id = $row['id'];

    $cartArray = array(
        $item => array(
            'name' => $name,
            'rating' => $rating,
            'quantity' => 1,
            'price' => 100,
            'item' => $item,
            'image' => $image,
            'id' => $id
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        echo "
        <script>
        alert('Ticket is added to your cart!');
        </script>
        ";
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($item, $array_keys)) {
            echo "
            <script>
            alert('Ticket is already added to your cart!');
            </script>
            ";
        } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
            echo "
        <script>
        alert('Ticket is added to your cart!');
        </script>
        ";
        }
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
    <title>MTBS | Movie Details</title>
</head>

<body>
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->
    <!-- main start  -->
    <main>

        <div class="px-2 py-3">
            <?php
            $ret = mysqli_query($con, "select * from all_movie_info where id='$id'");
            $rowitems = mysqli_fetch_assoc($ret);
            if ($rowitems) {
            ?>
                <h1 class="text-center mb-3"><?php
                                                echo ($rowitems["name"]);
                                                ?> Details</h1>
                <div class="row gap-2 d-flex align-items-center justify-content-center">
                    <div class="col-12 col-md-5 my-2">
                        <img src="images/shows/<?php
                                                echo ($rowitems['id']);
                                                ?>/<?php
                                                    echo ($rowitems['movie_image']);
                                                    ?>" class="mb-3 bg-light error-img" width="100%" height="400" loading="lazy" alt="<?php
                                                                                                                                    echo ($rowitems["name"]);
                                                                                                                                    ?>">
                    </div>

                    <div class="col-12 col-md-5 my-2">
                        <h2>Title:&nbsp;<?php
                                        echo ($rowitems["name"]);
                                        ?></h2>
                        <h3>Released Date:&nbsp;<?php
                                                echo ($rowitems["release"]);
                                                ?></h3>
                        <p>Length:&nbsp;<?php
                                        echo ($rowitems["runtime"]);
                                        ?></p>
                        <p>Genre:&nbsp;
                            <?php
                            if ($rowitems["genre"] == 1) {
                                echo "Advnenture";
                            } else if ($rowitems["genre"] == 2) {
                                echo "Comedy";
                            } else if ($rowitems["genre"] == 3) {
                                echo "Drama";
                            } else if ($rowitems["genre"] == 4) {
                                echo "Thriller";
                            } else if ($rowitems["genre"] == 5) {
                                echo "Action";
                            } else if ($rowitems["genre"] == 6) {
                                echo "Animation";
                            } else {
                                echo "No Genre";
                            }
                            ?></p>
                        <p>IMDb:&nbsp;<?php
                                        echo ($rowitems["rating"]);
                                        ?>/10</p>
                        <form action="movie_details" method="post">
                            <input type="hidden" name="item" value="<?php
                                                                    echo htmlentities($rowitems["item"]);
                                                                    ?>">
                            <button class="btn btn-width btn-outline-success bg-success text-light" type="submit">Book Now</button>
                        </form>

                    </div>

                    <div class="col-12 my-2">
                        <h2 class="text-center">About Movie</h2>
                        <p class="text-center"><?php
                                                echo htmlentities($rowitems["about"]);
                                                ?></p>
                    </div>

                    <div class="col-12 text-center my-2">
                        <h2>Casting</h2>
                        <div class="text-center">
                            <div>
                                <i class="fa-solid fa-user fs-3 text-success border rounded-circle bg-white p-3"></i>
                                <p class="pt-2"><?php
                                                echo htmlentities($rowitems["cast"]);
                                                ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center my-2">
                        <h2>Watch Trailer</h2>
                        <?php
                        echo $rowitems["trailer"];
                        ?>
                    </div>

                <?php
            } else {
                echo "
                <script>
                window.location.href='404';
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
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script type="text/javascript" src="externals/js/script.js"></script>
</body>

</html>