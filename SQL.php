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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<p>Code SQL:</p>
<table>
<tr><td>SELECT 
<select id="columns" OnChange="adapt_columns(this.id)">
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
	echo "<option disabled=\"disabled\" value=\"$The_DB\" class=\"bold\">$The_DB</option>";
	$query_tables=mysql_query("SHOW TABLES FROM $The_DB");
	while($row_tables=mysql_fetch_array($query_tables))
	{
		$c=0;
		$id++;
		$query_columns=mysql_query("SHOW COLUMNS FROM ".$The_DB.".{$row_tables['Tables_in_'.$The_DB]}");
		while ($row_columns=mysql_fetch_assoc($query_columns)) 
		{if($count==1){echo "asd";}
			if($c==0)
			{
				$c=1; 
				echo "<option value=\"".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."\" class=\"bold\" disabled=\"disabled\">".htmlspecialchars($row_tables['Tables_in_'.$The_DB])."</option>\n";
			}
			echo "<option value=\"".htmlspecialchars($row_columns['Field'])."\" Id=$id>".htmlspecialchars($row_columns['Field'])."</option>\n";
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
<tr><td>WHERE <input type="text"></td></tr>
</table>
<p align="left"><input type="submit" value="Search"></p>
</form>
<script type="text/javascript">
function adapt_columns(sel)
{
	select=document.getElementById(sel);
	document.getElementById("tables").selectedIndex=select.options[select.selectedIndex].id;
}

function adapt_tables(sel)
{
	select=document.getElementById(sel);
	document.getElementById("columns").selectedIndex=select.options[select.selectedIndex].id;
}
</script>