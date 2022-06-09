<?php  
	include_once "../DB.php";
	class orderModel 
	{
		function __construct()
		{

		}

		public function getById($Id)
    	{
	        $db = DB::getInstance();
	        $sql = "SELECT * FROM Products WHERE Id='$Id' AND status=1";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
    	}

    	public function insertToOrder($productId,$userId,$productName,$qty,$productPrice){
			$db = new DB();

			$user = $db->getInstance();

			$totalPrice= $productPrice*$qty;

	        $sql = "INSERT INTO orders(id,productId,userId,createdDate,productName,qty,receivedDate,productPrice,status) VALUES (NULL,'$productId','$userId', '" . date('d/m/y') . "','$productName','$qty','after 3 days','$totalPrice','processing')";
	        $result = mysqli_query($user->con, $sql);
	        if ($result) {
	            return true;
	        }
	        return false;
		}

		public function getByUserId($userId)
    	{
	        $db = DB::getInstance();
	        $sql = "SELECT * FROM orders WHERE userId='$userId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
    	}
    	public function removeByUserIdAndProductId($userId,$productId){
    		$db = DB::getInstance();
	        $sql = "DELETE FROM orders WHERE userId='$userId' AND productId='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
    	}
	}
?>
