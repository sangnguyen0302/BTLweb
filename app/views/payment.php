<?php  

	session_start();
	require_once 'inc/head.php';
?>

<title>Thanh toán</title>
</head>
<body>
	<?php
		require_once 'inc/nav.php';
	?>
		<div class="container my-5 p-3 pb-5">
			<div class="row justify-content-center">
			 <div class="col-xl-6 col-lg-8 bg-light p-4">

	<?php
		if($_SESSION['paymentMethod']=="digital_wallet"){
	?>
		
		<h3>Thanh toán qua MoMo</h3>

		<p>Momo: 01234567800</p>

		<p>Đơn hàng của bạn của bạn sẽ được chuyển đến sau 3 ngày kể từ ngày thanh toán</p>
		<p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !</p>
		<a class="btn btn-primary" href="../controllers/orderController.php?action=confirmPayment">Hoàn tất thanh toán</a>
		<a class="btn btn-danger" href="../controllers/orderController.php?action=canclePayment">Hủy thanh toán</a>
	<?php
		}else if($_SESSION['paymentMethod']=="banking"){
	?>
		<h3>Chuyển khoản</h3>
		<p>Ngân hàng: OCB</p>
		<p>Số tài khoản: 1212000010100000230213</p>
		<p>Đơn hàng của bạn của bạn sẽ được chuyển đến sau 3 ngày kể từ ngày thanh toán</p>
		<p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !</p>
		<a class="btn btn-primary" href="../controllers/orderController.php?action=confirmPayment">Hoàn  tất thanh toán</a>
		<a class="btn btn-danger" href="../controllers/orderController.php?action=canclePayment">Hủy thanh toán</a>
	<?php
		}else{
	?>
		<h3> Thanh toán khi nhận hàng</h3>
		<p>Đơn hàng của bạn của bạn sẽ được chuyển đến sau 3 ngày kể từ ngày xác nhận. Hãy chuẩn bị đủ số tiền cần để thanh toán
			và luôn mang điện thoại bên mình.
		</p>
		<p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !</p>
		<a class="btn btn-primary" href="../controllers/orderController.php?action=confirmPayment">Xác nhận</a>
		<a class="btn btn-danger" href="../controllers/orderController.php?action=canclePayment">Hủy thanh toán</a>
	<?php
		}
	?>
	
	</div>
	</div>
	</div>
	<div class="pb-5">

	</div>
	<div class="pb-5">

	</div>
<?php require_once 'inc/footer.php' ; ?>
</body>
</html>
