<?php  

	session_start();
	if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 
		if($_REQUEST['action'] == 'confirmPayment'){

			//$product_id = $_REQUEST['id'];
        	include_once "../models/orderModel.php";

        	//$cart = new orderModel();

        	//Three line below aren't necessary anymore
        	//$result= $cart->getById($product_id);
        	//$productRow=$result->fetch_assoc();
        	//print_r($productRow);


        	$userId=$_SESSION['user_id'];

            //Sửa sau
            include_once "../models/cartModel.php";
            $cart = new CartModel();

            $cartResult = $cart->getCartById($userId); //Hàm này chưa có. Hàm này dùng để lấy danh sách sản phẩm trong đơn hàng theo Id của người dùng

            $listCart = $cartResult->fetch_all(MYSQLI_ASSOC);

            //chèn từ cart sang order
            $order = new orderModel();

        	foreach($listCart as $value){

                //Lấy orderId mới nhất
                $orderID=$order->getLatestOrderId();

        		$order->insertToOrder($orderId+1,$value['id'],$userId,$value['name'],$value['qty'],$value['promotionPrice']);
        	}


        	//$checkInsert=$cart->insertToOrder($product_id,$userId,$productRow['name'],1,$productRow['promotionPrice']);
        	//unset($_SESSION['cart']);
        	header("Location: ../views/home.php");

		}else if($_REQUEST['action'] == 'myOrder'){

			include_once "../models/orderModel.php";
    		$cart = new orderModel();
    		$userId=$_SESSION['user_id'];
    		$result = $cart->getOrder($userId);
    		$list= $result->fetch_all(MYSQLI_ASSOC);

    		require_once "../views/order.php";
    	}else if($_REQUEST['action'] == 'viewDetail' && !empty($_REQUEST['id'])){

    		$userId=$_SESSION['user_id'];
    		$productId = $_REQUEST['id'];
    		include_once "../models/orderDetailModel.php";
    		include_once "../models/orderModel.php";

        	$cart = new orderDetailModel();
        	$result= $cart->getProduct($productId);
        	$productRow=$result->fetch_all(MYSQLI_ASSOC);

        	$totalRate = 0;
            $countRate =0; 
            $averRate=0;
            foreach($productRow as $value){
                ++$countRate;
                $totalRate+=$value['rate'];
            }


            if($countRate>0){
                $averRate = floor($totalRate/$countRate);
            }

            $checkOrdered = $cart->checkExistOrder($userId,$productId); 
            $checkComment = $cart->checkComment($userId,$productId);

        	require_once "../views/single.php";
    	}else if($_REQUEST['action'] == 'removeProduct' && !empty($_REQUEST['id'])){
    		$product_id = $_REQUEST['id'];
    		include_once "../models/orderModel.php";
    		$cart = new orderModel();
    		$userId=$_SESSION['user_id'];
    		$cart->removeByUserIdAndProductId($userId,$product_id);
    		$result = $cart->getOrder($userId);
    		$list= $result->fetch_all(MYSQLI_ASSOC);
    		require_once "../views/order.php";
    	}else if($_REQUEST['action']=='canclePayment'){
    		header("Location: ../views/home.php");
    	}
    }
?>
