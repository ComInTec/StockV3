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

<div class="sidebar1">
 <center>
 <div id ="menu">
   <ul id="MenuBar1" class="MenuBarHorizontal">
     <li><a href="../index.php" class="MenuBarItemSubmenu">Acceuil</a>       </li>
</ul>
 </div> </center>
    <br /><br /><br /> 
<?php
include("../global.php");

	$tva = 0;
if( isset($_GET["tva"]))
	{
	$tva = $_GET["tva"];
	}
	$transport = 0;
if( isset($_GET["transport"]))
	{
	$transport = $_GET["transport"];
	}
	
// $split = explode("-",$date); 
// $annee = $split[2]; 
// $mois = $split[1]; 
// $jour = $split[0]; 
// $date =  "$annee"."-"."$mois"."-"."$jour"; 	
		$sql = mysqli_query($link,"
		INSERT INTO  `dap2`.`calcul_prix` (
 
`tva` ,
`transport`
)
VALUES (
 '$tva', 
 '$transport'
);")or die (mysqli_error($link));
		
		$req_insert = mysqli_query($link,"SELECT * FROM `calcul_prix` ORDER BY `calcul_prix`.`id_calcul_prix` DESC LIMIT 0 , 1 ")or die (mysqli_error($link));
		$num_insert=mysqli_num_rows($req_insert);
		if($num_insert)
		{
		$row_req_insert=mysqli_fetch_array($req_insert);
		$id_calcul_prix=$row_req_insert["id_calcul_prix"];
		
		
		
		$link="?id_calcul_prix=".$id_calcul_prix;
		header("Location: calcul_prix_table.php".$link);
		
		
		}
		else
		echo("problem");
		// }

		
?>


<?php		
		
		
	
	
	
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