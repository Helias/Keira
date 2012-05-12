<?php
include "db-config.php";
include "menu.php";
include "item_menu.php";
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<input type="hidden" name="entry" value="<?php echo $entry; ?>">
<div class="scroll" style="height:80%">
<table border="1" id="list">
<tr>
<td>entry</td>
<td>item</td>
<td>ChanceOrQuestChance</td>
<td>lootmode</td>
<td>groupid</td>
<td>mincountOrRef</td>
<td>maxcount</td>
<td>table</td>
<td>name</td>
</tr>
<?php
$entry=$_GET['entry'];
if ($entry != "")
{
	$count=0;
	for($i=0; $i<6; $i++)
	{
		switch($i)
		{
			case 0:
				$table="creature_loot_template";
				$table2="creature_template";
				$loot_id="lootid";
			break;
			case 1:
				$table="pickpocketing_loot_template";
				$loot_id="pickpocketloot";
				$table2="creature_template";
			break;
			case 2:
				$table="skinning_loot_template";
				$table2="creature_template";
				$loot_id="skinloot";
			break;
			case 3:
				$table="gameobject_loot_template";
				$table2="gameobject_template";
				$loot_id="data1";
			break;
			case 4:
				$table="reference_loot_template";
				$table2="item_template";
				$loot_id="entry";
			break;
			case 5:
				$table="item_loot_template";
				$table2="item_template";
				$loot_id="entry";
			break;
		}
		$query=mysql_query("SELECT * FROM $table WHERE item=$entry");
		while($row=mysql_fetch_array($query))
		{
			$query_creature=mysql_query("SELECT name FROM $table2 WHERE $loot_id={$row['entry']};");
			while ($row_creature=mysql_fetch_array($query_creature))
			{
				$count++;
				if($i==4)
				{
					$row_creature['name']="";
				}
?>
<tr id="<?php echo $count; ?>" OnClick="remove_target(); document.getElementById('list').rows[this.id].className='target';" OnDblClick="location.href='<?php if($i !=4){echo $table2;}else{echo "reference_loot";} ?>.php?entry=<?php echo $row['entry']; ?>';">
<td><?php echo $row['entry']; ?></td>
<td><?php echo $row['item']; ?></td>
<td><?php echo $row['ChanceOrQuestChance']; ?></td>
<td><?php echo $row['lootmode']; ?></td>
<td><?php echo $row['groupid']; ?></td>
<td><?php echo $row['mincountOrRef']; ?></td>
<td><?php echo $row['maxcount']; ?></td>
<td><?php echo $table; ?></td>
<td><?php echo $row_creature['name']; ?></td>
</tr>
<?php
			}
		}
	}
}
?>
</table>
</scroll>
<script type="text/javascript">
function remove_target()
{
	for(var i=1; i<document.getElementById("list").rows.length; i++)
	{
		if(document.getElementById(i).className != "del")
		{
			document.getElementById(i).className="";
		}
	}
}
</script>
</form>