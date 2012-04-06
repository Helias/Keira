<?php
if(!include "db-config.php")
{
	header("location:Connect.php");
}
else
{ 
	header("location:Quest.php"); 
}
?>