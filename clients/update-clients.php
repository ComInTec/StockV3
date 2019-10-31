<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="assets/images/favicon.ico">

    <title>Gestion Commercial |Clients </title>

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



<body class="page-body" data-url="http://neon.dev">



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
                    <a href="../index.php">
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
                            <a href="layout-page-transition-fade.html">
                                <span class="title">Edition</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="layout-page-transition-fade.html">
                                        <span class="title">Nouveau</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="layout-page-transition-left-in.html">
                                        <span class="title">Modifier</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="layout-page-transition-right-in.html">
                                        <span class="title">Supprimer</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="layout-page-transition-fade-only.html">
                                        <span class="title">Imprimer</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="../bl/tableau_dette.php">
                                <span class="title">Dettes</span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="has-sub">
                    <a href="ui-panels.html">
                        <i class="entypo-newspaper"></i>
                        <span class="title">Ventes</span>
                    </a>
                    <ul>
                        <li>
                            <a href="ui-panels.html">
                                <span class="title">Bon de route</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui-panels.html">
                                <span class="title">Commande Client</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui-tiles.html">
                                <span class="title">Facture Client</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms-buttons.html">
                                <span class="title">Bon de livraison</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui-typography.html">
                                <span class="title">Journal des Commandes</span>
                            </a>
                        </li>

                        <li>
                            <a href="ui-typography.html">
                                <span class="title">Journal des Ventes</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="has-sub">
                    <a href="mailbox.html">
                        <i class="entypo-mail"></i>
                        <span class="title">Achats</span>

                    </a>
                    <ul>
                        <li>
                            <a href="mailbox.html">
                                <i class="entypo-inbox"></i>
                                <span class="title">Bon de Commande</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailbox-compose.html">
                                <i class="entypo-pencil"></i>
                                <span class="title">Bon de Réception</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailbox-message.html">
                                <i class="entypo-attach"></i>
                                <span class="title">Facture d'achat</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailbox-message.html">
                                <i class="entypo-attach"></i>
                                <span class="title">Journal des commandes</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailbox-message.html">
                                <i class="entypo-attach"></i>
                                <span class="title">Journal des Achats</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="has-sub">
                    <a href="forms-main.html">
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

                        <li>
                            <a href="forms-file-upload.html">
                                <span class="title">File Upload</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms-wysiwyg.html">
                                <span class="title">Editors</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="tables-main.html">
                        <i class="entypo-window"></i>
                        <span class="title">Articles</span>
                    </a>
                    <ul>
                        <li>
                            <a href="tables-main.html">
                                <span class="title">Catégorie</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">
                                <span class="title">Famille</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="extra-icons.html">
                        <i class="entypo-bag"></i>
                        <span class="title">Stock</span>
                        <span class="badge badge-info badge-roundless">New Items</span>
                    </a>
                    <ul>
                        <li class="has-sub">
                            <a href="extra-icons.html">
                                <span class="title">Stock par dépot</span>
                                <span class="badge badge-success">3</span>
                            </a>
                        </li>

                        <li>
                            <a href="extra-icons.html">
                                <span class="title">Bon d'entree</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-icons-entypo.html">
                                <span class="title">Bon de sortie</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-icons-glyphicons.html">
                                <span class="title">Bon de renvoi</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-icons-glyphicons.html">
                                <span class="title">Inventaire</span>
                            </a>
                        </li>

                        </li>






                        <li>
                            <a href="extra-login.html">
                                <span class="title">Login</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-register.html">
                                <span class="title">Register</span>
                            </a>
                        </li>









                        <li>
                            <a href="extra-settings.html">
                                <span class="title">Settings</span>
                            </a>
                        </li>




                        <li>
                            <a href="extra-nestable.html">
                                <span class="title">Nestable Lists</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-file-tree.html">
                                <span class="title">File Tree</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-load-progress.html">
                                <span class="title">Load Progress</span>
                            </a>
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

                <strong>Liste des Clients</strong>
            </li>
        </ol>

        <h2>Liste des clients</h2>

        <br />



        <?php
        session_start();


        if(isset($_SESSION['username']))
        {


        if (isset($_GET['ref_client'])&& isset($_GET['societe']) )
        {
            $ref_client=$_GET['ref_client'];
            $Societe=$_GET['societe'];
// $Societe_officielle=$_GET['societe_officielle'];
            $telephone=$_GET['telephone'];
// $fax=$_GET['fax'];
            $mobile=$_GET['mobile'];
// $email=$_GET['email'];
            $adresse=$_GET['adresse'];
// $num_registe=$_GET['num_registe'];
// $carte_fiscale=$_GET['carte_fiscale'];
// $num_art=$_GET['num_art'];
// $compte_bancaire=$_GET['compte'];
// $ccp=$_GET['ccp'];
            $dette=$_GET['dette'];
            if(isset($_GET['ville']))
                $ville= $_GET['ville'];

            if(isset($_GET['wilaya']))
                $wilaya=$_GET['wilaya'];


            include("../global.php");
            $requete="update clients
set  
Societe='".$Societe."',
 telephone_fix='".$telephone."', 

 T_Mobile='".$mobile."',

 adresse_activite='".$adresse."',

 wilaya='$wilaya',
 ville='$ville',

 dette='".$dette."'
where ref_client  = '".$ref_client."'";

            $resultat = mysqli_query($link,$requete) or die(mysqli_error($link));
            if($resultat)
            {
                echo "Modification faite avec succées";
            }
            else{
                echo "<center><span>La modification na pas été éffectuée</center>";


            }
        }else
            echo 'Nom du Client introuvable';

        ?>




        <br />




            <?php
        }
        else
           header("Location:../login.php");
        ?>






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
<link rel="stylesheet" href="assets/js/datatables/datatables.css">
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">

<!-- Bottom scripts (common) -->
<script src="assets/js/gsap/TweenMax.min.js"></script>
<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/neon-api.js"></script>


<!-- Imported scripts on this page -->
<script src="assets/js/datatables/datatables.js"></script>
<script src="assets/js/select2/select2.min.js"></script>
<script src="assets/js/neon-chat.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="assets/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="assets/js/neon-demo.js"></script>

</body>
</html>