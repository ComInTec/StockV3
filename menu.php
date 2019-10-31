<script src="hotkeys/jquery-1.4.2.js"></script>

<script src="hotkeys/jquery.hotkeys.js"></script>


<script>


    // $(function() {
    // function KdDescribeEvent(event){
    // var condition = false;
    // console.log(event.which);
    // if  (event.which == 113) {
    // url = "bl/new_bl.php?ref_client=1";
    // condition = true;
    // }
    // if  (event.which == 174) {
    // url = "bl/tableau_dette.php?type=dette";
    // condition = true;
    // }
    // if(condition = true	){
    // window.location.replace(url);
    // condition = false;
    // }

    // }


    //setTimeout(function() {
    //$(document).bind('keydown',  KdDescribeEvent);
    //}, 500);
    //});


</script>

<div class="sidebar1">
    <center>
        <div id="menu">
            <ul id="MenuBar1" class="MenuBarHorizontal">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="" class="MenuBarItemSubmenu"> Clients <img src="design/SpryAssets/SpryMenuBarRight.gif"
                                                                        width="4" height="7"/></a>
                    <ul>
                        <li><a href="clients/cree-client.php">Nouveau +</a></li>
                        <li><a href="clients/affiche_clients.php">Liste</a></li>
                        <li><a href="bl/tableau_dette.php?type=dette">Dettes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"> Ventes <img src="design/SpryAssets/SpryMenuBarRight.gif"
                                                                    width="4" height="7"/> </a>
                    <ul>
                        <li><a href="bl/new_bl.php?ref_client=1">Nouveau +</a></li>
                        <li>
                            <a href="clients/voir_tout_bl.php">Liste</a>
                        </li>
                        <li><a href="bl/recettes.php">Recettes</a></li>


                    </ul>
                </li>

                <li>
                    <a href="#" class="MenuBarItemSubmenu">Achats <img src="design/SpryAssets/SpryMenuBarRight.gif"
                                                                       width="4" height="7"/></a>
                    <ul>
                        <li><a href="facture_achat/nv_arrivage.php">Nouveau +</a></li>
                        <li>
                            <a href="facture_achat/tous_factures_achats.php">Liste</a>
                        </li>

                        </li>


                    </ul>
                </li>
                <li>
                    <a href="#" class="MenuBarItemSubmenu MenuBarItemSubmenu">Stock
                        <img src="design/SpryAssets/SpryMenuBarRight.gif" width="4" height="7"/>
                    </a>
                    <ul>
                        <li><a href="stock/stock.php?qtt=1" class="MenuBarItemSubmenu MenuBarItemSubmenu">Liste</a></li>
                        <li><a href="stock/emplacement.php">Magazin</a></li>

                    </ul>
                </li>
                <li><a class="MenuBarItemSubmenu" href="#">Fournisseurs <img
                                src="design/SpryAssets/SpryMenuBarRight.gif" width="4" height="7"/></a>
                    <ul>
                        <li><a href="fournisseurs/cree-fournisseur.php">Nouveau +</a></li>
                        <li><a href="fournisseurs/affiche_fournisseurs.php">Liste</a></li>
                    </ul>
                </li>

                <li><a href="#" class="MenuBarItemSubmenu">Options <img src="design/SpryAssets/SpryMenuBarRight.gif"
                                                                        width="4" height="7"/></a>
                    <ul>
                        <li><a href="company">Info Entreprise</a></li>

                        <li><a href="company/coffre.php">Coffre </a></li>
                        <li><a href="company/charges.php?today=today">Charges </a></li>

                        <li><a href="utilisateurs/affiche_utilisateurs.php"><?php
                                //session_start();
                                $req_utilisateur = mysqli_query($link, "SELECT * FROM users WHERE user  =  '" . $_SESSION['username'] . "'or user = 'System'") or die (mysqli_error($link));

                                if (mysqli_num_rows($req_utilisateur)) {
                                    $type = mysqli_fetch_array($req_utilisateur);
                                    $type = $type["id_user_type"];
                                    if ($type == "2") {
                                        echo "Utilisateurs";
                                    } else {
                                        echo "Mon Compte";
                                    }
                                } ?></a></li>


                        <li><a href="backup/zip.php">Sauvegarder</a></li>
                        <li><a href="deconnexion.php">Deconnection</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </center>
    <br/><br/><br/>
</div>