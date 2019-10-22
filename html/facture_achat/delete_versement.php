

<?php
include '../global.php';
$id_fachat;
if (isset($_GET["id"])&&isset($_GET["id_fachat"]))
{ 
$id_fachat=$_GET['id_fachat'];
 
$id=$_GET["id"]; 

 $sql = mysqli_query($link,"DELETE FROM reglement_achat WHERE id = '".$_GET["id"]."'");


$lien="id_fachat=".$_GET["id_fachat"];



}
header("Location: facture_achat_versement.php?id_fachat=".$id_fachat);
?>