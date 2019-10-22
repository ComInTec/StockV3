<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Logiciel De Stock - Page de la remise</title>
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
        <br/><br/><br/>


        <div class="content">
            <center><h1 style="text_align:center;"> Total Bon TTC :
                </h1>
            </center>
            <table width="45%" align="center" border="2">
                <form action="total_bon_fournisseur_confirm.php" method="GET">


                    <input type="hidden" name="id_fachat" <?php
                    include("../global.php");
                    $id_fachat;


                    function total_facture($id_fachat, $link)
                    {
                        $somme_achat = 0;

                        $req = mysqli_query($link, " SELECT * FROM detail_fachat WHERE `id_fachat` ='" . $id_fachat . "'") or die (mysqli_error($link));
                        if (mysqli_num_rows($req)) {
                            while ($row = mysqli_fetch_array($req)) {
                                $qtt = $row["qtt"];

                                $prix_achat = $row["prix_achat"];

                                $somme_achat = $somme_achat + $qtt * $prix_achat;

                            }

                        }
//die("f". $somme_achat);

                        return $somme_achat;


                    }


                    if (isset($_GET['id_fachat'])) {
                        $id_fachat = $_GET['id_fachat'];
                    }
                    ?>value="<?php echo("" . $_GET['id_fachat']); ?>" readonly="readonly"/>
                    <tr>
                        <th nowrap="nowrap">

                            Total Bon <br/>
                            Fournisseur : <BR/>
                            (bon original)
                        </th>

                        <td nowrap="nowrap">
                            <input autofocus name="bon_fournisseur" type="text" value="<?php
                            $req = mysqli_query($link, "SELECT * FROM facture_achat WHERE id_fachat =  '" . $id_fachat . "'") or die(mysqli_error($link));
                            if (mysqli_num_rows($req)) {
                                $row = mysqli_fetch_array($req);
                                if ($row ["bon_fournisseur"] != 0)
                                    echo(number_format($row ["bon_fournisseur"], 0, '.', ''));
// $rem = 100*($_GET['remise_bl'])/$total;

                                else {


                                    $total_facture = total_facture($id_fachat, $link);
                                    echo(number_format($total_facture, 0, '.', ''));
                                }

                            }
                            ?>"/>


                        </td>


                    </tr>


                    <tr>
                        <td>&nbsp;</td>


                        <td>
                            <ul>
                                <input class="bt" type="submit" value="Enregistrer"/>
                            </ul>

                        </td>
                    </tr>

                </form>

            </table>


        </div>

        <!-- end .container -->


    </div>
</div>
<script type="text/javascript" src="design/jquery.js"></script>

<script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {
        imgDown: "design/SpryAssets/SpryMenuBarDownHover.gif",
        imgRight: "design/SpryAssets/SpryMenuBarRightHover.gif"
    });
</script>
</center>

</body>
</html>