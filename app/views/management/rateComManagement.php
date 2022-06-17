<?php 
    session_start();
    require_once('../views/inc/head.php');
 ?>
 <style>
	a {
		text-decoration : none;
	}
	a:hover {
		text-decoration : underline;
	}
</style>
<title>Thông tin tài khoản</title>
<link type="text/css" rel="stylesheet" href= "../../css/profile.css">
</head>
<body>
<?php require_once '../views/inc/sidebar.php'; ?>
<main style="margin-left: 220px" class="p-3">
	<div class="container-fluid my-5 bg-light py-3">
	<h1>BÌNH LUẬN VÀ ĐÁNH GIÁ</h1>

<p>Tổng số bình luận: <?php echo $sumComment ?></p>
<p>Tổng số đánh giá: <?php echo $sumRate ?></p>
<?php  
	if($sumComment==0 && $sumRate ==0){ ?>
		<div class="star-image text-center">
			<img src="../../image/star.jpg" alt="None-sao">
			<h4>
				Chưa có bình luận đánh giá
			</h4>
		</div>
		
<?php
	}else{

?>

		<div class="table-responsive-lg">
			<table class="table table-hover">
				<thead class="text-center align-middle">
	
				<tr>
					<td>STT</td>
					<td>Mã đơn hàng</td>
					<td>Mã thành viên</td>
					<td>Tên thành viên</td>
					<td>Mã sản phẩm</td>
					<td>Đánh giá</td>
					<td>Bình luận</td>
					<td>Thao tác</td>
				</tr>
				</thead>

				<tbody class="text-center align-middle">
					<?php  
						$count=0;
						foreach ($list as $value) {
					?>
						<tr>
						<td><?php echo ++$count ?></td>
						<td><?php echo $value['orderId'] ?></td>
						<td><?php echo $value['userId'] ?></td>
						<td><?php echo $value['userName'] ?></td>
						<td><?php echo $value['productId'] ?></td>
						<td><?php echo ($value['rate']==0)? 'Chưa đánh giá' : $value['rate'] ?></td>
						<td><?php echo ($value['comment']=='')? 'Chưa bình luận' : $value['comment'] ?></td>
						<td>
							<?php  
								if($value['rate']==0){
							?>
								<a class="text-danger" href="../controllers/rateCommentController.php?action=deleteComment&productId=<?php echo $value['productId'] ?>>&userId=<?php echo $value['userId'] ?>">Xóa bình luận</a>
							<?php  
								}else if($value['comment']==''){
							?>
								<a class="text-danger" href="../controllers/rateCommentController.php?action=deleteRate&productId=<?php echo $value['productId'] ?>>&userId=<?php echo $value['userId'] ?>">Xóa đánh giá</a>

							<?php  
								}else{
							?>

								<a class="text-danger" href="../controllers/rateCommentController.php?action=deleteComment&productId=<?php echo $value['productId'] ?>>&userId=<?php echo $value['userId'] ?>">Xóa bình luận</a>
								
								<a class="text-danger" href="../controllers/rateCommentController.php?action=deleteRate&productId=<?php echo $value['productId'] ?>>&userId=<?php echo $value['userId'] ?>">Xóa đánh giá</a>

							<?php  
								}
							?>
						</td>
						</tr>
					<?php  
						}
					?>
				</tbody>

			</table>
		</div>


<?php  
	}
?>
	</div>
</main>
	
</body>
</html>