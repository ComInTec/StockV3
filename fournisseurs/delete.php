

<?php
include '../global.php';

if (isset($_GET["ref"]))
{ $gett=$_GET["ref"]; 
 $sql = mysqli_query($link,"DELETE FROM `dap2`.`fournisseurs` WHERE `fournisseurs`.`ref_fournisseur` = '".$gett."'");
	
	
	header("Location: affiche_fournisseurs.php");




}else
	die ("error");
?>