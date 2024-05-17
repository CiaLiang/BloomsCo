<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <title>Homepage | Sneaker Vault</title>
    </head>
    <body>
        <?php
        include './header.php';
        include '../config/connect.php';
        ?>
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!--resize image in photos to fit properly width:600 height:271-->

            <div class="mySlides fade">
                <center>
                    <div class="pic1">
                        <a href="#">
                            <img src="../images/slide1.png" width="1280px" height="533px">
                        </a>
                    </div>
                </center>
            </div>

            <div class="mySlides fade">
                <center>
                    <div class="pic1">
                        <a href="#">
                            <img src="../images/slides2.jpg" width="1280px" height="533px">
                        </a>
                    </div>
                </center>
            </div>

            <div class="mySlides fade">
                <center>
                    <div class="pic1">
                        <a href="#">
                            <img src="../images/Slides3.png" width="1280px" height="533px">
                        </a>
                    </div>
                </center>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <div class="pageContent">
            <p class="bold"><b>Products</b></p>
        </div>

        <div class="product-list-container">
            <div class="product-list">

                <!--Fetching products-->
                <?php
                $select_query = "SELECT p.product_id, p.product_name, p.product_price, p.product_image1, p.category_id, p.brand_id, b.brand_title 
FROM products p 
JOIN brands b ON p.brand_id = b.brand_id 
ORDER BY RAND()
LIMIT 5";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $prodID = $row['product_id'];
                    $prodName = $row['product_name'];
                    $prodPrice = $row['product_price'];
                    $prodPic1 = $row['product_image1'];
                    $prodCat = $row['category_id'];
                    $prodBrand = $row['brand_title'];
                    echo "
    <div class='product'>
        <a href='productDetails.php?product_id=$prodID'>
            <img class='product-list-pic' src='../Admin/product_images/$prodPic1' usemap='#prod$prodID-map'>
        </a>

        <map name='prod$prodID-map'>
            <area href='productDetails.php?product_id=$prodID' coords='0,1,997,999' shape='rect'>
        </map>

        <p class='product-list-name'>$prodName</p>
        <p class='product-list-brand'>$prodBrand</p>
        <p class='product-list-price'>RM $prodPrice</p>
    </div>";
                }
                ?>
            </div>
            <center><a href="product.php"><button type = "button" class = "view-all-btn">VIEW ALL</button></a></center>
        </div>



        <script>
            let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
            }
        </script>
        <?php include './footer.php'; ?>
    </body>
</html>
