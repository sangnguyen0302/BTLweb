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

    	public function insertToOrder($orderId,$productId,$userId,$productName,$qty,$productPrice){
			$db = DB::getInstance();

			$totalPrice= $productPrice*$qty;

	        $sql = "INSERT INTO orders(id,productId,userId,createdDate,productName,qty,receivedDate,productPrice,status) VALUES ('$orderId','$productId','$userId', '" . date('d/m/y') . "','$productName','$qty','after 3 days','$totalPrice','processing')";
	        $result = mysqli_query($db->con, $sql);
	        if ($result) {
	            return true;
	        }
	        return false;
		}

		public function getByUserId($userId)
    	{
	        
	        $sql = "SELECT * FROM orders WHERE userId='$userId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
    	}


    	public function getOrder($userId)
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

    	public function getLatestOrderId()
    	{
    		$db= DB::getInstance();
    		$sql = "SELECT MAX(id) FROM orders";
    		$result = mysqli_query($db->con,$sql);
    		if(!empty($result)){
    			$num= $result->fetch_assoc();
    			return $num;
    		}else{
    			return 0;
    		}
    	}

    	public function getOrderId($userId,$productId)
    	{
    		$db= DB::getInstance();
    		$sql ="SELECT * from orders WHERE userId='$userId' AND productId='$productId'";
    		$result = mysqli_query($db->con, $sql);
    		$list = $result->fetch_assoc();
    		return $list['id'];
    	}

    	
	}
?>
