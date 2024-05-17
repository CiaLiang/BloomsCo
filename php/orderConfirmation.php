<?php 
@session_start();
require_once './helper.php'; 
      include '../functions/common_function.php';
      if (isset($_SESSION['payment_id'])) {
    $payment_id = $_SESSION['payment_id'];
}
      ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <title>Order Confirmation | Sneaker Vault</title>
    </head>
    <body>
        <?php include './header.php'; ?>
        
        <div class="pageContent">
            <p>Home/Payment/</p></br>
            <p class="bold"><b>ORDER CONFIRMATION</b></p>
        </div>
       
            <center><img src="../images/tick.jpg" width="100px" height="100px" /></center>
            <div class="pageConfirm">
            <p class="bold"><b>Thank You for Your Purchasing!</b></p>
            <p>Your details has been successfully submitted.</p></br>
        </div>
            <center><a href="homepage.php"><button type = "button" class = "ok-btn">OK</button></a></center>
            <?php
if (isset($_POST['pay'])) {

    $userid = getIPAddress(); 
    $date = date("Y/m/d");
    $total = $_POST['totalAmount'];
    $tax = $_POST['tax'];
    $ewallet = $_POST['tngID'];

    // Use prepared statements for security
    $insert_query = "UPDATE payments SET user_id = '$userid', payment_date = '$date', tax = '$tax', ewallet_id = '$ewallet', status = 'Successful' WHERE PAYMENT_ID = $payment_id";
    $stmt = $con->prepare($insert_query);
    $stmt->execute();
    $select_query = "SELECT * FROM cart_details WHERE ip_address = ?";
    $stmt = $con->prepare($select_query);
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $prodid = $row['product_id'];
        $qty = $row['quantity'];

        $insert_str = "INSERT INTO orders (prodid, userid, quantity, paymentid) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($insert_str);
        $stmt->bind_param("ssii", $prodid, $userid, $qty, $payment_id);
        $stmt->execute();
    }

    $delete_str = "DELETE FROM cart_details WHERE ip_address = ?";
    $stmt = $con->prepare($delete_str);
    $stmt->bind_param("s", $userid);
    $stmt->execute();

   
}
?>

        
        <?php include './footer.php'; ?>
        
    </body>
</html>
