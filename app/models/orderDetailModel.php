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
	        if($result){
	        	return true;
	        }else{
	        	return false;
	        }
    	}

	}


?>