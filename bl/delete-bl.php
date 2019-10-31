

<?php
include '../global.php';

if (isset($_GET["id_bl"])&&isset($_GET["ref_client"])&&strlen($_GET["ref_client"]))
{ 
$jj = $_GET["ref_client"];
$gett=$_GET["id_bl"]; 
 $sql = mysqli_query($link,"DELETE FROM detail_bl WHERE id_bl = '".$gett."'")or die (mysqli_error($link));

 $sql = mysqli_query($link,"DELETE FROM bl WHERE id_bl = '".$gett."'")or die (mysqli_error($link));
$ff= "Location:historique_bl.php?ref_client=".$jj;
	header($ff);




}
if (isset($_GET["id_bl"])&& !isset($_GET["ref_client"]) && strlen($_GET["ref_client"])==0)
{ 
//$jj = $_GET["ref_client"];
$gett=$_GET["id_bl"]; 
$sql = mysqli_query($link,"DELETE FROM detail_bl WHERE id_bl = '".$gett."'")or die (mysqli_error($link));
$sql = mysqli_query($link,"DELETE FROM bl WHERE id_bl = '".$gett."'")or die (mysqli_error($link));
$ff= "Location:voir_tout_bl";
header($ff);
}

?>