<html><body> 
 <?php
	//phpinfo();
  	$email=isset($_POST["Username"])?$_POST["Username"]:"";

  	$password=isset($_POST["Password"])?$_POST["Password"]:"";

  	$fname=isset($_POST["Password"])?$_POST["Password"]:"";
  	
  	$lname=isset($_POST["Password"])?$_POST["Password"]:"";
  	
  	$address=isset($_POST["Password"])?$_POST["Password"]:"";

  	$telnumber=isset($_POST["Password"])?$_POST["Password"]:"";

  	$zipcode=isset($_POST["Password"])?$_POST["Password"]:"";

  	$state=isset($_POST["Password"])?$_POST["Password"]:"";



  	/*connect to DB */
	include 'dbcon.php';
	
	/* check to see if user exists */
	$query1 = " select * from Users where userName = '".mysql_escape_string($username)."'";

    $check = mysql_query($query1);

    if (mysql_num_rows($check) == 0){
	echo "doesn't exist...  ";
	/* make user */
	$query2 = "INSERT INTO Users(userName, password)VALUES";
	$query2 = $query2 . "('".mysql_escape_string($username)."','".mysql_escape_string($password)."')";

	$insertion = mysql_query($query2);

	/* confirm it worked */
	$query3 = " select * from Users where userName = '".mysql_escape_string($username)."'";

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