 <div class = "date"> </div>
<div style="width: 20%; float: right; font-size: 16px; text-align: right;"><p>&nbsp;</p>
 
</div>
<div class = "date" style="width:90% ; font-size: 16px;">
  <ul align = "Center" style="width: 50%; text-align: left;">
    <?php 
 $date= date("d-m-Y");
	
	$username = ucfirst($_SESSION['username']);
	$req_users = mysqli_query($link,"select * from users,users_type where users_type.id_user_type = users.id_user_type and user = '".$_SESSION['username']."'")or die (mysqli_error($link));
$row_users = mysqli_fetch_array($req_users);
$type = ucfirst($row_users["type"]);


 //echo($username." ( ".$type." )" );
echo("<li> Aujourd'hui : $date");
// echo($username );
echo("</li> ");




$req_recette=mysqli_query($link,"      
select  
  
(select  COALESCE(SUM(tab.total_remise ),0) ) AS total_remise ,
 (select COALESCE(SUM(tab.total_bl ),0) ) AS total_bl ,
 (select  COALESCE(SUM(tab.total_versement ),0) ) AS total_versement 

from (
SELECT
 clients.ref_client, 
 clients.Societe, 
 
 ( SELECT 	COALESCE(SUM(bl.montant_remise ),0) AS rem       		 FROM bl WHERE bl.ref_client = clients.ref_client and bl.date = CURDATE()) AS total_remise ,
 ( select 	COALESCE(SUM(bl.montant_ht     ),0) as total_bl  		 from bl where bl.ref_client = clients.ref_client and bl.date = CURDATE()) as total_bl ,
 ( select  	COALESCE(SUM(reglement.montant ),0) as total_versement   from bl,reglement where bl.id_bl = reglement.id_bl and bl.ref_client = 		clients.ref_client and reglement.date = CURDATE()) as total_versement
 FROM clients 
 
ORDER BY  `clients`.`ref_client` ASC
    ) as tab



") or die (mysqli_error($link));
if (mysqli_num_rows($req_recette))
{
$row_recette = mysqli_fetch_array($req_recette);
$total_ventes= $row_recette["total_bl"]-$row_recette["total_remise"];
$total_ventes = number_format($total_ventes, 2, ',', ' ');
$total_versement   = number_format($row_recette["total_versement"], 2, ',', ' ') ;

echo("<li> Ventes : ");
echo("<span style=\"color:#33FF00\">".$total_ventes );
echo(" DA</span></li> ");
echo("<li> Versements : ");
echo("<span style=\"color:#33FF00\">".$total_versement );
echo(" DA</span></li> ");



}



$req_version= mysqli_query($link,"select * from updates ORDER BY `updates`.`id_update` DESC
LIMIT 0 , 1") or die (mysqli_error($link));
$row_version = mysqli_fetch_array($req_version);

echo($row_version["current_update_version"]."</li>");
if($row_version["new_update_version"]=="1")
{
	?>

  <li>  <a style = "text-decoration: none; color: #3F3;" href="updates/new_update.php?id_update=<?php echo $row_version["id_update"]?>">Une nouvelle Mise a jour est Disponible</a>
    </li>
    
    <?php
	
	}else
{	?>
 
<?php
}
?>
</ul>
</div>