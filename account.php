<?php
require_once 'config.php';
include 'dbConnect.php';
session_start();
if (isset($_GET["email"]) & isset($_GET["id"])) {
    $email = $_GET["email"];
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
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>MTBS | Account</title>

</head>

<body>
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>

        <!-- header start  -->
        <?php include("includes/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main class="account-page  bg-light">
            <div class="d-flex flex-column align-items-center justify-content-center py-5">
                <div class="bg-light px-2">
                    <?php
                    $ret = mysqli_query($con, "select * from user_info where email='$email' and id='$id'");
                    $row = mysqli_fetch_array($ret);
                    if ($row) {
                    ?>
                        <h2 class="text-muted text-center pt-2">Update MTBS Account Info Details</h2>
                        <form action="account?email=<?php
                                                    echo $_SESSION['user_email'];
                                                    ?>&id=<?php echo $_SESSION['user_id']; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="row gap-2 d-flex justify-content-center">

                                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <?php
                                            if ($row['image'] == '') {
                                            ?>
                                                <img src="images/default/user.jpg" width="150" height="150" class="border rounded-circle" alt="No Image" loading="lazy">
                                                <h5 class="text-muted">Upload Profile Picture</h5>
                                                <input type="file" name="upload" class="mt-2 border border-primary px-3 py-2">
                                            <?php
                                            } else {
                                            ?>
                                                <img src="images/users/<?php echo htmlentities($row["id"]); ?>/<?php echo htmlentities($row["image"]); ?>" width="150" height="150" class="border rounded-circle" alt="<?php echo htmlentities($row["fullname"]); ?>" loading="lazy">
                                                <h5 class="text-muted">Update Profile Picture?</h5>
                                                <input type="file" name="update" class="mt-2 border border-primary px-3 py-2">
                                            <?php
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Email</h5>
                                            <input type="text" readonly name="fullname" required value="<?php echo htmlentities($row["email"]); ?>" class="border border-primary form-control px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Full Name</h5>
                                            <input type="text" name="fullname" value="<?php
                                                                                        echo htmlentities($row["fullname"]);
                                                                                        ?>" placeholder="Enter your full name" class="border border-primary form-control px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Gender</h5>
                                            <select name="gender" class="border border-primary form-control px-3 py-2">
                                                <option value="" <?php if ($row["gender"] == '') {
                                                                        echo "selected";
                                                                    } ?>>Select</option>
                                                <option value="male" <?php if ($row["gender"] == 'male') {
                                                                            echo "selected";
                                                                        } ?>>Male</option>
                                                <option value="female" <?php if ($row["gender"] == 'female') {
                                                                            echo "selected";
                                                                        } ?>>Female</option>
                                                <option value="other" <?php if ($row["gender"] == 'other') {
                                                                            echo "selected";
                                                                        } ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Date of Birth</h5>
                                            <input type="date" name="dob" placeholder="Enter your date of birth" value="<?php
                                                                                                                        echo htmlentities($row["dob"]);
                                                                                                                        ?>" class="border border-primary form-control px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Phone Number</h5>
                                            <input type="number" name="phone" value="<?php
                                                                                        echo htmlentities($row["phone"]);
                                                                                        ?>" placeholder="Enter your phone no" class="border border-primary form-control px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Blood Group</h5>
                                            <select name="blood" class="border border-primary form-control px-3 py-2">
                                                <option value="" <?php if ($row["blood"] == '') {
                                                                        echo "selected";
                                                                    } ?>>Select</option>
                                                <option value="A+" <?php if ($row["blood"] == 'A+') {
                                                                        echo "selected";
                                                                    } ?>>A+</option>
                                                <option value="A-" <?php if ($row["blood"] == 'A-') {
                                                                        echo "selected";
                                                                    } ?>>A-</option>
                                                <option value="B+" <?php if ($row["blood"] == 'B+') {
                                                                        echo "selected";
                                                                    } ?>>B+</option>
                                                <option value="B-" <?php if ($row["blood"] == 'B-') {
                                                                        echo "selected";
                                                                    } ?>>B-</option>
                                                <option value="O+" <?php if ($row["blood"] == 'O+') {
                                                                        echo "selected";
                                                                    } ?>>O+</option>
                                                <option value="O-" <?php if ($row["blood"] == 'O-') {
                                                                        echo "selected";
                                                                    } ?>>O-</option>
                                                <option value="AB+" <?php if ($row["blood"] == 'AB+') {
                                                                        echo "selected";
                                                                    } ?>>AB+</option>
                                                <option value="AB-" <?php if ($row["blood"] == 'AB-') {
                                                                        echo "selected";
                                                                    } ?>>AB-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Religion</h5>
                                            <input type="text" name="religion" value="<?php
                                                                                        echo htmlentities($row["religion"]);
                                                                                        ?>" placeholder="Enter your religion" class="border border-primary form-control px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Occupation</h5>
                                            <input type="text" name="occupation" value="<?php
                                                                                        echo htmlentities($row["occupation"]);
                                                                                        ?>" placeholder="Enter your occupation" class="border border-primary form-control px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Nationality</h5>
                                            <input type="text" name="nationality" value="<?php
                                                                                            echo htmlentities($row["nationality"]);
                                                                                            ?>" placeholder="Enter your nationality" class="border border-primary form-control px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Marital Status</h5>
                                            <select name="maritalstatus" class="border border-primary form-control px-3 py-2">
                                                <option value="" <?php if ($row["maritalstatus"] == '') {
                                                                        echo "selected";
                                                                    } ?>>Select</option>
                                                <option value="married" <?php if ($row["maritalstatus"] == 'married') {
                                                                            echo "selected";
                                                                        } ?>>Married</option>
                                                <option value="notmarried" <?php if ($row["maritalstatus"] == 'notmarried') {
                                                                                echo "selected";
                                                                            } ?>>Not Married</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <h5 class="text-muted">Address</h5>
                                            <input type="text" name="address" value="<?php
                                                                                        echo htmlentities($row["address"]);
                                                                                        ?>" placeholder="Enter your address" class="border border-primary form-control px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group py-2">
                                        <div class="input-field">
                                            <button class="btn btn-width btn-outline-warning text-dark" name="submit" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    <?php
                    } else {
                    ?>
                        <h2 class="text-muted text-center py-3 pt-2 my-3">Looks like you are trying to access other profiles by misleading urls <br> Please return to your account asap </h2>
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
        window.location.href='login';
        </script>
        ";
    }
    ?>

    <?php
    if (isset($_POST['submit'])) {
        $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $blood = mysqli_real_escape_string($con, $_POST['blood']);
        $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
        $maritalstatus = mysqli_real_escape_string($con, $_POST['maritalstatus']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $occupation = mysqli_real_escape_string($con, $_POST['occupation']);
        $religion = mysqli_real_escape_string($con, $_POST['religion']);

        $user_exist_query = "SELECT * from `user_info` WHERE `email`='$email' and `id`='$id'";
        $result = mysqli_query($con, $user_exist_query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {

                if ($_FILES["upload"]["name"] != "") {
                    $file = $_FILES['upload'];
                    $fileName = $_FILES['upload']['name'];
                    $fileTmpName = $_FILES['upload']['tmp_name'];
                    $fileSize = $_FILES['upload']['size'];
                    $fileError = $_FILES['upload']['error'];
                    $fileExtension = explode('.', $fileName);
                    $fileActualExtension = strtolower(end($fileExtension));
                    $allowed = array('jpg', 'jpeg', 'png');

                    if (in_array($fileActualExtension, $allowed)) {
                        if ($fileError == 0) {
                            // 50000=50kb
                            if ($fileSize < 10000000) {
                                $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
                                $fileDestination = "images/users/$id/" . $fileNameNew;
                                $dir = "images/users/$id";
                                if (!is_dir($dir)) {
                                    mkdir("images/users/" . $id);
                                }
                                move_uploaded_file($fileTmpName, $fileDestination);
                                $query = "UPDATE `user_info` SET `fullname`='$fullname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`blood`='$blood',`nationality`='$nationality',`maritalstatus`='$maritalstatus',`address`='$address',`occupation`='$occupation',`religion`='$religion',`image`='$fileNameNew' WHERE `email`='$email' and `id`='$id'";
                                if (mysqli_query($con, $query)) {
                                    echo "
                                    <script>
                                    window.location.href='logout';
                                    alert('Account info updated - Please log in');
                                    </script>
                                    ";
                                } else {
                                    echo "
                                    <script>
                                    window.location.href='account?email=$_SESSION[user_email]&id=$_SESSION[user_id]';
                                    alert('Server Down');
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
                } elseif ($_FILES["update"]["name"] != "") {
                    $file = $_FILES['update'];
                    $fileName = $_FILES['update']['name'];
                    $fileTmpName = $_FILES['update']['tmp_name'];
                    $fileSize = $_FILES['update']['size'];
                    $fileError = $_FILES['update']['error'];
                    $fileExtension = explode('.', $fileName);
                    $fileActualExtension = strtolower(end($fileExtension));
                    $allowed = array('jpg', 'jpeg', 'png');

                    if (in_array($fileActualExtension, $allowed)) {
                        if ($fileError == 0) {
                            // 50000=50kb
                            if ($fileSize < 10000000) {
                                $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
                                $fileDestination = "images/users/$id/" . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                $query = "UPDATE `user_info` SET `fullname`='$fullname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`blood`='$blood',`nationality`='$nationality',`maritalstatus`='$maritalstatus',`address`='$address',`occupation`='$occupation',`religion`='$religion',`image`='$fileNameNew' WHERE `email`='$email' and `id`='$id'";
                                if (mysqli_query($con, $query)) {
                                    echo "
                                    <script>
                                    window.location.href='logout';
                                    alert('Account info updated - Please log in');
                                    </script>
                                    ";
                                } else {
                                    echo "
                                    <script>
                                    window.location.href='account?email=$_SESSION[user_email]&id=$_SESSION[user_id]';
                                    alert('Server Down');
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
                    $query = "UPDATE `user_info` SET `fullname`='$fullname',`phone`='$phone',`gender`='$gender',`dob`='$dob',`blood`='$blood',`nationality`='$nationality',`maritalstatus`='$maritalstatus',`address`='$address',`occupation`='$occupation',`religion`='$religion' WHERE `email`='$email' and `id`='$id'";
                    if (mysqli_query($con, $query)) {
                        echo "
                        <script>
                        window.location.href='logout';
                        alert('Account info updated - Please log in');
                        </script>
                        ";
                    } else {
                        echo "
                        <script>
                        window.location.href='account?email=$_SESSION[user_email]&id=$_SESSION[user_id]';
                        alert('Server Down');
                        </script>
                        ";
                    }
                }
            }
        } else {
            echo "
            <script>
            window.location.href='account?email=$_SESSION[user_email]&id=$_SESSION[user_id]';
            alert('Can not run query');
            </script>
            ";
        }
    }
    ?>

    <!-- jQuery library link -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="externals/js/script.js"></script>

</body>

</html>