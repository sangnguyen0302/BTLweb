<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<form action="../controllers/productMnController.php" method="post">

		<p>Đánh giá của bạn</p>
		<input type="radio" name="rateValue" value="1">
        <lable>1</label><br>

        <input type="radio" name="rateValue" value="2">
        <label>2</label><br>

        <input type="radio" name="rateValue" value="3">
        <label>3</label><br>

        <input type="radio" name="rateValue" value="4">
        <label>4</label><br>

        <input type="radio" name="rateValue" checked value="5">
        <label>5</label><br>

      	<!-- <p><input type="text" placeholder="Bình luận" name="comment" required></p> -->
      	<p>Bình luận của bạn</p>
      	<textarea name="user_comment" cols="100" rows="5" placeholder="Bình luận" required></textarea>

      	<p><input type="submit" name="Rate" value="Confirm"></p>
	</form>

</body>
</html>