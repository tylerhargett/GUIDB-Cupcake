<?php
$con = mysql_connect("localhost", "phpuser", "password");
    if(!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("cupcakes", $con)
        or die("Unable to connect to the database : " . mysql_error());
    
$string = file_get_contents("/var/www/cupcakes/Res/A6/data/menu.json");

$d = json_decode($string,true)["menu"];

foreach($d["cakes"] as $i) {
$flavor = $i["flavor"];
$image = $i["img_url"];
mysql_query("INSERT INTO cakes(flavor, picture) VALUES('$flavor', '$image')");
}

foreach($d["frosting"] as $i) {
$flavor = $i["flavor"];
$image = $i["img_url"];
mysql_query("INSERT INTO frostings (name,picture) VALUES('$flavor', '$image')");
}

foreach($d["fillings"] as $i) {
$flavor = $i["flavor"];
$rgb = $i["rgb"];
mysql_query("INSERT INTO fillings (name,rgb) VALUES('$flavor', '$rgb')");
}

foreach($d["Toppings"] as $i)
mysql_query("INSERT INTO toppings (name) VALUES('$i')");

echo mysql_error($con);
?>