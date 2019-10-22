<?php

include '../global.php';
session_start();
$id_calcul_prix;
$id_user;

$rest=0;
	
			$ref_calcul_prix_detail="";
$prix_achat_ht=0;
// $dernier_prix=0;
$qtt_calcul_prix_detail=0;

$id_article;
$prix_vente=0;
   die(print_r($_GET));
	$request = mysqli_query($link,"SELECT * FROM users WHERE user = '".strtolower($_SESSION["username"])."' ")or die (mysqli_error($link));

if(mysqli_num_rows($request))
while($ligne = mysqli_fetch_array($request) )
			$id_user=$ligne["id_user"];
		
			
			if (!isset($_GET["ref_calcul_prix_detail"]))
			
			{
			if (isset($_GET["reference"]) && strlen ( $_GET["reference"]) )
				$ref_calcul_prix_detail=$_GET["reference"];
				
			if (isset($_GET["code_bare"]) && strlen ( $_GET["code_bare"]))
				$ref_calcul_prix_detail= $_GET["code_bare"];
				 
			}
	
	
	if (isset ($_GET["ref_calcul_prix_detail"]))	 
	   $ref_calcul_prix_detail=$_GET["ref_calcul_prix_detail"];

	if (isset ($_GET["id_calcul_prix"]))	 
	   
{



// $dernier_prix=$_GET["dernier_prix"];
$prix_vente = $_GET["prix_vente"];
$prix_achat_ht = $_GET["prix_achat_ht"];
$id_calcul_prix=$_GET["id_calcul_prix"];

$ref_calcul_prix_detail=ltrim($ref_calcul_prix_detail);
$ref_calcul_prix_detail=rtrim($ref_calcul_prix_detail);
$ref_calcul_prix_detail=trim($ref_calcul_prix_detail);
$qtt_calcul_prix_detail=$_GET["qtt_calcul_prix_detail"];


$total = 0;



$req=mysqli_query($link,"select  * from articles where code_bare = '".$ref_calcul_prix_detail."' or reference = '".$ref_calcul_prix_detail."'  ");

if(mysqli_num_rows($req)==0)
{
$req=mysqli_query($link,"select  * from articles where reference = '".$ref_calcul_prix_detail."' ");
}

// if(mysqli_num_rows($req)==1)
// {


// while($result = mysqli_fetch_array($req))
// {

	$id_article= $result['id_article'];
	$reference = $result['reference'];
$prix;


$reqq = mysqli_query($link,"INSERT INTO  `calcul_prix_detail` (
`ref_calcul_prix_detail` ,
`qtt_calcul_prix_detail` ,
`id_calcul_prix` ,
 
prix_achat_ht
 
)

VALUES (

'".$ref_calcul_prix_detail."', 
 '".$qtt_calcul_prix_detail."', 
 '".$id_calcul_prix."', 
 
 '".$prix_achat_ht."'
 
 )
 ")or die(mysqli_error($link));
$s=1;

	
	// }
//die("".$total);	

// }
// else 

// {
	
	  // die(print_r($_GET)); 
	// $lien = "../stock/update-designation.php?search=".$ref_calcul_prix_detail."&id_calcul_prix=$id_calcul_prix&qtt_calcul_prix_detail=".$qtt_calcul_prix_detail."&prix_achat_ht=".$prix_achat_ht."&prix_vente=".$prix_vente ;
	
	// header("Location:$lien");

	 // die("lien");
// }	
 // die(print_r($_GET)); 
	 
 $lien= "?id_calcul_prix=".$id_calcul_prix;



// if (isset ($_GET["aide_ref"]))
// {
	// $lien = "../clients/reference_bl_facture.php".$lien;
	// header("Location:$lien");
// }
// else
	
header("Location:calcul_prix_table.php".$lien);

}
 

?>