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
    </center>


    <div class="sidebar1">
        <center>
            <div id="menu">
                <ul id="MenuBar1" class="MenuBarHorizontal">
                    <li><a href="../" class="MenuBarItemSubmenu">Acceuil</a></li>
                </ul>
            </div>
        </center>

    </div>
    <?php
    $link = mysqli_connect('localhost', 'root', '') or die($error);
    mysqli_select_db($link, 'dap2') or die($error);
    session_start();
    $bl_print = "";
    if (isset($_SESSION['username']))
    {
    function total_versement($link,$id_bl)
    {

        $req_recette = mysqli_query($link, "      
SELECT (

SELECT COALESCE( SUM( tab.total_remise ) , 0 )
) AS total_remise, (

SELECT COALESCE( SUM( tab.total_bl ) , 0 )
) AS total_bl, (

SELECT COALESCE( SUM( tab.total_versement ) , 0 )
) AS total_versement
FROM (

SELECT clients.ref_client, clients.Societe, (

SELECT (
bl.montant_remise
) AS rem
FROM bl
WHERE bl.ref_client = clients.ref_client
AND bl.id_bl =  '$id_bl'
) AS total_remise, (

SELECT (
bl.montant_ht
) AS total_bl
FROM bl
WHERE bl.ref_client = clients.ref_client
AND bl.id_bl =  '$id_bl'
) AS total_bl, (

SELECT COALESCE( SUM( reglement.montant ) , 0 ) AS total_versement
FROM bl, reglement
WHERE bl.id_bl = reglement.id_bl
AND bl.ref_client = clients.ref_client
AND reglement.id_bl =  '$id_bl'
) AS total_versement
FROM clients
ORDER BY  `clients`.`ref_client` ASC
) AS tab



") or die (mysqli_error($link));
        if (mysqli_num_rows($req_recette)) {
            $row_recette = mysqli_fetch_array($req_recette);
            $total_ventes = $row_recette["total_bl"] - $row_recette["total_remise"];
            $total_ventes = number_format($total_ventes, 2, ',', ' ');
            $total_versement = number_format($row_recette["total_versement"], 0, ',', '');


            return $total_versement;


        }


    }


    $req_part1 = "SELECT bl.id_bl ,clients.Societe,clients.ref_client,bl.date ,bl.montant_ht,bl.montant_remise FROM bl 
LEFT JOIN clients ON
bl.ref_client=clients.ref_client  ";

    if (isset($_GET["id_bl"]))
        $bl_print = "where bl.id_bl = '" . $_GET["id_bl"] . "' ";

    $req_part3 = " 

ORDER BY  bl.id_bl DESC

limit 0,100";
    $req = $req_part1 . $bl_print . $req_part3;
    $requete = mysqli_query($link, $req) OR DIE(mysqli_error($link));

    if (mysqli_num_rows($requete)) {

        ?>
        </br></br></br>
        <h1>
            Si l'icone de la Suppression du BL n 'apparait pas,Verifier que : </h1><p> - Ce bon a un total de 0,00
            DA</p>
        <p> - Ce bon n'a aucun versement </p>


        <TABLE border="1" align="center">
            <tr>

                <th>Societé</th>
                <th>Date</th>
                <th>Total</th>
                <th>Versement</th>
                <th>Imprimer</th>
                <th>Facture de Route</th>
                <th>Changer Client</th>


                <th>Suprime</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($requete)) {
                $id_bl = $row['id_bl'];
                $Societe = $row['Societe'];
                $ref_client = $row['ref_client'];
                $date = $row['date'];
                $montant_ht = $row['montant_ht'];
                //$deja_regle = $row['deja_regle'];
                $Remise_bl = $row['montant_remise'];
                $total_versement = total_versement($link,$id_bl);
                $dette_bl = $montant_ht - $Remise_bl - $total_versement;
                // $dette_bl=$total_versement ;
                ?>
                <tr>


                    <td>
                        <a class="Societe"
                           href="../bl/bl-vente.php?id_bl=<?php echo $id_bl; ?>&p=d&ref_client=<?php echo $ref_client; ?>">
                            <?php echo $Societe; ?> - N°
                            <?php echo " " . $id_bl; ?>

                            <img src="../design/pics/modifier.png" width="16" height="16" alt="Modifier"
                                 longdesc="modifier"/></a>
                    </td>

                    <td align="center" nowrap="nowrap">
                        <?php
                        echo date("d-m-Y", strtotime($date));
                        //echo $date;
                        ?>

                    </td>
                    <td align="right" nowrap="nowrap"
                        class="numright" <?php if ($dette_bl != 0) { ?> style="color:orange;"<?php } ?>>
                        <?php
                        $montant_ht = $montant_ht - $Remise_bl;
                        $montant_ht = number_format($montant_ht, 2, ',', ' ');
                        echo $montant_ht;
                        ?>
                    </td>
                    <td align="center"><?php //echo total_versement($id_bl);
                        ?>
                        <a href="../bl/bl_versement.php?id_bl=<?php echo $id_bl; ?>"><img
                                    src="../design/pics/modifier.png" width="16" height="16" alt="Modifier"
                                    longdesc="modifier"/></a>

                    </td>
                    <td><a href="../print/print_bl.php?id_bl=<?php echo $id_bl; ?>"><img src="../design/pics/pdf.png"
                                                                                         width="16" height="16"
                                                                                         alt="Modifier"
                                                                                         longdesc="modifier"/></a>
                    </td>
                    <td>
                        <a href="../print/print_facture_de_route.php?id_bl=<?php echo $id_bl; ?>"><img
                                    src="../design/pics/pdf.png" width="16" height="16" alt="Modifier"
                                    longdesc="modifier"/></a>

                    </td>


                    <?php

                    $req_versement_bl = mysqli_query($link, "select * from reglement where id_bl = '$id_bl'") or die (mysqli_error($link));


                    /*


                    echo $reste_paye=$montant_ht-$deja_regle;
                    <td> <a href="code_ref.php?id_bl=<?php echo("".$id_bl)?>">
        Transformer<img src="design/pics/modifier.png" width="16" height="16" /></a></td>

                    */
                    ?>

                    <td>
                        <a href="changer_client.php?id_bl=<?php echo $id_bl; ?>"><img src="../design/pics/man.png"
                                                                                      width="16" height="16"
                                                                                      alt="Modifier"
                                                                                      longdesc="modifier"/></a>
                    </td>
                    <td>
                        <?php //if ($montant_ht == 0 && mysqli_num_rows($req_versement_bl) == 0)
                                {
                            //header("location:delete_bl.php?id_bl=" . $id_bl);
                            ?>
                            <a href="delete_bl.php?id_bl=<?php echo $id_bl; ?>&back=voir_tout_bl_historique">
                                <img src="design/pics/delete.png" width="16" height="16"/>


                            </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php
            }

            ?>
        </TABLE>
        <?php
    } else {
        ?>
        <center>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p style="color: #CCC; font-size: 24px;">Aucun Bon de livraison n'a été fait </p>
        </center>

        <?php

    }

    ?>

    <script type="text/javascript" src="design/jquery.js"></script>

    <script type="text/javascript">
        var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {
            imgDown: "design/SpryAssets/SpryMenuBarDownHover.gif",
            imgRight: "design/SpryAssets/SpryMenuBarRightHover.gif"
        });
    </script>
    </center>
</div>
<?php
}
else
    header("Location:../login.php");

?>
</body>
</html>