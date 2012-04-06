<link rel="stylesheet" href="./style.css">
<style type="text/css">
table#configuration {
	margin-top:10%;
}
</style>
<form action="Connect.php" method="post" name="connect" OnSubmit="return config(this)">
<center>
<title>Configuration</title>
<table border="1" id="configuration" width="40%" height="40%">
<tr>
<td>Server: </td>
<td><input type="text" name="server" value="Localhost"></td>
</tr>
<tr>
<td>Username:</td>
<td><input type="text" name="username" value=""></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td>World:</td>
<td><input type="text" name="world"></td>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters"></td>
</tr>
</table>
<table>
<tr align="center">
<td></td>
<td><input type="submit" value="Connect" OnClick="">   <input type="reset" value="Clear"></td>
</tr>
</table>
<input type="hidden" value="0" name="x">
</center>
</form>
<script type="text/javascript">
function config(form)
{
	server=false;
	username=false;
	password=false;
	world=false;
	characters=false;
	if (form.server.value != "")
	server=true;
	if (form.username.value != "")
	username=true;
	if (form.password.value != "")
	password=true;
	if (form.world.value != "")
	world=true;
	if (form.characters.value != "")
	characters=true;
	
	if (server && username && password && world && characters)
	{
		form.x.value=1;
		return true;
	}
	else
	{
		form.x.value=2;
		return false;
	}
}
</script>
<?php
$x=$_POST['x'];
if($x==1)
{
$server=$_POST['server'];
$user=$_POST['username'];
$pwd=$_POST['password'];
$world=$_POST['world'];
$characters=$_POST['characters'];
$nomefile="db-config.php";
$file = fopen($nomefile, "w+");
$testo= "<?php
\$Server=\"$server\";
\$Username=\"$user\";
\$Password=\"$pwd\";
\$Database=\"$world\";
\$Characters=\"$characters\";
\$connect=mysql_connect(\$Server, \$Username, \$Password);
\$Databases=mysql_select_db(\"\$Database\", \$connect);
?>
";
fwrite($file, $testo);
fclose($file);
header("location:index.php");
}
?>