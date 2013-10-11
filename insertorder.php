<?php
 	//get order details
  	$cake=isset($_POST["flavaflav"])?$_POST["flavaflav"]:"";
  	$filling=isset($_POST["fillinz"])?$_POST["fillinz"]:"";
  	$frosting=isset($_POST["frosty"])?$_POST["frosty"]:"";
	$email=isset($_POST["email"])?$_POST["email"]:"";
	$quantity=isset($_POST["quantity"])?$_POST["quantity"]:"";
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
	echo mysql_error();
	$userid = mysql_result($result, 1, "id");
	echo $userid;

	//insert user id into orders
	$insertid = "INSERT INTO orders(customer_id) VALUES('".mysql_escape_string($userid)."')";

	mysql_query($insertid);
	echo mysql_error();
	//figure out what that auto order id is
	$orderidresult = mysql_query("SELECT LAST_INSERT_ID()");
	echo mysql_error();
	$orderid = mysql_result($orderidresult, 0);	

	$cake_id = mysql_result(mysql_query("SELECT id FROM cakes WHERE flavor='$cake'"), 0);
	$filling_id = mysql_result(mysql_query("SELECT id FROM fillings WHERE name='$filling'"), 0);
	$frosting_id = mysql_result(mysql_query("SELECT id FROM frostings WHERE name='$frosting'"), 0);

	//insert order into DB
	$insertorder = "INSERT INTO order_bridge(order_id, cake_id, filling_id, frosting_id, quantity) VALUES('$orderid', '$cake_id', '$filling_id', '$frosting_id', '$quantity')";
	echo $insertorder;
	mysql_query($insertorder);
	echo mysql_error();
?>
