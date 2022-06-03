<?php  
	
	
	class main{
		
		function __construct(){

			$controller = "homeController";

			$url = $_SERVER['REQUEST_URI'];
   			$url = ltrim($url,'/');
		    $url = explode('/', $url);

		    if(isset($url[2])){

		        include_once('app/controllers/userController.php');

		        $this->controller = new userController();
		        $this->controller->login();

    		}else{

    			include_once('app/controllers/homeController.php');
    			$this->controller = new $controller; 
    			$this->controller->home();
			}	
    	}
	
	}

?>