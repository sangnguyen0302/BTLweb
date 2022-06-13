<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<h2>Product page</h2>
	<table>
		<?php 
			$count=0;
		?>
		<tr>
			<td>STT</td>
			<td>Id</td>
			<td>Tên sản phẩm</td>
			<td>Giá gốc</td>
			<td>Giá bán</td>
			<td>Ngày tạo</td>
			<td>Số lượng trong kho</td>
			<td>Mô tả</td>
			<td>Trạng thái</td>
			<td>Số lượng bán ra</td>
			<td>Thao tác</td>

		</tr>
		<?php 
			foreach ($productsList as $key => $value) {
        ?>
		<tr>
			
			<td><?php echo ++$count ?></td>
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['name']; ?></td>
			<td><?php echo $value['originalPrice']; ?></td>
			<td><?php echo $value['promotionPrice']; ?></td>
			<td><?php echo $value['createdDate']; ?></td>
			<td><?php echo $value['qty']; ?></td>
			<td><?php echo $value['des']; ?></td>
			<td><?php echo $value['status']; ?></td>
			<td><?php echo $value['soldCount']; ?></td>
			<td>
				<a href="../controllers/productMnController.php?action=editInfor&id=<?php echo $value['id'] ?>">Sửa thông tin</a><br>
				<a href="../controllers/productMnController.php?action=remove&id=<?php echo $value['id'] ?>">Xóa</a>

			</td>

		</tr>

		<?php  
			}
		?>

	</table>
	<a href="../controllers/productMnController.php?action=add">Thêm sản phẩm</a>
</body>
</html>