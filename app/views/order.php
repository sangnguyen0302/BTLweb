<?php
	require_once '../views/inc/head.php';
	require_once '../DB.php';
	$db=new DB();
	$user= $db->getInstance();
?>
<title>Đơn hàng của tôi</title>
</head>
<body>
	<?php require_once '../views/inc/nav.php' ?>
	<div class="container-fluid mb-5 py-5">
	<div class="container mb-5 p-3">
		<h4>Đơn hàng của tôi</h4>
			<?php
				if(count($list)>0){  
					$total=0;
			?>
			
				<?php foreach ($list as $key => $value) {
					$count=0;
					?>
					<div class="table-responsive-xxl bg-light mb-5">
					<table id = "order_table" class="table table-hover">
						<thead class="text-center align-middle">
						<tr>
							<!--th>STT</th-->
							<th class="text-start">Sản phẩm</th>
							<th>Giá</th>
							<th>Số lượng</th>
							<th>Tạm tính</th>					
						</tr>
						</thead>

						<tbody class="text-center align-middle">
							<?php
            					$total = $value['totalPrice'];
								$orderId=$value['id'];
								$sql = "SELECT * FROM order_details WHERE orderId='$orderId'";
								$result=mysqli_query($user->con,$sql);
								while($value2=$result->fetch_assoc()){

									$productId=$value2['productId'];
									$sql="SELECT * FROM products WHERE id='$productId'";
									$result2 = mysqli_query($user->con, $sql);
									$prod = $result2->fetch_assoc(); 
							?>
						
							<tr>
						<!--td><,?php echo ++$count; ?></td-->
								<td class="text-start">
									<div>
										<div>
										<?php
											echo "<img src='../../image/".$prod['image']."' alt='Ảnh sản phẩm' width='100px' height='100px'>";
											echo "<span class='d-inline-block ms-3'>".$prod['name']."</span>";
										?>
										</div>
								
									<form class="d-inline-block">
										<input type="submit" name="write-cmt" value="Viết nhận xét">
									</form>

									<form class="d-inline-block">
										<input type="number" name="rate" value="">
										<input type="submit" name="write-cmt" value="Đánh giá">
									</form>
									</div>
								</td>
								<td><?php echo $prod['originalPrice']; ?></td>
								<td><?php echo $value2['productQty']; ?></td>
								<td><?php echo $prod['originalPrice']*$value2['productQty']; ?></td>              
							</tr>

							<?php
								}
							?>
						</tbody>

						<tfoot class="text-center align-middle">
						<tr>
            				<td></td>
            				<td></td>
            				<td>Tổng tiền</td>
            				<td class="text-danger fs-5"><?= number_format($value['totalPrice'], 0, '', ',') ?>VND</td>
        				</tr>
						</tfoot>
					</table>
					</div>
				<?php
				 }
        		?>
	
				 <div class="text-end">
				 <a class="btn btn-warning" href="../controllers/loginController.php?action=return">Tiếp tục mua hàng</a>
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
