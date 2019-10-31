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
	session_start();
 
 

	
	?>  
 </div>


<div class="content">

 </div>



  <div class="content">
  <br />  <br  />



<?php

if (isset($_GET['societe'])&& isset($_GET['ref_fournisseur']))
{
$ref_fournisseur=$_GET['ref_fournisseur'];
$Societe=$_GET['societe'];
$code=$_GET['code'];
$dette=$_GET['dette'];
$telephone=$_GET['telephone'];
$fax=$_GET['fax'];
$email=$_GET['email'];
$adresse=$_GET['adresse'];
$compte=$_GET['compte'];
$date=$_GET['date'];
	include("../global.php");
$requete="update fournisseurs   
set 

Societe='".$Societe."',
code='".$code."',
dette='".$dette."',
telephone='".$telephone."',
 fax='".$fax."',
 email='".$email."',
adresse_activite='".$adresse."',
  
 compte_bancaire='".$compte."', date_inscription='".$date."'
where ref_fournisseur  = '".$ref_fournisseur."'";

$resultat = mysqli_query($link,$requete) or die(mysqli_error($link));
if($resultat)
{
echo "<center>La modification effectuée avec succées </center>";
                	
					}
else{
echo "<center><span>La modification na pas été éffectuée</center>";
                  
				  
}
}

?>   
 <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>

</body>
</html>