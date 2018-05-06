<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoMovimiento
 *
 * @author armand
 */
class Cat_TipoMovimiento {
     public function frm_add_tmov()
    {
        
        $frm="<form  id='frmAddMovimiento' name='frmAddMovimiento' mathod='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Codigo</div></td>
                            <td><input  type=\"text\" id=\"txtCodigo\"  name=\"txtCodigo\" class=\"boxes_form50px validate[required,minSize[4]]\" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Descripcion</div></td>
                            <td><input  type=\"text\" id=\"txtdescripcion\"  name=\"txtDescripcion\" class=\"boxes_form400px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\">Entrada:</div></td>
                            <td><input type='checkbox' id='chkEntrada' name='chkEntrada' value='YES'/></td>
                            <td></div></td>
                        </tr>
                        <tr>
                             <td><div class=\"txt_titulos_bold\">Baja:</div></td>
                             <td><input type='checkbox' id='chkBaja' name='chkBaja' value='YES'/></td>
                             <td></td>
                        </tr>
                        <tr>
                             <td><div class=\"txt_titulos_bold\">Salida:</td>
                             <td><input type='checkbox' id='chkSalida' name='chkSalida' value='YES'/></td>
                             <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\">Tipo Almacen:
                                 <select id='cboTipo' name='cboTipo' class=\"validate[required]\">
                                        <option value=''></option>
                                         <option value='C'>Consumible</option>
                                         <option value='I'>Inventariable</option>
                                         
                                 </select>
                               </div>
                            </td>
                            <td><div class=\"txt_titulos_bold\">Activo:<input type='checkbox' id='chkActivo' name='chkActivo' value='YES'></div></td>
                            <td></td>
                        </tr>
                        
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_tmov();\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddMovimiento\").validationEngine();
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
  public function nuevo_tmov($AData)
    {

        $Id_TipoMovimiento=$AData->txtCodigo;
        $vDescripcion=$AData->txtdescripcion;
        $bEntrada=$AData->chkEntrada;
        $bBaja=$AData->chkSalida;
        $cTipoAlmacen=$AData->cboTipo;
        $bSalida=$AData->chkSalida;
        $bEstadoMov=$AData->chkActivo;
        
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos($con);
        $sql="insert into sa_tipomovimiento values('0','$Id_TipoMovimiento','$vDescripcion','$bEntrada','$bBaja','$cTipoAlmacen','$bSalida','$bEstadoMov')";
        $R=$ObjAdd->Query($con,$sql);
        $ObjAdd->Cerrar($con,$R);
    }
  public function fmr_buscar_tmov()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Tipo de movimeinto</div></td>
                            <td><input  type=\"text\" id=\"txtbuscar\"  name=\"txtbuscar\" class=\"boxes_form1 validate[required]\" /></td>
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
  public function frm_editar_tmov($id)
    {
        
 
             $objData = new poolConnection();
             $con=$objData->Conexion();
             $objData->BaseDatos($con);
             $sql="SELECT Id,Id_TipoMovimiento,vDescripcion,bEntrada,bBaja,cTipoAlmacen,bSalida,bEstadoMov FROM sa_tipomovimiento WHERE Id='$id'";        
             $Rset=$objData->Query($con,$sql);
             while($fila=mysqli_fetch_array($Rset))
             {
                 $Id_TipoMovimiento=$fila[Id_TipoMovimiento];
                 $vDescripcion=$fila[vDescripcion];
                 $bEntrada=$fila[bEntrada];
                 $bBaja=$fila[bBaja];
                 $cTipoAlmacen=$fila[cTipoAlmacen];
                 $bSalida=$fila[bSalida];
                 $bEstadoMov=$fila[bEstadoMov];
             }
             $objData->Cerrar($con,$Rset);
             $Entrada="";
             $Baja="";
             $Salida="";
             $CSelected="";
             $ISelected="";
             if($bEntrada=="YES")
             {
                 $Entrada="checked";
             } 
            if($bBaja=="YES")
             {
                 $Baja="checked";
             }
            if($bSalida=="YES")
             {
                 $Salida="checked";
             }
             if($bEstadoMov=="YES")
             {
                 $EstadoMov="checked";
             }
             if($cTipoAlmacen=="C")
             {
                $CSelected = "selected";
             }
             if($cTipoAlmacen=="I")
             {
                $ISelected = "selected"; 
             }
             $frm="<form  id='frmEditMovimiento' name='frmEditMovimiento' mathod='post'><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Codigo</div></td>
                            <td><input  type=\"text\" id=\"txtCodigoE\"  name=\"txtCodigoE\" value='$Id_TipoMovimiento' class=\"boxes_form50px validate[required,minSize[4]]\" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Descripcion</div></td>
                            <td><input  type=\"text\" id=\"txtdescripcionE\"  name=\"txtDescripcionE\" value='$vDescripcion' class=\"boxes_form400px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\">Entrada:</div></td>
                            <td><input type='checkbox' id='chkEntradaE' name='chkEntradaE' value='YES' $Entrada/></td>
                            <td></div></td>
                        </tr>
                        <tr>
                             <td><div class=\"txt_titulos_bold\">Baja:</div></td>
                             <td><input type='checkbox' id='chkBajaE' name='chkBajaE' value='YES' $Baja/></td>
                             <td></td>
                        </tr>
                        <tr>
                             <td><div class=\"txt_titulos_bold\">Salida:</td>
                             <td><input type='checkbox' id='chkSalidaE' name='chkSalidaE' value='YES' $Salida/></td>
                             <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\">Tipo Almacen:
                                 <select id='cboTipoE' name='cboTipoE' class=\"validate[required]\">
                                        <option value=''></option>
                                         <option value='C' $CSelected>Consumible</option>
                                         <option value='I' $ISelected>Inventariable</option>
                                         
                                 </select>
                               </div>
                            </td>
                            <td><div class=\"txt_titulos_bold\">Activo:<input type='checkbox' id='chkActivoE' name='chkActivoE' value='YES' $EstadoMov></div></td>
                            <td></td>
                        </tr>
                        
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion($id);\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddMovimiento\").validationEngine();
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
     function editar_tmov($AData)
    {
        
        $Id_TipoMovimiento=$AData->txtCodigo;
        $vDescripcion=$AData->txtdescripcion;
        $bEntrada=$AData->chkEntrada;
        $bBaja=$AData->chkSalida;
        $cTipoAlmacen=$AData->cboTipo;
        $bSalida=$AData->chkSalida;
        $bEstadoMov=$AData->chkActivo;
        $id=$AData->id;
        $sql="update sa_tipomovimiento set 
            Id_TipoMovimiento='$Id_TipoMovimiento',
            vDescripcion='$vDescripcion',
            bEntrada='$bEntrada',
            bBaja='$bBaja',
            cTipoAlmacen='$cTipoAlmacen',
            bSalida='$bSalida',
            bEstadoMov='$bEstadoMov'
            where Id='$id'
            ";
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
                            <td><div class=\"txt_titulos_bold\" >Tipo de movimiento</div></td>
                            <td><input  type=\"text\" id=\"txtPatron\"  name=\"txtPatron\" class=\"boxes_form1 validate[required]\" /></td>
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
 public function buscar_borrar_tmov($texto)
  {
      $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="SELECT Id,Id_TipoMovimiento,vDescripcion,bEntrada,bBaja,cTipoAlmacen,bSalida,bEstadoMov FROM sa_tipomovimiento WHERE vDescripcion like  '%$texto%' ";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_TipoMovimiento]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bEntrada]</td> 
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bBaja]</td>      
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bSalida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bEstadoMov]</td>
                                                   <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/borrar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/borrar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_tmov($fila[Id]);\">&nbsp;</td>
                                                       </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Tipo Movimiento', name : 'Id Tipo Movimiento', width :80, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                                            {display: 'Entrada', name : 'Valor', width :200, sortable :false, align: 'center'},
                                                            {display: 'Baja', name : 'Baja', width :200, sortable :false, align: 'center'},
                                                            {display: 'Salida', name : 'Salida', width :200, sortable :false, align: 'center'},
                                                            {display: 'Estado  de Movimiento', name : 'Estado  de Movimiento', width :200, sortable :false, align: 'center'},
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
   public function borrar_tmov($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_tipomovimiento Where Id='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
     
 }
 public function frm_consultar_tmov()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Tipo de movimiento</div></td>
                            <td><input  type=\"text\" id=\"txtParametro\"  name=\"txtParametro\" class=\"boxes_form1 validate[required]\" /></td>
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
                          $sql="SELECT Id,Id_TipoMovimiento,vDescripcion,bEntrada,bBaja,cTipoAlmacen,bSalida,bEstadoMov FROM sa_tipomovimiento WHERE vDescripcion like  '%$texto%' ";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_TipoMovimiento]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bEntrada]</td> 
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bBaja]</td>      
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bSalida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bEstadoMov]</td>
                                               </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Tipo Movimiento', name : 'Id Tipo Movimiento', width :80, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                                            {display: 'Entrada', name : 'Valor', width :200, sortable :false, align: 'center'},
                                                            {display: 'Baja', name : 'Baja', width :200, sortable :false, align: 'center'},
                                                            {display: 'Salida', name : 'Salida', width :200, sortable :false, align: 'center'},
                                                            {display: 'Estado  de Movimiento', name : 'Estado  de Movimiento', width :200, sortable :false, align: 'center'},
                                                         
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
