<?php 

	class Application{
		function run(){
			$get = explode("/",$_GET['param']);
			$type = isset($get[0]) && $get[0] != '' ? $get[0] : "member";
			$type = ucfirst($type)."Controller";
			$className = new $type();
		}
	}