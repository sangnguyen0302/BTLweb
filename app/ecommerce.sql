-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220611.3e6b0abbe2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 15, 2022 lúc 07:21 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT DELAYED INTO `categories` (`id`, `name`, `status`) VALUES
(6, 'Xe điều khiển', 1),
(7, 'Đồ chơi lắp ghép', 1),
(8, 'Đồ chơi mô phỏng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `productName` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `productPrice` int(20) NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT DELAYED INTO `products` (`id`, `name`, `originalPrice`, `promotionPrice`, `image`, `createdBy`, `createdDate`, `cateId`, `qty`, `des`, `status`, `soldCount`) VALUES
(21, 'Xe điều khiển 1:24 Ferrari FXXK Evo', '335000', '335000', 'R79300_1.jpg', 59, '2022-03-08', 6, 10, 'Ferrari FXXK Evo R79300 driver by RASTAR brand, licensed and accurately reproduced with 1:24 scale down. Possessing a leg design like a real-life vehicle, the product is not only an entertaining toy after hours of tiring study but also helps children gain more knowledge about various types of media.', 1, 1),
(22, 'Trụ Sở Nghiên Cứu NASA Mặt Trăng', '3199000', '3199000', '60350_1_.jpg', 59, '2022-03-11', 7, 9, 'Hãy hạ cánh tàu đổ bộ mặt trăng để có những cuộc phiêu lưu tuyệt vời tại Trụ Sở Nghiên Cứu NASA Mặt Trăng. Tời và di chuyển các vật thể bằng máy bay không người lái, lấy mẫu từ máy bay VIPER và thực hiện các thí nghiệm trong phòng thí nghiệm khoa học và thực vật học. Sau đó nhảy lên xe buggy mặt trăng và đi đến khóa không khí và chỗ ở, nơi bạn có thể cất mũ bảo hiểm và ba lô của mình cho đến nhiệm vụ tiếp theo!', 1, 0),
(23, 'Xe Ford® F-150 Raptor', '4899000', '4899000', '42126_1_.jpg', 59, '2022-03-11', 7, 10, 'Xe bán tải Ford® nổi tiếng về sức mạnh và chức năng của chúng. Giờ đây, bạn có thể sở hữu sự bản sao của chiếc xe này với bộ LEGO® Technic ™ Xe Ford® F-150 Raptor (42126). Tận hưởng thời gian chất lượng khi bạn khám phá các tính năng thực tế được thiết kế trong mô hình giống như thật này, gồm động cơ V6 với các piston chuyển động, cùng với hệ thống treo trên tất cả các bánh xe.', 1, 0),
<<<<<<< HEAD
(24, 'Trạm Cứu Hỏa Abrick', '1000000', '1100000', '003026_2_.jpg', 59, '2022-06-10', 7, 20, 'Abrick ECOIFFIER 003026 Fire Station is a realistic fire station simulation toy model - a barracks complete with a team of qualified firefighters for all interventions: air, road… help put out quickly extinguish the fire, bringing peace to the people. Through simulation toys, children learn to understand the world around them, practice the skills they need for life, and be more independent every day.', 1, 2),
(28, 'Đồ chơi bé làm bác sĩ', '879000', '879000','bx1230z-mykingdom.jpg', 59, '2022-06-11', 6, 1, 'nice', 1, 0),
(1,'Xe cứu hộ bãi biển RAM 2500 với nhân viên và ván chèo đứng','2199000','1979000','bru02506-tiki-th.jpg',59,'2022-06-15',7,9,'Xe cứu hộ bãi biển RAM 2500 với nhân viên và ván chèo đứng BRU02506 là một trong những sản phẩm cao cấp đến từ thương hiệu đồ chơi Bruder. Sự mạnh mẽ và khả năng di chuyển trên mọi địa hình của RAM là huyền thoại và vẫn là độc nhất cho đến ngày nay. Đây là một mẫu xe không thể thiếu cho các hoạt động trên bãi biển, thể thao dưới nước,... Hơn thế nữa, mô hình này đã thể hiện rõ phương châm của Bruder – mang lại chức năng giống ngoài đời thật để các bé có thể làm quen và nhận biết. Các bé hãy cùng nhau khám phá mẫu xe cứu hộ bãi biển cực thú vị này nhé!',1,0),
(2,'Trò chơi bắn tàu','199000','159000','b0995_1_.jpg',59,'2022-06-15',6,15,'Đồ chơi Hasbro Gaming trò chơi bắn tàu B0995 là bộ đồ chơi đòi hỏi sự khéo léo, tính toán và kiên trì của người chơi. Sản phẩm giúp hỗ trợ trí não bé phát triển cũng như hỗ trợ bé khéo léo, tập tính kiên trì khi chơi và tương tác với bạn bè, anh chị em hay bố mẹ.',1,0);
=======
(24, 'Abrick Fire Station', '1000000', '1100000', '003026_2_.jpg', 59, '2022-06-10', 7, 20, 'Miêu tả...', 1, 2);
>>>>>>> Vinh

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT DELAYED INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT DELAYED INTO `users` (`id`, `fullName`, `email`, `dob`, `address`, `password`, `roleId`, `status`, `captcha`, `isConfirmed`, `phone`,`image`) VALUES
(59, 'Nguyễn Tuấn Vinh', 'nguyentuanvinh1222@gmail.com', '2022-06-12', '276/1, Đường Tỉnh Lộ 827B', '12345', 2, 1, '930819', 1, '0793191854',''),
(64, 'admin1', 'superAdmin@gmail.com', '2022-06-13', 'Trái Đất', '101001', 1, 1, '101001', 1, '0987654321','');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`userId`),
  ADD KEY `product_id` (`productId`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`userId`),
  ADD KEY `product_id` (`productId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cateId`),
  ADD KEY `createdBy` (`createdBy`);
ALTER TABLE `products` ADD FULLTEXT KEY `name` (`name`,`des`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`roleId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*j do*/

