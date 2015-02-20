<?php
	$input = $_POST['name'];

	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_password = '';

	$mysql_db = 'searchCollege';
	$mysql_conn_error = 'Oops! Could not connect to database';

	if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password) or !@mysql_select_db($mysql_db))
	{	
		die($mysql_conn_error);
	}

	$query = "SELECT `Name` FROM `colleges` WHERE `Name` LIKE '%$input%'";
	if($query_run = mysql_query($query))
	{
		while ($query_row = mysql_fetch_assoc($query_run)) {
			echo '<li role="presentation" value="'.$query_row['Name'].'"><a onclick="return false" role="menuitem" tabindex="-1" href="#">'.$query_row['Name'].'</a></li>';
		}

	}
?>
