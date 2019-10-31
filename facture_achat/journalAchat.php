<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="../assets/images/favicon.ico">

    <title>Gestion Commerciale</title>

    <link rel="stylesheet" href="../assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="../assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/neon-core.css">
    <link rel="stylesheet" href="../assets/css/neon-theme.css">
    <link rel="stylesheet" href="../assets/css/neon-forms.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <script src="../assets/js/jquery-1.11.3.min.js"></script>

    <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body  page-fade gray" data-url="http://neon.dev">




<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="index.php">
                        <img src="assets/images/logo@2x.png" width="120" alt="" />
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>


                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>


            <ul id="main-menu" class="main-menu">
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <li class="active opened active has-sub">
                    <a href="index.php">
                        <i class="entypo-gauge"></i>
                        <span class="title">Acceuil</span>
                    </a>

                </li>
                <li class="has-sub">
                    <a href="">
                        <i class="entypo-layout"></i>
                        <span class="title">Client</span>
                    </a>
                    <ul>
                        <li>
                            <a href="clients/liste_client.php">
                                <span class="title">Liste des Clients</span>
                            </a>
                        </li>







                        <li class="has-sub">
                            <a href="">
                                <span class="title">Edition</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="">
                                        <span class="title">Nouveau</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="title">Modifier</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="title">Supprimer</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="title">Imprimer</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="bl/tableau_dette.php">
                                <span class="title">Dettes</span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="has-sub">
                    <a href="">
                        <i class="entypo-newspaper"></i>
                        <span class="title">Ventes</span>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                                <span class="title">Bon de route</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Commande Client</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Facture Client</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Bon de livraison</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Journal des Commandes</span>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <span class="title">Journal des Ventes</span>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <span class="title">Gestion des Retours clients</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="has-sub">
                    <a href="">
                        <i class="entypo-mail"></i>
                        <span class="title">Achats</span>

                    </a>
                    <ul>
                        <li>
                            <a href="">
                                <i class="entypo-inbox"></i>
                                <span class="title">Bon de Commande</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="entypo-pencil"></i>
                                <span class="title">Bon de Réception</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="entypo-attach"></i>
                                <span class="title">Facture d'achat</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="entypo-attach"></i>
                                <span class="title">Journal des commandes</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="facture_achat/journalAchat.php"></i>
                                <span class="title">Journal des Achats</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="entypo-attach"></i>
                                <span class="title">Gestion des Retours</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="has-sub">
                    <a href="">
                        <i class="entypo-doc-text"></i>
                        <span class="title">Fournisseurs</span>
                    </a>
                    <ul>
                        <li>
                            <a href="fournisseurs/liste_fournisseur.php">
                                <span class="title">Liste des Fournisseurs</span>
                            </a>
                        </li>

                        <li class="has-sub">
                            <a href="">
                                <span class="title">Edition</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="">
                                        <span class="title">Nouveau</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="title">Modifier</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="title">Supprimer</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="title">Imprimer</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </li>
                <li class="has-sub">
                    <a href="">
                        <i class="entypo-window"></i>
                        <span class="title">Articles</span>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                                <span class="title">Catégorie</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Famille</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="">
                        <i class="entypo-bag"></i>
                        <span class="title">Stock</span>
                        <span class="badge badge-info badge-roundless">New Items</span>
                    </a>
                    <ul>
                        <li class="has-sub">
                            <a href="">
                                <span class="title">Stock par dépot</span>
                                <span class="badge badge-success">3</span>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <span class="title">Bon d'entree</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Bon de sortie</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Bon de renvoi</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Inventaire</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Mouvement des stocks</span>
                            </a>
                        </li>

                        </li>






                    </ul>
                </li>


            </ul>

        </div>

    </div>

    <div class="main-content">


<h2>Liste des Achats</h2>
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
                <table class="table table-bordered table-striped datatable" id="table-2">
                    <tr>
                        <th align="center">N °</th>
                        <th align="center">Date d'achat </th>
                        <th align="center">Fournisseur </th>
                        <th>Total Prix D'achat (DA)</th>
                        <th>Confirmation Prix Achat (DA)</th>
                        <th>Total Versement (DA)</th>
                        <th>Reste (DA) </th>
                        <th>Supprimer</th>
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
                            <td align="right">
                                <?php echo $row_req_factures_achats["Societe"]; ?>
                                <a
                                   href="facture_achat.php?id_fachat=<?php echo $row_req_factures_achats["id_fachat"]; ?>"
                                   class= "btn btn-info btn-sm btn-icon icon-left align=right "
                                > <i class="entypo-pencil"></i> Modifier
                                  </a>
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
                                ?>
                            </td>
                            <td align="right">
                                <?php
                                echo(number_format($bon_fournisseur, 2, '.', ' '));
                                ?>
                                <a
                                   href="total_bon_fournisseur.php?id_fachat=<?php echo $id_fachat; ?>" class= "btn btn-info btn-sm btn-icon icon-left align=right "

                                >

                                    <i class="entypo-pencil"></i> Modifier
                                </a>

                            </td>


                            <td align="right">

                                <?php

                                $total_versement = total_versement($id_fachat, $link);
                                //die("to".$total_versement);
                                echo(number_format($total_versement, 2, '.', ' ')); ?>
                                <a
                                   href="facture_achat_versement.php?id_fachat=<?php echo $id_fachat; ?>" class= "btn btn-info btn-sm btn-icon icon-left align=right ">

                                    <i class="entypo-pencil"></i> Modifier</a></td>

                            <td align="right"><?php

                                $rest = $bon_fournisseur - $total_versement;

                                $rest_total = $rest_total + $rest;
                                echo(number_format($rest, 2, '.', ' '));
                                ?>
                            </td>
                            <td align="right"><?php
                                if (delet_facture_achat($id_fachat,$link)) {
                                    ?><a class="btn btn-danger btn-sm btn-icon icon-left"
                                    onclick="if(confirm('Etes vous sûr de vouloir supprimer cet Ligne ?')) document.location='delete_facture_achat.php?id_fachat=<?php echo("" . $id_fachat); ?>';"
                                    href="#"><i class="entypo-cancel"></i>Supprimer</a>
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
                        <td>Total DETTES
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td style="background:darkred" align="right"><?php
                            $dette = total_dette($link);
                            $rest_total = $rest_total + $dette;
                            echo(number_format($rest_total, 2, '.', ' ')); ?>
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









        <br />


        <br />


        <!-- Footer -->
        <footer class="main">

            &copy; 2019 <strong>ComInTec</strong> Bureau de consulting et formation en Informatiue <a href="" target="_blank"> ComInTec</a>

        </footer>
    </div>




















    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="../assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../assets/js/rickshaw/rickshaw.min.css">

    <!-- Bottom scripts (common) -->
    <script src="../assets/js/gsap/TweenMax.min.js"></script>
    <script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/joinable.js"></script>
    <script src="../assets/js/resizeable.js"></script>
    <script src="../assets/js/neon-api.js"></script>
    <script src="../assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


    <!-- Imported scripts on this page -->
    <script src="../assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
    <script src="../assets/js/jquery.sparkline.min.js"></script>
    <script src="../assets/js/rickshaw/vendor/d3.v3.js"></script>
    <script src="../assets/js/rickshaw/rickshaw.min.js"></script>
    <script src="../assets/js/raphael-min.js"></script>
    <script src="../assets/js/morris.min.js"></script>
    <script src="../assets/js/toastr.js"></script>
    <script src="../assets/js/fullcalendar/fullcalendar.min.js"></script>
    <script src="../assets/js/neon-chat.js"></script>


    <!-- JavaScripts initializations and stuff -->
    <script src="../assets/js/neon-custom.js"></script>


    <!-- Demo Settings -->
    <script src="../assets/js/neon-demo.js"></script>

</body>
</html>