<?php
include "db-config.php";
if (!(include "db-config.php"))
{
	header("location:Connect.html");
}
include "menu.php";
include "quest_menu.php";
?>
