<table>
	<tr>
		<td><input type="submit" value="Search" OnClick="location.href='character_search.php<?php
		$guid=$_GET['guid']; if (($guid !== "") AND ($guid !== NULL)) { echo "?guid=".$guid; }?>'">
		</td>
		<td><input type="submit" value="Character" OnClick="location.href='characters.php<?php
		$guid=$_GET['guid']; if (($guid !== "") AND ($guid !== NULL)) { echo "?guid=".$guid; }?>'">
		</td>
		<td><input type="submit" value="Inventory" OnClick="location.href='inventory.php<?php
		$guid=$_GET['guid']; 
		if (($guid !== "") AND ($guid !== NULL))
		{
			echo "?guid=".$guid;
		}
		?>'"></td>
		<td><input type="submit" value="Script" OnClick="location.href='character_script.php'"></td>
	</tr>
</table>
<table><tr><td><input type="submit" style="height:5px; width: 320px;"></td></tr></table>