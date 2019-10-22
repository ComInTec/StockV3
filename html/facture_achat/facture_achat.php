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
  $ref_fournisseur ="";
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
$ref;
$id_fachat;
$date;
$id_article;
$fournisseur;

	if(isset($_GET["id_fachat"]))

$id_fachat=$_GET["id_fachat"];
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
<table align="left">
<tr>
<td width ="87">Date</td>
<td width ="13">: </td>
<td width="214">
<input name="date"  type = "text" class = "id_client" value = "<?php 
$req=mysqli_query($link,"SELECT facture_achat.`id_fachat`,facture_achat.`date`,facture_achat.`ref_fournisseur`,fournisseurs.Societe
FROM `facture_achat`
left outer join fournisseurs
on facture_achat.`ref_fournisseur` = fournisseurs.ref_fournisseur AND facture_achat.id_fachat = '".$id_fachat."'

")or die (mysqli_error($link)) ;
if(mysqli_num_rows($req))
{
while($row = mysqli_fetch_array($req))
{
	

$date =$row["date"];
$fournisseur = $row["Societe"];
$ref_fournisseur = $row["ref_fournisseur"];
	}
}
echo("".date("d-m-Y", strtotime($date)));?>" readonly="readonly" />  
</td></tr>
<tr>
<td width ="87">Fournisseur</td>
<td width ="13">: </td>
<td width="214"><input name=""  type = "text" id = "ref_fournisseur" value = "<?php echo("".$fournisseur);?>" readonly="readonly" />  
</td></tr>
<tr>
<td width ="87">
N° Facture </td>
<td width ="13"> : </td>
<td> <input name="id_fachat2"  type = "hidden" id = "id_fachat" value = "<?php echo(''.$id_fachat);?>" readonly="readonly" />  <input name="name_fachat"  type = "text" id = "name_fachat" value = "<?php echo("".$id_fachat);?>" readonly="readonly" />  

</td>
</tr>
</table>
</div><div id = "total">
<?php


?>
   
	<?php
	

?>
</div>














<div id = "total">
<?php

$somme_qt=0;
$somme_achat = 0 ;
$somme_vente = 0;
$req=mysqli_query($link," select * from detail_fachat WHERE `id_fachat` ='".$_GET["id_fachat"]."'")or die (mysqli_error($link));
if(mysqli_num_rows($req))
{
while($row = mysqli_fetch_array($req))
{

$qtt= $row["qtt"];
$somme_qt=$somme_qt+$qtt;
$dernier_prix= $row["dernier_prix"];
$prix_achat= $row["prix_achat"];
$prix_vente= $row["prix_vente"];
$somme_achat = $somme_achat +$qtt*$prix_achat ;
$somme_vente = $somme_vente + $qtt*$prix_vente  ;
}
?> 
   <table border = "2" align="center">
<?php


	?> 
    <tr height="30px">
    <td>Total Prix d'achat  :<br />
      
      
      <?php
	

echo(number_format($somme_achat, 2, '.', ' '));
	?>
    </td>
      <td>Total Prix de vente :   <br /> <?php
	

echo(number_format($somme_vente, 2, '.', ' '));
	?></td>
    </tr>


   </table>
 	<?php

}
?>
</div>


















<div id="facture">

Facture Achat:
 
</div>

<center>
<div id = "resultat">
 
  <table width="95%" border = "1">
	<form action = "search2-fa.php" method = "GET"><tr>    
    <td width = "90px" class="tdtd2">
   <center>
   N </center></td>
    <td width = "90px" class="tdtd2">
   <center>
     Ref /Code Barre 
   </center></td>
    <td  class="tdtd2">
Designation	    
    </td>    
    <td class="tdtd2">
Quantite
   <br />
   <?php
//echo("Total : ");
$reqqt = mysqli_query($link,"select COALESCE(SUM(qtt),0) AS quant from detail_fachat where id_fachat = '$id_fachat'")or die(mysqli_error($link));
$row1 = mysqli_fetch_array ($reqqt);
$qtt= $row1['quant'];
echo("".$qtt." unité(s)");
?> </td>
 <td class="tdtd2">
Reste 
 </td>
    <td class="tdtd2">
Prix d'achat    
    </td>	
 <td width = "90px" class="tdtd2">Dernier Prix </td>
      
     <td width = "90px" class="tdtd2">Prix de vente </td>
   	  <td width = "240" class="tdtd2">
        <a href="facture-vente.php?id_fachat=<?php echo($id_fachat);?>&tri=<?php
		 if (isset($_GET["tri"]))
		 
	{if($_GET["tri"]==="montant1")
		echo("montant2");
		else
		 echo("montant1");
	}
		else
		 echo("montant1");
		?>">Montant</a></td>
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
?>      <input type="hidden" name  = "id_fachat" value = "<?php echo("".$id_fachat);?>"  />

        <input type="hidden" name  = "ref_fournisseur" value = "<?php echo("".$ref_fournisseur);?>"  />
  
      <?php
 
	  if (isset($_GET["tri"]))
 {
 if($_GET["tri"]==="montant1")
  $tri = "`detail_fachat`.`Montant` ASC";	  
   if($_GET["tri"]==="montant2")
  $tri = "`detail_fachat`.`Montant` DESC";	  
 
 
 }
 else 
 $tri = "id_detachat DESC ";	  
 
 $req44 = mysqli_query($link,"select * from detail_fachat where id_fachat = '".$id_fachat."' ORDER BY id_detachat DESC")or die(mysqli_error($link));
   //ORDER BY   id_detachat DESC );
   $numm=mysqli_num_rows($req44);
 	   ?>
      
      <td><?php 
	  
	  echo($numm." lignes");
	  ?>
      
      </td>
      <td>
        <input 
         name  = "inser_produit" type = "text"  class = "input-current-add" id ="inser_produit" value="<?php  
		 if(isset($_GET["reference"]))
		{ $req1=mysqli_query($link,"select * from articles where reference = '".$_GET["reference"]."' ");
	 while($row3= mysqli_fetch_array($req1))
			{ $id_article=$row3['id_article'];
				echo("".$_GET["reference"]);
					} }?>" 
					<?php  if(!isset($_GET["reference"]))  { ?> autofocus="autofocus" <?php 	} ?>  />
      </td><td  class="tdtd2">&nbsp;</td>
<td><input type = "text" class = "input-current-add" id = "qtt" <?php 
if (isset($_GET['reference'])|| isset($_GET['qtt']))
{
?>autofocus="autofocus"<?php
}
?>name  =  "qtt" value = "<?php 
if (isset($_GET['qtt']))
echo("".$_GET['qtt']);
else 
echo("1");
?>" />

</td>
<td></td>
<td><input class = "input-current-add" type = "text" name  =  "prix_achat" value = "<?php 
if (isset($_GET['prix_achat']))
echo("".$_GET['prix_achat']);
else 
echo("0");?>"/>
</td><td><input name="dernier_prix" type="text"  class = "input-current-add" id="dernier_prix" value="<?php 
if (isset($_GET['dernier_prix']))
echo("".$_GET['dernier_prix']);
else 
echo("0");
?>" /></td>

<td><input name="prix_vente"  class = "input-current-add" type="text" id="prix_vente" value="<?php 
if (isset($_GET['prix_vente']))
echo("".$_GET['prix_vente']);
else 
echo("0");
?>" /></td>
<td>&nbsp;
</td>
<td><input type = "submit" name  = "submit" value = "Ajouter" />
</td>
<td><a onclick="if(confirm('Etes vous sûr de vouloir supprimer cet Ligne ?')) document.location='delete_article_achat.php?id_fachat=<?php echo("".$id_fachat);?>&id_detachat=ALL';" href="#">Vider Cette facture<img src="design/pics/delete.png" width="16" height="16" alt="Supprimer cet ligne" /></a>
</td>


    </tr>   
</form>   
	   	   <tr>
       	   <?php
		     if($numm)
   {
	   $ii = 0;
	  while($result2=mysqli_fetch_array($req44))
	 {
	 $req=mysqli_query($link,"select * from articles where id_article = '".$result2['id_article']."' ");

	   while($result=mysqli_fetch_array($req))
	 {
	 ?>	 
       <td class="tdtd2" width = "90PX">
  <span id="<?php 
	  echo $result2['id_detachat']; ?>"></span><?php  
	$ii = $ii+1;
	echo ("".$ii);
	?>
    </td>
       <td class="tdtd2" width = "90PX" <?php   $req_ref_double=mysqli_query($link,"SELECT  `id_article` , `id_fachat` FROM `detail_fachat`  where `id_article` = '".$result2['id_article']."'  and id_fachat = '".$id_fachat."' ")or die (mysqli_error($link));
if (mysqli_num_rows($req_ref_double)>1)
	   {?>
       
	   
	   bgcolor="#000066"<?php
	   }?>>
    <?php
	$id_art=$result['id_article'];
	// echo ("".$result['reference']);
	$reference = $result['reference'];
	?><a  class = "linkcolor"  href="#"  







	onclick  ="window.open('../stock/update-designation.php?search=<?php 
 
echo $reference?>')" >
		<?php echo $reference?>
			</a>
    </td>
    <td class="tdtd3"  width = "290PX">
	<?php
	echo ("".$result['designation']);
	?>
    </td>
    <td class="tdtd2">
    <?php
	echo ("".$result2['qtt']);
	?>
    </td>
   <?php
	
	$quant_en_Stock = 0;
$quant_vendu = 0;
$quant_comptab = 0;
$quantite_total=0;


$req_facture_vente = mysqli_query($link,"SELECT COALESCE(SUM(quantite),0) AS quant_en_Stock
FROM  detail_bl 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));

$req_facture_achat = mysqli_query($link,"SELECT COALESCE(SUM(qtt),0) AS quant_en_Stock
FROM  detail_fachat 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));

$row_facture_vente=mysqli_fetch_array($req_facture_vente);
$row_facture_achat=mysqli_fetch_array($req_facture_achat);

//if(mysqli_num_rows($requetqt)!=0)
$quantite_total = $row_facture_achat['quant_en_Stock'];

$quant_comptab= $row_facture_vente['quant_en_Stock'];
$quant_reste = $quantite_total-$quant_comptab;
?>
   <td class="tdtd2" <?php
  if($quant_reste<0) 
  {
   ?>  
   style="background-color:#03C"
   <?php
  }
   ?>><a  class = "linkcolor"  href="../bl/acheteurs_article_bl.php?id_article=<?php 
echo($id_art);
?>">
<?php
echo ("$quant_reste");
	?>
   </a>
    </td>
    <td class="tdtd2" width = "90PX">
	<?php 
$prix2=	$result2['prix_achat'];
echo(number_format($prix2, 2, '.', ''));
	?>
    </td>
<td><?php 
$dernier_prix = $result2['dernier_prix'] ;
 echo(number_format($dernier_prix, 2, '.', ''));
?></td>
<td>
<?php 
$prix_vente=$result2['prix_vente'];
 echo(number_format($prix_vente, 2, '.', ''));
// echo($prix_vente);?>
</td>
    <td class="tdtd2" width = "90PX">
	<?php
	//$result[4]+$result[4]*0.17;
$prix_vente_total = $prix_vente * $result2['qtt'];
 echo(number_format($prix_vente_total, 2, '.', ''));
	//$total = $result2['quantite']*$prix2;
?>
    </td>
<td><a href="change_article-f.php?id_fachat=<?php echo("".$id_fachat);?>&qtt=<?php echo ("".$result2['qtt']);
?>&id_detachat=<?php  echo $result2['id_detachat'];
?>&reference=<?php  echo($reference);?>&prix_achat=<?php echo ("".$result2['prix_achat']);?>&prix_vente=<?php echo ("".$result2['prix_vente']);?>&dernier_prix=<?php echo ("".$result2['dernier_prix']);?>">Modifier<br /><img src="design/pics/modifier.png" width="16" height="16" alt="Modifier" longdesc="mofifier cet ligne de commande" /></a>
</td><td><?php
    
	?><a onclick="if(confirm('Etes vous sûr de vouloir supprimer cet Ligne ?')) document.location='delete_article_achat.php?id_fachat=<?php echo("".$id_fachat);?>&id_detachat=<?php echo("".$result2['id_detachat']);?>';" href="#"><img src="design/pics/delete.png" width="16" height="16" alt="Supprimer cet ligne" /></a>
    
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
      <td>&nbsp;</td>  <td>&nbsp;</td>
<td>&nbsp;
</td>
<td>&nbsp;
</td>
<td>&nbsp;
</td><td>&nbsp;
</td>


<td>&nbsp;
</td><td>&nbsp;
</td>
<td>&nbsp;
</td>
<td>&nbsp;</td>

<td>&nbsp;</td>
      </tr>
        <?php
		  
	  }
	  
	  ?>
</table>

</div>
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
<?php if(isset($_GET["reference"]))  { ?>
$("#qtt").focus();
<?php }?>
	
	});   }
	
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>


</body>
</html>