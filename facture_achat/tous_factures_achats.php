<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> Logiciel De Stock </title>
    <link href="design/style2.css" rel="stylesheet" type="text/css"/>
    <script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>
    <script src="design/spryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>
    <script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
    <link href="design/spryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="container">
    <center>
        <div class="header" id="header"></div>

        <div class="sidebar1">
            <center>
                <div id="menu">
                    <ul id="MenuBar1" class="MenuBarHorizontal">
                        <li><a href="../index.php" class="MenuBarItemSubmenu">Acceuil</a></li>
                    </ul>
                </div>
            </center>
            <br/><br/><br/>
            <?php
            include("../global.php");


            $rest_total = 0;
            $total_bon = 0;


            function total_dette($link)
            {
                $result = 0;
                $query = mysqli_query($link, "
	 
SELECT  COALESCE(SUM(fournisseurs.dette),0) AS total_dette   FROM fournisseurs 

") or die (mysqli_error($link));

                if (mysqli_num_rows($query)) {
                    while ($row = mysqli_fetch_array($query))
                        $result = $row["total_dette"];

                }

                return $result;


            }

            /////////////////////////////////////////////////////////////////////

            ////////////////////////////////////////////////////
            function total_versement($id_fachat, $link)
            {
                $result = 0;
                $query = mysqli_query($link, "
	 
select  COALESCE(SUM(reglement_achat.montant),0) as total_versement   from reglement_achat where id_fachat = '$id_fachat'  
") or die (mysqli_error($link));

                if (mysqli_num_rows($query)) {
                    while ($row = mysqli_fetch_array($query))
                        $result = $row["total_versement"];

                }

                return $result;


            }

            /////////////////////////////////////////////////////////////////////
            function delet_facture_achat($id_fachat,$link)
            {
                $result = false;
                $query = mysqli_query($link, "
	SELECT  `id_detachat`  
	
	FROM 
		`detail_fachat`  
	WHERE detail_fachat.`id_fachat` = '$id_fachat'
") or die (mysqli_error($link));

                if (!mysqli_num_rows($query))
                    $result = true;

                return $result;
            }

            ////////////////////////////////////////////

            $id_fachat;
            $req_factures_achats = mysqli_query($link, "SELECT facture_achat.`bon_fournisseur` ,facture_achat.`date` ,facture_achat.`id_fachat`, fournisseurs.Societe
FROM `facture_achat` 
left outer join  fournisseurs
on fournisseurs.`ref_fournisseur` = facture_achat.`ref_fournisseur`
ORDER BY `facture_achat`.`date` DESC") or die (mysqli_error($link));

            if (mysqli_num_rows($req_factures_achats)) {

                ?>
                <table border="2" align="center">
                    <tr>
                        <th align="center">N °</th>
                        <th align="center">Date d'achat :</th>
                        <th align="center">Fournisseur :</th>
                        <th>Total Prix D'achat:</th>
                        <th>Confirmation Prix Achat:</th>
                        <th>Total Versement:</th>
                        <th>Reste :</th>
                        <th>Supprimer:</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($row_req_factures_achats = mysqli_fetch_array($req_factures_achats)) {
                        $id_fachat = $row_req_factures_achats["id_fachat"];
                        $bon_fournisseur = $row_req_factures_achats["bon_fournisseur"];
                        $total_bon = $total_bon + $bon_fournisseur;
                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>
                                <?php echo $row_req_factures_achats["date"]; ?>
                            </td>
                            <td>
                                <a style="color:#0FC"
                                   href="facture_achat.php?id_fachat=<?php echo $row_req_factures_achats["id_fachat"]; ?>"><?php echo $row_req_factures_achats["Societe"]; ?>
                                    <img src="design/pics/modifier.png" width="16" height="16" alt="Modifier"
                                         longdesc="mofifier cet ligne de commande"/></a>
                            </td>
                            <?php
                            $somme_qt = 0;
                            $somme_achat = 0;
                            $somme_vente = 0;
                            //$bon_fournisseur = 0 ;
                            $req = mysqli_query($link, " SELECT * FROM detail_fachat WHERE `id_fachat` ='" . $id_fachat . "'") or die (mysqli_error($link));
                            if (mysqli_num_rows($req)) {
                                while ($row = mysqli_fetch_array($req)) {
                                    $qtt = $row["qtt"];
                                    $somme_qt = $somme_qt + $qtt;
                                    $prix_achat = $row["prix_achat"];
                                    $dernier_prix = $row["dernier_prix"];
                                    $prix_vente = $row["prix_vente"];
                                    $somme_achat = $somme_achat + $qtt * $prix_achat;
                                    $somme_vente = $somme_vente + $qtt * $prix_vente;
                                }
                            }
                            ?>
                            <td align="right"><?php
                                echo(number_format($somme_achat, 2, '.', ' '));
                                ?></td>
                            <td align="right">
                                <a style="color:#51B8C4"
                                   href="total_bon_fournisseur.php?id_fachat=<?php echo $id_fachat; ?>"><?php
                                    echo(number_format($bon_fournisseur, 2, '.', ' '));
                                    ?><img src="design/pics/modifier.png" width="16" height="16" alt="Modifier"
                                           longdesc="mofifier cet ligne de commande"/></a></td>


                            <td align="right">
                                <a style="color:#E3C16B"
                                   href="facture_achat_versement.php?id_fachat=<?php echo $id_fachat; ?>"><?php

                                    $total_versement = total_versement($id_fachat, $link);
                                    //die("to".$total_versement);
                                    echo(number_format($total_versement, 2, '.', ' ')); ?><img
                                            src="design/pics/modifier.png" width="16" height="16" alt="Modifier"
                                            longdesc="mofifier cet ligne "/></a></td>
                            <td align="right"><?php

                                $rest = $bon_fournisseur - $total_versement;

                                $rest_total = $rest_total + $rest;
                                echo(number_format($rest, 2, '.', ' '));
                                ?></td>
                            <td align="right"><?php
                                if (delet_facture_achat($id_fachat,$link)) {
                                    ?><a
                                    onclick="if(confirm('Etes vous sûr de vouloir supprimer cet Ligne ?')) document.location='delete_facture_achat.php?id_fachat=<?php echo("" . $id_fachat); ?>';"
                                    href="#"><img src="design/pics/delete.png" width="16" height="16"
                                                  alt="Supprimer cet ligne"/></a>
                                    <?php
                                } ?>
                            </td>
                        </tr>


                        <?php
                    }
                    ?>
                    <tr>
                        <td>
                        </td>
                        <td>Total DETTE
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td><?php
                            $dette = total_dette($link);
                            $rest_total = $rest_total + $dette;
                            echo(number_format($rest_total, 2, '.', ' ')); ?>
                        </td>
                        <td>
                        </td>
                    </tr>


                </table>
                <?php
                ?>


                <?php


            } else {
                ?>
                <center>
                    <p>&nbsp;</p>
                    <p style="color: #CCC; font-size: 24px;">&nbsp;</p>
                    <p style="color: #CCC; font-size: 24px;">&nbsp;</p>
                    <p style="color: #CCC; font-size: 24px; text-align: center;">Aucune Facture achat n'a été faite dans
                        cette période </p>
                </center>
                <?php

            }

            ?>

        </div>
        <script type="text/javascript" src="design/jquery.js"></script>

        <script type="text/javascript">
            var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {
                imgDown: "design/SpryAssets/SpryMenuBarDownHover.gif",
                imgRight: "design/SpryAssets/SpryMenuBarRightHover.gif"
            });
        </script>
    </center>
</div>
</body>
</html>