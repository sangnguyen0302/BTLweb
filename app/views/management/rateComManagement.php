<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<h1>BÌNH LUẬN VÀ ĐÁNH GIÁ</h1>

	<p>Tổng số bình luận: <?php echo $sumComment ?></p>
	<p>Tổng số đánh giá: <?php echo $sumRate ?></p>
	<?php  
		if($sumComment==0 && $sumRate ==0){
			echo "<h2>Chưa có gì hết</h2>";
		}else{

	?>
	<table>
		
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

		<?php  
			$count=0;
			foreach ($list as $key => $value) {
				
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
				<a href="../controllers/rateCommentController.php?action=deleteComment&productId=<?php echo $value['productId'] ?>>&userId=<?php echo $value['userId'] ?>">Xóa bình luận</a>
				<?php  
					}else if($value['comment']==''){
				?>
				<a href="../controllers/rateCommentController.php?action=deleteRate&productId=<?php echo $value['productId'] ?>>&userId=<?php echo $value['userId'] ?>">Xóa đánh giá</a>

				<?php  
					}else{

				?>

				<a href="../controllers/rateCommentController.php?action=deleteComment&productId=<?php echo $value['productId'] ?>>&userId=<?php echo $value['userId'] ?>">Xóa bình luận</a>
				<br>
				<a href="../controllers/rateCommentController.php?action=deleteRate&productId=<?php echo $value['productId'] ?>>&userId=<?php echo $value['userId'] ?>">Xóa đánh giá</a>

				<?php  
					}
				?>

			</td>

		</tr>
		<?php  
			}
		?>


	</table>

	<?php  
		}
	?>

</body>
</html>