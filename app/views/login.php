
<?php
    session_start();
    
    if (isset($_SESSION['user_id'])) {
      header("Location: home.php");
    }
?>
<?php  require_once('inc/head.php'); ?> 
<title>Đăng nhập</title>
<?php
require_once '../models/loginModel.php';

if(isset($_POST['LoginAction'])){
      
      $email=$_POST['email'];
      $password=$_POST['password'];

      $result = userCheckLogin($email,$password);
      if($result){
            $current_user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $current_user['id'];
            $_SESSION['user_name'] = $current_user['fullName'];
            header("Location: home.php");
            

      }//else{
      //       $result=adminCheckLogin($email,$password);
      //       if($result){
      //             $current_admin = mysqli_fetch_assoc($result);

      //             $_SESSION['user_id'] = $current_admin['id'];
      //             //header("Location: management.php");
      //       }else{
      //             $message="Tài khoản hoặc mật khẩu không chính xác!";
      //       }

      // }
}


?>

</head>
<body>

<?php require_once 'inc/nav.php'; ?>
<div class="container my-5">
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
</div>
<?php  require_once('inc/footer.php'); ?> 
</body>


</html>


