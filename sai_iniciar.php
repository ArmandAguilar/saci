<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("sis.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEGDF-SACI / Sistema de Almacén y Control de Inventarios</title>
<meta name="description" content="SACI. Sistema de Almacen y Control de Inventario version 1.0"/>
<meta name="author" content="www.be-ime.com, email contacto@be-ime.com"/>
<meta name="copyright" content="Todos los Derechos Reservados © 2012, Secretaría de Educación Pública"/>
<link rel="shortcut ico" href="interfaz/favicon.ico"/>
<!--<div style="width:1024px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">-->
  <?php 
      if(!empty($_SESSION[IdActivo]))
      {
          
      }
      else
      {
          echo "<script>
                      
                      
                      window.location.href='index.php';
                </script>";
      }
    ?>
</head>

    <frameset rows="128,*" cols="*" framespacing="0" frameborder="no" border="0">
  <frame src="cabecera.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*,35" cols="*" framespacing="0" frameborder="no" border="0">
		<frame src="saai.php" name="mainFrame" id="mainFrame" title="cabecera" />
		<frame src="base.php" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="base" />
	</frameset>
</frameset>
<noframes></noframes>
<body>
  
</body>
</html>
