<?php
require_once 'config.php';
include 'dbConnect.php';
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
    <!-- external css link  -->
    <link rel="stylesheet" href="externals/css/style.css">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>MTBS | Movie Review</title>
</head>

<body class="overflow-x-hidden">
    <!-- header start  -->
    <?php include("includes/header.php") ?>
    <!-- header end  -->
    <!-- main start  -->
    <main>

        <?php
        $ret = mysqli_query($con, "select * from reviews where id='$id'");
        $rowitems = mysqli_fetch_assoc($ret);
        if($rowitems){
        ?>
        <?php
        $queryy = "select * from all_movie_info";
        $rett = mysqli_query($con, $queryy);
        while ($roww = mysqli_fetch_assoc($rett)) {
            if ($rowitems['movie'] === $roww['id']) {
        ?>
                <h1 class="text-center"><a href="movie_details?id=<?php echo htmlentities($roww["id"]); ?>" class="text-decoration-none"><span class="text-primary"><?php echo htmlentities($roww["name"]); ?></span></a> Review</h1>

                <div class="row gap-2 px-2 my-4 d-flex align-items-center justify-content-center">
                    <div  class="col-12 col-md-5">
                        <?php
                        $queryy = "select * from all_movie_info";
                        $rett = mysqli_query($con, $queryy);
                        while ($roww = mysqli_fetch_array($rett)) {
                            if ($rowitems['movie'] === $roww['id']) {
                        ?>
                                <div>
                                    <img width="100%" height="450" class="error-img" src="images/shows/<?php echo htmlentities($roww['id']); ?>/<?php echo htmlentities($roww['movie_image']); ?>" alt="<?php echo htmlentities($roww['name']); ?>">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="mb-5">
                            <h2 class="mb-3"><?php echo htmlentities($rowitems['title']); ?></h2>
                            <p class="mt-4"><?php echo htmlentities($rowitems['review']); ?></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa-solid fa-user text-success border rounded-circle bg-white p-1"></i><span class="ms-2"><?php echo htmlentities($rowitems['name']); ?></span>
                            </div>
                            <div>
                                <p><?php echo htmlentities($rowitems['time']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        <?php
            }
        }
    }else{
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