<?php  
	
	include_once "../DB.php";

	function userCheckLogin($email,$password){

		$db = new DB();

		$user = $db->getInstance();

	    $sql = "SELECT * FROM account WHERE UserName='$email' AND PASS='$password'";
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

	    $sql = "SELECT * FROM account WHERE UserName='$email' AND PASS='$password' AND ATYPE='admin'";
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

		$sql = "SELECT * FROM account WHERE UserName='$email' ";
        $result = mysqli_query($db->con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            return false;
        }else {
            return true;
        }
	}

	function insert($fullName,$email, $dob, $address, $password,$phone){
		$db = new DB();

		$user = $db->getInstance();

		$captcha = rand(10000, 99999);

        $sql = "INSERT INTO Users(id, fullName, email, dob, address, password, roleId, status,captcha, isConfirmed, phone) VALUES (NULL,'$fullName','$email','$dob','$address','$password',1,1,'$captcha',1,'$phone')";
        $result = mysqli_query($user->con, $sql);
        if ($result) {
            return true;
        }
        return false;
	}
?>