<?php  

	if(isset($_REQUEST['action']) && !empty($_REQUEST['productId']) && !empty($_REQUEST['userId'])){

		$productId=$_REQUEST['productId'];
		$userId =$_REQUEST['userId'];

		include_once '../models/rateCommentModel.php';

		$detail = new rateCommentModel();

		if($_REQUEST['action']=='deleteComment'){

			$detail->deleteComment($userId,$productId);


		}else if($_REQUEST['action']=='deleteRate'){

			$detail->deleteRate($userId,$productId);

		}

		
	}  


?>