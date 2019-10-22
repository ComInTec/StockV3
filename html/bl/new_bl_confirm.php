<?php
session_start();

$ref;

if (isset($_SESSION['username'])) {
    include '../global.php';
    $ref_client = "";
    $inser_produit = "";
    if (isset ($_GET['inser_produit']))
        $inser_produit = $_GET['inser_produit'];
    if (isset ($_GET['ref_client']) && isset($_GET['date'])) {
        $ref_client = !empty($_GET['ref_client']) ? $_GET['ref_client'] :1;
        $date = date("Y-m-d", strtotime($_GET['date']));
        $req_name_bl = mysqli_query($link, "INSERT INTO `dap2`.`bl` (`ref_client` ,`date`) VALUES ( $ref_client, '$date');") or die(mysqli_error($link));
        $requette = "SELECT * FROM `bl` WHERE `ref_client` = '$ref_client' and date = '$date' Order BY id_bl DESC LIMIT 0 , 1";
        $req_name_bl = mysqli_query($link, $requette) or die(mysqli_error($link));
        $id_bl;
        if (mysqli_num_rows($req_name_bl)) {
            $row = mysqli_fetch_array($req_name_bl);
            $id_bl = $row["id_bl"];

        if (isset ($_GET['inser_produit']))
            $lien = "search2.php?id_bl=" . $id_bl . "&inser_produit=" . $inser_produit . "&change_add=0&new_bl=true";
        else
            $lien = "bl-vente.php?id_bl=" . $id_bl;
        header("Location:" . $lien);
        } else{
			echo "pas de client avec cette reference";
		}
    }
} else
    header("Location:../login.php");
?>