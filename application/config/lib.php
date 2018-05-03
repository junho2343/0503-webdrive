<?php 

	function move($target = false){
		echo $target ? "<script>location.href = '{$target}'</script>" : "<script>history.back()</script>";
		exit();
	}
	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}
	function access($bol,$msg){
		if(!$bol){
			alert($msg);
			move();
		}
	}
	function __autoload($className){
		switch($className){
			case"Controller":
			case"Model":
			case"Application":
				$classPath = CORE_PATH."/{$className}.php";
				break;
			default:
				if(strpos($className,"Model")){
					$classPath = MODEL_PATH."/{$className}.php";
				}else{
					$classPath = CONTROLLER_PATH."/{$className}.php";
				}
				break;
		}
		
		include_once($classPath);
	}
	function html_re($target){
		$target = htmlspecialchars($target,ENT_QUOTES);
		return trim($target);
	}