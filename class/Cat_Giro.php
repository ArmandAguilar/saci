<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_Giro
 *
 * @author armand
 */
class Cat_Giro 
{
  public function frm_add_empleado()
    {
        
        $frm="<form  id='frmAddGiro' name='frmAddGiro' mathod='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                        
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Giro</div></td>
                            <td><input  type=\"text\" id=\"txtGiro\"  name=\"txtGiro\" class=\"boxes_form150px validate[required,minSize[6]]\" /></td>
                            <td></td>
                        </tr>
                        
                        
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_giro();\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddGiro\").validationEngine();
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
   public function nuevo_giro($AData)
    {
        $giro=$AData->Giro;
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos($con);
        $sql="insert into sa_giro values('0','$giro')";
        $R=$ObjAdd->Query($con,$sql);
        $ObjAdd->Cerrar($con,$R);
    } 
   public function fmr_buscar_giro()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Giro</div></td>
                            <td><input  type=\"text\" id=\"txtGiro\"  name=\"txtGiro\" class=\"boxes_form1 validate[required]\" /></td>
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
  public function frm_editar_giro($id)
    {
        
        
             $objData = new poolConnection();
             $con=$objData->Conexion();
             $objData->BaseDatos($con);
             $sql="Select Id_Giro,vDescripcionGR from sa_giro where Id_Giro='$id'";
             $Rset=$objData->Query($con,$sql);
             while($fila=  mysqli_fetch_array($Rset))
             {
                 $Id_Giro=$fila[Id_Giro];
                 $vDescripcionGR=$fila[vDescripcionGR];
             }
             $objData->Cerrar($con,$Rset);
        
             $frm="<form id='frmGiroEditar' name='frmGiroEditar' method='post'>
                    <table>
                       
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Giro</div></td>
                            <td><input  type=\"text\" id=\"txtGiroE\"  name=\"txtGiroE\" class=\"boxes_form150px validate[required,minSize[6]]\" value='$vDescripcionGR'/></td>
                            <td></td>
                        </tr>
                        
                </table>
                 <br>
                 <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion_Giro($Id_Giro);\" style=\"cursor:pointer\"/>
                 </form>
                 <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmGiroEditar\").validationEngine();
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
 function editar_giro($AData)
    {
        
        $giro=$AData->Giro;
        $id=$AData->Id;
        $sql="update sa_giro set vDescripcionGR='$giro' where Id_Giro='$id'";
        $objUpdate = new poolConnection();
        $con=$objUpdate->Conexion();
        $objUpdate->BaseDatos();
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
                            <td><div class=\"txt_titulos_bold\" >Giro</div></td>
                            <td><input  type=\"text\" id=\"txtGiro\"  name=\"txtGiro\" class=\"boxes_form1 validate[required]\" /></td>
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
 public function buscar_borrar_giro($texto)
  {

      $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";

        $objBuscar = new poolConnection();
        $con=$objBuscar->Conexion();
        $objBuscar->BaseDatos($con);
        $sql="Select Id_Giro,vDescripcionGR from sa_giro where vDescripcionGR like '%$texto%'";
        $RSet=$objBuscar->Query($con,$sql);
        while($fila=  mysqli_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Giro]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionGR]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_giro($fila[Id_Giro]);\">&nbsp;</td>
                              </tr>
                          ";
        }
        $objBuscar->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [
                                          {display: 'Id Giro', name : 'Id Giro', width :90, sortable :false, align: 'center'},
                                          {display: 'Giro', name : 'Giro', width :450, sortable :false, align: 'center'},
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
public function borrar_giro($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_giro Where Id_Giro='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
     
 }
 public function frm_consultar_giro()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Giro</div></td>
                            <td><input  type=\"text\" id=\"txtGiro\"  name=\"txtGiro\" class=\"boxes_form1 validate[required]\" /></td>
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
        $sql="Select Id_Giro,vDescripcionGR from sa_giro where vDescripcionGR like '%$texto%'";
        $RSet=$objBuscar->Query($con,$sql);
        while($fila=  mysqli_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Giro]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionGR]</td>
                              </tr>
                          ";
        }
        $objBuscar->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [
                                          {display: 'Id Giro', name : 'Id Giro', width :90, sortable :false, align: 'center'},
                                          {display: 'Giro', name : 'Giro', width :450, sortable :false, align: 'center'},
                                          

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
