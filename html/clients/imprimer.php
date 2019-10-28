<?php
include '../global.php';

if (isset($_GET["ref"]))
{
    $gett=$_GET["ref"];
    $sql = mysqli_query($link,"select FROM `dap2`.`clients` WHERE `clients`.`ref_client` = '".$gett."' ");
    header("Location: liste_client.php");
    $imp = $row[$gett];

    window.vprintf($imp);

}



?>

