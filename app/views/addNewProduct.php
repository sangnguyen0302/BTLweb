<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<form action="../controllers/productMnController.php" method="post">
		
		<p>Tên sản phẩm: <input type="text" placeholder="Tên sản phẩm" name="name"></p>
		<p>Giá gốc: <input type="text" placeholder="Giá gốc" name="originalPrice"></p>

		<p>Giá bán: <input type="text" placeholder="Giá bán" name="promotionPrice"></p>

		<p>Ngày tạo: <input type="date" name="createdDate"></p>
		<p>Loại hàng: <input type="text" placeholder="Loại hàng" name="cateId"></p>
		<p>Số lượng:<input type="text" placeholder="Số lượng" name="qty"></p>
		<p>Miêu tả:</p><textarea name="des" cols="100" rows="20">Miêu tả...</textarea>
		<p><input type="submit" name="add" value="Confirm"></p>

</form>

</body>
</html>
