
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
    mysql_select_db("Cupcakes", $con)
        or die("Unable to connect to the database : " . mysql_error());
    
    
    $file_handle = fopen("A6/data/CustomCupcakesDBData-Users.csv", "r");
    $count = 0;
    
    while (!feof($file_handle))
    {   
        $line_of_text = fgetcsv($file_handle, 4048);
        //$parts = explode(",", $line_of_text);
        $UserId = $line_of_text[0];
        $OnMailingList = ($line_of_text[1] == "yes");
        $GivenName = $line_of_text[2];
        $Surname= $line_of_text[3];
        $StreetAddress= $line_of_text[4];
        $City= $line_of_text[5];
        $State= $line_of_text[6];
        $ZipCode= $line_of_text[7];
        $EmailAddress= $line_of_text[8];
        $Password= $line_of_text[9];
        $TelephoneNumber= $line_of_text[10];
        if ($count != 0){
            $query = "INSERT INTO Customers(custID, onMailingList, fName, lName, address, city, state, zipcode, email, password, telNumer) VALUES('$UserId','$OnMailingList','$GivenName','$Surname','$StreetAddress','$City','$State','$ZipCode','$EmailAddress','$Password','$TelephoneNumber')";
            mysql_query($query);
        }
    echo mysql_error($con);
    $count = $count +1;

    }
    mysql_close($con);
    echo " END";
    
?>
