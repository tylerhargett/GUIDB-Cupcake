<?php 

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