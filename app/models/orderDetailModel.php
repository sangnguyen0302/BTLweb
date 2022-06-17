<?php

	include_once "../DB.php";

	/**
	 * Get information about rate and comment form database
	 */
	class orderDetailModel 
	{
		
		function __construct()
		{
			
		}


		public function getProduct($productId)
		{
			$db = DB::getInstance();
	        $sql = "SELECT * FROM order_details WHERE productId='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function checkExistOrder($userId,$productId)
    	{
    		$db = DB::getInstance();
	        $sql = "SELECT * FROM orders WHERE userId='$userId' AND productId='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        $list=$result->fetch_assoc();
	        if($list!=NULL){
	        	return true;
	        }else{
	        	return false;
	        }
    	}

    	public function addNewComment($userId,$userName,$productId,$comment)
    	{
    		$db = new DB();

			$user = $db->getInstance();

			include_once "orderModel.php";

			$order= new orderModel();

			$orderId=$order->getOrderId($userId,$productId);

	        $sql = "INSERT INTO order_details(id,orderId,userId,userName,productId,rate,comment) VALUES (NULL,'$orderId','$userId','$userName','$productId',0,'$comment')";
	        $result = mysqli_query($user->con, $sql);
	        if ($result) {
	            return true;
	        }
	        return false;
    	}

    	public function checkComment($userId,$productId)
    	{
    		$db = DB::getInstance();
	        $sql = "SELECT * FROM order_details WHERE userId='$userId' AND productId='$productId'";
	        $result = mysqli_query($db->con, $sql);

	        $list = $result->fetch_assoc();

	        if($list==NULL || (count($list)>0 && empty($list['comment']))){
	        	return true;
	        }else{
	        	return false;
	        }


    	}

    	public function rate($userId,$productId,$value)
    	{
    		$db = DB::getInstance();
	        $sql = "SELECT * FROM order_details WHERE userId='$userId' AND productId='$productId'";
	        $result = mysqli_query($db->con, $sql);

	        $list = $result->fetch_assoc();

	        $sql1='hihi';

	        if($list==NULL){
	        	include_once "orderModel.php";

				$order= new orderModel();

				$orderId=$order->getOrderId($userId,$productId);
				include_once "memberModel.php";

	    		$user = new memberModel();
	    		$user_result = $user->getMemById($userId);
	    		$user_property = $user_result->fetch_assoc();
	    		
	    		$userName = $user_property['fullName'];

	        	$sql1="INSERT INTO order_details(id, orderId, userId, userName, productId, rate, comment) VALUES (NULL,'$orderId','$userId','$userName','$productId','$value','')";
	        }else{
	        	$sql1="UPDATE order_details SET rate = '$value' WHERE userId='$userId' AND productId='$productId'";
	        }

	        $rate_result= mysqli_query($db->con, $sql1);
	        if($rate_result){
	        	return $sql1;
	        }else{
	        	return $sql;
	        }

    	}

	}


?>