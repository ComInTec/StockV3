<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="../assets/images/favicon.ico">

    <title>Neon | Data Tables</title>

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



<body class="page-body" data-url="http://neon.dev">



<?php
include("../global.php");

session_start();
if(isset($_SESSION['username']))
{
////////////////////////////////////////////////////////////

function total_dette_client($type,$link)
{
    $result = 0;

    $sql = "
SELECT COALESCE( SUM( dette ) , 0 ) AS total_dette_client
FROM (

SELECT list.ref_client, (
list.total_bl + list.premiere_dette + list.total_remise - list.total_versement
) AS dette
FROM (

SELECT clients.ref_client, clients.Societe, clients.dette AS premiere_dette, (

SELECT COALESCE( SUM( bl.montant_remise ) , 0 ) AS rem
FROM bl
WHERE bl.ref_client = clients.ref_client
) AS total_remise, (

SELECT COALESCE( SUM( bl.montant_ht ) , 0 ) AS total_bl
FROM bl
WHERE bl.ref_client = clients.ref_client
) AS total_bl, (

SELECT COALESCE( SUM( reglement.montant ) , 0 ) AS total_versement
FROM bl, reglement
WHERE bl.id_bl = reglement.id_bl
AND bl.ref_client = clients.ref_client
) AS total_versement
FROM clients
) AS list

";
    if ($type==="credit")
        $sql = $sql."
having dette <0";

    else
        if ($type==="dette")
            $sql = $sql."
having dette > 0";

        else
            if ($type==="0")
                $sql = $sql."
having dette = 0";

            else
                if ($type==="tous")
                    $sql = $sql."
 ";





    $sql  = $sql."
) AS tab

 
 
";



    $req = mysqli_query($link,$sql) or die (mysqli_error($link));

    if( mysqli_num_rows($req))
    {
        while($row_req =mysqli_fetch_array($req))
        {
            $result = $row_req["total_dette_client"];
        }
    }
    return $result ;
}
////////////////////////////////////////////////////////////










?>






<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="index.php">
                        <img src="../assets/images/logo@2x.png" width="120" alt="" />
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
                    <a href="../index.php">
                        <i class="entypo-gauge"></i>
                        <span class="title">Acceuil</span>
                    </a>

                </li>
                <li class="has-sub">
                    <a href="layout-api.html">
                        <i class="entypo-layout"></i>
                        <span class="title">Client</span>
                    </a>
                    <ul>
                        <li>
                            <a href="../clients/liste_client.php">
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
                            <a href="tableau_dette.php">
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
                                <i class="entypo-attach"></i>
                                <span class="title">Journal des Achats</span>
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
                            <a href="../fournisseurs/liste_fournisseur.php">
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

                        </li>















                    </ul>
                </li>


            </ul>

        </div>

    </div>

    <div class="main-content">



        <hr />

        <ol class="breadcrumb bc-3" >
            <li>
                <a href="index.php"><i class="fa-home"></i>Acceuil</a>
            </li>
            <li>

                <a href="">Clients</a>
            </li>
            <li class="active">

                <strong>Dette</strong>
            </li>
        </ol>



        <br />





        <br />

        <?php

        $type="dette";
        if (isset ($_GET["type"]))
        {
            $type=$_GET["type"];
        }


        $req=mysqli_query($link,"      

SELECT
 clients.ref_client, 
 clients.Societe, 
 clients.dette, 
 ( SELECT 	COALESCE(SUM(bl.montant_remise ),0) AS rem       		 FROM bl WHERE bl.ref_client = clients.ref_client ) AS total_remise ,
 ( select 	COALESCE(SUM(bl.montant_ht     ),0) as total_bl  		 from bl where bl.ref_client = clients.ref_client ) as total_bl ,
 ( select  	COALESCE(SUM(reglement.montant ),0) as total_versement   from bl,reglement where bl.id_bl = reglement.id_bl and bl.ref_client = 		clients.ref_client ) as total_versement
 FROM clients 
 
ORDER BY  `clients`.`ref_client` ASC


") or die (mysqli_error($link));
        if (mysqli_num_rows($req))
        {


        ?>

        <form  action="" method="GET" class="form-horizontal form-groups-bordered">

            <div class="form-group">
                <label class="col-sm-3 control-label">Choisir une option :</label>

                <div class="col-sm-5">
            <select name="type" class="select2" data-allow-clear="true" data-placeholder="type de dette...">
                <option  value="tous" <?php
                if ($type=="tous")
                {
                ?>Selected <?php
                }
                ?>>Tous les  Clients </option>
                <option   value="dette" <?php
                if ($type=="dette")
                {
                ?>selected <?php
                }
                ?>>Clients Avec Dettes </option>

                <option  value="credit"<?php
                if ($type=="credit")
                {
                ?>selected <?php
                }
                ?>>Clients Avec Crédits </option>
                <option value="0" <?php
                if ($type=="0")
                {
                ?>selected <?php
                }
                ?>>Clients réguliers  </option>
            </select>
<br/>

                    <button type="submit" class="btn btn-gold btn-success" value="ok" style=" width:100px">

                        Afficher
                    </button>
        </form>
    </div></div>



            <hr /><br />

            <?php
            $result = 0;
            while($row=mysqli_fetch_array($req))
            {
                $ref_client			=	$row[0];
                $client				=	$row[1] ;
                $dette 				= 	$row["dette"];
                $total_remise 		= 	$row['total_remise'];
                $total_bl 			=	$row["total_bl"];
                $total_versement	= 	$row ["total_versement"];
                $num 				=	$total_bl  + $dette - $total_versement  - $total_remise;

                if( ($num <0 && $type=="credit" )||($type=="tous" )|| ($num >0 && $type=="dette" )|| ($num ==0 && $type=="0" ))
                {

                    /*	if ($type!="tous")
                        $num =  abs($num);
                */

                    $numm= number_format($num, 2, ',', ' ');
                    if (!$result++)
                    {
                        ?>
                        <table class="table table-bordered table-striped datatable" id="table-2\">
                        <thead class="thead-dark">
                        <tr >
                            <th  width="60%" nowrap="nowrap">Nom  </th>
                            <th width="40%" nowrap="nowrap" class = "dette">Valeur ( DA )</th>
                        </tr></thead>
                    <?php }?>
                    <tr>
                        <td nowrap="nowrap" id="dette_left" style = "padding: 15px; text-align: left;">
                            <?php
                            echo "".$client ;
                            ?>
                        </td>
                        <td align="Right" nowrap="nowrap" style="padding: 15px;  text-align: right;<?php
                        if ($num >0){
                            ?>color:#FF0000;<?php
                        }else if ($num !=0)
                        {
                            ?>color:#33FF00 ;
                            <?php
                        }
                        ?>"><?php
                            echo $numm;
                            ?></td>
                    </tr>
                    <?php
                }

            }if (!$result)
            echo " <br> Aucun client !!...</tr>";




            ?>
            </TABLE>
            <?php



            ?>
            <br />


            <hr />

            <center><div class="alert alert-success"><strong>Total Dette</strong> :
                    <?php

                    $total =   total_dette_client($type,$link);
                    $total =   number_format($total, 0, ',', ' ');

                    echo $total ." ";?></div>
            </center>
            <?php
        }else
        {
            ?>
            <center>

                <p>Aucun Client n'existe encore , Voulez vous <a href="cree-client.php" style="text-decoration: none; color: #0F0;">Crééer un</a> ? </p>
            </center>
        <?php	}
        ?>
        <!-- end .content -->

    <?php
    }else

        header("Location:../login.php");

    ?>

























        <br />




        <br />
        <br />



        <br />





        <br />






        <br />
        <!-- Footer -->
        <footer class="main">

            &copy; 2019 <strong>ComInTec</strong>  <a href="http://laborator.co" target="_blank">Bureau de consulting et formation en Informatique</a>

        </footer>
    </div>





    <!-- Chat Histories -->





    <!-- Chat Histories -->



</div>





<!-- Imported styles on this page -->
<link rel="stylesheet" href="../assets/js/datatables/datatables.css">
<link rel="stylesheet" href="../assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="../assets/js/select2/select2.css">

<!-- Bottom scripts (common) -->
<script src="../assets/js/gsap/TweenMax.min.js"></script>
<script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/joinable.js"></script>
<script src="../assets/js/resizeable.js"></script>
<script src="../assets/js/neon-api.js"></script>


<!-- Imported scripts on this page -->
<script src="../assets/js/datatables/datatables.js"></script>
<script src="../assets/js/select2/select2.min.js"></script>
<script src="../assets/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="../assets/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="../assets/js/neon-demo.js"></script>

</body>
</html>