<?php

class cat_empleado extends poolConnection
{
    
    public function frm_add_empleado()
    {
        
        $frm="<form  id='frmAddEmpleado' name='frmAddEmpleado' mathod='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Empleado</div></td>
                            <td><input  type=\"text\" id=\"txtEmpleado\"  name=\"txtEmpleado\" class=\"boxes_form1 validate[required,minSize[6]]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >RFC</div></td>
                            <td><input  type=\"text\" id=\"txtRFC\"  name=\"txtRFC\" class=\"boxes_form150px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Cargo</div></td>
                            <td><input  type=\"text\" id=\"txtCargo\"  name=\"txtCargo\" class=\"boxes_form1 validate[required,minSize[1]]\" /></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Area de Adscripcion</div></td>
                            <td><input  type=\"text\" id=\"txtadscripcion\"  name=\"txtadscripcion\" class=\"boxes_form1 validate[required,minSize[1]]\" /></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Ubicacion</div></td>
                            <td><input  type=\"text\" id=\"txtUbicacion\"  name=\"txtUbicacion\" class=\"boxes_form1 validate[required,minSize[1]]\" /></td>
                        </tr>
                         <tr>
                            <td><div class=\"txt_titulos_bold\" >Domicilio</div></td>
                            <td><input  type=\"text\" id=\"txtDomicilio\"  name=\"txtDomicilio\" class=\"boxes_form1 validate[required,minSize[1]]\" /></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Zona de Pago</div></td>
                            <td><input  type=\"text\" id=\"txtZona\"  name=\"txtZona\" class=\"boxes_form100px validate[required,minSize[1]]\" /></td>
                            <td></td>
                        </tr>
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_empleado();\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddEmpleado\").validationEngine();
		});

		
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}
                        
		}
	</script>";
        
        
        return $frm;
    }
    public function nuevo_empleado($AData)
    {
        
        $empleado=$AData->Empleado;
        $rfc=$AData->Rfc;
        $zonapago=$AData->ZonaPago;
        $cargo=$AData->Cargo;
        $Adscripcion=$AData->Adscripcion;
        $Ubicacion=$AData->Ubicacion;
        $Domicilio=$AData->Domicilio;
        
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos($con);
        $sql="insert into sa_empleado values('0','$empleado','$rfc','$zonapago','$cargo','$Adscripcion','$Ubicacion','$Domicilio','Null','-1')";
        $R=$ObjAdd->Query($con,$sql);
        $ObjAdd->Cerrar($con,$R);
    }
    public function fmr_buscar_empleado()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Empleado</div></td>
                            <td><input  type=\"text\" id=\"txtEmpleado\"  name=\"txtEmpleado\" class=\"boxes_form1 validate[required]\" /></td>
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
    public function frm_editar_empleado($id)
    {
        
        
             $objData = new poolConnection();
             $con=$objData->Conexion();
             $objData->BaseDatos($con);
             $sql="Select vNombre,vRFC,eZonaPago,vCargo,Adscripcion,Ubicacion,Domicilio from sa_empleado where Id_NumEmpleado='$id'";
             $Rset=$objData->Query($con,$sql);
             while($fila=  mysqli_fetch_array($Rset))
             {
                 $vNombre=$fila[vNombre];
                 $vRFC=$fila[vRFC];
                 $eZonaPago=$fila[eZonaPago];
                 $vCargo=$fila[vCargo];
                 $Adscripcion=$fila[Adscripcion];
                 $Ubicacion=$fila[Ubicacion];
                 $Domicilio=$fila[Domicilio];
             }
             $objData->Cerrar($con,$Rset);
        
             $frm="<form id='frmEmpleadoEditar' name='frmEmpleadoEditar' method='post'>
                    <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Empleado</div></td>
                            <td><input  type=\"text\" id=\"txtEmpleadoE\"  name=\"txtEmpleadoE\" class=\"boxes_form1 validate[required]\" value='$vNombre' /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >RFC</div></td>
                            <td><input  type=\"text\" id=\"txtRFCE\"  name=\"txtRFCE\" class=\"boxes_form150px validate[required,minSize[6]]\" value='$vRFC'/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Cargo</div></td>
                            <td><input  type=\"text\" id=\"txtCargoE\"  name=\"txtCargoE\" class=\"boxes_form1 validate[required,minSize[1]]\"  value='$vCargo' /></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Area de Adscripcion</div></td>
                            <td><input  type=\"text\" id=\"txtadscripcionE\"  name=\"txtadscripcionE\" class=\"boxes_form1 validate[required,minSize[1]]\" value='$Adscripcion'/></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Ubicacion</div></td>
                            <td><input  type=\"text\" id=\"txtUbicacionE\"  name=\"txtUbicacionE\" class=\"boxes_form1 validate[required,minSize[1]]\" value='$Ubicacion'/></td>
                        </tr>
                         <tr>
                            <td><div class=\"txt_titulos_bold\" >Domicilio</div></td>
                            <td><input  type=\"text\" id=\"txtDomicilioE\"  name=\"txtDomicilioE\" class=\"boxes_form1 validate[required,minSize[1]]\" value='$Domicilio'/></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Zona de Pago</div></td>
                            <td><input  type=\"text\" id=\"txtZonaE\"  name=\"txtZonaE\" class=\"boxes_form100px validate[required,minSize[1]]\" value='$eZonaPago'/></td>
                            <td></td>
                        </tr>
                </table>
                 <br>
                 <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion($id);\" style=\"cursor:pointer\"/>
                 </form>
                 <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmEmpleadoEditar\").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != \"HELLO\") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
                                
			}    
		}
	</script>
             
                 ";  
             return $frm;
    }
    function editar_empleado($AData)
    {
        
        $empleado=$AData->Empleado;
        $rfc=$AData->Rfc;
        $zonapago=$AData->ZonaPago;
        $cargo=$AData->Cargo;
        $id=$AData->Id;
        $Adscripcion=$AData->Adscripcion;
        $Ubicacion=$AData->Ubicacion;
        $Domicilio=$AData->Domicilio;
        $sql="update sa_empleado set vNombre='$empleado',vRFC='$rfc',eZonaPago='$zonapago',vCargo='$cargo',Adscripcion='$Adscripcion',Ubicacion='$Ubicacion',Domicilio='$Domicilio' where Id_NumEmpleado='$id'";
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
                            <td><div class=\"txt_titulos_bold\" >Empleado</div></td>
                            <td><input  type=\"text\" id=\"txtEmpleado\"  name=\"txtEmpleado\" class=\"boxes_form1 validate[required]\" /></td>
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
  public function buscar_borrar($texto)
  {

      $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id_NumEmpleado,vNombre,vRFC,eZonaPago,vCargo from sa_empleado  where vNombre like '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_NumEmpleado]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vRFC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eZonaPago]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCargo]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_empleado($fila[Id_NumEmpleado]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Empleado', name : 'Id Empleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Empleado', name : 'Nombre', width :250, sortable :false, align: 'center'},
                                                            {display: 'RFC', name : 'RFC', width :190, sortable :false, align: 'center'},
                                                            {display: 'Zona de pago', name : 'Zona de pago', width :160, sortable :false, align: 'center'},
                                                            {display: 'Cargo', name : 'Cargo', width :160, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 930,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                          return $FliexGrid;
  }  
 public function borrar_empleado($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_empleado Where Id_NumEmpleado='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
     
 }
 public function frm_consultar_empleado()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Empleado</div></td>
                            <td><input  type=\"text\" id=\"txtEmpleado\"  name=\"txtEmpleado\" class=\"boxes_form1 validate[required]\" /></td>
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
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id_NumEmpleado,vNombre,vRFC,eZonaPago,vCargo from sa_empleado  where vNombre like '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_NumEmpleado]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vRFC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eZonaPago]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCargo]</td>
                                               </tr>";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Empleado', name : 'Id Empleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Empleado', name : 'Nombre', width :250, sortable :false, align: 'center'},
                                                            {display: 'RFC', name : 'RFC', width :190, sortable :false, align: 'center'},
                                                            {display: 'Zona de pago', name : 'Zona de pago', width :160, sortable :false, align: 'center'},
                                                            {display: 'Cargo', name : 'Cargo', width :160, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 930,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                          return $FliexGrid;
 }

}
?>
