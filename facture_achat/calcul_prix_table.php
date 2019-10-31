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
<body onload="hey();">

<div class="container">
  <center>
  <?php 
  if (1==2)
  {
  ?>
<div class="header" id="header"></div>
<?php
  }
?>
  </center>
 
 
<div class="sidebar1">
 <center>
 <div id ="menu">
   <ul id="MenuBar1" class="MenuBarHorizontal">
     <li><a href="../" class="MenuBarItemSubmenu">Acceuil</a>       </li>
</ul>
 </div> 
 </center>
 
       <?php   
	session_start();
 
 

	
	?>  
 </div>

<div class="content">
  <br />   
  


<?php

if(isset($_SESSION['username']))
{	
include '../global.php';

$montant_ht;
$transport=0;
	if(isset($_GET["transport"]))

$transport=$_GET["transport"];
$tva=0;
	if(isset($_GET["tva"]))

$tva=$_GET["tva"];
$id_calcul_prix;

	if(isset($_GET["id_calcul_prix"]))

$id_calcul_prix=$_GET["id_calcul_prix"];
?>
<style type="text/css">
.tdtd {
	
	/* [disafactureed]border-spacing: 0px; */
}.tdtd2 {
	
	border-top-style: ridge;
	width: 90px;
}


.tab2
{
	
	}
.tab
{
	
	}
.infoDap {
	text-align: right;
	font-size: 12px;
	background-color: #FFF;
	color: #000;
	height: 130px;
	width: 400px;
	clear: none;
	font-family: Verdana, Geneva, sans-serif;
	display: inline;
	float: right;
	margin: 10px;
	padding: 10px;
	position: absolute;
	top: 10px;
	right: 10px;
}
#logo {
	height: 100px;
	width: 200px;
	/* [disafactureed]margin: 10px; */
	/* [disafactureed]padding: 10px; */
	/* [disafactureed]display: inline; */
	/* [disafactureed]border-right-style: groove; */
	/* [disafactureed]border-left-style: groove; */
	float: right;
}
#client-info {

	width: 70%;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	

	float: left;
	top: 120px;
	text-align: center;
	left: 10px;
}
#body {
	background-color: #FFF;
	/* [disafactureed]color: #000; */
	position: relative;
	margin: 10px;
	padding: 10px;
}
#payment {
	position: absolute;
	top: 80%;
}
#facture {
	height: 50px;
	width: 100%;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 18px;
	color: #906;
	text-transform: capitalize;
	margin: 10px;
	padding: 10px;
	text-align: center;
	font-weight: bold;
	vertical-align: middle;
	float: left;
}
#total {
	width: auto;
	text-align: center;
	float: left;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
}
#resultat {
	margin: 10px;
	width: auto;
	float: left;
	padding-right: 5px;
	padding-left: 5px;
}
#tafacturee {
	margin: 10px;
	padding: 10px;
	position: absolute;
	top: 280px;
}
tafacturee tr td {
	text-align: center;
	width: 100px;
}
.input-current-add {
	text-align: center;
}
#confirm-fact {
	position: absolute;
	height: 50px;
	width: 300px;
	bottom: inherit;
	right: 473px;
	top: 30px;
}
.tdtd3 {
	
		width: 350px;	
}
</style>

<div id = "client-info">
 
</div> 
<?php


?>
   
	<?php
	

?>
 














 
<?php

$somme_qt=0;
$somme_achat = 0 ;
$somme_vente = 0;
$req=mysqli_query($link," select * from calcul_prix_detail,calcul_prix WHERE    calcul_prix_detail.id_calcul_prix=calcul_prix.id_calcul_prix and calcul_prix_detail.`id_calcul_prix` ='".$_GET["id_calcul_prix"]."'")or die (mysqli_error($link));
if(mysqli_num_rows($req))
{
while($row = mysqli_fetch_array($req))
{

$qtt_calcul_prix_detail= $row["qtt_calcul_prix_detail"];
$somme_qt=$somme_qt+$qtt_calcul_prix_detail;
$transport =$row["transport"];
$tva = $row["tva"];
$prix_calcul_prix_detail= $row["prix_calcul_prix_detail"];
// $prix_vente= $row["prix_vente"];
$somme_achat = $somme_achat +$qtt_calcul_prix_detail*$prix_calcul_prix_detail ;
// $somme_vente = $somme_vente + $qtt_calcul_prix_detail*$prix_vente  ;
}
?> 
   <table border = "2" align="center">
<?php


	?> 
    <tr height="30px">
    <td>Total Prix d'achat HT :<br />
      
      
      <?php
	

echo(number_format($somme_achat, 2, '.', ' '));
	?>
    </td>
      <td>Total Prix d'achat TTC   :<br /><?php
	

echo(number_format($somme_achat, 2, '.', ' '));
	?> </td>
         <td> 
  Transport :<br /> <?php
	

echo(number_format($transport, 2, '.', ' '));
	?> </td>
    </tr>


   </table>
 	<?php

}
?>
 


















<div id="facture">

calcul des prix achats:
 
</div>

<center>
 
 
  <table width="95%" border = "1">
	<form action = "search2_calcul.php" method = "GET"><tr>    
    <td width = "90px" class="tdtd2">
   <center>
   N </center></td>
    <td width = "90px" class="tdtd2">
   <center>
     Ref 
   </center></td>
     
    <td class="tdtd2">
Quantite
    </td>
 
    <td class="tdtd2">
Prix d'achat    
    </td>
   <?php
	if ($transport!="0")
 
{
	?> <td width = "90px" class="tdtd2">Trasport </td>
    <?php
}
	?>
 
     <?php
	if ($tva=="17")

{
	?> <td width = "90px" class="tdtd2">TVA </td>	<?php
}
	?>  
     <td width = "90px" class="tdtd2">Prix d'achat ttc</td>
   	   <td width = "90px" class="tdtd2">
Actions</td>
       <td width = "90px" class="tdtd2">
Suppression
    </td>
      
      
      </tr>
    
    <tr>  
	<?php
	if (isset($_GET["tri"]))
	{?><input type="hidden" name  = "tri" value = "<?php echo("".$_GET["tri"]);?>"/>
<?php
}
?>      <input type="hidden" name  = "id_calcul_prix" value = "<?php echo("".$id_calcul_prix);?>"  />
     
      <?php
 
	  if (isset($_GET["tri"]))
 {
 if($_GET["tri"]==="montant1")
  $tri = "`calcul_prix_detail`.`Montant` ASC";	  
   if($_GET["tri"]==="montant2")
  $tri = "`calcul_prix_detail`.`Montant` DESC";	  
 
 
 }
 else 
 $tri = "id_calcul_prix_detail DESC ";	  
 
 $req44 = mysqli_query($link,"select * from calcul_prix_detail where id_calcul_prix = '".$id_calcul_prix."' ORDER BY id_calcul_prix_detail DESC")or die(mysqli_error($link));
   //ORDER BY   id_calcul_prix_detail DESC );
   $numm=mysqli_num_rows($req44);
 	   ?>
      
      <td><?php 
	  
	  echo($numm." lignes");
	  ?>
      
      </td>
      <td>
        <input 
         name  = "ref_calcul_prix_detail" type = "text"  class = "input-current-add" id ="inser_produit" value="<?php  
		 if(isset($_GET["ref_calcul_prix_detail"]))
		{ $req1=mysqli_query($link,"select * from articles where reference = '".$_GET["ref_calcul_prix_detail"]."' ");
	 while($row3= mysqli_fetch_array($req1))
			{ $id_article=$row3['id_article'];
				echo("".$_GET["ref_calcul_prix_detail"]);
					} }?>" 
					<?php  if(!isset($_GET["ref_calcul_prix_detail"]))  { ?> autofocus="autofocus" <?php 	} ?>  />
      </td> 
<td><input type = "text" class = "input-current-add" id = "qtt_calcul_prix_detail" <?php 
if (isset($_GET['ref_calcul_prix_detail'])|| isset($_GET['qtt_calcul_prix_detail']))
{
?>autofocus="autofocus"<?php
}
?>name  =  "qtt_calcul_prix_detail" value = "<?php 
if (isset($_GET['qtt_calcul_prix_detail']))
echo("".$_GET['qtt_calcul_prix_detail']);
else 
echo("1");
?>" />

</td>
 
<td><input class = "input-current-add" type = "text" name  =  "prix_calcul_prix_detail" value = "<?php 
if (isset($_GET['prix_calcul_prix_detail']))
echo("".$_GET['prix_calcul_prix_detail']/$_GET['qtt_calcul_prix_detail']);
else 
echo("0");?>"/>
</td>
 <?php
	if ($transport!="0")
 
{
	?><td>&nbsp;</td><?php
}
	?>
  <?php
	if ($tva=="17")

{
	?><td></td> <?php
}
	?>

<td> </td>
 
<td><input type = "submit" name  = "submit" value = "Ajouter" />
</td>
<td><a onclick="if(confirm('Etes vous sûr de vouloir supprimer tout ?')) document.location='delete_article_calcul.php?id_calcul_prix=<?php echo("".$id_calcul_prix);?>&id_calcul_prix_detail=ALL';" href="#">Supprimer Tout<img src="design/pics/delete.png" width="16" height="16" alt="Supprimer tout" /></a>
</td>


    </tr>   
</form>   
	   	   <tr>
       	   <?php
		     if($numm)
   {
	 	$prix_achat = 0;  $ii = 0;
	  while($result2=mysqli_fetch_array($req44))
	 {
	 $req=mysqli_query($link,"select * from articles where reference = '".$result2['ref_calcul_prix_detail']."' ");

	   while($result=mysqli_fetch_array($req))
	 {
	 ?>	 
       <td class="tdtd2" width = "90PX">
    <?php
	$ii = $ii+1;
	echo ("".$ii);
	?>
    </td>
       <td class="tdtd2" width = "90PX" <?php   $req_ref_double=mysqli_query($link,"SELECT  * FROM `calcul_prix_detail`  where `ref_calcul_prix_detail` = '".$result2['ref_calcul_prix_detail']."'  ")or die (mysqli_error($link));
if (mysqli_num_rows($req_ref_double)>1)
	   {?>
       
	   
	   bgcolor="#000066"<?php
	   }?>>
    <?php
	$ref_calcul_prix_detail=$result2['ref_calcul_prix_detail'];
	// echo ("".$result['ref_calcul_prix_detail']);
	// $reference = $result['reference'];
?><a  class = "linkcolor"  href="#"  







	onclick  ="window.open('../stock/update-designation.php?search=<?php 
 
echo $ref_calcul_prix_detail?>')" >
		<?php echo $ref_calcul_prix_detail?>
			</a>
    </td>
  
    <td class="tdtd2">
    <?php
	echo ("".$result2['qtt_calcul_prix_detail']);
	?>
    </td>
   <?php
	
	// $quant_en_Stock = 0;
// $quant_vendu = 0;
// $quant_comptab = 0;
// $quantite_total=0;


// $req_facture_vente = mysqli_query($link,"SELECT COALESCE(SUM(quantite),0) AS quant_en_Stock
// FROM  detail_facture 
// WHERE  id_article = '$id_art'")or die (mysqli_error($link));

// $req_facture_achat = mysqli_query($link,"SELECT COALESCE(SUM(qtt_calcul_prix_detail),0) AS quant_en_Stock
// FROM  calcul_prix_detail 
// WHERE  id_article = '$id_art'")or die (mysqli_error($link));

// $row_facture_vente=mysqli_fetch_array($req_facture_vente);
// $row_facture_achat=mysqli_fetch_array($req_facture_achat);

//if(mysqli_num_rows($requetqt)!=0)
// $quantite_total = $row_facture_achat['quant_en_Stock'];

// $quant_comptab= $row_facture_vente['quant_en_Stock'];
// $quant_reste = $quantite_total-$quant_comptab;
?>
  
    <td class="tdtd2" width = "90PX">
	<?php 

$prix_calcul_prix_detail=	$result2['prix_calcul_prix_detail'];
$prix_achat = $prix_calcul_prix_detail;
echo(number_format($prix_calcul_prix_detail, 0, '.', ''));
	?>
    </td>
    <?php
	if ($transport!="0")
 
{
	$porcentage_ht = $result2['qtt_calcul_prix_detail'] * ($result2['prix_calcul_prix_detail'] *100/$somme_achat);
	$total = $transport *$porcentage_ht /100;
	$transport_ligne=	$total /$result2['qtt_calcul_prix_detail'] ;
$prix_achat = $prix_achat +$transport_ligne;
	?> <td><?php echo(number_format($transport_ligne, 0, '.', '')); ?></td><?php
}
	?>
   <?php
	if ($tva=="17")

{
$tva_ligne=	$result2['prix_calcul_prix_detail']*0.17;
$prix_achat = $prix_achat +$tva_ligne;

	?>   <td><?php echo(number_format($tva_ligne, 0, '.', '')); ?></td><?php
}
	?>
 
<td>
<?php 
// $prix_vente=$result2['prix_vente'];
 // echo(number_format($prix_vente, 2, '.', ''));
echo($prix_achat);?>
</td>
    <?php
	// change_article-f.php?id_calcul_prix=$id_calcul_prix&qtt_calcul_prix_detail=$result2['qtt_calcul_prix_detail']&id_calcul_prix_detail=$result2['id_calcul_prix_detail']&ref_calcul_prix_detail=$ref_calcul_prix_detail)&prix_calcul_prix_detail=$result2['prix_calcul_prix_detail']&prix_vente=
	
	
	?>
<td><a href="#">Modifier<br /><img src="design/pics/modifier.png" width="16" height="16" alt="Modifier" longdesc="mofifier cet ligne de commande" /></a>
</td><td><?php
    
	?><a onclick="if(confirm('Etes vous sûr de vouloir supprimer cet Ligne ?')) document.location='delete_article_calcul.php?id_calcul_prix=<?php echo("".$id_calcul_prix);?>&id_calcul_prix_detail=<?php echo("".$result2['id_calcul_prix_detail']);?>';" href="#"><img src="design/pics/delete.png" width="16" height="16" alt="Supprimer cet ligne" /></a>
    
<?php	     
	
	   ?></td>


          </tr>
	   <?php
	 }
	   }      
	  $i=0;
	  while($i++<1)	  
	  {
		  ?>   
      <tr>
      <td>&nbsp;</td>   
 
<td>&nbsp;
</td>
<td>&nbsp;
</td><td>&nbsp;
</td>
 <?php
	if ($transport!="0")
 
{
	?><td>&nbsp;</td><?php
}
	?>
  <?php
	if ($tva=="17")

{
	?><td>&nbsp;</td><?php
}
	?>


 <td>&nbsp;
</td>
 
<td>&nbsp;</td>

<td>&nbsp;</td>
      </tr>
        <?php
		  
	  }
	  
	  ?>
</table>

 
</center>

<div id = "confirmer_facture"></div>

</center>

<?php
}}
else
	header("Location:../login.php");

?>
</div>  
    <!-- end .container --> 
    </div>
   	    <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
 function hey (){
 $("#header").hide(function(){
//$("#header").show(1000).html("");
<?php if(isset($_GET["ref_calcul_prix_detail"]))  { ?>
$("#qtt_calcul_prix_detail").focus();
<?php }?>
	
	});   }
	
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>


</body>
</html>