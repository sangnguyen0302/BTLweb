<?php
    require_once '../DB.php';
    $db = new DB();
	$user = $db->getInstance();
    if(isset($_POST['change-avt'])){
        $id = $_POST['user-id'];
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../../upload_image/'.$image;
        $sql = "UPDATE users SET image='$image' WHERE id='$id'";
        mysqli_query($user->con, $sql);
        move_uploaded_file($image_tmp_name, $image_folder);
        header("Location: ../views/infoUser.php?user_id=".$id);
    }
    if(isset($_POST['change-phone-user'])){
        $id = $_POST['user-id-phone'];
        $newphone=$_POST['phone'];
        $sql="UPDATE users SET phone='$newphone' WHERE id='$id'";
        mysqli_query($user->con,$sql);
        header("Location: ../views/infoUser.php?user_id=".$id);
    }
    if(isset($_POST['change-email-user'])){
        $id = $_POST['user-id-email'];
        $newemail=$_POST['new-email'];
        $sql="SELECT * FROM users WHERE email='$newemail'";
        $result=mysqli_query($user->con,$sql);
        $message="";
        if($result&&mysqli_num_rows($result)>0){
            $message="Email đã tồn tại";
        }else {
            $sql="UPDATE users SET email='$newemail' WHERE id='$id'";
        mysqli_query($user->con,$sql);
        }
        
        header("Location: ../views/infoUser.php?user_id=$id&message=$message");
    }
?>