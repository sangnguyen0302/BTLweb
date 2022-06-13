<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<form action="../controllers/productMnController.php" method="post">
		<p>Id của sản phẩm <input type="text" name="id" value="<?php echo $listInfor['id'] ?>" readonly></p>
		<p><?php echo $listInfor['name'] ?> đổi thành<input type="text" placeholder="Tên sản phẩm" name="name"></p>
		<p><?php echo $listInfor['originalPrice'] ?> đổi thành<input type="text" placeholder="Giá gốc" name="originalPrice"></p>

		<p><?php echo $listInfor['promotionPrice'] ?> đổi thành<input type="text" placeholder="Giá bán" name="promotionPrice"></p>

		<p><?php echo $listInfor['createdDate'] ?> đổi thành<input type="date" name="createdDate"></p>
		<p><?php echo $listInfor['cateId'] ?> đổi thành<input type="text" placeholder="Loại hàng" name="cateId"></p>
		<p><?php echo $listInfor['qty'] ?> đổi thành<input type="text" placeholder="Số lượng" name="qty"></p>
		<p><?php echo $listInfor['des'] ?> đổi thành</p><textarea name="des" cols="100" rows="20">Miêu tả...</textarea>
		<p><?php echo $listInfor['status'] ?> đổi thành<input type="text" placeholder="Trạng thái" name="status"></p>
		<p><?php echo $listInfor['soldCount'] ?> đổi thành<input type="text" placeholder="Số lượng đã bán" name="soldCount"></p>
		<p><input type="submit" name="edit" value="Confirm"></p>
</form>

</body>
</html>