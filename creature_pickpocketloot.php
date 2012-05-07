<?php
include "db-config.php";
include "menu.php";
include "creature_menu.php";
include "creature_loots.php";
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<table border="1" id="loot">
<tr>
<td>Entry</td>
<td>item</td>
<td>Chance</td>
<td>lootmode</td>
<td>groupid</td>
<td>mincountOrRef</td>
<td>maxcount</td>
<td>Name</td>
</tr>
<?php
get_loot('pickpocketing_loot_template', 'pickpocketloot');
?>
</table>
<input type="hidden" name="entry" value="<?php echo $entry; ?>">
<table>
<tr>
<td>entry</td>
<td>item</td>
</tr>
<tr>
<br>
<td><input type="text" class="medium" id="loot_id" name="loot_id" value="<?php echo $loot_id; ?>"></td>
<td><input type="text" class="medium" id="item" name="item"></td>
<td></td><td></td><td></td>
<td><input type="button" value="+" OnClick="add()"></td>
<td><input type="button" value="<-->" OnClick="exchange()"></td>
<td><input type="button" value="X" OnClick="del()"></td>
</tr>
<tr>
<td>Chance</td>
<td>groupid</td>
<td>mincountOrRef</td>
<td>maxcount</td>
<td>lootmode</td>
</tr>
<tr>
<td><input type="text" class="medium" id="ChanceOrQuestChance" name="ChanceOrQuestChance"></td>
<td><input type="text" class="medium" id="groupid" name="groupid"></td>
<td><input type="text" class="medium" id="mincountOrRef" name="mincountOrRef"></td>
<td><input type="text" class="medium" id="maxcount" name="maxcount"></td>
<td><input type="text" class="medium" id="lootmode" name="lootmode">
<select class="little" id="LootMode" OnChange="get_lootmode_value(this.id, 'lootmode')">
<option value="-1" selected="selected" disabled="disabled" class="bold">LootMode</option>
<option value="1">Default</option>
<option value="2">HardMode1</option>
<option value="4">HardMode2</option>
<option value="8">HardMode3</option>
<option value="16">HardMode4</option>
</td>
</tr>
</table>
<script type="text/Javascript" src="creature_loot.js"></script>
</form>
<p align="right"><input type="submit" value="Show Creature Loot Script" OnClick="Scripts('pickpocketing_loot_template')"></p>