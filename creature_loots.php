<?php
function get_loot($table, $loot)
{
	$entry=$_GET['entry'];
	if ($entry != "")
	{
		$query_loot=mysql_query("SELECT $loot FROM creature_template WHERE entry=$entry");
		while($row_loot=mysql_fetch_array($query_loot))
		{
			$loot_id=$row_loot['$loot'];
		}
		if($loot_id==0)
		{
			$loot_id=$entry;
		}
		$count=0;
		$query=mysql_query("SELECT * FROM $table WHERE entry=$loot_id ORDER BY item");
		while ($row=mysql_fetch_array($query))
		{
			$count++;
			if ($loot_id == "")
			{
				$loot_id="";
				$row="";
			}
			$items_names=mysql_query("SELECT name FROM item_template WHERE entry IN (SELECT item FROM $table WHERE entry=$loot_id AND item={$row['item']})");
			$item_name="";
			while($row_items=mysql_fetch_array($items_names))
			{
				if($row['mincountOrRef'] >= 0)
				{
					$item_name=$row_items['name'];
				}
			}
?>
<tr id="<?php echo $count; ?>">
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $loot_id.",".htmlspecialchars($row['item']).",".htmlspecialchars($row['ChanceOrQuestChance']).",".htmlspecialchars($row['groupid']).",".htmlspecialchars($row['mincountOrRef']).",".htmlspecialchars($row['maxcount']).",".htmlspecialchars($row['lootmode']); ?>);"><?php echo $loot_id; ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $loot_id.",".htmlspecialchars($row['item']).",".htmlspecialchars($row['ChanceOrQuestChance']).",".htmlspecialchars($row['groupid']).",".htmlspecialchars($row['mincountOrRef']).",".htmlspecialchars($row['maxcount']).",".htmlspecialchars($row['lootmode']); ?>);"><?php echo htmlspecialchars($row['item']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $loot_id.",".htmlspecialchars($row['item']).",".htmlspecialchars($row['ChanceOrQuestChance']).",".htmlspecialchars($row['groupid']).",".htmlspecialchars($row['mincountOrRef']).",".htmlspecialchars($row['maxcount']).",".htmlspecialchars($row['lootmode']); ?>);"><?php echo htmlspecialchars($row['ChanceOrQuestChance']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $loot_id.",".htmlspecialchars($row['item']).",".htmlspecialchars($row['ChanceOrQuestChance']).",".htmlspecialchars($row['groupid']).",".htmlspecialchars($row['mincountOrRef']).",".htmlspecialchars($row['maxcount']).",".htmlspecialchars($row['lootmode']); ?>);"><?php echo htmlspecialchars($row['lootmode']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $loot_id.",".htmlspecialchars($row['item']).",".htmlspecialchars($row['ChanceOrQuestChance']).",".htmlspecialchars($row['groupid']).",".htmlspecialchars($row['mincountOrRef']).",".htmlspecialchars($row['maxcount']).",".htmlspecialchars($row['lootmode']); ?>);"><?php echo htmlspecialchars($row['groupid']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $loot_id.",".htmlspecialchars($row['item']).",".htmlspecialchars($row['ChanceOrQuestChance']).",".htmlspecialchars($row['groupid']).",".htmlspecialchars($row['mincountOrRef']).",".htmlspecialchars($row['maxcount']).",".htmlspecialchars($row['lootmode']); ?>);"><?php echo htmlspecialchars($row['mincountOrRef']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $loot_id.",".htmlspecialchars($row['item']).",".htmlspecialchars($row['ChanceOrQuestChance']).",".htmlspecialchars($row['groupid']).",".htmlspecialchars($row['mincountOrRef']).",".htmlspecialchars($row['maxcount']).",".htmlspecialchars($row['lootmode']); ?>);"><?php echo htmlspecialchars($row['maxcount']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $loot_id.",".htmlspecialchars($row['item']).",".htmlspecialchars($row['ChanceOrQuestChance']).",".htmlspecialchars($row['groupid']).",".htmlspecialchars($row['mincountOrRef']).",".htmlspecialchars($row['maxcount']).",".htmlspecialchars($row['lootmode']); ?>);"><?php echo $item_name; ?></td>
</tr>
<?php
		}
	}
}
?>