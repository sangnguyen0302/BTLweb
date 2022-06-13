<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<form action="../controllers/memMnController.php" method="post">
		<p>Id của thành viên <input type="text" name="id" value="<?php echo $listInfor['id'] ?>" readonly></p>
		<p><?php echo $listInfor['fullName'] ?> đổi thành<input type="text" placeholder="Họ tên" name="fullName"></p>
		<p><?php echo $listInfor['email'] ?> đổi thành<input type="email" placeholder="Email" name="email"></p>

		<p><?php echo $listInfor['phone'] ?> đổi thành<input type="text" placeholder="Số điện thoại" name="phone"></p>

		<p><?php echo $listInfor['dob'] ?> đổi thành<input type="date" name="dob"></p>
		<p><?php echo $listInfor['address'] ?> đổi thành<input type="text" placeholder="Địa chỉ" name="address"></p>
		<p><?php echo $listInfor['password'] ?> đổi thành<input type="password" id="password" placeholder="Mật khẩu" name="password"></p>
		<p><input type="submit" name="edit" value="Confirm"></p>
</form>

</body>
</html>