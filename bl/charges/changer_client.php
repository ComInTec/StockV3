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
<?php
include("../global.php");

 	
	
		
function ref_client($id_bl,$result)
{
	$ref_client = 0 ;
	
	$req=mysqli_query($link," select clients.Societe,bl.ref_client,bl.id_bl
	from bl,clients
	WHERE 
	bl.ref_client = clients.ref_client and 
	bl.id_bl ='$id_bl'
	
	
	
	")or die (mysqli_error($link));
	
	
if(mysqli_num_rows($req))
{
while($row = mysqli_fetch_array($req))
{
	
	if ($result ==="ref_client")
$ref_client= $row["ref_client"];
 else
$ref_client= $row["Societe"];
 
}

}
// die("f". $ref_client);

	return $ref_client;



}	
	
	

?>
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
 <center ><h1 style="text_align:center;" > Changer CLient Du Bon N° :
<?php
$id_bl;
	if(isset($_GET['id_bl'])) 
{	$id_bl=$_GET['id_bl'];
}
 echo $id_bl ;?> </h1>
</center> <table width="45%" align="center" border = "2">
<form action = "changer_client_confirm.php" method = "GET" >
<input type = "hidden" name = "id_bl" value = "<?php echo("".$id_bl);?>" readonly="readonly" />
<tr>
  <th nowrap="nowrap">    Client Actuel    </th>
    <td nowrap="nowrap">
   <?php echo ("".ref_client($id_bl,"Societe"));?> 
      </td>
  </tr>
<tr>
  <th nowrap="nowrap">  Nouveau Client   </th>
    <td nowrap="nowrap">
	<?php
	
	$req=mysqli_query($link," select * from clients")or die (mysqli_error($link));
if(mysqli_num_rows($req))
{
	?>
	
	<select name = "ref_client">
	<?php
	
	
while($row = mysqli_fetch_array($req))
{
	
	
$ref_client= $row["ref_client"];

$Societe= $row["Societe"];
 

	?>
	<option value = "<?php echo  $ref_client ;?>">  <?php echo  $Societe; ?> </option>

<?php

}
?>
	</select>
	<?php
	
}
	?>
 
      </td>
  </tr>    
   <tr>
<td>&nbsp;</td>


 <td>
 <ul>
 <input class= "bt" type = "submit" value  = "Enregistrer" />
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