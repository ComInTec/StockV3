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
     <li><a href="../" class="MenuBarItemSubmenu">Acceuil</a></li>
</ul>
 </div> </center>
 
 </div>
    <br /><br /><br /> 
<?php
include("../global.php");
?>


<?php

if(isset($_GET['id_article']))
{
//die($_GET['reference']);
  
		$req=mysqli_query($link,"select * from trace_stock where id_article = '".$_GET['id_article']."'")or die(mysqli_error($link));

		$num = mysqli_num_rows($req);
		if($num>0)
		{?>
<TABLE border="1" align="center" >
<tr>	  
<td>Date de Modification</td>
<td align="center" valign="middle">ID User</td>
<td >Heure de Modification </td>

<td >Réference </td>
<td >QTT </td>

</tr>
		<?php	
		while($row=mysqli_fetch_array($req))
		{
	    $ID = $row['date'];
		$date= $row['id_user'];
		$id_user = $row['time'];
		$heur = $row['id_article'];
		$ref = $row['Qtt'];
		$qtt = $row['Montant'];
			?>
		<tr>
			
			
			<td align="center">
			<?php echo ("".$date);?>
			</td>
			<td align="center">
			<?php echo $id_user;?>
			</td>
            <td align="center">
			<?php echo $heur;?>
			</td>
			<td align="center">
			<?php echo $ref;?>
			</td>
			<td align="center">
			<?php echo $qtt;?>
			</td>
			
		</tr>
		<?php
		}

?>
</TABLE>

<?php
}
else
echo("Cette Article na Aucune Trace");
}
else
echo("Ne pas modifier le code");


?>
 </div>
   <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>


</body>
</html>