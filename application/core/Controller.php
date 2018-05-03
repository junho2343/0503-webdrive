<?php 

	class Controller{
		var $param;
		var $include;
		var $model;
		function __construct(){

			$this->paramset();
			$this->modelset();
			$this->include();

		}
		function paramset(){
			$get = explode("/",$_GET['param']);
			$this->param = isset($get[0]) && $get[0] != '' ? $get[0] : "member";
			$this->include = isset($get[1]) ? $get[1] : "login";
		}
		function modelset(){
			$model_name = ucfirst($this->param)."Model";
			$this->model = new $model_name();

			if(isset($_POST['action'])){
				$this->model->action();
			}
			if(method_exists($this,$this->include)){
				$method = $this->include;
				$this->$method();
			}
		}
		function include(){
			include_once(VIEW_PATH."/temp/header.php");
			include_once(VIEW_PATH."/{$this->param}/{$this->include}.php");
		}
	}