<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logiciel De Stock - Traitement de la suppression</title>
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
include '../global.php';

if (isset($_GET["id_bl"])&&isset($_GET["ref_client"])&&strlen($_GET["ref_client"]))
{ 
$jj = $_GET["ref_client"];
$gett=$_GET["id_bl"]; 
 $sql = mysqli_query($link,"DELETE FROM detail_bl WHERE id_bl = '".$gett."'")or die (mysqli_error($link));

 $sql = mysqli_query($link,"DELETE FROM bl WHERE id_bl = '".$gett."'")or die (mysqli_error($link));
$ff= "Location:historique_bl.php?ref_client=".$jj;
	header($ff);




}
if (isset($_GET["id_bl"])&& !isset($_GET["ref_client"]) && strlen($_GET["ref_client"])==0)
{ 
//$jj = $_GET["ref_client"];
$gett=$_GET["id_bl"]; 
$sql = mysqli_query($link,"DELETE FROM detail_bl WHERE id_bl = '".$gett."'")or die (mysqli_error($link));
$sql = mysqli_query($link,"DELETE FROM bl WHERE id_bl = '".$gett."'")or die (mysqli_error($link));
if (!isset($_GET["back"]))
	$ff= "Location:voir_tout_bl.php";
else 
$ff= "Location:".$_GET["back"].".php";
header($ff);
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
</body>
</html>