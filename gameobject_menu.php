<?php
function get_entry()
{
	$entry=$_GET['entry']; 
	if (($entry != "") AND ($entry != NULL))
	{
		echo "?entry=".$entry;
	}
}
?>
<table>
	<tr>
		<td><input type="submit" value="Search" OnClick="location.href='gameobject_search.php<?php get_entry(); ?>'"></td>
		<td><input type="submit" value="GO Template" OnClick="location.href='gameobject_template.php'"></td>
		<td><input type="submit" value="GO Location" OnClick="location.href='gameobject_location.php'"></td>
		<td><input type="submit" value="GO Loot" OnClick="location.href='gameobject_loot.php<?php get_entry(); ?>'"></td>
		<td><input type="submit" value="Involved in" OnClick="location.href='gameobject_involved_in.php'"></td>
	</tr>
</table>
<table><tr><td><input type="submit" value="" style="height:5px; width: 465px;"></td></tr></table>