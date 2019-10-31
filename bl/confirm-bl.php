<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logiciel De Stock - Page de la remise</title>
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


 <div class="content">
 <h1 align="center">Remise Sur le total :
 </h1>
 <table width="45%" align="center" border = "2">
<form action = "confirm_bl_remise.php" method = "GET" >



<input type = "hidden" name = "id_bl" <?php
include("../global.php");
$id_bl;
 	if(isset($_GET['id_bl'])) 
{	
$id_bl=$_GET['id_bl'];}
?>value = "<?php echo("".$_GET['id_bl']);?>" readonly="readonly" />

<tr>
<th nowrap="nowrap">
 
    Total :  <BR /> ( En DA )  
</th>

<td>
<input type = "text" name = "total2" value = "<?php $id_bl=$_GET['id_bl'];

$req_bl= mysqli_query($link,"SELECT COALESCE(SUM(detail_bl.Montant),0) AS total
FROM  detail_bl,bl 
WHERE  detail_bl.id_bl = bl.id_bl and  detail_bl.id_bl= '".$id_bl."' ")or die(mysqli_error($link));

if(mysqli_num_rows($req_bl))
	{
	$row_bl_total=mysqli_fetch_array($req_bl);
			

 $total_bl=$row_bl_total["total"];

echo(number_format($row_bl_total["total"], 2, ',', ' '));}?>" readonly="readonly" />

<input type= "hidden" name = "total" value = "<?php
echo $row_bl_total["total"];
?>" />
</td>
</tr>
<tr>
<th nowrap="nowrap">
 
    Remise  :  <BR /> 
    ( En DA / %)  
</th>

<td nowrap="nowrap">
<input autofocus name = "remise_bl" type = "text" value = "<?php
$req_remise_bl=mysqli_query($link,"select * from bl where id_bl =  '".$id_bl."'")or die(mysqli_error($link));
if(mysqli_num_rows($req_remise_bl))
{
	$row_remise_bl=mysqli_fetch_array($req_remise_bl); 

echo (number_format($row_remise_bl["montant_remise"], 0, '.', ''));
// $rem = 100*($_GET['remise_bl'])/$total;

	}else 
		echo 0;

?>" />
     <select name = "type_reg">
 
  <option value="1" selected="selected" >DA</option>
</select>


</td>


</tr>
    
  
      
    
 <tr>
<td>&nbsp;</td>


 <td>
 <ul>
 <input class= "bt" type = "submit" value  = "Suivant" />
 </ul>

 </td>
</tr>

</form>

 </table>



    </div>  

    <!-- end .container -->
 
 
    </div>
    </div>
   	    <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>

</body>
</html>