<?php 
	$d=date("Y/m/d");
	$today = date("d-m-Y");
	$stoday = date("m/d/Y");
	$sdate = date("Y-m-d");
	/*date_sub($today,date_interval_create_from_date_string("1 day"));
	echo date_format($today,"Y-m-d");*/
	//echo $today."</br>";
	 $time = strtotime($d.' -1 day');
    	$yesterday = date("m-d-Y", $time);
	//echo $yesterday;
	$dd=explode("/",$d);
	$s=implode("",$dd);
	$time=strtotime($s);
	$date=date("Y/m/d", $time);
	date_default_timezone_set("Asia/Rangoon");
	$cutime = date("H:i:s");
	$check = date('md');
	$year = date('Y');
	/*$mm ="01/07/2017";
	$your_date = date("Y-m-d", strtotime($mm));*/
	/*$ldate = date_create($mm);
			$ldate = date_format($ldate,"Y/m/d");
			$d=explode("/",$ldate);			
			$ldate=implode("",$d);*/
	//var_dump($your_date);
?>