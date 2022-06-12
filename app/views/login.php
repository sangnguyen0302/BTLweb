
<?php
    session_start();
    
    if (isset($_SESSION['user_id'])) {
      header("Location: home.php");
    }
?>
<?php
require_once '../models/loginModel.php';

if(isset($_POST['LoginAction'])){
      $email=$_POST['email'];
      $password=$_POST['password'];
      $result = userCheckLogin($email,$password);
      if($result){
            $current_user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $current_user['ID'];
            header("Location: home.php");
      }else{
             $result=adminCheckLogin($email,$password);
             if($result){
                   $current_admin = mysqli_fetch_assoc($result);

                   $_SESSION['user_id'] = $current_admin['ID'];
                   header("Location: management.php");
             }else{
                   $message="Tài khoản hoặc mật khẩu không chính xác!";
             }

       }
}


?>
<?php  require dirname(__FILE__) . '/inc/head.php'; ?> 
<title>Đăng nhập</title>
</head>
<body>
<?php require dirname(__FILE__) . '/inc/header.php'; ?>
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
</form>
</div>
<!-- <?php require dirname(__FILE__) . '/inc/footer.php'; ?> -->
</body>


</html>


