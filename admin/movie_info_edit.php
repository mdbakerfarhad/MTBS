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
    <!-- website title  -->
    <title>MTBS | Movie</title>

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
            <div class="d-flex flex-column align-items-center justify-content-center py-5">
                <div class="bg-light p-3 border border-warning shadow-lg p-3 mb-5 bg-body-warning rounded">
                    <h2 class="text-muted text-center pt-2">Update Movie Info details</h2>
                    <?php
                    $ret = mysqli_query($con, "select * from all_movie_info where id='$id'");
                    $row = mysqli_fetch_array($ret);
                    if ($row) {
                    ?>
                        <form class="p-3 movie-edit" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">ID</h5>
                                    <input type="text" name="id" readonly class="form-control px-3 py-2" value="<?php
                                                                                                                echo htmlentities($row["id"]);
                                                                                                                ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Movie Name</h5>
                                    <input type="text" name="name" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["name"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Item No (should be unique)</h5>
                                    <input type="number" name="item" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["item"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Genre</h5>
                                    <select name="genre" class="form-control px-3 py-2">
                                        <?php
                                        $ret = mysqli_query($con, "select * from movie_genre_info");
                                        while ($rows = mysqli_fetch_array($ret)) {
                                        ?>
                                            <option <?php if ($rows["id"] == $row["genre"]) {
                                                        echo "selected";
                                                    } ?> value="<?php echo htmlentities($rows['id']); ?>"><?php
                                                                                                            echo htmlentities($rows["genre"]);
                                                                                                            ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>


                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Rating</h5>
                                    <input type="text" name="rating" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["rating"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Runtime</h5>
                                    <input type="text" name="runtime" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["runtime"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Description</h5>
                                    <textarea name="about" cols="30" rows="10" class="form-control px-3 py-2"><?php
                                                                                                                echo htmlentities($row["about"]);
                                                                                                                ?></textarea>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Cast</h5>
                                    <textarea name="cast" cols="30" rows="10" class="form-control px-3 py-2"><?php
                                                                                                                echo htmlentities($row["cast"]);
                                                                                                                ?></textarea>
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Release date</h5>
                                    <input type="text" name="release" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["release"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Trailer Link</h5>
                                    <input type="text" name="trailer" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["trailer"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Visibility</h5>
                                    <select name="visibility" class="form-control px-3 py-2">
                                        <option value="" <?php if ($row["visibility"] == "") {
                                                                echo "selected";
                                                            } ?>></option>
                                        <option value="nowshowing" <?php if ($row["visibility"] == "nowshowing") {
                                                                        echo "selected";
                                                                    } ?>>nowshowing</option>
                                        <option value="upcomingshow" <?php if ($row["visibility"] == "upcomingshow") {
                                                                            echo "selected";
                                                                        } ?>>upcomingshow</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Photo</h5>
                                    <h6 class="text-muted">Old Image</h6>
                                    <img width="200" height="200" class="error-img" loading="lazy" src="../images/shows/<?php
                                                                                                                        echo htmlentities($row["id"]);
                                                                                                                        ?>/<?php
                                                                                                                            echo htmlentities($row["movie_image"]);
                                                                                                                            ?>" alt="<?php
                                                                                                                                        echo htmlentities($row["name"]);
                                                                                                                                        ?>">
                                    <input type="hidden" name="oldimg" value="<?php
                                                                                echo htmlentities($row["movie_image"]);
                                                                                ?>">
                                    <h6 class="text-muted">Update Image?</h6>
                                    <input type="file" name="newimg" class="form-control px-3 py-2">
                                </div>
                            </div>



                            <button class="btn btn-width btn-outline-warning bg-warning text-dark" name="submit" type="submit">Update</button>
                        </form>
                    <?php
                    } else {
                        echo "
                        <script>
                        window.location.href='404';
                        </script>
                        ";
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

    <?php
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $item = mysqli_real_escape_string($con, $_POST['item']);
        $genre = mysqli_real_escape_string($con, $_POST['genre']);
        $rating = mysqli_real_escape_string($con, $_POST['rating']);
        $runtime = mysqli_real_escape_string($con, $_POST['runtime']);
        $about = mysqli_real_escape_string($con, $_POST['about']);
        $cast = mysqli_real_escape_string($con, $_POST['cast']);
        $release = mysqli_real_escape_string($con, $_POST['release']);
        $visibility = mysqli_real_escape_string($con, $_POST['visibility']);

        $user_exist_query = "SELECT * from `all_movie_info` WHERE `id`='$id'";
        $result = mysqli_query($con, $user_exist_query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                if ($_FILES["newimg"]["name"] != "") {
                    $file = $_FILES['newimg'];
                    $fileName = $_FILES['newimg']['name'];
                    $fileTmpName = $_FILES['newimg']['tmp_name'];
                    $fileSize = $_FILES['newimg']['size'];
                    $fileError = $_FILES['newimg']['error'];
                    $fileExtension = explode('.', $fileName);
                    $fileActualExtension = strtolower(end($fileExtension));
                    $allowed = array('jpg', 'jpeg', 'png');

                    if (in_array($fileActualExtension, $allowed)) {
                        if ($fileError == 0) {
                            // 50000=50kb
                            if ($fileSize < 10000000) {
                                $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
                                $fileDestination = "../images/shows/$id/" . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);

                                $query = "UPDATE `all_movie_info` SET `name`='$name',`item`='$item',`genre`='$genre',`rating`='$rating',`runtime`='$runtime', `about`='$about',`cast`='$cast', `release`='$release', `trailer`='$_POST[trailer]', `visibility`='$visibility', `movie_image`='$fileNameNew' WHERE `id`='$id'";
                                if (mysqli_query($con, $query)) {
                                    echo "
                                    <script>
                                    alert('Movie info updated');
                                    window.location.href='movie_info';
                                    </script>
                                    ";
                                } else {
                                    echo "
                                    <script>
                                    alert('Server Down');
                                    window.location.href='movie_info';
                                    </script>
                                    ";
                                }
                            } else {
                                echo "
                                <script>
                                alert('Your file is too big');
                                </script>
                                ";
                            }
                        } else {
                            echo "
                            <script>
                            alert('There was an error uploading your file');
                            </script>
                            ";
                        }
                    } else {
                        echo "
                        <script>
                        alert('You cant upload a file here');
                        </script>
                        ";
                    }
                } else {
                    $productimage = $_POST['oldimg'];

                    $query = "UPDATE `all_movie_info` SET `name`='$name',`item`='$item',`genre`='$genre',`rating`='$rating',`runtime`='$runtime', `about`='$about',`cast`='$cast', `release`='$release', `trailer`='$_POST[trailer]', `visibility`='$visibility', `movie_image`='$productimage' WHERE `id`='$id'";
                    if (mysqli_query($con, $query)) {
                        echo "
                        <script>
                        alert('Movie info updated');
                        window.location.href='movie_info';
                        </script>
                        ";
                    } else {
                        echo "
                        <script>
                        alert('Server Down');
                        window.location.href='movie_info';
                        </script>
                        ";
                    }
                }
            }
        } else {
            echo "
            <script>
            alert('Can not run query');
            window.location.href='movie_info';
            </script>
            ";
        }
    }

    ?>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="externals/js/script.js"></script>
</body>

</html>