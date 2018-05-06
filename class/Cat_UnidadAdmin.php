<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_UnidadAdmin
 *
 * @author armand
 */
class Cat_UnidadAdmin {
    
    
    
  public function frm_add_ua()
    {
           $CboZona = "";
           $objCboEmpleado = new poolConnection();
           $con=$objCboEmpleado->Conexion();
           $objCboEmpleado->BaseDatos($con);
           $sql="SELECT Id_NumEmpleado,vNombre FROM sa_empleado order by vNombre";
           $RSet=$objCboEmpleado->Query($con,$sql);
           while($fila=  mysqli_fetch_array($RSet))
           {
               $CboEmpleado .= "<option value='$fila[Id_NumEmpleado]'>$fila[vNombre]</option>";
           }
            $objCboEmpleado->Cerrar($con,$RSet);
            
           $objCboZona = new poolConnection();
           $con=$objCboZona->Conexion();
           $objCboZona->BaseDatos($con);
           $sql="SELECT Id_Zonas,vDescripcionZn FROM sa_zona order by vDescripcionZn";
           $RSet=$objCboZona->Query($con,$sql);
           while($fila=  mysqli_fetch_array($RSet))
           {
               $CboZona .= "<option value='$fila[Id_Zonas]'>$fila[vDescripcionZn]</option>";
           }
           $objCboZona->Cerrar($con,$RSet);
        $frm="<form  id='frmAddUA' name='frmAddUA' mathod='post'><center>
        <br><br>
            <div id=\"tabs\" class=\"tabs-bottom\" style=\"width: 800px;\">
                <ul>
                    <li><a href=\"#tabs-1\">Parte 1</a></li>
                    <li><a href=\"#tabs-2\">Parte 2</a></li>
                </ul>
                <div class=\"tabs-spacer\"></div>
                <div id=\"tabs-1\">
                        <table>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Codigo:</td>
                                <td><input  type=\"text\" id=\"txtCodigo\"  name=\"txtCodigo\" class=\"boxes_form150px validate[required,minSize[1]]\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >U. Administrativa:</td>
                                <td><input  type=\"text\" id=\"txtUA\"  name=\"txtUA\" class=\"boxes_form200px validate[required,minSize[5]]\" /></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Respon.:</td>
                                <td>
                                    <select name='cboEmpleado' id='cboEmpleado' class=\"validate[required]\">
                                        <option value=\"\"></option>
                                        $CboEmpleado
                                    </select>
                                </td>
                            </tr>
                             <tr>
                                <td><div class=\"txt_titulos_bold\" >Zona:</td>
                                <td>
                                    <select name='cboZona' id='cboZona'>
                                        <option value=\"\"></option>
                                        $CboZona
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Calle:</div></td>
                                <td><input  type=\"text\" id=\"txtCalle\"  name=\"txtCalle\" class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Numero:</div></td>
                                <td><input  type=\"text\" id=\"txtNumero\"  name=\"txtNumero\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Colonia:</div></td>
                                <td><input  type=\"text\" id=\"txtColonia\"  name=\"txtColonia\" class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Poblacion:</div></td>
                                <td><input  type=\"text\" id=\"txtPoblacion\"  name=\"txtPoblacion\" class=\"boxes_form200px\"/></td>
                            </tr> 
                        </table>
                </div>
                <div id=\"tabs-2\">
                    <table>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >C.P.:</div></td>
                                <td><input  type=\"text\" id=\"txtCP\"  name=\"txtCP\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Telefono:</div></td>
                                <td><input  type=\"text\" id=\"txtTelefono1\"  name=\"txtTelefono1\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Email:</div></td>
                                <td><input  type=\"text\" id=\"txtFax\"  name=\"txtFax\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >Prioridad:</div></td>
                                <td><input  type=\"text\" id=\"txtPrioridad\"  name=\"txtPrioridad\" class=\"boxes_form200px\"/></td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\" >&Aacute;rea Activa:</div></td>
                                <td><input type=\"checkbox\" id=\"chkAreaActiva\" name=\"chkAreaActiva\" value=\"YES\"></td>
                            </tr>
                             <tr>
                                <td><div class=\"txt_titulos_bold\" >No. Folio:</div></td>
                                <td><input  type=\"text\" id=\"txtNoFolio\"  name=\"txtNoFolio\" value=\"0\" class=\"boxes_form50px\"/></td>
                            </tr>
                             <tr>
                                <td><div class=\"txt_titulos_bold\" >Unidad Ejecutora:</div></td>
                                <td><input  type=\"text\" id=\"txtUEjecutora\"  name=\"txtUEjecutora\" class=\"boxes_form200px\"/></td>
                            </tr>
                             <tr>
                                <td><div class=\"txt_titulos_bold\" >Empleados:</div></td>
                                <td><input  type=\"text\" id=\"txtEmpleados\"  name=\"txtEmpleados\" value=\"0\" class=\"boxes_form50px\"/></td>
                            </tr>
                            
                    </table>
                        <br>
                    <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_ua();\" style=\"cursor:pointer\"/>
                
                </div>
                
            </div> 
            <script>
                $(function() {
                    $(\"#tabs\").tabs();

                    // fix the classes
                    $(\".tabs-bottom .ui-tabs-nav, .tabs-bottom .ui-tabs-nav >*\")
                        .removeClass(\"ui-corner-all ui-corner-top\")
                        .addClass(\"ui-corner-bottom\");

                    // move the nav to the bottom
                    $(\".tabs-bottom .ui-tabs-nav\").appendTo(\".tabs-bottom\");
                });
                jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddUA\").validationEngine();
		});

		
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}
                        
		}
         </script>
           </center>
           </form>
           ";
        return $frm;
    }
     public function nuevo_ua($AData)
    {
        $txtCodigo=$AData->txtCodigo;
        $txtUA=$AData->txtUA;
        $cboEmpleado=$AData->cboEmpleado;
        $cboZona=$AData->cboZona;
        $txtCalle=$AData->txtCalle;
        $txtNumero=$AData->txtNumero;
        $txtColonia=$AData->txtColonia;
        $txtPoblacion=$AData->txtPoblacion;
        $txtCP=$AData->txtCP;
        $txtTelefono1=$AData->txtTelefono1;
        $txtFax=$AData->txtFax;
        $txtPrioridad=$AData->txtPrioridad;
        $chkAreaActiva=$AData->chkAreaActiva;
        $txtNoFolio=$AData->txtNoFolio;
        $txtUEjecutora=$AData->txtUEjecutora;
        $txtEmpleados=$AData->txtEmpleados;
        
        $sql="insert into sa_unidadadmva values
            ('0',
              '$txtCodigo',
              '$cboEmpleado',
              '$cboZona',
              '$txtUA',
              '$txtCalle',
              '$txtNumero',
              '$txtColonia',
              '$txtPoblacion',
              '$txtCP',
              '$txtTelefono1',
              '$txtFax',
              '$txtPrioridad',
              '$chkAreaActiva',
              '$txtNoFolio',
              '$txtUEjecutora',
              '$txtEmpleados'
              )";
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos($con);
        $R=$ObjAdd->Query($con,$sql);
        $ObjAdd->Cerrar($con,$R);
        return $sql;
    } 
  public function fmr_buscar_ua()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >U. Administrativa</div></td>
                            <td><input  type=\"text\" id=\"txt\"  name=\"txt\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar();\"/></td>
                        </tr>
                </table>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmBuscador\").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}    
		}
	</script>
        <center><div id=\"DivBusqueda\"></div></center>";
        return $frm;
        
    } 
  public function frm_editar_ua($id)
    {
      
                
             $objData = new poolConnection();
             $con=$objData->Conexion();
             $objData->BaseDatos($con);
             $sqlE="SELECT * FROM sa_unidadadmva where Id='$id'";
             $Rset=$objData->Query($con,$sqlE);
             while($fila=  mysqli_fetch_array($Rset))
                  {
                        $txtCodigo=$fila[Id_Unidad];
                        $txtUA=$fila[vDescripcion];
                        $cboEmpleado=$fila[Id_ResponsableArea];
                        $cboZona=$fila[Id_Zonas];
                        $txtCalle=$fila[vCalle];
                        $txtNumero=$fila[VNumero];
                        $txtColonia=$fila[vColonia];
                        $txtPoblacion=$fila[vPoblacion];
                        $txtCP=$fila[vCP];
                        $txtTelefono1=$fila[vTelefono];
                        $txtFax=$fila[vTelFax];
                        $txtPrioridad=$fila[ePrioridad];
                        $chkAreaActiva=$fila[bAreaActiva];
                        $txtNoFolio=$fila[eNumFolio];
                        $txtUEjecutora=$fila[uEjec];
                        $txtEmpleados=$fila[eNumEmpleados];
                  }
             $objData->Cerrar($con,$Rset);

              $CboEmpleadoE = "";
              $objCboEmpleado = new poolConnection();
              $con=$objCboEmpleado->Conexion();
              $objCboEmpleado->BaseDatos($con);
              $sql="SELECT Id_NumEmpleado,vNombre FROM sa_empleado order by vNombre";
              $RSet=$objCboEmpleado->Query($con,$sql);
              while($fila=mysqli_fetch_array($RSet))
              {
                  if($cboEmpleado==$fila[Id_NumEmpleado])
                    {
                      $CboEmpleadoE .= "<option value='$fila[Id_NumEmpleado]' selected>$fila[vNombre]</option>";
                    }
                 else
                   {
                    $CboEmpleadoE .= "<option value='$fila[Id_NumEmpleado]'>$fila[vNombre]</option>"; 
                   }
                  
              }
               $objCboEmpleado->Cerrar($con,$RSet);

              $objCboZona = new poolConnection();
              $con=$objCboZona->Conexion();
              $objCboZona->BaseDatos();
              $sql="SELECT Id_Zonas,vDescripcionZn FROM sa_zona order by vDescripcionZn";
              $RSet=$objCboZona->Query($con,$sql);
              while($fila=  mysqli_fetch_array($RSet))
              {
                  if($cboZona==$fila[Id_Zonas])
                  {
                     $CboZonaE .= "<option value='$fila[Id_Zonas]' selected>$fila[vDescripcionZn]</option>"; 
                  } 
                 else
                 {
                     $CboZonaE .= "<option value='$fila[Id_Zonas]'>$fila[vDescripcionZn]</option>";
                 }
                  
              }
              $objCboZona->Cerrar($con,$RSet);
            if($chkAreaActiva=="YES")
            {
                $ckSelected="checked";
            } 
          else
              {
                 $ckSelected="";
              }
           $frm="<form  id='frmAddUA' name='frmAddUA' mathod='post'><center>
               <div id=\"tabs\" class=\"tabs-bottom\" style=\"width: 800px;\">
                   <ul>
                       <li><a href=\"#tabs-1\">Parte 1</a></li>
                       <li><a href=\"#tabs-2\">Parte 2</a></li>
                   </ul>
                   <div class=\"tabs-spacer\"></div>
                   <div id=\"tabs-1\">
                           <table>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Codigo:</td>
                                   <td><input  type=\"text\" id=\"txtCodigoE\"  name=\"txtCodigoE\" value='$txtCodigo' class=\"boxes_form150px validate[required,minSize[1]]\"/></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >U. Administrativa:</td>
                                   <td><input  type=\"text\" id=\"txtUAE\"  name=\"txtUAE\" value='$txtUA' class=\"boxes_form200px validate[required,minSize[5]]\" /></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Respon.:</td>
                                   <td>
                                       <select name='cboEmpleadoE' id='cboEmpleadoE' class=\"validate[required]\">
                                           <option value=\"\"></option>
                                           $CboEmpleadoE
                                       </select>
                                   </td>
                               </tr>
                                <tr>
                                   <td><div class=\"txt_titulos_bold\" >Zona:</td>
                                   <td>
                                       <select name='cboZonaE' id='cboZonaE'>
                                           <option value=\"\"></option>
                                           $CboZonaE
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Calle:</div></td>
                                   <td><input  type=\"text\" id=\"txtCalleE\"  name=\"txtCalleE\" value='$txtCalle' class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Numero:</div></td>
                                   <td><input  type=\"text\" id=\"txtNumeroE\"  name=\"txtNumeroE\" value='$txtNumero' class=\"boxes_form200px\"/></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Colonia:</div></td>
                                   <td><input  type=\"text\" id=\"txtColoniaE\"  name=\"txtColoniaE\" value='$txtColonia' class=\"boxes_form200px validate[required,minSize[5]]\"/></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Poblacion:</div></td>
                                   <td><input  type=\"text\" id=\"txtPoblacionE\"  name=\"txtPoblacionE\" value='$txtPoblacion' class=\"boxes_form200px\"/></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >C.P.:</div></td>
                                   <td><input  type=\"text\" id=\"txtCPE\"  name=\"txtCPE\" value='$txtCP' class=\"boxes_form200px\"/></td>
                               </tr>
                           </table>
                   </div>
                   <div id=\"tabs-2\">
                       <table>
                               
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Telefono:</div></td>
                                   <td><input  type=\"text\" id=\"txtTelefono1E\"  name=\"txtTelefono1E\" value='$txtTelefono1' class=\"boxes_form200px\"/></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Email:</div></td>
                                   <td><input  type=\"text\" id=\"txtFaxE\"  name=\"txtFaxE\" value='$txtFax' class=\"boxes_form200px\"/></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >Prioridad:</div></td>
                                   <td><input  type=\"text\" id=\"txtPrioridadE\"  name=\"txtPrioridadE\" value='$txtPrioridad' class=\"boxes_form200px\"/></td>
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\" >&Aacute;rea Activa:</div></td>
                                   <td><input type=\"checkbox\" id=\"chkAreaActiva\" name=\"chkAreaActiva\" value=\"YES\" $ckSelected></td>
                               </tr>
                                <tr>
                                   <td><div class=\"txt_titulos_bold\" >No. Folio:</div></td>
                                   <td><input  type=\"text\" id=\"txtNoFolioE\"  name=\"txtNoFolioE\"  value=\"$txtNoFolio\" class=\"boxes_form50px\"/></td>
                               </tr>
                                <tr>
                                   <td><div class=\"txt_titulos_bold\" >Unidad Ejecutora:</div></td>
                                   <td><input  type=\"text\" id=\"txtUEjecutoraE\"  name=\"txtUEjecutoraE\" value='$txtUEjecutora' class=\"boxes_form200px\"/></td>
                               </tr>
                                <tr>
                                   <td><div class=\"txt_titulos_bold\" >Empleados:</div></td>
                                   <td><input  type=\"text\" id=\"txtEmpleadosE\"  name=\"txtEmpleadosE\" value=\"$txtEmpleados\" class=\"boxes_form50px\"/></td>
                               </tr>

                       </table>
                           <br>
                       <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion($id);\" style=\"cursor:pointer\"/>

                   </div>

               </div> 
               <script>
                   $(function() {
                       $(\"#tabs\").tabs();

                       // fix the classes
                       $(\".tabs-bottom .ui-tabs-nav, .tabs-bottom .ui-tabs-nav >*\")
                           .removeClass(\"ui-corner-all ui-corner-top\")
                           .addClass(\"ui-corner-bottom\");

                       // move the nav to the bottom
                       $(\".tabs-bottom .ui-tabs-nav\").appendTo(\".tabs-bottom\");
                   });
                   jQuery(document).ready(function(){
                           // binds form submission and fields to the validation engine
                           jQuery(\"#frmAddUA\").validationEngine();
                   });


                   function checkHELLO(field, rules, i, options){
                           if (field.val() != \"HELLO\") {
                                   // this allows to use i18 for the error msgs
                                   return options.allrules.validate2fields.alertText;

                           }

                   }
            </script>
              </center>
              </form>
              ";
           return $frm;
    }
   function editar_ua($AData)
    {
        
        $txtCodigo=$AData->txtCodigo;
        $txtUA=$AData->txtUA;
        $cboEmpleado=$AData->cboEmpleado;
        $cboZona=$AData->cboZona;
        $txtCalle=$AData->txtCalle;
        $txtNumero=$AData->txtNumero;
        $txtColonia=$AData->txtColonia;
        $txtPoblacion=$AData->txtPoblacion;
        $txtCP=$AData->txtCP;
        $txtTelefono1=$AData->txtTelefono1;
        $txtFax=$AData->txtFax;
        $txtPrioridad=$AData->txtPrioridad;
        $chkAreaActiva=$AData->chkAreaActiva;
        $txtNoFolio=$AData->txtNoFolio;
        $txtUEjecutora=$AData->txtUEjecutora;
        $txtEmpleados=$AData->txtEmpleados;
        $id=$AData->Id;
        if($chkAreaActiva=="")
        {
            $chkAreaActiva="NO";
        }   
        $sql="UPDATE sa_unidadadmva SET 
                Id_Unidad = '$txtCodigo',
                Id_ResponsableArea = '$cboEmpleado',
                Id_Zonas = '$cboZona',
                vDescripcion = '$txtUA',
                vCalle = '$txtCalle',
                VNumero = '$txtNumero',
                vColonia = '$txtColonia',
                vPoblacion = '$txtPoblacion',
                vCP='$txtCP',
                vTelefono='$txtTelefono1',
                vTelFax='$txtFax',
                ePrioridad='$txtPrioridad',
                bAreaActiva='$chkAreaActiva',
                eNumFolio='$txtNoFolio',
                uEjec='$txtUEjecutora',
                eNumEmpleados='$txtEmpleados'
                where Id='$id'";
        
        $objUpdate = new poolConnection();
        $con=$objUpdate->Conexion();
        $objUpdate->BaseDatos($con);
        $R=$objUpdate->Query($con,$sql);
        $objUpdate->Cerrar($con,$R);
        return $sql;
    }
     function frm_buscador_borrar()
    {
        
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Borrar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >U.Administrativa</div></td>
                            <td><input  type=\"text\" id=\"txt\"  name=\"txt\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style='cursor:pointer' onclick=\"buscar_borrar();\"/></td>
                        </tr>
                </table>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmBuscador\").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}    
		}
	</script>
              <center><div id=\"DivBusqueda\"></div></center>";
        return $frm;   
    }  
public function buscar_borrar_ua($texto)
  {
          $FliexGrid = "<br><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="SELECT Id,Id_Unidad,Id_ResponsableArea,Id_Zonas,vDescripcion From sa_unidadadmva where vDescripcion like  '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Unidad]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ResponsableArea]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Zonas]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_ua($fila[Id]);\">&nbsp;</td>    
                                                    
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            
                                                            
                                                            {display: 'Codigo', name : 'Codigo', width :100, sortable :false, align: 'center'},
                                                            {display: 'Responsable', name : 'Responsable', width :150, sortable :false, align: 'center'},
                                                            {display: 'Zona', name : 'Colonia', width :100, sortable :false, align: 'center'},
                                                            {display: 'Descripcions', name : 'Poblacion', width :300, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 840,
                                            height: 350
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         return $FliexGrid;
         
  }
public function borrar_ua($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_unidadadmva Where Id='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
     
 }
  public function frm_consultar_ua()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >U.Administrativa</div></td>
                            <td><input  type=\"text\" id=\"txt\"  name=\"txt\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar_consultar();\"/></td>
                        </tr>
                </table>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmBuscador\").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}    
		}
	</script>
        <center><div id=\"DivBusqueda\"></div></center>";
        return $frm;
     
 }
 public function consultar($texto)
 {
     $FliexGrid = "<br><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";

                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="SELECT Id,Id_Unidad,Id_ResponsableArea,Id_Zonas,vDescripcion From sa_unidadadmva where vDescripcion like  '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Unidad]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ResponsableArea]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Zonas]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            
                                                            
                                                            {display: 'Codigo', name : 'Codigo', width :100, sortable :false, align: 'center'},
                                                            {display: 'Responsable', name : 'Responsable', width :200, sortable :false, align: 'center'},
                                                            {display: 'Zona', name : 'Colonia', width :100, sortable :false, align: 'center'},
                                                            {display: 'Descripcions', name : 'Poblacion', width :300, sortable :false, align: 'center'},
                                                            
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 740,
                                            height: 350
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                         return $FliexGrid;
 }
}

?>
