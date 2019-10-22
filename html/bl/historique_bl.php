<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logiciel De Stock - Fiche des BL d'un client</title>
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


<?php include('../global.php'); ?>

<?php
session_start();
  
  
if(isset($_SESSION['username']))
{	 
$id_bl;
$ref_client;
if(isset($_GET['ref_client']))

$ref_client=$_GET['ref_client'];
$re=mysqli_query($link,"select ref_client from  bl where ref_client
='".$ref_client."'
");

$num=mysqli_num_rows($re);
if($num!=0)
{
$sql = mysqli_query($link,"
select * from bl where ref_client = '".$ref_client."'
ORDER BY  `bl`.`date` DESC
");

$num = mysqli_num_rows($sql);
if($num!=0)
{  ?>


<hr />
<h1>
<?php 
$sql2 = mysqli_query($link,"select * from clients where ref_client = '".$ref_client."'");
$num2 = mysqli_num_rows($sql2);
if ($sql2)
{
	$row2 = mysql_fetch_assoc($sql2);
	
echo("Historique d' achats pour  :  ".$row2['Societe']);
}
?>
</h1>
<hr />
<br />
<TABLE border = 2 align="center">
<tr>
<td>
N° BL
</td>
<td nowrap="nowrap">
Date BL
</td>

<td>
Montant
</td>
<td>
Reglement
</td>



<td nowrap="nowrap">Facture de Route</td>
<td>
Actions
</td>
</tr>
<tr>
	<?php
	while($row= mysqli_fetch_array($sql))

{
	$id_bl=$row['id_bl'];?>
<td align="center" valign="top"><a style="text-decoration: none; color:#00FF00" href="../bl/bl-vente.php?id_bl=<?php echo("".$id_bl)?>">
<?php 
echo($row['id_bl']);

?><img src="design/pics/modifier.png" width="16" height="16" /></a>
</td>
<td nowrap="nowrap">

<?php 
//echo($row['date']);
echo("".date("d-m-Y", strtotime($row['date'])));
?>
</td>

<td align="right" nowrap="nowrap" style="text-align: right;"><?php 
$montant_ht=$row['montant_ht']-$row['montant_remise'];
$montant_ht = number_format($montant_ht, 2, ',', ' ');
			
echo($montant_ht);
?></td>
<td>
  	<a href="../bl/bl_versement.php?id_bl=<?php echo $id_bl;?>"><img src="../design/pics/modifier.png" width="16" height="16" alt="Modifier" longdesc="modifier" /></a>	</td>

<td align="center" nowrap="nowrap">
<a href="../print/print_facture_de_route.php?id_bl=<?php echo ("".$id_bl); ?>">
<img src="../bl/design/pics/print-button.png" width="48" height="35" /> </a></td>
<td>
<?php
$re=mysqli_query($link,"select ref_client from  bl where ref_client
='".$ref_client."'
");
	if((1==0))
	{
?>
<a href="delete-bl.php?id_bl=<?php echo("".$id_bl)?>&ref_client=<?php echo("".$ref_client)?>">
<img src="design/pics/delete.png" width="16" height="16" /></a>
<?php }?>
</td>


</tr>
<?php
}


}

?>
 </TABLE>   <!-- end .content -->

<?php
}

else{
	?>
	<center><b><?php echo("Ce Client n'a aucun Bon de livraison"); ?></b></center>
<?php

	
	}

?>

 </div>
   <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>
</div>
<?php  }
else header("Location:../login.php");
 ?>
</body>
</html>