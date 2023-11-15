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
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- website title  -->
    <title>MTBS | User Info</title>

</head>

<body>
    <?php
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
    ?>
        <!-- header start  -->
        <?php include("includes/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main class="mx-4 my-3 overflow-scroll user-page">
            <table id="example" class="table table-striped user-table">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Religion</th>
                        <th scope="col">Occupation</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">Marital STatus</th>
                        <th scope="col">Address</th>
                        <th scope="col">Verified</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $serial = 0;
                    $ret = mysqli_query($con, "select * from user_info");
                    while ($row = mysqli_fetch_array($ret)) {
                        $serial = $serial + 1;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $serial ?> </th>
                            <td style="display: none;"><?php
                                                        echo htmlentities($row["id"]);
                                                        ?> </td>
                            <td><?php
                                echo htmlentities($row["fullname"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["email"]);
                                ?> </td>

                            <td><?php
                                echo $row['phone'];
                                ?></td>
                            <td><?php
                                echo $row['gender'];
                                ?></td>
                            <td><?php
                                echo $row['blood'];
                                ?></td>
                            <td><?php
                                echo $row['dob'];
                                ?></td>
                            <td><?php
                                echo $row['religion'];
                                ?></td>
                            <td><?php
                                echo $row['occupation'];
                                ?></td>
                            <td><?php
                                echo $row['nationality'];
                                ?></td>
                            <td><?php
                                echo $row['maritalstatus'];
                                ?></td>
                            <td><?php
                                echo $row['address'];
                                ?></td>
                            <td><?php
                                if ($row["verified"] == 1) {
                                    echo "Yes";
                                } else {
                                    echo "No";
                                } ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Religion</th>
                        <th scope="col">Occupation</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">Marital STatus</th>
                        <th scope="col">Address</th>
                        <th scope="col">Verified</th>
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