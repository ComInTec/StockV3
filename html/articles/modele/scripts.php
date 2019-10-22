	  <script type = "text/javascript" src = "design/jquery.js"> </script> 

  <script type="text/javascript">
//alert($b);


    
//	alert(44);

$("#code").keyup(function(){


var $a=$("#code").val();
var $b= "fast_info.php?code="+$a;
	
	//$("#bar_result").hide(100);
	$("#bar_result").load($b).fadeIn(function(){
		
		var len = $("#code").val().length;
	
	if(len>1)
{//	$("#code").val("");
$("#header").hide();
alert();
}
		},1000);
	
	//alert($b);
	
	});
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"design/SpryAssets/SpryMenuBarDownHover.gif", imgRight:"design/SpryAssets/SpryMenuBarRightHover.gif"});
  </script>
