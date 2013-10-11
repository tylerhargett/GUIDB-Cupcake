<?php
	//phpinfo();
  	$email=isset($_POST["email"])?$_POST["email"]:"";
  	$password=isset($_POST["pw"])?$_POST["pw"]:"";
  	$fname=isset($_POST["fname"])?$_POST["fname"]:"";
  	$lname=isset($_POST["lname"])?$_POST["lname"]:"";
  	$address=isset($_POST["addr"])?$_POST["addr"]:"";
  	$city=isset($_POST["city"])?$_POST["city"]:"";
  	$telnumber=isset($_POST["tele"])?$_POST["tele"]:"";
  	$zipcode=isset($_POST["zip"])?$_POST["zip"]:"";
  	$state=isset($_POST["state"])?$_POST["state"]:"";

	
  	/*connect to DB */
	include 'dbcon.php';
	
		/* make user */
		$query2 = "INSERT INTO customers(id,email, pass, first_name, last_name, address, city, state, telNumer, zipcode) VALUES ";
		$query2 = $query2 . " ('".rand()."','".mysql_escape_string($email)."','".mysql_escape_string($password)."','".mysql_escape_string($fname)."','".mysql_escape_string($lname)."','".mysql_escape_string($address)."','".mysql_escape_string($city)."','".mysql_escape_string($state)."','".mysql_escape_string($telnumber)."','".mysql_escape_string($zipcode)."')";

		echo $query2;
		$insertion = mysql_query($query2);
		echo mysql_error();
		/* confirm it worked */
		$query3 = " select * from customers where email = '".mysql_escape_string($email)."'";

		$confirm = mysql_query($query3);
	/*	
		if (mysql_num_rows($confirm) == 0)
		   	header( 'Location: index.html' ) ;	
		else
			header( 'Location: cupcakebuilder.html' ) ;
	*/	
    mysql_close($con);

 ?>
