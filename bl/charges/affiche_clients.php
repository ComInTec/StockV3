<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logiciel De Stock Logiciel De Stock </title>
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

 
       <?php   
include("../global.php");
$dette = 0;
		session_start();
if(isset($_SESSION['username']))
{
		?>  
 </div>
 </center>


  <div class="content">
  <br /> 
  


<?php

$ref;
?>


<?php
$req=mysqli_query($link,"select * from clients
ORDER BY `clients`.`ref_client` DESC
");
$num = mysqli_num_rows($req);
if ($num)
{?>
<h1>liste des clients :</h1>
 

<TABLE border="1" align="center">
    <tr class=>
	  
		
 <th width="400">Client  </th>
<?php
/* 
 <th >Mobile </th>
 
 <th >N R C </th>
 <th >N ° ART </th>
 <th >N I F </th>
 */?>
 
 <th nowrap="nowrap" >Nouveau Bon </th>
 
 <th nowrap="nowrap">Historique</th> 

 <th>Supprimer</th>


</tr>
		<?php
		 
	
	  
		while($row=mysqli_fetch_array($req))
		{
			$societe_officielle= $row[2];
			$ref=$row[0];
			$client=$row[1] ;
			$telephone=$row[3];
		 
	   
	  	?>
		<tr>
		
        
		

			<td align="center">
				<a class = "linkcolor" href="fiche-client.php?ref_client=<?php echo($ref);?>"><?php  echo "".$client.$societe_officielle;?><img src="design/pics/modifier.png" width="16" height="16" longdesc="" /></a>
			</td>

		 
		<?php
        /*  <td align="center">
				<?php echo $email?>
			</td>


 
		  <td align="center">
				<?php echo ($nrcc);?>
			</td>
			<td align="center">
				<?php echo $ccp?>
			</td>

			<td align="center">
				<?php echo $row["n_carte_fiscale"];
				$dette = $row["dette"];?>
			</td>
        */
		$dette = $row["dette"];
		?>
 
<td align="center">

<a href="#<?php echo $row["ref_client"];?>" id= "<?php echo $row["ref_client"];?>" onclick="window.open('../bl/new_bl.php?ref_client=<?php echo $row["ref_client"];?>')" class="linkcolor">BL<img src="design/pics/pdf.png" width="16" height="16" longdesc="" />
</a>
		  </td>
 <?php
 

 ?>

<td >
<center>
 <a href="../bl/historique_bl.php?ref_client=<?php echo $row["ref_client"];?>" id= "<?php echo $row["ref_client"];?>"  class="linkcolor" >BL<img src="design/pics/modifier.png" width="16" height="16"   /></a>
  </center>
  
</td>
 


          
<td align="center">
<?php
$re=mysqli_query($link,"select * from  bl where 
ref_client ='".$ref."'
")or die (mysqli_error($link));
$num=mysqli_num_rows($re);


$re3=mysqli_query($link,"select * from  bl where ref_client ='".$ref."'

")or die (mysqli_error($link));
$num3=mysqli_num_rows($re3);
 
if($num3==0  && $ref!="1" && $dette==0)
{
?>
<a href="delete.php?ref=<?php echo($ref);?>" class="linkcolor"><img src="design/pics/delete.png" width="16" height="16" longdesc="" /></a>
		  
<?php
}
?>
	</td>		
			<?php
//			 echo "<td class=\"lien_besoin_recherche\" width=\"100\"><a width=\"100\" href=modifier_besoin_form.php?code=$row[0] target=\"bas\">Modifier</a></td>";
           
      
			?>
		</tr>
		<?php
		}

?>
</TABLE>
<?php
}else 
{
	?>
	<center>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Aucun Client n'existe encore , Voulez vous <a href="cree-client.php" style="text-decoration: none; color: #0F0;">Crééer un</a> ? </p>
    </center>
<?php	}
?>    <!-- end .content -->
  </div>
 <?php
}else

 	header("Location:../login.php");

 ?>
    </ul>
  
 </div>
   <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</center>

</body>
</html>