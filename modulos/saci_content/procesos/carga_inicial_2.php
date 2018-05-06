<?php
    // prevent browser from caching
    header('pragma: no-cache');
    header('expires: 0'); // i.e. contents have already expired
    ini_set('session.auto_start','on');
    session_start();
    include("../../../sis.php");
    include($path."/class/poolConnection.inic");
    include($path."/class/carga_inicial.php");
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
        <title>SACI : Procesos</title>
        <style type="text/css">
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
                width:232px;
                height:51px;
                z-index:2;
        }
        #apDiv3 {
                position:absolute;
                left:519px;
                top:2px;
                width:457px;
                height:45px;
                z-index:1;
        }
        #apDiv11 {
                position:absolute;
                left:146px;
                top:22px;
                width:667px;
                height:21px;
                z-index:8;
        }
        #apDiv4 {
                position:absolute;
                left:850px;
                top:0px;
                width:68px;
                height:22px;
                z-index:9;
        }
        #DivContenido {
                position:absolute;
                left:0px;
                top:59px;
                width:1000px;
                height:639px;
                z-index:10;
                background-color: #FFFFFF;
        }
        #apDiv6 {
                position:absolute;
                left:0px;
                top:702px;
                width:1000px;
                height:70px;
                z-index:11;
                background-color: #C0C2C7;
        }
        #apDiv7 {
                position:absolute;
                left:867px;
                top:712px;
                width:48px;
                height:38px;
                z-index:12;
        }
        #apDiv8 {
                position:absolute;
                left:504px;
                top:712px;
                width:54px;
                height:20px;
                z-index:13;
        }
        #apDiv9 {
                position:absolute;
                left:383px;
                top:712px;
                width:54px;
                height:25px;
                z-index:14;
        }
        #apDiv10 {
                position:absolute;
                left:625px;
                top:712px;
                width:81px;
                height:28px;
                z-index:15;
        }
        #apDiv12 {
                position:absolute;
                left:746px;
                top:712px;
                width:46px;
                height:26px;
                z-index:16;
        }
        #apDiv13 {
                position:absolute;
                left:746px;
                top:712px;
                width:74px;
                height:31px;
                z-index:17;
        }
        </style>
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="css/t_procesos.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="css/t_procesos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/textos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/boxes.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/UI_Theme/css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/jqgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />        
        <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/procesos_cargainicial.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery-ui.custom.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/js/jquery.jqGrid.src.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/src/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.widget.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.core.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.position.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.mouse.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/external/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.datepicker.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.button.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.spinner.js" type="text/javascript"></script>
        
        
        <!-- jqwidgets -->
    <link rel="stylesheet" href="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />

    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxgrid.sort.js"></script> 
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxgrid.pager.js"></script> 
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/jqwidgets/jqxgrid.edit.js"></script> 
    <script type="text/javascript" src="<?php Echo $url; ?>/js/jqwidgets/scripts/gettheme.js"></script>
<!-- end jqwidgets -->
        <!-- Grid -->
<link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
<script type="text/javascript" src="<?php Echo $url; ?>/js/flexigrid/flexigrid.js"></script>
<!-- End Grid -->
        <!-- Smoke -->
        <link rel="stylesheet" href="<?php echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
        <script src="<?php echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
        <link id="theme" rel="stylesheet" href="<?php echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
        <!-- End Smoke -->
        <!-- Chosen -->
        <link href="<?php echo $url; ?>/js/jq_chosen/chosen/chosen.css" type="text/css" rel="stylesheet" media="screen" />  
        <script src="<?php echo $url; ?>/js/jq_chosen/chosen/chosen.jquery.js" type="text/javascript"></script>
        <!-- End Chosen -->
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
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/modificar_over.jpg','../../interfaz_modulos/botones/borrar_over.jpg','../../interfaz_modulos/botones/consultar_over.jpg')">
        <div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">    
            <div class="modulos" id="apDiv1"></div>
            <div class="inicio" id="apDiv2"></div>
            <div class="txt_titulo_secciones" id="apDiv11"> / Consumibles / Entrada / Carga Inicial</div>
            <div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
            <div id="DivContenido">
            <center>
            <br><br>
                <table border="0" style="margin: 0 auto 0 auto; width: 900px;">
                   
                    <tr>
                        <td>
                            <span class="txt_titulos_bold">Unidad Administrativa:</span><br/>
                        </td>
                        <td>
                            <?php                                
                                $CI = new Carga_Inicial();
                                $Unidades = $CI->ObtenerUnidadesAdministrativas();
                            ?>
                            
                                <?php
                                    echo '<select id="CBUnidadesAdministrativas" class="chzn-select" data-placeholder="Seleccione una Unidad Administrativa ..." >';
                                    echo '<option value="0"></option>';
                                    $Contador = 1;
                                    foreach($Unidades as $Unidad){
                                        echo "<option value='".$Unidad->ID."'>".utf8_encode($Unidad->Descripcion)."</option>";
                                        $Contador++;
                                    }
                                    echo '</select>';
                                ?>
                            
                        </td>
                    </tr>
                   
                    
                </table>
                <br>
                <div id="DivHeader" style="display:none">
                       <fieldset>
                                <legend>Encabezado</legend>
                                <input id="TBHTipoCarga" type="hidden" />
                                <input id="TBHFechaElaboracion" type="hidden" />
                                <table border="0" style="width: 100%;">
                                    <tr>
                                        <td>
                                            <span class="txt_titulos_bold">Estado del Documento:</span>&nbsp;&nbsp;
                                            <input type="radio" name="TBTipoCarga" value="R" />&nbsp;Real&nbsp;&nbsp;
                                            <input type="radio" name="TBTipoCarga" value="E" />&nbsp;Estimado
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="txt_titulos_bold">Fecha de Elaboracion del Documento:</span>&nbsp;&nbsp;
                                            <input id="TBFechaElaboracion" type="text" value='<?php echo date(Y); ?>/<?php echo date(m); ?>/<?php echo date(d); ?>' class="boxes_form150px"/>
                                        </td>
                                        <td>&nbsp;</td>
                                        
                                    </tr>
                                </table>
                            </fieldset><p/>
                </div>
                <div id="DivGrid"></div>
                </center>
            </div>
            <div id="apDiv6"></div>
            <div id="apDiv7"> <a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
            <div id="apDiv8" ><img src="../../interfaz_modulos/botones/agregar.jpg" name="Image6" width="120" height="45" border="0" id="Image6"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/agregar_over.jpg',1)" onclick="pop_AgregarCambs();" /></div>
            <div id="apDiv9" ><!-- <img src="../../interfaz_modulos/botones/consultar.jpg" name="Image9" width="120" height="45" border="0" id="Image9"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','../../interfaz_modulos/botones/consultar_over.jpg',1)" />--></div>
            <div id="apDiv10" ><img src="../../interfaz_modulos/botones/modificar.jpg" name="Image8" width="120" height="45" border="0" id="Image8" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','../../interfaz_modulos/botones/modificar_over.jpg',1)" style="cursor:pointer;" onclick="modificar_registro();"/></div>
            <div id="apDiv12"><img src="../../interfaz_modulos/botones/borrar.jpg" name="Image7" width="120" height="45" border="0" id="Image7"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../../interfaz_modulos/botones/borrar_over.jpg',1)" style="cursor:pointer" onclick="borrar_registro();"/></div>
        </div>
        <div id="AgergarCambs" title="Cambs - Agregar">
			        <table>
			            <tr>
			                <td>
			                    <?php
                                    echo '<select id="CboCambs" class="chzn-select" data-placeholder="Seleccione una Cambs ..." >';
                                    echo '<option value="0"></option>';
									$objConexion = new poolConnection();
									    	$con = $objConexion->Conexion();
									    	$objConexion->BaseDatos();
									    
									    	$StrConsulta = "SELECT * FROM sa_cabms c Where ePartidaPresupuestal>='1' and  ePartidaPresupuestal <='3000' ORDER BY  	vDescripcionCABMS";
									    	$TArticulo = $objConexion->Query($StrConsulta);
									    	if (mysql_num_rows($TArticulo) > 0) {
									    		$Contador = 0;
									    		while ($Articulo = mysql_fetch_array($TArticulo))
									    		{
									    			echo "<option value='$Articulo[Id_CABMS]'>$Articulo[vDescripcionCABMS]</option>";
									    			
									    		}
									    	}
                                    echo '</select>';
                                ?>
			                </td>
			            </tr>
			        </table>
			        <br></br>
			            <table>
			                <tr>
			                    <td><div class="txt_titulos_bold">Cantidad:</div></td>
			                    <td><input type='text' name='txtCantidad' id='txtCantidad' value='0' class="boxes_form50px" /></td>
			                </tr>
			            </table> 
			            <br></br>
			            <img src="../../interfaz_modulos/botones/aceptar.jpg" name="ImageA" width="120" height="45" border="0" id="ImageA"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageA','','../../interfaz_modulos/botones/aceptar_over.jpg',1)" onclick="AgregarCambs();" />
			            <div id="GridBusqueda"></div>
      </div>
      <div id="ModificarCambs" title="Cambs - Modificar">
			  <h4>Modificar Cantidad</h4>  
			    <br><br>
			    <table>
			          <tr>
			              <td>Id Cambs:</td>
			              <td><div id='IdCambsEDiv'></div></td>
			          </tr>
			          <tr>
			              <td>Descripcion:</td>
			              <td><div id='DesCambsEDiv'></div></td>
			          </tr>
			          <tr>
			              <td>Cantidad:</td>
			              <td><input type="text" name="txtCantidadM" id="txtCantidadM" value="" /></td>
			          </tr>
			    </table> 
			    <input type='hidden' name='txtIdEditar' id='txtIdEditar'/>     
      </div>
      <div id="EliminarCambs" title="Cambs - Eliminar">
			    <h4>Estas seguro que deseas borra este registro</h4>  
			    <br><br>
			    <table>
			          <tr>
			              <td>Id Cambs:</td>
			              <td><div id='IdCambsDiv'></div></td>
			          </tr>
			          <tr>
			              <td>Descripci—n:</td>
			              <td><div id='DesCambsDiv'></div></td>
			          </tr>
			    </table> 
			    <input type='hidden' name='txtIdEliminar' id='txtIdEliminar'/>
      </div>
      <script>
            $("#CBUnidadesAdministrativas").chosen().change(function () {
            // DetalleCargaInicial($(this).val());
            $("#DivHeader").show();
          
            ObtenerDetalleCargaInicial($("#CBUnidadesAdministrativas").val());
                                    
            });
            $("#CboCambs").chosen()
             $(".CboCambs").chosen(); 
              $(".CboCambs").chosen({allow_single_deselect:true}); 
                                
        </script>
    </body>
</html>