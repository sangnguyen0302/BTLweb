<?php  

	if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 
		if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){

			$product_id = $_REQUEST['id'];
        	include_once "../models/orderModel.php";

        	$cart = new orderModel();
        	$result= $cart->getById($product_id);
        	$productRow=$result->fetch_assoc();
        	//print_r($productRow);
        	$checkInsert=$cart->insertToOrder($product_id,59,$productRow['name'],1,$productRow['promotionPrice']);
        	header("Location: ../views/home.php");

		}else if($_REQUEST['action'] == 'myOrder'){

			include_once "../models/orderModel.php";
    		$cart = new orderModel();
    		$result = $cart->getByUserId(59);
    		$list= $result->fetch_all(MYSQLI_ASSOC);

    		require_once "../views/order.php";
    	}else if($_REQUEST['action'] == 'viewDetail' && !empty($_REQUEST['id'])){
    		$product_id = $_REQUEST['id'];
    		include_once "../models/orderModel.php";

        	$cart = new orderModel();
        	$result= $cart->getById($product_id);
        	$productRow=$result->fetch_assoc();
        	require_once "../views/orderDetail.php";
    	}else if($_REQUEST['action'] == 'removeProduct' && !empty($_REQUEST['id'])){
    		$product_id = $_REQUEST['id'];
    		include_once "../models/orderModel.php";
    		$cart = new orderModel();
    		$cart->removeByUserIdAndProductId(59,$product_id);
    		$result = $cart->getByUserId(59);
    		$list= $result->fetch_all(MYSQLI_ASSOC);
    		require_once "../views/order.php";
    	}
    }
?>
