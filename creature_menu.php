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
		<td><input type="submit" value="Search" OnClick="location.href='creature_search.php<?php get_entry(); ?>'"></td>
		<td><input type="submit" value="Creature Template" OnClick="location.href='creature_template.php<?php get_entry(); ?>'"></td>
		<td><input type="submit" value="Creature Location" OnClick="location.href='creature_location.php'"></td>
		<td><input type="submit" value="Model info" OnClick="location.href='model_info.php'"></td>
		<td><input type="submit" value="Equip Template" OnClick="location.href='equip_template.php'"></td>
		<td><input type="submit" value="Creature Loot" OnClick="location.href='creature_loot.php<?php get_entry(); ?>'"></td>
		<td><input type="submit" value="Pickpocket Loot" OnClick="location.href='creature_pickpocketloot.php<?php get_entry(); ?>'"></td>
		<td><input type="submit" value="Skin Loot" OnClick="location.href='creature_skinloot.php<?php get_entry(); ?>'"></td>
	</tr>
</table>
<table>
	<tr>
		<td><input type="submit" value="Creature Template Addons" OnClick="location.href='creature_template_addons.php'"></td>
		<td><input type="submit" value="NPC Gossip" OnClick="location.href='npc_gossip.php'"></td>
		<td><input type="submit" value="On Kill Reputation" OnClick="location.href='on_kill_reputation.php'"></td>
		<td><input type="submit" value="Involved in" OnClick="location.href='involved_in.php'"></td>
		<td><input type="submit" value="Locales NPC Text" OnClick="location.href='locales_npc_text.php'"></td>
		<td><input type="submit" value="Creature Movement" OnClick="location.href='creature_movement.php'"></td>
		<td><input type="submit" value="Creature Addon" OnClick="location.href='creature_addon.php'"></td>
	</tr>
</table>
<table><tr><td><p><input type="submit" value="" style="width: 965px; height:0.5px;"></p></td></tr></table>
