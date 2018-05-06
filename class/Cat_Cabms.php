<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_Cabms
 *
 * @author armand
 */
class Cat_Cabms extends poolConnection
{
  public function frm_add_cabms()
    {

        $cboUnidad = "";
       $objunidad = new poolConnection();
       $con=$objunidad->Conexion();
       $objunidad->BaseDatos($con);
       $sql="SELECT * FROM sa_umedida order by Id_UMedida";
       $RSet=$objunidad->Query($con,$sql);
       while($fila=  mysqli_fetch_array($RSet))
       {
           $cboUnidad .= "<option value='$fila[Id_UMedida]'>$fila[vDescripcion]</option>";
       }
       $objunidad->Cerrar($con,$RSet);
        
        $frm="<form  id='frmAddCabms' name='frmAddCabms' mathod='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Nuevo</legend>
                <table>
                         <tr>
                             <td><div class=\"txt_titulos_bold\" >Tipo de Bien</div></td>
                             <td>
                                   <select id='cboTipo' name='cboTipo' class=\"validate[required]\">
                                        <option value=''></option>
                                         <option value='C'>Consumible</option>
                                         <option value='I'>Inventariable</option>
                                         
                                 </select>
                             </td>
                         </tr>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Cabms</div></td>
                            <td><input  type=\"text\" id=\"txtCabms\"  name=\"txtCabms\" class=\"boxes_form1 validate[required,minSize[6]]\" /></td>
                        </tr>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Descripción</div></td>
                            <td><input  type=\"text\" id=\"txtDes\"  name=\"txtDes\" class=\"boxes_form1 validate[required,minSize[6]]\" /></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Unidad de Medida</div></td>
                            <td>
                                 <select id='cboUnidad' name='cboUnidad' class=\"validate[required]\">
                                         <option value=''></option>
                                         $cboUnidad
                                 </select>
                            </td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >P.Presupuestal</div></td>
                            <td><input  type=\"text\" id=\"txtPPresupuestal\"  name=\"txtPPresupuestal\" class=\"boxes_form200px validate[required,minSize[1]]\" onclick=\"verqr();\"/></td>
                        </tr>
                </table>
                <br>
                <div id=\"DivQr\"  style=\"cursor:pointer\" onclick=\"verQrForPrint();\"></div>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_cabms();\" style=\"cursor:pointer\"/>
              </fieldset>
              </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmAddCabms\").validationEngine();
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
public function validando_cambs($cabms)
{
    $Encontrado = "No";
    $objValidar = new poolConnection();
    $con=$objValidar->Conexion();
    $objValidar->BaseDatos($con);
    $Sql="Select Id_CABMS from sa_cabms  where Id_CABMS='$cabms'";
    $Rset=$objValidar->Query($con,$Sql);
    while($fila = mysqli_fetch_array($Rset))
    {
       $Encontrado = "Si";   
    }
    $objValidar->Cerrar($con,$Rset);
    return $Encontrado;
}
public function nuevo_Cabms($AData)
    {
        $IdCabms = "";
        $Tipo=$AData->Tipo;
        $Cabms=$AData->Cabms;
        $Descripcion=$AData->Descripcion;
        $Unidad=$AData->Unidad;
        $Presupuestal=$AData->Presupuestal;
        $IdCabms .= $Tipo;
        $IdCabms .= $Cabms;
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos($con);
        $sql="insert into sa_cabms values('0','$IdCabms','$Unidad','$Descripcion','$Tipo','0','$Presupuestal')";
        $R=$ObjAdd->Query($con,$sql);
        $ObjAdd->Cerrar($con,$R);
        
    }
   public function fmr_buscar_cabms()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Cabms</div></td>
                            <td><input  type=\"text\" id=\"txtCabms\"  name=\"txtCabms\" class=\"boxes_form1 validate[required]\" /></td>
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
   public function frm_editar_cambs($id)
    {

        $objBuscar = new poolConnection();
        $con=$objBuscar->Conexion();
        $objBuscar->BaseDatos($con);
        $sqlE="Select Id_CABMS,Id_UMedida,vDescripcionCABMS,cTipoAlmacen,ePartidaPresupuestal from sa_cabms  where Id='$id'";
        $RSet=$objBuscar->Query($sqlE);
        while($fila=  mysqli_fetch_array($RSet))
        {
            $Id_CABMS=$fila[Id_CABMS];
            $Id_UMedida=$fila[Id_UMedida];
            $vDescripcionCABMS=$fila[vDescripcionCABMS];
            $cTipoAlmacen=$fila[cTipoAlmacen];
            $ePartidaPresupuestal=$fila[ePartidaPresupuestal];
                                 
                          
        }
        $objBuscar->Cerrar($con,$RSet);
        $tAlamacen="";
        if($cTipoAlmacen=="C")
        {
           $tAlamacen="Consumible"; 
           $Id_CABMS=str_replace("C", " ", "$Id_CABMS");
           $Id_CABMS=trim($Id_CABMS);
        }
        else
        {
           $tAlamacen="Inventariable"; 
           $Id_CABMS=str_replace("I", " ", "$Id_CABMS");
           $Id_CABMS=trim($Id_CABMS);
        }
        $cboUnidad = "";
        $objunidad = new poolConnection();
       $con=$objunidad->Conexion();
       $objunidad->BaseDatos($con);
       $sql="SELECT * FROM sa_umedida order by Id_UMedida";
       $RSet=$objunidad->Query($con,$sql);
       while($fila=  mysqli_fetch_array($RSet))
       {
          if($Id_UMedida==$fila[Id_UMedida])
          {
              $cboUnidad .= "<option value='$fila[Id_UMedida]' selected>$fila[vDescripcion]</option>";
          }
          else
          {
             $cboUnidad .= "<option value='$fila[Id_UMedida]'>$fila[vDescripcion]</option>"; 
          }
           
       }
       $objunidad->Cerrar($con,$RSet);
       
       
        $frm="<form  id='frmEditCabms' name='frmEditCabms' mathod='post'>
                <table>
                         <tr>
                             <td><div class=\"txt_titulos_bold\" >Tipo de Bien</div></td>
                             <td>
                                   <select id='cboTipoE' name='cboTipoE' class=\"validate[required]\">
                                        <option value='$cTipoAlmacen'>$tAlamacen</option>
                                         <option value='C'>Consumible</option>
                                         <option value='I'>Inventariable</option>
                                         
                                 </select>
                             </td>
                         </tr>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Cabms</div></td>
                            <td><input  type=\"text\" id=\"txtCabmsE\"  name=\"txtCabmsE\" class=\"boxes_form1 validate[required,minSize[6]]\" value='$Id_CABMS'/></td>
                        </tr>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Descripción</div></td>
                            <td><input  type=\"text\" id=\"txtDesE\"  name=\"txtDesE\" class=\"boxes_form1 validate[required,minSize[6]]\" value='$vDescripcionCABMS'/></td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >Unidad de Medida</div></td>
                            <td>
                                 <select id='cboUnidadE' name='cboUnidadE' class=\"validate[required]\">
                                         <option value=''></option>
                                         $cboUnidad
                                 </select>
                            </td>
                        </tr>
                        <tr>
                            <td><div class=\"txt_titulos_bold\" >P.Presupuestal</div></td>
                            <td><input  type=\"text\" id=\"txtPPresupuestalE\"  name=\"txtPPresupuestalE\" class=\"boxes_form50px validate[required,minSize[1]]\" value='$ePartidaPresupuestal'/></td>
                        </tr>
                </table>
                <br>
                <div id=\"DivQr\"></div>
                <br>
                <img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"Guardar_Edicion($id);\" style=\"cursor:pointer\"/>
                 <input type='hidden' name='IdActualizar'  id='IdActualizar' value='$id'>
                </form>
              <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery(\"#frmEditCabms\").validationEngine();
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
   function editar_Cabms($AData)
    {
        $IdCabms = "";
        $Tipo=$AData->Tipo;
        $Cabms=$AData->Cabms;
        $Descripcion=$AData->Descripcion;
        $Unidad=$AData->Unidad;
        $Presupuestal=$AData->Presupuestal;
        $id=$AData->Id;
        
        $IdCabms .= $Tipo; 
        $IdCabms .= $Cabms;
        $sql="UPDATE sa_cabms SET Id_CABMS = '$IdCabms',
            Id_UMedida = '$Unidad',
            vDescripcionCABMS = '$Descripcion',
            cTipoAlmacen = '$Tipo',
            ePartidaPresupuestal = '$Presupuestal'
            WHERE Id ='$id';";
        
        $objUpdate = new poolConnection();
        $con=$objUpdate->Conexion();
        $objUpdate->BaseDatos($con);
        $R=$objUpdate->Query($con,$sql);
        $objUpdate->Cerrar($con,$R);
        return $sql;
    }  
    public function fmr_buscar_eliminar_cabms()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Borrar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Cabms</div></td>
                            <td><input  type=\"text\" id=\"txtCabms\"  name=\"txtCabms\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar_borrar_cambs();\"/></td>
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
                          $sql="Select Id,Id_CABMS,Id_UMedida,vDescripcionCABMS,cTipoAlmacen,ePartidaPresupuestal from sa_cabms  where Id_CABMS like '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoAlmacen]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_cambs($fila[Id]);\">&nbsp;</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'CABMS', name : 'CABMS', width :150, sortable :false, align: 'center'},
                                                            {display: 'Uni.Medida', name : 'Uni.Medida', width :70, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :370, sortable :false, align: 'center'},
                                                            {display: 'Tipo', name: 'Tipo', width :120, sortable :false, align: 'center'},
                                                            {display: 'P.Presupuestal', name : 'P.Presupuestal', width :100, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 960,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";

                         return $FliexGrid;
  }
public function borrar_cambs($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_cabms Where Id='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
     return $sql;
     
 }
 public function frm_consultar_cabms()
 {
     $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Cabms</div></td>
                            <td><input  type=\"text\" id=\"txtCabms\"  name=\"txtCabms\" class=\"boxes_form1 validate[required]\" /></td>
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
                          $sql="Select Id,Id_CABMS,Id_UMedida,vDescripcionCABMS,cTipoAlmacen,ePartidaPresupuestal from sa_cabms  where Id_CABMS like '%$texto%'";
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoAlmacen]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
                                                </tr>
                                            ";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'CABMS', name : 'CABMS', width :150, sortable :false, align: 'center'},
                                                            {display: 'Uni.Medida', name : 'Uni.Medida', width :70, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :370, sortable :false, align: 'center'},
                                                            {display: 'Tipo', name: 'Tipo', width :120, sortable :false, align: 'center'},
                                                            {display: 'P.Presupuestal', name : 'P.Presupuestal', width :100, sortable :false, align: 'center'},
                                                            

                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 860,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";

                         return $FliexGrid;
 }
}

?>
