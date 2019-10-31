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
    <br />    <br /> 
    Selectionnez  mois et année de facturation  
    <br /><br /> 
 *   Laisser le mois vide pour voir les factures d'année selectionnée
        <br />
       *   Laisser l'année vide pour voir Toutes les factures depuis Janvier 2012
        <br /> 
   <br /><br /> 
 
<?php
 $link = mysqli_connect('localhost','root','') or die($error);
    mysqli_select_db($link,'dap2') or die($error);

 session_start();
  
  
if(isset($_SESSION['username']))
{	 
  ?>
    <form method="GET" action="voir_tout_facture_month.php">

  <table width="45%" border="2" align="center">
  <tr height="50">
  <td>
<select name = "mois" >
<option value = "<?php echo("NULL");?>"    ><?php echo(" ");?>
<option value = "<?php $i=1;echo($i++);?>"<?php  if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Janvier
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Fevrier
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Mars
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Avril
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Mai
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Juin
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Juillet
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Aout
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Septembre
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Octobre
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Novembre
</option>
<option value = "<?php echo($i++);?>"<?php if ($i-1 == date ("m")){?>  selected="selected"<?php }?>>Decembre
</option>
</select>
</td>
<td valign="middle">
<select name = "annee" >
<option value = "<?php echo("NULL");?>" ><?php echo(" ");?>
<?php

$req_min_date = mysqli_query($link,"SELECT * 
FROM  `facture` 
ORDER BY  `facture`.`date` ASC LIMIT 0,1");
	$ii = date ("Y")+0;
	//die("".$i);
	if (mysqli_num_rows($req_min_date))
	{
		
		while ($row=mysqli_fetch_array($req_min_date))
		{
			$ii=date("Y", strtotime($row["date"]))+0;
			//die("hh".$Ii);
			}
		}
		
	for ($ii;$ii<=date("Y")+0;$ii++){
?>
<option value = "<?php echo("".$ii);?>" <?php  if ($ii == date ("Y")){?>  selected="selected"<?php }?>><?php echo("".$ii);?>
</option>
<?php
}
?></select>

</td>


</tr>
<tr>
<td></td>
<td>

<input style=" width:100px ; height:50px;" type="submit" value = "Envoyer"/>
</td>
</tr>
</table >
</form>
</br></br></br></br></br></br>

</div>  

    <!-- end .container -->
 
 
    </div>
   	   <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>

<?php

}
else
	header("Location:../login.php");
?>
</body>
</html>