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
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


</head>

<body>
    <?php
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
    ?>
        <!-- header start  -->
        <?php include("includes/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main class="mx-4 mb-3 pt-2 overflow-scroll movie-page">
            <table id="example" class="table table-striped movie-table">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Movie Name</th>
                        <th scope="col">Item No</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Runtime</th>
                        <th scope="col">Release</th>
                        <th scope="col">Visibility</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $serial = 0;
                    $ret = mysqli_query($con, "select * from all_movie_info");
                    while ($row = mysqli_fetch_array($ret)) {
                        $serial = $serial + 1;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $serial ?> </th>
                            <td><img style="width
                            50px; height:50px" src="../images/shows//<?php echo htmlentities($row["id"]); ?>/<?php echo htmlentities($row["movie_image"]); ?>" alt="<?php echo htmlentities($row["name"]); ?>"></td>
                            <td style="display: none;"><?php
                                                        echo htmlentities($row["id"]);
                                                        ?> </td>
                            <td><?php
                                echo htmlentities($row["name"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["item"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["rating"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["runtime"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["release"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["visibility"]);
                                ?> </td>
                            <td><a href="movie_info_edit?id=<?php
                                                                echo htmlentities($row['id']);
                                                                ?>" class="pe-1">Edit</a><a href="movie_info_delete?id=<?php
                                                                                                                                echo htmlentities($row['id']);
                                                                                                                                ?>" onclick="return checkdelete()" class="ps-1">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Movie Name</th>
                        <th scope="col">Item No</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Runtime</th>
                        <th scope="col">Release</th>
                        <th scope="col">Visibility</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
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
    <script>
        new DataTable('#example');
    </script>
    <script>
        function checkdelete() {
            return confirm('Are you sure want to delete?')
        }
    </script>
</body>

</html>