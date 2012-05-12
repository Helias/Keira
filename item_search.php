<?php
include "db-config";
include "menu.php";
include "item_menu.php";
?>
<script type="text/javascript" src="item_search.js"></script>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_ins" onsubmit="return search(this)">
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
<td><input type="submit" value="Search"></td>
</tr>
</table>
<div class="scroll">
<table border="1">
	<tr>
		<td>Entry</td>
		<td>Name</td>
		<td>class</td>
		<td>subclass</td>
		<td>Quality</td>
		<td>InventoryType</td>
		<td>itemset</td>
		<td>RequiredLevel</td>
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
			$name=str_replace("'", "\'", $name);
			$where.=" AND name LIKE '%$name%'";
		}
		
		$query=mysql_query("SELECT * FROM item_template $where");
		
		while ($row=mysql_fetch_array($query) AND $x==1)
		{
		echo "
		<tr><td>{$row['entry']}
		</td><td>".htmlspecialchars($row['name'])."
		</td><td>".htmlspecialchars($row['type'])."
		</td><td>".htmlspecialchars($row['class'])."
		</td><td>".htmlspecialchars($row['subclass'])."
		</td><td>".htmlspecialchars($row['Quality'])."
		</td><td>".htmlspecialchars($row['InventoryType'])."
		</td><td>".htmlspecialchars($row['itemset'])."
		</td><td>".htmlspecialchars($row['flags'])."
		</td><td>".htmlspecialchars($row['requiredlevel'])."
		<td><a href=\"item_template.php?entry={$row['entry']}\">Edit</a></td>
		</td></tr>
		"; 
		}
		?>
		</td>
	</tr>
</table>
</div>
</form>