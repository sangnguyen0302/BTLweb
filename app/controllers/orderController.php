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
            $cart = new CartModel(1);

            $cartResult = $cart->getCartFromId($userId);

            $listCart = $cartResult->fetch_all(MYSQLI_ASSOC);
            print_r($listCart);

            $order= new orderModel();

            echo $order->insertToOrder($listCart,$userId);

            $cart->clearCartUser();

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
    		// include_once "../models/orderModel.php";
      //       $order= new orderModel();
        	$orderDetail = new orderDetailModel();
        	$result= $orderDetail->getProduct($productId);
        	$productRow=$result->fetch_all(MYSQLI_ASSOC);
            // echo "haha";
            // print_r($productRow);
        	$totalRate = 0;
            $countRate =0; 
            $averRate=0;
			
            foreach($productRow as $key => $value){
				//var_dump($value);
                if($value['rate']!=0){
                    ++$countRate;
                    $totalRate+=$value['rate'];
                }
            }


            if($countRate>0){
                $averRate = round($totalRate/$countRate);
            }

            $checkOrdered = $orderDetail->checkExistOrder($userId,$productId); 
            $checkComment = $orderDetail->checkComment($userId,$productId);

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
    	}else if ($_REQUEST['action'] == 'rateComment' && !empty($_REQUEST['id'])) {
			$id=$_REQUEST['id'];
            header( "Location: ../views/rateComment.php?productId=".$id );
			//.$id;
        }
    }
?>
