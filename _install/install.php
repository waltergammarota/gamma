<?
ini_set('display_errors','On');
require_once ('../config/config.php');
$sql = file_get_contents("movies-demo.sql");
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$queries = explode(";", $sql);
foreach ($queries as $query) {
	@mysqli_query($con, $query);
}
mysqli_close($con);
header("Location: /");