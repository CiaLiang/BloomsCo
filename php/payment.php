<?php
@session_start();
include '../functions/common_function.php'; // Include common functions

if (!isset($_SESSION["username"])) {
    echo "<script>alert('Please log in to access your cart.')</script>";
    echo "<script>window.location.href='./login.php';</script>";
}
if (isset($_SESSION['payment_id'])) {
    $payment_id = $_SESSION['payment_id'];
}
    $selectStr = "SELECT * FROM payments WHERE PAYMENT_ID = '$payment_id'";
    $result3 = mysqli_query($con, $selectStr);
    $payment = mysqli_fetch_assoc($result3);
    $subtotal = 0;
    if ($payment['total_amount'] != 0) {
    $subtotal = $payment['total_amount'];
} else {
    // Set default value if subtotal is not set
    $subtotal = 0;
}

// Calculate tax (5%)
$tax = $subtotal * 0.05;
// Calculate total amount including tax
$totalAmount = $subtotal + $tax;

// Retrieve subtotal value from POST request
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../css/login.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>PAYMENT | SNEAKER VAULT</title>
</head>
<body>
<?php include './header.php'; ?>

<div class="logintittle">
    <p>Home/</p><br>
    <p class="bold"><b>PAYMENT</b></p>
</div>

<div class="container2">
    <form id="payment-form" action="orderConfirmation.php" method="POST">
    <div class="container">
        <div class="fontsz">
            <label for="subtotal">Subtotal</label><br>
            <input type="number" id="subtotal" value="<?php echo $subtotal; ?>" disabled><br>
            <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">

            <label for="tax">Tax (5%)</label><br>
            <input type="number" id="tax" value="<?php echo $tax; ?>" disabled><br>
            <input type="hidden" name="tax" value="<?php echo $tax; ?>">

            <label for="totalAmount">TOTAL AMOUNT</label><br>
            <input type="number" id="totalAmount" value="<?php echo $totalAmount; ?>" disabled><br>
            <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">

            <label for="tngID">TOUCH 'n GO EWALLET ID:</label><br>
            <input type="text" name="tngID" id="tngID" required>
        </div>

        <div class="logbtn">
            <br>
            <input type="submit" class="loginbutM" name="pay" value="PAY WITH TOUCH 'n GO EWALLET">
        </div>
    </div>
</form>

</div>

<div class="create">
    <a href="shipment.php">Back</a>
</div>

<?php include './footer.php'; ?>
</body>
</html>