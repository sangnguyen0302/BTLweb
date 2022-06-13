<?php  
	
	class Controller 
	{
		
		public function __construct()
		{
			echo "haha";
		}

		public function view($page){
			include_once "app/views/".$page.".php";
		}
	}
?>