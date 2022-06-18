
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Cơ sở dữ liệu: `ecommerce`
--
DROP DATABASE IF EXISTS `ecommerce`;
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecommerce`;
-- DROP TABLE IF EXISTS `cart`;
-- DROP TABLE IF EXISTS `categories`;
-- DROP TABLE IF EXISTS `orders`;
-- DROP TABLE IF EXISTS `order_details`;
-- DROP TABLE IF EXISTS `products`;
-- DROP TABLE IF EXISTS `role`;
-- DROP TABLE IF EXISTS `users`;
-- --------------------------------------------------------


--
-- Đang đổ dữ liệu cho bảng `admin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quanty` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `totalPrice` int(20) NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL 
) ;


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `userId` int(11) ,
  `productId` int(11) NOT NULL,
  `productQty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ;

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
) ;


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ;


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
  `isConfirmed` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(10) NOT NULL,
  `image` varchar(50)
) ;


--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
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
  ADD KEY `order_id` (`orderId`),
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
-- AUTO_INCREMENT cho bảng `admin`
--

-- AUTO_INCREMENT cho bảng `categories`
--

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal');

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

INSERT INTO `users` (`id`, `fullName`, `email`, `dob`, `address`, `password`, `roleId`, `status`, `isConfirmed`, `phone`, `image`) VALUES
('1000', 'Thanh Sang', 'admin@gmail.com', '2022-06-12', '276/1, Đường Tỉnh Lộ 827B', 'sang123', 1, 1, 1, '0365840620', 'ic.jpg');

INSERT INTO `users` (`id`, `fullName`, `email`, `dob`, `address`, `password`, `roleId`, `status`, `isConfirmed`, `phone`,`image`) VALUES
('1001', 'Nguyễn Tuấn Vinh', 'nguyentuanvinh1222@gmail.com', '2022-06-12', '276/1, Đường Tỉnh Lộ 827B', '123456', 1, 1, 1, '0793191854','');

INSERT INTO `users` (`id`, `fullName`, `email`, `dob`, `address`, `password`, `roleId`, `status`, `isConfirmed`, `phone`,`image`) VALUES
('1002', 'Thanh Sang', 'sang@gmail.com', '2022-06-13', '276/1, Đường Tỉnh Lộ 827B', 'sang123', 2, 1, 1, '0345667789','');


--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(5001, 'Xe điều khiển', 1),
(5002, 'Đồ chơi lắp ghép', 1),
(5003, 'Đồ chơi mô phỏng', 1);

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `originalPrice`, `promotionPrice`, `image`, `createdBy`, `createdDate`, `cateId`, `qty`, `des`, `status`, `soldCount`) VALUES
(2001, 'Xe điều khiển 1:24 Ferrari FXXK Evo', '335000', '335000', 'R79300_1.jpg', 1000, '2022-03-08', 5001, 10, 'Xe điều khiển Ferrari FXXK Evo R79300 của thương hiệu RASTAR, được mua bản quyền và mô phỏng lại chính xác với tỷ lệ thu nhỏ 1:24. Sở hữu thiết kế chân thực như một chiếc xe ngoài đời thật, sản phẩm không chỉ là món đồ chơi giải trí sau những giờ học tập mệt mỏi mà còn giúp bé có thêm kiến thức về các loại phương tiện giao thông.', 1, 1),
(2002, 'Trụ Sở Nghiên Cứu NASA Mặt Trăng', '3199000', '3199000', '60350_1_.jpg', 1000, '2022-03-11', 5002, 9, 'Hãy hạ cánh tàu đổ bộ mặt trăng để có những cuộc phiêu lưu tuyệt vời tại Trụ Sở Nghiên Cứu NASA Mặt Trăng. Tời và di chuyển các vật thể bằng máy bay không người lái, lấy mẫu từ máy bay VIPER và thực hiện các thí nghiệm trong phòng thí nghiệm khoa học và thực vật học. Sau đó nhảy lên xe buggy mặt trăng và đi đến khóa không khí và chỗ ở, nơi bạn có thể cất mũ bảo hiểm và ba lô của mình cho đến nhiệm vụ tiếp theo!', 1, 0),
(2003, 'Xe Ford® F-150 Raptor', '4899000', '4899000', '42126_1_.jpg', 1000, '2022-03-11', 5003, 10, 'Xe bán tải Ford® nổi tiếng về sức mạnh và chức năng của chúng. Giờ đây, bạn có thể sở hữu sự bản sao của chiếc xe này với bộ LEGO® Technic ™ Xe Ford® F-150 Raptor (42126). Tận hưởng thời gian chất lượng khi bạn khám phá các tính năng thực tế được thiết kế trong mô hình giống như thật này, gồm động cơ V6 với các piston chuyển động, cùng với hệ thống treo trên tất cả các bánh xe.', 1, 0),
(2004, 'Trạm Cứu Hỏa Abrick', '1100000', '1100000', '003026_2_.jpg', 1000, '2022-06-10', 5003, 20, 'Abrick ECOIFFIER 003026 Fire Station is a realistic fire station simulation toy model - a barracks complete with a team of qualified firefighters for all interventions: air, road… help put out quickly extinguish the fire, bringing peace to the people. Through simulation toys, children learn to understand the world around them, practice the skills they need for life, and be more independent every day.', 1, 2),
(2005, 'Bộ lắp ráp bãi biển vui nhộn', '1400000', '1400000', 'Jr_123452.png', 1000, '2022-06-18', 5002, 20, 'Mùa hè thường gắn liền với những hoạt động vui chơi trên bãi biển đầy ắp tiếng cười. Tại bãi biển, các bé có thể trải nghiệm biết bao những hoạt động vui chơi trên bờ - dưới nước. Các bé có thể cùng bạn bè tổ chức tắm hồ bơi, làm một cửa hàng pha chế nước, nằm trải dài trên biển để đắp cát, xây những ngôi nhà cát. Hãy cùng Hptrade lắp ráp hoàn chỉnh Bộ lắp ráp Bãi biển vui nhộn cùng bạn bè.
', 1, 2),
(2006, 'Bộ lắp ráp robot siêu nhân', '900000', '900000', 'ask_a123231.png', 1000, '2022-06-10', 5002, 30, 'Bộ đồ chơi lắp ráp robot siêu nhân là người bạn cùng vui chơi mỗi ngày với bé thông qua việc lắp ráp và hóa thân vào các nhân vật trong mỗi sản phẩm. Đồ chơi thương hiệu Banbao có 20 dòng sản phẩm khác nhau với hơn 130 sản phẩm, chất liệu an toàn và những mẫu mã tính năng thông minh sẽ giúp bé vui chơi và phát triển những kĩ năng khám phá, vận động và thỏa sức sáng tạo.
', 1, 10),
(2007, 'Xe tăng điều khiển từ xa mini chính hãng Henglong M26 Pershing sóng 2.4Ghz', '1500000', '1500000', 'xetang_1231.png', 1000, '2022-06-10', 5001, 30, 'Xe tăng điều khiển từ xa Heng Long M26 Pershing là mẫu mini tank chính hãng vừa ra mắt của Henglong - thương hiệu xe tăng điều khiển từ xa đình đám trên thế giới với những sản phẩm có giá lên đến vài chục triệu đồng. M26 Pershing cùng M4A3 là mẫu xe tăng mini được phát triển riêng ở phân khúc giá bình dân, nhằm phổ cập xe tăng điều khiển đến mọi người chơi.', 1, 10);


--
-- Đang đổ dữ liệu cho bảng `orderDetail`
--



--
-- Đang đổ dữ liệu cho bảng `users`
--


--
-- Đang đổ dữ liệu cho bảng `role`
--


INSERT INTO `orders` (`id`,  `userId` ,  `createdDate` ,  `totalPrice` ,  `receivedDate`,  `status`
) VALUES (4001,'1002', '2022-03-10','10267000','2022-03-15', 'processing'),
(4002,'1002', '2022-03-10','9798000','2022-03-15', 'processing');

INSERT INTO `order_details` ( `orderId` ,  `userId` ,  `productId` ,  `productQty`,  `rate` ,  `comment`
) VALUES (4001, '1002', '2001', '2', '4', 'OK') ,
 (4001, '1002', '2002', '3', '4', 'OK1') ,
 (4002, '1002', '2003', '2', '5', 'OK2') ;


--
-- Đang đổ dữ liệu cho bảng `cart`
--
INSERT INTO `cart`(`userId`,`productId`,`quanty`) VALUES
            ('1002','2002','1');

-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`)  ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

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





