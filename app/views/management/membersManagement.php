<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<h2>User page</h2>
	<table>
		<?php 
			$count=0;
		?>
		<tr>
			<td>STT</td>
			<td>Id</td>
			<td>Tên dầy đủ</td>
			<td>Email</td>
			<td>Ngày sinh</td>
			<td>Địa chỉ</td>
			<td>Mật khẩu</td>
			<td>Trạng thái</td>
			<td>Mã captcha</td>
			<td>Comfirmed?</td>
			<td>Số điện thoại</td>
			<td>Thao tác</td>

		</tr>
		<?php 
			foreach ($membersList as $key => $value) {
        ?>
		<tr>
			
			<td><?php echo ++$count ?></td>
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['fullName']; ?></td>
			<td><?php echo $value['email']; ?></td>
			<td><?php echo $value['dob']; ?></td>
			<td><?php echo $value['address']; ?></td>
			<td><?php echo $value['password']; ?></td>
			<td><?php echo $value['status']; ?></td>
			<td><?php echo $value['captcha']; ?></td>
			<td><?php echo $value['isConfirmed']; ?></td>
			<td><?php echo $value['phone']; ?></td>
			<td>
				<a href="../controllers/memMnController.php?action=editInfor&id=<?php echo $value['id'] ?>">Sửa thông tin</a><br>
				<a href="../controllers/memMnController.php?action=removeMem&id=<?php echo $value['id'] ?>">Xóa</a>

			</td>

		</tr>

		<?php  
			}
		?>

	</table>
</body>
</html>