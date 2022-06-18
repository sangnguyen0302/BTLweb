
<?php  require_once 'inc/head.php'; ?> 
<?php  require '../models/loginModel.php'; ?>
<?php
if(isset($_POST['RegisterAction']) && $_POST['RegisterAction']=="Đăng ký"){
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../../upload_image/'.$image;
    $checkEmail = checkEmail($email);
    $checkPhone = checkPhone($phone);
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){
        $message="Email không hợp lệ";
    }
    else if (!$checkEmail) {
       //header("Location: ../views/regist.php");
       $message='Người dùng đã tồn tại';
    } else if (!preg_match("/^0([0-9]){9}$/", $phone)){
        $message="Số điện thoại không hợp lệ";
    }else if(strlen($password)<6 || strlen($password>15)){
        $message="Mật khẩu không hợp lệ";
    }
    else{
        $result = insert($fullName, $email, $dob, $address, $password,$phone, $image);
        if($result) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message="Đăng ký thành công";
        }else {
            $message="Đăng ký thất bại";
        }
    }

    
}
?>
<title>Đăng ký</title>
</head>
<body>
    <?php require 'inc/nav.php'; ?>
    
<?php  require_once  'inc/head.php'; ?> 
<title>Đăng ký</title>
</head>
<body>
    <?php require_once  'inc/nav.php'; ?>
    <div class="container my-5">
    <div class="login">
        <div class="login-triangle"></div>
        <h2 class="login-header">Đăng ký</h2>
        
    
    <form action="" method="post" class="login-container" enctype="multipart/form-data">
        <?php 
            if(isset($message)){
                echo'<div class="message">'.$message.'</div>';
            }
        ?>
      <p><input type="text" placeholder="Họ tên" name="fullName" required></p>
      <p><input type="text" placeholder="Email" name="email" required></p>
      <p><input type="text" placeholder="Số điện thoại từ 6 ký tự tới 15 ký tự" name="phone" required></p>
      <p><input type="date" name="dob" required></p>
      <p><input type="text" placeholder="Địa chỉ" name="address" required></p>
      <p><input type="password" id="password" placeholder="Mật khẩu" name="password" required></p>
      <p><input type="password" placeholder="Nhập lại mật khẩu" name="repassword" required oninput="check(this)"></p>
      <p><input type="file" name="image" accept="image/jpg, image/jpeg, image/png"></p>
      <p><input type="submit" name="RegisterAction" value="Đăng ký"></p>
      <p> Đã có tài khoản? <a href="login.php"> Đăng nhập ngay</a></p>
</form>
    </div>
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
    <?php require 'inc/footer.php'; ?>
</body>
</html>