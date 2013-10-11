<html><body> 
 <?php
	//phpinfo();
  	$email=isset($_POST["email"])?$_POST["email"]:"";

  	$password=isset($_POST["pw"])?$_POST["pw"]:"";

  	$fname=isset($_POST["fname"])?$_POST["fanme"]:"";
  	
  	$lname=isset($_POST["lname"])?$_POST["lname"]:"";
  	
  	$address=isset($_POST["addr"])?$_POST["addr"]:"";

  	$telnumber=isset($_POST["tele"])?$_POST["tele"]:"";

  	$zipcode=isset($_POST["zip"])?$_POST["zip"]:"";

  	$state=isset($_POST["state"])?$_POST["state"]:"";



  	/*connect to DB */
	include 'dbcon.php';
	
	/* check to see if user exists */
	$query1 = " select * from customers where email = '".mysql_escape_string($email)."'";

    $check = mysql_query($query1);

    if (mysql_num_rows($check) == 0){
		echo "doesn't exist...  ";
		/* make user */
		$query2 = "INSERT INTO customers(email, pass, first_name, last_name, address, city, state, telNumber, zipcode)VALUES";
		$query2 = $query2 . "('".mysql_escape_string($email)."','".mysql_escape_string($password)."','".mysql_escape_string($fname)."','".mysql_escape_string($lname)."','".mysql_escape_string($address)."','".mysql_escape_string($city)."','".mysql_escape_string($state)."','".mysql_escape_string($telnumber)."','".mysql_escape_string($zipcode)."')";

		$insertion = mysql_query($query2);

		/* confirm it worked */
		$query3 = " select * from customers where email = '".mysql_escape_string($email)."'";

		$confirm = mysql_query($query3);

		if (mysql_num_rows($confirm) == 0)
		   	echo "error registering";	
			
		else
		   	//include 'login.php';*/
			echo "You have been succesfully registered";
		}
		
    else
	   	/* login */
		//include 'login.php';
		echo "You already exist so we will log you in";

    mysql_close($con);

 ?>
</body></html>