<?php
if(!include "db-config.php")
{
	header("location:Connect.php");
}
if (!$connect) 
{
	echo "mysql_connect : " . mysql_error() . "<br />";
	echo "Error code :" . mysql_errno() . "<br />";
	echo '<script type="text/javascript">setTimeout("location.href=\'Connect.php\';", 5000);</script>';
	die('Error connecting to mysql');
}
else
{
	if(!$Databases)
	{
		echo "mysql_connect : " . mysql_error() . "<br />";
		echo "Error code :" . mysql_errno() . "<br />";
		echo '<script type="text/javascript">setTimeout("location.href=\'Connect.php\';", 5000);</script>';
		die('Error connecting to mysql');
	}
	else{ header("location:Quest.php"); }
}
?>