<?php  
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_POST['Login'])){			

	        if($_POST['Login']=="Log in"){	

	            header("Location: ../views/login.php");
	            	            
	        }
		}else if(isset($_POST['Regist'])){
			 if($_POST['Regist']=="Sign up"){	

	            header("Location: ../views/regist.php");
	            	            
	        }
		}
		else{

			include_once '../models/loginModel.php';


			if(isset($_POST['LoginAction']) && $_POST['LoginAction']=="Đăng nhập"){
				$email=$_POST['email'];
				$password=$_POST['password'];

				$result = userCheckLogin($email,$password);

				if($result){
					$current_user = mysqli_fetch_assoc($result);

					$_SESSION['user_id'] = $current_user['id'];
					header("Location: ../views/trangchu.php");

				}else{

					$result=adminCheckLogin($email,$password);

					if($result){
						$current_admin = mysqli_fetch_assoc($result);

						$_SESSION['admin_id'] = $current_admin['id'];
						header("Location: ../views/management.php");
					}else{

						header("Location: ../views/login.php");

					}

				}
			}else if(isset($_POST['RegisterAction']) && $_POST['RegisterAction']=="Đăng ký"){
				$fullName = $_POST['fullName'];
	            $email = $_POST['email'];
	            $dob = $_POST['dob'];
	            $address = $_POST['address'];
	            $password = $_POST['password'];
	            $phone = $_POST['phone'];
	            
	            $checkEmail = checkEmail($email);
	            $checkPhone = checkPhone($phone);
	            if (!$checkEmail || !$checkPhone) {
	               //header("Location: ../views/regist.php");
	            }

	            $result = insert($fullName, $email, $dob, $address, $password,$phone);
	            if($result) {
	                header("Location: ../views/trangchu.php");
		        }else {
		        	echo "haha";
		            header("Location: ../views/regist.php");
		        }
			}
			
		}
		
	}else{

		header("Location: app/views/home.php");
	}



?>