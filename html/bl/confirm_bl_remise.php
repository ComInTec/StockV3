<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logiciel De Stock - traitement de la remise</title>
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
 $type_reg;	
 $id_bl;
 $total;
 $rem;
if (isset($_GET["id_bl"])&& isset($_GET["total"]) && isset($_GET["remise_bl"]) && isset($_GET["type_reg"]))
 {
	 $total=$_GET["total"];
$id_bl=$_GET['id_bl'];
$type_reg= $_GET["type_reg"];
$remise_bl=$_GET['remise_bl'];
if ($_GET["type_reg"]=="0")
$rem = $_GET['remise_bl'];
elseif($total!=0)
$rem = 100*($_GET['remise_bl'])/$total;
else $rem = 0;
if (!$type_reg)
	{
		
	$remise_bl = $total * $remise_bl / 100;
	
	}
	$req_bl= mysqli_query($link,"select * from bl where id_bl= '".$id_bl."'")or die(mysqli_error($link));
	

		
		$req_remise_bl=mysqli_query($link,"select * from bl where id_bl =  '".$id_bl."'")or die(mysqli_error($link));
if(mysqli_num_rows($req_remise_bl))
{
	
$req_update = mysqli_query($link,"UPDATE `dap2`.`bl` SET `montant_remise` = '".$remise_bl."', remise = '".$rem."' WHERE `id_bl` ='".$id_bl."';")or die(mysqli_error($link));
	}
	
	
header("Location: bl_versement.php?id_bl=".$id_bl);
 
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