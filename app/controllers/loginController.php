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
	}else{
		header("Location: ../views/home.php");
	}



?>