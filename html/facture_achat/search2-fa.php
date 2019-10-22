<?php

include '../global.php';
session_start();
$id_fachat;
$id_user;

$rest=0;
	
			$inser_produit="";
$prix_achat=0;
$dernier_prix=0;
$qtt=0;

$id_article;
$prix_vente=0;
  // die(print_r($_GET));
  if (isset($_GET["ref_fournisseur"]) && strlen ( $_GET["ref_fournisseur"]) )
				$ref_fournisseur=$_GET["ref_fournisseur"];
			
  
	$request = mysqli_query($link,"SELECT * FROM users WHERE user = '".strtolower($_SESSION["username"])."' ")or die (mysqli_error($link));

if(mysqli_num_rows($request))
while($ligne = mysqli_fetch_array($request) )			
			$id_user=$ligne["id_user"];
		
			
			if (!isset($_GET["inser_produit"]))
			
			{
			if (isset($_GET["reference"]) && strlen ( $_GET["reference"]) )
				$inser_produit=$_GET["reference"];
				
			if (isset($_GET["code_bare"]) && strlen ( $_GET["code_bare"]))
				$inser_produit= $_GET["code_bare"];
				 
			}
	
	
	if (isset ($_GET["inser_produit"]))	 
	   $inser_produit=$_GET["inser_produit"];

	if (isset ($_GET["id_fachat"]))	 
	   
{



$dernier_prix=$_GET["dernier_prix"];
$prix_vente = $_GET["prix_vente"];
$prix_achat = $_GET["prix_achat"];
$id_fachat=$_GET["id_fachat"];

$inser_produit=ltrim($inser_produit);
$inser_produit=rtrim($inser_produit);
$inser_produit=trim($inser_produit);
$qtt=$_GET["qtt"];


$total = 0;



$req=mysqli_query($link,"select  * from articles where code_bare = '".$inser_produit."' or reference = '".$inser_produit."'  ");

if(mysqli_num_rows($req)==0)
{
$req=mysqli_query($link,"select  * from articles where reference = '".$inser_produit."' ");
}

if(mysqli_num_rows($req)==1)
{


while($result = mysqli_fetch_array($req))
{

	$id_article= $result['id_article'];
	$reference = $result['reference'];
$prix;


$reqq = mysqli_query($link,"INSERT INTO  `detail_fachat` (
`id_article` ,
`qtt` ,
`id_fachat` ,
dernier_prix,
prix_achat,
`prix_vente`, 
id_user
)

VALUES (

'".$id_article."', 
 '".$qtt."', 
 '".$id_fachat."', 
 '".$dernier_prix."', 
 '".$prix_achat."', 
 '".$prix_vente."', 
 '".$id_user."'
 )
 ")or die(mysqli_error($link));
$s=1;

	
	}
//die("".$total);	

}
else 

{
	
	  // die(print_r($_GET)); 
	$lien = "../stock/update-designation.php?search=".$inser_produit."&id_fachat=$id_fachat&qtt=".$qtt."&dernier_prix=".$dernier_prix."&prix_achat=".$prix_achat."&prix_vente=".$prix_vente."&ref_fournisseur=".$ref_fournisseur ;
	
	header("Location:$lien");

	 die("lien");
}	
 // die(print_r($_GET)); 
	 
$lien= "?id_fachat=".$id_fachat;



if (isset ($_GET["aide_ref"]))
{
	$lien = "../clients/reference_bl_facture.php".$lien;
	header("Location:$lien");
}
else
	
header("Location:facture_achat.php".$lien);

}
 

?>