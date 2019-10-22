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
  
  
if(isset($_SESSION['username']))
{	 


if (isset($_GET['ref_client'])&& isset($_GET['societe']) )
{
$ref_client=$_GET['ref_client'];
$Societe=$_GET['societe'];
// $Societe_officielle=$_GET['societe_officielle'];
$telephone=$_GET['telephone'];
// $fax=$_GET['fax'];
$mobile=$_GET['mobile'];
// $email=$_GET['email'];
$adresse=$_GET['adresse'];
// $num_registe=$_GET['num_registe'];
// $carte_fiscale=$_GET['carte_fiscale'];
// $num_art=$_GET['num_art'];
// $compte_bancaire=$_GET['compte'];
// $ccp=$_GET['ccp'];
$dette=$_GET['dette'];
 if(isset($_GET['ville'])) 
 $ville= $_GET['ville'];

 if(isset($_GET['wilaya'])) 
 $wilaya=$_GET['wilaya'];


	include("../global.php");
$requete="update clients
set  
Societe='".$Societe."',
 telephone_fix='".$telephone."', 

 T_Mobile='".$mobile."',

 adresse_activite='".$adresse."',

 wilaya='$wilaya',
 ville='$ville',

 dette='".$dette."'
where ref_client  = '".$ref_client."'";

$resultat = mysqli_query($link,$requete) or die(mysqli_error($link));
if($resultat)
{
echo "Modification faite avec succées";               	
					}
else{
echo "<center><span>La modification na pas été éffectuée</center>";
                  
				  
}
}else 
	echo 'Nom du Client introuvable';

?>   
</div>  

    <!-- end .container -->
 
 
    </div>
   	    <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
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