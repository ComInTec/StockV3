<?php

include '/../global.php';
$file = file_GET_contents('facture.txt', FILE_USE_INCLUDE_PATH);
//echo $file;
//$e = explode("\n", $file);
//$file = str_replace("\n", "<br>", $file);

//$file = str_replace("\r\n", "<br/>", $file);

//echo $file;
//$file = str_replace(" ","" , $file);
//$file = trim($file);
//$file=preg_replace("~\s*[\r\n]+~", '', $file);
do{
$file = str_replace("  ", " ", $file);
$file = str_replace("\t", "", $file);	
$file = str_replace(" ;", ";", $file);
$file = str_replace("; ", ";", $file);
	}while(substr_count($file, '  ')||substr_count($file, '\t'));
	
$file = str_replace("\n\r", "", $file);
$file = str_replace(" ", ";", $file);
$file = str_replace("\n", "*", $file);
$file = str_replace("\r", "", $file);
$file = str_replace("\t", "", $file);

$file = str_replace(",", ".", $file);

//$file = str_replace("\n", "", $file);
$file = str_replace(" ","-" , $file);
//$file = str_replace(";;;","-" , $file);


$files = explode("*" , $file);
/*$zez = implode(" ", $files);
$files = explode(";", $zez);
*/
//$rows = count($files);
//echo($rows);

?>
   <?php
    
$id_fachat;
$id_article;
$prixunit;
$qt;
$marge;
$prix_rev;
$prix_bl;
if(isset ($_GET["id_fachat"]) )
{
	
$id_fachat=$_GET["id_fachat"];

	
	?>
 

    <br />
<form action = "test2.php" method= "GET">
<table>
<tr>  <td>Facture Achat numero: </td>
  <td> <input name  = "id_fachat" type="text" disabled="disabled" value="<?php echo ("".$id_fachat);?>" readonly="readonly"  />
</td>  
  </tr>

  </table>
</form>
<br />
<table border="1" >
<tr>
<td>Reference : </td>
<td>Quantite</td>
<td> Prix de revient </td>
<td> Marge </td>
<td> Prix BL </td>
</tr>

<?php


foreach($files as $line)
{
  ?>  
<tr>
<?php
$line2 =  explode(";" , $line);

$operatio = 0;
foreach($line2 as $line3)
	{


		if ($operatio==0)
{
$ref = $line3;
	$req=mysqli_query($link,"select * from articles where reference = '".$ref."' ")or die (mysqli_error($link));
		

	?><td>
    	<?php echo("".$ref."");
		?>
		</td>
		<?php
if ($req) 
while($result = mysqli_fetch_array($req))
{
$id_article= $result['id_article'];
$prix_bl = $result['Prix_HT'];
}
//echo($id_article);
}
		if ($operatio==1)
{
$qt = $line3;

	?>
    <td>
	<?php echo("".$line3."");
	?>
    </td>
	<?php

}

		if ($operatio==2)
{
$prixunit = $line3;

	?><td><?php echo("".$line3."");
	?>
    </td>
	<?php
}

		if ($operatio==3)
{
	$Remise_produit=$line3; 
		?><td>
		<?php echo("".$line3."");
		$marge = $line3;
	?>
    </td>
    <td>
    <?php
    echo($prix_bl);
	?>
    </td>
	</tr><?php


$prix_rev =	$prixunit;
//	$total = $qt*$prix;
$id_fachat=$_GET["id_fachat"];
$reqq = mysqli_query($link,"INSERT INTO  `detail_fachat` (
`id_article` ,
`qtt` ,
`prix_rev` ,
`marge`,
`prix_bl`,
id_fachat
)VALUES ('".$id_article."',  '".$qt."',  '".$prix_rev."', '".$marge."','".$prix_bl."' , '".$id_fachat."') ")or die (mysqli_error($link));


}


$operatio++;


	}
?>


<?php
}

}


//$sql = mysqli_query($link,"SELECT SUM( Montant ) AS somme FROM  detail_bl WHERE  id_bl = '".$_GET["id_bl"]."'");
$total_bl=0;
$total_bl_ht=0;
/*while ($r=mysqli_fetch_array($sql))
{
	$total_bl_ht = $r['somme'];
//	echo "<br>total HT = ".$total_facture;
	//echo "<br>total TTC = ";
//$total_bl = $total_bl_ht * 1.17 ;		
//echo("".$total_facture_ht);
}*/	
//$sql33 = mysqli_query($link,"UPDATE bl SET montant_ht = '$total_bl_ht' WHERE id_bl = '".$_GET["id_bl"]."';")or die(mysqli_error($link));

//$lien="id_bl=".$_GET["id_bl"]."&ref_client=".$_GET["ref_client"];
//header("Location: ../bl-vente.php?".$lien);
?>
</table>