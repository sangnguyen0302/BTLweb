
<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("location:home.php");
    }
?>
<?php  require dirname(__FILE__) . '/inc/head.php'; ?> 
<?php  require_once('inc/head.php'); ?> 
<title>Đăng nhập</title>
<?php
include_once '../models/loginModel.php';


if(isset($_POST['LoginAction']) && $_POST['LoginAction']=="Đăng nhập"){
      $email=$_POST['email'];
      $password=$_POST['password'];

      $result = userCheckLogin($email,$password);

      if($result){
            $current_user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $current_user['id'];
            header("Location: ../views/home.php");

      }else{
            $result=adminCheckLogin($email,$password);
            if($result){
                  $current_admin = mysqli_fetch_assoc($result);

                  $_SESSION['user_id'] = $current_admin['id'];
                  header("Location: ../views/management.php");
            }else{
                  $message="Tài khoản hoặc mật khẩu không chính xác!";
                  header("Location: ../views/login.php");

            }

      }
}
?>
</head>
<body>

<?php require dirname(__FILE__) . '/inc/nav.php'; ?>
<div class="login"> 
<div class="login-triangle"></div>
<h2 class="login-header">Đăng nhập </h2>
<form action="" method="post" class ="login-container">
      <?php 
            if(isset($message)){
                echo'<div class="message">'.$message.'</div>';
            }
        ?>
      <p><input type="email" placeholder="Email" name="email" required></p>
      <p><input type="password" placeholder="Mật khẩu" name="password" required></p>
      <p><input type="submit" name="LoginAction" value="Đăng nhập"></p>
      <p> Chưa có tài khoản? <a href="regist.php"> Đăng ký ngay</a></p>
</form>
</div>
</body>


</html>


