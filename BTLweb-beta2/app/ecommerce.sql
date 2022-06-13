-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 07:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(6, 'Xe điều khiển', 1),
(7, 'Đồ chơi lắp ghép', 1),
(8, 'Đồ chơi mô phỏng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `paymentStatus` tinyint(1) NOT NULL,
  `paymentMethod` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `createdDate`, `receivedDate`, `status`, `paymentStatus`, `paymentMethod`) VALUES
(46, 59, '2016-03-22', NULL, 'processing', 0, 'cod'),
(47, 59, '2016-03-22', NULL, 'processing', 0, 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `productId`, `qty`, `productPrice`, `productName`, `productImage`) VALUES
(42, 46, 22, 1, '3199000', 'Trụ Sở Nghiên Cứu NASA Mặt Trăng', '60350_1_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `originalPrice` decimal(10,0) NOT NULL,
  `promotionPrice` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `cateId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `soldCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `originalPrice`, `promotionPrice`, `image`, `createdBy`, `createdDate`, `cateId`, `qty`, `des`, `status`, `soldCount`) VALUES
(21, 'Xe điều khiển 1:24 Ferrari FXXK Evo', '335000', '335000', 'R79300_1.jpg', 59, '2022-03-08', 6, 10, 'Xe điều khiển Ferrari FXXK Evo R79300 của thương hiệu RASTAR, được mua bản quyền và mô phỏng lại chính xác với tỷ lệ thu nhỏ 1:24. Sở hữu thiết kế chân thực như một chiếc xe ngoài đời thật, sản phẩm không chỉ là món đồ chơi giải trí sau những giờ học tập mệt mỏi mà còn giúp bé có thêm kiến thức về các loại phương tiện giao thông.', 1, 1),
(22, 'Trụ Sở Nghiên Cứu NASA Mặt Trăng', '3199000', '3199000', '60350_1_.jpg', 59, '2022-03-11', 7, 9, 'Hãy hạ cánh tàu đổ bộ mặt trăng để có những cuộc phiêu lưu tuyệt vời tại Trụ Sở Nghiên Cứu NASA Mặt Trăng. Tời và di chuyển các vật thể bằng máy bay không người lái, lấy mẫu từ máy bay VIPER và thực hiện các thí nghiệm trong phòng thí nghiệm khoa học và thực vật học. Sau đó nhảy lên xe buggy mặt trăng và đi đến khóa không khí và chỗ ở, nơi bạn có thể cất mũ bảo hiểm và ba lô của mình cho đến nhiệm vụ tiếp theo!', 1, 0),
(23, 'Xe Ford® F-150 Raptor', '4899000', '4899000', '42126_1_.jpg', 59, '2022-03-11', 7, 10, 'Xe bán tải Ford® nổi tiếng về sức mạnh và chức năng của chúng. Giờ đây, bạn có thể sở hữu sự bản sao của chiếc xe này với bộ LEGO® Technic ™ Xe Ford® F-150 Raptor (42126). Tận hưởng thời gian chất lượng khi bạn khám phá các tính năng thực tế được thiết kế trong mô hình giống như thật này, gồm động cơ V6 với các piston chuyển động, cùng với hệ thống treo trên tất cả các bánh xe.', 1, 0),
(24, 'Trạm Cứu Hỏa Abrick', '999000', '999000', '003026_2_.jpg', 59, '2022-03-11', 8, 10, 'Trạm cứu hỏa Abrick ECOIFFIER 003026 là mô hình đồ chơi mô phỏng trạm cứu hỏa thực tế - một doanh trại hoàn chỉnh với đội ngũ lính cứu hỏa có trình độ cho tất cả các biện pháp can thiệp: trên không, trên đường … giúp dập tắt nhanh chóng vụ hỏa hoạn, đem đến bình yên cho người dân. Thông qua đồ chơi mô phỏng giúp trẻ em học cách hiểu thế giới xung quanh, rèn luyện những kỹ năng cần thiết cho cuộc sống và độc lập hơn mỗi ngày.', 1, 0),
(25, 'Đồ chơi bé làm bác sĩ', '879000', '879000', 'bx1230z-mykingdom.jpg', 59, '2022-03-11', 8, 10, 'Đồ chơi B.BRAND bé làm bác sĩ BX1230Z là đồ chơi hàng đầu tại Canada, sử dụng công nghệ tiên tiến giúp bé có thể vừa vui chơi vừa làm quen với các hoạt động gần gũi với thế giới quan. Các sản phẩm đồ chơi B.Brand đều có một giá trị nhất định về giáo dục, phát triển kỹ năng vận động, tư duy logic, sự sáng tạo qua các dòng sản phẩm đồ chơi của hãng.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `captcha` varchar(50) NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(10) NOT NULL,
  `image` varchar(30)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--  
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `dob`, `address`, `password`, `roleId`, `status`, `captcha`, `isConfirmed`, `phone`, `image`) VALUES
(59, '', 'sangnguyen.030202@gmail.com', '2022-03-08', 'Vietnam', '123', 1, 1, '930819', 1, '123456','');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`),
  ADD KEY `product_id` (`productId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`orderId`),
  ADD KEY `product_id` (`productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cateId`),
  ADD KEY `createdBy` (`createdBy`);
ALTER TABLE `products` ADD FULLTEXT KEY `name` (`name`,`des`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
