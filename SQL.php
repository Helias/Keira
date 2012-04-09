<?php
include "db-config";
include "menu.php";
?>
<style type="text/css">
.bold {
	font-weight:bold; 
	color:black;
}
</style>
<script type="text/javascript">
function mysql_send(form_ins)
{
	script=false;
	if (form_ins.script.value.search(/SELECT/i) == -1)
	script=true;
	if (script)
	{
		alert("Can not open a Resultset");
		form_ins.x.value=0;
		return false;
	}
	else 
	{ 
		form_ins.x.value="1";
		return true;
	}
}
</script>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="sql" OnSubmit="return mysql_send(this)">
<input type="hidden" value="0" name="x">
<p>Code SQL:</p>
<table>
<tr><td>SELECT 
<select id="columns" OnChange="adapt_columns(this.id)">
<option value="*" id="0">All</option>
<?php
$id=0;
$id_2=1;
for($count=0; $count<2; $count++)
{
	if($Database !== $Characters)
	{
		if ($count==0)
		{
			$The_DB=$Database;
		}
		else 
		{
			$The_DB=$Characters;
			$id++;
		}
	}
	else 
	{
		$The_DB=$Database; 
		$count=2;
		break;
	}
	echo "<option disabled=\"disabled\" value=\"$The_DB\" class=\"bold\">$The_DB</option>";
	$query_tables=mysql_query("SHOW TABLES FROM $The_DB");
	while($row_tables=mysql_fetch_array($query_tables))
	{
		$c=0;
		$id++;
		$query_columns=mysql_query("SHOW COLUMNS FROM ".$The_DB.".{$row_tables['Tables_in_'.$The_DB]}");
		while ($row_columns=mysql_fetch_assoc($query_columns))
		{
			$id_2++;
			if($c==0)
			{
				$c=1; 
				echo "<option id=\"$id".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."\" value=\"".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."\" class=\"bold\" disabled=\"disabled\">".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."</option>\n";
				$id_2++;
			}
			echo "<option value=\"".htmlspecialchars($row_columns['Field'])."\" Id=\"$id\" class=\"$id_2\">".htmlspecialchars($row_columns['Field'])."</option>\n";
		}
	}
}
?>
</select>
</td></tr>
<tr><td>FROM
<select id="tables" OnChange="adapt_tables(this.id)">
<?php
$id=0;
for($count=0; $count<2; $count++)
{
	if($Database !== $Characters)
	{
		if ($count==0)
		{
			$The_DB=$Database;
		}
		else 
		{
			$The_DB=$Characters;
		}
	}
	else 
	{
		$The_DB=$Database; 
		$count=2;
		break;
	}
	$query_tables=mysql_query("SHOW TABLES FROM $The_DB");
	$c=0;
	while($row_tables=mysql_fetch_array($query_tables))
	{
		$id++;
		if ($c==0)
		{
			echo "<option disabled=\"disabled\" value=\"$The_DB\" class=\"bold\">$The_DB</option>\n";
			$c=1;
		}
		echo "<option value=\"".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."\" id=\"$id\">".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."</option>\n";
	}
}
?>
</select>
</td></tr>
<tr><td>WHERE <select id="where" OnChange="adapt_columns2(this.id);">
<?php
$id=0;
$id_2=0;
for($count=0; $count<2; $count++)
{
	if($Database !== $Characters)
	{
		if ($count==0)
		{
			$The_DB=$Database;
		}
		else 
		{
			$The_DB=$Characters;
			$id++;
		}
	}
	else 
	{
		$The_DB=$Database; 
		$count=2;
		break;
	}
	echo "<option disabled=\"disabled\" value=\"$The_DB\" class=\"bold\">$The_DB</option>";
	$query_tables=mysql_query("SHOW TABLES FROM $The_DB");
	while($row_tables=mysql_fetch_array($query_tables))
	{
		$c=0;
		$id++;
		$query_columns=mysql_query("SHOW COLUMNS FROM ".$The_DB.".{$row_tables['Tables_in_'.$The_DB]}");
		while ($row_columns=mysql_fetch_assoc($query_columns))
		{
			$id_2++;
			if($c==0)
			{
				$c=1; 
				echo "<option id=\"$id".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."\" value=\"".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."\" class=\"bold\" disabled=\"disabled\">".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."</option>\n";
				$id_2++;
			}
			echo "<option value=\"".htmlspecialchars($row_columns['Field'])."\" Id=\"$id\" class=\"$id_2\">".htmlspecialchars($row_columns['Field'])."</option>\n";
		}
	}
}
?>
<input type="text" value="IN ();" id="where_code" OnChange="refresh_script();">
<input type="submit" value="Search">
</form>
</td></tr>
</table>
<input type="text" style="width:100%; height:5%;" value="SELECT * FROM access_requirement WHERE mapId IN ();" name="script" id="script">
<script type="text/javascript">
function refresh_script()
{
	var columns=document.getElementById("columns").options[document.getElementById("columns").selectedIndex].value;
	var table=document.getElementById("tables").options[document.getElementById("tables").selectedIndex].value;
	var where=document.getElementById("where").options[document.getElementById("where").selectedIndex].value+" "+document.getElementById("where_code").value;
	var code="SELECT "+columns+" FROM "+table+" WHERE "+where;
	if (columns=="All") { columns="*"; }
	if (where==document.getElementById("where").options[document.getElementById("where").selectedIndex].value) { code="SELECT "+columns+" FROM "+table; }
	document.getElementById("script").value=code;
}

function adapt_columns(sel)
{
	select=document.getElementById(sel);
	if(select.options[select.selectedIndex].value != "*")
	{
		document.getElementById("tables").selectedIndex=select.options[select.selectedIndex].id;
	}
	refresh_script();
}

function adapt_columns2(sel)
{
	select=document.getElementById(sel);
	document.getElementById("tables").selectedIndex=select.options[select.selectedIndex].id;
	refresh_script();
}

function adapt_tables(sel)
{
	select=document.getElementById(sel);
	if(document.getElementById("columns").options[document.getElementById("columns").selectedIndex].value != "*")
	{
		document.getElementById("columns").selectedIndex=document.getElementById(select.options[select.selectedIndex].id).className;
	}
	
	document.getElementById("where").selectedIndex=document.getElementById(select.options[select.selectedIndex].id).className;
	refresh_script();
}
</script>
<div style="width:100%; height:60%; overflow:auto;">
<table border="1">
<?php
$script=$_POST['script'];
$x=$_POST['x'];
$table=$_POST['table'];
if($x==1)
{
	$query=mysql_query($script);
	echo "<tr>";
	for ($i=0; $i<mysql_num_fields($query); $i++)
	{
		echo "<td>".mysql_field_name($query, $i)."</td>";
	}
	echo "</tr>";
	while($row=mysql_fetch_row($query))
	{
		echo "<tr>";
		for ($i=0; $i<count($row); $i++)
		{
			echo "<td>$row[$i]</td>";
		}
		echo "</tr>";
	}
}
?>
</table>
</div>