<?php
function get_guid()
{
	$guid=$_GET['guid'];
	if (($guid != "") AND ($guid != NULL))
	{
		echo "?guid=".$guid;
	}
}
?>
<table>
	<tr>
		<td><input type="submit" value="Search" OnClick="location.href='character_search.php<?php get_guid(); ?>'">
		</td>
		<td><input type="submit" value="Character" OnClick="location.href='characters.php<?php get_guid(); ?>'">
		</td>
		<td><input type="submit" value="Inventory" OnClick="location.href='character_inventory.php<?php get_guid(); ?>'"></td>
	</tr>
</table>
<table><tr><td><input type="submit" value="" style="height:5px; width: 250px;"></td></tr></table>