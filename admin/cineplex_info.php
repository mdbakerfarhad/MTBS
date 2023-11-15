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
    <!-- external css link  -->
    <link rel="stylesheet" href="externals/css/style.css">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="../images/logo/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>MTBS | Cineplex Info</title>
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
        <main class="mx-4 my-3 overflow-scroll cineplex-page">
            <table id="example" class="table table-striped cineplex-table">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Cineplex Name</th>
                        <th scope="col">About</th>
                        <th scope="col">Location</th>
                        <th scope="col">URL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $serial = 0;
                    $ret = mysqli_query($con, "select * from cineplex_info");
                    while ($row = mysqli_fetch_array($ret)) {
                        $serial = $serial + 1;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $serial ?> </th>
                            <td><img style="width
                            50px; height:50px" src="../images/cineplex/<?php echo htmlentities($row["id"]); ?>/<?php echo htmlentities($row["cineplex_image"]); ?>" alt="<?php echo htmlentities($row["name"]); ?>"></td>
                            <td style="display: none;"><?php
                                                        echo htmlentities($row["id"]);
                                                        ?> </td>
                            <td><?php
                                echo htmlentities($row["name"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities(substr($row["about"], 0, 40)) . "........";;
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["location"]);
                                ?> </td>
                            <td><a href="<?php
                                            echo htmlentities($row["url"]);
                                            ?>" target="_blank">Geo Location</a>
                            </td>
                            <td><a href="cineplex_info_delete?id=<?php
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
                        <th scope="col">Cineplex Name</th>
                        <th scope="col">About</th>
                        <th scope="col">Location</th>
                        <th scope="col">URL</th>
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

    <!-- external js link  -->
    <script type="text/javascript" src="externals/js/script.js"></script>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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