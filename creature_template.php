<?php
include "db-config";
include "menu.php"; 
include "creature_menu.php";
$entry=$_GET['entry'];
if ($entry== "")
{
	$query=mysql_query("SELECT * FROM creature_template WHERE entry=1");
}
else
{
	$query=mysql_query("SELECT * FROM creature_template WHERE entry=$entry");
}
while ($row=mysql_fetch_array($query))
{
if ($entry == "")
{
	$entry="Write Entry";
	$row="";
}
?>
<style type="text/css">
.bold {
	font-weight:bold; 
	color:black;
}

.little {
	width:20px;
}

.target {
	background-color:deepskyblue;
}
</style>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" name="form" id="form">
<table>
<tr>
<td>Creature 1</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Entry</td><td>difficulty_entry_1</td><td>difficulty_entry_2</td><td>difficulty_entry_3</td>
</tr>
<tr>
<td><input type="text" title="creature's id, related to field creature.id" value="<?php echo $entry; ?>" style="width: 125px; height:23px;" name="entry" ><input type="submit" value="" style="width: 15px; height; 23;" OnClick="location.href='creature_template.php?<?php echo $entry ?>'"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['difficulty_entry_1']); ?>" style="width: 125px; height:23px;" name="difficulty_entry_1"><a href="creature_template.php?entry=<?php echo htmlspecialchars($row['difficulty_entry_1']); ?>"><input type="submit" value="" style="width: 15px; height; 23;"></a></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['difficulty_entry_2']); ?>" style="width: 125px; height:23px;" name="difficulty_entry_2"><a href="creature_template.php?entry=<?php echo htmlspecialchars($row['difficulty_entry_2']); ?>"><input type="submit" value="" style="width: 15px; height; 23;"></a></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['difficulty_entry_3']); ?>" style="width: 125px; height:23px;" name="difficulty_entry_3"><a href="creature_template.php?entry=<?php echo htmlspecialchars($row['difficulty_entry_3']); ?>"><input type="submit" value="" style="width: 15px; height; 23;"></a></td>
</tr>
</table>
<table>
<tr>
<td>Killcredit1</td>
<td>Killcredit2</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['KillCredit1']); ?>" style="width: 300px; height:23px;" name="Killcredit1"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['KillCredit2']); ?>" style="width: 300px; height:23px;" name="Killcredit2"></td>
</tr>
</table>
<table>
<tr>
<td>name</td>
</tr>
<tr>
<td><input type="text" title="Base name of the creature" value="<?php echo htmlspecialchars($row['name']); ?>" style="width: 605px; height:23px;" name="name"></td>
</tr>
</table>
<table>
<tr>
<td>subname</td>
<td>iconname</td>
</tr>
<tr>
<td><input type="text" title="Subname of the creature (if any)" value="<?php echo htmlspecialchars($row['subname']); ?>" style="width: 300px; height:23px;" name="subname"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['iconname']); ?>" style="width: 300px; height:23px;" name="iconname"></td>
</tr>
</table>
<table>
<tr>
<td>modelid1</td>
<td>modelid2</td>
<td>modelid3</td>
<td>modelid4</td>
</tr>
<tr>
<td><input type="text" title="Graphical model that client must apply on this creature" value="<?php echo htmlspecialchars($row['modelid1']); ?>" style="width: 150px; height:23px;" name="modelid1"></td>
<td><input type="text" title="Graphical model that client must apply on this creature" value="<?php echo htmlspecialchars($row['modelid2']); ?>" style="width: 150px; height:23px;" name="modelid2"></td>
<td><input type="text" title="Graphical model that client must apply on this creature" value="<?php echo htmlspecialchars($row['modelid3']); ?>" style="width: 150px; height:23px;" name="modelid3"></td>
<td><input type="text" title="Graphical model that client must apply on this creature" value="<?php echo htmlspecialchars($row['modelid4']); ?>" style="width: 150px; height:23px;" name="modelid4"></td>
</tr>
<tr>
<td>mingold</td>
<td>maxgold</td>
<td>minlevel</td>
<td>maxlevel</td>
</tr>
<tr>
<td><input type="text" title="Minimum gold drop" value="<?php echo htmlspecialchars($row['mingold']); ?>" style="width: 150px; height:23px;" name="mingold"></td>
<td><input type="text" title="Maximumg gold drop, 0 = creature don't drop any gold" value="<?php echo htmlspecialchars($row['maxgold']); ?>" style="width: 150px; height:23px;" name="maxgold"></td>
<td><input type="text" title="Creature minimum level. Spawned creature have leve in range from minlevel to maxlevel" value="<?php echo htmlspecialchars($row['minlevel']); ?>" style="width: 150px; height:23px;" name="minlevel"></td>
<td><input type="text" title="Creature maximum level. Spawned creature have leve in range from minlevel to maxlevel" value="<?php echo htmlspecialchars($row['maxlevel']); ?>" style="width: 150px; height:23px;" name="maxlevel"></td>
</tr>
<tr>
<td>Health_Mod</td>
<td>Mana_Mod</td>
<td>VehicleId</td>
<td>Exp</td>
</tr>
<tr>
<td><input type="text" title="Creature's Health Mod" value="<?php echo htmlspecialchars($row['Health_mod']); ?>" style="width: 150px; height:23px;" name="Health_mod"></td>
<td><input type="text" title="Creature's Mana Mod" value="<?php echo htmlspecialchars($row['Mana_mod']); ?>" style="width: 150px; height:23px;" name="Mana_mod"></td>
<td><input type="text" title="Creature's VehicleId" value="<?php echo htmlspecialchars($row['VehicleId']); ?>" style="width: 150px; height:23px;" name="VehicleId"></td>
<td><input type="text" title="The expansion table the creatures health value is taken from. Values are from 0 to 2." value="<?php echo htmlspecialchars($row['exp']); ?>" style="width: 150px; height:23px;" name="exp"></td>
</tr>
</table>
<table>
<tr>
<td>Loot</td>
<td>Resistence</td>
</tr>
<tr>
<td>lootid</td>
<td>resistance1</td>
<td>resistance4</td>
<td style="width: 150px;"></td>
</tr>
<tr>
<td><input type="text" title="Refered to field loot_template.entry lootid does not need to be same as creature entry. Use other lootid if creature should have same loot as other creatures." value="<?php echo htmlspecialchars($row['lootid']); ?>" style="width: 150px; height:23px;" name="lootid"></td>
<td><input type="text" title="Holy resistence" value="<?php echo htmlspecialchars($row['resistance1']); ?>" style="width: 150px; height:23px;" name="resistance1"></td>
<td><input type="text" title="Frost resistence" value="<?php echo htmlspecialchars($row['resistance4']); ?>" style="width: 150px; height:23px;" name="resistance4"></td>
</tr>
<tr>
<td>pickpocketloot</td>
<td>resistance2</td>
<td>resistance5</td>
</tr>
<tr>
<td><input type="text" title="Refered to field pickpocket_loot_template.entry pickpocketloot does not need to be same as creature entry. Use other pickpocketloot if creature should have same loot as other creatures." value="<?php echo htmlspecialchars($row['pickpocketloot']); ?>" style="width: 150px; height:23px;" name="pickpocketloot"></td>
<td><input type="text" title="Fire resistence" value="<?php echo htmlspecialchars($row['resistance2']); ?>" style="width: 150px; height:23px;" name="resistance2"></td>
<td><input type="text" title="Shadow resistence" value="<?php echo htmlspecialchars($row['resistance5']); ?>" style="width: 150px; height:23px;" name="resistance5"></td>
</tr>
<tr>
<td>skinloot</td>
<td>resistance3</td>
<td>resistance6</td>
</tr>
<tr>
<td><input type="text" title="Refered to field skinning_loot_template.entry skinloot does not need to be same as creature entry. Use other skinloot if creature should have same loot as other creatures." value="<?php echo htmlspecialchars($row['skinloot']); ?>" style="width: 150px; height:23px;" name="skinloot"></td>
<td><input type="text" title="Nature resistence" value="<?php echo htmlspecialchars($row['resistance3']); ?>" style="width: 150px; height:23px;" name="resistance3"></td>
<td><input type="text" title="Arcane resistence" value="<?php echo htmlspecialchars($row['resistance6']); ?>" style="width: 150px; height:23px;" name="resistance6"></td>
</tr>
</table>
<p></p>
<table>
<tr>
<td>questItems</td>
</tr>
<tr>
<td>questItem1</td>
<td>questItem2</td>
<td>mechanic_immune_mask</td>
<td style="width: 102px;"></td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['questItem1']); ?>" style="width: 150px; height:23px;" name="questItem1"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['questItem2']); ?>" style="width: 150px; height:23px;" name="questItem2"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['mechanic_immune_mask']); ?>" style="width: 150px; height:23px;" name="mechanic_immune_mask">
<select class="little" id="mechanic_immune_mask" OnChange="get_value_flag(this.id)">
<option value="-1" selected="selected" disabled="disabled" class="bold">Mechanic</option>
<option value="1">CHARM</option>
<option value="2">DISORIENTED</option>
<option value="4">DISARM</option>
<option value="8">DISTRACT</option>
<option value="16">FEAR</option>
<option value="32">GRIP</option>
<option value="64">ROOT</option>
<option value="128">PACIFY</option>
<option value="256">SILENCE</option>
<option value="512">SLEEP</option>
<option value="1024">SNARE</option>
<option value="2048">STUN</option>
<option value="4096">FREEZE</option>
<option value="8192">KNOCKOUT</option>
<option value="16384">BLEED</option>
<option value="32768">BANDAGE</option>
<option value="65536">POLYMORPH</option>
<option value="131072">BANISH</option>
<option value="262144">SHIELD</option>
<option value="524288">SHACKLE</option>
<option value="1048576">MOUNT</option>
<option value="2097152">INFECTED</option>
<option value="4194304">TURN</option>
<option value="8388608">HORROR</option>
<option value="16777216">INVULNERABILITY</option>
<option value="33554432">INTERRUPT</option>
<option value="67108864">DAZE</option>
<option value="134217728">DISCOVERY</option>
<option value="268435456">IMMUNE_SHIELD</option>
<option value="536870912">SAPPED</option>
<option value="1073741824">ENRAGED</option>
</select>
</td>
</tr>
<tr>
<td>questItem3</td>
<td>questItem4</td>
<td>PetSpellDataId</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['questItem3']); ?>" style="width: 150px; height:23px;" name="questItem3"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['questItem4']); ?>" style="width: 150px; height:23px;" name="questItem4"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['PetSpellDataId']); ?>" style="width: 150px; height:23px;" name="PetSpellDataId"></td>
</tr>
<tr>
<td>questItem5</td>
<td>questItem6</td>
<td>flags_extra</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['questItem5']); ?>" style="width: 150px; height:23px;" name="questItem5"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['questItem6']); ?>" style="width: 150px; height:23px;" name="questItem6"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['flags_extra']); ?>" style="width: 150px; height:23px;" name="flags_extra"></td>
</tr>
</table>
<input type="hidden" name="code">
</form>
<script type="text/javascript">
function get_value_flag(select)
{
	selects=document.getElementById(select);
	if (selects.options[selects.selectedIndex].className != "target")
	{
		document.getElementsByName(select)[0].value=parseInt(document.getElementsByName(select)[0].value)+parseInt(selects.options[selects.selectedIndex].value);
		selects.options[selects.selectedIndex].className="target";
		selects.selectedIndex=0;
	}
	else if (selects.options[selects.selectedIndex].className=="target")
	{
		document.getElementsByName(select)[0].value=parseInt(document.getElementsByName(select)[0].value)-parseInt(selects.options[selects.selectedIndex].value);
		selects.options[selects.selectedIndex].className="";
		selects.selectedIndex=0;
	}
}

function Scripts()
{
entry='<?php echo htmlspecialchars($row['entry']); ?>';
difficulty_entry_1='<?php echo htmlspecialchars($row['difficulty_entry_1']); ?>';
difficulty_entry_2='<?php echo htmlspecialchars($row['difficulty_entry_2']); ?>';
difficulty_entry_3='<?php echo htmlspecialchars($row['difficulty_entry_3']); ?>';
Killcredit1='<?php echo htmlspecialchars($row['KillCredit1']); ?>';
Killcredit2='<?php echo htmlspecialchars($row['KillCredit2']); ?>';
name='<?php echo htmlspecialchars($row['name']); ?>';
subname='<?php echo htmlspecialchars($row['subname']); ?>';
iconname='<?php echo htmlspecialchars($row['iconname']); ?>';
modelid1='<?php echo htmlspecialchars($row['modelid1']); ?>';
modelid2='<?php echo htmlspecialchars($row['modelid2']); ?>';
modelid3='<?php echo htmlspecialchars($row['modelid3']); ?>';
modelid4='<?php echo htmlspecialchars($row['modelid4']); ?>';
mingold='<?php echo htmlspecialchars($row['mingold']); ?>';
maxgold='<?php echo htmlspecialchars($row['maxgold']); ?>';
minlevel='<?php echo htmlspecialchars($row['minlevel']); ?>';
maxlevel='<?php echo htmlspecialchars($row['maxlevel']); ?>';
Health_mod='<?php echo htmlspecialchars($row['Health_mod']); ?>';
Mana_mod='<?php echo htmlspecialchars($row['Mana_mod']); ?>';
VehicleId='<?php echo htmlspecialchars($row['VehicleId']); ?>';
exp='<?php echo htmlspecialchars($row['exp']); ?>';
resistance1='<?php echo htmlspecialchars($row['resistance1']); ?>';
resistance2='<?php echo htmlspecialchars($row['resistance2']); ?>';
resistance3='<?php echo htmlspecialchars($row['resistance3']); ?>';
resistance4='<?php echo htmlspecialchars($row['resistance4']); ?>';
resistance5='<?php echo htmlspecialchars($row['resistance5']); ?>';
resistance6='<?php echo htmlspecialchars($row['resistance6']); ?>';
lootid='<?php echo htmlspecialchars($row['lootid']); ?>';
pickpocketloot='<?php echo htmlspecialchars($row['pickpocketloot']); ?>';
skinloot='<?php echo htmlspecialchars($row['skinloot']); ?>';
questItem1='<?php echo htmlspecialchars($row['questItem1']); ?>';
questItem2='<?php echo htmlspecialchars($row['questItem2']); ?>';
questItem3='<?php echo htmlspecialchars($row['questItem3']); ?>';
questItem4='<?php echo htmlspecialchars($row['questItem4']); ?>';
questItem5='<?php echo htmlspecialchars($row['questItem5']); ?>';
questItem6='<?php echo htmlspecialchars($row['questItem6']); ?>';
mechanic_immune_mask='<?php echo htmlspecialchars($row['mechanic_immune_mask']); ?>';
PetSpellDataId='<?php echo htmlspecialchars($row['PetSpellDataId']); ?>';
flags_extra='<?php echo htmlspecialchars($row['flags_extra']); ?>';

Script="UPDATE creature_template SET";
if(form.difficulty_entry_1.value != difficulty_entry_1){Script+=" difficulty_entry_1="+form.difficulty_entry_1.value+",";}
if (form.difficulty_entry_2.value != difficulty_entry_2){Script+=" difficulty_entry_2="+form.difficulty_entry_2.value+",";}
if (form.difficulty_entry_3.value != difficulty_entry_3){Script+=" difficulty_entry_3="+form.difficulty_entry_3.value+",";}
if (form.Killcredit1.value != Killcredit1){Script+=" Killcredit1="+form.Killcredit1.value+",";}
if (form.Killcredit2.value != Killcredit2){Script+=" Killcredit2="+form.Killcredit2.value+",";}
if (form.name.value != name){Script+=" name='"+form.name.value+"',";}
if (form.subname.value != subname){Script+=" subname='"+form.subname.value+"',";}
if (form.iconname.value != iconname){Script+=" iconname='"+form.iconname.value+"',";}
if (form.modelid1.value != modelid1){Script+=" modelid1="+form.modelid1.value+",";}
if (form.modelid2.value != modelid2){Script+=" modelid2="+form.modelid2.value+",";}
if (form.modelid3.value != modelid3){Script+=" modelid3="+form.modelid3.value+",";}
if (form.modelid4.value != modelid4){Script+=" modelid4="+form.modelid4.value+",";}
if (form.mingold.value != mingold){Script+=" mingold="+form.mingold.value+",";}
if (form.maxgold.value != maxgold){Script+=" maxgold="+form.maxgold.value+",";}
if (form.minlevel.value != minlevel){Script+=" minlevel="+form.minlevel.value+",";}
if (form.maxlevel.value != maxlevel){Script+=" maxlevel="+form.maxlevel.value+",";}
if (form.Health_mod.value != Health_mod){Script+=" Health_mod="+form.Health_mod.value+",";}
if (form.Mana_mod.value != Mana_mod){Script+=" Mana_mod="+form.Mana_mod.value+",";}
if (form.VehicleId.value != VehicleId){Script+=" VehicleId="+form.VehicleId.value+",";}
if (form.exp.value != exp){Script+=" exp="+form.exp.value+",";}
if (form.lootid.value != lootid){Script+=" lootid="+form.lootid.value+",";}
if (form.pickpocketloot.value != pickpocketloot){Script+=" pickpocketloot="+form.pickpocketloot.value+",";}
if (form.skinloot.value != skinloot){Script+=" skinloot="+form.skinloot.value+",";}
if (form.resistance1.value != resistance1){Script+=" resistance1="+form.resistance1.value+",";}
if (form.resistance2.value != resistance2){Script+=" resistance2="+form.resistance2.value+",";}
if (form.resistance3.value != resistance3){Script+=" resistance3="+form.resistance3.value+",";}
if (form.resistance4.value != resistance4){Script+=" resistance4="+form.resistance4.value+",";}
if (form.resistance5.value != resistance5){Script+=" resistance5="+form.resistance5.value+",";}
if (form.resistance6.value != resistance6){Script+=" resistance6="+form.resistance6.value+",";}
if (form.questItem1.value != questItem1){Script+=" questItem1="+form.questItem1.value+",";}
if (form.questItem2.value != questItem2){Script+=" questItem2="+form.questItem2.value+",";}
if (form.questItem3.value != questItem3){Script+=" questItem3="+form.questItem3.value+",";}
if (form.questItem4.value != questItem4){Script+=" questItem4="+form.questItem4.value+",";}
if (form.questItem5.value != questItem5){Script+=" questItem5="+form.questItem5.value+",";}
if (form.questItem6.value != questItem6){Script+=" questItem6="+form.questItem6.value+",";}
if (form.mechanic_immune_mask .value != mechanic_immune_mask ){Script+=" mechanic_immune_mask ="+form.mechanic_immune_mask .value+",";}
if (form.PetSpellDataId.value != PetSpellDataId){Script+=" PetSpellDataId="+form.PetSpellDataId.value+",";}
if (form.flags_extra.value != flags_extra){Script+=" flags_extra="+form.flags_extra.value+",";}
//entry
if (form.entry.value==entry){Where=" WHERE entry="+entry;}
else{Where=" WHERE entry="+form.entry.value;}

Script=Script.substr(0, Script.length-1);
Script+=Where;
if (isNaN(form.entry.value) ==true){Script=""; Where="";}

form.code.value=Script;

location.href='creature_script.php?code='+Script;
}
</script>
<p align="right"><input type="submit" value="Show Creature Template Script" OnClick='Scripts()'></p>
<?php
}
?>
