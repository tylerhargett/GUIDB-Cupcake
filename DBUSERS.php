#!/bin/sh

#  CSVparse.php
#  
#
#  Created by Tyler Hargett on 10/4/13.
#

<?PHP
    #create connection - FILL IN SERVER USERNAME AND PASSWORD
    $connection = mysql_connect(localhost, phpuser, password)
    mysql_select_db('Cupcakes');
    
    
    $file_handle = fopen("CustomCupcakesDBData-Users.csv", "r");
    
    while (!feof($file_handle))
    {
        $line_of_text = fgetcsv($file_handle, 4048);
        $parts = explode(',' $line_of_text);
        
        $UserId = (int)$parts[0];
        $OnMailingList = ($parts[1] == "yes");
        $GivenName = $parts[2];
        $Surname= $parts[3];
        $StreetAddress= $parts[4];
        $City= $parts[5];
        $State= $parts[6];
        $ZipCode= (int)$parts[7];
        $EmailAddress= $parts[8];
        $Password= $parts[9];
        $TelephoneNumber= $parts[10];
        
        $query = "INSERT INTO Customers(custID, onMailingList, fName, lName, address, city, state, zipcode, email, password, telNumber) VALUES('$UserId','$OnMailingList','$GivenName','$Surname','$StreetAddress','$City','$State','$ZipCode','$EmailAddress','$Password','$TelephoneNumber')";
        mysql_query($query);
        mysql_close();
    }
    
?>
