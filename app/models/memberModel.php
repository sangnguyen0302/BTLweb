<?php  

	/**
	 * 
	 */
	include_once "../DB.php";

	class memberModel 
	{
		
		function __construct()
		{
			// code...
		}


		public function getListMember(){
			$db = DB::getInstance();
	        $sql = "SELECT * FROM users WHERE roleID='2'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function removeMember($id){
			$db = DB::getInstance();
	        $sql = "DELETE FROM users WHERE id='$id'";
	        $result = mysqli_query($db->con, $sql);
			echo mysqli_error($db->con);
	        return $result;
		}


		public function getMemById($id){
			$db = DB::getInstance();
	        $sql = "SELECT * FROM users WHERE id='$id' AND roleId=2";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}


		public function getMemByEmailAndPassword($email,$password){
			$db =DB::getInstance();
			$sql ="SELECT * FROM users WHERE email='$email' AND password = '$password'";
			$result = mysqli_query($db->con,$sql);
			return $result;
		}


		public function updateName($userId, $name){
			$db = DB::getInstance();
	        $sql = "UPDATE users SET fullName = '$name' WHERE id='$userId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}



		public function updateEmail($userId, $email){
			$db = DB::getInstance();
	        $sql = "UPDATE users SET email = '$email' WHERE id='$userId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}


		public function updatePhone($userId, $phone){
			$db = DB::getInstance();
	        $sql = "UPDATE users SET phone = '$phone' WHERE id='$userId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function updateDob($userId, $dob){
			$db = DB::getInstance();
	        $sql = "UPDATE users SET dob = '$dob' WHERE id='$userId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}


		public function updateAddress($userId, $address){
			$db = DB::getInstance();
	        $sql = "UPDATE users SET address = '$address' WHERE id='$userId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}


		public function updatePassword($userId, $password){
			$db = DB::getInstance();
	        $sql = "UPDATE users SET password = '$password' WHERE id='$userId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

	}


?>