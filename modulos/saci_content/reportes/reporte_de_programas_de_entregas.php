<?php
    // prevent browser from caching
    header('pragma: no-cache');
    header('expires: 0'); // i.e. contents have already expired
    ini_set('session.auto_start','on');
    session_start();
    include("../../../sis.php");
    include("$path/class/poolConnection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SACI : Reportes</title>
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/boxes.css" rel="stylesheet" type="text/css" />
        <link href="css/t_reportes.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/textos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/boxes.css" rel="stylesheet" type="text/css" />
       
		 
		<!-- Begin Libs  --> 
		 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.2.js" type="text/javascript"></script>
		<script src="<?php echo $url; ?>/js/reporte_programa_entrega.js" type="text/javascript"></script>
		
		<!-- Grid -->
		<link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
		<script type="text/javascript" src="<?php Echo $url; ?>/js/flexigrid/flexigrid.js"></script>
		<!-- End Grid -->
		
		<!-- Chosen -->
       <link rel="stylesheet" href="<?php Echo $url; ?>/js/jq_chosen/chosen/chosen.css" />
       <script src="<?php Echo $url; ?>/js/jq_chosen/chosen/chosen.jquery.js" type="text/javascript"></script>
       <!-- end Chosen -->
        <style type="text/css">
            body {
                    margin-left: 0px;
                    margin-top: 0px;
                    margin-right: 0px;
                    margin-bottom: 0px;
            }
            body,td,th {
                    font-family: Tahoma, Geneva, sans-serif;
                    font-size: 12px;
            }
            body {
                    background-image: url(../../../interfaz/background.jpg);
                    background-repeat: repeat;
                    margin-left: 0px;
                    margin-top: 0px;
                    margin-right: 0px;
                    margin-bottom: 0px;
            }
            #apDiv1 {
                    position:absolute;
                    left:0px;
                    top:0px;
                    width:1000px;
                    height:53px;
                    z-index:1;
            }
            #apDiv2 {
                    position:absolute;
                    left:0px;
                    top:-1px;
                    width:209px;
                    height:51px;
                    z-index:2;
            }
            #apDiv11 {
                    position:absolute;
                    left:145px;
                    top:22px;
                    width:667px;
                    height:21px;
                    z-index:8;
            }
            #apDiv3 {
                    position:absolute;
                    left:850px;
                    top:0px;
                    width:50px;
                    height:32px;
                    z-index:9;
            }
            #apDiv4 {
                    position:absolute;
                    left:0px;
                    top:59px;
                    width:1000px;
                    height:600px;
                    z-index:10;
                    background-color: #FFFFFF;
            }
            #apDiv5 {
                    position:absolute;
                    left:0px;
                    top:662px;
                    width:1000px;
                    height:70px;
                    z-index:11;
                    background-color: #C0C2C7;
            }
            #apDiv6 {
                    position:absolute;
                    left:867px;
                    top:673px;
                    width:47px;
                    height:21px;
                    z-index:12;
            }
            #apDiv7 {
                    position:absolute;
                    left:625px;
                    top:419px;
                    width:54px;
                    height:22px;
                    z-index:13;
            }
            #apDiv8 {
                    position:absolute;
                    left:746px;
                    top:673px;
                    width:71px;
                    height:25px;
                    z-index:14;
            }
            #apDiv9 {
                    position:absolute;
                    left:680px;
                    top:197px;
                    width:71px;
                    height:33px;
                    z-index:15;
            }
        </style>
        
        <script>
           

            function MM_preloadImages() { //v3.0
              var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
            }

            function MM_swapImgRestore() { //v3.0
              var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
            }

            function MM_findObj(n, d) { //v4.01
              var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
              if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
              for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
              if(!x && d.getElementById) x=d.getElementById(n); return x;
            }

            function MM_swapImage() { //v3.0
              var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
               if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
            }
            function saver_Order()
            {
                  
            }
            </script>
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/fecha_over.jpg','../../interfaz_modulos/botones/ejecutar_over.jpg')">
        <div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: -12px;">
        <div class="modulos" id="apDiv1"></div>
        <div class="txt_titulo_secciones" id="apDiv11"> / Consumibles / Reporte de Programa de Entregas</div>
        <div class="inicio" id="apDiv2"></div>
        <div id="apDiv3"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
        <div id="apDiv4">
            <center>
                <table border="0" style="">
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr valign="top">
                        <td>
                            <fieldset style="width:300px;">
                                <legend class="txt_titulos_bold">Mes</legend>
                                <table border="0">
                                    <tr>
                                        <td>
                                            <span class="txt_titulos_bold">Selecci&oacute;na Mes</span>&nbsp;
                                            <select data-placeholder="Mes" style="width: 160px" tabindex="1"  class='chzn-select' id="CBMes" name="CBMes">
                                               <option value=""></option>
                                               <option value="01">Enero</option>
                                               <option value="02">Febrero</option>
                                               <option value="03">Marzo</option>
                                               <option value="04">Abril</option>
                                               <option value="05">Mayo</option>
                                               <option value="06">Junio</option>
                                               <option value="07">Julio</option>
                                               <option value="08">Agosto</option>
                                               <option value="09">Septiembre</option>
                                               <option value="10">Octubre</option>
                                               <option value="11">Noviembre</option>
                                               <option value="12">Diciembre</option>
                                           </select>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset> 
                        </td>
                        <td>
                            <fieldset style="width:200px;">
                                <legend class="txt_titulos_bold">Ordenar Por:</legend>  
                                <table border="0" style="width: 100%;">
                                    <tr>
                                        <td>
                                        		<select data-placeholder="Orden" style="width: 160px" tabindex="1"  class='chzn-select' id="CBOrden" name="CBOrden">
                                               <option value=""></option>
                                               <option value="P">Prioridad</option>
                                               <option value="Z">Zona</option>
                                               </select>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                </table>       
                <p/>
                <div id="DivLoad" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            	<div id="DivReporte"></div>
            </center>
            </div>
            <div id="apDiv5"></div>
            <div id="apDiv6"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
            <div id="apDiv8"><img src="../../interfaz_modulos/botones/ejecutar.jpg" name="Image4" width="120" height="45" border="0" id="BtnEjecutar"  onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/ejecutar_over.jpg',1);" style="cursor:pointer" onclick="ejecutar();"/></div>
            <p>&nbsp;</p>
        </div>
    </body>
</html>