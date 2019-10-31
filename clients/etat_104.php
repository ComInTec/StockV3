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
 </div> </center>
    <br /><br /><br /> 
 </div>



  <div class="content">
  <br />  <br  />
  
       <?php   
include("../global.php");

		session_start();
if(isset($_SESSION['username']))
{


$date="";
$cpt=1;
if(isset($_GET["date"]))
{
	$date = $_GET["date"];
	
?><h1>(Etat 104)</h1>
<Center><h1>
Exercie <?php
echo($date);
?>
</h1></Center>
<?php	
	$date_inf=$date."-12-31";
$date_sup=$date."-01-01";

		$req_clients= mysqli_query($link,"SELECT COUNT( * ) AS `Lignes` , `ref_client`
FROM `facture`
WHERE `date` >= '$date_sup'
AND `date` <= '$date_inf'
GROUP BY `ref_client`
 ")or die (mysqli_error($link));
		

		if (mysqli_num_rows($req_clients))
		{
		
?>
<TABLE border="1" align="center">
    <tr class=>
      <th class = "dette">N° d'ordre</th>
	  
		 
 <th class = "dette">Raison Sociale</th>
 <th class = "dette">Adresse</th>
 <th class = "dette">N° Ident. Fiscal</th>
 <th class = "dette">N° Article </th>
 <th class = "dette">N°R.C.</th>
 <th nowrap="nowrap" class = "dette">C.A Hors Taxe</th>
 <th class = "dette">T.V.A.</th>
</tr>
<?php
while($row_clients = mysqli_fetch_array ($req_clients))
			{
		$ref_client=$row_clients[1];
	
	$req_clients_etat104= mysqli_query($link,"SELECT *
FROM clients
WHERE ref_client = '$ref_client' 
 ")or die (mysqli_error($link));
	$row_clients_etat104 = mysqli_fetch_array ($req_clients_etat104);
		$client=$row_clients_etat104[2] ;
		   $adress = $row_clients_etat104[7].' '.$row_clients_etat104[8].' '.$row_clients_etat104[9];
		$fiscale=$row_clients_etat104["n_carte_fiscale"];
			$N_ART=$row_clients_etat104["N_ART"];
	$nrc = $row_clients_etat104["nrc"];	
$req_ht = 0;

$reqqq= mysqli_query($link,"select  SUM( facture.montant_ht )  as som   from `facture`  where facture.`ref_client` = '$ref_client' and   facture. `date` >= '$date_sup'    and   facture. `date` <= '$date_inf'  ")or die (mysqli_error($link));

		$rowww=mysqli_fetch_array($reqqq);
	   		$req_ht= $rowww["som"];
	
		?>
		<tr>
		  <td style = "Align = 'left' ;"><?php echo $cpt++ ;?></td>
			<td nowrap="nowrap" style = "Align = 'left' ;">
				<?php echo $client;?>
		</td>
			<td nowrap="nowrap" style = "Align = 'left' ;"><?php echo $adress?></td>
			<td align="Right" nowrap="nowrap"><?php echo $fiscale?></td>
			<td align="Right" nowrap="nowrap"><?php echo $N_ART?></td>
			<td align="Right" nowrap="nowrap"><?php echo $nrc?></td>
			<td align="Right" nowrap="nowrap"><?php echo number_format($req_ht , 2, ',', ' ');?></td>
<td align="Right" nowrap="nowrap"><?php echo number_format($req_ht * 0.17, 2, ',', ' ');?></td>
		</tr>
		<?php
			}
?>
</TABLE>
<br /><br /><br />
	<?php
		}
?>
  </div>
 <?php
}else

{
	?>
  <form action="etat_104.php" method="GET">   <table width="200" border="1" align="center">
  <tr>
    <td>Exercice </td>
    <td>:</td>
    <td> <input name="date" type="text" value="<?php echo date("Y");?>" size="4" maxlength="4" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
     <td><input name="submit" type="submit" value="Confirmer" /></td>
   
  </tr>
</table>

    
   
   
   
    
  </form>
	
    
	<?php
	}
}
else

 	header("Location:../login.php");

 ?>
    </ul>
  
 </div>
   <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>

</body>
</html>