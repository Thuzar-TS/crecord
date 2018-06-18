<?php 
	include("connectdb.inc");
	include("date.php");
	$data = json_decode(file_get_contents("php://input"));
	$type = mysql_real_escape_string($data->type);
	if ($type=="save") {
		$customer_name = mysql_real_escape_string($data->customer_name);
		$project_id = mysql_real_escape_string($data->project_id);
		$address = mysql_real_escape_string($data->address);
		$phone_no = mysql_real_escape_string($data->phone_no);
		$remark = mysql_real_escape_string($data->remark);
		$userid = mysql_real_escape_string($data->userid);
		$sql = "INSERT INTO customer(customer_name,project_id,address,phone_no,remark,createddate,modifieddate,userid,recordstatus) 
			VALUES('$customer_name',$project_id,'$address','$phone_no','$remark','$today','$today','$userid',1)";
		mysql_query($sql,$connect)or die("Error in query".$sql);
	}

	else if ($type=="edit") {
		$customer_id = mysql_real_escape_string($data->customer_id);
		$customer_name = mysql_real_escape_string($data->customer_name);
		$project_id = mysql_real_escape_string($data->project_id);
		$address = mysql_real_escape_string($data->address);
		$phone_no = mysql_real_escape_string($data->phone_no);
		$remark = mysql_real_escape_string($data->remark);
		$userid = mysql_real_escape_string($data->userid);
		$sql = "UPDATE customer SET customer_name='$customer_name',project_id=$project_id,address='$address',
			phone_no='$phone_no',remark='$remark',modifieddate='$today',userid='$userid' WHERE customer_id=$customer_id";
		mysql_query($sql,$connect)or die("Error in query".$sql);
	}

	else if ($type=="delete") {
		$customer_id = mysql_real_escape_string($data->customer_id);
		$sql = "UPDATE customer SET recordstatus=2 WHERE customer_id=$customer_id";
		mysql_query($sql,$connect)or die("Error in query".$sql);
	}
	
	$sql1 = "SELECT c.*,p.project_name from customer as c 
		INNER JOIN projects as p 
		on c.project_id=p.project_id
		WHERE c.recordstatus<>2";
	$result1 = mysql_query($sql1,$connect)or die("Error in query".$sql1);
	if (mysql_num_rows($result1)<1) {
		    $customers = "No record";				
		}
	else{
		while ($customer = mysql_fetch_assoc($result1)) {
			$customers[] = $customer;
		}	
	}

	$sql2 = "SELECT project_id,project_name FROM projects WHERE recordstatus<>2";
	$result2 = mysql_query($sql2,$connect)or die("Error in query".$sql2);
	if (mysql_num_rows($result2)<1) {
		    $projects = "No record";				
		}
	else{
		while ($project = mysql_fetch_assoc($result2)) {
			$projects[] = $project;
		}	
	}
	$data = array("customers"=>$customers,"projects"=>$projects);
	print json_encode($data);
 ?>