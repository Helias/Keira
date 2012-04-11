<?php
include "db-config.php";
include "menu.php";
include "creature_menu.php";
$code=$_GET['code'];
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" name="form" OnSubmit="return execute(this);">
<script type="text/javascript">
function execute(form)
{
	code=false;
	if(form.code.value != "")
	code=true;
	if(code)
	{
		form.x.value="1";
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<input type="hidden" name="x">
<p><textarea name="code" cols="100" rows="30"><?php echo $_GET['code']; ?></textarea></p>
<p><textarea name="error" cols="100" rows="5">
<?php
$x=$_GET['x'];
if($x=="1")
{
	$query=mysql_query($_GET['code']);
	if(!$query)
	{
		echo mysql_error();
	}
	else
	{
		echo "Script executed successfully.";
	}
}
?>
</textarea></p>
<p><input type="submit" value="Execute"></p>
</form>

