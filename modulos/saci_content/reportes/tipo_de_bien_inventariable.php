<?php
    // prevent browser from caching
    header('pragma: no-cache');
    header('expires: 0'); // i.e. contents have already expired
    ini_set('session.auto_start','on');
    session_start();
    include("../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Menu.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php 
      if(!empty($_SESSION[IdActivo]))
      {
          
      }
      else
      {
          echo "<script>
                      top.location.href='$url/index.php';
                      window.location.href='$url/index.php';
                </script>";
      }
      
    ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SACI : Reportes</title>
        <link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="css/t_reportes.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/UI_Theme/css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/jqgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
        
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
                    background-image: url('../../../interfaz/background.jpg');
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

            #apDiv3 {
                    position:absolute;
                    left:99px;
                    top:223px;
                    width:184px;
                    height:53px;
                    z-index:3;
            }
            #apDiv4 {
                    position:absolute;
                    left:99px;
                    top:285px;
                    width:127px;
                    height:36px;
                    z-index:4;
            }
            #apDiv5 {
                    position:absolute;
                    left:99px;
                    top:347px;
                    width:105px;
                    height:30px;
                    z-index:5;
            }
            #apDiv6 {
                    position:absolute;
                    left:99px;
                    top:409px;
                    width:94px;
                    height:37px;
                    z-index:6;
            }
            #apDiv7 {
                    position:absolute;
                    left:99px;
                    top:471px;
                    width:85px;
                    height:31px;
                    z-index:7;
            }
            #apDiv8 {
                    position:absolute;
                    left:99px;
                    top:533px;
                    width:104px;
                    height:43px;
                    z-index:8;
            }
            #apDiv9 {
                    position:absolute;
                    left:565px;
                    top:223px;
                    width:65px;
                    height:26px;
                    z-index:9;
            }
            #apDiv10 {
                    position:absolute;
                    left:565px;
                    top:285px;
                    width:108px;
                    height:50px;
                    z-index:10;
            }
            #apDiv11 {
                    position:absolute;
                    left:565px;
                    top:347px;
                    width:100px;
                    height:50px;
                    z-index:11;
            }
            #apDiv12 {
                    position:absolute;
                    left:565px;
                    top:409px;
                    width:132px;
                    height:39px;
                    z-index:12;
            }
            #apDiv13 {
                    position:absolute;
                    left:565px;
                    top:471px;
                    width:165px;
                    height:30px;
                    z-index:13;
            }
            #apDiv14 {
                    position:absolute;
                    left:565px;
                    top:533px;
                    width:139px;
                    height:47px;
                    z-index:14;
            }
            #apDiv15 {
                    position:absolute;
                    left:53px;
                    top:82px;
                    width:893px;
                    height:58px;
                    z-index:14;
            }
            #apDiv16 {
                    position:absolute;
                    left:897px;
                    top:110px;
                    width:44px;
                    height:26px;
                    z-index:16;
            }
            #apDiv17 {
                    position:absolute;
                    left:0px;
                    top:59px;
                    width:1000px;
                    height:600px;
                    z-index:0;
                    background-color: #FFFFFF;
            }
            #apDiv18 {	position:absolute;
                    left:53px;
                    top:82px;
                    width:893px;
                    height:25px;
                    z-index:5;
            }
            .contenido {
                    position:absolute;
                    left:50px;
                    top:152px;
                    width:125px;
                    height:40px;
                    z-index:15;
            }
            #apDiv20 {
                    position:absolute;
                    left:565px;
                    top:151px;
                    width:118px;
                    height:47px;
                    z-index:16;
            }
        </style>
        <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/UI_Theme/js/jquery-ui-1.9.0.custom.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/js/jquery.jqGrid.src.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/src/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/reporte_catalogos.js" type="text/javascript"></script>

        <script type="text/javascript">            
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
        </script>
        <script type="text/javascript">
            $().ready(function () {
                InicializarReporteCatalogoTipoBien();
            });
        </script>
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg')">
        <div style="width:1006px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
            <div class="modulos" id="apDiv1">
            </div>
            <div class="inicio" id="apDiv2"></div>
            <!-- Bloque uno -->

            <!-- End Bloque dos -->
            <div id="apDiv17"></div>
            <div class="txt_titulos_bold_menu" id="apDiv15">Catálogo de Tipo de Bien<br />
                <hr size="1" noshade="noshade" />
            </div>
            <div class="contenido">
                <table id="Tbl"></table>
                <div id="DivPaginador"></div>
                <p/>&nbsp;<p/>
                  <table border="0" style="width: 900px;">
                    <tr>
                        <th><img src="../../interfaz_modulos/botones/exportar_pdf.jpg" name="ImagePdf" width="120" height="45" border="0" id="ImagePdf" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)" style='cursor:pointer' onclick="window.open('pdf/reporte_tipobien_pdf.php', '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');"/></th>
                        <td>&nbsp;</td>
                        <th><img src="../../interfaz_modulos/botones/exportar_excel.jpg" name="ImageXls" width="120" height="45" border="0" id="ImageXls" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageXls','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)" style='cursor:pointer' onclick="window.open('xls/reporte_tipobien_xls.php', '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');"/></th>
                        <td>&nbsp;</td>
                        <th><!--<img src="../../interfaz_modulos/botones/exportar_word.jpg" name="ImageDoc" width="120" height="45" border="0" id="ImageDoc" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_word_over.jpg',1)" style='cursor:pointer' onclick="window.open('doc/reporte_tipobien_doc.php', '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');"/> --></th>
                    </tr>
                </table>
            </div>
            
        </div>
    </body>
</html>
