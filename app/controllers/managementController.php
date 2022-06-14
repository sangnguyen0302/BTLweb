<?php  
	require_once '../DB.php';

	if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 


		if($_REQUEST['action'] == 'manageMembers'){

			include_once "../models/memberModel.php";

			$member = new memberModel();
			$result = $member->getListMember();
			$membersList= $result->fetch_all(MYSQLI_ASSOC);

			require_once "../views/management/membersManagement.php";


		}else if ($_REQUEST['action'] == 'manageComments'){



		}else if ($_REQUEST['action'] == 'manageCustomerContacted'){



		}else if ($_REQUEST['action'] == 'manageExceptionInfors'){



		}else if ($_REQUEST['action'] == 'manageProducts'){

			require_once "../models/productModel.php";

			$product = new productModel();
			$result = $product->getAll();
			$productsList= $result->fetch_all(MYSQLI_ASSOC);

			require_once "../views/productsManagement.php";

		}


	}



?>
