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
       <?php   
	session_start();
 
 
if(isset($_SESSION['username']))
{	
	?>  
 </div>


<div class="content">

 </div>



  <div class="content">

  


<?php
$ref;

if(isset($_SESSION['username']))
{	

?>



Fiche Du Client :
<br /><br />
<?php
$ref_client;
if (isset($_GET['ref_client']))
{
	include("../global.php");	
	$ref_client=$_GET['ref_client'];
	$req= mysqli_query($link,"select * from clients where ref_client = '$ref_client'");
$num = mysqli_num_rows($req);
if($num)
{
	while($row= mysqli_fetch_array($req))
	{
?>

<form action ="update-clients.php" method="GET">
<center>
<table  border = "2">



<tr class="tr-gauche">
<td class="td-gauche">
Nom
 </td>
<td class="td-point">:</td>
<td class="td-client">
<input  name = "ref_client" type = "hidden"  value="<?php echo("".$ref_client);?>"
 /> 
<input autocomplete="off" name = "societe" type = "text" class = "input-table" value="
<?php
 	
echo($row['Societe']); 
?>
" />
 

</td>
<td class="td-point">*</td>
</tr>

 
<tr class="tr-gauche">
<td class="td-gauche">
1 ere Dette
 </td>
<td class="td-point">:</td>
<td class="td-client">
<input autocomplete="off" name = "dette" type = "text" class = "input-table" value="
<?php echo($row['dette']); ?>" />
</td>
<td class="td-point">*</td>
</tr>



<tr>
<td class="td-gauche"> 
 Telephone 
 </td>
<td class="td-point">:</td>
<td class="td-client">


 

<input autocomplete="off" name = "telephone" class = "input-table" type = "text" value="
<?php 
echo($row['telephone_fix']);?>
"/>
 
</td>
<td class="td-point">&nbsp; </td>
</tr>



<tr>
<td class="td-gauche"> T.Portable 
</td>
<td class="td-point">:</td>
<td class="td-client" >
 
<input autocomplete="off" name = "mobile" class = "input-table" type = "text" value="
<?php 
echo($row['T_Mobile']);
?>"/>
 
</td>
<td class="td-point" >&nbsp; </td>
</tr> 

<tr>
<td class="td-gauche">
Adresse  
 </td>
<td class="td-point">:</td>
<td class="td-client" >

 
<input autocomplete="off" name = "adresse" class = "input-table" type = "text" value="
<?php 
echo($row['adresse_activite']); 
?>"/>
 
</td>
<td class="td-point" >*</td>
</tr>


<tr>
<td class="td-gauche">
Ville
 </td>
<td class="td-point">:
</td>
<td class="td-client" >
<input autocomplete="off" name = "ville" class = "input-table" type = "text" value="<?php echo("".$row['Ville']); ?>"/>
</td>
<td class="td-point" >*</td>
</tr>

<tr>
<td class="td-gauche">
Wilaya </td>
<td class="td-point">:
</td>
<td class="td-client" >
<input autocomplete="off" name = "wilaya" class = "input-table" type = "text" value="<?php echo("".$row['Wilaya']); ?>"/>
</td>
<td class="td-point" >*</td>
</tr>






<tr>
<td>
</td><td>
</td>
<td>
<input name = "modifier" type= "submit" style="width:120px; height:40px;"value = "Mise a Jour" />
</td>
<td>
</td>   
</tr>     
</table>

</center>
    <!-- end .content -->
</form>  </div>
<?php
}
}
}

}
else
	header("Location:../login.php");


}
?>
</div>  

    <!-- end .container -->
 
 
    </div>
   	    <script type = "text/javascript" src = "design/jquery.js"> </script> 
		<script type="text/javascript">

		
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>

</body>
</html>