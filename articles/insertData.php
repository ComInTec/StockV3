<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'dap2');

if(isset($_POST['insertData'])){

$nom=$_POST['nom'];

    $active=$_POST['active'];




    $query="INSERT INTO marque ('nom','active') VALUES ('$nom','$active')";
$query_run=mysqli_query($connection,$query);



if($query_run)
{

echo '<script>alert("Données Enregitré");</script>';
header('location:index.php');


}
else
{
    echo '<script>alert("Données Non Enregitré");</script>';

}

}







?>