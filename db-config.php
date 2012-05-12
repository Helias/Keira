<?php
$Server="Localhost";
$Username="root";
$Password="angel";
$Database="world";
$Characters="tcharacters";
$connect=mysql_connect($Server, $Username, $Password);
$Databases=mysql_select_db("$Database", $connect);
?>
		