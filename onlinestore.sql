-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(6) UNSIGNED NOT NULL,
  `productName` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(600) DEFAULT NULL,
  `dct` varchar(600) DEFAULT NULL,
  `category` varchar(60) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `price`, `img`, `dct`, `category`, `rate`, `quantity`) VALUES
(35, 'WD 2TB Elements Portable Exter', 123.00, 'https://fakestoreapi.com/img/61IBBVJvSDL._AC_SY879_.jpg', 'USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system', 'electronics', 4.20, 187.00),
(40, 'Fjallraven - Foldsack No. 1 Ba', 109.95, 'https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg', 'Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday', 'men\'s clothing', 3.90, 120.00),
(41, 'Mens Casual Premium Slim Fit T', 22.30, 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg', 'Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.', 'men\'s clothing', 4.10, 120.00),
(42, 'Fjallraven - Foldsack No. 1 Ba', 109.95, 'https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg', 'Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday', 'men\'s clothing', 3.90, 120.00),
(43, 'Mens Casual Premium Slim Fit T', 22.30, 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg', 'Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.', 'men\'s clothing', 4.10, 259.00),
(44, 'Mens Cotton Jacket', 55.99, 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg', 'Great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling, traveling or other outdoors. Good gift choice for you or your family member. A warm hearted love to Father, husband or son in this thanksgiving or Christmas Day.', 'men\'s clothing', 4.70, 500.00),
(45, 'Mens Casual Slim Fit', 15.99, 'https://fakestoreapi.com/img/71YXzeOuslL._AC_UY879_.jpg', 'The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.', 'men\'s clothing', 2.10, 430.00),
(46, 'John Hardy Women\'s Legends Nag', 695.00, 'https://fakestoreapi.com/img/71pWzhdJNwL._AC_UL640_QL65_ML3_.jpg', 'From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the ocean\'s pearl. Wear facing inward to be bestowed with love and abundance, or outward for protection.', 'jewelery', 4.60, 400.00),
(47, 'Solid Gold Petite Micropave', 168.00, 'https://fakestoreapi.com/img/61sbMiUnoGL._AC_UL640_QL65_ML3_.jpg', 'Satisfaction Guaranteed. Return or exchange any order within 30 days. Designed and sold by Hafeez Center in the United States. Satisfaction Guaranteed. Return or exchange any order within 30 days.', 'jewelery', 3.90, 70.00),
(48, 'White Gold Plated Princess', 9.99, 'https://fakestoreapi.com/img/71YAIFU48IL._AC_UL640_QL65_ML3_.jpg', 'Classic Created Wedding Engagement Solitaire Diamond Promise Ring for Her. Gifts to spoil your love more for Engagement, Wedding, Anniversary, Valentine\'s Day...', 'jewelery', 3.00, 400.00),
(49, 'Pierced Owl Rose Gold Plated S', 10.99, 'https://fakestoreapi.com/img/51UDEzMJVpL._AC_UL640_QL65_ML3_.jpg', 'Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel', 'jewelery', 1.90, 100.00),
(51, 'SanDisk SSD PLUS 1TB Internal ', 109.00, 'https://fakestoreapi.com/img/61U7T1koQqL._AC_SX679_.jpg', 'Easy upgrade for faster boot up, shutdown, application load and response (As compared to 5400 RPM SATA 2.5” hard drive; Based on published specifications and internal benchmarking tests using PCMark vantage scores) Boosts burst write performance, making it ideal for typical PC workloads The perfect balance of performance and reliability Read/write speeds of up to 535MB/s/450MB/s (Based on internal testing; Performance may vary depending upon drive capacity, host device, OS and application.)', 'electronics', 2.90, 470.00),
(52, 'Silicon Power 256GB SSD 3D NAN', 109.00, 'https://fakestoreapi.com/img/71kWymZ+c+L._AC_SX679_.jpg', '3D NAND flash are applied to deliver high transfer speeds Remarkable transfer speeds that enable faster bootup and improved overall system performance. The advanced SLC Cache Technology allows performance boost and longer lifespan 7mm slim design suitable for Ultrabooks and Ultra-slim notebooks. Supports TRIM command, Garbage Collection technology, RAID, and ECC (Error Checking & Correction) to provide the optimized performance and enhanced reliability.', 'electronics', 4.80, 319.00),
(53, 'WD 4TB Gaming Drive Works with', 114.00, 'https://fakestoreapi.com/img/61mtL65D4cL._AC_SX679_.jpg', 'Expand your PS4 gaming experience, Play anywhere Fast and easy, setup Sleek design with high capacity, 3-year manufacturer\'s limited warranty', 'electronics', 4.80, 400.00),
(54, 'Acer SB220Q bi 21.5 inches Ful', 599.00, 'https://fakestoreapi.com/img/81QpkIctqPL._AC_SX679_.jpg', '21. 5 inches Full HD (1920 x 1080) widescreen IPS display And Radeon free Sync technology. No compatibility for VESA Mount Refresh Rate: 75Hz - Using HDMI port Zero-frame design | ultra-thin | 4ms response time | IPS panel Aspect ratio - 16: 9. Color Supported - 16. 7 million colors. Brightness - 250 nit Tilt angle -5 degree to 15 degree. Horizontal viewing angle-178 degree. Vertical viewing angle-178 degree 75 hertz', 'electronics', 2.90, 250.00),
(55, 'Samsung 49-Inch CHG90 144Hz Cu', 999.99, 'https://fakestoreapi.com/img/81Zt42ioCgL._AC_SX679_.jpg', '49 INCH SUPER ULTRAWIDE 32:9 CURVED GAMING MONITOR with dual 27 inch screen side by side QUANTUM DOT (QLED) TECHNOLOGY, HDR support and factory calibration provides stunningly realistic and accurate color and contrast 144HZ HIGH REFRESH RATE and 1ms ultra fast response time work to eliminate motion blur, ghosting, and reduce input lag', 'electronics', 2.20, 140.00),
(56, 'BIYLACLESEN Women\'s 3-in-1 Sno', 56.99, 'https://fakestoreapi.com/img/51Y5NI-I5jL._AC_UX679_.jpg', 'Note:The Jackets is US standard size, Please choose size as your usual wear Material: 100% Polyester; Detachable Liner Fabric: Warm Fleece. Detachable Functional Liner: Skin Friendly, Lightweigt and Warm.Stand Collar Liner jacket, keep you warm in cold weather. Zippered Pockets: 2 Zippered Hand Pockets, 2 Zippered Pockets on Chest (enough to keep cards or keys)and 1 Hidden Pocket Inside.Zippered Hand Pockets and Hidden Pocket keep your things secure. Humanized Design: Adjustable and Detachable Hood and Adjustable cuff to prevent the wind and water,for a comfortable fit. 3 in 1 Detachable Desig', 'women\'s clothing', 2.60, 235.00),
(57, 'Lock and Love Women\'s Removabl', 29.95, 'https://fakestoreapi.com/img/81XH0e8fefL._AC_UY879_.jpg', '100% POLYURETHANE(shell) 100% POLYESTER(lining) 75% POLYESTER 25% COTTON (SWEATER), Faux leather material for style and comfort / 2 pockets of front, 2-For-One Hooded denim style faux leather jacket, Button detail on waist / Detail stitching at sides, HAND WASH ONLY / DO NOT BLEACH / LINE DRY / DO NOT IRON', 'women\'s clothing', 2.90, 340.00),
(58, 'Rain Jacket Women Windbreaker ', 39.99, 'https://fakestoreapi.com/img/71HblAHs5xL._AC_UY879_-2.jpg', 'Lightweight perfet for trip or casual wear---Long sleeve with hooded, adjustable drawstring waist design. Button and zipper front closure raincoat, fully stripes Lined and The Raincoat has 2 side pockets are a good size to hold all kinds of things, it covers the hips, and the hood is generous but doesn\'t overdo it.Attached Cotton Lined Hood with Adjustable Drawstrings give it a real styled look.', 'women\'s clothing', 3.80, 679.00),
(59, 'MBJ Women\'s Solid Short Sleeve', 9.85, 'https://fakestoreapi.com/img/71z3kpMAYsL._AC_UY879_.jpg', '95% RAYON 5% SPANDEX, Made in USA or Imported, Do Not Bleach, Lightweight fabric with great stretch for comfort, Ribbed on sleeves and neckline / Double stitching on bottom hem', 'women\'s clothing', 4.70, 130.00),
(60, 'Opna Women\'s Short Sleeve Mois', 7.95, 'https://fakestoreapi.com/img/51eg55uWmdL._AC_UX679_.jpg', '100% Polyester, Machine wash, 100% cationic polyester interlock, Machine Wash & Pre Shrunk for a Great Fit, Lightweight, roomy and highly breathable with moisture wicking fabric which helps to keep moisture away, Soft Lightweight Fabric with comfortable V-neck collar and a slimmer fit, delivers a sleek, more feminine silhouette and Added Comfort', 'women\'s clothing', 4.50, 146.00),
(61, 'DANVOUY Womens T Shirt Casual ', 12.99, 'https://fakestoreapi.com/img/61pHAEJ4NML._AC_UX679_.jpg', '95%Cotton,5%Spandex, Features: Casual, Short Sleeve, Letter Print,V-Neck,Fashion Tees, The fabric is soft and has some stretch., Occasion: Casual/Office/Beach/School/Home/Street. Season: Spring,Summer,Autumn,Winter.', 'women\'s clothing', 3.60, 145.00),
(62, 'WD 2TB Elements Portable Exter', 123.00, 'https://fakestoreapi.com/img/61IBBVJvSDL._AC_SY879_.jpg', 'USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system', 'jewelry', NULL, 5.00),
(63, 'WD 2TB Elements Portable Exter', 123.00, 'https://fakestoreapi.com/img/61IBBVJvSDL._AC_SY879_.jpg', 'USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system', 'men\'s clothing', NULL, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `name`) VALUES
(4, '123', '$2y$10$Gp.iclh.XWcMsgLPFYkX5.M.4GZkuyaBihqussg5wqB.Bd1/ylw1G', NULL, NULL),
(5, '342432', '$2y$10$Ii8XLt33HiHsc/pjXi.IBOpcuA3KCceAf9fmOTcs0H2gAP4jc9OjO', NULL, NULL),
(6, '', '$2y$10$nuFSsEDwSZ/NR0EaxcdvUe28NhMv2ezwC.yV7nHZI3o3iTH0biEyG', NULL, NULL),
(7, '', '$2y$10$9CZl0xUM8iqZq41opUqPMOMcATy85N1ji7Xqd9QNaQDpkpaf9qloW', NULL, NULL),
(8, '', '$2y$10$jsFCuimUa8VS2qSbwD83seWhkEgXWCxHtnSMZZrqH6g1Lhd57wOoy', NULL, NULL),
(9, '123', '$2y$10$fekHc.AdmeNgKT5eCJj7Q.TwoYnNT9WuN/Q3.oxZWtMTe0qlcWRMi', NULL, NULL),
(10, '', '$2y$10$w9JSPnPIN8NeuVUHdqnoiOLp0TjMfm9VZU7eVUkS3nBJ/CWBJhA/y', NULL, NULL),
(11, '', '$2y$10$g55Xz0.00mj1RV1WUUFS3.tKW08/YpOZdis1LJkfb.j4FY91qx/CG', NULL, NULL),
(12, '', '$2y$10$bOvCvc4acikUBg2xh.dGzOHV1yWdo9LQ6f1VPwC.ErX6dbG8ZmM6G', NULL, NULL),
(13, '', '$2y$10$AL60zUgoVONxAsvUy/DejulWLEp1BkCbgnAsuw4g/UnjfIzdA6QD6', NULL, NULL),
(14, '', '$2y$10$K.I1jB0hg9BeaFds/IiXFOEeuMfZPuEp.wLZLcq.UrV5Ja2K8kBjC', NULL, NULL),
(15, '', '$2y$10$0CB5N.ZUnL0aQ6xOdGuQG.FS2iTWBG7g8jE2dBvJyGEZOQJzO.JoO', NULL, NULL),
(16, '', '$2y$10$T76gShpPlx5j643EiPOUju5wQgS1HHlIom87/VeMQcWTsPFY2Rqfe', NULL, NULL),
(17, '', '$2y$10$lM.CNUuSvYia3ixx21XHCe9JOJXAT4LF6KSKI8/9huTyA4bE7CMxW', NULL, NULL),
(21, '1', '$2y$10$rDaPCTe1Ew8SJG9NaO6Czet77mofjFM4SBUj0euiODPf2DVrilyYm', NULL, NULL),
(24, '1', '$2y$10$Ux3l0oAdg2QBMnpiGqNdWeQFSx4KHGd9V5oydFtsz6E0rLF35Xkbu', NULL, NULL),
(26, '', '$2y$10$oY3BhvVUtNVwbO8GFjUXQuJRkLCdwDDIHik/..T4mixfVpFyZE8oK', NULL, NULL),
(29, 'testaccount4', '$2y$10$8yEY0GksBpEVLYLzZfUa.uyCmQqwa/hBQsBYIxVBnZLmp6WxtsbEe', NULL, NULL),
(30, 'thanhlt11111', '$2y$10$iM4OJgm6CWlagnlNhcvlmu/cHwBBK7UeVIxPR0Y.ecPTL3tQU/XTW', 'thanhlt1235@gmail.com', 'Huy Thanh'),
(31, 'testaccount12', '$2y$10$taqssqe1JxcvXzhQmDas3.XgdrKPWWFAYsQlLhnI5ltogOPrhD8Py', 'thanhlt1235@gmail.com', 'Huy Thanh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
