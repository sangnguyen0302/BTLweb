
<?php   '/inc/head.php'; ?> 
<?php  require '../models/loginModel.php'; ?>
<?php
if(isset($_POST['RegisterAction']) && $_POST['RegisterAction']=="Đăng ký"){
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $checkEmail = checkEmail($email);
    if (!$checkEmail || !$checkPhone) {
       //header("Location: ../views/regist.php");
       $message='Người dùng đã tồn tại';
    }else{
        $result = insert($fullName, $email, $dob, $address, $password,$phone, $image);
        if($result) {
            $message='Đăng ký thành công';
        }else {
            $message="Đăng ký thất bại";
        }
    }

    
}
?>
<title>Đăng ký</title>
</head>
<body>
    <?php  '/inc/header.php'; ?>
    <?php  '/inc/nav.php'; ?>
    <div class="login">
        <div class="login-triangle"></div>
        <h2 class="login-header">Đăng ký</h2>
        <?php 
            if(isset($message)){
                echo'<div class="message">'.$message.'</div>';
            }
        ?>
    <form action="" class="login-container">
      <p><input type="text" placeholder="Họ tên" name="fullName" required></p>
      <p><input type="email" placeholder="Email" name="email" required></p>

      <p><input type="text" placeholder="Số điện thoại" name="phone" required></p>
      
      <p><input type="date" name="dob" required></p>
      <p><input type="text" placeholder="Địa chỉ" name="address" required></p>
      <p><input type="password" id="password" placeholder="Mật khẩu" name="password" required></p>
      <p><input type="password" placeholder="Nhập lại mật khẩu" name="repassword" required oninput="check(this)"></p>
      <p><input type="submit" name="RegisterAction" value="Đăng ký"></p>
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