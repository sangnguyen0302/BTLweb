<?php  
	
	include_once "../DB.php";

	function userCheckLogin($email,$password){

		$db = new DB();

		$user = $db->getInstance();

	    $sql = "SELECT * FROM Users WHERE email='$email' AND password='$password' AND isConfirmed=1";
	    $result = mysqli_query($user->con, $sql);
	    $num_rows = mysqli_num_rows($result);
	    if ($num_rows > 0) {
	        return $result;
	    }else {
	        return false;
	    }
	}

	function adminCheckLogin($email,$password){

		$db = new DB();

		$user = $db->getInstance();

	    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	    $result = mysqli_query($user->con, $sql);
	    $num_rows = mysqli_num_rows($result);
	    if ($num_rows > 0) {
	        return $result;
	    }else {
	        return false;
	    }
	}

	function checkEmail($email){
		$db = new DB();

		$user = $db->getInstance();

		$sql = "SELECT * FROM Users WHERE email='$email' AND isConfirmed=1";
        $result = mysqli_query($db->con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            return false;
        }else {
            return true;
        }
	}

	function checkPhone($phone){
		$db = new DB();

		$user = $db->getInstance();

		$sql = "SELECT * FROM Users WHERE phone='$phone' AND isConfirmed=1";
        $result = mysqli_query($db->con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            return false;
        }else {
            return true;
        }
	}

	function insert($fullName,$email, $dob, $address, $password,$phone, $image){
		$db = new DB();

		$user = $db->getInstance();

		$captcha = rand(10000, 99999);

        $sql = "INSERT INTO Users(id, fullName, email, dob, address, password, roleId, status,captcha, isConfirmed, phone, image) VALUES (NULL,'$fullName','$email','$dob','$address','$password',1,1,'$captcha',1,'$phone', '$image')";
        $result = mysqli_query($user->con, $sql);
        if ($result) {
            return true;
        }
        return false;
	}
?>