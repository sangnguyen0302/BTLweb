<?php  require dirname(dirname(dirname(__FILE__))) . '/inc/head.php'; ?> 
<title>Đăng ký</title>
</head>
<body>
    <?php require dirname(dirname(dirname(__FILE__))) . '/inc/header.php'; ?>
    <?php require dirname(dirname(dirname(__FILE__))) . '/inc/nav.php'; ?>
    <div class="login">
        <div class="login-triangle"></div>
        <h2 class="login-header">Đăng ký</h2>
    
    <form action="../controllers/loginController.php" method="post" class="login-container">
      <p><input type="text" placeholder="Họ tên" name="fullName" required></p>
      <p><input type="email" placeholder="Email" name="email" required></p>

      <p><input type="text" placeholder="Số điện thoại" name="phone" required></p>
      
      <p><input type="date" name="dob" required></p>
      <p><input type="text" placeholder="Địa chỉ" name="address" required></p>
      <p><input type="password" id="password" placeholder="Mật khẩu" name="password" required></p>
      <p><input type="password" placeholder="Nhập lại mật khẩu" name="repassword" required oninput="check(this)"></p>
      <p><input type="submit" name="RegisterAction" value="Sign up!"></p>
</form>
    </div>

    <div class="footer">
        this is footer
    </div>
    <script language='javascript' type='text/javascript'>
      function check(input) {
            if (input.value != document.getElementById('password').value) {
                input.setCustomValidity('Password Must be Matching.');
            }else{
                input.setCustomValidity('');
            }
      }
</script>
</body>
</html>