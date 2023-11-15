<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
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
                    <h2 class="text-muted text-center pt-2">Add Movie Info details</h2>
                    <form class="p-3 movie-add" action="movie_info_add" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Movie Name</h5>
                                <input type="text" name="name" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Item No (should be unique)</h5>
                                <input type="number" name="item" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Genre</h5>
                                <select name="genre" class="form-control px-3 py-2" required>
                                    <option selected>Select Genre</option>
                                    <?php
                                    $ret = mysqli_query($con, "select * from movie_genre_info");
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <option value="<?php echo htmlentities($row['id']); ?>"><?php
                                                                                                echo htmlentities($row["genre"]);
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
                                <input type="text" name="rating" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Runtime</h5>
                                <input type="text" name="runtime" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">About</h5>
                                <textarea name="about" cols="30" rows="10" class="form-control px-3 py-2" required></textarea>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Cast</h5>
                                <textarea name="cast" cols="30" rows="10" class="form-control px-3 py-2" required></textarea>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Release Date</h5>
                                <input type="text" name="release" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Trailer Link</h5>
                                <input type="text" name="trailer" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Visibility</h5>
                                <select name="visibility" class="form-control px-3 py-2" required>
                                    <option>nowshowing</option>
                                    <option>upcomingshow</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <h5 class="text-muted">Photo</h5>
                                <input type="file" name="photo" class="form-control px-3 py-2" required>
                            </div>
                        </div>
                        <button class="btn btn-width btn-outline-warning bg-warning text-dark mt-2" name="submit" type="submit">Add</button>
                    </form>
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

        $file = $_FILES['photo'];
        $fileName = $_FILES['photo']['name'];
        $fileTmpName = $_FILES['photo']['tmp_name'];
        $fileSize = $_FILES['photo']['size'];
        $fileError = $_FILES['photo']['error'];
        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));
        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExtension, $allowed)) {
            if ($fileError == 0) {
                // 50000=50kb
                if ($fileSize < 10000000) {
                    $maxid = mysqli_query($con, "SELECT max(`id`) as pid FROM `all_movie_info`");
                    $maxidresult = mysqli_fetch_assoc($maxid);
                    $id = $maxidresult['pid'] + 1;
                    $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
                    $fileDestination = "../images/shows/$id/" . $fileNameNew;
                    $dir = "../images/shows/$id";
                    if (!is_dir($dir)) {
                        mkdir("../images/shows/" . $id);
                    }
                    move_uploaded_file($fileTmpName, $fileDestination);

                    $query = "INSERT INTO `all_movie_info`(`name`,`item`,`genre`,`rating`,`runtime`,`trailer`,`release`,`about`, `cast`,`visibility`,`movie_image`) VALUES ('$name','$item','$genre','$rating','$runtime','$_POST[trailer]','$release','$about','$cast','$visibility','$fileNameNew')";
                    if (mysqli_query($con, $query)) {
                        echo "
                        <script>
                        alert('Movie added');
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
    }

    ?>


    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script type="text/javascript" src="externals/js/script.js"></script>
</body>

</html>