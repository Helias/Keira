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
		<td class="nofade"><input type="submit" value="Quest" OnClick="location.href='Quest.php';"></td>
		<td class="nofade"><input type="submit" value="Creature" OnClick="location.href='Creature.php'"></td>
		<td class="nofade"><input type="submit" value="Game Object" OnClick="location.href='GameObject.php'"></td>
		<td class="nofade"><input type="submit" value="Item" OnClick="location.href='Item.php'"></td>
		<td class="nofade"><input type="submit" value="Other" OnClick="location.href='Other.php'"></td>
		<td class="nofade"><input type="submit" value="Character" OnClick="location.href='Character.php'"></td>
		<td class="nofade"><input type="submit" value="Script" OnClick="location.href='Script.php'"></td>
		<td class="nofade"><input type="submit" value="SQL" OnClick="location.href='SQL.php'"></td>
		<td style="width: 50px;"></td>
		<td class="nofade"><input type="submit" value="Reconnect" OnClick="location.href='Connect.php'"></td>
	</tr>
</table>
<table>
	<tr>
		<td  class="nofade"><p><input type="submit" value="" style="width: 600px; height:0.5px;"></p></td>
	</tr>
</table>
<script type="text/javascript" src="./fade.js"></script>
<body OnLoad="opacity();">
</body>