<?php
require_once 'config.php';
include 'dbConnect.php';
session_start();

if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST["item"] == $key) {
                unset($_SESSION["shopping_cart"][$key]);
                echo "
                <script>
                alert('Ticket is removed from your cart!');
                </script>
                ";
            }
            if (empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['item'] === $_POST["item"]) {
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }
}

if (isset($_POST['actionn']) && $_POST['actionn'] == "changee") {
    foreach ($_SESSION["shopping_cart"] as &$valuee) {
        if ($valuee['item'] === $_POST["itemm"]) {
            $valuee['price'] = $_POST["price"];
            break; // Stop the loop after we've found the product
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
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- external css link  -->
    <link rel="stylesheet" href="externals/css/style.css">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/logo/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>MTBS | Cart</title>

</head>

<body>
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
        <!-- header start  -->
        <?php include("includes/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main class="mx-2 mb-3 overflow-scroll cart-page">
            <div class="d-flex justify-content-between cart-buttons">
                <button class="btn btn-link text-decoration-none "><a class="text-decoration-none bg-warning text-dark px-3 py-1 border border-warning rounded" href="orderhistory">Ticket Order History</a></button>
                <button class="btn btn-link text-decoration-none "><a class="text-decoration-none bg-warning text-dark px-3 py-1 border border-warning rounded" href="index">Continue booking</a></button>
            </div>
            <?php
            if (isset($_SESSION["shopping_cart"])) {
                $total_price = 0;
            ?>
                <table class="table table-striped cart-table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Movie Image</th>
                            <th scope="col">Movie Name</th>
                            <th scope="col">Movie Rating</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Items Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION["shopping_cart"] as $product) {
                        ?>
                            <tr>
                                <td><img src='images/shows/<?php
                                                            echo ($product['id']);
                                                            ?>/<?php echo $product["image"]; ?>' width="70" height="50" alt="<?php echo $product["name"]; ?>" /></td>
                                <td><?php echo $product["name"]; ?></td>
                                <td><?php echo $product["rating"]; ?></td>
                                <td>
                                    <form method='post' action='cart'>
                                        <input type='hidden' name='item' value="<?php echo $product["item"]; ?>" />
                                        <input type='hidden' name='action' value="change" />
                                        <select name='quantity' class='quantity' onchange="this.form.submit()">
                                            <option <?php if ($product["quantity"] == 1) echo "selected"; ?> value="1">1</option>
                                            <option <?php if ($product["quantity"] == 2) echo "selected"; ?> value="2">2</option>
                                            <option <?php if ($product["quantity"] == 3) echo "selected"; ?> value="3">3</option>
                                            <option <?php if ($product["quantity"] == 4) echo "selected"; ?> value="4">4</option>
                                            <option <?php if ($product["quantity"] == 5) echo "selected"; ?> value="5">5</option>
                                            <option <?php if ($product["quantity"] == 6) echo "selected"; ?> value="6">6</option>
                                            <option <?php if ($product["quantity"] == 7) echo "selected"; ?> value="7">7</option>
                                            <option <?php if ($product["quantity"] == 8) echo "selected"; ?> value="8">8</option>
                                            <option <?php if ($product["quantity"] == 9) echo "selected"; ?> value="9">9</option>
                                            <option <?php if ($product["quantity"] == 10) echo "selected"; ?> value="10">10</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form method='post' action='cart'>
                                        <input type='hidden' name='itemm' value="<?php echo $product["item"]; ?>" />
                                        <input type='hidden' name='actionn' value="changee" />
                                        <select name='price' class='price' onchange="this.form.submit()">
                                            <option <?php if ($product["price"] == 100) echo "selected"; ?> value="100">Tk 100</option>
                                            <option <?php if ($product["price"] == 300) echo "selected"; ?> value="300">Tk 300</option>
                                            <option <?php if ($product["price"] == 500) echo "selected"; ?> value="500">Tk 500</option>
                                        </select>
                                    </form>
                                </td>
                                <td><?php echo "BDT&nbsp;" . $product["price"] * $product["quantity"]; ?></td>
                                <td>
                                    <form method='post' action='cart'>
                                        <input type='hidden' name='item' value="<?php echo $product["item"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove px-3 py-1 bg-danger border text-light border-warning rounded'>Remove Ticket</button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                <?php
                            $total_price += ($product["price"] * $product["quantity"]);
                        }
                ?>
                <td colspan="7" class="text-center pt-5">
                    <strong>TOTAL: <?php echo "BDT&nbsp;" . $total_price; ?></strong>
                </td>
                </table>
                <div class="text-center border border-warning rounded mt-4">
                    <button class="btn btn-width btn-outline-warning text-dark" id="payButton">Proceed to Checkout</button>
                </div>
                <div id="paymentResponse" class="text-center"></div>
            <?php
            } else {
            ?>
                <h3 class='text-center mt-4'>Your cart is empty!</h3>
            <?php
            }
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

    <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        var buyBtn = document.getElementById('payButton');
        var responseContainer = document.getElementById('paymentResponse');
        // Create a Checkout Session with the selected product
        var createCheckoutSession = function(stripe) {
            return fetch("stripe_charge.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    checkoutSession: 1,
                    Name: "MTBS",
                    ID: "MTBS",
                    Price: "<?php echo $total_price ?>",
                    Currency: "BDT",
                }),
            }).then(function(result) {
                return result.json();
            });
        };

        // Handle any errors returned from Checkout
        var handleResult = function(result) {
            if (result.error) {
                responseContainer.innerHTML = '<p>' + result.error.message + '</p>';
            }
            buyBtn.disabled = false;
            buyBtn.textContent = 'Proceed to Checkout';
        };

        // Specify Stripe publishable key to initialize Stripe.js
        var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

        buyBtn.addEventListener("click", function(evt) {
            buyBtn.disabled = true;
            buyBtn.textContent = 'Please wait for a minute...';
            createCheckoutSession().then(function(data) {
                if (data.sessionId) {
                    stripe.redirectToCheckout({
                        sessionId: data.sessionId,
                    }).then(handleResult);
                } else {
                    handleResult(data);
                }
            });
        });
    </script>

    <!-- jQuery library link. -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jquery js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- datatables net  -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- external js link  -->
    <script src="externals/js/script.js"></script>

</body>

</html>