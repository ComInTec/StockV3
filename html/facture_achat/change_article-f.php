

<?php
include '../global.php';
// die (print_r($_GET));
//isset($_GET["id_detachat"])&&
if (isset($_GET["prix_achat"])&& isset($_GET["dernier_prix"])&& isset($_GET["prix_vente"])&&  isset($_GET["id_detachat"])&&isset($_GET["id_fachat"])&&  isset($_GET["qtt"]) && isset($_GET["reference"]))
{ 

//$sql22 = mysqli_query($link,"UPDATE facture SET total = '$total_facture' WHERE  id_fachat = '$id_fachat' ")or die(mysqli_error($link));

$gett=$_GET["id_fachat"]; 
 $sql = mysqli_query($link,"DELETE FROM detail_fachat WHERE id_detachat = '".$_GET["id_detachat"]."'")or die(mysqli_error($link));
// $sql = mysqli_query($link,"SELECT SUM( Montant ) AS somme FROM  detail_facture WHERE  id_fachat = '".$_GET["id_bl"]."'")or die(mysqli_error($link));
// $total_facture=0;
// $total_facture_ht=0;
// while ($r=mysqli_fetch_array($sql))
// {
	// $total_facture_ht = $r['somme'];
//	echo "<br>total HT = ".$total_facture;
	//echo "<br>total TTC = ";
//$total_facture = $total_facture_ht * 1.17 ;		
//echo("".$total_facture_ht);
// }	
// $sql33 = mysqli_query($link,"UPDATE facture SET montant_ht = '$total_facture_ht' WHERE id_fachat = '".$_GET["id_fachat"]."';")or die(mysqli_error($link));

//$lien="id_fachat=".$_GET["id_fachat"]."&ref_client=".$_GET["ref_client"];
$lien = "id_fachat=".$_GET["id_fachat"]."&qtt=".$_GET["qtt"]."&reference=".$_GET["reference"]."&prix_achat=".$_GET["prix_achat"]."&dernier_prix=".$_GET["dernier_prix"]."&prix_vente=".$_GET["prix_vente"];
if (isset($_GET["tri"]))
$lien =$lien ."&tri=".$_GET["tri"];
header("Location:facture_achat.php?".$lien )or die ("error");

}
?>