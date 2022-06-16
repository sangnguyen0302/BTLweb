<?php 
    session_start();
    require_once("inc/head.php");
    require_once("../DB.php");
    require_once '../models/ProductModel.php';
 ?>
<title>Thông tin tài khoản</title>
</head>
<?php
    if(isset($_GET['user_id'])){
        $user_id= $_GET['user_id'];
        $db = DB::getInstance();
        $sql = "SELECT * FROM users WHERE id='$user_id'";
        $result = mysqli_query($db->con, $sql); 
        if(!$result){
            echo mysqli_error($db->con);
        }
        $value = $result->fetch_assoc();
?>
<body>
    <div class="container my-5">
        <h3>Thông tin tài khoản</h3>
        <div class="container-fluid p-3 bg-light">
            <div class="row">
                <div class="col self-info">
                    <h6>Thông tin cá nhân</h6>
                    <div class="avatar">
                        <?php
                            if($value['image']==''){
                                echo '<img src="../../image/default-avatar.png" class="rounded-circle">';
                            }else{
                                echo '<img src="../../upload_image/'.$value['image'].'" class="rounded-circle">';
                            }
                        ?>
                        <form action="../controllers/infoController.php".$user_id method="POST" enctype="multipart/form-data">
                            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                            <input type="hidden" name="user-id" value=<?=$user_id?>>
                            <input class="btn btn-outline-secondary" type="submit" name="change-avt" value="Đổi ảnh đại diện">
                        </form>
                    </div>


                    
                </div>

            </div>
        </div>
    </div>
                
                    

                    <h4 class="card-title">Họ và tên: <?php echo $value['fullName'];?></h4>
                    <p class="card-text">Ngày sinh: 
                        <input type="date" value="<?=$value['dob']?>"/>
                        <p class="card-text">Địa chỉ: <?php echo $value['address'];?></p>
                        <!--p class="card-text">Mã số tài khoản: <,?php echo $value['id'];?></p-->
                        <p class="card-text">Số điện thoại: 
                        <input type="text" value="<?=$value['phone']?>"/>
                    <p class="card-text">Loại tài khoản: <?php 
                        if($value['roleId']){
                            echo "Khách hàng";
                        }else{
                            echo "Quản trị viên";
                        }
                        ?>
                   </p>

                    <button class="btn btn-primary btn-block" type="submit">Thay đổi</button>
                    </form> 
                    <form action="" method="get">
                        <input type="submit" name="change-pass" value="Đổi mật khẩu">
                        <input type="hidden" name="user_id" value="<?=$user_id?>">
                    </form>
                    <?php
                    $css="change_pass active";
                    if(isset($_GET['change-pass'])){
                        if(isset($_GET['submit-change-pass'])){
                            $id = $_GET['user_id'];
                            $sql="SELECT * FROM users WHERE id='$id'";
                            $result= mysqli_query($db->con, $sql);
                            $value=$result->fetch_assoc();
                            $new_pass=$_GET['new-pass'];
                            if($_GET['old-pass']!=$value['password']){
                                $message="Sai mật khẩu";
                            }else if($_GET['new-pass']!=$_GET['confirm-pass']){
                                $message="Mật khẩu xác nhận không khớp";
                            }else{
                                $sql = "UPDATE users SET password='$new_pass' WHERE id='$id'";
                                $result= mysqli_query($db->con, $sql);
                                if($result){
                                    echo "Change password success fully";
                                    $css="change_pass";
                                }else{
                                    echo mysqli_error($db->con);
                                }
                                
                            }
                        }
                        ?>
                        <!-- SỬA FORM ĐỔI MẬT KHẨU TRONG class change-pass -->
                        <div class="<?=$css?>">
                            <form action="?chage-pass='Đổi mật khẩu'" method="get" >
                            <?php
                                if(isset($message)){
                                    echo "<div class='message'>".$message.'</div>';
                                }
                            ?>
                            <input type="hidden" name="user_id" value="<?=$user_id?>">
                            <input type="hidden" name="change-pass" value="Đổi mật khẩu">
                            Nhập mật khẩu hiện tại: <br>
                            <input type="password" name="old-pass" placeholder="Nhập mật khẩu hiện tại"><br>
                            Nhập mật khẩu mới: <br>
                            <input type="password" name="new-pass" placeholder="Nhập mật khẩu mới"><br>
                            Nhập lại mật khẩu mới: <br>
                            <input type="password" name="confirm-pass" placeholder="Nhập lại mật khẩu mới"><br>
                            <input type="submit" name="submit-change-pass" value="Xác nhận">
                            </form>
                        </div>
                        <?php
                    }
                   
                    ?>
                
               
            </div>
    </div>
        <?php
    }
?>  
        </div>


</body>
</html>

