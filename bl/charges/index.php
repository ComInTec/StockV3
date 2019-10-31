
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>  Logiciel De Stock </title>
<link href="design/style2.css" rel="stylesheet" type="text/css" />
<script src="design/spryAssets/SpryMenuBar.js" type="text/javascript"></script>
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
     <li><a href="../index.php" class="MenuBarItemSubmenu">Acceuil</a></li>
</ul>
 </div> </center>
    <br /><br /><br /> 
       <?php   
	
	include("global.php");
		session_start();
 if(isset($_SESSION['username']))  
{
	 
	 
	?>  
 </div>
 </center>
 <center>
<div class="content">
  <div id = "date">
<center>
  <?php 
 // $date= date("d-m-Y");
 // echo("<br> Compte : "); 

	
	$username = $_SESSION['username'];
//echo($username);
//echo("<br>Nombre d'articles : ");
$sql = mysqli_query($link,"SELECT count(*) AS a FROM `articles`");
$resu = mysqli_fetch_array ($sql);
?>
 

  
  
  <?php
$sql = mysqli_query($link,"SELECT count(*) AS a FROM `bl`");
$resu = mysqli_fetch_array ($sql);

//echo("<br>Nombre des BL : ");

?>
 
<?php
$sql = mysqli_query($link,"SELECT count(*) AS a FROM `facture`");
$resu = mysqli_fetch_array ($sql);

//echo("<br>Nombre de  Factures : ");

?>
  
 <?php //echo($resu["a"]);
?>
  <?php
}
else

	header("Location:login.php");

?>
</center> 
</div>
<hr />
  <h1 id = "user">  <CENTER>
     Rechercher Client :  
         <table>
<td><input name="code" autocomplete="off" type="text" id ="code" autofocus="autofocus" />
</td>

</table>
</CENTER>
 <div id = "bar_result">
</div>
 
<br /> 
<br /></h1>


<br />
</div>  
</center>  
    <!-- end .container -->
 <?php 
include("modele/footer.php");
?>
    
    </div>
   	  <script type = "text/javascript" src = "design/jquery.js"> </script> 

  <script type="text/javascript">
//alert($b);


    
//	alert(44);
var a=0;
$("#code").keyup(function(){
//salert($("#code").val());

var stop = 1;
//do{
var $ff = $.trim($("#code").val())
//alert ($ff);
//}while($ff.contains());
 $ff= $ff.replace(/ /g, '%20');
 var $ai=0;
 do {
 $ff= $ff.replace('%20%20', '%20');
 $ai++;
 }while($ai<15);

//alert ($ff);
 $ff=$ff.toUpperCase();

var $b= "fast_info.php?code="+$ff;
	
		
		var len = $("#code").val().length;


if(len>1)
{//	$("#code").val("");

if(a==0)
{
$("#header").hide(1000,function(){
//$("#header").show(1000).html("COPYRIGHT 2012");

	
	
	});
$("#date").hide(1000,function(){
$("#date").show(1000).html("Gestion du Stock");
	
	});
a=1;

}
}
	
	//$("#bar_result").hide(100);
	$("#bar_result").load($b,function(){
		}).show(1000);
	
	//alert($b);
	
	});
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>

</center>
</body>
</html>
