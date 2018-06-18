<?php 
	include("connectdb.inc");
	include("date.php");
	$data = json_decode(file_get_contents("php://input"));
	$login_id = mysql_real_escape_string($data->login_id);
	$pass = mysql_real_escape_string($data->pass);
	$password=md5($pass);
	$sql = "SELECT * FROM users WHERE login_id='$login_id' and password='$password'";
	$result = mysql_query($sql,$connect)or die("Error in query".$sql);
	while ($a = mysql_fetch_assoc($result)) {
		$user_id = $a["login_id"];
	}
	if (isset($user_id)) {
		$data = array("users"=>$user_id);
		print json_encode($data);
	}
	else{
		echo "Error";
	}
 ?>