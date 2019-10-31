<?php
session_start();
$ref;
if (isset($_SESSION['username'])) {
	include '../global.php';
	$ref_client = "";
	if (isset ($_GET['ref_client'])){
			$ref_client = $_GET['ref_client'];
	}

	$inser_produit = "";
	if (isset ($_GET['inser_produit']))
		$inser_produit = $_GET['inser_produit'];
	$date;
	$link = "ref_client=" . $ref_client . "&date=" . date("d-m-Y") . "&inser_produit=" . $inser_produit;
	//echo $link;
	header("Location:new_bl_confirm.php?" . $link);

		?>
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Logiciel De Stock - Page Nouveau bl</title>
    <link href="design/style2.css" rel="stylesheet" type="text/css"/>
    <script language="javascript" src="../design/cal2.js">
    </script>

    <script language="javascript" src="../design/cal_conf2.js"></script>
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
    </div>

    <div class="content">
        <style type="text/css">
            .tdtd {
                border-right-style: ridge;
                border-right-color: BLACK;
                border-left-color: BLACK;
                border-left-style: ridge;
                border-left-color: BLACK;
                /* [disabled]border-spacing: 0px; */
            }

            .tdtd2 {
                border-right-style: ridge;
                border-right-color: BLACK;
                border-left-color: BLACK;
                border-left-style: ridge;
                border-left-color: BLACK;
                border-bottom-color: BLACK;
                border-bottom-style: ridge;
                border-top-color: BLACK;
                border-top-style: ridge;
                width: 90px;
            }

            .tab2 {
                border-bottom-color: BLACK;
                border-bottom-style: ridge;
                border-top-color: BLACK;
                border-top-style: ridge;
                border-right-color: BLACK;
                border-right-style: ridge;
                border-left-style: ridge;
                border-left-color: BLACK;
            }

            .tab {
                border-right-color: BLACK;
                border-right-style: solid;
                border-left-style: solid;
                border-left-color: BLACK;
                border-spacing: 0px;
            }

            .infoDap {
                text-align: right;
                font-size: 12px;
                background-color: #FFF;
                color: #000;
                height: 130px;
                width: 400px;
                clear: none;
                font-family: Verdana, Geneva, sans-serif;
                display: inline;
                float: right;
                margin: 10px;
                padding: 10px;
                position: absolute;
                top: 10px;
                right: 10px;
            }

            #logo {
                height: 100px;
                width: 200px;
                /* [disabled]margin: 10px; */
                /* [disabled]padding: 10px; */
                /* [disabled]display: inline; */
                /* [disabled]border-right-style: groove; */
                /* [disabled]border-left-style: groove; */
                float: right;
            }

            #client-info {
                height: 93px;
                width: 70%;
                font-family: Verdana, Geneva, sans-serif;
                font-size: 12px;

                float: left;
                top: 120px;
                text-align: center;
                left: 10px;
            }

            #body {
                background-color: #FFF;
                /* [disabled]color: #000; */
                position: relative;
                margin: 10px;
                padding: 10px;
            }

            #payment {
                position: absolute;
                top: 80%;
            }

            #bl {
                height: 50px;
                width: 100%;
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 18px;
                color: #906;
                text-transform: capitalize;
                margin: 10px;
                padding: 10px;
                text-align: center;
                font-weight: bold;
                vertical-align: middle;
                float: left;
            }

            #total {
                width: auto;
                text-align: center;
                float: left;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
            }

            #resultat {
                margin: 10px;
                width: auto;
                float: left;
                padding-right: 5px;
                padding-left: 5px;
            }

            #table {
                margin: 10px;
                padding: 10px;
                position: absolute;
                top: 280px;
            }

            table tr td {
                text-align: center;
                width: 100px;
            }

            .input-current-add {
                text-align: center;
            }

            #confirm-fact {
                position: absolute;
                height: 50px;
                width: 300px;
                bottom: inherit;
                right: 473px;
                top: 30px;
            }

            .tdtd3 {
                border-right-style: ridge;
                border-right-color: BLACK;
                border-left-color: BLACK;
                border-left-style: ridge;
                border-left-color: BLACK;
                border-bottom-color: BLACK;
                border-bottom-style: ridge;
                border-top-color: BLACK;
                border-top-style: ridge;
                width: 350px;
            }
        </style>
            <div id="client-info">
                <form name="sampleform" method="GET" action="new_bl_confirm.php">
                    <table align="center" border="2">
                        <tr>
                            <td width="87">Date</td>
                            <td width="13">:</td>
                            <td width="214"><input name="date" type="text" class="id_client" value="<?php echo  date("d-m-Y");?>" onclick="showCal('Calendar1')"/>
                            </td>
                        </tr>
                        <tr>
                            <td><p>&nbsp;</p>
                                <input name="ref_client" type="hidden"
                                       value="<?php echo("" . $ref_client) ?>" readonly="readonly"/>
                            </td>
                            <td><p>&nbsp;</p>
                            </td>
                            <td>
                                <input type="submit" id="button" value="Confirmer"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <br/>
            <script type="text/javascript" src="../jquery.js">
            </script>
            <?php
        } else
            header("Location:../login.php");


        ?>
    </div>

    <!-- end .container -->


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