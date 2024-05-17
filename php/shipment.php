<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();
include '../functions/common_function.php'; // Include common functions

if (isset($_SESSION['payment_id'])) {
    $payment_id = $_SESSION['payment_id'];
}

// Continue with the rest of the shipment processing logic
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/login.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <title>Shipment Info | Sneaker Vault</title>
    </head>
    <body
    <?php include './header.php'; ?>

        <div class="logintittle">
            <p>Home/Cart/</p></br>
            <p class="bold"><b>SHIPMENT INFO</b></p>
        </div>

        <div class="container2">
            <form action='payment.php' method='POST'>
                <div class="container">
                    <div class='fontsz'>
                        <label for="name">NAME</label><br>
                        <input type="text" name="name" id="name" placeholder="Daniel Lian" required>
                        <br><label for="email">EMAIL</label><br>
                        <input type="email" name="email" id="email" placeholder="lianhc@gmail.com" required>
                        <br><label for="address">ADDRESS</label><br>
                        <input type="text" name="address" id="address" placeholder="77, Lorong Lembah Permai 3, 11200 Tanjung Bungah, Pulau Pinang" required>
                        <br><label for="country">COUNTRY</label><br>
                        <input type="text" name="country" id="country" placeholder="Malaysia" required>
                        <br><label for="state">STATE</label><br>
                        <input type="text" name="state" id="state" placeholder="Penang" required>
                        <br><label for="code">POSTAL CODE</label><br>
                        <input type="text" name="code" id="code" placeholder="13000" required>
                        <input type="hidden" name="paymentID" value='<?php echo $paymentID ?>'>
                    </div>    
                    <div class="logbtn">
                        <br><input class="loginbutM" type='submit' name='payment' value='NEXT'>
                    </div>
                </div>
                                     <div class="create"><a href="cart.php">Back</a></div>
            </form>
        </div>

    <?php include './footer.php'; ?>
</body>
</html>