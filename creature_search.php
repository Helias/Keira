<?php
include "db-config.php";
include "menu.php"; 
include "creature_menu.php";
?>
<script type="text/javascript" src="creature_search.js"></script>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_ins" OnSubmit="return search(this)">
<input type="hidden" name="x">
<table>
	<tr>
		<td>Entry</td>
		<td>Name</td>
		<td>Subname</td>
	</tr>
	<tr>
		<td><input type="text" name="Entry"></td>
		<td><input type="text" name="Name" style="width: 300px;"></td>
		<td><input type="text" name="Subname" style="width: 300px;"></td>
	</tr>
</table>
<table border="1">
	<tr>
		<td>Entry</td>
		<td>Name</td>
		<td>Subname</td>
		<td>npcflag</td>
		<td>minlevel</td>
		<td>maxlevel</td>
		<td></td>
	</tr>
	<tr>
		<td>
		<?php 
		$Entry=$_POST['Entry'];
		$Name=$_POST['Name'];
		$Subname=$_POST['Subname'];
		$x=$_POST['x'];
		$where="WHERE 1=1";
		if ($Entry)
		{
			$where.=" AND entry=$Entry";
		}

		if ($Name)
		{
			$where.=" AND name LIKE '%$Name%'";
		}

		if ($Subname)
		{
			$where.=" AND subname LIKE '%$Subname%'";
		}
		
		$query=mysql_query("SELECT * FROM creature_template $where");

		while ($row=mysql_fetch_array($query) AND $x==1)
		{
			echo "
			<tr><td>{$row['entry']}
			</td><td>".htmlspecialchars($row['name'])."
			</td><td>".htmlspecialchars($row['subname'])."
			</td><td>".htmlspecialchars($row['npcflag'])."
			</td><td>".htmlspecialchars($row['minlevel'])."
			</td><td>".htmlspecialchars($row['maxlevel'])."
			<td><a href=\"creature_template.php?entry={$row['entry']}\">Edit</a></td>
			</td></tr>
			"; 
		}
		?>
		</td>
	</tr>
</table>
<p align="left"><input type="submit" value="Search"></p></form>