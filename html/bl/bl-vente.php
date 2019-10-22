<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Logiciel De Stock - Fiche de vente</title>

    <script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>
    <script src="design/spryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>
    <script src="Scripts/swfobject_modified.js" type="text/javascript"></script>


    <script src="media/js/jquery.js" type="text/javascript">
    </script>
    <script src="media/js/jquery.dataTables.js" type="text/javascript">
    </script>
    <style type="text/css">
        @import "media/css/demo_table.css";
    </style>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            $('#dataTables').dataTable(
                {
                    "bPaginate": false,

                    "aLengthMenu": [
                        [1, 2, -1],
                        [1, 2, "All"]
                    ],
                    "oLanguage": {

                        "sLengthMenu": "Afficher _MENU_ Lignes par page",
                        "sZeroRecords": "aucun resultat touvée !! ",
                        "sInfo": "Affichage  _START_ Vers  _END_ de _TOTAL_ lignes",
                        "sInfoEmpty": "Affichage de 0 vers 0 de 0 lignes",
                        "sInfoFiltered": "(filtré du _MAX_ total des lignes)"
                    },

                }
            );
        });
    </script>


    <link href="design/spryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css"/>
    <link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css"/>
</head>


<body style="background-attachment: fixed; background-position: center center; background-repeat:repeat; background-image: url(design/pics/Nuages01.jpg);">

<div class="container">
    <center>

        <div class="header" id="header">

        </div>

    </center>


    <div class="sidebar1">
        <?php
        session_start();
        ?>
        <center>
            <div id="menu">
                <ul id="MenuBar1" class="MenuBarHorizontal">
                    <li>
                        <a href="../" class="MenuBarItemSubmenu">Acceuil</a>
                    </li>
                </ul>
            </div>
        </center>
    </div>

    <div class="content">


        <?php
        $ref;
        $id_bl;
        $date;
        if (isset($_SESSION['username'])) {
            include '../global.php';
            $ref_client = "";
            $montant_ht;
            if (isset($_GET["id_bl"]))

                $id_bl = $_GET["id_bl"];
            $req = mysqli_query($link, "select * from bl,clients where bl.ref_client =  clients.ref_client and bl.id_bl = '$id_bl' ");
            $client = "";
            $adresse = "";
            while ($row = mysqli_fetch_array($req)) {
                $client = $row['Societe'];
                $adresse = $row['adresse_activite'];
            }
            $id_article;
            $id_bl;

            if (isset($_GET["id_bl"]))

                $id_bl = $_GET["id_bl"];

            $req = mysqli_query($link, "SELECT * FROM bl WHERE id_bl = '" . $id_bl . "'") or die (mysqli_error($link));
            if (mysqli_num_rows($req)) {
                while ($row = mysqli_fetch_array($req)) {
                    $date = $row["date"];
                }
            }
            ?>


            <div class="total">
                <?php
                $req = mysqli_query($link, " SELECT * FROM bl WHERE id_bl = '" . $id_bl . "'");
                if (mysqli_num_rows($req)) {
                    while ($row = mysqli_fetch_array($req)) {
                        $req2 = mysqli_query($link, " SELECT * FROM clients WHERE ref_client = '" . $ref_client . "'");
                        $dette;
                        if (mysqli_num_rows($req2)) {
                            while ($row2 = mysqli_fetch_array($req2)) {

                            }
                        } ?>
                        <table border="2" align="center" cellpadding="5" cellspacing="5" class="total_bl_table">


                            <tr>
                                <td nowrap="nowrap"><span class="total_bl_td2">Total :</span></td>
                            </tr>
                            <tr>
                                <td>


                    <span class="total_bl_td">
                    <?php

                    $sql = mysqli_query($link, "SELECT coalesce(SUM( Montant ),0) AS somme FROM  detail_bl WHERE  id_bl = '" . $id_bl . "'");
                    $total_bl = 0;
                    $total_bl_ht = 0;
                    if (mysqli_num_rows($sql)) {
                        while ($r = mysqli_fetch_array($sql)) {
                            $total_bl_ht = $r['somme'];
                        }
                    }
                    $query = "UPDATE bl SET montant_ht = $total_bl_ht WHERE id_bl = $id_bl;";
                    $sql33 = mysqli_query($link, $query) or die(mysqli_error($link));
                    echo(number_format($row['montant_ht'], 2, '.', ' '));
                    ?>
                </span></td>
                            </tr>
                        </table>
                        <?php
                    }
                }
                ?>
            </div>

            <hr/>
            <br/>
            <div class="input_fiche">


                <?php

                $req2 = mysqli_query($link, " SELECT * FROM bl WHERE id_bl = '" . $id_bl . "'");

                if (mysqli_num_rows($req2)) {
                    while ($row2 = mysqli_fetch_array($req2)) {

                        $montant_ht = $row2['montant_ht'];

                    }
                }
                ?>


                <ul type="square" class="MenuBarVertical" id="Actions">

                    <li><a href="confirm-bl.php?id_bl=<?php echo('' . $id_bl); ?> ">Valider</a></li>
                    <li><a href="#" class="MenuBarItemSubmenu">Actions</a>
                        <ul>
                            <li>
                                <a onclick="if(confirm('Etes vous sûr de vouloir supprimer cet Ligne ?')) document.location='delete-article.php?id_bl=<?php echo("" . $id_bl); ?>&id_detail=ALL';"
                                   href="#">Supprimer Tous <img src="design/pics/delete.png" width="16" height="16"
                                                                alt="Supprimer cet ligne"/></a></li>
                            <li><a href="import_bl.php?id_bl=<?php echo('' . $id_bl); ?> ">Importer BL Depuis Excel</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

            <hr/>
            <br/>
            <center>
                <div id="resultat">
                    <table>
                        <tr>

                            <form action="search2.php" method="GET">
                                <?php
                                if (isset($_GET["tri"])) {
                                    ?>
                                    Reference / code bar :
                                    <input type="hidden" name="tri" value="<?php echo("" . $_GET["tri"]); ?>"/>
                                    <?php
                                }
                                ?> <input type="hidden" name="id_bl" value="<?php echo("" . $id_bl); ?>"/>

                                <?php

                                if (isset($_GET["tri"])) {
                                    if ($_GET["tri"] === "montant1")
                                        $tri = "`detail_bl`.`Montant` ASC";
                                    if ($_GET["tri"] === "montant2")
                                        $tri = "`detail_bl`.`Montant` DESC";


                                } else
                                    $tri = "id_detail DESC ";

                                $req44 = mysqli_query($link, "select * from detail_bl where id_bl = '" . $id_bl . "' ORDER BY $tri") or die(mysqli_error($link));
                                //ORDER BY   id_detail DESC );
                                $numm = mysqli_num_rows($req44);

                                $ooo = 0;
                                if (isset ($_GET["change_add"])) {
                                    if ($_GET["change_add"] == "1") {
                                        $ooo = 1;
                                    } else {
                                        $ooo = 0;
                                    }

                                }

                                ?>
                                <input type="hidden" name="change_add" value="<?php echo $ooo; ?>"/>

                                <td align="center">
                                    <input placeholder="Reference/Code Bar"
                                           name="inser_produit" type="text" class="input-current-add2"
                                           id="inser_produit"
                                           value="<?php
                                           if (isset($_GET["reference"])) {
                                               $req1 = mysqli_query($link, "SELECT * FROM articles WHERE reference = '" . $_GET["reference"] . "' ");
                                               while ($row3 = mysqli_fetch_array($req1)) {
                                                   $id_article = $row3['id_article'];
                                                   echo("" . $_GET["reference"]);
                                               }
                                           } ?>"
                                        <?php if (!isset($_GET["reference"])) { ?> autofocus="autofocus" <?php } ?> />
                                </td>

                                <td>
                                    <div id="result_req">

                                    </div>
                                </td>
                                <td><input placeholder="Quantité" type="text" class="input-current-add" id="qt_produit"
                                           name="qt_produit" <?php
                                    if (isset($_GET['qt'])) {
                                        ?>
                                        value="
<?php
                                        echo("" . $_GET['qt']);

                                        ?>
" <?php

                                        ?>

                                        autofocus="autofocus"<?php
                                    }
                                    ?>/>

                                </td>

                                <td>
                                </td>
                                <td><input placeholder="Prix" class="input-current-add" type="text" name="prix_produit"
                                           <?php
                                           if (isset($_GET['prix_produit']))
                                           {
                                           ?>value="<?php if (isset($_GET['remise_produit']))
                                               $price = ($_GET['prix_produit'] / $_GET['qt']) + $_GET['remise_produit'];
                                           else
                                               $price = $_GET['prix_produit'] / $_GET['qt'];
                                           echo("" . $price);

                                           ?>"<?php
                                    }
                                    ?>/>
                                </td>
                                <td align="center">
                                    <input placeholder="Remise (en DA)" class="input-current-add" type="text"
                                           name="Remise_produit" <?php
                                    if (isset($_GET['remise_produit'])) {
                                        ?>
                                        value = "<?php

                                        echo("" . $_GET['remise_produit']);
                                        ?>
"<?php

                                    }
                                    ?>/>
                                </td>
                                <td>
                                </td>
                                <td><input type="submit" name="submit" ID="btn2" value="Ajouter"/>
                                </td>
                                <td>&nbsp;</td>

                            </form>
                        </tr>

                    </table>

                    <hr/>
                    <br/>
                    <table class="display" id="dataTables" width="95%" border="2" cellpadding="5" cellspacing="5">

                        <thead>
                        <tr>


                            <th height="61" nowrap="nowrap" class="tdtd2" <?php
                            $ooo = 0;
                            if (isset ($_GET["change_add"])) {
                                ?>  style="color:

                                <?php

                                if ($_GET["change_add"] == "1") {
                                    $ooo = 1;
                                    ?> #93F
                                    <?php
                                } else {
                                    $ooo = 0;
                                    ?>
                                        #F60
                                    <?php
                                }
                                ?>
                                        "
                                <?php
                            }
                            ?>
                            >
                                N ° :
                                <hr/>
                                <?php

                                echo($numm . " lignes");
                                ?>
                            </th>
                            <th nowrap="nowrap" class="tdtd2">
                                <center>
                                    Reference
                                    <hr/>
                                    Code Barre
                                </center>
                            </th>
                            <th nowrap="nowrap" class="tdtd2" style="width: 25%;">
                                Designation
                            </th>
                            <th nowrap="nowrap" class="tdtd2">
                                Quantite
                                <hr/>
                                <?php
                                //echo("Total : ");
                                $reqqt = mysqli_query($link, "select COALESCE(SUM(quantite),0) AS quant from detail_bl where id_bl = '$id_bl'") or die(mysqli_error($link));
                                $row1 = mysqli_fetch_array($reqqt);
                                $qt = $row1['quant'];
                                echo("" . $qt . " unité(s)");
                                ?> </th>
                            <th nowrap="nowrap" class="tdtd2">
                                Reste
                            </th>
                            <th class="tdtd2">
                                P.U
                                <hr/>
                                Brut
                            </th>
                            <th nowrap="nowrap" class="tdtd2">
                                Remise
                                <hr/>
                                ( en DA )
                            </th>
                            <th nowrap="nowrap" class="tdtd2">
                                P.U
                                <hr/>
                                Net
                            </th>
                            <th nowrap="nowrap" class="tdtd2">
                                Montant
                            </th>
                            <th nowrap="nowrap" class="tdtd2">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            if ($numm)
                            {
                            $ii = 0;
                            while ($result2 = mysqli_fetch_array($req44))
                            {
                            $req = mysqli_query($link, "SELECT * FROM articles WHERE id_article = '" . $result2['id_article'] . "' ");

                            while ($result = mysqli_fetch_array($req))
                            {
                            ?>
                            <td width="70PX" align="center" <?php
                            echo $result2['id_detail']; ?>" class="tdtd2"><span id="<?php
                            echo $result2['id_detail']; ?>"><?php
                                $ii = $ii + 1;
                                echo("" . $ii);
                                ?></span> </td>
                            <td class="tdtd2" width="70PX" style=" font-size: 14px;  <?php
                            $req_ref_double = mysqli_query($link, "SELECT  `id_article` , `id_bl` FROM `detail_bl`  where `id_article` = '" . $result2['id_article'] . "'  and id_bl = '$id_bl' ") or die (mysqli_error($link));
                            if (mysqli_num_rows($req_ref_double) > 1) {
                                ?>
                                    background-color:#309; color:#CCFF00;
                                <?php
                            }
                            ?>
                                    ">
                                <?php
                                echo("" . $result['reference']);
                                $reference = $result['reference']
                                ?>
                            </td>

                            <td style=" font-size: 16px;">
                                <?php
                                echo("" . $result['designation']);
                                ?>
                            </td>
                            <td align="center" style="font-size: 16px;">
                                <?php
                                echo("" . $result2['quantite']);
                                ?>
                            </td>
                            <td align="center" style="color: #33F; font-size: 16px;">  <?php
                                $id_art = $result['id_article'];
                                $quant_en_Stock = 0;
                                $quant_vendu = 0;
                                $quantite_total = 0;

                                $req_facture_achat = mysqli_query($link, "SELECT COALESCE(SUM(qtt),0) AS quant_en_Stock
FROM  detail_fachat 
WHERE  id_article = '$id_art'") or die (mysqli_error($link));

                                $prix2 = 0;
                                $requetqt = mysqli_query($link, "SELECT COALESCE(SUM(quantite),0) AS quant_en_Stock
FROM  detail_bl 
WHERE  id_article = '$id_art'") or die (mysqli_error($link));
                                $row2 = mysqli_fetch_array($requetqt);
                                $quant_vendu = $row2['quant_en_Stock'];
                                $row_facture_achat = mysqli_fetch_array($req_facture_achat);
                                $quantite_total = $row_facture_achat['quant_en_Stock'];
                                $quant_reste = $quantite_total - $quant_vendu;
                                ?>
                                <a class="linkcolor" href="acheteurs_article_bl.php?id_article=<?php
                                echo($id_art);
                                ?>">
                                    <?php
                                    echo("$quant_reste");
                                    ?>
                                </a></td>
                            <td width="70PX" align="center" style=" font-size: 16px;">
                                <?php
                                //	if (isset($_GET["prix_produit"]))
                                //{
                                if ($result2['prix'] != 0)
//$prix2 = $_GET["prix_produit"];
//}
//else 
                                    $prix2 = $result2['prix'];
                                // else
                                // $prix2 = $result['Prix_HT'];
                                echo("" . $prix2);
                                ?>
                            </td>
                            <td width="90PX" align="center" style=" font-size: 16px;">
                                <?php
                                //$result[4]+$result[4]*0.17;
                                echo("" . $result2['Remise'] . "");

                                ?>
                            </td>
                            <td width="90PX" align="center" style=" font-size: 16px;">
                                <?php
                                $prix = $prix2 - $result2['Remise'];
                                echo("" . $prix);
                                ?>
                            </td>
                            <td width="90PX" align="center" style="font-size: 18px; font-weight: bold;">
                                <?php
                                //$result[4]+$result[4]*0.17;
                                $total = $result2['quantite'] * $prix;

                                echo("" . $total . "");
                                ?>
                            </td>
                            <td align="center" valign="middle"><a
                                        href="change_article.php?id_bl=<?php echo("" . $id_bl); ?>&qt=<?php echo("" . $result2['quantite']); ?>&id_detail=<?php echo $result2['id_detail']; ?>&reference=<?php echo($reference); ?>&prix_produit=<?php echo("" . $result2['Montant']); ?>&remise_produit=<?php echo("" . $result2['Remise']); ?>"><img
                                            src="design/pics/modifier.png" width="16" height="16" alt="Modifier"
                                            longdesc="mofifier cet ligne de commande"/></a>
                                <?php
                                echo("  ");

                                ?>
                                <hr/>
                                <a onclick="if(confirm('Etes vous sûr de vouloir supprimer cet Ligne ?')) document.location='delete-article.php?id_bl=<?php echo("" . $id_bl); ?>&id_detail=<?php echo("" . $result2['id_detail']); ?>';"
                                   href="#"><img src="design/pics/delete.png" width="16" height="16"
                                                 alt="Supprimer cet ligne"/></a>

                                <?php

                                }
                                ?></td>
                        </tr>
                        <?php
                        }
                        }
                        $i = 0;
                        while ($i++ < 1)
                        {
                        ?>


                        </tbody> <?php

                        }

                        ?>

                    </table>

                </div>
            </center>

            <div id="confirmer_bl"></div>

            </center>

            <?php
        } else
            header("Location:../login.php");

        ?>
    </div>
    <!-- end .container -->
</div>


<script type="text/javascript">


    var MenuBar2 = new Spry.Widget.MenuBar("Actions", {imgRight: "SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</center>

</body>
</html>