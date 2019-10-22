

<?php
include '../global.php';
$id_bl;
if (isset($_GET["id"])&&isset($_GET["id_bl"]))
{ 
$id_bl=$_GET['id_bl'];
//$sql22 = mysqli_query($link,"UPDATE bl SET total = '$total_bl' WHERE  id_bl = '$id_bl' ")or die(mysqli_error($link));

$id=$_GET["id"]; 

 $sql = mysqli_query($link,"DELETE FROM reglement WHERE id = '".$_GET["id"]."'");


$lien="id_bl=".$_GET["id_bl"]."&ref_client=".$_GET["ref_client"];



}
header("Location: bl_versement.php?id_bl=".$id_bl);
?>