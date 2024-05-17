<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/contact.css" rel="stylesheet" type="text/css"/>
        <title>Contact Us | Sneaker Vault</title>
    </head>
    <body>
        <?php include './header.php'; ?>

        <nav>
            <a href="terms.php">T&C</a>
            <a href="shipping.php">SHIPPING</a>
            <a href="privacypolicy.php">PRIVACY POLICY</a>
        </nav>

        <div class="tittle">
            <p>Home/</p></br>
            <p class="bold"><b>CONTACT US</b></p>   
        </div>

        <p class="texta">Got something in mind? Need assistance?<br>
            Drop us a message and we’ll get back to you.</p>

        <div class="container2">
            <form onsubmit="return showPopup(event)">
                <div class="container">
                    <div class="fontsz">
                        <label for="text">NAME</label><br>
                        <input type="text" name="text" id="text" maxlength="14" minlength="6" required>
                        <br><label for="email">EMAIL</label><br>
                        <input type="email" name="email" id="email" maxlength="35" required>
                        <br><label for="text">PHONE NUMBER</label><br>
                        <input type="text" name="phoneno" id="phoneno" maxlength="12" minlength="9" required>
                        <br><label for="text">MESSAGE</label><br>
                        <textarea id="area" name="area" rows="2" cols="123"></textarea>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn4">SUBMIT</button>
        </div>
    </form>


    <?php include './footer.php'; ?>

    <script>
        function showPopup(event) {
            event.preventDefault(); // Prevent form from submitting
            alert("Your message has been submitted successfully!");
            // You can allow form submission by removing the above line and calling form.submit() after showing the alert.
            // For example:
            // event.target.submit(); // Uncomment this line to submit the form after showing the alert
        }
    </script>
</body>
</html>
