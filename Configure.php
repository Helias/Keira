<?php
$s=$_GET['server'];
$user=$_GET['username'];
$pwd=$_GET['password'];
$mangos=$_GET['mangos'];
$characters=$_GET['characters'];
$nomefile="db-config.php";
$file = fopen($nomefile, "w+");
$testo= "<?php
\$Server=\"$s\";
\$Username=\"$user\";
\$Password=\"$pwd\";
\$Database=\"$mangos\";
\$Characters=\"$characters\";
\$db=mysql_connect(\$Server, \$Username, \$Password);
\$Databases=mysql_select_db(\"\$Database\", \$db);
if (!\$db)
{
	echo \"Can't connect to mysql!\";
}
if (!\$Databases)
{
	echo \"Can't connect to the database!\";
	header(\"location:Connect.html\");
}
?>
";
fwrite($file, $testo);
fclose($file);

header("location:Quest.php");
?>