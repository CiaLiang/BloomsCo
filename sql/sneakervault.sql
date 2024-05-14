-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 11:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakervault`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` varchar(50) NOT NULL,
  `admin_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_password`) VALUES
('AD0000', '$2y$10$yYzklsJqnGY90huxgxorTOhEgTF9iTZFRL9iXMf1Dgg3C6c1LwDwe'),
('AD1001', '$2y$10$E.WkFIgFUQSx9R..PjRFrugMazC6gwney2IVjlWat0GHWtwhxHH32'),
('AD1002', '$2y$10$qb5Ga2.55nRqbAnwE3gyrepDvzIoOleUTXHX8zaQ5kaU9j6mEk/B6'),
('AD1003', '$2y$10$wKmqFvSQFq00hWLDNxbtC.n79v/gS9LWW.jTKUcJ08h/MylsESNwC'),
('AD1004', '$2y$10$3rnKHHAhc88SMLxKpWMzge.PW6sGw.9HIFtEbWKrvkfs2.koZYZwu'),
('AD1005', '$2y$10$ak.JIpgaO2IP9Egpw4m43.VID1Gv/qwSctU4MRTgGHWEKZobmJsqC'),
('AD1006', '$2y$10$Y/YVjZa7qGZgQlxGD57BSOYG2sXdMQng4kaYucJlieFJ22KAg6nk.'),
('AD1069', '$2y$10$IW8XEQyQmyR/1YZ31LxURut7ObIo0wwV4uOyjE78e99mnAVAOmnsy'),
('Test1', '$2y$10$iI0vZqnNJWfLWOteXoBt3.xyu.E6SKiEJcWTs30YRp259wNMTaic2'),
('TestTest', '$2y$10$A538nEs.8vHZbmUHs1g9EOR6HDblVvR1BDNmOLXFXYwIlnNdihMgG');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(13, 'Blooms Co.');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(3, '::1', 1),
(11, '::1', 1),
(23, '::1', 1),
(47, '::1', 0),
(48, '::1', 1),
(53, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(8, 'Graduation');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `date`, `status`) VALUES
(42, 'Casabella Pink Hydrangea Bouquet', 'Featuring a dreamy bouquet of vibrant pink hydrangeas and soft, sweet avalanche roses - it\'s the ideal way to remind that special someone you\'re still crazy about them.', '229.00', 'Casabella, Pink, Hydrangea, Bouquet', 8, 13, 'bloomthis-bouquet-casabella-pink-hydrangea-bouquet-1080x1080-01_a5f6280c-f0f8-4d9f-be03-84f7f2682c26.jpg', 'bloomthis-bouquet-casabella-pink-hydrangea-bouquet-1080x1080-02_66d3abc1-49cf-490a-9d8c-a157445430a8.jpg', 'bloomthis-bouquet-casabella-pink-hydrangea-bouquet-1080x1080-05_d9c90a95-81de-4a81-ba46-7fee1d6fb9ab.jpg', '2024-03-26 11:18:40', 'true'),
(43, 'Esmerelda Pink Rose Flower Box', 'Searching for the ideal feminine gift? This pastel pink flower box featuring pink alstroemeria, cotton flowers and avalanche pink roses makes the perfect flowers for your darling. Order your flower delivery from us today.', '159.00', 'Esmerelda, Pink, Rose, Flower Box', 8, 13, 'bloomthis-hat-box-esmerelda-pink-rose-flower-box-1080x1080-01.jpg', 'bloomthis-hat-box-esmerelda-pink-rose-flower-box-1080x1080-05.jpg', 'bloomthis-hat-box-esmerelda-pink-rose-flower-box-1080x1080-10.jpg', '2024-03-26 11:13:03', 'true'),
(44, 'Annabeth Pink Lily Bouquet', 'A breathtaking millennial pink arrangement, Annabeth makes it easy to say congratulations with a designer bouquet of flowers.', '209.00', 'Annabeth, Pink, Lily, Bouquet', 8, 13, 'bloomthis-bouquet-annabeth-pink-lily-bouquet-1080x1080-01.jpg', 'bloomthis-bouquet-annabeth-pink-lily-bouquet-1080x1080-03.jpg', 'bloomthis-bouquet-annabeth-pink-lily-bouquet-1080x1080-09.jpg', '2024-03-26 11:19:35', 'true'),
(45, 'Marilyn Gerbera & Rose Flower Box', 'Don\'t be afraid to stand out just like Marilyn! A lively curation of pink Gerbera, hot cherry pink Rose, pink Carnation and white Ping Pong. Make someone smile today.', '179.00', 'Marilyn, Gerbera, & Rose, Flower Box', 8, 13, 'bloomthis-hat-box-marilyn-gerbera-rose-flower-box-1080x1080-01.jpg', 'bloomthis-hat-box-marilyn-gerbera-rose-flower-box-1080x1080-03.jpg', 'bloomthis-hat-box-marilyn-gerbera-rose-flower-box-1080x1080-09.jpg', '2024-03-26 11:14:41', 'true'),
(46, 'Esther White', 'If you\'re looking for something sweet, this darling lily hand bouquet has got you covered. Our florists have put together this charming arrangement that best depicts \'you\'re the best\'. Make someone\'s day today with our bestselling Robina Lily.', '109.00', 'Esther, White', 8, 13, 'bloomthis-bouquet-esther-white-1080x1080-01.jpg', 'bloomthis-bouquet-esther-white-1080x1080-02.jpg', 'bloomthis-bouquet-esther-white-1080x1080-06.jpg', '2024-03-26 11:11:38', 'true'),
(47, 'Cheyenne', 'Truly a pocketful of sunshine, Cheyenne\'s artistic mix of sunflowers, yellow lilies, and caspia would surely delight your loved one.', '169.00', 'Cheyenne', 8, 13, 'bloomthis-bouquet-cheyenne-1080x1080-01_744d1f8e-b6cb-4a7a-ba11-94dc116d908f.jpg', 'bloomthis-bouquet-cheyenne-1080x1080-04_db0e0c48-aed0-45a4-af17-94abdae3cefc.jpg', 'bloomthis-bouquet-cheyenne-1080x1080-05_ebacf8f4-6c2b-459e-8615-746393d51dc3.jpg', '2024-03-26 11:17:38', 'true'),
(48, 'Sadie White', 'Does someone need some cheering up? This sunflower bouquet will do just the trick! Sadie White is perfect for the one who loves all things bright and vibrant. Send them a ray of sunshine and watch sparks fly.', '109.00', 'Sadie, White', 8, 13, 'bloomthis-bouquet-sadie-white-1080x1080-01_fc3937f3-a6be-462d-9963-cdf2a10dde7d.jpg', 'bloomthis-bouquet-sadie-white-1080x1080-02_560c7a2d-bacc-40e7-a163-a548a428b24a.jpg', 'bloomthis-bouquet-sadie-white-1080x1080-03_5154811c-b66f-48f1-bca1-fff0d928be24.jpg', '2024-03-25 12:37:49', 'true'),
(49, 'Steph Sunflower & Gerbera Flower Box', 'Love is a ray of sunshine with Steph. This flower box brings doses of happiness with bright sunflowers standing out in a sweet combination of emma and white roses, gerbera, eryngium and pistacia leaves. She\'s the perfect pick-me-up gift for anyone who nee', '159.00', 'Steph, Sunflower, & ,Gerbera, Flower Box', 8, 13, 'bloomthis-hat-box-steph-1080x1080-01.jpg', 'bloomthis-hat-box-steph-1080x1080-03.jpg', 'bloomthis-hat-box-steph-1080x1080-05.jpg', '2024-03-26 11:21:46', 'true'),
(50, 'Sylvie Gerbera Bouquet', 'A gift of pure joy, this sweet and beautiful bouquet is handcrafted for that special someone. The Sylvie Gerbera Bouquet features pink gerbera daisies, a classic symbol of feminine charm and beauty, arranged with luxurious eucalyptus foliage.', '89.00', 'Sylvie, Gerbera, Bouquet', 8, 13, 'bloomthis-bouquet-sylvie-gerbera-bouquet-1080x1080-01.jpg', 'bloomthis-bouquet-sylvie-gerbera-bouquet-1080x1080-03.jpg', 'bloomthis-bouquet-sylvie-gerbera-bouquet-1080x1080-04.jpg', '2024-03-26 11:25:11', 'true'),
(51, 'Madelyn White', 'Madelyn depicts the personality of someone with the softest heart. Did someone just pop into your mind? This soft blue hydrangea hand bouquet is paired with white luxurious wraps that makes the arrangement pop.', '109.00', 'Madelyn, White', 8, 13, 'bloomthis-bouquet-madelyn-white-1080x1080-01.jpg', 'bloomthis-bouquet-madelyn-white-1080x1080-02.jpg', 'bloomthis-bouquet-madelyn-white-1080x1080-03.jpg', '2024-03-26 11:27:08', 'true'),
(52, 'Baby Breath Bouquet', 'Everyone loves baby\'s breath, and we makes the perfect bouquet for a birthday or anniversary. Suitable to be dried, the soft pink hue in this bouquet adds a beautiful pop of colour to your home when displayed on a desk or scattered throughout your home.', '89.00', 'Baby, Breath, Bouquet', 8, 13, 'bloomthis-bouquet-janice-babys-breath-bouquet-1080x1080-01.jpg', 'bloomthis-bouquet-janice-babys-breath-bouquet-1080x1080-03.jpg', 'bloomthis-bouquet-janice-babys-breath-bouquet-1080x1080-04.jpg', '2024-03-26 11:29:46', 'true'),
(53, 'Calypso Sunflower & Rose Bouquet', 'It\'s always summertime here with Calypso. Add some fun to your graduation with this stunning bouquet of sunflowers and roses.', '179.00', 'Calypso, Sunflower, &, Rose, Bouquet', 8, 13, 'bloomthis-bouquet-calypso-sunflower-rose-bouquet-1080x1080-01_889f28e6-2f29-4ceb-8148-b274a22c6374.jpg', 'bloomthis-bouquet-calypso-sunflower-rose-bouquet-1080x1080-06.jpg', 'bloomthis-bouquet-calypso-sunflower-rose-bouquet-1080x1080-09.jpg', '2024-03-26 11:31:43', 'true'),
(54, 'Amelia', 'Chase your dreams and reach for the skies with darling Amelia. This pretty graduation bouquet is curated with pastel pink gerberas, scarlet roses, ping pongs, rustic dried wheat, delicate yellow caspia and lush eucalyptus parvifolia leaves.', '99.00', 'Amelia', 8, 13, 'bloomthis-bouquet-amelia-1080x1080-01.jpg', 'bloomthis-bouquet-amelia-1080x1080-02.jpg', 'bloomthis-bouquet-amelia-1080x1080-03.jpg', '2024-03-26 11:33:02', 'true'),
(55, 'Tinkerbell Sunflower Mini Flower Box', 'A 100% Instagrammable cutie, Tinkerbell is a dainty arrangement of a bright yellow sunflower on a bed of deep red berries and pure white baby\'s breath.', '99.00', 'Tinkerbell, Sunflower, Mini, Flower Box', 8, 13, 'bloomthis-hat-box-tinkerbell-sunflower-mini-flower-box-1080x1080-02.jpg', 'bloomthis-hat-box-tinkerbell-sunflower-mini-flower-box-1080x1080-04.jpg', 'bloomthis-hat-box-tinkerbell-sunflower-mini-flower-box-1080x1080-05.jpg', '2024-03-26 11:34:43', 'true'),
(56, 'Graduation Bear Bouquet', 'Send your congratulations with the Graduation Bear Bouquet! Paul, our cheerful polar bear graduate, is surrounded by bright sunflowers, roses, and gerberas. Perfect for wishing a special grad all the best on their big day!', '139.00', 'Graduation, Bear, Bouquet', 8, 13, 'bloomthis-bouquet-mika-graduation-bear-bouquet-1080x1080-01.jpg', 'Screenshot 2024-03-26 194407.png', 'bloomthis-bouquet-mika-graduation-bear-bouquet-1080x1080-03.jpg', '2024-03-26 11:44:57', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_address`, `user_phone`, `user_image`) VALUES
(14, 'Morris', 'morris@gmail.com', '$2y$10$DHojOXqVlpcDyc8mRh8xoe/MFR6Y5BzkKTtJ4iO9jKxp7mbGQWviW', 'Taman Sunni, 69 ,Penang', '0108090187', 'morris.jpg'),
(15, 'Chinyii', 'limchinyi1@gmail.com', '$2y$10$zJ2/NhS6q8GMpX0SjKUZ/eLT2GRShFOr4t0OJZd/7BOsCgl14VSzC', 'Jalan Sus, Cili Padi, Toilet, 11800', '0184717829', 'chinyi.jpg'),
(16, 'Daniel', 'daniel69@gmail.com', '$2y$10$pLjaKjKwuQ..k2cGdw1RsO56d3yvAODraX.hnQF6AMotHXFAh6IUS', 'Jalan Sus, Yeet, Toilet, 11800', '0125389689', 'daniel.jpg'),
(17, 'Test1', 'test@gmail.com', '$2y$10$3L.Kuc2UT8CVszLYnr/vl.y.JLnL3MHSRD7RNye3gmIi9wBNST4hK', 'Taman 69, Sunni Road, Penang', '0000000000', 'default.png'),
(18, 'Test111', 'dwahjdbajwhdb@kijidbnawkj.com', '$2y$10$mLR2EIJ4u6DkXOo5gmyrHuXk7zIfJmSnQ8aat.cwACM/GjqDVEH.O', 'dasdawDawd', '012343432269', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
