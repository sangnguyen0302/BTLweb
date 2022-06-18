<?php  

	session_start();
	require_once("../DB.php");

	if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 


		if($_REQUEST['action'] == 'editInfor' && !empty($_REQUEST['id'])){

			$productId=$_REQUEST['id'];

			include_once "../models/productModel.php";

			$product = new productModel();
			$result = $product->getById($productId);
			$listInfor = $result->fetch_assoc();

			require_once "../views/management/editProduct.php"; 


		}else if($_GET['action'] == 'remove' && !empty($_GET['id'])){

			$productId = $_GET['id'];

			include_once "../models/productModel.php";

			$product = new productModel(); 
			$product->removeProductById($productId);

			$result = $product->getAll();
			$productsList= $result->fetch_all(MYSQLI_ASSOC);

			require_once "../views/management/ProductsManagement.php";


		}else if($_REQUEST['action'] == 'add'){
			require_once "../views/management/addNewProduct.php";
		}else if($_REQUEST['action']=='rate' && !empty($_REQUEST['value'])){
			$value=$_REQUEST['value'];

			include_once "../models/orderDetailModel.php";
			$rate= new orderDetailModel();
			$userId=$_SESSION['user_id'];
			$productId=$_REQUEST['productId'];
			$list=$rate->rate($userId,$productId,$value);
			print_r($list);

			include_once "../models/orderDetailModel.php";

    		$detail = new orderDetailModel();
			$result= $detail->getProduct($productId);
        	$productRow=$result->fetch_all(MYSQLI_ASSOC);

        	$totalRate = 0;
            $countRate =0; 
            $averRate=0;
            foreach($productRow as $key => $value){
                if($value['rate']!=0){
	                ++$countRate;
	                $totalRate+=$value['rate'];
            	}

            }


            if($countRate>0){
                $averRate = round($totalRate/$countRate,1);
            }

            $checkOrdered = $detail->checkExistOrder($userId,$productId); 

            $checkComment = $detail->checkComment($userId,$productId);

        	require_once "../views/single.php";
		}

	}else if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_POST['edit'])){			

        	/*if($_POST['edit']=="Confirm"){*/

        		$productId = $_POST['id'];

        		include_once "../models/productModel.php";

        		$product= new productModel();


        		if(isset($_POST['product-name']) && !empty($_POST['product-name'])){

        			$name = $_POST['product-name'];

        			$product->changeNameById($productId,$name);

        		}

        		if(isset($_POST['originalPrice']) && !empty($_POST['originalPrice'])){

        			$originalPrice = $_POST['originalPrice'];

        			$product->changeOriginalPriceById($productId,$originalPrice);

        		}


        		if(isset($_POST['promotionPrice']) && !empty($_POST['promotionPrice'])){

        			$promotionPrice = $_POST['promotionPrice'];

        			$product->changePromotionPriceById($productId,$promotionPrice);

        		}

        		if(isset($_POST['createdDate']) && !empty($_POST['createdDate'])){

        			$createdDate = $_POST['createdDate'];

        			$product->changeCreatedDateById($productId,$createdDate);

        		}

        		if(isset($_POST['cateId']) && !empty($_POST['cateId'])){

        			$cateId = $_POST['cateId'];

        			$product->changeCateIdById($productId,$cateId);

        		}

        		if(isset($_POST['qty']) && !empty($_POST['qty'])){

        			$qty = $_POST['qty'];

        			$product->changeQtyById($productId,$qty);

        		}
				$image = $_FILES['image']['name'];
				if(isset($image) && !empty($image)){
					$db= new DB();
					$user= $db->getInstance();
					$image_tmp_name = $_FILES['image']['tmp_name'];
					$image_folder = '../../image/'.$image;
					$sql = "UPDATE products SET image='$image' WHERE id='$productId'";
					mysqli_query($user->con, $sql);
					move_uploaded_file($image_tmp_name, $image_folder);
        		}

        		if(isset($_POST['des']) && !empty($_POST['des'])){

        			$des = $_POST['des'];

        			$product->changeDesById($productId,$des);

        		}

        		$result = $product->getAll();
        		$productsList= $result->fetch_all(MYSQLI_ASSOC);

				require_once "../views/management/ProductsManagement.php";

        	/*}*/
        }else if(isset($_POST['add'])){
        	/*if($_POST['add']=='Confirm'){*/
        		$name=$_POST['product-name'];
        		$originalPrice=$_POST['originalPrice'];
        		$promotionPrice=$_POST['promotionPrice'];
				$createdBy=$_SESSION['admin_id'];
        		$createdDate=$_POST['createdDate'];
        		$cateId=$_POST['cateId'];
        		$qty=$_POST['qty'];
        		$des=$_POST['des'];
				$image = $_FILES['image']['name'];
				$image_tmp_name = $_FILES['image']['tmp_name'];
				$image_folder = '../../image/'.$image;
        		$listValue = array($name, $originalPrice,$promotionPrice, $image,$createdBy, $createdDate, $cateId, $qty, $des);

        		include_once "../models/productModel.php";

        		$product = new productModel();
        		$product->addNewProduct($listValue);
        		$result = $product->getAll();
        		$productsList= $result->fetch_all(MYSQLI_ASSOC);

				require_once "../views/management/ProductsManagement.php";

        	/*}*/

        }else if(isset($_POST['Rate'])){
        	
    		$userId = $_SESSION['user_id'];
    		$productId= $_POST['productId'];
    		$comment = $_POST['user_comment'];
    		$rateValue = $_POST['rateValue'];

    		// include_once "../models/memberModel.php";

    		// $user = new memberModel();
    		// $user_result = $user->getMemById($userId);
    		// $user_property = $user_result->fetch_assoc();
    		
    		//$userName = $user_property['fullName']; 

    		include_once "../models/orderDetailModel.php";

    		$detail = new orderDetailModel();
    		
    		$detail->addNewComment($userId,$productId,$comment);
    		$detail->rate($userId,$productId,$rateValue);

        	$result= $detail->getProduct($productId);
        	$productRow=$result->fetch_all(MYSQLI_ASSOC);

        	$totalRate = 0;
            $countRate =0; 
            $averRate=0;
            foreach($productRow as $key => $value){
            	if($value['rate']!=0 && $value['productId']==$productId){
	                ++$countRate;
	                $totalRate+=$value['rate'];
            	}
            }


            if($countRate>0){
                $averRate = round($totalRate/$countRate);
            }

            $checkOrdered = $detail->checkExistOrder($userId,$productId); 

            $checkComment = $detail->checkComment($userId,$productId);

            //unset($_SESSION['rate_prod_id']);

            //Chuyển lại sang trang Đơn hàng của tôi
      		include_once "../models/orderModel.php";
    		$cart = new orderModel();
    		$userId=$_SESSION['user_id'];
    		$result = $cart->getOrder($userId);
    		$list= $result->fetch_all(MYSQLI_ASSOC);
    		require_once "../views/order.php";
        }
	}	


?>