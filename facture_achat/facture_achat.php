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

$montant_ht;
$ref;
$id_fachat;
$date;
$id_article;
$fournisseur;

if(isset($_GET["id_fachat"]))

    $id_fachat=$_GET["id_fachat"];
?>

<div class="page-container" id="page" >
    <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="../index.php">
                        <img src="../assets/images/logo@2x.png" width="120" alt=""/>
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon">
                        <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
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
                            <a href="../fournisseurs/liste_fournisseur.php">
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





        <ol class="breadcrumb bc-3">
            <li>
                <a href="../index.html"><i class="fa-home"></i>Acceuil</a>
            </li>
            <li>

                <a href="achat/bonCommande.php">Achat</a>
            </li>
            <li class="active">

                <strong>Bon de Commande</strong>
            </li>
        </ol>

        <h2>Facture d'Achat</h2>

        <br/>



        <div class="col-md-6" id="tab1">

            <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
                <li class="active">
                    <a href="#En-tete" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class="entypo-home"></i></span>
                        <span class="hidden-xs">En-tete</span>
                    </a>
                </li>
                <li class="">
                    <a href="#Liste" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="entypo-user"></i></span>
                        <span class="hidden-xs">Liste</span>
                    </a>
                </li>
                <li class="">
                    <a href="#messages" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="entypo-mail"></i></span>
                        <span class="hidden-xs">Messages</span>
                    </a>
                </li>

            </ul>

            <div class="tab-content" id="tab">
                <div class="tab-pane active" id="En-tete">

                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 600px;">
                        <div class="scrollable"  style="overflow: hidden; width:auto; height: 600px;">


                            <table id='table-2' class="table table-bordered table-striped datatable>
                                <thead>
                                <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>

                            </tr>
                            </thead>
                            <tbody>


                            <tr>

                                <td>
                                    Date
                                </td>
                                <td  width="214">
                                    <input name="date"  type = "text" class = "id_client" value = "<?php $req=mysqli_query($link,"SELECT facture_achat.`id_fachat`,facture_achat.`date`,facture_achat.`ref_fournisseur`,fournisseurs.Societe
FROM `facture_achat` left outer join fournisseurs on facture_achat.`ref_fournisseur` = fournisseurs.ref_fournisseur AND facture_achat.id_fachat = '".$id_fachat."'

")or die (mysqli_error($link)) ;
                                    if(mysqli_num_rows($req))
                                    {
                                        while($row = mysqli_fetch_array($req))
                                        {


                                            $date =$row["date"];
                                            $fournisseur = $row["Societe"];
                                            $ref_fournisseur = $row["ref_fournisseur"];
                                        }
                                    }
                                    echo("".date("d-m-Y", strtotime($date)));?>" readonly="readonly" />
                                </td>

                            </tr>


                            <tr>

                                <td>
                                    N° Facture :
                                </td>
                                <td>
                                    <input name="id_fachat2"  type = "hidden" id = "id_fachat" value = "<?php echo(''.$id_fachat);?>" readonly="readonly" />  <input name="name_fachat"  type = "text" id = "name_fachat" value = "<?php echo("".$id_fachat);?>" readonly="readonly" />

                                </td>

                            </tr>

                            <tr>

                                <td>

                                    <select  name="list" class="select2" data-allow-clear="false" data-placeholder="Les Fournisseurs...">
                                        <?php
                                        $link = mysqli_connect('localhost', 'root', '') ;
                                        $db= mysqli_select_db($link ,'dap2') or die (mysqli_error());
                                        $sql='SELECT Societe from fournisseurs';

                                        $liste=mysqli_query($link,$sql);
                                        while ($data = mysqli_fetch_array($liste))
                                        {echo'<option>'.$data["Societe"].'</option>';} ?>
                                    </select>




                                </td>
                                <td></td>

                            </tr>




                            <tr>

                                <td>





                                </td>
                                <td  width="300">


                                    <form name="login-form" class="form-horizontal form-groups-bordered" action="" method="GET" role="form" >
                                        <div class="form-group">




                                            <label for="nomE" class="col-sm-3 control-label">Nom Entrerise</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="nomE"  id="nomE" placeholder="Nom Entreprise" autocomplete="off" />
                                            </div>


                                        </div>

                                        <div class="form-group">

                                            <label for="adresse" class="col-sm-3 control-label">Adresse</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="adresse"  id="nomE" placeholder="Adresse" autocomplete="off" />
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="codep" class="col-sm-3 control-label">Code Postal</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="codep"  id="codep" placeholder="Code Postal" autocomplete="off" />
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="ville" class="col-sm-3 control-label">Ville</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="ville"  id="ville" placeholder="Ville" autocomplete="off" />
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="telephone" class="col-sm-3 control-label">Telephone</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="telephone"  id="telephone" placeholder="Telephone" autocomplete="off" />
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label for="rc" class="col-sm-3 control-label">N°RC</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="rc"  id="rc" placeholder="N° RC" autocomplete="off" />
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label for="nif" class="col-sm-3 control-label">NIF</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="nif"  id="nif" placeholder="NIF" autocomplete="off" />
                                            </div>

                                        </div>



                                        <!--

                                        You can also use other social network buttons
                                        <div class="form-group">

                                            <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
                                                Login with Twitter
                                                <i class="entypo-twitter"></i>
                                            </button>

                                        </div>

                                        <div class="form-group">

                                            <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
                                                Login with Google+
                                                <i class="entypo-gplus"></i>
                                            </button>

                                        </div> -->

                                    </form>


                                </td>

                            </tr>
                            </tbody>



                            </table>
                        </div>


                        <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 6px; position: absolute; top: 0px; opacity: 0.3; display: none; border-radius: 3px; z-index: 99; right: 1px; height: 77.4194px;"></div><div class="slimScrollRail" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>

                </div>
                <div class="tab-pane" id="Liste"  style="position: relative; overflow: hidden; width: auto; height: 600px;">




                    <h4>Striped Rows</h4>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Designation</th>
                            <th>Quantité</th>
                            <th>Unité</th>
                            <th>Prix Unitaire HT</th>
                            <th>Remise %</th>
                            <th>Montant HT</th>
                            <th>TVA%</th>

                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total HT</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total TTC</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Net a payer</td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>





                </div>
                <div class="tab-pane" id="messages">


                </div>


            </div>
        </div>




        <button type="button" class="btn btn-gold btn-icon" id="print"><a href="">
                Imprimer
                <i class="entypo-user-add"></i>
        </button></a>





    </div>



    <script>


        $('#print').click(function(){

            //var printme =document.getElementById('table-2') ;
            var printme =document.getElementById('tab'1) ;
            var wme =window.open("","","width=900,height=700");
            wme.document.write(printme.outerHTML) ;
            wme.document.close();
            wme.focus();
            wme.print();
            wme.close();



        })


    </script>























    <!-- Footer -->





</div>

<!-- Chat Histories -->





<!-- Chat Histories -->



</div>




<!-- Imported styles on this page -->
<link rel="stylesheet" href="../assets/js/datatables/datatables.css">
<link rel="stylesheet" href="../assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="../assets/js/select2/select2.css">
<link rel="stylesheet" type="text/css" href="../assets/js/print.css" media="print" />
<!-- Bottom scripts (common) -->
<script src="../assets/js/gsap/TweenMax.min.js"></script>script type="text/javascript"
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
<script src="../assets/js/printThis.js"></script>

<!-- Demo Settings -->
<script src="../assets/js/neon-demo.js"></script>

</body>
</html>