<?php  

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thanh toán</title>
</head>
<body>
	<?php  
		if($_SESSION['paymentMethod']=="digital_wallet"){
	?>
		<h3>Thanh toán qua MoMo</h3>

		<p>Momo: 01234567800</p>

		<p>Đơn hàng của bạn của bạn sẽ được chuyển đến sau 3 ngày kể từ ngày thanh toán</p>
		<a href="../controllers/orderController.php?action=confirmPayment">Hoàn tất thanh toán</a>
	<?php
		}else if($_SESSION['paymentMethod']=="banking"){
	?>
		<h3>Chuyển khoản</h3>
		<p>Ngân hàng: OCB</p>
		<p>Só tài khoản: 1212000010100000230213</p>
		<p>Đơn hàng của bạn của bạn sẽ được chuyển đến sau 3 ngày kể từ ngày thanh toán</p>
		<a href="../controllers/orderController.php?action=confirmPayment">Hoàn  tất thanh toán</a>
	<?php
		}else{
	?>
		<h3> Thanh toán khi nhận hàng</h3>
		<p>Đơn hàng của bạn của bạn sẽ được chuyển đến sau 3 ngày kể từ ngày xác nhận. Hãy chuẩn bị đủ số tiền cần để thanh toán
			và luôn mang điện thoại bên mình.
		</p>

		<a href="../controllers/orderController.php?action=confirmPayment">Xác nhận</a>
	<?php
		}
	?>
	<p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi</p>

	<a href="../controllers/orderController.php?action=canclePayment">Hủy thanh toán</a>

	
</body>
</html>
