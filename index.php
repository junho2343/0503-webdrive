<?php 

define("ROOT_PATH",__DIR__);
define("APP_PATH",ROOT_PATH."/application");
define("CORE_PATH",APP_PATH."/core");
define("CONTROLLER_PATH",APP_PATH."/controller");
define("MODEL_PATH",APP_PATH."/model");
define("CONFIG_PATH",APP_PATH."/config");
define("VIEW_PATH",APP_PATH."/view");
define("DATA_PATH",APP_PATH."/data");
define("HOME_URL","");
define("CSS_URL","/public/css");
define("JS_URL","/public/js");
define("IMG_URL","/public/img");

include_once(CONFIG_PATH."/config.php");
include_once(CONFIG_PATH."/lib.php");

Application::run();
