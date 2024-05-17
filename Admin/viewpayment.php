<?php
include '../config/connect.php';

if(isset($_POST['refund'])){
    refund_order($con); // Call the refund_order function if the refund button is clicked
}

// Define the refund_order function
function refund_order($con) {
    if (isset($_POST['refund'])) {
        // Check if the refund button was clicked
        $orderid = $_POST['orderid']; // Assuming you have a hidden input field for orderid in your form
        
        // Sanitize the orderid to prevent SQL injection
        $orderid = mysqli_real_escape_string($con, $orderid);
        
        // Perform the refund operation (delete the order)
        $delete_query = "DELETE FROM orders WHERE orderid = $orderid";
        $run_delete = mysqli_query($con, $delete_query);
        
        // Check if the refund operation was successful
        if ($run_delete) {
            // Redirect to a confirmation page or display a success message
            header("Location: viewpayment.php");
            exit();
        } else {
            // Handle the case where the refund operation fails
            echo "<script>alert('Failed to process refund. Please try again.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../css/admin.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Edit Payment | Sneaker Vault</title>
</head>
<body>
    <?php include './adminheader.php'; ?>
    <div class="pageContent">
        <p>Home/Admin/</p><br>
        <p class="bold"><b>VIEW PAYMENT</b></p>
    </div>

    <div class="product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <td>Product Name</td>
                    <td>Product Price</td>
                    <td>Quantity</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <?php
            // Fetch and display payment details
            $query2 = "SELECT * FROM orders";
            $result = mysqli_query($con, $query2);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $prodid = $row['prodid'];

                // Query to get product details
                $query = "SELECT * FROM products WHERE PRODUCT_ID = '$prodid'";
                $result2 = mysqli_query($con, $query);
                $product = mysqli_fetch_assoc($result2);

                // Query to get payment details
                $paymentid = $row['paymentid'];
                $query3 = "SELECT * FROM payments WHERE PAYMENT_ID = '$paymentid'";
                $result3 = mysqli_query($con, $query3);
                $payment = mysqli_fetch_assoc($result3);

                // Extracting data
                $product_name = $product['product_name'];
                $product_price = $product['product_price'];
                $qty = $row['quantity'];
                $date = $payment['payment_date'];
                $status = $payment['status'];
                $number++;
            ?>
            <tr>
                <td><?php echo $product_name ?></td>
                <td><?php echo $product_price ?></td>
                <td><?php echo $qty ?></td>
                <td><?php echo $date ?></td>
                <td><?php echo $status ?></td>
                <form action="" method="POST">
                    <!-- Include a hidden input field to store the orderid -->
                    <input  type="hidden" name="orderid" value="<?php echo $row['orderid']; ?>">
                    <td>
                        <input style="width: 90px;" class="log" type="submit" value="Refund" name="refund">
                    </td>
                </form>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
