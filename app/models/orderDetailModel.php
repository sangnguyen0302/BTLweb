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


		public function add($list,$order_id)
		{
			$db = DB::getInstance();
			$user_id=$list['userId'];
			$product_id=$list['productId'];
			$product_qty=$list['quanty'];

			$add_order_detail_sql="INSERT INTO order_details(id, orderId, userId, productId, productQty, rate, comment) VALUES (NULL,'$order_id','$user_id','$product_id','$product_qty',0,'')";
			$result = mysqli_query($db->con, $add_order_detail_sql);
		}

		public function getProduct($productId)
		{
			$db = DB::getInstance();
	        $sql = "SELECT order_details.id, orderId, userId, productId, productQty, rate, comment, fullName  FROM order_details, users WHERE order_details.userId = users.id";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function checkExistOrder($userId,$productId)
    	{
    		$db = DB::getInstance();

    		include_once 'orderModel.php';
    		$order= new orderModel();
    		$order_result= $order->getOrder($userId);
    		$list_order=$order_result->fetch_all(MYSQLI_ASSOC);

    		foreach ($list_order as $key => $value) {
    			$list_product = $this->getDetail($value['id']);
    			foreach ($list_product as $key_product => $product_property) {
    				if($product_property['productId']==$productId){
    					return true;
    				}
    			}
    		}

    		return false;
	        
    	}

    	public function getDetail($orderId)
    	{
    		$db = DB::getInstance();
    		$sql ="SELECT * FROM order_details WHERE orderId='$orderId'";
    		$result = mysqli_query($db->con, $sql);
    		return $result->fetch_all(MYSQLI_ASSOC);
    	}

    	public function addNewComment($userId,$productId,$comment)
    	{
    		$db = DB::getInstance();

			$sql="UPDATE order_details SET comment = '$comment' WHERE userId='$userId' AND productId='$productId'";
			$result = mysqli_query($db->con, $sql);

			if($result){
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
	        $sql="UPDATE order_details SET rate = '$value' WHERE userId='$userId' AND productId='$productId'";
	        $result = mysqli_query($db->con, $sql);

    	}

	}


?>