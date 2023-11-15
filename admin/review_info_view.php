<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
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
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="../images/logo/favicon.ico" type="image/x-icon">
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- website title  -->
    <title>MTBS | Review Info</title>

</head>

<body>
    <?php
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
    ?>
        <!-- header start  -->
        <?php include("includes/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main class="bg-light">
            <div class="d-flex flex-column p-5">
                <div class="bg-light p-3 border border-warning shadow-lg p-3 mb-5 bg-body-warning rounded">
                    <h2 class="text-muted text-center pt-2 pb-4">Review MTBS Movie Info details</h2>
                    <?php
                    $ret = mysqli_query($con, "select * from reviews where id='$id'");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                        <div class="py-2" style="display:none;">
                            <div>
                                <h2 class="text-muted">ID</h2>
                                <p><?php
                                    echo htmlentities($row["id"]);
                                    ?></p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div>
                                <h2 class="text-muted">Reviewer Name</h2>
                                <p><?php
                                    echo htmlentities($row["name"]);
                                    ?></p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div>
                                <h2 class="text-muted">Movie Name</h2>
                                <p><?php
                                    $queryy = "select * from all_movie_info";
                                    $rett = mysqli_query($con, $queryy);
                                    $roww = mysqli_fetch_array($rett);
                                    while ($roww = mysqli_fetch_array($rett)) {
                                        if ($row['movie'] === $roww['id']) {
                                            echo htmlentities($roww["name"]);
                                        }
                                    }

                                    ?></p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div>
                                <h2 class="text-muted">Review Title</h2>
                                <p><?php
                                    echo htmlentities($row["title"]);
                                    ?></p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div>
                                <h2 class="text-muted">Review Message</h2>
                                <p><?php
                                    echo htmlentities($row["review"]);
                                    ?></p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div>
                                <h2 class="text-muted">Submitted Time</h2>
                                <p><?php
                                    echo htmlentities($row["time"]);
                                    ?></p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div>
                                <h2 class="text-muted">Visibility</h2>
                                <p><?php
                                    if ($row["verified"] == "1") {
                                        echo "displayed";
                                    } else {
                                        echo "hidden";
                                    }
                                    ?></p>
                            </div>
                        </div>
                        <div class="py-2">
                            <div>
                                <?php
                                if ($row["verified"] == "1") {
                                    echo "<a href='review_hide?id=$row[id]' class='px-3 py-2 bg-success text-light text-decoration-none border border-success rounded'>Hide This Review?</a>";
                                } else {
                                    echo "<a href='review_display?id=$row[id]' class='px-3 py-2 bg-success text-light text-decoration-none border border-success rounded'>Display This Review?</a>";
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
        <!-- main end  -->

        <!-- footer start  -->
        <?php include("includes/footer.php") ?>
        <!-- footer end  -->
    <?php
    } else {
        echo "
        <script>
        alert('You need to log in first');
        window.location.href='index';
        </script>
        ";
    }
    ?>

    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script type="text/javascript" src="externals/js/script.js"></script>
    <!-- jquery js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- datatables net  -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>

</html>