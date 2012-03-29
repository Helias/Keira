<?php
include "db-config.php";
include "menu.php";
include "creature_menu.php";
$code=$_GET['code'];
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" name="forms" OnSubmit="return;">
<p><textarea name="code" cols="100" rows="30"><?php echo $_GET['code']; ?></textarea></p>
<p><textarea name="error" cols="100" rows="5">
<?php
$query=mysql_query($_GET['code']);
$text="asd";
echo $text;
?>
</textarea></p>
<p><input type="submit" value="Execute" OnClick="<?php if(mysql_fetch_array($query)){$text="Script executed successfully.";}else{$text=mysql_error();} ?>"></p>
</form>
