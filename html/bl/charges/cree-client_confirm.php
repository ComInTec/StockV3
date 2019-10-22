<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  Logiciel De Stock </title>
<link href="design/style2.css" rel="stylesheet" type="text/css" />
<script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="design/spryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="design/scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link href="design/spryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
<div class="container">
   <center>
<div class="header" id="header"></div>
  </center>
  <center>
<div class="sidebar1">
 <center>
 <div id ="menu">
   <ul id="MenuBar1" class="MenuBarHorizontal">
     <li><a href="../" class="MenuBarItemSubmenu">Acceuil</a>       </li>
</ul>
 </div> </center>
    <br /><br /><br /> 
 
 </div>
 </center>
        <?php   
	session_start();
  
  
if(isset($_SESSION['username']))
{	 
  
  ?> 
 <center>

  <div class="content">
  <br />  <br  />
  
  <?php
include("modele/global.php");
$ref='';
 

	$societe  ='';
	$telephone  ='';
	$fax  ='';
	$t_portable  ='';
	$email  ='';
	$adress  ='';
	$nrc ='';
	$nif  ='';
	$art  ='';
	$cb ='';
    $ccp ='';
	$date  ='';
    $ville  ='';
	$wilaya  ='';
 	$dette = 0;
	$societe_officielle='';

if(isset($_GET['societe']) ){

	$societe = $_GET['societe'];

if(isset($_GET['societe_officielle']) )

	$societe_officielle = $_GET['societe_officielle'];


if(  isset($_GET['dette'])  )
 	$dette = $_GET['dette'];
 


if(  isset($_GET['telephone'])  )
 	$telephone = $_GET['telephone'];
 


if( isset($_GET['fax']) ) 
	$fax = $_GET['fax'];
 

if( isset($_GET['t_portable']))
	$t_portable = $_GET['t_portable'];
 

if(  isset($_GET['email']) )
$email = $_GET['email'];
 

if( isset($_GET['adress']))
 	$adress = $_GET['adress'];


if(  isset($_GET['nrc']))
 	$nrc = $_GET['nrc'];
 


if(  isset($_GET['nif']))
 $nif = $_GET['nif'];
 

if(  isset($_GET['art']) )
 	$art = $_GET['art'];
 
if(  isset($_GET['ville']) )
 	$ville = $_GET['ville'];
	
if(  isset($_GET['wilaya']) )
 	$wilaya = $_GET['wilaya'];
 
//ville
//wilaya
$cb = "";
$ccp = "";
$date = date("d-m-Y");
	
	if(  isset($_GET['cb']))
		$cb = $_GET['cb'];

	if(isset($_GET['ccp']))
		$ccp = $_GET['ccp'];
	
//ville
	$request = mysqli_query($link,"INSERT INTO  `clients` (
`Societe` ,`Societe_officielle`,dette,`telephone_fix` ,`fax` ,T_Mobile,
`email` ,`adresse_activite` ,`nrc` ,`n_carte_fiscale` ,
N_ART,`compte_bancaire` ,`ccp` , wilaya , ville ,`date_inscription`)
VALUES (
'".$societe."','".$societe_officielle."','".$dette."','".$telephone."','".$fax."','".$t_portable."',
'".$email."','".$adress."','".$nrc."','".$nif."',
'".$art."','".$cb."','".$ccp."','".$wilaya."','".$ville."','".$date."' )")
or die(mysqli_error($link));

if ($request)
	echo 'Nouveau Client ajouté ...';
else
	echo 'Client non ajouté';
/*societe
	telephone
	fax 
	t.portable 
	email 
	adress 
	nrc 
	nif 
	art 
	cb 
	ccp
	*///if($request)
	//header("Location: affiche_clients.php");	
}
?>
   
 
 
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
</center>
</body>
</html>