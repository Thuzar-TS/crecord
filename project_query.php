<?php 
	include("connectdb.inc");
	include("date.php");
	$data = json_decode(file_get_contents("php://input"));
	$type = mysql_real_escape_string($data->type);
	if ($type=="save") {
		$project_name = mysql_real_escape_string($data->project_name);
		$userid = mysql_real_escape_string($data->userid);
		$sql = "INSERT INTO projects(project_name,createddate,modifieddate,userid,recordstatus) 
			VALUES('$project_name','$today','$today','$userid',1)";
		mysql_query($sql,$connect)or die("Error in query".$sql);
	}

	else if ($type=="edit") {
		$project_id = mysql_real_escape_string($data->project_id);
		$project_name = mysql_real_escape_string($data->project_name);
		$userid = mysql_real_escape_string($data->userid);
		$sql = "UPDATE projects SET project_name='$project_name',modifieddate='$today',userid='$userid' WHERE project_id=$project_id";
		mysql_query($sql,$connect)or die("Error in query".$sql);
	}

	else if ($type=="delete") {
		$project_id = mysql_real_escape_string($data->project_id);
		$sql = "UPDATE projects SET recordstatus=2 WHERE project_id=$project_id";
		mysql_query($sql,$connect)or die("Error in query".$sql);
	}
	
	$sql2 = "SELECT * FROM projects WHERE recordstatus<>2";
	$result2 = mysql_query($sql2,$connect)or die("Error in query".$sql2);
	if (mysql_num_rows($result2)<1) {
		    $projects = "No record";				
		}
	else{
		while ($project = mysql_fetch_assoc($result2)) {
			$projects[] = $project;
		}	
	}
	$data = array("projects"=>$projects);
	print json_encode($data);
 ?>