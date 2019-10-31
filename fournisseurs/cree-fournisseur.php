<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="assets/images/favicon.ico">

    <title>Neon | Data Tables</title>

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

<?php
session_start();


if(isset($_SESSION['username']))
{

?>


<?php
include("modele/global.php");
$ref='';
?>




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
                            <a href="../clients/liste_client.php">
                                <span class="title">Liste des Clients</span>
                            </a>
                        </li>









                        <li>
                            <a href="../bl/tableau_dette.php">
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
                            <a href="facture_achat/FactureAchat.php">
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
                        <i class="entypo-doc-text"></i>
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
                            <a href="../articles/marque.php">
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


            </ul>

        </div>

    </div>

    <div class="main-content">



        <hr />

        <ol class="breadcrumb bc-3" >
            <li>
                <a href="../index.php"><i class="fa-home"></i>Acceuil</a>
            </li>
            <li>

                <a href="liste_founrnisseur.html">Fournisseurs</a>
            </li>
            <li class="active">

                <strong>Ajouter Fournisseur</strong>
            </li>
        </ol>

        <h2>Remplir les informations du fournisseurs</h2>

        <br />

        <script type="text/javascript">
            jQuery( document ).ready( function( $ ) {
                var $table1 = jQuery( '#table-1' );

                // Initialize DataTable
                $table1.DataTable( {
                    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "bStateSave": true
                });

                // Initalize Select Dropdown after DataTables is created
                $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                    minimumResultsForSearch: -1
                });
            } );
        </script>



        <br />

        <?php
        if(isset($_GET['societe'])&&isset($_GET['code'])&&
            !empty($_GET['societe'])&&!empty($_GET['code'])


        )
        {
            $societe=$_GET['societe'];
            $code=$_GET['code'];
            $dette=$_GET['dette'];
            $telephone=$_GET['telephone'];
            $fax=$_GET['fax'];
            $email=$_GET['email'];
            $adresse=$_GET['adresse'];
            $compte=$_GET['compte'];
            $date=date("d-m-Y");
            $req=mysqli_query($link,"insert into fournisseurs (societe,code,dette
,telephone,fax,email,adresse_activite,compte_bancaire,
date_inscription
) value('$societe','$code','$dette','$telephone','$fax',
'$email','$adresse','$compte','$date'
)");
            if($req)
                header("Location: affiche_fournisseurs.php");


        }

        else{
            ?>


        <form method="GET"  class="form-horizontal form-groups-bordered" action="cree-fournisseur.php">

            <?php
            if (isset ($_GET["verif_info"] ))
                echo "Verifier Vos Champs Obligatoires SVP ..";

            ?>
            </p>
            <table class="table table-bordered table-striped datatable" border = "2" align="center">


                <input type = "hidden" name = "verif_info" value ="verif_info"/>

                <tr>
                    <td class="td-gauche">
                        Société
                    </td>

                    <td class="td-client">


                        <input autocomplete="off" class = "input-table" type="text" name="societe" autofocus ="autofocus"  value = "<?php
                        if (isset($_GET["societe"]))
                            echo $_GET["societe"];
                        ?>" />

                    </td>
                    <td class="td-point">*</td>
                </tr>
                <tr>
                    <td class="td-gauche">
                        Code

                    </td>

                    <td class="td-client">



                        <input autocomplete="off" class = "input-table" type = "text" name = "code"  />


                    </td>
                    <td class="td-point">*</td>
                </tr>




                <tr>
                    <td class="td-gauche">
                        Dette

                    </td>

                    <td class="td-client">



                        <input autocomplete="off" class = "input-table" type = "text" name = "dette" value ="0" />


                    </td>
                    <td class="td-point">*</td>
                </tr>



                <tr>
                    <td class="td-gauche">
                        Téléphone
                    </td>

                    <td class="td-client">




                        <input autocomplete="off" class="input-table" type="text" name="telephone"/>

                    </td>
                    <td class="td-point">&nbsp;</td>
                </tr>

                <tr>
                    <td class="td-gauche">
                        Fax
                    </td>

                    <td class="td-client">

                        <input autocomplete="off" class = "input-table" type = "text"  name = "fax"/>

                    </td>
                    <td class="td-point">&nbsp;</td>
                </tr>

                <tr>
                    <td class="td-gauche">
                        Email
                    </td>

                    <td class="td-client">

                        <input autocomplete="off" class = "input-table" type="text" name="email"/>

                    </td>
                    <td class="td-point">&nbsp;</td>
                </tr>

                <tr>
                    <td class="td-gauche">
                        Adresse
                    </td>

                    <td class="td-client" >

                        <input autocomplete="off"  class="input-table" type="text" name="adresse"/>

                    </td>
                    <td class="td-point" >&nbsp;</td>
                </tr>


                <tr>
                    <td class="td-gauche">
                        Compte Bancaire / CCP
                    </td>

                    <td class="td-client">


                        <input autocomplete="off" class = "input-table" type = "text" name = "compte"/>


                    </td>
                    <td class="td-point">&nbsp;</td>
                </tr>
                <tr>

                </tr></table>


                </table>
            </center>
            <br/>
            <span >* Champs importants</span>
            <br />
            <input class ="" name = "register" id = "register"   type= "submit"    value = "Enregistrer" />
        </form><?php
        }
        ?>
        <br />
        <br />
        <!-- end .content -->
    </div>
    </center>
    <!-- end .container -->
    <?php


    }
    else
        header("Location:../login.php");

    include("modele/footer.php");
    ?>
</div>
<?php
include("modele/scripts.php");
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