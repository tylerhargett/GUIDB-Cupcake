<?php
	$c = mysql_connect("localhost", "phpuser", "password");
	if (!$c)
		die('Could not connect: '.mysql_error());
	
	mysql_select_db("cupcakes", $c) or die('No DB?');

	$cakes = Array();
	$fillings = Array();
	$frostings = Array();
	$toppings = Array();

	$res = mysql_query("SELECT * FROM cakes");
	while ($row = mysql_fetch_array($result)) {
		array_push($cakes, $row);
	}
	
	$res = mysql_query("SELECT * FROM fillings");
	while ($row = mysql_fetch_array($res)) {
		array_push($fillings, $row);
	}

	$res = mysql_query("SELECT * FROM frostings");
	while ($row = mysql_fetch_array($res)) {
		array_push($frostings, $row);
	}

	$res = mysql_query("SELECT * FROM toppings");
	while ($row = mysql_fetch_array($res)) {
		array_push($toppings, $row);
	}

	$json = array(
		"cakes" => $cakes,
		"fillings" => $fillings,
		"frosting" => $frosting,
		"toppings" => $toppings
	);
	echo json_encode($json);
?>
