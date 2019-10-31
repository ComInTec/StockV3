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
     <li><a href="../" class="MenuBarItemSubmenu">Acceuil</a>
     </li>
</ul>
 </div> </center>
    <br /><br /><br /> 
 </div>



  <div class="content">
  <br />  <br  />
  
       <?php   
include("../global.php");

		session_start();
if(isset($_SESSION['username']))
{


$date="";
$cpt=1;

	//$date = $_GET["date"];
	
//echo($date);
	//$date_inf=$date."-12-31";
//$date_sup=$date."-01-01";

		$req_references= mysqli_query($link," SELECT COUNT( * ) AS  `Lignes` ,  `id_article` 
FROM  `detail_facture` 
GROUP BY  `id_article` 
ORDER BY  `id_article` 
 ")or die (mysqli_error($link));
		if (mysqli_num_rows($req_references))
		{
		
?>
<TABLE border="1" align="center">
 <tr class=>

 <th class = "dette" > Reference </th>
 <th class = "dette" > Quantite Achetée </th>
 <th class = "dette" > Quantite Vendue </th>
 <th class = "dette" > Quantite facturée </th>
 <th class = "dette" > Quantite </th>
 <th class = "dette" >Prix HT Actuel</th>
 <th class = "dette" > Factures </th>
 <th class = "dette" > Action </th>
 </tr>
<?php
while($row_references = mysqli_fetch_array ($req_references))
			{
	
$id_art=$row_references["id_article"];	
$quant_en_Stock = 0;
$quant_vendu = 0;
$quant_comptab = 0;
$quantite_total=0;

$requetqt = mysqli_query($link,"SELECT COALESCE(SUM(quantite),0) AS quant_en_Stock
FROM  detail_bl 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));

$quant_compta = mysqli_query($link,"SELECT COALESCE(SUM(quantite),0) AS quant_en_Stock
FROM  detail_facture 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));

$requetqtv = mysqli_query($link,"SELECT COALESCE(SUM(qtt),0) AS quant_en_Stock
FROM  detail_fachat 
WHERE  id_article = '$id_art'")or die (mysqli_error($link));

$row2v=mysqli_fetch_array($requetqtv);
$row2compta=mysqli_fetch_array($quant_compta);

$row2=mysqli_fetch_array($requetqt);
//if(mysqli_num_rows($requetqt)!=0)
$quantite_total = $row2v['quant_en_Stock'];
$quant_vendu= $row2['quant_en_Stock'];
$quant_comptab= $row2compta['quant_en_Stock'];
$quant_en_Stock = $row2v['quant_en_Stock']-$quant_vendu;
//echo(" ".$quantite_total );

//echo(" ".$quant_comptab);
		
	$req_ref= mysqli_query($link,"select * from articles where id_article= $id_art")or die (mysqli_error($link));
		
$row_ref=mysqli_fetch_array($req_ref);		
		$ref=$row_ref["reference"]; 
		if($quant_vendu>$quant_comptab && $quantite_total >=$quant_vendu)
	{	?>
		<tr>
		
		  <td style = "Align = 'left' ;"><?php echo(" ".$ref);?></td>
			<td nowrap="nowrap" style = "Align = 'left' ;">
				<?php echo(" ".$quantite_total );?>
		</td>
			<td nowrap="nowrap" style = "Align = 'left' ;"><?php echo $quant_vendu ;?></td>
			<td align="Right" nowrap="nowrap"><?php echo(" ".$quant_comptab);?></td>
			<form action ="../factures/search2-f.php" methode ="GET">
            <td align="Right" nowrap="nowrap">
            <label for="quantite"></label>
		  <input type="hidden" name ="aide_ref" value = "aide_ref" />
            <input name="quantite" style = "text-align : center ; width:80px;" type="text" id="quantite" value="1" />
           <?php 
		echo("/ ");
			echo ("".$quant_vendu-$quant_comptab);
			?></td>
            <td align="Right" nowrap="nowrap">&nbsp;</td>
			<td align="Right" nowrap="nowrap"><label for="name_facture"></label>
			<?php
            $req_facture= mysqli_query($link,"SELECT * 
FROM  `facture` order by date DESC ")or die (mysqli_error($link));
	?>
     <select name="name_facture" id="name_facture">
    <?php	
while($row_facture=mysqli_fetch_array($req_facture))
{		
		$name=$row_facture["name_facture"];
?>
             
			    <option><?php echo $row_facture["name_facture"];?></option>
		
             		  
		    <?php } //echo $N_ART?> </select>	</td>
			<td align="Right" nowrap="nowrap">
            <input type="submit"  id="submit" value="  Ajouter   " />
<?php// echo $nrc?>
            </td>
            </form>
		</tr>
		<?php
	}}
?>
</TABLE>
<br /><br /><br />
	<?php
		}
?>
  </div>

 
	
    
	<?php
	
}
else

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