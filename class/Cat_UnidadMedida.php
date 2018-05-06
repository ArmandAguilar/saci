<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_UnidadMedida
 *
 * @author armand
 */
class Cat_UnidadMedida {
    
     public function frm_add_Umedidad()
    {
        
        $frm="<form  id='frmAddUnidadaMedida' name='frmAddUnidadaMedidad' mathod='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                        
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Unidad de Medidad</div></td>
                            <td><input  type=\"text\" id=\"txtUmedida\"  name=\"txtUmedida\" class=\"boxes_form200px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        
                        
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_Umedida();\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddUnidadaMedida\").validationEngine();
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
   public function nuevo_Umedidad($AData)
    {
        $Umedidad=$AData->UMedida;
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos();
        $sql="insert into sa_umedida values('0','$Umedidad')";
        $ObjAdd->Query($sql);
        $ObjAdd->Cerrar($con);
    } 
   public function fmr_buscar_Umedidad()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Unidad de Medidad</div></td>
                            <td><input  type=\"text\" id=\"txtUmedida\"  name=\"txtUmedida\" class=\"boxes_form1 validate[required]\" /></td>
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
  public function frm_editar_Umedidad($id)
    {
        
        
             $objData = new poolConnection();
             $con=$objData->Conexion();
             $objData->BaseDatos();
             $sql="Select Id_UMedida,vDescripcion from sa_umedida where Id_UMedida='$id'";
             $Rset=$objData->Query($sql);
             while($fila=  mysql_fetch_array($Rset))
             {
                 $Id_UMedida=$fila[Id_UMedida];
                 $vDescripcion=$fila[vDescripcion];
             }
             mysql_free_result($Rset);
             $objData->Cerrar($con);
        
             $frm="<form id='frmUmedidaEditar' name='frmUmedidaEditar' method='post'>
                    <table>
                       
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Unidad de Medida</div></td>
                            <td><input  type=\"text\" id=\"txtUmedidaE\"  name=\"txtUmedidaE\" class=\"boxes_form150px validate[required,minSize[6]]\" value='$vDescripcion'/></td>
                            <td></td>
                        </tr>
                        
                </table>
                 <br>
                 <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion_Umedida($Id_UMedida);\" style=\"cursor:pointer\"/>
                 </form>
                 <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmUmedidaEditar\").validationEngine();
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
 function editar_Umedidad($AData)
    {
        
        $Umedidad=$AData->Umedida;
        $id=$AData->Id;
        $sql="update sa_umedida set vDescripcion='$Umedidad' where Id_UMedida='$id'";
        $objUpdate = new poolConnection();
        $con=$objUpdate->Conexion();
        $objUpdate->BaseDatos();
        $objUpdate->Query($sql);
        $objUpdate->Cerrar($con);
        return $sql;
    }
   function frm_buscador_borrar()
    {
        
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Borrar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Unidada de Medida</div></td>
                            <td><input  type=\"text\" id=\"txtUmedida\"  name=\"txtUmedida\" class=\"boxes_form1 validate[required]\" /></td>
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
 public function buscar_borrar_Umedidad($texto)
  {

      $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";

        $objBuscar = new poolConnection();
        $con=$objBuscar->Conexion();
        $objBuscar->BaseDatos();
        $sql="Select Id_UMedida,vDescripcion from sa_umedida where vDescripcion like '%$texto%'";
        $RSet=$objBuscar->Query($sql);
        while($fila=  mysql_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_Umedida($fila[Id_UMedida]);\">&nbsp;</td>
                              </tr>
                          ";
        }
        mysql_free_result($RSet);
        $objBuscar->Cerrar($con);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [
                                          {display: 'Id Giro', name : 'Id U. Medida', width :90, sortable :false, align: 'center'},
                                          {display: 'Giro', name : 'Unidada de Medida', width :450, sortable :false, align: 'center'},
                                          {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 730,
                          height: 200
                          }

                          );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
        return $FliexGrid;                     
  } 
public function borrar_Umedidad($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos();
     $sql="Delete from sa_umedida Where Id_UMedida='$id'";
     $objBorrar->Query($sql);
     $objBorrar->Cerrar($con);
     
 }
 public function frm_consultar_Umedidad()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Unidad de Medida</div></td>
                            <td><input  type=\"text\" id=\"txtUmedida\"  name=\"txtUmedida\" class=\"boxes_form1 validate[required]\" /></td>
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
        $objBuscar->BaseDatos();
        $sql="Select Id_UMedida,vDescripcion from sa_umedida where vDescripcion like '%$texto%'";
        $RSet=$objBuscar->Query($sql);
        while($fila=  mysql_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                              </tr>
                          ";
        }
        mysql_free_result($RSet);
        $objBuscar->Cerrar($con);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [
                                          {display: 'Id U. Medida', name : 'Id U. Medida', width :90, sortable :false, align: 'center'},
                                          {display: 'Unidad Medida', name : 'Unidada Medida', width :450, sortable :false, align: 'center'},
                                          

                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 600,
                          height: 200
                          }

                          );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
        return $FliexGrid; 
 }
}

?>
