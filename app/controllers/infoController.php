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
?>