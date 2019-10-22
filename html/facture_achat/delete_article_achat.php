

<?php
include '../global.php';

if ( isset($_GET["id_fachat"])&& isset($_GET["id_detachat"]))
{ 
//$sql22 = mysqli_query($link,"UPDATE facture SET total = '$total_facture' WHERE  id_fachat = '$id_fachat' ")or die(mysqli_error($link));

$gett=$_GET["id_detachat"]; 
if($gett==="ALL")
 $sql = mysqli_query($link,"DELETE FROM detail_fachat WHERE id_fachat = '".$_GET["id_fachat"]."'");
else

 $sql = mysqli_query($link,"DELETE FROM detail_fachat WHERE id_detachat = '".$gett."'");

 
$lien="id_fachat=".$_GET["id_fachat"];

header("Location:facture_achat.php?".$lien);
die();

}
?>