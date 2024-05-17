<?php
@session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <title>Header</title>
    </head>
    <body>
        <div class="top">
            <a href="#" class="search"><ion-icon name="search-outline"></ion-icon></a>
            <ul><img class="header-pic" src="../images/whitelogo.png" usemap="#home-map">
                <map name="home-map">
                    <area target="" alt="" title="" href="homepage.php" coords="-1,-1,499,155" shape="rect">
                </map>
            </ul>

            <?php
// Check if the session variable is set
            if (isset($_SESSION['username'])) {
                // if the session variable dont have, show the logout button
                echo "<a href='logout.php' class='account'><ion-icon name='log-out-outline'></ion-icon></a>";
            } else {
                // if the session variable dont have, show the login button
                echo "<a href='login.php' class='account'><ion-icon name='log-in-outline'></ion-icon></a>";
            }
            ?>



            <a href="cart.php" class="cart" name="addcart"><ion-icon name="cart-outline"></ion-icon></a>
        </div>

        <nav>
            <a href="homepage.php">HOME</a>
            <a href="product.php">PRODUCT</a>
            <a href="contact.php">CONTACT US</a>
            <?php
            if (isset($_SESSION['username'])) {
                echo "<a href='accountset.php'>ACCOUNT</a>";
            }
            ?>         
        </nav>
         </body>
</html>

