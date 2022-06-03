
<?php  require dirname(dirname(dirname(__FILE__))) . '/inc/head.php'; ?> 
<title>Đăng nhập</title>
</head>
<body>
<?php require dirname(dirname(dirname(__FILE__))) . '/inc/header.php'; ?>
<?php require dirname(dirname(dirname(__FILE__))) . '/inc/nav.php'; ?>
<div class="login"> 
<div class="login-triangle"></div>
<h2 class="login-header">Đăng nhập </h2>
<form action="../controllers/loginController.php" method="post" class ="login-container">
      <p><input type="email" placeholder="Email" name="email" required></p>
      <p><input type="password" placeholder="Mật khẩu" name="password" required></p>
      <p><input type="submit" name="LoginAction" value="Đăng nhập"></p>
</form>
</div>
<?php require dirname(dirname(dirname(__FILE__))) . '/inc/footer.php'; ?>
</body>


</html>


