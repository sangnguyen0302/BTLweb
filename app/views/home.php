<?php require_once("inc/head.php"); ?>
<body>
    <?php require_once("inc/nav.php"); ?>
    <form action="../controllers/loginController.php" method= "post">
        <input type="submit" name="Login" value="Log in">
        <input type="submit" name="Regist" value="Sign up">
    </form>

    <?php require_once("inc/footer.php"); ?>
</body>
</html>