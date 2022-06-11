<?php  

	/**
	 * 
	 */
	include_once "../DB.php";

	class productModel 
	{
		
		function __construct()
		{
			// code...
		}


		public function getListProduct(){
			$db = DB::getInstance();
	        $sql = "SELECT * FROM Products";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function getProductById($productId){
			$db = DB::getInstance();
	        $sql = "SELECT * FROM Products WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}


		public function removeProductbyId($productId){
			$db = DB::getInstance();
	        $sql = "DELETE FROM products WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function addNewProduct($listValue)
		{
			$db = new DB();

			$product = $db->getInstance();

	        $sql = "INSERT INTO products(id, name, originalPrice, promotionPrice, createdBy, createdDate, cateId, qty, des,status, soldCount) VALUES (NULL,'$listValue[0]','$listValue[1]','$listValue[2]',59,'$listValue[3]','$listValue[4]','$listValue[5]','$listValue[6]',1,0)";
	        $result = mysqli_query($product->con, $sql);
	        if ($result) {
	            return true;
	        }
	        return false;
		}


		public function changeNameById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET name = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function changeOriginalPriceById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET originalPrice = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function changePromotionPriceById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET promotionPrice = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function changeCreatedDateById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET createdDate = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function changeCateIdById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET cateId = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function changeQtyById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET qty = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function changeDesById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET des = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function changeStatusById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET status = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

		public function changeSoldoutById($productId,$value){
			$db = DB::getInstance();
	        $sql = "UPDATE products SET soldCount = '$value' WHERE id='$productId'";
	        $result = mysqli_query($db->con, $sql);
	        return $result;
		}

	}


?>
