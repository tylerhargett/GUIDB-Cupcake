<?php 

  $con = mysql_connect("localhost", "phpuser", "password");
  if(!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("cupcakes", $con)
    or die("Unable to connect to the database : " . mysql_error());
    

  $username=isset($_POST["email"])?$_POST["email"]:"";

  $password=isset($_POST["password"])?$_POST["password"]:"";

  $loginquery = " select * from customers where email = '".mysql_escape_string($email)."' and pass = '".mysql_escape_string($password)."'";
  $loginresult = mysql_query($loginquery);


	if (mysql_num_rows($loginresult) == 0)
   		header( 'Location: index.html' ) ;
   else
   		session_start();
		  $sid = session_id();
		  $_SESSION["userName"] = $username;
   		header( 'Location: cupcakebuilder.html' ) ;

   mysql_close($con);

 ?>