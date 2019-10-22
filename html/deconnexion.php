
<?php
if (!isset($_GET["back"]))
header("location:backup/backup.php?db%5B%5D=dap2&comments=&tables=on&data=on&drop=on&zip=&back=back");
else
{
session_start();
session_unset();
session_destroy();


header("location:login.php");
}
?>

