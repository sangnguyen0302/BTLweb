<?php  
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_POST['paymentAction']) && $_POST['paymentAction']=="Payment"){


			//Get payment method 
			$_SESSION['paymentMethod']=$_POST['paymentMethod'];

			header("Location: ../views/payment.php"); 

		}
	}	

?>