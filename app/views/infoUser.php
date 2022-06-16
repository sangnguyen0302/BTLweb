<?php 
    session_start();
    require_once("inc/head.php");
    require_once("../DB.php");
    require_once '../models/ProductModel.php';
 ?>
<link type="text/css" rel="stylesheet" href= "../../css/profile.css">
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
    <?php require_once 'inc/nav.php'; ?>
    <div class="container my-5 px-5">
        <h3>Thông tin tài khoản</h3>
        <div class="container-fluid px-3 bg-light">
            <div class="row">
                <div class="col-md-6 self-info border border-2 border-start-0 border-top-0 border-bottom-0 py-3">
                    <h5>Thông tin cá nhân</h5>
                    <div class="avatar text-center">
                        <?php
                            if($value['image']==''){
                                echo '<img src="../../image/default-avatar.png" class="rounded-circle" width="200px" height="200px">';
                            }else{
                                echo '<img src="../../upload_image/'.$value['image'].'" class="rounded-circle" width="200px" height="200px">';
                            }
                        ?>
                    </div>
                        <form action="../controllers/infoController.php".$user_id method="POST" enctype="multipart/form-data">
                            <div class="text-center my-3">
                            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                            </div>
                            <input type="hidden" name="user-id" value=<?=$user_id?>>
                            <!--input class="btn btn-outline-secondary" type="submit" name="change-avt" value="Đổi ảnh đại diện"-->

                            <div class="mb-3 fullName">
                                <label for="" class="input-label">Họ và tên</label>
                                <input type="text" name="fullname" id="fullname" value="<?= $value['fullName'] ?>">
                            </div>

                            <div class="mb-3 birthDate">
                                <label for="" class="input-label">Ngày sinh</label>
                                <input type="date" value="<?=$value['dob']?>"/>
                            </div>
                        
                            <div class="mb-3 address">
                                <label for="" class="input-label">Địa chỉ</label>
                                <input type="text" name="address" id="address" value="<?= $value['address'] ?>">
                            </div>
                        
                        <!--p class="card-text">Mã số tài khoản: <,?php echo $value['id'];?></p-->
                            <div class="mb-3 address">
                                <label for="" class="input-label"></label>
                                <button class="btn btn-primary" type="submit" name="change-avt">Lưu thay đổi</button>
                            </div>
                            
                        </form>
                        
                </div>

                <div class="col-md-6 self-contact py-3">
                    <div class="contact mb-5">
                    <h5>Thông tin liên hệ</h5>
                        <ul class="list-group">
                            <li class="phoneli">  
                                <div class="py-2 phone-num ms-4 d-flex">
                                    <div>
                                        <span>Số điện thoại</span> <br>
                                        <span><?=$value['phone']?></span>
                                    </div>
                                    <div class="text-end flex-fill">
                                        <a href="#" class="btn btn-outline-primary">Cập nhật</a>
                                    </div>
                                </div>
                                
                            </li>

                            <li class="emaili">
                                <div class="py-2 email d-inline-block ms-4 d-flex">
                                    <div>
                                        <span>Địa chỉ email</span> <br>
                                        <span><?=$value['email']?></span>
                                    </div>
                                    <div class="text-end flex-fill">
                                        <a href="#" class="btn btn-outline-primary">Cập nhật</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="security mb-5">
                    <h5>Bảo mật</h5>
                        <ul class="list-group">
                            <li class="lockli">
                            <div class="py-2 pwd d-inline-block ms-4 d-flex">
                                <div>
                                    <span>Thiết lập mật khẩu</span> 
                                </div>
                                <div class="text-end flex-fill">
                                        <a href="#" class="btn btn-outline-primary">Cập nhật</a>
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>

                    <div class="role mb-3">
                    <h5>Tư cách</h5>
                        <ul class="list-group">
                            <li class="roleli">
                            <div class="py-2 rol d-inline-block ms-4 d-flex">
                                <div>
                                    <span>  
                                    <?php
                                        if($value['roleId']== 1 ) {
                                            echo "Quản trị viên";
                                        } else {
                                            echo "Khách hàng";
                                        } ?>
                                    </span> 
                                </div>
                                <div class="text-end flex-fill">
                                        <a href="#" class="btn btn-outline-primary">Cập nhật</a>
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>
                    

                        <!--div class="mb-3">
                            <label for="">Loại tài khoản</label>
                            <select name="cateId" id="cateID">
				                <,?php
                                    if($value['roleId']== 1 ) {
                                ?>
                                <option value="1" selected>Quản trị viên</option>
                                <option value="2">Khách hàng</option>
                                <,?php } else {
                                ?>
                                <option value="1">Quản trị viên</option>
                                <option value="2" selected>Khách hàng</option>
                                <,?php } ?>
			                </select>
                        </div>

                        <button class="btn btn-primary" type="submit">Thay đổi</button>
                    </form-->
                </div>

            </div>
        </div>
    </div>
                
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
        <?php require_once 'inc/footer.php'; ?>

</body>
</html>

