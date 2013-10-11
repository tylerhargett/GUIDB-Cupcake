<?php 
	$con = mysql_connect("localhost", "phpuser", "password");
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("cupcakes", $con)
		or die("Unable to connect to the database : " . mysql_error());

 ?>