<?php
include "db-config.php";
include "menu.php";
include "item_menu.php";
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<input type="hidden" name="entry" value="<?php echo $entry; ?>">
<div class="scroll" style="width:1400%">
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
	for($i=0; $i<8; $i++)
	{
		switch($i)
		{
			case 0:
				$table="creature_loot_template";
				$table2="creature_template";
				$condition="lootid";
			break;
			case 1:
				$table="pickpocketing_loot_template";
				$condition="pickpocketloot";
				$table2="creature_template";
			break;
			case 2:
				$table="skinning_loot_template";
				$table2="creature_template";
				$condition="skinloot";
			break;
			case 3:
				$table="gameobject_loot_template";
				$table2="gameobject_template";
				$condition="data1";
			break;
			case 4:
				$table="reference_loot_template";
				$table2="item_template";
				$condition="entry";
			break;
			case 5:
				$table="item_loot_template";
				$table2="item_template";
				$condition="entry";
			break;
			case 6:
				$table="disenchant_loot_template";
				$table2="item_template";
				$condition="DisenchantID";
			break;
			case 7:
				$table="npc_vendor";
				$table2="creature_template";
				$condition="entry";
			break;
		}
		$query=mysql_query("SELECT * FROM $table WHERE item=$entry");
		while($row=mysql_fetch_array($query))
		{
			if($i==6)
			{
				$query2=mysql_query("SELECT * FROM $table2 WHERE $condition={$row['entry']};");
				$names="";
				$coun=0;
				while($row2=mysql_fetch_array($query2))
				{
					$coun++;
					$names.=$row2['name'];
					if($count != 1)
					{
						$names.=",";
					}
					$query_name=mysql_query("SELECT name FROM $table2 WHERE entry={$row2['entry']};");
				}
			}
			else
			{
				$query_name=mysql_query("SELECT name FROM $table2 WHERE $condition={$row['entry']};");
			}
			while ($row_name=mysql_fetch_array($query_name))
			{
				$count++;
				if($i==4)
				{
					$row_name['name']="";
				}
				else if($i==6)
				{
					$row_name['name']=$names;
				}
?>
<tr id="<?php echo $count; ?>" OnClick="remove_target(); document.getElementById('list').rows[this.id].className='target';" OnDblClick="location.href='<?php 
if ($i==4)
{
	echo "reference_loot";
}
else if($i==6)
{
	echo "looted_from";
}
else
{
	echo $table2;
}
?>.php?entry=<?php if($i==6){echo $row['item'];}else{echo $row['entry'];} ?>';">
<td><?php echo $row['entry']; ?></td>
<td><?php echo $row['item']; ?></td>
<td><?php echo $row['ChanceOrQuestChance']; ?></td>
<td><?php echo $row['lootmode']; ?></td>
<td><?php echo $row['groupid']; ?></td>
<td><?php echo $row['mincountOrRef']; ?></td>
<td><?php echo $row['maxcount']; ?></td>
<td><?php echo $table; ?></td>
<td><?php echo $row_name['name']; ?></td>
</tr>
<?php
			}
		}
	}
}
?>
</table>
</div>
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