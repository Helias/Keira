<?php
include "db-config.php";
include "menu.php";
include "character_menu.php";
$Databases=mysql_select_db("$Characters", $db);
if (!$Databases)
{
	echo "Can't connect to the database characters!";
	header("location:Connect.html");
}
$guid=$_GET['guid'];
if ($guid== "")
{
	$query=mysql_query("SELECT * FROM characters");
}
else
{
	$query=mysql_query("SELECT * FROM characters WHERE guid=$guid");
}
while ($row=mysql_fetch_array($query))
{
if ($guid == "")
{
	$guid="Write guid";
	$row="";
}
$online=htmlspecialchars($row['online']);
?>
<style type="text/css">
.input_box {
	width:120px;
}
</style>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<table>
<tr>
<td>online</td>
<td>is_logout_resting</td>
<td>at_login</td>
<td>cinematic</td>
</tr>
<tr>
<td><input type="checkbox" <?php if($online==1){echo "checked=\"true\"";}?> name="online"></td>
<td><input type="checkbox" <?php if (htmlspecialchars($row['is_logout_resting']) == 1){echo "checked=\"true\"";}?> name="is_logout_resting"></td>
<td><input type="checkbox" <?php if (htmlspecialchars($row['at_login']) == 1){echo "checked=\"true\"";} ?> name="at_login"></td>
<td><input type="checkbox" <?php if (htmlspecialchars($row['cinematic']) == 1){echo "checked=\"true\"";} ?> name="cinematic"></td>
</tr>
<tr>
<td>Guid</td>
<td>Account</td>
<td>Name</td>
<td>Race</td>
<td>class</td>
<td>gender</td>
<td>level</td>
<td>xp</td>
<td>money</td>
<td>extra_flags</td>
</tr>
<tr>
<td><input class="input_box" type="text" value="<?php echo $guid; ?>" name="guid" style="width: 100px;"><input type="submit" value=""></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['account']); ?>" name="account"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['name']); ?>" name="name"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['race']); ?>" name="race"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['class']); ?>" name="class"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['gender']); ?>" name="class"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['level']); ?>" name="class"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['xp']); ?>" name="class"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['money']); ?>" name="class"></td>
<td><input class="input_box" type="text" value="<?php echo htmlspecialchars($row['extra_flags']); ?>" name="class"></td>
</tr>
<tr>
<td>map</td>
<td>position_x</td>
<td>position_y</td>
<td>position_z</td>
<td>orientation</td>
<td>zone</td>
</tr>
<tr>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['map']) ?>" name="maps"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['position_x']) ?>" name="position_x"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['position_y']) ?>" name="position_y"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['position_z']) ?>" name="position_z"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['orientation']) ?>" name="orientation"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['zone']) ?>" name="zone" style="width: 90px;"></td>
</tr>
<tr>
<td>totaltime</td>
<td>leveltime</td>
<td>logout_time</td>
<td>reset_bonus</td>
</tr>
<tr>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['totaltime']) ?>" name="totaltime"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['leveltime']) ?>" name="leveltime"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['logout_time']) ?>" name="logout_time"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['rest_bonus']) ?>" name="rest_bonus"></td>
</tr>
<tr>
<td>resettalents_cost</td>
<td>resettalents_time</td>
</tr>
<tr>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['resettalents_cost']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['resettalents_time']); ?>" name="resettalents_cost"></td>
</tr>
<tr>
<td>trans_x</td>
<td>trans_y</td>
<td>trans_z</td>
<td>trans_o</td>
<td>transguid</td>
</tr>
<tr>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['trans_x']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['trans_y']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['trans_z']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['trans_o']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['transguid']); ?>" name="resettalents_cost"></td>
</tr>
<tr>
<td>stable_slots</td>
<td>at_login</td>
</tr>
<tr>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['stable_slots']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['at_login']); ?>" name="resettalents_cost"></td>
</tr>
<tr>
<td>pending_honor</td>
<td>last_honor_date</td>
<td>last_kill_date</td>
</tr>
<tr>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['pending_honor']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['last_honor_date']); ?>" name="resettalents_cost"></td>
<td><input type="text" class="input_box" value="<?php echo htmlspecialchars($row['last_kill_date']); ?>" name="resettalents_cost"></td>
</tr>
</table>
<table>
<tr>
<td>taximask</td>
</tr>
<tr>
<td><input type="text" value="<?php echo htmlspecialchars($row['taximask']) ?>" name="taximask" style="width: 500px;"></td>
</tr>
</table>
</form>
<p align="right"><input type="submit" value="Show Character Script"></p>
<?php
}
?>