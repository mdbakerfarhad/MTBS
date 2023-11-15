<?php
require_once 'config.php';
include 'dbConnect.php';
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
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <!-- website title  -->
    <title>MTBS | Ticket Order History</title>

</head>

<body>
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
        <!-- header start  -->
        <?php include("includes/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main class="mx-4 my-3 overflow-scroll orderhistory-page">
            <div class="d-flex justify-content-end">
                <button class="btn btn-link text-decoration-none "><a class="text-decoration-none bg-warning text-dark px-3 py-1 border border-warning rounded" href="index#now-showing">Purchase Tickets</a></button>
            </div>
            <table id="example" class="table table-striped order-table">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Movie Ticket Order Decription</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Purchase Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ret = mysqli_query($con, "SELECT DISTINCT `txn_id`,`id`,`email`,`name`,`paid_amount`,`modified`,`payment_status`,`deliverystatus`, GROUP_CONCAT(`orderdescription` SEPARATOR ' ') as `orderlist` FROM `orders` WHERE `email`='$_SESSION[user_email]' GROUP BY `txn_id`");
                    $serial = 0;
                    while ($row = mysqli_fetch_array($ret)) {
                        $serial = $serial + 1;
                    ?>
                        <tr>
                            <td><?php echo $serial; ?></td>
                            <td>
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>ItemNo</th>
                                    </tr>
                                    <?php
                                    echo $row['orderlist'];
                                    ?>
                                </table>
                            </td>
                            <td>BDT <?php echo htmlentities($row['paid_amount']); ?></td>
                            <td><?php echo $row["txn_id"]; ?></td>
                            <td><?php echo $row["deliverystatus"]; ?> </td>
                            <td><?php echo $row["modified"]; ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Movie Ticket Order Decription</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Purchase Date</th>
                    </tr>
                </tfoot>
            </table>
            <?php
            ?>
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

    <!-- jQuery library link -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jquery js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- external js link  -->
    <script src="externals/js/script.js"></script>
    <!-- datatables net  -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
        // new DataTable('#example');

        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf'
                ]
            });
        });
    </script>

</body>

</html>