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

<script src="../bls/media/js/jquery.js" type="text/javascript">
</script>
<script src="../bls/media/js/jquery.dataTables.js" type="text/javascript">
</script>
<script type="text/javascript" >

</script>
<style type="text/css">

</style>
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
 </div> </center>
   
<?php
 $link = mysqli_connect('localhost','root','') or die($error);
    mysqli_select_db($link,'dap2') or die($error);

 session_start();
  
 $p=4;
$dp=3; 
$year_debut=0;
$mois_debut=0;
$jour_debut=0;

		$year_fin = 0;
		$mois_fin = 0;
		$jour_fin = 0;
		
if(isset($_SESSION['username']))
{	 
 ?>
 
  <br />  <br />    <br /> 
    Selectionnez  Jour , mois et année de facturation  
    <br /><br /> 
 *   Laisser le jour vide pour voir la recette du mois selectionnée
      <br /> 
 *   Laisser le mois vide pour voir la recette de l'année selectionnée
        <br />
       *   Laisser l'année vide pour voir la recette  depuis le jour de votre <b> <i>premier Bon</i></b> .  
        <br />    <br /> 
   

 <form method="GET" action="recettes.php">

  <table width="45%" border="2" align="center">
  <tr height="50">
  <td>
  <?php
  
  $jour_actuel = "";
 
  if (isset($_GET["jour"]) )
  $jour_actuel = $_GET["jour"];
  
  
  $mois_actuelle = "";
  $premiere_annee=date ("Y")+0;
  if (isset($_GET["mois"]) )
  $mois_actuelle = $_GET["mois"];
  
  $annee_actuelle = date ("Y");
  if (isset($_GET["annee"]) )
  $annee_actuelle = $_GET["annee"];
  
// die ("". $mois_actuelle);
  ?>
<select name = "mois" >
<option value = "<?php echo("NULL");?>"    ><?php echo(" ");?>
<option value = "<?php $i=1;echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Janvier
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Fevrier
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Mars
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Avril
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>selected="selected"<?php }?>>Mai
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Juin
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Juillet
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?> selected="selected"<?php }?>>Aout
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Septembre
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Octobre
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?>  selected="selected"<?php }?>>Novembre
</option>
<option value = "<?php echo($i++);?>"<?php  if (( !isset($_GET["mois"]) && $i-1 == date ("m")) || ( isset($_GET["mois"]) && $i-1 == $mois_actuelle )){?> selected="selected"<?php }?>>Decembre
</option>
</select>
</td>
<td valign="middle">
<?php

/* $ss=31;
	 
	 do{
	 $d2= $date2."-".$ss--;
	 
		}while (date("m",strtotime($date2))!=date("m",strtotime($d2)));*/
		
//$date2=$d2;
$last=1;
	$req_part = "";
if (isset($_GET["annee"]))
{
	if($_GET["annee"]!="NULL")
	{
	$req_part = "where `bl`.`date` < '$annee_actuelle-";

if (isset($_GET["mois"]) )
	if($_GET["mois"]!="NULL"  )
{
	if($_GET["mois"]!="12"  )
{
	$a=$_GET["mois"]+1;
$req_part = $req_part .$a;
$last="1";
}
else
{$req_part =$req_part .$mois_actuelle;

$last="31";
}
}
else
$req_part =$req_part ."12";
else
$req_part =$req_part ."12";

$req_part =$req_part ."-$last' and `bl`.`date` >= '$annee_actuelle-";

if (isset($_GET["mois"]) )

	if($_GET["mois"]!="NULL")
$req_part =$req_part .$mois_actuelle;
else
$req_part =$req_part ."1";
else
$req_part =$req_part ."1";

$req_part =$req_part ."-1'";	
}}



$req_min_date = mysqli_query($link,"SELECT * 
FROM  `bl` ".$req_part ."
ORDER BY  `bl`.`date` ASC LIMIT 0,1");
	$ii = date ("Y")+0;
	//die("".$i);
	if (mysqli_num_rows($req_min_date))
	{
		
		while ($row=mysqli_fetch_array($req_min_date))
		{
			$date_actuelle = $row["date"];
			//die($date_actuelle);
			$ii=date("Y", strtotime($row["date"]))+0;
		$year_debut=$ii;	//die("hh".$ii);
		$mois_debut=date("m", strtotime($row["date"]))+0;
		$jour_debut = date("d", strtotime($row["date"]))+0;	
			}
		}

	//$annee_
	$last;
	$req_part = "";
if (isset($_GET["annee"]))
{
	if($_GET["annee"]!="NULL")
	{
	$req_part = "where `bl`.`date` < '$annee_actuelle-";

if (isset($_GET["mois"]) )
	if($_GET["mois"]!="NULL"  )
{
	if($_GET["mois"]!="12"  )
{
	$a=$_GET["mois"]+1;
$req_part = $req_part .$a;
$last="1";
}
else
{$req_part =$req_part .$mois_actuelle;

$last="31";
}
}
else
$req_part =$req_part ."12";
else
$req_part =$req_part ."12";

$req_part =$req_part ."-$last' and `bl`.`date` >= '$annee_actuelle-";

if (isset($_GET["mois"]) )

	if($_GET["mois"]!="NULL")
$req_part =$req_part .$mois_actuelle;
else
$req_part =$req_part ."1";
else
$req_part =$req_part ."1";

$req_part =$req_part ."-1'";	
}}

	
$req_max_date = mysqli_query($link,"SELECT * 
FROM  `bl` 
".$req_part ."
ORDER BY  `bl`.`date` DESC LIMIT 0,1");
	
	//die("".$i);
	if (mysqli_num_rows($req_max_date))
	{
		
		while ($row=mysqli_fetch_array($req_max_date))
	{
		$year_fin = date("Y", strtotime($row["date"]))+0;
		$mois_fin = date("m", strtotime($row["date"]))+0;
		$jour_fin = date("d", strtotime($row["date"]))+0;	
	//	die("".$jour_fin);	
			}
		}
		
$req_max_date = mysqli_query($link,"SELECT * 
FROM  `bl` 

ORDER BY  `bl`.`date` DESC LIMIT 0,1");
	
	//die("".$i);
	if (mysqli_num_rows($req_max_date))
	{
		
		while ($row=mysqli_fetch_array($req_max_date))
	{
		$premiere_annee= date("Y", strtotime($row["date"]))+0;
			
			}
		}
		
	?>
	<select name = "annee" >
<option value = "<?php echo("NULL");?>" ><?php echo(" ");?>

	<?php	
		
	for ($ii;$ii<=$premiere_annee;$ii++){
?>
<option value = "<?php echo("".$ii);?>" <?php  if (( !isset($_GET["annee"]) && $ii == date ("Y")) || ( isset($_GET["annee"]) && $ii == $annee_actuelle )){?>  selected="selected"<?php }?>><?php echo("".$ii);?>
</option>
<?php
}
?></select>

</td>


</tr>
<tr>
<td></td>
<td>

<input style=" width:100px ; height:50px;" type="submit" value = "Envoyer"/>
</td>
</tr>
</table >
</form>
</br></br>
 
  <?php
  if (isset($_GET["annee"])&& isset($_GET["mois"]) )
  {
	
	 
	if ($_GET["annee"]=="NULL" && $_GET["mois"]="NULL")
 {
 
 
 $month1 = $mois_debut;
 		
		$year1=$year_debut;
		
$month2 = date("m");
 		
		$year2=date("Y");
		}
		
		if ($_GET["annee"]=="NULL" )
		{
			$year1=$year_debut;
			$year2=date("Y");
			
			}
			else
			{
				
				$year1= $_GET["annee"];
			$year2=$_GET["annee"];
				}
			
			if ($_GET["mois"]=="NULL" )
		{
			$month1= $mois_debut;
			$month2 = $mois_fin;
			
			}
			else{
				
			 $month1 = $_GET["mois"];
			$month2 =$_GET["mois"];
	
				
				}
			
			
			
			
		
		
	   $date1 = $year1."-".$month1;
		 
	 	
	   $date2 = $year2."-".$month2;
	   
	  $date1 = $date1."-".$jour_debut;
	 
	
	  $date2 = $date2."-".$jour_fin;
	 
	/* $ss=31;
	 
	 do{
	 $d2= $date2."-".$ss--;
	 
		}while (date("m",strtotime($date2))!=date("m",strtotime($d2)));*/
		
//$date2=$d2;

  $requete = mysqli_query($link,"select bl.id_bl,bl.name_bl ,bl.montant_bl ,clients.Societe_officielle,clients.ref_client,bl.date ,bl.montant_ht,bl.method_paym from bl 
, clients where
bl.ref_client = clients.ref_client
 and bl.date >= '".$date1."' 
 and bl.date <= '".$date2."'
ORDER BY `bl`.`name_bl` ASC
 ")OR DIE(mysqli_error($link));
 
 if( mysqli_num_rows($requete))
{
  
  
  ?>
 <br /><a href="#" style="text-decoration: none; color: #0C6; text-align: center;">
  Exporter Cette Table </a>
 <a href="#" style="text-decoration: none; color: #0C6; text-align: center;"><img src="../bls/design/pics/excel.png" width="24" height="23" align="absmiddle" /></a><br /> 
 <br /><br />
  Listes des bls Depuis <?php echo("".date("d-m-Y", strtotime($date1)))?> et  <?php echo("".date("d-m-Y", strtotime($date2)))?>
  
<br />
<br />
<TABLE  border="1" align="center" id = "example">
<thead>	
<tr>
<th nowrap="nowrap">N bl</th>	  
<th nowrap="nowrap">Societe</th>
<th>Date</th>
<th nowrap="nowrap">Montant P Revient</th>



<th nowrap="nowrap">Montant HT </th>
<th nowrap="nowrap">TVA 17%</th>
<th nowrap="nowrap">Timbre</th>
<th nowrap="nowrap">Total TTC</th>
<th nowrap="nowrap">Mode Paiement</th>         		
<th nowrap="nowrap">Qtt negatives </th>

<th> Actions</th>
</tr>
</thead>
	<?php	  
		$mois = 1;
		$j=2;
		$somme_revient=0;
		$somme_ht=0;
		$somme_rev=0;
		$somme_ttc=0;
		while($row=mysqli_fetch_array($requete))
		{
		$negative = 0;
		$id_bl = $row['id_bl'];
	    $name_bl = $row['name_bl'];              
		$Societe = $row['Societe_officielle'];              
		$date= $row['date'];
		$montant_ht = $row['montant_ht'];
		$somme_ttc=$somme_ttc+$row['montant_ht']*1.17;
		$montant_bl = $row['montant_bl'];
	    $somme_ht=$somme_ht+$montant_ht;
		//$etat=$row['etat'];
		$method_payement = $row['method_paym'];
		$ref_client = $row['ref_client'];	
		$d = date("m", strtotime($date))+0; 
?>	

<tbody>
	  <tr>
		
            <td align="center">
		   <a href="#<?php echo $name_bl;?>" class="linkcolor"  id="<?php echo $name_bl;?>" style="text-decoration: none; color: #0F0;" onclick="window.open('../bls/bl-vente.php?id_bl=<?php echo $id_bl;?>&ref_client=<?php echo $ref_client;?>')">	<?php echo $name_bl;
			$dp=$dp+1;?>
			  </a></td>
		<td align="center" nowrap="nowrap">
			<?php echo $Societe;?>
			</td>
		
        <td  align="center" nowrap="nowrap">
		<?php echo date("d-m-Y", strtotime($date));
		
		?>
			
        </td>
        	  	<td align="center"><?php 
				$req_prix_revient = mysqli_query($link,"SELECT *
FROM  detail_bl 
WHERE  id_bl = '$id_bl'")or die (mysqli_error($link));
$somme=0;
while($row_prix_revient=mysqli_fetch_array($req_prix_revient))
{
//$prix_revient= $row_prix_revient['prix_revient'];
$montant = $row_prix_revient['Montant'];
$quantite= $row_prix_revient['quantite'];
$marge = $row_prix_revient['marge'];
$pri=$montant/$quantite;
$prix_revient  = $pri/(1+$marge/100);
$somme=$somme+$prix_revient*$quantite;
}
$somme_revient = $somme_revient+$somme;
echo(number_format($somme,5, ',', ' '));	?></td>
       
      
        <td align="center" <?php if(number_format($montant_bl, 5, ',', '')-number_format($montant_ht,5, ',', ''))
			{
			?> style="background-color:#336"
            <?php
			}
			?>>
			<?php
			 echo number_format($montant_ht, 5, ',', ' ')
			 ?>
		  </td>
        <td nowrap="nowrap">	<?php
			 echo number_format($montant_ht*0.17, 5, ',', ' ')
			 ?></td>
        <td nowrap="nowrap"><?php 
			if ($method_payement=="" || $method_payement== NULL)
			{
			echo '';
		//	$method_payement = 'Vir B';
			}else 
			{
				$timbre = ($montant_ht*1.17 *0.01);
			if ($timbre<=2500)	
			echo  number_format($timbre, 5, ',', ' ');
			else 
			echo  number_format(2500, 5, ',', ' ');
			
				}?></td>
			<td><?php 
			if ($method_payement == "" || $method_payement == NULL)
			echo number_format($montant_ht*1.17, 5, ',', ' ');
			else 
			{
				$timbre = ($montant_ht*1.17 *0.01);
			if ($timbre<=2500)	
			echo  number_format($montant_ht*1.17+$timbre, 5, ',', ' ');
			else 
			echo  number_format($montant_ht*1.17+2500, 5, ',', ' ');
			
				}
			?></td>
			<td <?php if($negative<0)
{
	echo("bgcolor=\"#FF6600\" ");
	?>
<?php

}
?>
><?php
if ($method_payement=="" || $method_payement== NULL)
			{
			echo 'Vir B';
		//	$method_payement = 'Vir B';
			}else 
echo ($method_payement);
?></td>
		<?php 
		$id_article;
	
$req_art_bls_ventes = mysqli_query($link,"select * from detail_bl where id_bl = '".$id_bl."'")or die (mysqli_error($link));
	$quant_reste=0;
	 $negative = 0;
	if(mysqli_num_rows($req_art_bls_ventes))
while($result=mysqli_fetch_array($req_art_bls_ventes) )
{	
$id_article = $result['id_article'];
	$quant_en_Stock = 0;
$quant_vendu = 0;
$quant_comptab = 0;
$quantite_total=0;


$req_bl_vente = mysqli_query($link,"SELECT COALESCE(SUM(quantite),0) AS quant_en_Stock
FROM  detail_bl 
WHERE  id_article = '$id_article'")or die (mysqli_error($link));

$req_bl_achat = mysqli_query($link,"SELECT COALESCE(SUM(qtt),0) AS quant_en_Stock
FROM  detail_fachat 
WHERE  id_article = '$id_article'")or die (mysqli_error($link));

$row_bl_vente=mysqli_fetch_array($req_bl_vente);
$row_bl_achat=mysqli_fetch_array($req_bl_achat);

//if(mysqli_num_rows($requetqt)!=0)
$quantite_total = $row_bl_achat['quant_en_Stock'];

$quant_comptab= $row_bl_vente['quant_en_Stock'];
$quant_reste =$row_bl_achat['quant_en_Stock']-$row_bl_vente['quant_en_Stock'];
//echo ("$quant_reste");

if($quant_reste<0)
$negative =-1;
}


		  ?>	
		  <td <?php if($negative<0)
{
	echo("bgcolor=\"#FF6600\" ");
	?>
<?php

}
?>
>


<?php if($negative<0)
echo("!!!!!");
?></td>
		   
           <td>
            <?php  if($montant_ht==0) { ?>
            <a href="delete_bl.php?id_bl=<?php echo $id_bl;
			if (isset($_GET["annee"])&&isset($_GET["mois"]))
			{
			?>&annee=<?php	
			echo"".$_GET["annee"];?>&mois=<?php
			echo"".$_GET["mois"];					}
			?>"><img src="design/pics/delete.png" width="16" height="16" /></a>
        <hr />    <?php  }?>
        <a href = "../print/print_bl_officielle.php?id_bl=<?php echo  $id_bl;?>">
 <img src="design/pics/print-button.png" width="32" height="24" alt="Imprimer" longdesc="Imprimer Ce bl" /> </a>
            </td>
        
      </tr>

 <?php  }?>

<tr>
<th>Totaux  </th>	  
<th> </th>
<th> </th>
<th nowrap="nowrap" style="color:#000"><?php 

//echo($somme_revient);
$somme_revient=0;
?>
=SOMME(D<?php


echo($p);

?>:D<?php
echo($dp);

?>)


</th>

<th nowrap="nowrap" style="color:#000"><?php 
//echo($somme_ht);


$somme_ht=0;
?>
=SOMME(E<?php


echo($p);

?>:E<?php
echo($dp);

?>)
</th>
<th nowrap="nowrap" style="color:#000"><?php
//echo($somme_ttc);
$somme_ttc=0; ?>

=SOMME(F<?php


echo($p);

?>:F<?php
echo($dp);

?>)</th>
<th nowrap="nowrap" style="color:#000"><?php
//echo($somme_ttc);
$somme_ttc=0; ?>

=SOMME(G<?php


echo($p);

?>:G<?php
echo($dp);
?>)</th>


<th nowrap="nowrap" style="color:#000"><?php
//echo($somme_ttc);
$somme_ttc=0; ?>

=SOMME(H<?php


echo($p);

?>:H<?php
echo($dp);
$p=$dp+4;
$dp=$dp+3;
?>)</th>
<th></th>         		
<th> </th>
<th></th>

</tr>


<tr>
<th nowrap="nowrap"> Totaux importations</th>	  
<th> </th>
<th> </th>
<th><?php 
$dat1=date("m", strtotime($date))+1;
$date1=date("Y-$dat1-01", strtotime($date));
$date2 = date("Y-m-01", strtotime($date));
$date2 = date("Y-m-d", strtotime($date2));
$somme_qt=0;
$somme_rev=0;
$req=mysqli_query($link," SELECT  `bl_achat`.`id_fachat`  ,  `detail_fachat` . `qtt`, `bl_achat`.`date` ,`detail_fachat`.`prix_rev`  FROM `bl_achat`,`detail_fachat` where `detail_fachat`.`id_fachat` = bl_achat.id_fachat and  `bl_achat`.`date`< '$date1' and  `bl_achat`.`date`>= '$date2' ")or die (mysqli_error($link));
if(mysqli_num_rows($req))
{
while($row = mysqli_fetch_array($req))
{

$qtt= $row["qtt"];
$somme_qt=$somme_qt+$qtt;

$prix_rev= $row["prix_rev"];
$somme_rev = $somme_rev +$qtt*$prix_rev ;
}
echo(number_format($somme_rev, 2, '.', ' '));
$somme_rev=0;
?>
	<?php
		
		
  }?></th>
<th> </th>
<th></th>
<th></th>
<th> </th>
<th></th>
<th> </th><th> </th>
</tr>

<tr>
<th nowrap="nowrap">Totaux prix de revient restant
  </th>	  
<th> </th>
<th> </th>
<th></th>


<th> </th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th></th>         		

<th></th>
<th></th>
</tr>	
		
		
	
        
</tbody>	

</TABLE>

<?php
}
else

{
	?>
<center>	
  <p>&nbsp;</p>
  <p style="color: #CCC; font-size: 24px;">&nbsp;</p>
  <p style="color: #CCC; font-size: 24px;">&nbsp;</p>
  <p style="text-align: center; color: #CCC; font-size: 24px;">Aucune bl vente n'a été faite Au courant de cette période </p>
</center>	
<?php
	
	}
}


?>

 
 <?php
 
 
 ?>
 
  <br /><br /><br /> 
</div>  
   </div>
   	 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>
<?php
		}

else
	header("Location:../login.php");
?>
</body>
</html>