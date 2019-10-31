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
  </center>
 
 
<div class="sidebar1">
 <center>
 <div id ="menu">
   <ul id="MenuBar1" class="MenuBarHorizontal">
     <li><a href="../" class="MenuBarItemSubmenu">Acceuil</a>       </li>
</ul>
 </div> 
 </center>
    <br /><br /><br /> 
       <?php   
	session_start();
 
 

	
	?>  
 </div>






<div class =  "content">

<?php
if(isset($_SESSION['username']))
{	
include '../global.php';
$total_qtt=0;
$total_total_ht=0;
$total_total_rev=0;
$id_fachat;
if (isset($_GET['id_article']))
{
$id_article = $_GET['id_article'];
$i=0;
 ?>
  
<hr />
<h1 style=" text-align:center ; text-decoration:underline">Historique Achats:</h1>
<br />
<table width="65%" border="2" align="center">
<?php
$total_qtt=0;
$total_total_ht=0;
$string_query = "SELECT
 `articles`.`reference` , 
 `detail_fachat`.`qtt` ,
 `detail_fachat`.`id_detachat`,
 `detail_fachat`.`prix_achat` ,
 `detail_fachat`.`prix_vente` ,
 `facture_achat`.`ref_fournisseur` ,
 `facture_achat`.`date` , 
 `fournisseurs`.`Societe`,
  facture_achat.`id_fachat`
 
FROM detail_fachat, facture_achat,  fournisseurs, `articles`
WHERE fournisseurs.`ref_fournisseur` = facture_achat.`ref_fournisseur`
AND detail_fachat.`id_fachat` = facture_achat.`id_fachat`
AND `articles`.`id_article` = detail_fachat.`id_article` and  articles.id_article = '".$id_article."' ORDER BY facture_achat.date";
// die ($string_query);
$req_historique_importation = mysqli_query($link,$string_query)or die(mysqli_error($link));
if (mysqli_num_rows($req_historique_importation))
{
?>
<tr>
<th>Reference  </th>
<th>Fournisseur 
</th>
<th>Date Achat 
</th><th>Quantite
</th>
<th>prix d'achat uni</th>
<th>prix d'achat Total</th>
<th>prix de vente uni </th>
 
<th>Total vente 
</th>

</tr>
<?php	
$min_prix=0;
$max_prix=0;

while($row_historique_importation=mysqli_fetch_array($req_historique_importation))
{
$id_fachat = $row_historique_importation["id_fachat"];
$reference = $row_historique_importation["reference"];
$quantite = $row_historique_importation["qtt"];


$prix_achat= $row_historique_importation["prix_achat"];
$prix_vente= $row_historique_importation["prix_vente"];


if($min_prix>$prix_achat)
$min_prix=0;

if($max_prix==0)
$max_prix=$prix_achat;

if($min_prix==0)
$min_prix=$prix_achat;

if($max_prix<$prix_achat)
$max_prix=$prix_achat;


$date=  $row_historique_importation["date"];
$societe =  $row_historique_importation["Societe"];
$ref_fournisseur = $row_historique_importation[ "ref_fournisseur"];
	
	?>


<tr>
<td> <a href="../facture_achat/facture_achat.php?id_fachat=<?php echo  $id_fachat?>#<?php echo $row_historique_importation["id_detachat"];  ?>"><span style ="color : orange;">
<?php
echo ($reference);
?><span></a></td>
<td><?php
echo ($societe);
?></td>
<td><?php echo("".date("d-m-Y", strtotime($date)));
?></td>
<td><?php 
echo ($quantite);
?></td>

<td><?php 
echo ($prix_achat);
?></td>
<td><?php 
echo ($quantite*($prix_achat));
?></td>
<td><?php 
echo ($prix_vente);
?></td>
 

<td><?php 

echo ($prix_vente*$quantite);
$total_qtt=$total_qtt+$quantite;
$total_total_ht=$total_total_ht+$prix_vente*$quantite;
$total_total_rev=$total_total_rev+$prix_achat*$quantite;

?></td>


</tr>
<?php
}
?>
<tr> <th>&nbsp; </th>
      <td>&nbsp; </td>
      <td>&nbsp;   </td>
      <td>&nbsp;  </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
</tr>
<tr>
<td>Total</td>
 <td>&nbsp; </td> <td>&nbsp; </td>

<td><?php

 echo($total_qtt);?></td>
  <td>&nbsp; </td>
 <td><?php echo($total_total_rev);?></td>
 <td>&nbsp; </td>
<td><?php echo($total_total_ht);?></td>

</tr>

<?php

?>
</table>
 
  
 <hr />
<h1 style=" text-align:center ; text-decoration:underline">Historique Ventes détaillées:</h1>
<?php
$requette_mouvement_vente = mysqli_query($link,"
	   
	   SELECT
	  clients.Societe,
	  detail_bl.quantite,
	  detail_bl.id_article,
	  articles.reference,
	  bl.date,
	  bl.id_bl,
	  detail_bl.id_detail,
	  detail_bl.prix,
	  detail_bl.Remise,
	  detail_bl.Montant
	  
	    FROM `detail_bl` , bl ,clients ,articles
where
bl.id_bl = detail_bl.id_bl   and
articles.id_article = detail_bl.id_article   and
clients.ref_client = bl.ref_client and 
detail_bl.id_article = '$id_article'

	   ")or die (mysqli_error($link));
	   if (mysqli_num_rows($requette_mouvement_vente))
{
?> 
<table width="80%" border="2" align="center">
  <tbody>
    <tr>
      <th scope="col">Client :</th>
      <th scope="col">Qtt :</th>
      <th scope="col">Date :</th>
      <th scope="col">Prix :</th>
      <th scope="col">Total :</th>
    </tr>
    
    <?php 
	$totals = 0;
	  $qtt_total = 0;
	      $client  = "";
       $qtt  = "";
       $date  = "";
       $prix  = "";
       $total  = "";
	   
while ($row_requette_mouvements = mysqli_fetch_array ($requette_mouvement_vente))
{	
//$row_requette_mouvements [""];
      $client  = $row_requette_mouvements ["Societe"];
       $qtt  = $row_requette_mouvements ["quantite"];
	   $qtt_total = $qtt_total + $qtt;
       $date  = $row_requette_mouvements ["date"];
       $prix  = $row_requette_mouvements ["prix"] - $row_requette_mouvements ["Remise"];
       $total  = $row_requette_mouvements ["Montant"];
	   $totals = $totals + $total;
   
	?>
    <tr>
      <td>
	   <a href="../bl/bl-vente.php?id_bl=<?php echo  $row_requette_mouvements["id_bl"];?>#<?php echo $row_requette_mouvements["id_detail"];  ?>"><span style ="color : orange;">
 <?php echo $client ;?></span></a>
	  </td>
      <td><?php echo $qtt ;?></td>
      <td><?php echo("".date("d-m-Y", strtotime($date)));  ?></td>
      <td><?php echo $prix ;?></td>
      <td><?php echo $total ;?></td>
    </tr>
<?php }?>
    
    <tr>
      <th>&nbsp; </th>
      <td>&nbsp; </td>
      <td>&nbsp;   </td>
      <td>&nbsp;  </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th> Total : </th>
      <td><?php echo $qtt_total ;?></td>
      <td>&nbsp;  </td>
      <td>&nbsp;  </td>
      <td><?php echo $totals ;?></td>
    </tr>

  </tbody>
</table>
<?php }
else {
?>	 
<h1 style=" text-align:center">Article jamais Vendu  !!</h1>
 
	<?php }
?>
 
<hr />
 
 
<br />
 <?php
// $req_pre=mysqli_query($link,"SELECT COUNT( * ) AS `Lignes` , `id_article` , `prix_achat` , `prix_vente`
// FROM `detail_fachat`
// WHERE `prix_achat` < $max_prix
// GROUP BY `id_article`
// ORDER BY `detail_fachat`.`prix_achat` DESC
// LIMIT 0 , 1")or die (mysqli_error($link));
// $req_suiv=mysqli_query($link,"SELECT COUNT( * ) AS `Lignes` , `id_article` , `prix_achat` , `prix_vente`
// FROM `detail_fachat`
// WHERE `prix_achat` > $min_prix 
// GROUP BY `id_article`
// ORDER BY `detail_fachat`.`prix_achat` ASC
// LIMIT 0 , 1")or die (mysqli_error($link));

// $row_pre= mysqli_fetch_array($req_pre);
// $row_suiv=mysqli_fetch_array($req_suiv);

// $id_article_pre=$row_pre["id_article"];
// $id_article_suiv=$row_suiv["id_article"];
// echo(($total_total_ht));
?> 
 
<hr />


<?php

}
else echo "no achat ";
}}
else
	header("Location:../login.php");

?>

    

    <!-- end .container -->
 
 </div>
 </div>
 
  
<script type = "text/javascript" src = "design/jquery.js"> 
</script> 

<script type="text/javascript"> 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
</script>


</body>
</html>