<?php
require_once 'config.php';
include 'dbConnect.php';
session_start();


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
            window.location.href='cart';
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
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- external css link  -->
    <link rel="stylesheet" href="externals/css/style.css">
    <!-- swipper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>MTBS | Search Result</title>

</head>

<body class="overflow-x-hidden">

    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->

    <!-- main start  -->
    <main>

        <div class="card-body row mx-2 mb-3">
            <div class="col-12 mt-3 text-center">
                <h4>Search Results For <?php if (isset($_GET['search'])) {
                                            echo $_GET['search'];
                                        } ?></h4>
            </div>
            <?php
            if (isset($_GET['search'])) {
                $filtervalues = $_GET['search'];
                $query = "SELECT * FROM all_movie_info WHERE CONCAT(name,about) LIKE '%$filtervalues%' ";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $items) {
            ?>
                        <div class="col-md-4 col-12 mt-3 text-center">
                            <div class="border border-success">
                                <form action="search_result" method="post">
                                    <div class="product-img">
                                        <img  width="100%" height="350" src="images/shows/<?= $items['id']; ?>/<?= $items['movie_image']; ?>" class="mb-3 bg-light error-img" alt="<?= $items['name']; ?>" loading="lazy">
                                    </div>
                                    <a class="text-dark text-decoration-none" href="movie_details.php?id=<?php
                                                                                                            echo htmlentities($items["id"]);
                                                                                                            ?>">
                                        <h5><?= $items['name']; ?></h5>
                                    </a>
                                    <p>Rating: <?= $items['rating']; ?></p>
                                    <input type="hidden" name="item" value="<?php
                                                                            echo htmlentities($items["item"]);
                                                                            ?>">
                                    <button type="submit" class="btn btn-link text-decoration-none border border-warning text-dark px-4 py-1 rounded-pill bg-warning mb-2">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-12 mt-3 text-center no-search-found">
                        <div class="border border-warning p-2">
                            <h5><?php echo "No Movies Found"; ?></h5>
                        </div>
                    </div>
            <?php

                }
            }
            ?>
        </div>

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
    <script src="externals/js/script.js"></script>
</body>

</html>