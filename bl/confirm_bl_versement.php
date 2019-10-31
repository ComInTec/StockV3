<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logiciel De Stock - confirmation du versement</title>
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

 <?php
 	include("../global.php");
 $date;	
 $id_bl;
 $montant;
 $method;
if (isset($_GET["id_bl"])&& isset($_GET["date"]) && isset($_GET["montant"]) && isset($_GET["method"]))
 {
$date=$_GET["date"];
$split = explode("-",$date); 
$annee = $split[2]; 
$mois = $split[1]; 
$jour = $split[0]; 
$date =  "$annee"."-"."$mois"."-"."$jour"; 
$id_bl=$_GET['id_bl'];
$method= $_GET["method"];
$montant= preg_replace('/\s+/', '', $_GET['montant']);

if ($montant)
	{
	
$req_insert = mysqli_query($link,"INSERT INTO `dap2`.`reglement` (
`date` ,
`montant` ,
`id_bl`,
`type_versement` 
)
VALUES (
 '".$date."', '".$montant."','".$id_bl."','".$method."'
);");
	header("Location: bl_versement.php?id_bl=".$id_bl);
	}
else
	header("Location:../index.php");
 ?>


<?php
 }

?>
  </div>  

    <!-- end .container -->
 
 
   
</div>
   	    <script type = "text/javascript" src = "design/jquery.js"> </script>
</center>
<script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</body>
</html>