<!DOCTYPE html PUfacture_achatIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
 $id_fachat;
 $total;
 $rem;
if (isset($_GET["id_fachat"])&& isset($_GET["bon_fournisseur"])  )
 {

$id_fachat=$_GET['id_fachat'];

$bon_fournisseur=$_GET['bon_fournisseur'];


	$req_facture_achat= mysqli_query($link,"select * from facture_achat where id_fachat= '".$id_fachat."'")or die(mysqli_error($link));
	

		

		
if(mysqli_num_rows($req_facture_achat))
{
	
$req_update = mysqli_query($link,"UPDATE `dap2`.`facture_achat` SET `bon_fournisseur` = '".$bon_fournisseur."'  WHERE `id_fachat` ='".$id_fachat."';")or die(mysqli_error($link));
	}
	
	
header("Location: tous_factures_achats.php");
 
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