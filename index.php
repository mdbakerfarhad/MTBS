<?php
require_once 'config.php';
include 'dbConnect.php';
session_start();

if (isset($_POST['submit'])) {
    $reviewname = $_SESSION['user_fullname'];
    $reviewmovie = $_POST['movie'];
    $reviewtitle = mysqli_real_escape_string($con, $_POST['title']);
    $reviewreview = mysqli_real_escape_string($con, $_POST['review']);

    $queryy = "INSERT INTO `reviews`(`name`,`movie`,`title`,`review`,`time`,`verified`)VALUES('$reviewname','$reviewmovie','$reviewtitle','$reviewreview',current_timestamp(),'0')";
    $resultt = mysqli_query($con, $queryy);
    if ($resultt) {
        echo "
        <script>
        window.location.href='index#reviews';
        alert('Review Message Sent Successfully');
        </script>
        ";
    } else {
        echo "
        <script>
        window.location.href='index#honest-review';
        alert('Review Message Sent Failed');
        </script>
        ";
    }
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
        window.location.href='cart';
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
            window.location.href='cart';
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
    <!-- meta tag for seo purpose  -->
    <!-- <base href="localhost/MTBS/"> -->
    <meta name="description" content="MTBS is a user-friendly online platform dedicated to simplifying the process of purchasing movie tickets. With a wide array of cinema options, showtimes, and locations, MTBS offers moviegoers a convenient and efficient way to browse, select, and secure tickets for their favorite films. Whether you're planning a solo movie night or a group outing, MTBS provides a seamless experience, making it easy to book your tickets and enjoy the latest blockbuster or indie flick hassle-free. Say goodbye to long queues and hello to a hassle-free moviegoing experience with MTBS.">
    <meta name="keywords" content="Movie Tickets, Online Booking, Showtimes, Cinema Tickets, Film Reservations, Movie Screening, Theater Tickets, Box Office, Movie Seats, Ticket Prices, Movie Theaters, Moviegoers, Ticket Availability, Movie Showings, Movie Night Out, Movie Premieres, Film Releases, Seat Selection, Movie Buffs, Entertainment Events">
    <meta name="robots" content="index, follow">
    <!-- external css link  -->
    <link rel="stylesheet" href="externals/css/style.css">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- swipper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- manifest link  -->
    <link rel="manifest" href="manifest.webmanifest">
    <!-- website title  -->
    <title>MTBS</title>
</head>

<body class="overflow-x-hidden">
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->
    <!-- main start  -->
    <main>
        <!-- top banner section start  -->
        <section id="top-banner">
            <div class="swiper top-banner">
                <div class="swiper-wrapper">
                    <?php
                    $ret = mysqli_query($con, "select * from movie_banner order by `id` desc limit 3");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>

                        <div class="swiper-slide">
                            <img src="images/banners/<?php
                                                        echo htmlentities($row['id']);
                                                        ?>/<?php echo htmlentities($row['banner_image']);
                                                            ?>" width="100%" class="error-img banner-img" alt="<?php echo htmlentities($row['movie']);
                                                                                                                ?>">
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!-- top banner section end  -->

        <!-- now showing section start  -->
        <section id="now-showing" class="py-3">
            <div class="text-center">
                <h1>Now Showing</h1>
                <a href="movie_search_filter">See All</a>
                <div class="swiper all-shows mx-4 px-3 mt-3">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from all_movie_info where visibility='nowshowing' order by `id` desc");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="swiper-slide bg-light border border-success">
                                <form action="index" method="post">
                                    <div class="movie-img">
                                        <img width="300" height="350" src="images/shows/<?php
                                                                                        echo htmlentities($row['id']);
                                                                                        ?>/<?php
                                                                                            echo htmlentities($row['movie_image']);
                                                                                            ?>" class="mb-3 bg-light error-img" alt="<?php
                                                                                                                                        echo htmlentities($row["name"]);
                                                                                                                                        ?>" loading="lazy">
                                    </div>
                                    <a class="text-dark text-decoration-none" href="movie_details?id=<?php
                                                                                                        echo htmlentities($row["id"]);
                                                                                                        ?>">
                                        <h3 class="shows-name"><?php
                                                                echo htmlentities($row["name"]);
                                                                ?></h3>
                                    </a>
                                    <p>Rating: <?php
                                                echo htmlentities($row["rating"]);
                                                ?></p>
                                    <input type="hidden" name="item" value="<?php
                                                                            echo htmlentities($row["item"]);
                                                                            ?>">
                                    <button type="submit" class="btn btn-link text-decoration-none border border-success text-light px-4 py-1 rounded-pill bg-success mb-2">Buy Tickets</button>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next text-success"></div>
                    <div class="swiper-button-prev text-success"></div>
                </div>
            </div>
        </section>
        <!-- now showing section end  -->

        <!-- review section start  -->
        <section id="reviews" class="py-3">
            <div class="text-center">
                <h1>Reviews</h1>
                <div class="swiper slider-for-review px-3 mx-4 mt-3">
                    <div class="swiper-wrapper mb-5">
                        <?php
                        $ret = mysqli_query($con, "select * from reviews where verified='1' order by `id` desc");
                        if (mysqli_num_rows($ret) > 0) {
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>
                                <div class="swiper-slide review-bg px-3 text-start border border-success">
                                    <?php
                                    $queryy = "select * from all_movie_info";
                                    $rett = mysqli_query($con, $queryy);
                                    while ($roww = mysqli_fetch_array($rett)) {
                                        if ($row['movie'] === $roww['id']) {
                                    ?>
                                            <div class="d-flex align-items-center">
                                                <img width="100" height="100" class="error-img rounded-circle me-4" src="images/shows/<?php echo htmlentities($roww['id']); ?>/<?php echo htmlentities($roww['movie_image']); ?>" alt="<?php echo htmlentities($roww["name"]); ?>">
                                                <h4 class="text-muted"><?php echo htmlentities($roww["name"]); ?></h4>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <h3 class="shows-name fw-bolder"><?php echo htmlentities(substr($row["title"], 0, 40)) . "........"; ?></h3>
                                    <p><?php echo htmlentities(substr($row["review"], 0, 300)) . "........"; ?></p>
                                    <div class="d-flex justify-content-end align-items-center my-3">
                                        <div>
                                            <a href="movie_review?id=<?php echo htmlentities($row['id']); ?>">Read More...</a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa-solid fa-user text-success border rounded-circle bg-white p-1"></i><span class="ms-2"><?php echo htmlentities($row['name']); ?></span>
                                        </div>
                                        <div>
                                            <p><?php echo htmlentities($row['time']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-12 mt-3 text-center no-search-found">
                                <div class="border border-warning p-2">
                                    <h5><?php echo "No Reviews Found"; ?></h5>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next text-success"></div>
                    <div class="swiper-button-prev text-success"></div>
                </div>
            </div>
        </section>
        <!-- review section end  -->

        <!-- upcoming shows section start  -->
        <section id="upcoming-shows" class="py-3">
            <div class="text-center">
                <h1>Upcoming Shows</h1>
                <a href="movie_search_filter.php">See All</a>
                <div class="swiper all-shows mx-4 px-3 mt-3">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from all_movie_info where visibility='upcomingshow' order by `id` desc");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="swiper-slide bg-light border border-success">
                                <form action="index" method="post">
                                    <div class="movie-img">
                                        <img width="300" height="350" src="images/shows/<?php
                                                                                        echo htmlentities($row['id']);
                                                                                        ?>/<?php
                                                                                            echo htmlentities($row['movie_image']);
                                                                                            ?>" class="mb-3 bg-light error-img" alt="<?php
                                                                                                                                        echo htmlentities($row["name"]);
                                                                                                                                        ?>" loading="lazy">
                                    </div>
                                    <a class="text-dark text-decoration-none" href="movie_details?id=<?php
                                                                                                        echo htmlentities($row["id"]);
                                                                                                        ?>">
                                        <h3 class="shows-name"><?php
                                                                echo htmlentities($row["name"]);
                                                                ?></h3>
                                    </a>
                                    <p>Rating: <?php
                                                echo htmlentities($row["rating"]);
                                                ?></p>
                                    <input type="hidden" name="item" value="<?php
                                                                            echo htmlentities($row["item"]);
                                                                            ?>">
                                    <button type="submit" class="btn btn-link text-decoration-none border border-success text-light px-4 py-1 rounded-pill bg-success mb-2">Buy Tickets</button>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next text-success"></div>
                    <div class="swiper-button-prev text-success"></div>
                </div>
            </div>
        </section>
        <!-- upcoming shows section end  -->
        <!-- honest review section start  -->
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        ?>
            <section id="honest-review" class="py-3">
                <div class="mx-4 px-3 mt-3">
                    <h1 class="text-center">Submit Reviews For Movies</h1>
                    <form action="index.php" method="post" id="review-form">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Reviewer Name</label>
                            <input type="text" disabled name="name" class="form-control" value="<?php echo $_SESSION['user_fullname']; ?>" id="review-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="review-movie" class="form-label">Movie</label>
                            <select name="movie" class="form-control px-3 py-2" required>
                                <option selected>Select Movie</option>
                                <?php
                                $ret = mysqli_query($con, "select * from all_movie_info");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <option value="<?php echo htmlentities($row['id']); ?>"><?php
                                                                                            echo htmlentities($row["name"]);
                                                                                            ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="review-title" class="form-label">Reviewer Title</label>
                            <input type="text" name="title" class="form-control" minlength="40" required id="exampleFormControlInput1" placeholder="Enter a title for review">
                        </div>
                        <div class="mb-3">
                            <label for="review-message" class="form-label">Review</label>
                            <textarea name="review" class="form-control" minlength="300" required id="exampleFormControlTextarea1" rows="10"></textarea>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" name="submit" class="px-3 py-2 bg-success text-light border border-success rounded">Submit</button>
                        </div>


                    </form>
                </div>
            </section>
        <?php
        }
        ?>
        <!-- honest review section end  -->
    </main>
    <!-- main end  -->

    <!-- footer start  -->
    <?php include("includes/footer.php") ?>
    <!-- footer end  -->

    <!-- pwa update message start  -->
    <section>
        <div id="snackbar">
            <p><a id="reload">A new version of this app is available. Click here to update.</a></p>
        </div>
    </section>
    <!-- pwa update message end  -->

    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- jQuery library is required. -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- external js link  -->
    <script type="text/javascript" src="externals/js/script.js"></script>
    <!-- internal script link -->
    <script>
        localStorage.setItem("mtbs", "movie ticket booking system");
    </script>
    <script>
        // pwa installation updation 
        // https://codyanhorn.tech/blog/pwa-reload-page-on-application-update
        // every update requires the changes in cache name in sw.js file 
        (function() {
            // Track an updated flag and an activated flag.
            // When both of these are flagged true the service worker was updated and activated.
            let updated = false;
            let activated = false;
            navigator.serviceWorker.register('/MTBS/sw.js').then(regitration => {
                regitration.addEventListener("updatefound", () => {
                    const worker = regitration.installing;
                    worker.addEventListener('statechange', () => {
                        if (worker.state === "activated") {
                            // Here is when the activated state was triggered from the lifecycle of the service worker.
                            // This will trigger on the first install and any updates.
                            activated = true;
                            checkUpdate();
                        }
                    });
                });
            });

            navigator.serviceWorker.addEventListener('controllerchange', () => {
                // This will be triggered when the service worker is replaced with a new one.
                // It does not just reload the page right away, so to make sure it is fully activated using the checkUpdate function.
                updated = true;
                checkUpdate();
            });

            function checkUpdate() {
                let snackbar = document.getElementById('snackbar');
                if (activated && updated) {
                    snackbar.classList.add('show');
                    document.getElementById('reload').addEventListener('click', function() {
                        window.location.reload();
                    });
                }
            }
        })();
    </script>

    <script>
        if ("Notification" in window) {
            if (Notification.permission === "granted") {
                notify();
            } else {
                Notification.requestPermission().then(res => {
                    if (res === "granted") {
                        console.error("Notofication Allowed");
                    } else {
                        console.error("Did not receive permission for notifications");
                    }
                })
            }
        } else {
            console.error("Browser does not support notifications");
        }
    </script>
</body>

</html>