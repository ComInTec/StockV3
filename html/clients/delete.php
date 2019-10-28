

<?php
include '../global.php';

if (isset($_GET["ref"]))
{ $gett=$_GET["ref"]; 
 $sql = mysqli_query($link,"DELETE FROM `dap2`.`clients` WHERE `clients`.`ref_client` = '".$gett."' and  `clients`.`dette` = 0");
	header("Location: liste_client.php");




}
?>