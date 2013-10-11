<?php
	$c = mysql_connect("localhost", "phpuser", "password");
	if (!$c)
		die('Could not connect: '.mysql_error());
	
	mysql_select_db("cupcakes", $c) or die('No DB?');

	$id_arg = mysql_real_escape_string($_GET['id']);
	if (!strlen($id_arg))
		die('Huh?');

	$res = mysql_query("SELECT * FROM favorites WHERE id='$id_arg'");
	echo json_encode(mysql_fetch_assoc($res));
	
	mysql_free_result($res);
	mysql_close();
?>
