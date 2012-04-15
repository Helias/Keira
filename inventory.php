<?php
include "db-config.php";
include "menu.php";
include "character_menu.php";
$Databases=mysql_select_db("$Characters", $connect);
if (!$Databases)
{
	echo "Can't connect to the database characters!";
	header("location:Connect.php");
}
?>
<style type="text/css">
.target {
	background-color:deepskyblue;
}
.del {
	display:none;
}
</style>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<table border="1" id="inventory">
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
		$items_names=mysql_query("SELECT name FROM $Database.item_template WHERE entry IN (SELECT itemEntry FROM item_instance WHERE guid={$row['item']} AND owner_guid=$guid)");
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
<td><input type="button" value="+" OnClick="add()"></td>
<td><input type="button" value="<-->" OnClick="exchange()"></td>
<td><input type="button" value="X" OnClick="del()"></td>
</tr>
</table>
<script type="text/Javascript">
var n=0;
var count=document.getElementById("inventory").rows.length;
var deletes="DELETE FROM `character_inventory` WHERE guid= AND item IN ()";
function remove_target()
{
	for(var i=1; i<document.getElementById("inventory").rows.length; i++)
	{
		if(document.getElementById(i).className != "del")
		{
			document.getElementById(i).className="";
		}
	}
}

function get_values(guid, bag, slot, item)
{
	var table=document.getElementById("inventory");
	var tr=document.getElementsByClassName("target")[0].id;
	document.getElementById("guid").value=table.rows[tr].cells[0].innerHTML;
	document.getElementById("bag").value=table.rows[tr].cells[1].innerHTML;
	document.getElementById("slot").value=table.rows[tr].cells[2].innerHTML;
	document.getElementById("item").value=table.rows[tr].cells[3].innerHTML;
}

function add()
{
	var guid=document.getElementById("guid").value;
	var bag=document.getElementById("bag").value;
	var slot=document.getElementById("slot").value;
	var item=document.getElementById("item").value;
	if ((guid != "") && (bag != "") && (slot != "") && (item != ""))
	{
		var table=document.getElementById("inventory");
		var tr=table.insertRow(table.rows.length);
		var td0=tr.insertCell(0);
		var td1=tr.insertCell(1);
		var td2=tr.insertCell(2);
		var td3=tr.insertCell(3);
		tr.id=table.rows.length-1;
		td0.onclick=function() { remove_target(); tr.className='target'; get_values(guid, bag, slot, item); }
		td1.onclick=function() { remove_target(); tr.className='target'; get_values(guid, bag, slot, item); }
		td2.onclick=function() { remove_target(); tr.className='target'; get_values(guid, bag, slot, item); }
		td3.onclick=function() { remove_target(); tr.className='target'; get_values(guid, bag, slot, item); }
		td0.innerHTML=guid;
		td1.innerHTML=bag;
		td2.innerHTML=slot;
		td3.innerHTML=item;
		count++;
	}
	else
	{
		var message="Fill the box of:";
		if (guid == "") { message+=" guid"; }
		if (bag == "") { message+=" bag"; }
		if (slot == "") { message+=" slot"; }
		if (item == "") { message+=" item"; }
		alert(message);
	}
}

function exchange()
{
	var tr=document.getElementsByClassName("target")[0];
	tr.cells[0].innerHTML=document.getElementById("guid").value;
	tr.cells[1].innerHTML=document.getElementById("bag").value;
	tr.cells[2].innerHTML=document.getElementById("slot").value;
	tr.cells[3].innerHTML=document.getElementById("item").value;
	tr.cells[4].innerHTML="";
}

function del()
{
	document.getElementsByClassName("target")[0].className="del";
}
</script>
</form>
<p align="right"><input type="submit" value="Show Character Inventory Script"></p>