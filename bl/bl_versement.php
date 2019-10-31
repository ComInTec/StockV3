<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logiciel De Stock - Ajouter Versement</title>
<link href="design/style2.css" rel="stylesheet" type="text/css" />
<script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>

<script language="javascript" src="../design/cal2.js">
/*
Xin's Popup calendar script-  Xin Yang (http://www.yxscripts.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/
</script>

<script language="javascript" src="../design/cal_conf2.js"></script>
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
<?php
	include("../global.php");

	
	
	function total_versement($id_bl,$link)
	{
		$result =0;
		
		
$req_montant= mysqli_query($link,"select  COALESCE(SUM(reglement.montant),0) as total_versement   from bl,reglement where bl.id_bl = reglement.id_bl  and reglement.id_bl = '$id_bl'")or die (mysqli_error($link));
if (mysqli_num_rows($req_montant))
{
	$row = mysqli_fetch_array($req_montant);
	$result  = $row["total_versement"];
	
}
		
		
	//die($result);	
		
		
		return $result;
	}
	
	
	
	
	
	
 $id_bl;
 $total_bl=0;
 $remise_bl=0;
 $ref_client ;
 $date_bl;
if (isset($_GET["id_bl"]))
{
$id_bl=$_GET['id_bl'];
$total_versement =0;
$total_versement =total_versement($id_bl,$link);
// die($total_versement);
$req_bl= mysqli_query($link,"SELECT COALESCE(SUM(Montant),0) AS total
FROM  detail_bl 
WHERE  id_bl= '".$id_bl."'")or die(mysqli_error($link));
$req_ref_client = mysqli_query($link,"select clients.ref_client,bl.date from clients,bl where bl.ref_client = clients.ref_client and bl.id_bl = '".$id_bl."'");
$row_ref_client = mysqli_fetch_array($req_ref_client);
$ref_client = $row_ref_client["ref_client"];
$date_bl=$row_ref_client["date"];
if(mysqli_num_rows($req_bl))
	{
	$row_bl_total=mysqli_fetch_array($req_bl);
			
			
			
			
	
?>
<hr />
<br />
<table width="70%" border = "2" align="center">




<tr>
<th align="left" nowrap="nowrap">
 
  Montant totale de la commande :  
</th>

<th align="center">

</th>
<th align="center" nowrap="nowrap"><?php 

 $total_bl=$row_bl_total["total"];

echo(number_format($row_bl_total["total"], 2, ',', ' '));?></th>
<td  align="center">&nbsp;</td>
</tr>
<tr>
<th align="left" nowrap="nowrap">
 
    Remise  :  
  
  
  
</th>

<td align="center">
 <?php $req_remise_bl=mysqli_query($link,"select * from bl where id_bl =  '".$id_bl."'")or die(mysqli_error($link));
if(mysqli_num_rows($req_remise_bl))
{
	$row_remise_bl=mysqli_fetch_array($req_remise_bl); 
	$remise_bl=$row_remise_bl["montant_remise"];
echo (number_format($row_remise_bl["remise"], 2, ',', ' ')." %");
	?>
	
	<?php
    }else echo "0 %";
?>
    

</td>
<th align="center" nowrap="nowrap"><?php 
$req_remise_bl=mysqli_query($link,"select * from bl where id_bl =  '".$id_bl."'")or die(mysqli_error($link));
if(mysqli_num_rows($req_remise_bl))
{
	$row_remise_bl=mysqli_fetch_array($req_remise_bl); $remise_bl=$row_remise_bl["montant_remise"];
echo (number_format($row_remise_bl["montant_remise"], 2, ',', ' ')."");

    }else echo 0;
?>
    
 </th>
<td> <a href="confirm-bl.php?id_bl=<?php echo $id_bl;?>"><img src="design/pics/modifier.png" width="16" height="16" /></a></td>
</tr>
     <tr>
<th align="left" nowrap="nowrap">
Total à régler a réception :

</th>


<?php
	
	

?>
<th align="center">   </th>
<th align="center" nowrap="nowrap">  <?php echo(number_format($total_bl-$remise_bl, 2, ',', ' '));?>
        
    </th>
<td align="center">&nbsp;</td>
     </tr> 
    
    
  
<?php
$num ;
$first_dette =0;

$req_first_dette= mysqli_query($link,"select * from clients where ref_client = '$ref_client' ");
if(mysqli_num_rows($req_first_dette))
{
	while($row_req_first_dette=mysqli_fetch_array($req_first_dette))
	{
		$first_dette = $row_req_first_dette["dette"];}
}
$req_montant_ht= mysqli_query($link,"select COALESCE(SUM(bl.montant_ht),0)  as total_bl   from bl where bl.ref_client = $ref_client and bl.id_bl != $id_bl  and bl.date< '$date_bl' ")or die (mysqli_error($link));

$req_remise= mysqli_query($link,"select  COALESCE(SUM(bl.montant_remise),0) as total_remise  from bl where bl.ref_client = '$ref_client' and bl.id_bl != $id_bl  and bl.date< '$date_bl' ")or die (mysqli_error($link));



$req_montant= mysqli_query($link,"select  COALESCE(SUM(reglement.montant),0) as total_versement   from bl,reglement where bl.id_bl = reglement.id_bl and bl.ref_client = '$ref_client' and bl.id_bl != $id_bl  and reglement.date< '$date_bl' and bl.date< '$date_bl' ")or die (mysqli_error($link));

if(mysqli_num_rows($req_remise)&& mysqli_num_rows($req_montant)&& mysqli_num_rows($req_montant_ht))
{
$row_req_montant = mysqli_fetch_array($req_montant);
$row_req_remise = mysqli_fetch_array($req_remise);
$row_req_montant_ht = mysqli_fetch_array($req_montant_ht);

$num = $row_req_montant_ht["total_bl"] - $row_req_montant["total_versement"]+$first_dette-$row_req_remise["total_remise"];
?>


<?php
//if ($num<0)
//echo "Credit anterieur du au ";
//else 
//echo "Dette anterieur du au " ; 

$req_date = mysqli_query($link,"select date from bl where id_bl != '".$id_bl."' and ref_client = '".$ref_client."' and bl.date< '$date_bl' ORDER BY `bl`.`date` DESC limit 0,1 ");


?>
  <?php
if(mysqli_num_rows($req_date))
{
$row_req_date = mysqli_fetch_array($req_date);



//echo  date("d-m-Y", strtotime($row_req_date["date"]));
}
else 
{
//	echo("////");
	}
?> 

<?php
	//echo (number_format($num, 2, ',', ' '));
?>
   



<?php
$total_bl=$num+$total_bl-$remise_bl;

/*if ($total_bl<0)
echo "Credit Client  du le :";
else
{*/
?>
<?php
//}
?>


 <?php
  // $total_bl=$num+$total_bl-$remise_bl;
  // 	echo (number_format($total_bl, 2, ',', ' '));
   ?>

    
   <?php
 }
 ?>
    <?php
 
    $req_versement = mysqli_query($link,"select * from reglement where id_bl =  '".$id_bl."' order by reglement.date ")or die(mysqli_error($link));
if(mysqli_num_rows($req_versement))
{
	while($row_versement =mysqli_fetch_array($req_versement))
	{
	?>
    <tr>
     <th align="left" nowrap="nowrap">
     Verser  par <span style="color:#00FF66"> <?php echo $row_versement["type_versement"] ;?> </span> le :</th>
     
     <td align="center" nowrap="nowrap">
   <?php echo date("d-m-Y", strtotime($row_versement["date"]));?>
   </td>
     <td align="center" nowrap="nowrap"><?php echo number_format($row_versement["montant"], 2, ',', ' ');?>
       </td>
     <td><a href="delete_versement.php?id=<?php echo $row_versement["id"];?>&id_bl=<?php echo $id_bl?>"><img src="design/pics/delete.png" width="16" height="16" /></a></td>
     </tr><?php
} }
 ?>
</table>
<br />
<hr />
<br />
<table border="2" align="center" >
 <tr>
 <th align="center" nowrap="nowrap">
 
<?php
//$total_bl = $total_bl-$row_versement["montant"];
//if ($total_bl<0)
//echo "Credit Client du le "  ;
//else 
//echo "Réste du le " ; ?>  
  
 Verser le  :</th>
 <td align="center" nowrap="nowrap">
 Mode De Paiement :<?php //echo date("d-m-Y", strtotime($row_versement["date"]));
 ?>  
</td>


  
  <th align="center" nowrap="nowrap">Montant :<?php 
// $total_bl = $total_bl-$row_versement["montant"];
 //echo (number_format($total_bl, 2, ',', ' '));?>
  </th> <td>
  </td></tr> 
 <form name = "sampleform" action = "confirm_bl_versement.php" method = "GET" > <tr>
   <th align="center" nowrap="nowrap"><input type = "hidden" name = "id_bl" value="<?php echo $id_bl; ?>" />
<input style="text-align:center;" type = "text" name = "date" value = "<?php echo date("d-m-Y");?>"  onclick="showCal('Calendar1')" /></th>
   <td nowrap="nowrap"><select name = "method">
  <option value="Espece" selected="selected">Espece</option>
  <option value="CCP">CCP</option>
</select></td>
   <th nowrap="nowrap"><input  style="text-align:center;" type = "text" name = "montant"  value = "<?php 
   echo("".  $total_bl-$num -$total_versement );
   // / echo("".  $total_versement );
   ?>" autofocus="autofocus"/></th>
   <td> <input type = "submit" value  = "Ajouter versement" />
</td>
  </tr> </form>

 
 </table>
 
 
 


 

<?php
}
		
	
		
}?>
    </div>  

    <!-- end .container -->
 
 <div id = "print">
 <br />
 <hr />
 <a href = "../print/print_bl.php?id_bl=<?php echo  $id_bl;?>">
Imprimer : <br /> <img src="design/pics/print-button.png" width="209" height="143" alt="Imprimer" longdesc="Imprimer Ce bl" /> </a>
<br />
<hr />
<br />
 </div>
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