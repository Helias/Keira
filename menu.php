<?php
if (!(include "db-config.php"))
{
	header("location:Connect.php");
}
?>
<link rel="stylesheet" href="./style.css" type="text/css">
<title>Keira DB WebEditor</title>
<table>
	<tr>
		<td><input type="submit" value="Quest" OnClick="location.href='Quest.php';"></td>
		<td><input type="submit" value="Creature" OnClick="location.href='Creature.php'"></td>
		<td><input type="submit" value="Game Object" OnClick="location.href='GameObject.php'"></td>
		<td><input type="submit" value="Item" OnClick="location.href='Item.php'"></td>
		<td><input type="submit" value="Other" OnClick="location.href='Other.php'"></td>
		<td><input type="submit" value="Character" OnClick="location.href='Character.php'"></td>
		<td><input type="submit" value="Script" OnClick="location.href='Script.php'"></td>
		<td><input type="submit" value="SQL" OnClick="location.href='SQL.php'"></td>
		<td style="width: 50px;"></td>
		<td><input type="submit" value="Reconnect" OnClick="location.href='Connect.php'"></td>
	</tr>
</table>
<table>
	<tr>
		<td><p><input type="submit" value="" style="width: 600px; height:0.5px;"></p></td>
	</tr>
</table>
<script type="text/javascript">
function opacity()
{
	for (var i=0; i<document.getElementsByTagName("input").length; i++)
	{
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="0.2";', 200);
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="0.3";', 300);
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="0.4";', 400);
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="0.5";', 500);
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="0.6";', 600);
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="0.7";', 700);
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="0.8";', 800);
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="0.9";', 900);
		setTimeout('document.getElementsByTagName("input")['+i+'].style.opacity="1";', 1000);
	}
	
	var object=document.getElementsByClassName("scroll")[0];
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.2";', 200);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.3";', 300);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.4";', 400);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.5";', 500);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.6";', 600);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.7";', 700);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.8";', 800);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="0.9";', 900);
	setTimeout('document.getElementsByClassName("scroll")[0].style.opacity="1";', 1000);
}
</script>
<body OnLoad="opacity();">
</body>