

<?php
include '../global.php';

if ( isset($_GET["id_bl"])&& isset($_GET["id_detail"])){ 

//$sql22 = mysqli_query($link,"UPDATE bl SET total = '$total_bl' WHERE  id_bl = '$id_bl' ")or die(mysqli_error($link));

$gett=$_GET["id_detail"]; 
if($gett==="ALL")
 $sql = mysqli_query($link,"DELETE FROM detail_bl WHERE id_bl = '".$_GET["id_bl"]."'")OR die(mysqli_error($link));
else

 $sql = mysqli_query($link,"DELETE FROM detail_bl WHERE id_detail = '".$gett."'")OR die(mysqli_error($link));
$sql = mysqli_query($link,"SELECT SUM( Montant ) AS somme FROM  detail_bl WHERE  id_bl = '".$_GET["id_bl"]."'")OR die(mysqli_error($link));
$total_bl=0;
$total_bl_ht=0;
while ($r=mysqli_fetch_array($sql)){
	$total_bl_ht += $r['somme'];
//	echo "<br>total HT = ".$total_facture;
	//echo "<br>total TTC = ";
//$total_bl = $total_bl_ht * 1.17 ;		
//echo("".$total_facture_ht);
}
$sql33 = mysqli_query($link,"UPDATE bl SET montant_ht = ".$total_bl_ht." WHERE id_bl = '".$_GET["id_bl"]."';")or die(mysqli_error($link));

$lien="id_bl=".$_GET["id_bl"];

header("Location: bl-vente.php?".$lien);

}
?>