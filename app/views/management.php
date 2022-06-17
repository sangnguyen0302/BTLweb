<?php 
    session_start();
    require_once("inc/head.php");
    require_once("../DB.php");
 ?>
 <style>
	a {
		text-decoration : none;
	}
	a:hover {
		text-decoration : underline;
	}
</style>
<title>Thông tin tài khoản</title>
<link type="text/css" rel="stylesheet" href= "../../css/profile.css">
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
	<?php require_once 'inc/sidebar.php' ?>
	<main style="margin-left: 220px" class="p-3">
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
                    <div class="contact mb-3">
                    <h5>Thông tin liên hệ</h5>
                        <ul class="list-group">
                            <li class="phoneli">
                                <form action="">
                                <div class="py-1 phone-num ms-4 d-flex">
                                    <div>
                                        <span>Số điện thoại</span> <br>
                                        <input class="form-control-plaintext" type="text" name="phone" value="<?= $value['phone'] ?>">
                                    </div>
                                    <div class="text-end flex-fill">
                                        <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
                                    </div>
                                </div>
                                </form>
                            </li>

                            <li class="emaili">
                                <form action="">
                                <div class="py-1 email d-inline-block ms-4 d-flex">
                                    <div>
                                        <span>Địa chỉ email</span> <br>
                                        <input class="form-control-plaintext" type="text" name="mail" value="<?= $value['email'] ?>">
                                    </div>
                                    <div class="text-end flex-fill">
                                        <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
                                    </div>
                                </div>
                                </form>
                                
                            </li>
                        </ul>
                    </div>

                    <div class="security mb-3">
                    <h5>Bảo mật</h5>
                        <ul class="list-group">
                            <li class="lockli">
                            <div class="py-2 pwd d-inline-block ms-4 d-flex">
                                <div>
                                    <span>
                                        Thiết lập mật khẩu
                                    </span>
                                    <div class="card card-body collapse" id="collapsepwd">

                                        <?php
                    
                    
                                        if(isset($_POST['submit-change-pass'])){
                                            $id = $_POST['user_id'];
                                            $sql="SELECT * FROM users WHERE id='$id'";
                                            $result= mysqli_query($db->con, $sql);
                                            $value=$result->fetch_assoc();
                                            $new_pass=$_POST['new-pass'];
                                            if($_POST['old-pass']!=$value['password']){
                                                $message="Sai mật khẩu";
                                            }else if($_POST['new-pass']!=$_POST['confirm-pass']){
                                                $message="Mật khẩu xác nhận không khớp";
                                            }else{
                                                $sql = "UPDATE users SET password='$new_pass' WHERE id='$id'";
                                                $result= mysqli_query($db->con, $sql);
                                                if($result){
                                                    echo "Change password success fully";
                                                }else{
                                                    echo mysqli_error($db->con);
                                                }
                            
                                            }
                                        }
                                        ?>
                                        <form action="" method="POST" >
                                            <?php
                                                if(isset($message)){
                                                echo "<span class='text-danger'>".$message.'</span>';
                                                }
                                            ?>
                                            <input type="hidden" name="user_id" value="<?=$user_id?>">
                                            <!--input type="hidden" name="change-pass" value="Đổi mật khẩu"-->
                                            <div class="mb-2 old-pwd">
                                                <label for="">Mật khẩu hiện tại :</label>
                                                <input class="form-control" type="password" name="old-pass" placeholder="Mật khẩu hiện tại" required>
                                            </div>

                                            <div class="mb-2 new-pwd">
                                                <label for="">Mật khẩu mới :</label>
                                                <input class="form-control" type="password" name="new-pass" placeholder="Mật khẩu mới" required>
                                            </div>
                                            
                                            <div class="mb-2 confirm-pwd">
                                                <label for="">Nhập lại mật khẩu mới :</label>
                                                <input class="form-control" type="password" name="confirm-pass" placeholder="Nhập lại mật khẩu mới" required>
                                            </div>
                                            <input class="btn btn-primary" type="submit" name="submit-change-pass" value="Xác nhận">
                                        </form>
                                    </div> 
                                </div>
                                <div class="text-end flex-fill">
                                        <a href="#collapsepwd" class="btn border border-2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapsepwd">Đổi mật khẩu</a>
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>

                    <div class="role">
                    <h5>Tư cách</h5>
                        <ul class="list-group">
                            <li class="roleli">
                                <form action="">
                                <div class="py-1 rol d-inline-block ms-4 d-flex">
                                    <div>
                                    <select name="roleId" id="roleID" class="form-control-plaintext">
				                        <?php
                                            if($value['roleId']== 1 ) {
                                        ?>
                                            <option value="1" selected>Quản trị viên</option>
                                            <option value="2">Khách hàng</option>
                                        <?php } else {
                                        ?>
                                            <option value="1">Quản trị viên</option>
                                            <option value="2" selected>Khách hàng</option>
                                        <?php } ?>
			                        </select>
                                    </div>
                                    <div class="text-end flex-fill">
                                        <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
                                    </div>
                                </div>
                                </form>
                            
                            </li>
                        </ul>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
                
               
            </div>
        </div>
	</main>
</body>
<?php } ?>
</html>