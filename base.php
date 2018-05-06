<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEGDF : SACI</title>
<link rel="shortcut ico" href="interfaz/favicon.ico">
<script language="Javascript">
document.oncontextmenu = function(){return false}
</script>
<style type="text/css">
body {
	background-color: #333E44;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<div style="width:1024px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(interfaz/inferior.jpg);
	background-repeat: repeat-x;
}
#apDiv1 {
	position:absolute;
	left:867px;
	top:11px;
	width:133px;
	height:17px;
	z-index:2;
	font-size: 14px;
	text-align: center;
}
#apDiv2 {
	position:absolute;
	left:107px;
	top:5px;
	width:185px;
	height:26px;
	z-index:2;
}
</style>
<link href="css/textos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv3 {
	position:absolute;
	left:865px;
	top:5px;
	width:135px;
	height:27px;
	z-index:1;
	background-color: #242D31;
}
#apDiv4 {
	position:absolute;
	left:551px;
	top:5px;
	width:312px;
	height:27px;
	z-index:3;
	background-color: #242D31;
}
#apDiv5 {
	position:absolute;
	left:0px;
	top:-4px;
	width:176px;
	height:32px;
	z-index:4;
}
#apDiv6 {
	position:absolute;
	left:559px;
	top:11px;
	width:294px;
	height:17px;
	z-index:5;
}
</style>
<?php 
      if(!empty($_SESSION[IdActivo]))
      {
          
      }
      else
      {
          echo "<script>
                      top.location.href='index.php';
                      window.location.href='index.php';
                </script>";
      }
      
    ?>
</head>

<body>
<div class="txt" id="apDiv1"><script> 

var mydate=new Date(); 
var year=mydate.getYear(); 
if (year < 1000) 
year+=1900; 
var day=mydate.getDay(); 
var month=mydate.getMonth()+1; 
if (month<10) 
month="0"+month; 
var daym=mydate.getDate(); 
if (daym<10) 
daym="0"+daym; 
document.write("<small><font color='ffffff' face='Arial'><b>"+daym+"/"+month+"/"+year+"</b></font></small>") 

</script><br />
</div>

<div id="apDiv3"></div>
<div id="apDiv4"></div>
<div id="apDiv5"><img src="interfaz/sai.png" width="312" height="43" border="0" /></div>
<div class="txt_user_name" id="apDiv6"><label><?php echo $_SESSION[Nombres]; ?></label></div>
</body>
</html>
