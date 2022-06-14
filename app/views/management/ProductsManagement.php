<?php 
	require_once 'inc/head.php';
?>
<style>
	a {
		text-decoration : none;
	}
	a:hover {
		text-decoration : underline;
	}
</style>
<title>Quản trị sản phẩm</title>
</head>
<body>
	<div class="container my-5 bg-light py-3">
	<h4>Danh sách sản phẩm</h4>
	<div class="table-responsive">
	<table class="table table-hover">
		<?php 
			$count=0;
		?>
		<thead class="text-center align-middle">
		<tr>
			<td>STT</td>
			<!--td>Id</td-->
			<td>Tên sản phẩm</td>
			<td>Giá gốc</td>
			<td>Giá bán</td>
			<td>Ngày tạo</td>
			<td>Tồn kho</td>
			<!--td>Mô tả</td-->
			<!--td>Trạng thái</td-->
			<td>Đã bán</td>
			<td>Thao tác</td>

		</tr>
		</thead>

		<tbody class="text-center align-middle">
		<?php 
			foreach ($productsList as $key => $value) {
        ?>
		<tr>
			
			<td><?php echo ++$count ?></td>
			<!--td><,?php echo $value['id']; ?></td-->
			<td class="text-start">
				<img src="../../image/<?= $value['image'] ?>" alt="." width="50px" height="50px">
				<?php echo $value['name']; ?>
			</td>
			<td><?php echo $value['originalPrice']; ?></td>
			<td><?php echo $value['promotionPrice']; ?></td>
			<td><?php echo $value['createdDate']; ?></td>
			<td><?php echo $value['qty']; ?></td>
			<!--td><,?php echo $value['des']; ?></td-->
			<!--td><,?php echo $value['status']; ?></td-->
			<td><?php echo $value['soldCount']; ?></td>
			<td>
				<a href="../controllers/productMnController.php?action=editInfor&id=<?php echo $value['id'] ?>">Sửa thông tin</a><br>
				<a class="text-danger" href="../controllers/productMnController.php?action=remove&id=<?php echo $value['id'] ?>">Xóa</a>
			</td>

		</tr>

		<?php  
			}
		?>
		</tbody>


	</table>
	</div>

	<div class="text-end">
	<a class="btn btn-primary text-decoration-none" href="../controllers/productMnController.php?action=add">Thêm sản phẩm</a>
	</div>
	
	</div>
	
</body>
</html>