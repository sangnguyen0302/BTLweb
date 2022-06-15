<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<table id = "order_table">
		<?php

			if(count($list)>0){  
				$count=0;
				$total=0;
		?>
		<tr>
			<tr>STT</tr>
			<tr>Mã đơn hàng</tr>
			<tr>Ngày đặt hàng</tr>
			<tr>Tên sản phẩm</tr>
			<tr>Số lượng</tr>
			<tr>Giá</tr>
			<tr>Ngày giao dự kiến</tr>
			<tr>Tình trạng đơn hàng</tr>
			<tr>Thao tác</tr>						
		</tr>

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
		
	</table>



	<a href="../controllers/loginController.php?action=return">Tiếp tục mua hàng</a>
	
	<?php  
		}else{ 
			echo "<h3>Bạn chưa đặt hàng</h3>";
		}
	?>
</body>
</html>
