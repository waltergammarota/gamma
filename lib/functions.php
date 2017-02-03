<?
// Set the reporting level based on the constant DEVELOPMENT_ENVIRONMENT (config file)
function setReporting() {
	if (DEVELOPMENT_ENVIRONMENT == true) {
	    error_reporting(E_ALL);
	    ini_set('display_errors','On');
	} else {
	    error_reporting(E_ALL);
	    ini_set('display_errors','Off');
	    ini_set('log_errors', 'On');
	    ini_set('error_log', ROOT.'/tmp/logs/error.log');
	}
}
function callHook() {
    global $url;

    $urlArray = array();
    $urlArray = explode("/",$url);

    $controller = $urlArray[0];
    array_shift($urlArray);
    $action = $urlArray[0];
    array_shift($urlArray);
    $queryString = $urlArray;

    // Failover to index, if no action was called
    if(!$action)
        $action = "index";

    if(!$controller)
        $controller = DEFAULT_CONTROLLER;
 
    $controllerName = $controller;
    $controller = ucwords($controller);
    $model = rtrim($controller, 's');
    $controller .= 'Controller';


    $dispatch = new $controller($model,$controllerName,$action);

    if ((int)method_exists($controller, $action)) {
        call_user_func_array(array($dispatch,$action),$queryString);
    } else {
        trigger_error("Method not found in Model", E_USER_ERROR);
    }
}
 
// Automatic load all the classes required
spl_autoload_register(function ($className) {
    if (file_exists(ROOT . '/lib/' . strtolower($className) . '.class.php')) {
        require_once(ROOT . '/lib/'. strtolower($className) . '.class.php');
    } else if (file_exists(ROOT . '/app/controllers/' . strtolower($className) . '.php')) {
        require_once(ROOT . '/app/controllers/' . strtolower($className) . '.php');
    } else if (file_exists(ROOT . '/app/models/'. strtolower($className) . '.php')) {
        require_once(ROOT . '/app/models/'. strtolower($className) . '.php');
    } else {
    	trigger_error("Model or Controller not found", E_USER_ERROR);
    }
});
