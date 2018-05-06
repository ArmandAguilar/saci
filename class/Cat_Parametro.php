<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_Parametro
 *
 * @author armand
 */
class Cat_Parametro {
    
 public function frm_add_parametro()
    {
        
        $frm="<form  id='frmAddParametro' name='frmAddParametro' mathod='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                        
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Parametro</div></td>
                            <td><input  type=\"text\" id=\"txtClave\"  name=\"txtClave\" class=\"boxes_form100px validate[required,minSize[1]]\" />-<input  type=\"text\" id=\"txtParametro\"  name=\"txtParametro\" class=\"boxes_form400px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Valor</div></td>
                            <td><input  type=\"text\" id=\"txtValor\"  name=\"txtValor\" class=\"boxes_form400px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        
                        
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_parametro();\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddParametro\").validationEngine();
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
  public function nuevo_parametro($AData)
    {
        $Clave = $AData->Clave;
        $parametro=$AData->Parametro;
        $valor = $AData->Valor;
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos();
        $sql="insert into sa_parametro values('0','$Clave','$parametro','$valor')";
        $ObjAdd->Query($sql);
        $ObjAdd->Cerrar($con);
    } 
public function fmr_buscar_parametro()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Parametro</div></td>
                            <td><input  type=\"text\" id=\"txtParametro\"  name=\"txtParametro\" class=\"boxes_form1 validate[required]\" /></td>
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
    
public function frm_editar_parametro($id)
    {
        
 
             $objData = new poolConnection();
             $con=$objData->Conexion();
             $objData->BaseDatos();
             $sql="Select Id,Id_Parametro,sDescripcion,sValor from sa_parametro where Id='$id'";
             $Rset=$objData->Query($sql);
             while($fila=  mysql_fetch_array($Rset))
             {
                 $Id=$fila[Id];
                 $Id_Parametro=$fila[Id_Parametro];
                 $sDescripcion=$fila[sDescripcion];
                 $sValor=$fila[sValor];
             }
             mysql_free_result($Rset);
             $objData->Cerrar($con);
        
            $frm="<form  id='frmEditParametro' name='frmEditParametro' mathod='post'><br><fieldset>
                
                <table>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Parametro</div></td>
                            <td><input  type=\"text\" id=\"txtClaveE\"  name=\"txtClaveE\" class=\"boxes_form100px validate[required,minSize[1]]\" value='$Id_Parametro'/>-<input  type=\"text\" id=\"txtParametroE\"  name=\"txtParametroE\" value='$sDescripcion' class=\"boxes_form400px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Valor</div></td>
                            <td><input  type=\"text\" id=\"txtValorE\"  name=\"txtValorE\" value='$sValor'  class=\"boxes_form400px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        
                        
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion($Id);\" style=\"cursor:pointer\"/>
              
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmEditParametro\").validationEngine();
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
    
  function editar_parametro($AData)
    {
        $Clave = $AData->Clave;
        $des=$AData->Descripcion;
        $val=$AData->Valor;
        $id=$AData->id;
        $sql="update sa_parametro set Id_Parametro='$Clave',sDescripcion='$des',sValor='$val' where Id='$id'";
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
                            <td><div class=\"txt_titulos_bold\" >Parametro</div></td>
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
 public function buscar_borrar_parametro($texto)
  {
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
       
        $objBuscar = new poolConnection();
        $con=$objBuscar->Conexion();
        $objBuscar->BaseDatos();
        $sql="Select Id_Parametro,sDescripcion,sValor from sa_parametro where sDescripcion like '%$_POST[$texto]%'";
        $RSet=$objBuscar->Query($sql);
        while($fila=  mysql_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Parametro]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[sDescripcion]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[sValor]</td>    
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/borrar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/borrar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_parametro($fila[Id_Parametro]);\">&nbsp;</td>
                              </tr>
                          ";
        }
        mysql_free_result($RSet);
        $objBuscar->Cerrar($con);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [
                                          {display: 'Id Parametro', name : 'Id Tipo Bien', width :80, sortable :false, align: 'center'},
                                          {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                          {display: 'Valor', name : 'Valor', width :200, sortable :false, align: 'center'},
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
 public function borrar_parametro($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos();
     $sql="Delete from sa_parametro Where Id_Parametro='$id'";
     $objBorrar->Query($sql);
     $objBorrar->Cerrar($con);
     
 }
public function frm_consultar_parametro()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Parametro</div></td>
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
        $objBuscar->BaseDatos();
        $sql="Select Id_Parametro,sDescripcion,sValor from sa_parametro where sDescripcion like '%$_POST[$texto]%'";
        $RSet=$objBuscar->Query($sql);
        while($fila=  mysql_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Parametro]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[sDescripcion]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[sValor]</td>    
                              </tr>
                          ";
        }
        mysql_free_result($RSet);
        $objBuscar->Cerrar($con);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [
                                          {display: 'Id Parametro', name : 'Id Tipo Bien', width :80, sortable :false, align: 'center'},
                                          {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                          {display: 'Valor', name : 'Valor', width :200, sortable :false, align: 'center'},
                                          

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
}
?>
