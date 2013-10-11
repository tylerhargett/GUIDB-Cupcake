<html><body> 
 <?php
	//phpinfo();
  	$cake=isset($_POST["cake"])?$_POST["cake"]:"";

  	$filling=isset($_POST["filling"])?$_POST["filling"]:"";

  	//$email=isset($_POST["email"])?$_POST["email"]:"";
  	$email = "BobbyDDickerson@armyspy.com";
  	//more

  	//connect to the DB

  	$con = mysql_connect("localhost", "phpuser", "password");
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("cupcakes", $con)
		or die("Unable to connect to the database : " . mysql_error());

	$query = "SELECT id FROM customers WHERE (email = '".mysql_escape_string($email)."')";
	
	$result = mysql_query($query);

	echo $result;

	</body>
</html>