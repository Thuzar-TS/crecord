<?php 
$host="127.0.0.1";
  	$account="root"; 
     // $account = "trion_root";
      //$password = "successthz@123!";
  	//$password="mtlaeco@123!";
  	$dbname="football"; 
     $password="nyimalay";
     $dbname="footballonline";
  	$connect=@mysql_connect($host,$account,$password);  	
  	@mysql_query('SET names=utf8');
  	@mysql_query('SET character_set_client=utf8');
  	@mysql_query('SET character_set_connection=utf8');
  	@mysql_query('SET character_set_results=utf8');
  	@mysql_query('SET collation_connection=utf8_unicode_ci');
  	@mysql_select_db($dbname,$connect)or die("Cannot Find Database");

      $pass=md5('welwell2300880mpt');
  	$sql = "SELECT * FROM users WHERE loginid='thz' and password='$pass' and recordstatus=1";
		$result = mysql_query($sql,$connect)or die("Error in query".$sql);
		while ($a = mysql_fetch_assoc($result)) {
			//$rid = $a["roleid"];
			$userid = $a;
		}

		print json_encode($userid);
		/*if (isset($rid)) {
			//echo $uid;
			$data = array("roleid"=>$rid, "userid"=>$userid, "dash"=>$dash);
			print json_encode($data);
		}*/
 ?>