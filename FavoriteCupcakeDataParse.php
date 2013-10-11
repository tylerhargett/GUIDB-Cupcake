<?php
#!/bin/sh

#  CSVparse.php
#  
#
#  Created by Tyler Hargett on 10/4/13.
#
    #create connection - FILL IN SERVER USERNAME AND PASSWORD
    $con = mysql_connect("localhost", "phpuser", "password");
    if(!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("cupcakes", $con)
        or die("Unable to connect to the database : " . mysql_error());
    
    
    $file_handle = fopen("/var/www/cupcakes/Res/A6/data/CustomCupcakesDBData - FavoriteCupcakes.csv", "r");
    $count = 0;
    
    while (!feof($file_handle))
    {   
        $line_of_text = fgetcsv($file_handle, 4048);
        //$parts = explode(",", $line_of_text);
        $FavoriteId = $line_of_text[0];
        $UserId = $line_of_text[1];
        $CupcakeId = $line_of_text[2];
        $FrostingId = $line_of_text[3];
        $CupcakeFillingId = $line_of_text[4];
        
        if ($count != 0 && strlen($FavoriteId)){
             $query = "INSERT INTO favorites(id, customer_id, cake_id, frosting_id, filling_id) VALUES('$FavoriteId','$UserId', '$CupcakeId', '$FrostingId', '$CupcakeFillingId')";

            mysql_query($query);
        }

    //echo mysql_error($con);
    $count = $count +1;

    }
    mysql_error($con);
    mysql_close($con);
    echo " END";
    
?>