<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>
</head>
<body>
    <div class="header">
        this is header
    </div>
    
<form action="../controllers/loginController.php" method="post">
      <p><input type="text" placeholder="Họ tên" name="fullName" required></p>
      <p><input type="email" placeholder="Email" name="email" required></p>

      <p><input type="text" placeholder="Số điện thoại" name="phone" required></p>
      
      <p><input type="date" name="dob" required></p>
      <p><input type="text" placeholder="Địa chỉ" name="address" required></p>
      <p><input type="password" id="password" placeholder="Mật khẩu" name="password" required></p>
      <p><input type="password" placeholder="Nhập lại mật khẩu" name="repassword" required oninput="check(this)"></p>
      <p><input type="submit" name="RegisterAction" value="Sign up!"></p>
</form>
<script language='javascript' type='text/javascript'>
      function check(input) {
            if (input.value != document.getElementById('password').value) {
                input.setCustomValidity('Password Must be Matching.');
            }else{
                input.setCustomValidity('');
            }
      }
</script>
    <div class="footer">
        this is footer
    </div>
</body>
</html>