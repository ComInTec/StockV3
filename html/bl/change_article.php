

<?php
include '../global.php';

if (isset($_GET["prix_produit"])&&isset($_GET["remise_produit"])&& isset($_GET["id_bl"])&& isset($_GET["id_detail"])&& isset($_GET["qt"]) && isset($_GET["reference"]))
{ 

//$sql22 = mysqli_query($link,"UPDATE bl SET total = '$total_bl' WHERE  id_bl = '$id_bl' ")or die(mysqli_error($link));

$gett=$_GET["id_detail"]; 
 $sql = mysqli_query($link,"DELETE FROM detail_bl WHERE id_detail = '".$_GET["id_detail"]."'")or die(mysqli_error($link));
$sql = mysqli_query($link,"SELECT COALESCE(SUM( Montant ),0) AS somme FROM  detail_bl WHERE  id_bl = '".$_GET["id_bl"]."'")or die(mysqli_error($link));
$total_bl=0;
$total_bl_ht=0;
while ($r=mysqli_fetch_array($sql))
{
	$total_bl_ht = $r['somme'];
//	echo "<br>total HT = ".$total_facture;
	//echo "<br>total TTC = ";
//$total_bl = $total_bl_ht * 1.17 ;		
//echo("".$total_facture_ht);
}	
$sql33 = mysqli_query($link,"UPDATE bl SET montant_ht = '$total_bl_ht' WHERE id_bl = '".$_GET["id_bl"]."';")or die(mysqli_error($link));

//$lien="id_bl=".$_GET["id_bl"]."&ref_client=".$_GET["ref_client"];
$lien = "id_bl=".$_GET["id_bl"]."&qt=".$_GET["qt"]."&reference=".$_GET["reference"]."&remise_produit=".$_GET["remise_produit"]."&prix_produit=".$_GET["prix_produit"];
if (isset($_GET["tri"]))
$lien =$lien ."&tri=".$_GET["tri"];
header("Location: bl-vente.php?".$lien )or die ("error");

}
?>