<?php
include "db-config.php";
include "menu.php"; 
include "quest_menu.php"; 
?>
<script type="text/javascript" src="quest_search.js"></script>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_ins" id="form_ins" onsubmit="return search(this)">
<input type="hidden" name="x">
<table>
	<tr>
		<td>Questid</td>
		<td>Title</td>
	</tr>
	<tr>
		<td><input type="text" name="Entry"></td>
		<td><input type="text" name="Title" style="width: 300px;"></td>
	</tr>
</table>
<table border="1">
	<tr>
		<td>Entry</td>
		<td>Title</td>
		<td>Details</td>
	</tr>
	<tr>
		<td>
		<?php 
		$Entry=$_POST['Entry'];
		$Title=$_POST['Title'];
		$x=$_POST['x'];
		$where="WHERE 1=1";

		if ($Entry)
		{
			$where.=" AND entry=$Entry";
		}

		if ($Title)
		{
			$where.=" AND Title LIKE '%$Title%'";
		}

		$query=mysql_query("SELECT * FROM quest_template $where");
		while($row = mysql_fetch_array($query) AND $x==1) 
		{ 
			echo "<tr>
			<td>{$row['entry']}</td>
			<td>".htmlspecialchars($row['Title'])."</td>
			<td>".htmlspecialchars($row['Details'])."</td>
			</tr>"; 
		}
		?>
		</td>
	</tr>
</table>
<p align="left"><input type="submit" value="Search"></p></p>
</form>