<?php
#!/bin/sh

#  CSVparse.php
#  
#
#  Created by Tyler Hargett on 10/4/13.
#
    #create connection - FILL IN SERVER USERNAME AND PASSWORD
    $con = mysql_connect("Projectsite", "", "");
    if(!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("cupcakes", $con)
        or die("Unable to connect to the database : " . mysql_error());
    
    
    $file_handle = fopen("A6/data/CustomCupcakesDBData-ToppingsBridge.csv", "r");
    $count = 0;
    
    while (!feof($file_handle))
    {   
        $line_of_text = fgetcsv($file_handle, 4048);
        //$parts = explode(",", $line_of_text);
        $ToppingsBridgeId = $line_of_text[0];
        $FavoriteId = $line_of_text[1];
        $ToppingId = $line_of_text[2];
        
        if ($count != 0 && strlen($ToppingId)){
            $query = "INSERT INTO toppings_bridge(id, favorite_id, topping_id) VALUES('$ToppingsBridgeId','$FavoriteId', '$ToppingId')";
            mysql_query($query);
        }
    echo mysql_error($con);
    $count = $count +1;

    }
    mysql_close($con);
    echo " END";
    
?>