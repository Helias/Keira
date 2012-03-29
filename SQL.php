<?php
include "db-config";
include "menu.php";
$query_columns=mysql_query("SHOW COLUMNS FROM creature_template");
$query=mysql_query("");
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_ins" id="form_ins" onsubmit="return search(this)">
<p>Code SQL:</p>
<p>SELECT 
<select>
<option value="0">test1</option>
</select>
<?php 
while ($row=mysql_fetch_assoc($query_columns)) 
{
	echo "{$row['columns']}";
}
?>
</p>
<p>FROM <input type="text" name="table" style=""></p>
<p>WHERE <input type="text"></p>
<table border="1">
<tr>
<td></td>
</tr>
</table>
<p align="left"><input type="submit" value="Search"></p>
</form>