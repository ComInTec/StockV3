
<?php
include("modele/global.php");
$Client;

if(isset($_GET['code']))
{
	$client= $_GET["code"];
	//do{
//	$code_barre = str_replace("%20%20","%20",$code_barre);
	//}
	//while(str_word_count("%20%20",$code_barre) );
if(strlen($client)>1)
{


$requete_client_part = "Societe  like '%".$client."%' " ;
$requete_client = mysqli_query($link,"SELECT * FROM clients WHERE ".$requete_client_part)or die (mysqli_error($link));
//$code_barre = " " + $code_barre ; 


if(mysqli_num_rows($requete_client)==0)
{
echo("S'agit il d'un nouveau  Client ?? <br/>");	
?>
 <a href="#" class = "modif" style="font-style: italic; font-size: 24px; text-decoration: none; color: #3FF;" onclick="window.open('cree-client.php?search=<?php echo("$client");?>')">Creer Fiche  Client ..<img src="design/pics/modifier.png" alt="Fiche du client" width="16" height="16" align="absmiddle" longdesc="Modifier Cet Article" /></a>
<?php	
	}

$i=1;
if(mysqli_num_rows($requete_client))
{
	echo(mysqli_num_rows($requete_client )." Resultat(s) !!");
	?>

<hr />
    <?php
while($row_client=mysqli_fetch_array($requete_client))
	    {
	//$code_barre=str_replace($code_barre,"<span class=\"bb\">$code_barre</span>",$code_barre);
	$ref_client =  $row_client['ref_client'];
	

	$Societe    =  $row_client['Societe'];
	$client1 = str_replace($client,"<span class=\"bb\">$client</span>",$client);
	$address= $row_client['adresse_activite'];
	$vile= $row_client['Ville'];
	$wilaya = $row_client['Wilaya'];
	$fax= $row_client['fax'];
	$mob= $row_client['T_Mobile'];
	$tel= $row_client['telephone_fix'];
	
	
?>
    <th>
    <th>


   <p align="left" class="soug">Societe : <?php echo("$Societe");?>
   <a href="" class = "modif" onclick ="window.open('fiche-client.php?ref_client=<?php echo("$ref_client");?>')"><img src="design/pics/modifier.png" alt="Modifier Cet Article" width="16" height="16" align="absmiddle" longdesc="Modifier Cet Article" /></a>
</p>
<p align="center" class="soug"><a style="text-decoration: none;	text-align: left; color: #9F0;" href="#<?php echo $row_client["ref_client"];?>" id= "<?php echo $row_client["ref_client"];?>" onclick="window.open('../factures/new_bl.php?ref_client=<?php echo $row_client["ref_client"];?>')" class="linkcolor">Nouveau Bl<img src="design/pics/pdf.png" width="16" height="16" longdesc="" />
</a></p> 

<p align="center" class="soug"> <a style="text-decoration: none;	text-align: left; color: #9F0;" href="#<?php echo $row_client["ref_client"];?>" id= "<?php echo $row_client["ref_client"];?>" onclick="window.open('historique_bl.php?ref_client=<?php echo $row_client["ref_client"];?>')" class="linkcolor" >Historique Des BL<img src="design/pics/modifier.png" width="16" height="16" longdesc="historique_dette.php" /></a>
</p>
<p align="center"  class="soug">
  <a style="text-decoration: none;	color: #9F0; text-align: left;"  href="#<?php echo $row_client["ref_client"];?>" id= "<?php echo $row_client["ref_client"];?>" onclick="window.open('../factures/new_facture.php?ref_client=<?php echo $row_client["ref_client"];?>')" class="linkcolor">nouvelle Facture<img src="design/pics/pdf.png" width="16" height="16" longdesc="" /></a>
</p>
<p align="center" class="soug">

 <a style="text-decoration: none;	color: #9F0; text-align: left;"  href="#<?php echo $row_client["ref_client"];?>" id= "<?php echo $row_client["ref_client"];?>" onclick="window.open('historique_facture.php?ref_client=<?php echo $row_client["ref_client"];?>')" class="linkcolor" >Historique des Factures<img src="design/pics/modifier.png" width="16" height="16" longdesc="historique_dette.php" /></a>
</p>
   <p style="text-align: left;" >Adresse : <?php echo($address);?></p>
<p style="text-align: left;" >Ville : <?php echo($vile);?></p>
<p style="text-align: left;" >Wilaya : <?php echo($wilaya);?></p>
<p style="text-align: left;" >Tel : <?php echo($tel);?></p>
<p style="text-align: left;" >Fax :<?php echo($fax);?></p>
<p style="text-align: left;" >Mob :<?php echo($mob);?> </p>
<br />
<hr />
<br />

  <?php
}
}
}
}
?>

