
<?php
include("modele/global.php");
$code_barre;
$dernier_prix =0;
$ref;
$i=1;

if(isset($_GET['code']))
{
	$code_barre= strip_tags($_GET["code"]);
	//$code_barre = preg_replace('#[^a-z 0-9?!]#i', '', $code_barre);
	//$array=explode ()
	
$requete2 = "code_bare = '".$code_barre."' or reference like '%".$code_barre."%' or designation like  '%$code_barre%' " ;
	 
if(strlen($code_barre)>1)
{




$requete = mysqli_query($link,"SELECT * FROM articles WHERE ".$requete2)or die (mysqli_error($link));
 
if(mysqli_num_rows($requete)==0)
{
 	$split_search = explode ($code_barre, ' ');
	$cpt=0;
		if (count ($split_search)>1)
	foreach ($split_search as $value)
	{
		// if (count ($split_search) > $cpt++)
	
$requete2 = $requete2 ." or code_bare = '".$value."' or reference like '%".$value."%' or designation like  '%$value%' " ;


  
	
		
		
	}
	
$requete = mysqli_query($link,"SELECT * FROM articles WHERE ".$requete2)or die (mysqli_error($link));
	
}  
	}

if(mysqli_num_rows($requete))
{
	
	
	
	
	echo(mysqli_num_rows($requete)." Resultats !!");
	?>
    <hr />
    <?php
while($row=mysqli_fetch_array($requete))
	    {
	//$code_barre=str_replace($code_barre,"<span class=\"bb\">$code_barre</span>",$code_barre);
	$id_art =  $row['id_article'];
	$fourn = $row['ref_fournisseur'];
	
$req3 = mysqli_query($link,"select Societe from fournisseurs where ref_fournisseur = '$fourn'");
$rez3= mysqli_fetch_array ($req3);
$fourn2 = $rez3['Societe'];
	$ref    =  $row['reference'];
	$ref1 = str_ireplace($code_barre,"<b><u>$code_barre</u></b>",$ref);
	$designation= $row['designation'];
	$designation1 = str_ireplace($code_barre,"<span class=\"bb\">$code_barre</span>",$designation);
	
	
	
	
	
	//$quant_en_Stock= $row['quant_en_Stock'];
	$Prix_HT = $row['Prix_HT'];	
	$emplacement = $row['emplacement'];
	$code_bar = $row['code_bare'];
	$code_bar1=	str_ireplace($code_barre,"<span class=\"bb\">$code_barre</span>",$code_bar);	
	?>
<th>
</th>
<table width="90%">
 <tr>

<td>
</td>
<td width="30%" class="sous">
</td>
</tr>
<tr>
 <tr>
   <td  align="left" class="soug" style="color: #FF8040;"><span style="font-weight: bold; text-decoration: underline; color:#CCC">Reference :</span><br /><?php echo("$ref1");?>
   <a href="#" class = "modif" onclick ="window.open('stock/update-designation.php?search=<?php echo("$ref");?>')"><img src="design/pics/modifier.png" alt="Modifier Cet Article" width="16" height="16" align="absmiddle" longdesc="Modifier Cet Article" /></a>
<br /></td>
<?php
$quant_en_Stock = 0;
$quant_vendu = 0;
$quant_dispo = 0;
// $quant_vendu = 0;
$quantite_total=0;

$requetqt = mysqli_query($link,"SELECT COALESCE(SUM(quantite),0) AS quant_en_Stock
FROM  detail_bl 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));

 

$requetqtv = mysqli_query($link,"SELECT COALESCE(SUM(qtt),0) AS quant_en_Stock
FROM  detail_fachat 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));

$row2v=mysqli_fetch_array($requetqtv);
 

$row2=mysqli_fetch_array($requetqt);
 
$quantite_total = $row2v['quant_en_Stock'];
$quant_vendu= $row2['quant_en_Stock'];
 
$quant_en_Stock = $row2v['quant_en_Stock']-$quant_vendu;
 
?>

<td class="sous"><span style="font-weight: bold; text-decoration: underline; color: #CCC;">Designation :</span> <br />
 <span class = "modifd" ><?php echo("$designation1");?></span>
</td>

<td width="30%" align="right" class="soug" ><span style="font-weight: bold; text-decoration: underline; color: #CCC;">
Fournisseur : </span> <br /><span class="modif">
<?php
echo(" ".$fourn2);?>
</span>
</td></tr>
<tr><td height="80" class="soug"><span style="font-weight: bold; text-decoration: underline; color: #CCC;">Code Barre : </span><br /> <span style="color: #CCC; font-size: 18px;"> <?php echo("$code_bar");?></span></td>
   <?php

//echo(" ".$quantite_total );
?>
<td align="right" class="soug"> <span style="font-weight: bold; text-decoration: underline; color: #CCC;"> Disponible / achetée :</span> <br /><span class="modif"> 
<?php
echo($quant_en_Stock  ." / ");
?>
<a href ="stock/mouvements_article.php?id_article=<?php echo $id_art;?>">
<?php
echo( $quantite_total );
?></a></span> 
</td>
<td align="right" class="soug"><span style="font-weight: bold; text-decoration: underline; color: #CCC;">
Quantite Vendue :</span><br /><span class="modif"><a href ="bl/acheteurs_article_bl.php?id_article=<?php echo $id_art;?>">
<?php 

echo("   ".$quant_vendu ."");


?></a>
</span>
</td>

</tr>
<tr>
<td align="right" class="soug"><span style="font-weight: bold; text-decoration: underline; color: #CCC;"> 
Emplacement :</span><br /><a href ="stock/emplacement.php?emplacement=<?php  
echo($emplacement);


?>" >
<?php 

echo("  <span class=\"modif\"> ".$emplacement ."</span>");


?>
</a>
</td>




<td align="right" class="soug"><span style="font-weight: bold; text-decoration: underline; color: #CCC;">
Action</span> <br />
   <a href="bl/new_bl.php?ref_client=1&inser_produit=<?php echo("$ref");?>" class = "modif"  style="font-weight: bold; font-size: 24px; color: #CCC;">Vendre<img src="design/pics/modifier.png" alt="Modifier Cet Article" width="16" height="16" align="absmiddle" longdesc=" " /></a>  </td>

<td align="right" class="soug"><span style="font-weight: bold; text-decoration: underline; color: #CCC;">
Prix De Vente :</span><br /> <span style = "font-size: 24px; color: #CF0;"> 
<?php 





$prix =0;

	$requetqtv = mysqli_query($link,"SELECT COALESCE(SUM(qtt),0) AS quant_en_Stock
FROM  detail_fachat 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));

$row2v=mysqli_fetch_array($requetqtv);

$quantite_total = $row2v['quant_en_Stock'];




	$req_quant_compta = mysqli_query($link,"SELECT COALESCE(SUM(quantite),0) AS quant_vendu
FROM  detail_bl 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));
$row2compta=mysqli_fetch_array($req_quant_compta);

$quant_vendu= $row2compta['quant_vendu'];


	$qtt_prix=0;
 
$rest=$quantite_total-$quant_vendu;
 
$req_prix = mysqli_query($link,"SELECT  detail_fachat.id_article,detail_fachat.dernier_prix ,detail_fachat.qtt, detail_fachat.prix_vente, detail_fachat.id_fachat, facture_achat.date
FROM detail_fachat, facture_achat
WHERE detail_fachat.id_fachat = facture_achat.id_fachat
AND detail_fachat.id_article ='".$id_art."'
ORDER BY `facture_achat`.`id_fachat` DESC
") or die (mysqli_error($link));
 $s=0;
if( mysqli_num_rows($req_prix))
{
while($row_req_prix =mysqli_fetch_array($req_prix)) 	
	{
	/*		$qtt_prix=$qtt_prix+$row_req_prix["qtt"] ;
		if($qtt_prix>$quant_vendu && $s==0)*/
{
	$prix= $row_req_prix["prix_vente"];
	//$s=1;

	$dernier_prix = $row_req_prix["dernier_prix"];
	}
	
 	}
}
 echo("  $prix DA / $dernier_prix");?>
</span></td>


</tr>

<tr>




<td></td>


</table>
<br />
<hr />
<?php

}
}
if(mysqli_num_rows($requete)==0)
{
 
?>
 <span style="text-align: center; color: #CCC;">S'agit il d'un nouvel Article ?
 </span>
 <br/>
 <a href="stock/update-designation.php?search=<?php echo("$code_barre");?>" class = "modif" style="text-align: center; text-decoration: none; color: #3FF; font-style: italic; font-size: 18px;" >Ajouter cet Article<img src="design/pics/modifier.png" alt="Modifier Cet Article" width="16" height="16" align="absmiddle" longdesc="Modifier Cet Article" /></a>
<?php	
	}





}


?>

