<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_TipoBien
 *
 * @author armand
 */
class Cat_EstadoBien {
    
     public function frm_add_tb()
    {
        
        $frm="<form  id='frmAddTBI' name='frmAddTBI' mathod='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Clave</div></td>
                            <td><input  type=\"text\" id=\"txtClave\"  name=\"txtClave\" class=\"boxes_form100px validate[required,minSize[1]]\" /></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Estado del Bien</div></td>
                            <td><input  type=\"text\" id=\"txtTBI\"  name=\"txtTBI\" class=\"boxes_form400px validate[required,minSize[6]]\" /></td>
                        </tr>
                        
                        
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_tbi();\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddTBI\").validationEngine();
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
     public function nuevo_tb($AData)
    {
        $Clave =$AData->Clave; 
        $tbi=$AData->TBI;
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos();
        $sql="insert into sa_estadobien values('0','$Clave','$tbi')";
        $ObjAdd->Query($sql);
        $ObjAdd->Cerrar($con);
    } 
 public function fmr_buscar_tb()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Estado Bien</div></td>
                            <td><input  type=\"text\" id=\"txtTBI\"  name=\"txtTBI\" class=\"boxes_form1 validate[required]\" /></td>
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
    
     public function frm_editar_tb($id)
    {
        
 
             $objData = new poolConnection();
             $con=$objData->Conexion();
             $objData->BaseDatos();
             $sql="Select Id,Id_EdoBien,vDescripcion from sa_estadobien where Id='$id'";
             $Rset=$objData->Query($sql);
             while($fila=  mysql_fetch_array($Rset))
             {
                 $Id=$fila[Id];
                 $Id_TipoBien=$fila[Id_EdoBien];
                 $vDescripcion=$fila[vDescripcion];
             }
             mysql_free_result($Rset);
             $objData->Cerrar($con);
        
             $frm="<form id='frmEditar' name='frmEditar' method='post'>
                    <table>
                       <tr>
                            <td><div class=\"txt_titulos_bold\" >Clave</div></td>
                            <td><input  type=\"text\" id=\"txtClaveE\"  name=\"txtClaveE\" class=\"boxes_form100px validate[required,minSize[1]]\" value='$Id_TipoBien'/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Estado del Bien</div></td>
                            <td><input  type=\"text\" id=\"txtTBIE\"  name=\"txtTBIE\" class=\"boxes_form400px validate[required,minSize[6]]\" value='$vDescripcion'/></td>
                            <td></td>
                        </tr>
                        
                </table>
                 <br>
                 <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion($Id);\" style=\"cursor:pointer\"/>
                 </form>
                 <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmEditar\").validationEngine();
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
    
  function editar_tb($AData)
    {
        $Clave=$AData->Clave;
        $tbi=$AData->TBI;
        $id=$AData->id;
        $sql="update sa_estadobien set Id_EdoBien='$Clave',vDescripcion='$tbi' where Id='$id'";
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
                            <td><div class=\"txt_titulos_bold\" >Estado del Bien</div></td>
                            <td><input  type=\"text\" id=\"txtTBI\"  name=\"txtTBI\" class=\"boxes_form1 validate[required]\" /></td>
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
 public function buscar_borrar_tb($texto)
  {
       $FliexGrid = "<br><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos();
                          $sql="Select Id,Id_EdoBien,vDescripcion from sa_estadobien where vDescripcion like '%$_POST[txtTBI]%'";
                          $RSet=$objBuscar->Query($sql);
                          while($fila=  mysql_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_EdoBien]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_tbi($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          mysql_free_result($RSet);
                          $objBuscar->Cerrar($con);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Id Tipo Bien', name : 'Id Tipo Bien', width :70, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :400, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 640,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         echo "$FliexGrid";
   }  
 public function borrar_tb($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos();
     $sql="Delete from sa_estadobien Where Id='$id'";
     $objBorrar->Query($sql);
     $objBorrar->Cerrar($con);
     
 }
 public function frm_consultar_tb()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Estado del Bien</div></td>
                            <td><input  type=\"text\" id=\"txtTBI\"  name=\"txtTBI\" class=\"boxes_form1 validate[required]\" /></td>
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
                          $sql="Select Id_EdoBien,vDescripcion from sa_estadobien where vDescripcion like '%$texto%'";
                          $RSet=$objBuscar->Query($sql);
                          while($fila= mysql_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_EdoBien]</td>
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
                                                            {display: 'Id Estado Bien', name : 'Id Tipo Bien', width :80, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 530,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                         echo "$FliexGrid"; 
 }
    
    
    
}

?>
