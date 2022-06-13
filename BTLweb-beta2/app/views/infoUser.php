<?php 
    session_start();
    require_once("inc/head.php");
    require_once("../DB.php");
    require_once '../models/ProductModel.php';
 ?>
<?php
    if(isset($_GET['user_id'])){
        $user_id= $_GET['user_id'];
        $db = DB::getInstance();
        $sql = "SELECT * FROM users WHERE id=$user_id";
        $result = mysqli_query($db->con, $sql); 
        $value = $result->fetch_assoc();
        ?>
        <div class="page contact-us-page">
            <div class="container">
                <h3>Thông tin cá nhân</h3>
                <div class="card-body info">
                    <h4 class="card-title">Họ và tên: <?php echo $value['fullName'];?></h4>
                    <p class="card-text">Mã số tài khoản: <?php echo $value['id'];?></p>
                    <p class="card-text">Loại tài khoản: <?php 
                        if($value['roleId']){
                            echo "Khách hàng";
                        }else{
                            echo "Quản trị viên";
                        }
                        ?>
                   </p>
                    <button class="btn btn-primary btn-block" type="submit">Thay đổi</button>
                </div>
               
            </div>
    </div>
        <?php
    }
    

?>
