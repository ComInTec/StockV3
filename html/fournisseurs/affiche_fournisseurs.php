<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  Logiciel De Stock </title>
<link href="design/style2.css" rel="stylesheet" type="text/css" />
<script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="design/spryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link href="design/spryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="container">
  <center>
<div class="header" id="header"></div>
  
 
<div class="sidebar1" style="color: #CCC; font-size: 18px;">
 <center>
 <div id ="menu">
   <ul id="MenuBar1" class="MenuBarHorizontal">
     <li><a href="../" class="MenuBarItemSubmenu">Acceuil</a>       </li>
</ul>
 </div> </center>
    <br /><br /><br />

<?php
include("../global.php");



 $rest_total =0;


function dette($ref_fournisseur,$first,$link)
{
	$dette = 0;
	$total_versement=0;
	$total_bon_fournisseur = 0;
	
	
		$query = mysqli_query($link,
	
	"SELECT COALESCE( SUM( facture_achat.bon_fournisseur ) , 0 ) AS total_bon_fournisseur
FROM facture_achat, fournisseurs
WHERE facture_achat.ref_fournisseur = fournisseurs.ref_fournisseur
AND facture_achat.ref_fournisseur =  '$ref_fournisseur'"
)or die (mysqli_error($link));
		
	if (mysqli_num_rows($query))
	{
		while ($row = mysqli_fetch_array($query))
		{
 		$total_bon_fournisseur  = $row["total_bon_fournisseur"];
 		}
	}
		
		$query = mysqli_query($link,"
select  COALESCE(SUM(reglement_achat.montant),0) as total_versement 
 from reglement_achat ,facture_achat, fournisseurs 

where facture_achat.ref_fournisseur = fournisseurs.ref_fournisseur and 

reglement_achat.id_fachat = facture_achat.id_fachat and

facture_achat.ref_fournisseur='$ref_fournisseur'  
")or die (mysqli_error($link));
		
	if (mysqli_num_rows($query))
	{
		while ($row = mysqli_fetch_array($query))
		{
		$total_versement  = $row["total_versement"];
 		}
	}
	
	
$dette = $first -$total_versement	+ $total_bon_fournisseur;
	
	
	return $dette ;
}


function  can_delet($ref_fournisseur,$first,$link)
{
	$result = true;

	$dette = 0;
	$total_versement=0;
	$total_bon_fournisseur = 0;
	$article = 0;
	
		$query = mysqli_query($link,
	
	"SELECT COALESCE( SUM( facture_achat.bon_fournisseur ) , 0 ) AS total_bon_fournisseur
FROM facture_achat, fournisseurs
WHERE facture_achat.ref_fournisseur = fournisseurs.ref_fournisseur
AND facture_achat.ref_fournisseur =  '$ref_fournisseur'"
)or die (mysqli_error($link));
		
	if (mysqli_num_rows($query))
	{
		while ($row = mysqli_fetch_array($query))
		{
 		$total_bon_fournisseur  = $row["total_bon_fournisseur"];
 		}
	}
		$query = mysqli_query($link,
	
	"SELECT 
	* FROM articles where ref_fournisseur   =  '$ref_fournisseur'"
)or die (mysqli_error($link));
		
	$article = (mysqli_num_rows($query));
	
		
		$query = mysqli_query($link,"
select  COALESCE(SUM(reglement_achat.montant),0) as total_versement 
 from reglement_achat ,facture_achat, fournisseurs 

where facture_achat.ref_fournisseur = fournisseurs.ref_fournisseur and 

reglement_achat.id_fachat = facture_achat.id_fachat and

facture_achat.ref_fournisseur='$ref_fournisseur'  
")or die (mysqli_error($link));
		
	if (mysqli_num_rows($query))
	{
		while ($row = mysqli_fetch_array($query))
		{
		$total_versement  = $row["total_versement"];
 		}
	}
	
	
if ( $first +$total_versement	+ $total_bon_fournisseur+$article)
	
	$result = false ;
	
	
	
	return $result;
}



		$dette = 0;
$req=mysqli_query($link,"select * from fournisseurs");
if (mysqli_num_rows($req))
{

?>
<TABLE border="1" align="center" >
<tr>	  

<td >Code </td>
<td align="center" valign="middle">Societe </td>
<td >Liste d ' articles</td>
<td >Dette n°1:</td>
<td >Credit actuel:</td>
<td >Supprimer:</td>
</tr>
		<?php	  
		while($row=mysqli_fetch_array($req))
		{
	    $ref = $row[0];
		$nom = $row[1];
		$code = $row[2];
		$telephone = $row[3];
		$fax = $row[4];
		$email = $row[5];
		$adresse = $row[6];
		$bancaire = $row[7];
		$dette = $row["dette"];
		$date= $row["date_inscription"];
			?>
		<tr>
		
			<td align="center">
			<?php echo $code?>
			</td>
			<td align="center">
		<a style="color:#00FFFF" href="fiche-fournisseur.php?ref_fournisseur=<?php echo($ref);?>"><?php echo $nom?><img src="design/pics/modifier.png" width="16" height="16" longdesc="" /></a>	
			</td>
      
		
		
           <td align="center"><a href="articles-fournisseur.php?ref_fournisseur=<?php echo($ref);?>"><img src="design/pics/modifier.png" width="16" height="16" longdesc="" /></a>
		  </td>
           <td ><span style=" text-align:right;" ><?php  echo(number_format($dette, 1, '.', ' '));?></span></td>
           <td >
		   
		   
		   
		   <?php  
		   
		   $credit = dette($ref,$dette,$link);
		    $rest_total = $rest_total +$credit;
		  // echo(number_format($credit, 1, '.', ' '));
		   
		   ?>
		   
		   	
<span style ="color:<?php 
if ($credit)
// echo "green";
// else
	echo "red";
?>;">
	<?php	
	//$dette = total_dette();

	 echo(number_format($credit, 2, '.', ' ')); 
	 
	 ?></span>
		   
		   
		   
		   
		   </td>
<td>

<?php 
if (!can_delet($ref,$dette,$link))
{
	  ?><a onclick="if(confirm('Etes vous sûr de vouloir supprimer ce fournisseur ?')) document.location='delete.php?ref=<?php echo("".$ref);?>';" href="#"><img src="design/pics/delete.png" width="16" height="16" alt="Supprimer cet ligne" /></a>
      <?php
	
?>
</td>
		</tr>
		<?php
		}
		}
?><tr>
    <td>
    </td> <td>Total DETTE
    </td> <td>
    </td> <td>
  
    </td> <td>
	
<span style ="color:<?php 
if ($rest_total)
// echo "green";
// else
	echo "red";
?>;">
	<?php	
	//$dette = total_dette();

	 echo(number_format($rest_total, 2, '.', ' ')); 
	 
	 ?></span>
  
    </td> 
    </tr>	
	<?php


	?>
</TABLE>
<?php

}else
{
	?>
  <p style="color: #CCC; font-size: 24px; text-align: center">  Aucun fournisseur n'a été créee
    </p>
	<?php
	}
?>
    <!-- end .content -->
  </div>
 </center>
 </div>
  <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>

</body>
</html>