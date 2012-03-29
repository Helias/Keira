<?php
if (!(include "db-config.php"))
{
	header("location:Connect.html");
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
		<td><input type="submit" value="SQL" OnClick="location.href='SQL.php'"></td>
		<td style="width: 50px;"></td>
		<td><input type="submit" value="Reconnect" OnClick="location.href='Connect.html'"></td>
	</tr>
</table>
<table>
	<tr>
		<td><p><input type="submit" style="width: 530px; height:0.5px;"></p></td>
	</tr>
</table>
