<!DOCTYPE html>

<?php
include("global.php");
$date= date("d/m/Y");

//session_start();


//if(isset($_SESSION['username']))
// 
?>

<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="assets/images/favicon.ico">

    <title>Gestion Commerciale</title>

    <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/neon-core.css">
    <link rel="stylesheet" href="assets/css/neon-theme.css">
    <link rel="stylesheet" href="assets/css/neon-forms.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <script src="assets/js/jquery-1.11.3.min.js"></script>

    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

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
                    <a href="">
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
                    <a href="">
                        <i class="entypo-home"></i>
                        <span class="title">Acceuil</span>
                    </a>

                </li>
                <li class="has-sub">
                    <a href="">
                        <i class="entypo-users"></i>
                        <span class="title">Clients</span>
                    </a>
                    <ul>
                        <li>
                            <a href="clients/liste_client.php">
                                <span class="title">Liste des Clients</span>
                            </a>
                        </li>









                        <li>
                            <a href="bl/tableau_dette.php">
                                <i class="entypo-list"></i>
                                <span class="title">Dettes</span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="has-sub">
                    <a href="">
                        <i class="entypo-paypal"></i>
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
                        <i class="glyphicon glyphicon-xbt"></i>
                        <span class="title">Achats</span>

                    </a>
                    <ul>
                        <li>
                            <a href="achat/bonCommande.php">
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
                            <a href="facture_achat/facture_achat.php">
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
                            <a href="facture_achat/journalAchat.php">
                                <i class="entypo-attach"></i>
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
                        <i class="entypo-user"></i>
                        <span class="title">Fournisseurs</span>
                    </a>
                    <ul>
                        <li>
                            <a href="fournisseurs/liste_fournisseur.php">
                                <span class="title">Liste des Fournisseurs</span>
                            </a>
                        </li>




                    </ul>
                </li>
                <li class="has-sub">
                    <a href="articles/produit.php">
                        <i class="glyphicon glyphicon-qrcode"></i>
                        <span class="title">Articles</span>
                    </a>
                    <ul>
                        <li>
                            <a href="articles/categorie.php">
                                <span class="title">Catégorie</span>
                            </a>
                        </li>
                        <li>
                            <a href="articles/marque.php">
                                <span class="title">Marque</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Emplacement</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="title">Attributs</span>
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



                <li class="active opened active has-sub">
                    <a href="company/index.php">
                        <i class="entypo-info"></i>
                        <span class="title">Informations Entreprise</span>
                    </a>

                </li>

                <li class="active opened active has-sub">
                    <a href="">
                        <i class="glyphicon glyphicon-lock"></i>
                        <span class="title">Coffre</span>
                    </a>

                </li>

                <li class="active opened active has-sub">
                    <a href="">
                        <i class="entypo-info"></i>
                        <span class="title">Charges</span>
                    </a>

                </li>

                <li class="active opened active has-sub">
                    <a href="">
                        <i class="entypo-info"></i>
                        <span class="title">Utilisateurs</span>
                    </a>

                </li>
                <li class="active opened active has-sub">
                    <a href="">
                        <i class="entypo-info"></i>
                        <span class="title">Deconnection</span>
                    </a>

                </li>

            </ul>

        </div>

    </div>

    <div class="main-content">



        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                <?php  echo ("<h1>Aujourd'hui  : $date </h1> ")   ?>
                    <h3>Bienvenu <strong>Starlight</strong></h3>
                </div>
            </div>
        </div>

        <hr />

        <script type="text/javascript">
            jQuery(document).ready(function($)
            {
                // Sample Toastr Notification
                setTimeout(function()
                {
                    var opts = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
                        "toastClass": "black",
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    toastr.success("You have been awarded with 1 year free subscription. Enjoy it!", "Account Subcription Updated", opts);
                }, 3000);

                // Sparkline Charts
                $(".top-apps").sparkline('html', {
                    type: 'line',
                    width: '50px',
                    height: '15px',
                    lineColor: '#FFD700',
                    fillColor: '',
                    lineWidth: 2,
                    spotColor: '#a9282a',
                    minSpotColor: '#a9282a',
                    maxSpotColor: '#a9282a',
                    highlightSpotColor: '#a9282a',
                    highlightLineColor: '#f4c3c4',
                    spotRadius: 2,
                    drawNormalOnTop: true
                });

                $(".monthly-sales").sparkline([1,5,6,7,10,12,16,11,9,8.9,8.7,7,8,7,6,5.6,5,7,5,4,5,6,7,8,6,7,6,3,2], {
                    type: 'bar',
                    barColor: '#FFD700',
                    height: '55px',
                    width: '100%',
                    barWidth: 8,
                    barSpacing: 1
                });

                $(".pie-chart").sparkline([2.5,3,2], {
                    type: 'pie',
                    width: '95',
                    height: '95',
                    sliceColors: ['#ff4e50','#db3739','#a9282a']
                });


                $(".daily-visitors").sparkline([1,5,5.5,5.4,5.8,6,8,9,13,12,10,11.5,9,8,5,8,9], {
                    type: 'line',
                    width: '100%',
                    height: '55',
                    lineColor: '#000000',
                    fillColor: '#FFD700',
                    lineWidth: 2,
                    spotColor: '#a9282a',
                    minSpotColor: '#a9282a',
                    maxSpotColor: '#a9282a',
                    highlightSpotColor: '#a9282a',
                    highlightLineColor: '#f4c3c4',
                    spotRadius: 2,
                    drawNormalOnTop: true
                });


                $(".stock-market").sparkline([1,5,6,7,10,12,16,11,9,8.9,8.7,7,8,7,6,5.6,5,7,5], {
                    type: 'line',
                    width: '100%',
                    height: '55',
                    lineColor: '#FFD700',
                    fillColor: '',
                    lineWidth: 2,
                    spotColor: '#a9282a',
                    minSpotColor: '#a9282a',
                    maxSpotColor: '#a9282a',
                    highlightSpotColor: '#a9282a',
                    highlightLineColor: '#f4c3c4',
                    spotRadius: 2,
                    drawNormalOnTop: true
                });


                $("#calendar").fullCalendar({
                    header: {
                        left: '',
                        right: '',
                    },

                    firstDay: 1,
                    height: 200,
                });
            });


            function getRandomInt(min, max)
            {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }
        </script>


        <?php

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




        ?>


        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="tile-stats tile-white stat-tile">
                    <h3>Stock</h3>
                    <p>Monthly visitor statistics</p>
                    <span class="daily-visitors"></span>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="tile-stats tile-white stat-tile">
                    <h3>Ventes</h3>
                    <?php echo("<span style=\"color:#33FF00\">".$total_ventes ); ?>
                    <span class="monthly-sales"></span>
                </div>
            </div>


            <div class="col-md-3 col-sm-6">
                <div class="tile-stats tile-white stat-tile">

                    <h3>Versement</h3>
                    <?php echo("<span style=\"color:#33FF00\">".$total_versement ) ;?>
                    <span class="stock-market"></span>
                </div>
            </div>


            <div class="col-md-3 col-sm-6">
                <div class="tile-stats tile-white stat-tile">
                    <h3>Nombre Clients</h3>
                    <p>US Dollar Share</p>
                    <span class="pie-chart"></span>
                </div>
            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-md-9">

                <script type="text/javascript">
                    jQuery(document).ready(function($)
                    {
                        var map = $("#map-2");

                        map.vectorMap({
                            map: 'europe_merc_en',
                            zoomMin: '3',
                            backgroundColor: '#f4f4f4',
                            focusOn: { x: 0.5, y: 0.7, scale: 3 },
                            markers: [
                                {latLng: [50.942, 6.972], name: 'Cologne'},
                                {latLng: [42.6683, 21.164], name: 'Prishtina'},
                                {latLng: [41.3861, 2.173], name: 'Barcelona'},
                            ],
                            markerStyle: {
                                initial: {
                                    fill: '#ff4e50',
                                    stroke: '#ff4e50',
                                    "stroke-width": 6,
                                    "stroke-opacity": 0.3,
                                }
                            },
                            regionStyle:
                                {
                                    initial: {
                                        fill: '#e9e9e9',
                                        "fill-opacity": 1,
                                        stroke: 'none',
                                        "stroke-width": 0,
                                        "stroke-opacity": 1
                                    },
                                    hover: {
                                        "fill-opacity": 0.8
                                    },
                                    selected: {
                                        fill: 'yellow'
                                    },
                                    selectedHover: {
                                    }
                                }
                        });
                    });
                </script>

                <div class="tile-group tile-group-2">
                    <div class="tile-left tile-white">
                        <div class="tile-entry">
                            <h3>Visitor Map</h3>
                            <span>Where do our visitors come from</span>
                        </div>
                        <ul class="country-list">
                            <li><span class="badge badge-secondary">3</span>  Cologne, Germany</li>
                            <li><span class="badge badge-secondary">2</span>  Pristina, Kosovo</li>
                            <li><span class="badge badge-secondary">1</span>  Barcelona, Spain</li>
                        </ul>
                    </div>

                    <div class="tile-right">

                        <div id="map-2" class="map"></div>

                    </div>

                </div>

            </div>



            <div class="col-md-3">
                <div class="tile-stats tile-neon-red">
                    <div class="icon"><i class="entypo-chat"></i></div>
                    <div class="num" data-start="0" data-end="124" data-postfix="" data-duration="1400" data-delay="0">0</div>

                    <h3>Comments</h3>
                    <p>New comments today</p>
                </div>

                <br />

                <div class="tile-stats tile-primary">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="213" data-postfix="" data-duration="1400" data-delay="0">0</div>

                    <h3>New Followers</h3>
                    <p>Statistics this week</p>
                </div>


            </div>
        </div>

        <br />

        <div class="row">
            <div class="col-sm-8">
                <div class="panel panel-primary panel-table">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>Top Grossing</h3>
                            <span>Weekly statistics from AppStore</span>
                        </div>

                        <div class="panel-options">
                            <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive no-margin">
                            <thead>
                            <tr>
                                <th>App Name</th>
                                <th>Download</th>
                                <th class="text-center">Graph</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Flappy Bird</td>
                                <td>2,215,215</td>
                                <td class="text-center"><span class="top-apps">4,3,5,4,5,6,3,2,5,3</span></td>
                            </tr>

                            <tr>
                                <td>Angry Birds</td>
                                <td>1,001,001</td>
                                <td class="text-center"><span class="top-apps">3,2,5,4,3,6,7,5,7,9</span></td>
                            </tr>

                            <tr>
                                <td>Asphalt 8</td>
                                <td>998,003</td>
                                <td class="text-center"><span class="top-apps">1,3,4,3,5,4,3,6,9,8</span></td>
                            </tr>


                            <tr>
                                <td>Viber</td>
                                <td>512,015</td>
                                <td class="text-center"><span class="top-apps">9,2,5,7,2,4,6,7,2,6</span></td>
                            </tr>


                            <tr>
                                <td>Whatsapp</td>
                                <td>504,135</td>
                                <td class="text-center"><span class="top-apps">1,4,5,4,4,3,2,5,4,3</span></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="panel panel-primary panel-table">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>Events</h3>
                            <span>This month's event calendar</span>
                        </div>

                        <div class="panel-options">
                            <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="calendar" class="calendar-widget">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="main">

            &copy; 2019 <strong>ComInTec</strong> Bureau de consulting et formation en Informatiue <a href="" target="_blank"> ComInTec</a>

        </footer>
    </div>


















<?php

}else
	

?>


<!-- Imported styles on this page -->
<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

<!-- Bottom scripts (common) -->
<script src="assets/js/gsap/TweenMax.min.js"></script>
<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/neon-api.js"></script>
<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


<!-- Imported scripts on this page -->
<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="assets/js/jquery.sparkline.min.js"></script>
<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="assets/js/rickshaw/rickshaw.min.js"></script>
<script src="assets/js/raphael-min.js"></script>
<script src="assets/js/morris.min.js"></script>
<script src="assets/js/toastr.js"></script>
<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="assets/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="assets/js/neon-demo.js"></script>

</body>
</html>