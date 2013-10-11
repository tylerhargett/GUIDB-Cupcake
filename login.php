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
   		echo "<html><body> Failure logging in </body></html>";
   else
   		session_start();
		  $sid = session_id();
		  $_SESSION["userName"] = $username;
   		echo "<html><body> Success logging in </body></html>";

   mysql_close($con);

 ?>