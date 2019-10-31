<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Logiciel De Stock - Ajouter Versement</title>
    <link href="design/style2.css" rel="stylesheet" type="text/css"/>
    <script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>

    <script language="javascript" src="../design/cal2.js">
        /*
        Xin's Popup calendar script-  Xin Yang (http://www.yxscripts.com/)
        Script featured on/available at http://www.dynamicdrive.com/
        This notice must stay intact for use
        */
    </script>

    <script language="javascript" src="../design/cal_conf2.js"></script>
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
            <?php
            include("../global.php");

            $bon_fournisseur = 0;


            //,facture_achat.id_fachat,facture_achat.bon_fournisseur


            function bon_fournisseur($id_fachat,$link)
            {
                $result = 0;


                $req_montant = mysqli_query($link, "

select
*	
  
  from facture_achat
  where facture_achat.id_fachat = $id_fachat  ") or die (mysqli_error($link));
                if (mysqli_num_rows($req_montant)) {
                    while ($row = mysqli_fetch_array($req_montant))

                        $result = $row["bon_fournisseur"];

                }


                return $result;

            }


            /////////////////////////////////////////////////////////////////////

            function total_versement($id_fachat,$link)
            {
                $result = 0;


                $req_montant = mysqli_query($link, "
select  
COALESCE(SUM(reglement_achat.montant),0) as total_versement  
from  
reglement_achat
 where
 
 reglement_achat.id_fachat = '$id_fachat'") or die (mysqli_error($link));
                if (mysqli_num_rows($req_montant)) {
                    while ($row = mysqli_fetch_array($req_montant))


                        $result = $row["total_versement"];

                }


                return $result;
            }


            $id_fachat;
            $total_achat = 0;

            $ref_fournisseur;
            $date_achat;
            if (isset($_GET["id_fachat"])) {
                $id_fachat = $_GET['id_fachat'];

                $total_versement = total_versement($id_fachat,$link);


//if(mysqli_num_rows($req_achat))
                {
                    //$row_achat_total=mysqli_fetch_array($req_achat);


                    ?>
                    <hr/>
                    <br/>
                    <table width="70%" border="2" align="center">


                        <tr>
                            <th align="left" nowrap="nowrap">

                                Totale du Bon d'achat:
                            </th>

                            <th align="center">

                            </th>
                            <th align="center" nowrap="nowrap"><?php


                                echo(number_format(bon_fournisseur($id_fachat,$link), 2, ',', ' ')); ?></th>
                            <td align="center">&nbsp;</td>
                        </tr>


                        <?php
                        $rest;
                        // $first_dette =0;
                        $ref_fournisseur = 0;
                        // $req_first_dette= mysqli_query($link,"select * from fournisseurs where ref_fournisseur = '$ref_fournisseur' ");
                        // if(mysql_rest_rows($req_first_dette))
                        // {
                        // while($row_req_first_dette=mysqli_fetch_array($req_first_dette))
                        // {
                        // $first_dette = $row_req_first_dette["dette"];}
                        // }
                        $req_bon_fournisseur = mysqli_query($link, "select 
facture_achat.bon_fournisseur  as total_achat
   from 
   facture_achat where facture_achat.id_fachat = $id_fachat 
") or die (mysqli_error($link));
                        // and facture_achat.date< '$date_achat'

                        // and facture_achat.date< '$date_achat'


                        $req_montant = mysqli_query($link, "select  COALESCE(SUM(reglement_achat.montant),0) as total_versement   from  reglement_achat 
where 

reglement_achat.id_fachat = '$id_fachat' 
  ") or die (mysqli_error($link));
                        //and facture_achat.id_fachat != $id_fachat

                        //and reglement_achat.date< '$date_achat'
                        // and facture_achat.date< '$date_achat'
                        if (mysqli_num_rows($req_montant) && mysqli_num_rows($req_bon_fournisseur)) {
                            $row_req_montant = mysqli_fetch_array($req_montant);

                            $row_req_bon_fournisseur = mysqli_fetch_array($req_bon_fournisseur);

                            $rest = $row_req_bon_fournisseur["total_achat"] - $row_req_montant["total_versement"];//+$first_dette ;


//if(mysql_rest_rows($req_date))
                            {
//$row_req_date = mysqli_fetch_array($req_date);
                            }


                            $total_achat = $row_req_bon_fournisseur["total_achat"] + $rest;

                        }


                        $req_versement = mysqli_query($link, "SELECT * FROM reglement_achat WHERE id_fachat =  '" . $id_fachat . "' ORDER BY reglement_achat.date ") or die(mysqli_error($link));
                        if (mysqli_num_rows($req_versement)) {
                            while ($row_versement = mysqli_fetch_array($req_versement)) {
                                ?>
                                <tr>
                                <th align="left" nowrap="nowrap">
                                    Verser par <span
                                            style="color:#00FF66"> <?php echo $row_versement["type_versement"]; ?> </span>
                                    le :
                                </th>

                                <td align="center" nowrap="nowrap">
                                    <?php echo date("d-m-Y", strtotime($row_versement["date"])); ?>
                                </td>
                                <td align="center"
                                    nowrap="nowrap"><?php echo number_format($row_versement["montant"], 2, ',', ' '); ?>
                                </td>
                                <td>
                                    <a href="delete_versement.php?id=<?php echo $row_versement["id"]; ?>&id_fachat=<?php echo $id_fachat ?>"><img
                                                src="design/pics/delete.png" width="16" height="16"/></a></td>
                                </tr><?php
                            }
                        }
                        ?>
                    </table>
                    <br/>
                    <hr/>
                    <br/>
                    <table border="2" align="center">
                        <tr>
                            <th align="center" nowrap="nowrap">

                                <?php
                                //$total_achat = $total_achat-$row_versement["montant"];
                                //if ($total_achat<0)
                                //echo "Credit fournisseur du le "  ;
                                //else
                                //echo "Réste du le " ;
                                ?>

                                Verser le :
                            </th>
                            <td align="center" nowrap="nowrap">
                                Mode De Paiement :<?php //echo date("d-m-Y", strtotime($row_versement["date"]));
                                ?>
                            </td>


                            <th align="center" nowrap="nowrap">Montant :<?php
                                // $total_achat = $total_achat-$row_versement["montant"];
                                //echo (restber_format($total_achat, 2, ',', ' '));
                                ?>
                            </th>
                            <td>
                            </td>
                        </tr>
                        <form name="sampleform" action="confirm_achat_versement.php" method="GET">
                            <tr>
                                <th align="center" nowrap="nowrap"><input type="hidden" name="id_fachat"
                                                                          value="<?php echo $id_fachat; ?>"/>
                                    <input style="text-align:center;" type="text" name="date"
                                           value="<?php echo date("d-m-Y"); ?>" onclick="showCal('Calendar1')"/></th>
                                <td nowrap="nowrap"><select name="method">
                                        <option value="Espece" selected="selected">Espece</option>
                                        <option value="CCP">CCP</option>
                                    </select></td>
                                <th nowrap="nowrap"><input style="text-align:center;" type="text" name="montant"
                                                           value="<?php
                                                           echo("" . $total_achat - $rest - $total_versement);
                                                           // die ("total".$total_achat);
                                                           // / echo("".  $total_versement );
                                                           ?>" autofocus="autofocus"/></th>
                                <td><input type="submit" value="Ajouter versement"/>
                                </td>
                            </tr>
                        </form>


                    </table>


                    <?php
                }


            } ?>
        </div>

        <!-- end .container -->

        <div id="print">
            <br/>
            <hr/>


            <br/>
            <hr/>
            <br/>
        </div>
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