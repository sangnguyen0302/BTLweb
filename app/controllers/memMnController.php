<?php  

	if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){

		if($_REQUEST['action'] == 'editInfor' && !empty($_REQUEST['id'])){

			/*$memId = $_REQUEST['id'];

			include_once "../models/memberModel.php";

			$member = new memberModel();
			$result = $member->getMemById($memId);

			$listInfor = $result->fetch_assoc();

			require_once "../views/management/editInforMem.php";*/


		}else if($_REQUEST['action']=='removeMem' && !empty($_REQUEST['id'])){

			$memId = $_REQUEST['id'];

			include_once "../models/memberModel.php";

			$member = new memberModel();
			$member->removeMember($memId);

			$result = $member->getListMember();
			$membersList= $result->fetch_all(MYSQLI_ASSOC);

			require_once "../views/management/membersManagement.php";


		}




	}else if($_SERVER['REQUEST_METHOD'] == 'POST'){

			if(isset($_POST['edit'])){			

	        	if($_POST['edit']=="Confirm"){

	        		$email=$_POST['email'];
	        		$password=$_POST['password'];
	        		$userId=$_POST['id'];

	        		include_once "../models/memberModel.php";

	        		$member = new memberModel();
	        		$result= $member->getMemByID($userId);
	        		$listInfor = $result->fetch_assoc();
	        		 

	        		if(isset($_POST['fullName']) && !empty($_POST['fullName'])){
	        			$name=$_POST['fullName'];

	        			$member->updateName($userId,$name);
	        		}

	        		if(isset($_POST['email']) && !empty($_POST['email'])){
	        			$member->updateEmail($userId,$email);
	        		}


	        		if(isset($_POST['phone']) && !empty($_POST['phone'])){
	        			$phone = $_POST['phone'];
	        			$member->updatePhone($userId,$phone);
	        		}


	        		if(isset($_POST['dob']) && !empty($_POST['dob'])){
	        			$dob = $_POST['dob'];
	        			$member->updateDob($userId,$dob);
	        		}


	        		if(isset($_POST['address']) && !empty($_POST['address'])){
	        			$address =$_POST['address'];
	        			$member->updateAddress($userId,$address);
	        		}


	        		if(isset($_POST['password']) && !empty($_POST['password'])){
	        			$member->updatePassword($userId,$password);
	        		}

	        		$member = new memberModel();
					$result = $member->getListMember();
					$membersList= $result->fetch_all(MYSQLI_ASSOC);

	        		require_once "../views/management/membersManagement.php";


	        	}

	        }	

		}




?>