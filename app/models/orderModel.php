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

    	public function insertToOrder($list,$userId){
			$db = DB::getInstance();

			$totalPrice=0;
			foreach ($list as $key => $value) {
				$totalPrice+=$value['quanty']*$value['promotionPrice'];
			}
			//thêm đơn hàng
			$add_new_order_sql="INSERT INTO orders(id, userId, createdDate, totalPrice, receivedDate, status) VALUES (NULL,'$userId','" . date('d/m/y') . "','$totalPrice','3 ngày sau','processing')";

			$order_result=mysqli_query($db->con, $add_new_order_sql);

			//tìm order id mới nhất
			$get_order_id_sql = "SELECT MAX(id) FROM orders WHERE userId='$userId'";
    		$order_id_result = mysqli_query($db->con,$get_order_id_sql);
    		$order_id=$order_id_result->fetch_assoc()["MAX(id)"];


    		include_once "orderDetailModel.php";
    		$detail= new orderDetailModel();

    		foreach ($list as $key => $value) {
    			$detail->add($value,$order_id);
    		}
			
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
