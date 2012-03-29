<?php
include "db-config";
include "menu.php";
include "gameobject_menu.php";
?>
<script type="text/javascript" src="gameobject_search.js"></script>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_ins" id="form_ins" onsubmit="return search(this)">
<input type="hidden" value="" name="x">
<?php
$x=$_POST['x'];
?>
<table>
<tr>
<td>Entry</td>
<td>Name</td>
</tr>
<tr>
<td><input type="text" name="entry"></td>
<td><input type="text" name="name"></td>
</tr>
<table border="1">
	<tr>
		<td>Entry</td>
		<td>Name</td>
		<td>type</td>
		<td>faction</td>
	</tr>
	<tr>
		<td>
		<?php
		$entry=$_POST['entry'];
		$name=$_POST['name'];
		$where="WHERE 1=1";
		if ($entry)
		{
			$where.=" AND entry=$entry";
		}
		
		if ($name)
		{
			$where.=" AND name LIKE '%$name%'";
		}
		
		$query=mysql_query("SELECT * FROM gameobject_template $where");
		
		while ($row=mysql_fetch_array($query) AND $x==1)
		{
		echo "
		<tr><td>{$row['entry']}
		</td><td>".htmlspecialchars($row['name'])."
		</td><td>".htmlspecialchars($row['type'])."
		</td><td>".htmlspecialchars($row['faction'])."
		<td><a href=\"gameobject_template.php?entry={$row['entry']}\">Edit</a></td>
		</td></tr>
		"; 
		}
		?>
		</td>
	</tr>
</table>
</table>
<p align="left"><input type="submit" value="Search"></p>
</form>