<?php

/**
* 
*/
class JsonHandler 
{
	public static function decode($value, $options = 0)
	{	
		$result = json_decode($value, $options);

		if ($result) {
			# code...
			sendToDB($result);
		}

	}

	private function sendToDB($fileContents)
	{
		#create connection - FILL IN SERVER USERNAME AND PASSWORD
        $con = mysql_connect("localhost", "phpuser", "password");
        if(!$con)
        {
            die('Could not connect: ' . mysql_error());
     	}
     	mysql_select_db("Cupcakes", $con)
         	or die("Unable to connect to the database : " . mysql_error());
		
		$favId = $fileContents['favId'];
		$custId = $fileContents['custId'];
		$cupId = $fileContents['cupId'];
		$frID = $fileContents['frID'];
		$fID = $fileContents['fID'];

		$query = "INSERT INTO Favorites(favId, custId, cupId, frID. fID)
					VALUES('$favId', '$custId', '$cupId', '$frID', '$fID')";
        mysql_query($query);
        mysql_close();
	}
	
}

?>
	