<?php
	require_once '../views/inc/head.php'
?>
<title>Đơn hàng của tôi</title>
</head>
<body>
	<table id = "order_table">
		<?php

			if(count($list)>0){  
				$count=1;
				$total=0;
				$prev_orderId=$list['0']['id'];
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

			if($value['id']==$prev_orderId){

            	$total += $value['productPrice'] * $value['qty'];
        ?>
                <tr>
                	<?php 
                		if($count == 1){
                	?>
                	       <td><?php echo $count; ?></td>
                	<?php  
                		}else{
                	?>
                            <td></td>
                    <?php
                		}
                    ?>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['createdDate']; ?></td>
                <td><?php echo $value['productName']; ?></td>
                <td><?php echo $value['qty']; ?></td>
                <td><?php echo number_format($value['productPrice'], 0, '', ','); ?>VND</td>
                <td><?php echo $value['receivedDate']; ?></td>
                <td><?php echo $value['status']; ?></td>
                    <?php 
                    	if($value['status']=='processing'){
                     ?>
                            <td><a href="../controllers/orderController.php?action=removeProduct&id=<?php echo $value['productId']?>">Bỏ đơn hàng</a>
                            	<br>
                    <?php 
                		} 
                	?>
                <a href="../controllers/orderController.php?action=viewDetail&id=<?php echo $value['productId']?>">Chi tiết sản phẩm</a></td>

                </tr>
        <?php 
    		}
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
        <?php  
            if($value['id']!=$prev_orderId){
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
                <?php 
                	if($value['status']=='processing'){
                 ?>
                        <td><a href="../controllers/orderController.php?action=removeProduct&id=<?php echo $value['productId']?>">Bỏ đơn hàng</a>
                        	<br>
                <?php 
            		} 
            	?>
                    <a href="../controllers/orderController.php?action=viewDetail&id=<?php echo $value['productId']?>">Chi tiết sản phẩm</a></td>

                </tr>


        <?php    	
            }
        ?>
		
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
    <?php  
        }
    ?>


	<a href="../controllers/loginController.php?action=return">Tiếp tục mua hàng</a>
	
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
