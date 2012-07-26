<?php
include "db-config.php";
include "menu.php";
include "gameobject_menu.php";
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<div class="scroll">
<table border="1" id="enchantment">
<tr>
<td>entry</td>
<td>ench</td>
<td>chance</td>
</tr>
<?php
$entry=$_GET['entry'];
if ($entry != "")
{
	$count=0;
	$query=mysql_query("SELECT RandomProperty,RandomSuffix FROM item_template WHERE entry=$entry");
	while ($row=mysql_fetch_array($query))
	{
		if($row['RandomProperty'] != 0 OR $row['RandomSuffix'] != 0)
		{
			if($row['RandomProperty'] != 0)
			{
				$query2=mysql_query("SELECT * FROM gameobject_scripts WHERE entry={$row['RandomProperty']}");
			}
			else
			{
				$query2=mysql_query("SELECT * FROM gameobject_scripts WHERE entry={$row['RandomSuffix']}");
			}
			while($row2=mysql_fetch_array($query2))
			{
				$count++;
?>
<tr id="<?php echo $count; ?>" OnClick="remove_target(); document.getElementById('<?php echo $count; ?>').className='target'; get_values(<?php echo htmlspecialchars($row2['entry']).",".htmlspecialchars($row2['ench']).",".htmlspecialchars($row2['chance']); ?>);">
<td ><?php echo htmlspecialchars($row2['entry']); ?></td>
<td ><?php echo htmlspecialchars($row2['ench']); ?></td>
<td ><?php echo htmlspecialchars($row2['chance']); ?></td>
</tr>
<?php
			}
		}
	}
}
?>
</table>
</div>
<table>
<tr>
<td>entry</td>
<td>ench</td>
<td>chance</td>
</tr>
<tr>
<br>
<td><input type="text" class="medium" id="id" name="id" value="<?php echo $_GET['id']; ?>"></td>
<td><input type="text" class="medium" id="ench" name="ench"></td>
<td><input type="text" class="medium" id="chance" name="chance"></td>
<td><input type="button" value="+" OnClick="add()"></td>
<td><input type="button" value="<-->" OnClick="exchange()"></td>
<td><input type="button" value="X" OnClick="del()"></td>
</tr>
</table>
<script type="text/Javascript">
var insert="";
var entries="";
function remove_target()
{
	for(var i=1; i<document.getElementById("enchantment").rows.length; i++)
	{
		if(document.getElementById(i).className != "del")
		{
			document.getElementById(i).className="";
		}
	}
}

function get_values(entry, ench, chance)
{
	var table=document.getElementById("enchantment");
	var tr=document.getElementsByClassName("target")[0].id;
	document.getElementById("id").value=table.rows[tr].cells[0].innerHTML;
	document.getElementById("ench").value=table.rows[tr].cells[1].innerHTML;
	document.getElementById("chance").value=table.rows[tr].cells[2].innerHTML;
}

function add()
{
	var id=document.getElementById("id").value;
	var ench=document.getElementById("ench").value;
	var chance=document.getElementById("chance").value;
	if ((entry != "") && (item != "") && (chance != ""))
	{
		var table=document.getElementById("enchantment");
		var tr=table.insertRow(table.rows.length);
		var td0=tr.insertCell(0);
		var td1=tr.insertCell(1);
		var td2=tr.insertCell(2);
		tr.id=table.rows.length-1;
		tr.onclick=function() { remove_target(); tr.className='target'; get_values(id, item, chance); }
		td0.innerHTML=id;
		td1.innerHTML=ench;
		td2.innerHTML=chance;
		entries+=","+document.getElementById("ench").value;
		insert+="<br>("+tr.cells[0].innerHTML+","+tr.cells[1].innerHTML+","+tr.cells[2].innerHTML+"),";
	}
	else
	{
		var message="Fill the box of:";
		if (id == "") { message+=" entry"; }
		if (ench == "") { message+=" ench"; }
		if (chance == "") { message+=" chance"; }
		alert(message);
	}
}

function exchange()
{
	var tr=document.getElementsByClassName("target")[0];
	var table=document.getElementById("enchantment");
	var id=document.getElementById("id").value;
	var ench=document.getElementById("ench").value;
	var chance=document.getElementById("chance").value;
	if ((id != "") && (ench != "") && (chance != ""))
	{
		entries+=","+tr.cells[1].innerHTML;
		tr.cells[0].innerHTML=document.getElementById("id").value;
		tr.cells[1].innerHTML=document.getElementById("ench").value;
		tr.cells[2].innerHTML=document.getElementById("chance").value;
		insert+="<br>("+tr.cells[0].innerHTML+","+tr.cells[1].innerHTML+","+tr.cells[2].innerHTML+"),";
	}
	else
	{
		var message="Fill the box of:";
		if (id == "") { message+=" entry"; }
		if (ench == "") { message+=" ench"; }
		if (chance == "") { message+=" chance"; }
		alert(message);
	}
}

function del()
{
	var tr=document.getElementsByClassName("target")[0];
	entries+=","+tr.cells[1].innerHTML;
	tr.className="del";
}

function Scripts()
{
	var Script="";
	var id=document.getElementById("id").value;
	entries=entries.replace(",","");
	if(entries != "")
	{
		if(insert != "")
		{
			Script="DELETE FROM `gameobject_scripts` WHERE entry="+id+" AND item IN ("+entries+"); <br>INSERT INTO `gameobject_scripts` (`entry`,`ench`,`chance`) VALUES"+insert;
			Script=Script.substr(0, Script.length-1);
			Script+=";";
		}
		else
		{
			Script="DELETE FROM `gameobject_scripts` WHERE entry="+id+" AND item IN ("+entries+");";
		}
	}
	location.href="Script.php?code="+Script;
}
</script>
</form>
<p align="right"><input type="submit" value="Show Item Enchantment Script" OnClick="Scripts()"></p>