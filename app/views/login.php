<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>
</head>
<body>

<?php require APP_ROOT . '/inc/head.php'; ?> 
<div class="login"> 
<form action="../controllers/loginController.php" method="post">
      <p><input type="email" placeholder="Email" name="email" required></p>
      <p><input type="password" placeholder="Mật khẩu" name="password" required></p>

      <p><input type="submit" name="LoginAction" value="Login!"></p>
</form>
</div>

<?php require APP_ROOT . '/inc/footer.php'; ?>
</body>
</html>


