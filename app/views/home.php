<?php 
    session_start();
    require_once("inc/head.php");
    require_once("../DB.php");
 ?>


<body>
    <div class="header">
        this is header
    </div>
    <?php 
if(isset($_GET['logout'])){
    unset($_SESSION['user_id']);
    session_destroy();
    header("Location: ../views/login.php");
}
if(!isset($_SESSION['user_id'])){
    ?>
    <form action="../controllers/loginController.php" method= "post">
    <input type="submit" name="Login" value="Log in">
    <input type="submit" name="Regist" value="Sign up">
    </form>
    <?php
}
else{
    ?>
    <div class="pro_container">
    <div class="profile">
        <?php 
            $sql="SELECT * FROM users WHERE id=".$_SESSION['user_id'];
            $db = new DB();

		    $user = $db->getInstance();
            $result = mysqli_query($user->con, $sql);
            if($result){
                $fetch=$result->fetch_assoc();
                if($fetch['image']==''){
                    echo '<img src="../../image/default-avatar.png">';
                }else{
                    echo '<img src="../../upload_image/'.$fetch['image'].'">';
                }
            
            ?>
            <h3><?php echo $fetch['fullName'];?></h3>
        <a href="update_profile.php" class="btn">Chỉnh sửa </a>
        <a href="home.php?logout=<?=$_SESSION['user_id']?>" class="delete-btn">Đăng xuất</a>
        <?php }?>
    </div>
    </div>
    <?php
}
?>


</body>
</html>