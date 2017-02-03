<?
require_once ('config/config.php');
require_once ('lib/functions.php');

$url = $_GET['url'];
// echo $url;

setReporting();
callHook();