<?php
	require_once '../views/inc/head.php'
?>
<title>Đơn hàng của tôi</title>
</head>
<body>
	<?php require_once '../views/inc/nav.php' ?>
	<div class="container-fluid mb-5 py-5">
	<div class="container mb-5 p-3 bg-light">
		<h4>Đơn hàng của tôi</h4>
		
			<?php

				if(count($list)>0){  
					$count=0;
					$total=0;
			?>
			<div class="table-responsive-xxl">
			<table id = "order_table" class="table table-hover">
			<thead class="text-center align-middle">
			<tr>
				<th>STT</th>
				<th>Mã đơn hàng</th>
				<th>Ngày đặt hàng</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Ngày giao dự kiến</th>
				<th>Tình trạng đơn hàng</th>
				<th>Thao tác</th>						
			</tr>
			</thead>

			<tbody class="text-center align-middle">
				<?php foreach ($list as $key => $value) {
            		$total += $value['productPrice'] * $value['qty'];
        		?>
        		<tr>
            		<td><?php echo ++$count; ?></td>
            		<td><?php echo $value['id']; ?></td>
            		<td><?php echo $value['createdDate']; ?></td>
            		<td><?php echo $value['productName']; ?></td>
            		<td><?php echo $value['qty']; ?></td>
            		<td><?php echo number_format($value['productPrice'], 0, '', ','); ?>VND</td>
            		<td><?php echo $value['receivedDate']; ?></td>
            		<td><?php echo $value['status']; ?></td>
            		<td><a href="../controllers/orderController.php?action=removeProduct&id=<?php echo $value['productId']?>">Bỏ đơn hàng</a>
            		<br>
            		<a href="../controllers/orderController.php?action=viewDetail&id=<?php echo $value['productId']?>">Chi tiết sản phẩm</a></td>                 
        		</tr>
        		<?php }
        		?>

				<tr>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td></td>
            		<td>Tổng tiền</td>
            		<td><?= number_format($total, 0, '', ',') ?>VND</td>
        		</tr>
			</tbody>
	</table>
	</div>

	<div class="text-end">
		<a class="btn btn-warning"href="../views/home.php">Tiếp tục mua hàng</a>
	</div>
	
	
	<?php  
		}else{
		?> 
				<div class="text-center">
					<img src="../../image/mascot2x.png" alt="..">
					<h6>Bạn không có đơn hàng nào</h6>
					<a class="btn btn-warning"href="../views/home.php">Đi mua sắm</a>
				</div>
	<?php
		}
	?>
		
	</div>
	</div>


	<?php require_once '../views/inc/footer.php' ?>
</body>
</html>
