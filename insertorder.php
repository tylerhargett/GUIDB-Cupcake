<?php
 	//get order details
  	$cake=isset($_POST["cake"])?$_POST["cake"]:"";

  	$filling=isset($_POST["filling"])?$_POST["filling"]:"";

  	$frosting=isset($_POST["frosting"])?$_POST["frosting"]:"";

	$email=isset($_POST["email"])?$_POST["email"]:"";

  	//connect to the DB
  	$con = mysql_connect("localhost", "phpuser", "password");
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("cupcakes", $con)
		or die("Unable to connect to the database : " . mysql_error());

	// find out users email
	$query = "SELECT id FROM customers WHERE (email = '".mysql_escape_string($email)."')";
	
	$result = mysql_query($query);

	$userid = mysql_result($result, 0);	

	//insert user id into orders
	$insertid = "INSERT INTO orders(customer_id) VALUES('".mysql_escape_string($userid)."')";

	mysql_query($insertid);

	//figure out what that auto order id is
	$orderidresult = mysql_query("SELECT LAST_INSERT_ID()");

	$orderid = mysql_result($orderidresult, 0);	

	//insert order into DB
	$insertorder = "INSERT INTO order_bridge(order_id, cake_id, filling_id, frosting_id) VALUES('".mysql_escape_string($orderid)."', '".mysql_escape_string($cake)."', '".mysql_escape_string($filling)."', '".mysql_escape_string($frosting)."'");

?>