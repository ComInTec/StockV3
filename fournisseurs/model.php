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
<div class="header" id="header">  
    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="720" height="220">
       <param name="movie" value="design/flash/header final.swf" />
       <param name="quality" value="high" />
       <param name="wmode" value="transparent" />
       <param name="swfversion" value="6.0.65.0" />
       <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
       <param name="expressinstall" value="design/scripts/expressInstall.swf" />
       <param name="BGCOLOR" value="#000000" />
       <param name="SCALE" value="noborder" />
       <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
       <!--[if !IE]>-->
       <object type="application/x-shockwave-flash" data="design/flash/header final.swf" width="720" height="220">
         <!--<![endif]-->
         <param name="quality" value="high" />
         <param name="wmode" value="transparent" />
         <param name="swfversion" value="6.0.65.0" />
         <param name="expressinstall" value="design/scripts/expressInstall.swf" />
         <param name="BGCOLOR" value="#000000" />
         <param name="SCALE" value="noborder" />
         <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
         <div>
           <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
           <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
         </div>
         <!--[if !IE]>-->
       </object>
       <!--<![endif]-->
    </object>
  </div>
  </center>
 
 
<div class="sidebar1">
 <center>
 <div id ="menu">
   <ul id="MenuBar1" class="MenuBarHorizontal">
     <li><a href="../" class="MenuBarItemSubmenu">Acceuil</a>       </li>
     <li><a href="#" class="MenuBarItemSubmenu">Clients</a>
       <ul>
         <li><a href="../client</cree-client.php">Nouveau Client</a></li>
         <li><a href="../clients>affiche_clients.php">Tous les clients</a></li>
         <li><a href="../voir_tout_bl.php">Tous les BL</a></li>
         <li><a href="../voir_tout_facture.php">toutes les Factures</a></li>
       </ul>
     </li>
     <li><a class="MenuBarItemSubmenu" href="../fournisseurs/fournisseurs.php">Fournisseurs</a>
       <ul>
         <li><a href="../fournisseurs/cree-fournisseur.php">Nv Fournisseur</a></li>
         <li><a href="#">Nouvel Arrivage</a></li>
         <li><a href="../fournisseurs/affiche_fournisseurs.php">Ts ls Fournisseurs</a></li>
</ul>
     </li>
     <li><a href="../stock/stock.php" class="MenuBarItemSubmenu MenuBarItemSubmenu">Stock</a>
       <ul>
         <li><a href="../stock/cree-designation2.php">Nouvel Article</a></li>
         <li><a href="../stock/affiche_article.php">Tous les Articles</a></li>
       </ul>
     </li>
<li><a href="#" class="MenuBarItemSubmenu">Options</a>
  <ul>
         <li><a href="../info.php">Info Entreprise</a></li>
         <li><a href="../config.php">Parametres</a> </li>
         <li><a href="../utilisateurs/cree_utilisateur.php">Utilisateurs</a></li>
  </ul>
 </li>
   </ul>
 </div> 
 </center>
    <br /><br /><br /> 
       <?php   
	session_start();
 
 

	
	?>  
 </div>







  <div class="content">
  <br />  <br  />
  


<?php
$ref;

if(isset($_SESSION['username']))
{	

?>


<?php
}
else
	header("Location:../login.php");



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

</body>
</html>