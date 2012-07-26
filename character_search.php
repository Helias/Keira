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
<script type="text/javascript" src="character_search.js"></script>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form_ins" onsubmit="return search(this)">
<input type="hidden" name="x">
<table>
<tr>
<td>Guid</td>
<td>Account</td>
<td>Name</td>
</tr>
<tr>
<td><input type="text" name="guid" style="width:125px;"></td>
<td><input type="text" name="account"></td>
<td><input type="text" name="name"></td>
<td><input type="submit" value="Search"></td>
</tr>
</table>
<div class="scroll">
<table border="1">
<tr>
<td>Guid</td>
<td>Account</td>
<td>Name</td>
<td>Class</td>
<td>Race</td>
<td></td>
</tr>
<?php
$guid=$_POST['guid'];
$account=$_POST['account'];
$name=$_POST['name'];
$x=$_POST['x'];
$where="WHERE 1=1";
if ($guid)
{
	$where.=" AND guid=$guid";
}

if ($account)
{
	$where.=" AND account=$account";
}

if ($name)
{
	$where.=" AND name=$name";
}

$query=mysql_query("SELECT * FROM characters $where");
while ($row=mysql_fetch_array($query) AND $x==1)
{
	echo "<tr>
	<td>{$row['guid']}</td>
	<td>".htmlspecialchars($row['account'])."</td>
	<td>".htmlspecialchars($row['name'])."</td>
	<td>".htmlspecialchars($row['class'])."</td>
	<td>".htmlspecialchars($row['race'])."</td>
	<td><a href=\"characters.php?guid={$row['guid']}\">Edit</a></td>
	</tr>";
}
?>
</table>
</div>
</form>