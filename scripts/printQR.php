<?php
   include("../sis.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>QR</title>
         <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php Echo $url; ?>/js/jq_qrcode/src/jquery.qrcode.js"></script>
        <script type="text/javascript" src="<?php Echo $url; ?>/js/jq_qrcode/src/qrcode.js"></script>
        
    </head>
    <body>
        <center>
          <div id="DivQr"></div>
          <script>
            
            var Texo0 ='<?php echo $_GET[Texto0]; ?>';
            var Texo1 ='<?php echo $_GET[Texto1]; ?>';
           $("#DivQr").empty();
        jQuery('#DivQr').qrcode({
		render	: "table",
		text	: "Armando aguilar lopez",
                width: 350  ,
	        height: 350
	}); 
        </script>
          <br></br>
          <img src="<?php echo $url;?>/modulos/interfaz_modulos/botones/imprimir.jpg"  name="ImageG" width="120" height="45" border="0" id="ImageG" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageG','','<?php echo $url;?>/modulos/interfaz_modulos/botones/imprimir_over.jpg',1)" onclick="window.print();" style="cursor:pointer"/>

        </center>  
    </body>
</html>
