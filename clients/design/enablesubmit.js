	$(document).ready(function(e) {
$(function(){
var enable1 = false;
var enable2 = false;


$("input[name='oblig1']").change(function(){
  if ($(this).val().length != 0 )
	enable1 = true;
else
enable1 = false;


if((enable1)&&(enable2)) 
    $("input[name='register']").removeAttr('disabled');
else
$("input[name='register']").attr('disabled','disabled');


});
/////////////////////////////////////////////////////////////

$("input[name='oblig2']").change(function(){
  if ($(this).val().length != 0 )
	enable2 = true;
else
enable2 = false;


if((enable1)&&(enable2)) 
    $("input[name='register']").removeAttr('disabled');
else
$("input[name='register']").attr('disabled','disabled');


});
/////////////////////////////////////////////////////////////


//////////////////////////////////
});// JavaScript Document
  });