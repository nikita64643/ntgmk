<?php 
	

	class Controller {

		public static function view($controller) {
			require($controller.".php");
		}

		public static function page($content) {
			$empty = 'pages'.$content[1].'.php';
			require("../resources/layout/".$content[0].".php");
		}


	}