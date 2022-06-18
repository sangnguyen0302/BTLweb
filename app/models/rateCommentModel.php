<?php  

	include_once "../DB.php";

	/**
	 * 
	 */
	class rateCommentModel
	{
		
		function __construct()
		{
			// code...
		}

		public function getAll()
		{
			$db = DB::getInstance();

	        $sql1 ="SELECT * FROM order_details";
	        $result1 = mysqli_query($db->con, $sql1);
	        $list = $result1->fetch_all(MYSQLI_ASSOC);

	        return $list;
	        	        
		}


		public function getSumRate()
		{
			$db = DB::getInstance();
	        $sql = "SELECT * FROM order_details WHERE rate!=0";
	        $result = mysqli_query($db->con, $sql);

	        $list = $result->fetch_all(MYSQLI_ASSOC);

	        if($list!=NULL){
	        	return count($list);	
	        }

	        return 0;
	        	        
		}

		public function getSumComment()
		{
			$db = DB::getInstance();
	        $sql = "SELECT * FROM order_details WHERE comment!=''";
	        $result = mysqli_query($db->con, $sql);

	        $list = $result->fetch_all(MYSQLI_ASSOC);

	        if($list!=NULL){
	        	return count($list);	
	        }

	        return 0;
	        	        
		}

		public function deleteComment($userId,$productId)
		{
			$db = DB::getInstance();
			$sql="UPDATE order_details SET comment = '' WHERE userId='$userId' AND productId='$productId'";
			$result = mysqli_query($db->con, $sql);
			if($result){
				return true;
			}
			return false;
		}

		public function deleteRate($userId,$productId)
		{
			$db = DB::getInstance();
			$sql="UPDATE order_details SET rate = 0 WHERE userId='$userId' AND productId='$productId'";
			$result = mysqli_query($db->con, $sql);
			if($result){
				return true;
			}
			return false;
		}
	}

?>