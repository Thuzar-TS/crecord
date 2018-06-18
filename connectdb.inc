  <?php
  	$host="127.0.0.1";
  	$account="root"; 
  	$password="nyimalay";
  	$dbname="crecord";
  	$connect=@mysql_connect($host,$account,$password);  	
  	@mysql_query('SET names=utf8');
  	@mysql_query('SET character_set_client=utf8');
  	@mysql_query('SET character_set_connection=utf8');
  	@mysql_query('SET character_set_results=utf8');
  	@mysql_query('SET collation_connection=utf8_unicode_ci');
  	@mysql_select_db($dbname,$connect)or die("Cannot Find Database");
  ?>