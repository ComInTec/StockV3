
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title> </title>

<link rel="stylesheet" type="text/css" href="design/login.css" />

<script type="text/javascript" src="design/jquery.js"></script>
<script type="text/javascript">
function startup()
{
	//$("#wrapper").hide();
	$("#wrapper").fadeIn(500);
	
	
	}

</script>
<?php
//<script type="text/javascript" src="script.js">
/*</script>
*/
?>

</head>


<body  onload="startup()" >



<div id = "wrong pass">

<?php
 
if(      isset($_GET['usr_email'])&&    isset($_GET['pwd'])  )
{
include 'global.php';
     session_start();	
$username = $_GET['usr_email'];
$password = $_GET['pwd'];
	
	$request = mysqli_query($link,"SELECT * FROM users WHERE user = '".$username."'")or die (mysqli_error($link));

if(mysqli_num_rows($request))
{	
while($ligne = mysqli_fetch_array($request) )	
		$pass = $ligne['pass'];

	if($pass == md5($password))
		{

	//echo("mot de pass corect");
   	
	 	$_SESSION['username'] = $username; 
	 	
		header("Location:index.php");
	
		}
	
}else

	echo("<center>Veuillez Verifier Vos Coordonnées SVP !!</center>");

	}

	
?>
</div>
<div id="wrapper">
<center>
</center>
<form name="login-form" class="login-form" action="login.php" method="GET">


	<div class="header">

		<h1><img src="design/pics/dap_fishing.jpg" width="212" height="207" longdesc=" " /> Authentification </h1></div>


		<div class="content">

		<input name="usr_email" type="text" autocomplete="off" autofocus="autofocus" class="input username" placeholder="Utilisateur" />

		<div class="user-icon"></div>

		<input name="pwd" type="password" class="input password" autocomplete="off"  placeholder="Mot de Passe" />

		<div class="pass-icon"></div>		

		</div>


		<div class="footer">

	
		  <input type="submit" name="doLogin" id="doLogin3" value="Connecter" class="button" />
	
		

		<!-- <input type="submit" name="doLogin" id="forgot" value="Forgot" class="register" /> -->

<!--		<input type="BUTTON" value="reset password" class="register" onclick="window.location.href='forgot.php'" />
-->
		</div>
<br />

	</form>


<?php




?>

<div class="gradient"></div>