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
 
<?php
$ref_fournisseur;
if (isset($_GET['ref_fournisseur']))
{
	include("../global.php");	
	$ref_fournisseur=$_GET['ref_fournisseur'];
	$req= mysqli_query($link,"select * from fournisseurs where ref_fournisseur = '$ref_fournisseur'");
$num = mysqli_num_rows($req);
if($num)
{
	while($row= mysqli_fetch_array($req))
	{
?>

<form action ="update-fournisseur.php" method="GET">
<table  border = "2" align="center">



<tr class="tr-gauche">
<td class="td-gauche">
Societe 
 </td>
<td class="td-point">:</td>
<td class="td-client">
<input  name = "ref_fournisseur" type = "hidden"  value="<?php echo("".$ref_fournisseur);?>"
 /> 
<input autocomplete="off" name = "societe" type = "text" class = "input-table" value="
<?php
 	
echo($row['Societe']); 
?>
" />
 

</td>
<td class="td-point">*</td>
</tr>


<tr>
<td class="td-gauche"> Code </td>
<td class="td-point">:</td>
<td class="td-client">


 

<input autocomplete="off" name = "code" class = "input-table" type = "text" value="
<?php 
echo($row['Code']);?>
"/>
 
</td>
<td class="td-point">*</td>
</tr>

<tr>
<td class="td-gauche"> Dette </td>
<td class="td-point">:</td>
<td class="td-client">


 

<input autocomplete="off" name = "dette" class = "input-table" type = "text" value="
<?php 
// $dette = 0;
// 
$dette = $row['dette'];
echo($dette);
?>
"/>
 
</td>
<td class="td-point">*</td>
</tr>


<tr>
<td class="td-gauche"> Télephone </td>
<td class="td-point">:</td>
<td class="td-client">


 

<input autocomplete="off" name = "telephone" class = "input-table" type = "text" value="
<?php 
echo($row['telephone']);?>
"/>
 
</td>
<td class="td-point">&nbsp;</td>
</tr>

<tr>
<td class="td-gauche">Fax
</td>
<td class="td-point">:</td>
<td class="td-client" >
 
<input autocomplete="off" name = "fax" class = "input-table" type = "text" value="
<?php 
echo($row['fax']);
?>"/>
 
</td>
<td class="td-point" >&nbsp;</td>
</tr>
<tr>
<td class="td-gauche"> 
Email </td>
<td class="td-point">:</td>
<td class="td-client">


 

<input autocomplete="off" name = "email" class = "input-table" type = "text" value="
<?php 

echo($row['email']);
?>"/>
 
</td>
<td class="td-point">&nbsp;</td>
</tr>



<tr>
<td class="td-gauche">
Adresse
 </td>
<td class="td-point">:</td>
<td class="td-client" >

 
<input autocomplete="off" name = "adresse" class = "input-table" type = "text" value="
<?php 
echo($row['adresse_activite']); 
?>"/>
 
</td>
<td class="td-point" >&nbsp;</td>
</tr>



<tr>
  <td class="td-gauche">
 Compte Bancaire	</td>
  <td class="td-point">:</td>
  <td class="td-client">
    
    
  <input name = "compte" class = "input-table" type = "text" value="<?php 
echo($row['compte_bancaire']);?>"/>
    
  </td>
  <td class="td-point">&nbsp;</td>
</tr>




<tr>
<td class="td-gauche">
Date d'inscription 
 </td>
<td class="td-point">:</td>
<td class="td-client">


 
<input autocomplete="off" readonly="readonly" name = "date" class = "input-table" type = "text" value="
<?php 
echo($row['date_inscription']); ?>"/>
 
</td>
<td class="td-point">&nbsp;</td>
</tr>





<tr>
<td>
</td><td>
</td>
<td>
<input name = "modifier" type= "submit"    value = "Modifier" />
</td>
<td>
</td>
</tr>

</table>


    <!-- end .content -->
</form>  </div>
<?php
}
}
}?>
  <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>

</body>
</html>