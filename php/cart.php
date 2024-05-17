<?php
@session_start();
include '../functions/common_function.php'; // Include common functions

// Function to remove cart items
function remove_cart_item($con) {
    if (isset($_POST['remove_cart'])) {
        if (isset($_POST['removeitem'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                $delete_query = "DELETE FROM cart_details WHERE product_id = ?";
                $stmt = $con->prepare($delete_query);
                $stmt->bind_param("i", $remove_id);
                $stmt->execute();
                if ($stmt->affected_rows > 0) {
                    header("Location: cart.php");
                    exit();
                }
            }
        } else {
            echo "<script>alert('Please select items to remove.')</script>";
        }
    }
}

// Function to update cart items
function update_cart_item($con) {
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['qty'] as $product_id => $quantity) {
            $update_cart = "UPDATE cart_details SET quantity = ? WHERE product_id = ?";
            $stmt = $con->prepare($update_cart);
            $stmt->bind_param("ii", $quantity, $product_id);
            $stmt->execute();
            if ($stmt->affected_rows == 0) {
                echo "";
            }
        }
    }
}

// Include function calls
remove_cart_item($con);
update_cart_item($con);

// Process payment
if (isset($_POST['pay'])) {
    $total_price = $_POST['total_price'];
    $user_id = getIPAddress();
    $date = date("Y-m-d");

    // Insert payment into the payments table
    $insert_query = "INSERT INTO payments (user_id, payment_date, total_amount, status) VALUES (?, ?, ?, 'Successful')";
    $stmt = $con->prepare($insert_query);
    $stmt->bind_param("ssd", $user_id, $date, $total_price);
    $stmt->execute();

    // Get the last inserted payment ID and store it in a session variable
    $payment_id = $stmt->insert_id;
    $_SESSION['payment_id'] = $payment_id;

    // Redirect to shipment page
    header("Location: shipment.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../css/admin.css" rel="stylesheet" type="text/css"/>
    <title>Cart | Sneaker Vault</title>
</head>
<body>
<?php
include './header.php';

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    echo "<script>alert('Please log in to access your cart.')</script>";
    echo "<script>window.location.href='./login.php';</script>";
}
?>

<div class="pageContent">
    <p>Home/</p></br>
    <p class="bold"><b>CART</b></p>
</div>

<div class="product-display">
    <form action="cart.php" method="POST">
        <table class="product-display-table">
            <thead>
            <tr>
                <td>Product Name</td>
                <td>Product Image</td>
                <td>Quantity</td>
                <td>Unit Price</td>
                <td>Remove</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php
            global $con;
            $get_ip_add = getIPAddress();
            $total_price = 0;
            $cart_query = "SELECT * FROM cart_details WHERE ip_address = ?";
            $stmt = $con->prepare($cart_query);
            $stmt->bind_param("s", $get_ip_add);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $select_products = "SELECT * FROM products WHERE product_id = ?";
                $stmt_product = $con->prepare($select_products);
                $stmt_product->bind_param("i", $product_id);
                $stmt_product->execute();
                $result_products = $stmt_product->get_result();

                while ($row_product_price = $result_products->fetch_assoc()) {
                    $product_price = $row_product_price['product_price'];
                    $product_name = $row_product_price['product_name'];
                    $product_image1 = $row_product_price['product_image1'];
                    $product_values = $product_price * $row['quantity'];
                    $total_price += $product_values;
                    $cart_quantity = $row['quantity'];
                    echo "<tr>
                            <td>$product_name</td>
                            <td><img src='../Admin/product_images/$product_image1' width='100px' height='100px'/></td>
                            <td><input type='number' name='qty[$product_id]' value='$cart_quantity' min='1'></td>
                            <td>RM $product_price</td>
                            <td><input type='checkbox' name='removeitem[]' value='$product_id'></td>
                            <td>
                                <input class='btn' type='submit' value='Update' name='update_cart' style='width: 90px;'>
                                <input class='btn' type='submit' value='Remove' name='remove_cart' style='width: 90px;'>
                            </td>
                        </tr>";
                }
            }
            ?>
            </tbody>
        </table>
        <div>
            <table class="product-display-table">
                <tr>
                    <td><b>Subtotal: RM <?php echo $total_price ?></b></td>
                    <input type='hidden' name='total_price' value='<?php echo $total_price; ?>'>
                </tr>
            </table>
            <center>
                <input  class="btn" type="submit" value="Continue Shopping" formaction="product.php">
                <input class="btn" type="submit" value="Checkout" name='pay'>
            </center>
        </div>
    </form>
</div>

<?php include './footer.php'; ?>

</body>
</html>
