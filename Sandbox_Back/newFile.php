<?php
/****************************************************
 ****************** INPUT VARIABLES *****************
 ****************************************************/
	$path = $_POST["path"];
echo $path;
	fopen($path, 'w') or die('ERROR CREATING FILE');
?>