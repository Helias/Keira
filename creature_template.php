<?php
include "db-config";
include "menu.php"; 
include "creature_menu.php";
$entry=$_GET['entry'];
if ($entry== "")
{
	$query=mysql_query("SELECT * FROM creature_template WHERE entry=1");
	$query2=mysql_query("SELECT Killcredit1,Killcredit2 FROM creature_template WHERE entry=1");
}
else
{
	$query=mysql_query("SELECT * FROM creature_template WHERE entry=$entry");
	$query2=mysql_query("SELECT Killcredit1,Killcredit2,questitem1,questitem2,questitem3,questitem4,questitem5,questitem6 FROM creature_template WHERE entry=$entry");
}
while (($row=mysql_fetch_array($query)) AND ($rows=mysql_fetch_array($query2)))
{
if ($entry == "")
{
	$entry="Write Entry";
	$row="";
	$rows="";
}
?>
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
<td><input type="text" value="<?php echo $entry; ?>" style="width: 125px; height:23px;" name="entry" ><input type="submit" value="" style="width: 15px; height; 23;" OnClick="location.href='creature_template.php?<?php echo $entry ?>'"></td>
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
<td><input type="text" value="<?php echo htmlspecialchars($rows['Killcredit1']); ?>" style="width: 300px; height:23px;" name="Killcredit1"></td>
<td><input type="text" value="<?php echo htmlspecialchars($rows['Killcredit2']); ?>" style="width: 300px; height:23px;" name="Killcredit2"></td>
</tr>
</table>
<table>
<tr>
<td>name</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['name']); ?>" style="width: 605px; height:23px;" name="name"></td>
</tr>
</table>
<table>
<tr>
<td>subname</td>
<td>IconName</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['subname']); ?>" style="width: 300px; height:23px;" name="subname"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['IconName']); ?>" style="width: 300px; height:23px;" name="IconName"></td>
</tr>
</table>
<table>
<tr>
<td>modelid_1</td>
<td>modelid_2</td>
<td>modelid_3</td>
<td>modelid_4</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['modelid_1']); ?>" style="width: 150px; height:23px;" name="modelid_1"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['modelid_2']); ?>" style="width: 150px; height:23px;" name="modelid_2"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['modelid_3']); ?>" style="width: 150px; height:23px;" name="modelid_3"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['modelid_4']); ?>" style="width: 150px; height:23px;" name="modelid_4"></td>
</tr>
<tr>
<td>mingold</td>
<td>maxgold</td>
<td>minlevel</td>
<td>maxlevel</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['mingold']); ?>" style="width: 150px; height:23px;" name="mingold"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['maxgold']); ?>" style="width: 150px; height:23px;" name="maxgold"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['minlevel']); ?>" style="width: 150px; height:23px;" name="minlevel"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['maxlevel']); ?>" style="width: 150px; height:23px;" name="maxlevel"></td>
</tr>
<tr>
<td>minhealth</td>
<td>maxhealth</td>
<td>minmana</td>
<td>maxmana</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['minhealth']); ?>" style="width: 150px; height:23px;" name="minhealth"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['maxhealth']); ?>" style="width: 150px; height:23px;" name="maxhealth"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['minmana']); ?>" style="width: 150px; height:23px;" name="minmana"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['maxmana']); ?>" style="width: 150px; height:23px;" name="maxmana"></td>
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
<td><input type="text" value="<?php echo htmlspecialchars($row['lootid']); ?>" style="width: 150px; height:23px;" name="lootid"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['resistance1']); ?>" style="width: 150px; height:23px;" name="resistance1"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['resistance4']); ?>" style="width: 150px; height:23px;" name="resistance4"></td>
</tr>
<tr>
<td>pickpocketloot</td>
<td>resistance2</td>
<td>resistance5</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['pickpocketloot']); ?>" style="width: 150px; height:23px;" name="pickpocketloot"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['resistance2']); ?>" style="width: 150px; height:23px;" name="resistance2"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['resistance5']); ?>" style="width: 150px; height:23px;" name="resistance5"></td>
</tr>
<tr>
<td>skinloot</td>
<td>resistance3</td>
<td>resistance6</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['skinloot']); ?>" style="width: 150px; height:23px;" name="skinloot"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['resistance3']); ?>" style="width: 150px; height:23px;" name="resistance3"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['resistance6']); ?>" style="width: 150px; height:23px;" name="resistance6"></td>
</tr>
</table>
<p></p>
<table>
<tr>
<td>Questitems</td>
</tr>
<tr>
<td>questitem1</td>
<td>questitem2</td>
<td>mechanic_immune_mask</td>
<td style="width: 102px;"></td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($rows['questitem1']); ?>" style="width: 150px; height:23px;" name="questitem1"></td>
<td><input type="text" value="<?php echo htmlspecialchars($rows['questitem2']); ?>" style="width: 150px; height:23px;" name="questitem2"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['mechanic_immune_mask']); ?>" style="width: 150px; height:23px;" name="mechanic_immune_mask"></td>
</tr>
<tr>
<td>questitem3</td>
<td>questitem4</td>
<td>PetSpellDataId</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($rows['questitem3']); ?>" style="width: 150px; height:23px;" name="questitem3"></td>
<td><input type="text" value="<?php echo htmlspecialchars($rows['questitem4']); ?>" style="width: 150px; height:23px;" name="questitem4"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['PetSpellDataId']); ?>" style="width: 150px; height:23px;" name="PetSpellDataId"></td>
</tr>
<tr>
<td>questitem5</td>
<td>questitem6</td>
<td>flags_extra</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($rows['questitem5']); ?>" style="width: 150px; height:23px;" name="questitem5"></td>
<td><input type="text" value="<?php echo htmlspecialchars($rows['questitem6']); ?>" style="width: 150px; height:23px;" name="questitem6"></td>
<td><input type="text" value="<?php echo htmlspecialchars($row['flags_extra']); ?>" style="width: 150px; height:23px;" name="flags_extra"></td>
</tr>
</table>
<input type="hidden" name="code">
</form>
<script type="text/javascript">
<!--
function Scripts()
{
entry='<?php echo htmlspecialchars($row['entry']); ?>';
difficulty_entry_1='<?php echo htmlspecialchars($row['difficulty_entry_1']); ?>';
difficulty_entry_2='<?php echo htmlspecialchars($row['difficulty_entry_2']); ?>';
difficulty_entry_3='<?php echo htmlspecialchars($row['difficulty_entry_3']); ?>';
Killcredit1='<?php echo htmlspecialchars($rows['Killcredit1']); ?>';
Killcredit2='<?php echo htmlspecialchars($rows['Killcredit2']); ?>';
name='<?php echo htmlspecialchars($row['name']); ?>';
subname='<?php echo htmlspecialchars($row['subname']); ?>';
IconName='<?php echo htmlspecialchars($row['IconName']); ?>';
modelid_1='<?php echo htmlspecialchars($row['modelid_1']); ?>';
modelid_2='<?php echo htmlspecialchars($row['modelid_2']); ?>';
modelid_3='<?php echo htmlspecialchars($row['modelid_3']); ?>';
modelid_4='<?php echo htmlspecialchars($row['modelid_4']); ?>';
mingold='<?php echo htmlspecialchars($row['mingold']); ?>';
maxgold='<?php echo htmlspecialchars($row['maxgold']); ?>';
minlevel='<?php echo htmlspecialchars($row['minlevel']); ?>';
maxlevel='<?php echo htmlspecialchars($row['maxlevel']); ?>';
minhealth='<?php echo htmlspecialchars($row['minhealth']); ?>';
maxhealth='<?php echo htmlspecialchars($row['maxhealth']); ?>';
minmana='<?php echo htmlspecialchars($row['minmana']); ?>';
maxmana='<?php echo htmlspecialchars($row['maxmana']); ?>';
resistance1='<?php echo htmlspecialchars($row['resistance1']); ?>';
resistance2='<?php echo htmlspecialchars($row['resistance2']); ?>';
resistance3='<?php echo htmlspecialchars($row['resistance3']); ?>';
resistance4='<?php echo htmlspecialchars($row['resistance4']); ?>';
resistance5='<?php echo htmlspecialchars($row['resistance5']); ?>';
resistance6='<?php echo htmlspecialchars($row['resistance6']); ?>';
lootid='<?php echo htmlspecialchars($row['lootid']); ?>';
pickpocketloot='<?php echo htmlspecialchars($row['pickpocketloot']); ?>';
skinloot='<?php echo htmlspecialchars($row['skinloot']); ?>';
questitem1='<?php echo htmlspecialchars($rows['questitem1']); ?>';
questitem2='<?php echo htmlspecialchars($rows['questitem2']); ?>';
questitem3='<?php echo htmlspecialchars($rows['questitem3']); ?>';
questitem4='<?php echo htmlspecialchars($rows['questitem4']); ?>';
questitem5='<?php echo htmlspecialchars($rows['questitem5']); ?>';
questitem6='<?php echo htmlspecialchars($rows['questitem6']); ?>';
mechanic_immune_mask='<?php echo htmlspecialchars($row['mechanic_immune_mask']); ?>';
PetSpellDataId='<?php echo htmlspecialchars($row['PetSpellDataId']); ?>';
flags_extra='<?php echo htmlspecialchars($row['flags_extra']); ?>';

Script="UPDATE creature_template SET";
if(form.difficulty_entry_1.value != difficulty_entry_1){Script+=" difficulty_entry_1="+form.difficulty_entry_1.value+",";}
if (form.difficulty_entry_2.value != difficulty_entry_2){Script+=" difficulty_entry_2="+form.difficulty_entry_2.value+",";}
if (form.difficulty_entry_3.value != difficulty_entry_3){Script+=" difficulty_entry_3="+form.difficulty_entry_3.value+",";}
if (form.Killcredit1.value != Killcredit1){Script+=" Killcredit1="+form.Killcredit1.value+",";}
if (form.Killcredit2.value != Killcredit2){Script+=" Killcredit2="+form.Killcredit2.value+",";}
if (form.name.value != name){Script+=" name="+form.name.value+",";}
if (form.subname.value != subname){Script+=" subname="+form.subname.value+",";}
if (form.IconName.value != IconName){Script+=" IconName="+form.IconName.value+",";}
if (form.modelid_1.value != modelid_1){Script+=" modelid_1="+form.modelid_1.value+",";}
if (form.modelid_2.value != modelid_2){Script+=" modelid_2="+form.modelid_2.value+",";}
if (form.modelid_3.value != modelid_3){Script+=" modelid_3="+form.modelid_3.value+",";}
if (form.modelid_4.value != modelid_4){Script+=" modelid_4="+form.modelid_4.value+",";}
if (form.mingold.value != mingold){Script+=" mingold="+form.mingold.value+",";}
if (form.maxgold.value != maxgold){Script+=" maxgold="+form.maxgold.value+",";}
if (form.minlevel.value != minlevel){Script+=" minlevel="+form.minlevel.value+",";}
if (form.maxlevel.value != maxlevel){Script+=" maxlevel="+form.maxlevel.value+",";}
if (form.minhealth.value != minhealth){Script+=" minhealth="+form.minhealth.value+",";}
if (form.maxhealth.value != maxhealth){Script+=" maxhealth="+form.maxhealth.value+",";}
if (form.minmana.value != minmana){Script+=" minmana="+form.minmana.value+",";}
if (form.maxmana.value != maxmana){Script+=" maxmana="+form.maxmana.value+",";}
if (form.lootid.value != lootid){Script+=" lootid="+form.lootid.value+",";}
if (form.pickpocketloot.value != pickpocketloot){Script+=" pickpocketloot="+form.pickpocketloot.value+",";}
if (form.skinloot.value != skinloot){Script+=" skinloot="+form.skinloot.value+",";}
if (form.resistance1.value != resistance1){Script+=" resistance1="+form.resistance1.value+",";}
if (form.resistance2.value != resistance2){Script+=" resistance2="+form.resistance2.value+",";}
if (form.resistance3.value != resistance3){Script+=" resistance3="+form.resistance3.value+",";}
if (form.resistance4.value != resistance4){Script+=" resistance4="+form.resistance4.value+",";}
if (form.resistance5.value != resistance5){Script+=" resistance5="+form.resistance5.value+",";}
if (form.resistance6.value != resistance6){Script+=" resistance6="+form.resistance6.value+",";}
if (form.questitem1.value != questitem1){Script+=" questitem1="+form.questitem1.value+",";}
if (form.questitem2.value != questitem2){Script+=" questitem2="+form.questitem2.value+",";}
if (form.questitem3.value != questitem3){Script+=" questitem3="+form.questitem3.value+",";}
if (form.questitem4.value != questitem4){Script+=" questitem4="+form.questitem4.value+",";}
if (form.questitem5.value != questitem5){Script+=" questitem5="+form.questitem5.value+",";}
if (form.questitem6.value != questitem6){Script+=" questitem6="+form.questitem6.value+",";}
if (form.mechanic_immune_mask .value != mechanic_immune_mask ){Script+=" mechanic_immune_mask ="+form.mechanic_immune_mask .value+",";}
if (form.PetSpellDataId.value != PetSpellDataId){Script+=" PetSpellDataId="+form.PetSpellDataId.value+",";}
if (form.flags_extra.value != flags_extra){Script+=" flags_extra="+form.flags_extra.value+",";}
//entry
if (form.entry.value==entry){Where=" WHERE entry="+entry;}
else{Where=" WHERE entry="+form.entry.value;}

Script+=Where;
if (isNaN(form.entry.value) ==true){Script=""; Where="";}

form.code.value=Script;

location.href='creature_script.php?code='+Script;
}
-->
</script>
<p align="right"><input type="submit" value="Show Creature Template Script" OnClick='Scripts()'></p>
<?php
}
?>
