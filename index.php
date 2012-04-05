<?php
if (!(include "db-config.php"))
{
	header("location:Connect.html");
}
else
{
    header("location:Quest.php");
}
?>