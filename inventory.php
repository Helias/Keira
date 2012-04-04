<?php
include "db-config.php";
include "menu.php";
include "character_menu.php";
$Databases=mysql_select_db("$Characters", $db);
if (!$Databases)
{
	echo "Can't connect to the database characters!";
	header("location:Connect.html");
}
?>
<style type="text/css">
.target {
	background-color:deepskyblue;
}
</style>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<table border="1">
<tr>
<td>Guid</td>
<td>Bag</td>
<td>Slot</td>
<td>Item</td>
<td>Name</td>
</tr>
<?php
$guid=$_GET['guid'];
if ($guid== "")
{
	$query=mysql_query("SELECT * FROM character_inventory");
}
else
{
	$count=0;
	$query=mysql_query("SELECT * FROM character_inventory WHERE guid=$guid ORDER BY slot");
	while ($row=mysql_fetch_array($query))
	{
		$count++;
		if ($guid == "")
		{
			$guid="";
			$row="";
		}
		$items_names=mysql_query("SELECT name FROM $Database.item_template WHERE entry IN (SELECT itemEntry FROM item_instance WHERE guid={$row['item']})");
		while($row_items=mysql_fetch_array($items_names))
		{
?>
<tr id="<?php echo $count; ?>">
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $guid.",".htmlspecialchars($row['bag']).",".htmlspecialchars($row['slot']).",".htmlspecialchars($row['item']); ?>);"><?php echo $guid; ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $guid.",".htmlspecialchars($row['bag']).",".htmlspecialchars($row['slot']).",".htmlspecialchars($row['item']); ?>);"><?php echo htmlspecialchars($row['bag']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $guid.",".htmlspecialchars($row['bag']).",".htmlspecialchars($row['slot']).",".htmlspecialchars($row['item']); ?>);"><?php echo htmlspecialchars($row['slot']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $guid.",".htmlspecialchars($row['bag']).",".htmlspecialchars($row['slot']).",".htmlspecialchars($row['item']); ?>);"><?php echo htmlspecialchars($row['item']); ?></td>
<td OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo $guid.",".htmlspecialchars($row['bag']).",".htmlspecialchars($row['slot']).",".htmlspecialchars($row['item']); ?>);"><?php echo htmlspecialchars($row_items['name']); ?></td>
</tr>
<?php
		}
	}
}
?>
</table>
<table>
<tr>
<td>guid</td>
<td>bag</td>
<td>slot</td>
<td>item</td>
</tr>
<tr>
<br>
<td><input type="text" id="guid" name="guid"></td>
<td><input type="text" id="bag" name="bag"></td>
<td><input type="text" id="slot" name="slot"></td>
<td><input type="text" id="item" name="item"></td>
</tr>
</table>
<script type="text/Javascript">
var count=<?php echo $count; ?>;
function remove_target()
{
	for(var i=1; i<count+1; i++)
	{
		document.getElementById(i).className="";
	}
}

function get_values(guid, bag, slot, item)
{
	document.getElementById("guid").value=guid;
	document.getElementById("bag").value=bag;
	document.getElementById("slot").value=slot;
	document.getElementById("item").value=item;
}
</script>
</form>
<p align="right"><input type="submit" value="Show Character Inventory Script"></p>