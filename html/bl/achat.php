<?php
include '../global.php';
session_start();
$rest_vendu = 0;	
$id_bl;
$ref_client;
$id_article;
$Remise_produit=0;
$desi;
$qt_produit=1;
$id_user;
$prixunit=0;
$prix=0;
if( isset ($_GET["id_bl"])&& strlen($_GET["id_bl"]) )
$id_bl=$_GET["id_bl"];
$ooo=-1;
if(isset($_GET["qt_produit"])&& strlen($_GET["qt_produit"]) )
    $qt_produit = $_GET["qt_produit"];
if( isset($_GET["prix_produit"])&& strlen($_GET["prix_produit"]))
    $prixunit = $_GET["prix_produit"];
if(isset($_GET["Remise_produit"])&& strlen($_GET["Remise_produit"]))
	$Remise_produit=$_GET["Remise_produit"];
if(isset ($_GET["inser_produit"])&& strlen($_GET["inser_produit"]))
	$desi=$_GET["inser_produit"];
if (isset ($_GET["change_add"]))
	 {
   		 if ($_GET["change_add"]=="0")
		 {  $ooo=1;	 }
		 else
			$ooo=0;
	  }
	  if(isset ($_GET["inser_produit"])&& strlen($_GET["inser_produit"]))
{

$request = mysqli_query($link,"SELECT * FROM users WHERE user = '".strtolower($_SESSION["username"])."' ")or die (mysqli_error($link));

if(mysqli_num_rows($request))
while($ligne = mysqli_fetch_array($request) )
			$id_user=$ligne["id_user"];

		$total = 0;
$req=mysqli_query($link,"select  * from articles where code_bare = '".$desi."' ");
if(mysqli_num_rows($req)==0)
{   $req=mysqli_query($link,"select  * from articles where reference = '".$desi."' ");    }
if(mysqli_num_rows($req)==1)
{
while($result = mysqli_fetch_array($req))
{
	$id_article= $result['id_article'];
	$reference = $result['reference'];
	$prix=0;
if ($prixunit==0){

$requetqtv = mysqli_query($link,"SELECT COALESCE(SUM(qtt),0) AS quant_en_Stock
FROM  detail_fachat 
WHERE  id_article = '$id_article'")or die (mysqli_error($link));

	$req_quant_compta = mysqli_query($link,"SELECT COALESCE(SUM(quantite),0) AS quant_vendu
FROM  detail_bl 
WHERE  id_article = '$id_article'")or die (mysqli_error($link));

$row2v=mysqli_fetch_array($requetqtv);
$row2compta=mysqli_fetch_array($req_quant_compta);

$quantite_total = $row2v['quant_en_Stock'];
$quant_vendu= $row2compta['quant_vendu'];
$rest=$quantite_total-$quant_vendu;

$qtt_prix=0;
 
$req_prix = mysqli_query($link,"SELECT  detail_fachat.id_article,detail_fachat.qtt, detail_fachat.prix_vente, detail_fachat.id_fachat, facture_achat.date
FROM detail_fachat, facture_achat
WHERE detail_fachat.id_fachat = facture_achat.id_fachat
AND detail_fachat.id_article ='".$id_article."'
ORDER BY `facture_achat`.`id_fachat` DESC 
limit 0,1;
") or die (mysqli_error($link));
$s=0;

if( mysqli_num_rows($req_prix))
{
while($row_req_prix =mysqli_fetch_array($req_prix))
	{
		
$qtt_prix=$qtt_prix+$row_req_prix["qtt"] ;		
//if($qtt_prix>$quant_vendu)
{ 
	$prixunit= $row_req_prix["prix_vente"];
	// if($qt_produit>$rest && $rest>0)
{
//$qt_produit=$rest;
	
} 
	//if($qtt_prix<$quant_vendu+$qt_produit)
	{
//$rest_vendu = 	$qt_produit ;	
 //$qt_produit=$qtt_prix-$quant_vendu;
 //$rest_vendu = $rest_vendu-	$qt_produit ;	
 	}
 //$total = $qt_produit*$prix;	
// if($s==0)
{
  //$s=1;
 	}
 } 
  	}
}
}
else{ 
//$prixunit=	$prixunit-$Remise_produit  ;
 //echo "else";
}
	$total = $qt_produit*($prixunit-$Remise_produit);
// die( "total :".$total." remise ".$Remise_produit." prix unitaire ".$prixunit);
		
$reqq = mysqli_query($link,"INSERT INTO  
`detail_bl` (
`id_article` ,
`quantite` ,
`id_bl` ,
`Montant`,
`Remise`, 
prix, 
id_user )
VALUES (
 '".$id_article."', 
 '".$qt_produit."',  
 '".$id_bl."', 
 '".$total."',
 '".$Remise_produit."',
 '".$prixunit."',
 '".$id_user."'
 )")or die(mysqli_error($link));
	
 
}
}
}
$sql = mysqli_query($link,"SELECT SUM( Montant ) AS somme  FROM  detail_bl WHERE  id_bl = '".$id_bl."'");
$total_bl=0;
$total_bl_ht=0;
while ($r=mysqli_fetch_array($sql))
{
	$total_bl_ht = $r['somme'];
}
if(isset ($_GET["inser_produit"]))
$sql33 = mysqli_query($link,"UPDATE bl SET montant_ht = '$total_bl_ht' WHERE id_bl = '$id_bl';")or die(mysqli_error($link));
  $tri;

$lien;
  if (isset($_GET["tri"]))
	 {
	 $tri = $_GET["tri"];
  $lien= "?id_bl=".$id_bl."&tri=".$tri;
  }
  else
{	 
$lien= "?id_bl=".$id_bl;
}
if ($ooo!="-1")
$lien = $lien."&change_add=".$ooo;

if (strlen($_GET["inser_produit"])){
if ($rest_vendu>0)
{
	$lien = "?id_bl=$id_bl&change_add=0&inser_produit=".$_GET["inser_produit"]."&qt_produit=".$rest_vendu;
header("Location:search2.php".$lien);
 die("rest_vendu".$rest_vendu);

}else 
header("Location:bl-vente.php".$lien);
	
}	else
	if(isset($_GET["new_bl"]))
		header("Location:bl-vente.php".$lien);
	else
header("Location:confirm-bl.php?id_bl=".$id_bl);

?>