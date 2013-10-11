<?php
	$c = mysql_connect("localhost", "phpuser", "password");
	if (!$c)
		die('Could not connect: '.mysql_error());
	
	mysql_select_db("cupcakes", $c) or die('No DB?');

	$id_arg = mysql_real_escape_string($_GET['id']);
	if (!strlen($id_arg))
		die('Huh?');

	$res = json_encode(mysql_fetch_assoc(mysql_query("SELECT FROM Favorites WHERE custId = '$id_arg'")));
	echo "$res";
	
	mysql_free_result($res);
	mysql_close();
?>
