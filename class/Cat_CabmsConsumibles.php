<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_CabmsConsumibles
 *
 * @author armand
 */
class Cat_CabmsConsumibles {
    public function frm_add_cabmsconsumibles()
    {
            $cboCabms = "";
           $objCboCabms = new poolConnection();
           $con=$objCboCabms->Conexion();
           $objCboCabms->BaseDatos($con);
           $sql="SELECT Id_CABMS,vDescripcionCABMS FROM sa_cabms order by vDescripcionCABMS";
           $RSet=$objCboCabms->Query($sql);
           while($fila=  mysqli_fetch_array($RSet))
           {
               $cboCabms .= "<option value='$fila[Id_CABMS]'>$fila[vDescripcionCABMS]</option>";
           }
           $objCboCabms->Cerrar($con,$RSet);

           $cboUMedida = "";
           $objCboUMedida = new poolConnection();
           $con=$objCboUMedida->Conexion();
           $objCboUMedida->BaseDatos($con);
           $sql="SELECT Id_UMedida,vDescripcion FROM sa_umedida order by vDescripcion";
           $RSet=$objCboUMedida->Query($con,$sql);
           while($fila=  mysqli_fetch_array($RSet))
           {
               $cboUMedida .= "<option value='$fila[Id_UMedida]'>$fila[vDescripcion]</option>";
           }
           $objCboUMedida->Cerrar($con,$RSet);
        
        $frm="<form  id='frmAddCabmsC' name='frmAddCabmsC'' mathod='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                        
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Clave Art.CABMD:</div></td>
                            <td><input  type=\"text\" id=\"txtICveInternaAC\"  name=\"txtICveInternaAC\" class=\"boxes_form50px validate[required,minSize[1]]\" />&nbsp;&nbsp;<input  type=\"text\" id=\"txtCveARTCABMS\"  name=\"txtCveARTCABMS\" class=\"boxes_form50px validate[required,minSize[1]]\" /></td>
                            <td><input  type=\"text\" id=\"txtvDescripcion\"  name=\"txtvDescripcion\" class=\"boxes_form400px validate[required,minSize[1]]\" /></td>
                        </tr>
                </table>
                <table>
                    <tr>
                            <td><div class=\"txt_titulos_bold\" >CABMD:</div></td>
                            <td>
                                <select id='cboCabms' name='cboCabms' class=\"validate[required,minSize[1]]\" >
                                      <option value=''></option>
                                       $cboCabms
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Unidada de Medida:</div></td>
                            <td>
                                <select id='cboMedida' name='cboMedida' class=\"validate[required,minSize[1]]\">
                                   <option value=''></option>
                                     $cboUMedida
                                </select>         
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                             <td><div class=\"txt_titulos_bold\" >Partida Presupuestal:</div></td>
                             <td><input  type=\"text\" id=\"txtPPresupuestal\"  name=\"txtPPresupuestal\" class=\"boxes_form50px validate[required,minSize[1]]\" /></td>
                             <td></td>
                        </tr>
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_cabmsconsumible();\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddCabmsC\").validationEngine();
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
 public function nuevo_cabmsconsumibles($AData)
    {
        $Id_CveInternaAC=$AData->Id_CveInternaAC;
        $Id_CveARTCABMS=$AData->Id_CveARTCABMS;
        $vDescripcion=$AData->vDescripcion;
        $Id_CABMS=$AData->Id_CABMS;
        $Id_UMedida=$AData->Id_UMedida;
        $ePartidaPresupuestal=$AData->ePartidaPresupuestal;
        
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos($con);
        $sql="insert into sa_cabmsconsumible values('0','$Id_CveInternaAC','$Id_CveARTCABMS','$vDescripcion','$Id_CABMS','$Id_UMedida','$ePartidaPresupuestal')";
        $R=$ObjAdd->Query($con,$sql);
        $ObjAdd->Cerrar($con,$R);
    }  
 public function fmr_buscar_cabmsconsumibles()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Cabms Consumibles</div></td>
                            <td><input  type=\"text\" id=\"txtCabmsC\"  name=\"txtCabmsC\" class=\"boxes_form1 validate[required]\" /></td>
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
    public function frm_editar_cabmsconsumibles($id)
    {
             $objData = new poolConnection();
             $con=$objData->Conexion();
             $objData->BaseDatos($con);
             $sqlData="Select Id_CveInternaAC,Id_CveARTCABMS,vDescripcion,Id_CABMS,Id_UMedida,ePartidaPresupuestal from sa_cabmsconsumible where Id='$id'";
             $Rset=$objData->Query($con,$sqlData);
             while($fila=  mysqli_fetch_array($Rset))
             {
                 $Id_CveInternaAC=$fila[Id_CveInternaAC];
                 $Id_CveARTCABMS=$fila[Id_CveARTCABMS];
                 $vDescripcion=$fila[vDescripcion];
                 $Id_CABMS=$fila[Id_CABMS];
                 $Id_UMedida=$fila[Id_UMedida];
                 $ePartidaPresupuestal=$fila[ePartidaPresupuestal];
             }
             $objData->Cerrar($con);
        
        
        
           $objCboCabms = new poolConnection();
           $con=$objCboCabms->Conexion();
           $objCboCabms->BaseDatos($con);
           $sql="SELECT Id_CABMS,vDescripcionCABMS FROM sa_cabms order by vDescripcionCABMS";
           $RSet=$objCboCabms->Query($con,$sql);
           while($fila=  mysqli_fetch_array($RSet))
           {
               if($Id_CABMS==$fila[Id_CABMS])
               {
                 $cboCabms .= "<option value='$fila[Id_CABMS]' selected>$fila[vDescripcionCABMS]</option>";  
               }
               else
               {
                 $cboCabms .= "<option value='$fila[Id_CABMS]'>$fila[vDescripcionCABMS]</option>";  
               }
               
           }
           $objCboCabms->Cerrar($con,$RSet);

            $cboUMedida = "";
           $objCboUMedida = new poolConnection();
           $con=$objCboUMedida->Conexion();
           $objCboUMedida->BaseDatos($con);
           $sql="SELECT Id_UMedida,vDescripcion FROM sa_umedida order by vDescripcion";
           $RSet=$objCboUMedida->Query($con,$sql);
           while($fila=  mysqli_fetch_array($RSet))
           {
               if($Id_UMedida==$fila[Id_UMedida])
               {
                   $cboUMedida .= "<option value='$fila[Id_UMedida]' selected>$fila[vDescripcion]</option>";
               }
               else
               {
                 $cboUMedida .= "<option value='$fila[Id_UMedida]'>$fila[vDescripcion]</option>";  
               }
               
           }
           $objCboUMedida->Cerrar($con,$RSet);
        
        $frm="<form  id='frmEditCabmsC' name='frmAddCabmsC'' mathod='post'><br>
                
                <table>
                        
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Clave Art.CABMD:</div></td>
                            <td><input  type=\"text\" id=\"txtICveInternaACE\"  name=\"txtICveInternaACE\" class=\"boxes_form50px validate[required,minSize[1]]\" value='$Id_CveInternaAC'/>&nbsp;&nbsp;<input  type=\"text\" id=\"txtCveARTCABMSE\"  name=\"txtCveARTCABMSE\" class=\"boxes_form50px validate[required,minSize[1]]\"  value='$Id_CveARTCABMS'/></td>
                            <td><input  type=\"text\" id=\"txtvDescripcionE\"  name=\"txtvDescripcionE\" class=\"boxes_form400px validate[required,minSize[1]]\" value='$vDescripcion'/></td>
                        </tr>
                </table>
                <table>
                    <tr>
                            <td><div class=\"txt_titulos_bold\" >CABMD:</div></td>
                            <td>
                                <select id='cboCabmsE' name='cboCabmsE' class=\"validate[required,minSize[1]]\" >
                                      <option value=''></option>
                                       $cboCabms
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Unidada de Medida:</div></td>
                            <td>
                                <select id='cboMedidaE' name='cboMedidaE' class=\"validate[required,minSize[1]]\">
                                   <option value=''></option>
                                     $cboUMedida
                                </select>         
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                             <td><div class=\"txt_titulos_bold\" >Partida Presupuestal:</div></td>
                             <td><input  type=\"text\" id=\"txtPPresupuestalE\"  name=\"txtPPresupuestalE\" class=\"boxes_form50px validate[required,minSize[1]]\" value='$ePartidaPresupuestal' /></td>
                             <td></td>
                        </tr>
                </table>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion_cabmsconsumible($id);\" style=\"cursor:pointer\"/>
              
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmEditCabmsC\").validationEngine();
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
  function editar_cabmsconsumibles($AData)
    {
        
        $Id_CveInternaAC=$AData->txtICveInternaAC;
        $Id_CveARTCABMS=$AData->txtCveARTCABMS;
        $vDescripcion=$AData->txtvDescripcion;
        $Id_CABMS=$AData->cboCabms;
        $Id_UMedida=$AData->cboMedida;
        $ePartidaPresupuestal=$AData->txtPPresupuestal;
        $id=$AData->id;
        $sql="update sa_cabmsconsumible set
                Id_CveInternaAC='$Id_CveInternaAC',
                Id_CveARTCABMS='$Id_CveARTCABMS',
                vDescripcion='$vDescripcion',
                Id_CABMS='$Id_CABMS',
                Id_UMedida='$Id_UMedida',
                ePartidaPresupuestal='$ePartidaPresupuestal'
                Where Id='$id';";
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
                            <td><div class=\"txt_titulos_bold\" >Cabms Consumibles</div></td>
                            <td><input  type=\"text\" id=\"txtCabmsC\"  name=\"txtCabmsC\" class=\"boxes_form1 validate[required]\" /></td>
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
  public function buscar_borrar_cabmsconsumibles($texto)
  {
      $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                  
                                    
        
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $sql="Select Id,Id_CveInternaAC,Id_CveARTCABMS,vDescripcion,Id_CABMS,Id_UMedida,ePartidaPresupuestal from sa_cabmsconsumible where vDescripcion like '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqlI_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CveInternaAC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CveARTCABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>    
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_cabmsconsumible($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Clave Interna', name : 'Clave Interna', width :90, sortable :false, align: 'center'},
                                                            {display: 'Clave Art. Cambms', name : 'Clave Art. Cambms', width :90, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :300, sortable :false, align: 'center'},
                                                            {display: 'CABMS', name : 'CABMS', width :300, sortable :false, align: 'center'},
                                                            {display: 'Medida', name : 'Medida', width :250, sortable :false, align: 'center'},
                                                            {display: 'P. Presupuestal', name : 'Presu`uestal', width :150, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 830,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                          return $FliexGrid;
  }  
public function borrar_cabmsconsumibles($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_cabmsconsumible Where Id='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
     
 }
  public function frm_consultar_cabmsconsumibles()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Cabms Consumibles</div></td>
                            <td><input  type=\"text\" id=\"txtCabmsC\"  name=\"txtCabmsC\" class=\"boxes_form1 validate[required]\" /></td>
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
                          $sql="Select Id,Id_CveInternaAC,Id_CveARTCABMS,vDescripcion,Id_CABMS,Id_UMedida,ePartidaPresupuestal from sa_cabmsconsumible where vDescripcion like '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CveInternaAC]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CveARTCABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>    
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
                                                    
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Clave Interna', name : 'Clave Interna', width :90, sortable :false, align: 'center'},
                                                            {display: 'Clave Art. Cambms', name : 'Clave Art. Cambms', width :90, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :300, sortable :false, align: 'center'},
                                                            {display: 'CABMS', name : 'CABMS', width :300, sortable :false, align: 'center'},
                                                            {display: 'Medida', name : 'Medida', width :250, sortable :false, align: 'center'},
                                                            {display: 'P. Presupuestal', name : 'Presu`uestal', width :150, sortable :false, align: 'center'},
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 830,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
                          
                   
                          return $FliexGrid;
  }
}

?>
