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
$link = mysqli_connect('localhost','root','') or die($error);
mysqli_select_db($link,'dap2') or die($error);
$id_bl;
$reference;
$_GET['id_bl'];
if(isset($_GET['id_bl']))
{ $id_bl=$_GET['id_bl'];
//echo("$id_bl");
$requete_ref_client=mysqli_query($link,"select * from bl where id_bl='".$id_bl."'")or die(mysqli_error($link));
while($row0=mysqli_fetch_array($requete_ref_client))
{
	$ref_client=$row0['ref_client'];
	//$date= $row0['date'];
	
	}
	
$req_name_facture = mysqli_query($link,"SELECT *
FROM facture
GROUP BY date DESC
LIMIT 0 , 1")or die(mysqli_error($link));
$row_name_facture=mysqli_fetch_array($req_name_facture); 
$name1=$row_name_facture["name_facture"];
$date= date("Y-m-d");
$date2=date("m-y", strtotime($date));
$array_date=explode("-",$date2); 
$m=$array_date[0]-0;
$y=$array_date[1];
$array=explode("-",$name1);
$partie1 = "FA".$m.$y;
$partie2= $array[1]+1;
$name1=$partie1."-".$partie2;
	
	$req = mysql_query ("INSERT INTO  facture (     

ref_client ,
date ,
montant_ht ,
total ,
method_paym,
name_facture
)
VALUES (  
'$ref_client', 
 '$date', 
  '0', 
    '0'	, 
	 '0', 
	  '".$name1."'
	)
")or die (mysqli_error($link));
$req= mysqli_query($link,"select MAX(id_facture) AS last_facture from facture ");
while($row = mysqli_fetch_array($req))
{
	$id_facture = $row['last_facture'];
	}	//echo("$id_facture");
	

	 // echo("$ref_client");
$requete_facture=mysqli_query($link,"select * from  detail_bl  where id_bl='".$id_bl."'")or die(mysqli_error($link));
while($row=mysqli_fetch_array($requete_facture))
{ 
  
  
  $id_article=$row['id_article']; 
  
  $requete_article_prix_achat=mysqli_query($link,"SELECT  detail_fachat.id_article, detail_fachat.prix_rev, detail_fachat.marge, detail_fachat.id_fachat, facture_achat.date
FROM detail_fachat, facture_achat
WHERE detail_fachat.id_fachat = facture_achat.id_fachat
AND detail_fachat.id_article ='".$id_article."'
ORDER BY `facture_achat`.`date` DESC
LIMIT 0 , 1 ")or die(mysqli_error($link));
    
	$quantite=$row['quantite'];
	if(mysqli_num_rows($requete_article_prix_achat))
	{
	$row_prix=mysqli_fetch_array($requete_article_prix_achat);
      $montant=$row_prix["prix_rev"]+$row_prix["prix_rev"] *( $row_prix["marge"]/100);                          
	
	
	
	 $req = mysql_query ("INSERT INTO detail_facture (     
id_detail ,
id_article ,
quantite ,
id_facture ,
Montant ,
prix,
id_user 

)
VALUES (
 NULL ,  
'$id_article', 
 '$quantite', 
  '$id_facture',
  '".$montant*$quantite."',
  '".$montant."'
  ,'1'
  )
")or die (mysqli_error($link));
	}
	}
	
	
	}
	if($req)
	?>
	<b><center><?php 
	$sql = mysqli_query($link,"SELECT SUM( Montant ) AS somme FROM  detail_facture WHERE  id_facture = '".$id_facture."'");
$total_facture=0;
$total_facture_ht=0;
while ($r=mysqli_fetch_array($sql))
{
	$total_facture_ht = $r['somme'];
//	echo "<br>total HT = ".$total_facture;
	//echo "<br>total TTC = ";
//$total_facture = $total_facture_ht * 1.17 ;		
//echo("".$total_facture_ht);
}
//$sql22 = mysqli_query($link,"UPDATE facture SET total = '$total_facture' WHERE  id_facture = '$id_facture' ")or die(mysqli_error($link));
$sql33 = mysqli_query($link,"UPDATE facture SET montant_ht = '$total_facture_ht' WHERE id_facture = '$id_facture';")or die(mysqli_error($link));
	echo("la Transformation de la Facture a été bien fait");?> </center></b>
	<?php
?>
</div>
   <script type = "text/javascript" src = "design/jquery.js"> </script> 
	
   <script type="text/javascript" > 
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", 
imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
</div>

</body>
</html>