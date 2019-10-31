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


 <div class="content">
<table width="45%" align="center" border = "2">
<form action = "confirm_bl2.php" method = "GET" >

<tr>
 <td width = "190px">
Date : 
</td>
<td><input type = "text" name = "date" value = "<?php 
  $date;
  if (isset($_GET['date']))
{  
$date = $_GET['date'];
 echo("".date("d-m-Y", strtotime($date)));
  }
  ?>"  />
 </td>
 </tr>
<tr>
<td>
 
     BL N° : 
</td>

<td>
<input type = "text" name = "id_bl" value = "<?php echo("".$_GET['id_bl']);?>" readonly="readonly" />
</td>
</tr>
<tr>
<td>
 
    Total :  <BR /> ( En DA )  
</td>

<td>
<input type = "text" name = "total" value = "<?php 
echo(number_format($_GET['montant_ht'], 2, '.', ''));?>" readonly="readonly" />
</td>
</tr>
<tr>
<td>
 
    Remise  :  <BR /> ( En DA )  
</td>

<td>
<input type = "text" name = "remise_bl" value = "0" />
     <select name = "type_reg">
  <option value="0" selected="selected">%</option>
  <option value="1">DA</option>
</select>


</td>


</tr>
     <tr>
<td>
Reglement BL : <br />
( en DA ) 
</td>


<?php
	include("../global.php");

$reqq = mysqli_query($link,"select SUM(montant) from reglement where id_bl = '".$_GET['id_bl']."' ")or die(mysqli_error($link));

$rr ;
if(mysqli_num_rows($reqq))
while($rowww = mysql_fetch_assoc($reqq))	
	{
		$rr = $rowww['deja_regle'];
		
		
		}
	

?>
<td>     <input  type = "text" value = "<?php echo("".$rr);?>" readonly="readonly" />
         <input name = "deja_regle2" type = "text" hidden value = "<?php echo("".$rr);?>" />
     </td>
    </tr> <tr>
     <td>
     Verser  : <br />
( en DA ) 

     
     </td>
     
     <td>
         <input type = "text" name = "deja_regle" value = "0" />
     </td>
     
     
     
 </tr>
   <tr>
<td>
Type de Paiment :
</td>
<td>
     <select>
  <option value="0" selected="selected">Espece </option>
  <option value="1">Virement</option>
</select>
     </td>
 </tr>
 <tr>
<td>&nbsp;</td>


 <td>
 <input type = "submit" value  = "Confirmer et Imprimer BL" />
 

 </td>
</tr>
<tr>


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