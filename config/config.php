<?php
/** Configuration Variables **/

// Define the ROOT to use in paths
define('ROOT', dirname(dirname(__FILE__)));

// Constant to control the Error Level depending on the enviroment
define ('DEVELOPMENT_ENVIRONMENT', false);

// Constant to control the Error Level depending on the enviroment
define ('DEFAULT_CONTROLLER', "movies");

// MySQL Database Details
if(!getenv("DB_HOST"))
{
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'mvc_framework');
	define('DB_USER', 'mvc_framework');
	define('DB_PASSWORD', 'Argentina');
}
else
{
	define('DB_HOST', getenv("DB_HOST"));
	define('DB_NAME', getenv("DB_NAME"));
	define('DB_USER', getenv("DB_USER"));
	define('DB_PASSWORD', getenv("DB_PASSWORD"));
}
