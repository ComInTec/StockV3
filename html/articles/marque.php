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


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body  page-fade gray" data-url="http://neon.dev">

<?php
include("../global.php");

session_start();
if(isset($_SESSION['username']))
{
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


            </ul>

        </div>

    </div>

    <br class="main-content">

        <ol class="breadcrumb bc-3" >
            <li>
                <a href="../index.php"><i class="fa-home"></i>Acceuil</a>
            </li>
            <li>

                <a href="">Articles</a>
            </li>
            <li class="active">

                <strong>Marques</strong>
            </li>
        </ol>

    <br/>
    <br/>


    <!-- Edit Modal -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Ajouter une marque</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form action ="insertData.php" method="POST">
                    <div class="md-form ">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="email" id="name" class="form-control " name="nom">
                        <label>Nom</label>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input id="active" class="form-control " name="active">
                        <label >Active</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" name="insertData">Ajouter</button>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default" data-dismiss="modal">Annuler</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="text-center" >
        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Ajouter une marque</a>
    </div>


<!-- Table d'enrgistrement -->
<div id="table-3_wrapper" class="dataTables dataTables_wrapper" >
    <?php
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect("localhost", "root", "", "dap2");

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Attempt select query execution
    $sql = "SELECT * FROM categorie";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){

            echo "<table class=\"table table-bordered table-striped datatable\" id=\"table-2\">";
            echo " <thead>
            <tr>
                <th>
                    <div class=\"checkbox checkbox-replace\">
                        <input type=\"checkbox\" id=\"chk-1\">
                    </div>
                </th>";


            echo " <th>Nom</th> ";
            echo "<th>Statut</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo"</thead>" ;
            $i=0 ;
            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                echo"<td>
                    <div class=\"checkbox checkbox-replace\">
                        <input type=\"checkbox\" id=\"chk-1\">
                    </div>
                </td>" ;
                echo "<td >" . $row['nom'] . "</td>";
                echo "<td>" . $row['active'] . "</td>";


                echo("<td><a href=\"#\" class=\"btn btn-default btn-sm btn-icon icon-left\">"
                    ."<i class=\"entypo-pencil\"></i> Modifier</a>"

                    ."<a href=\"#\" class=\"btn btn-danger btn-sm btn-icon icon-left\"><i class=\"entypo-cancel\"></i>Supprimer </a>"











                    ."</td>");
                $i++ ;

                echo "</tr>";


            }


            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // Close connection
    mysqli_close($link);
    ?>

    <?php
    }else

        header("Location:../login.php");

    ?>






</div>




        <hr />








        <br />



        <br />



</div>























        <!-- Footer -->
        <footer class="main">

            &copy; 2019 <strong>ComInTec</strong> Bureau de consulting et formation en Informatiue <a href="" target="_blank"> ComInTec</a>

        </footer>
    </div>


<script>

$(document).ready(function(){



});

</script>
















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
<script src="../assets/js/popper.min.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="../assets/js/neon-custom.js"></script>


    <!-- Demo Settings -->
    <script src="../assets/js/neon-demo.js"></script>

</body>
</html>