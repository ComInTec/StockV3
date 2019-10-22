<?php
// Quick multiQuery func.
 
 
  $total_rest_double = 0;
 $host = "localhost";
		$username ="root";
		$password ="";
	
$connection = mysqli_connect($host,$username,$password);

 
 $connection_db=mysqli_select_db($connection,"dap2");
	
 

	$request_2  = "
		SELECT id_article 
				FROM (
						SELECT 
							COUNT( * ) AS  `Lignes` , 
							detail_fachat.`id_article` , 
							reference
						FROM  
								`detail_fachat` , articles
						WHERE 
								articles.id_article = detail_fachat.id_article
						GROUP BY  `id_article` 
						ORDER BY  `Lignes` DESC
					) AS tab
			
		 
	
	";
	$request= mysqli_query($connection, $request_2);

if ($request ) {
          while ($row = mysqli_fetch_array($request)) {
                $i=0;
				 
				echo ("id_article = ".$row["id_article"]."<br>");
				



$link = mysqli_connect("localhost", "root", "", "dap2");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

  	
$query =" SET @var_amount =0; ";
$query =$query ."  		SELECT 
					COALESCE(SUM(quantite),0) AS quant_en_Stock INTO @var_amount
				FROM  detail_bl 
				WHERE id_article = '".$row["id_article"]."';";
$query =$query . "  SELECT *,
				tmp.qtt*prix_achat as total_achat,
				tmp.qtt_vendu*prix_achat as total_vendu,
				tmp.qtt-tmp.qtt_vendu as qtt_rest,
				(tmp.prix_achat * (  tmp.qtt-tmp.qtt_vendu )) as total_rest
			FROM (
					SELECT 
							`id_detachat`,
							id_article,
							qtt ,
							`prix_achat`,
							case
								when  ( @var_amount := @var_amount - qtt) > 0 
									then qtt
								when @var_amount   <= 0    
									then  if (   @var_amount+qtt <= 0,0,@var_amount+qtt)
							END	as qtt_vendu 
							FROM detail_fachat
							WHERE id_article = '".$row["id_article"]."'
							ORDER BY `id_detachat` ASC
					) AS tmp ;
  ";

/* execute multi query */
if (mysqli_multi_query($link, $query)) {
     do {
        /* store first result set */
        if ($result = mysqli_store_result($link)) {
            while ($row = mysqli_fetch_array($result)) {
				
				
				
				
                echo("total vendu". $row["total_rest"]."<br>");
				
				$total_rest_double = $total_rest_double+$row["total_rest"];
				
				
				
            }
         } 
        if (!mysqli_more_results($link)) {
            break;
        }
    } while (mysqli_next_result($link));
}
}
             
          }else 
			  echo "no ";

  	
 die("$total_rest_double");
 

/* close connection */
mysqli_close($link);
?>