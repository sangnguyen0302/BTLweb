<?php require_once '../views/inc/head.php'; ?>
<title>Quản trị thành viên</title>
</head>
<body>
	<?php require_once '../views/inc/sidebar.php' ?>
	<main style="margin-left: 220px" class="p-3">
		<div class="container-fluid my-5 bg-light py-3">
			<h4>User page</h4>
			<div class="table-responsive-lg">
			<table class="table table-hover">
				<?php 
					$count=0;
				?>
				<thead class="text-center align-middle">
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
				</thead>

				<tbody class="text-center align-middle">
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
				</tbody>
			</table>
			</div>
		</div>
	</main>

</body>
</html>