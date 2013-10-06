<?PHP
    #create connection - FILL IN SERVER USERNAME AND PASSWORD
    $con = mysql_connect("localhost", "phpuser", "password");
    if(!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("Cupcakes", $con)
        or die("Unable to connect to the database : " . mysql_error());

    
    
    $file_handle = fopen("CustomCupcakesDBData-ToppingsBridge.cvs", "r");
    
    while (!feof($file_handle))
    {
        	$line_of_text = fgetcsv($file_handle, 4048);
        	$parts = explode(',' $line_of_text);
        
        	$ToppingsBridgeId= (int)$parts[0];
	   	$FavoriteId= (int)$parts[1];
		$ToppingId= (int)$parts[2];

        $query = "INSERT INTO ToppingsBridge(tbId, favId, tName)
					VALUES('$ToppingsBridgeId', '$FavoriteId', '$ToppingId')";
        mysql_query($query);
        mysql_close();
    }
    
?>