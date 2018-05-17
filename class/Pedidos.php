<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedidos
 *
 * @author armand
 */
class Pedidos {
   
    public function load_form()
    {

                               $objProveedor = new poolConnection();
                               $con=$objProveedor->Conexion();
                               $objProveedor->BaseDatos($con);
                               $sql="SELECT Id_Proveedor,vNombre FROM sa_proveedor order by vNombre";
                               $RSet=$objProveedor->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   $cboProveedor .= "<option value='$fila[Id_Proveedor]'>$fila[vNombre]</option>";
                               }
                               $objProveedor->Cerrar($con,$RSet);

                               $objUAdministrativa = new poolConnection();
                               $con=$objUAdministrativa->Conexion();
                               $objUAdministrativa->BaseDatos($con);
                               $sql="SELECT Id_Unidad,vDescripcion FROM sa_unidadadmva order by vDescripcion";
                               $RSet=$objUAdministrativa->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   $cboUAdministrativa .= "<option value='$fila[Id_Unidad]'>$fila[vDescripcion]</option>";
                               }
                               $objUAdministrativa->Cerrar($con,$RSet);

                               $objCambs = new poolConnection();
                               $con=$objCambs->Conexion();
                               $objCambs->BaseDatos($con);
                               $sql="SELECT Id_CABMS,vDescripcionCABMS FROM sa_cabms order by vDescripcionCABMS ";
                               $RSet=$objCambs->Query($sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   $cboCambs .= "<option value='$fila[Id_CABMS]'>$fila[vDescripcionCABMS]</option>";
                               }
                               $objCambs->Cerrar($con,$RSet);

                               $objUMedida = new poolConnection();
                               $con=$objUMedida->Conexion();
                               $objCambs->BaseDatos($con);
                               $sql="SELECT Id_UMedida,vDescripcion FROM sa_umedida order by vDescripcion ";
                               $RSet=$objUMedida->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   $cboUMedida .= "<option value='$fila[Id_UMedida]'>$fila[vDescripcion]</option>";
                               }
                               $objUMedida->Cerrar($con,$RSet);

                               //Grid detalle pedido

                               $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                                                <tbody>";



                                              $objGridPedido = new poolConnection();
                                              $con=$objGridPedido->Conexion();
                                              $objGridPedido->BaseDatos($con);
                                              $sql="SELECT Id_Partida, 
                                                          Id_CABMS, 
                                                          Id_CveARTCABMS,
                                                          Id_UMedida,
                                                          Id_CveInternaAC,
                                                          eCantidad,
                                                          mPrecioUnitario,
                                                          vCaracteristicas,
                                                          dFechaRegistro,
                                                          dFechaModRegistro,
                                                          cEstado,
                                                          nIva,
                                                          nDescuento,
                                                          cTipoAlmacen,
                                                          eCantidadEntregada
                                                           FROM sa_detallepedido WHERE Id_Pedido='0'";
                                              $RSet=$objGridPedido->Query($con,$sql);
                                              while($fila=mysqli_fetch_array($RSet))
                                              {
                                                  $i++;
                                                  $FliexGrid.="
                                                                    <tr>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_pedido($fila[Id_Partida]);\">&nbsp;</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[mPrecioUnitario]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCaracteristicas]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cEstado]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nIva]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nDescuento]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoAlmacen]</td>
                                                                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidadEntregada]</td>    
                                                                    </tr>";
                                              }
                                              $objGridPedido->Cerrar($con,$RSet);
                                              $FliexGrid.="       </tbody>
                                                                                            </table><script>$('.flexme1').flexigrid({
                                                                title: '',
                                                                colModel : [

                                                                                {display: 'Eliminar', name : 'Eliminar', width :120, sortable :false, align: 'center'},
                                                                                {display: 'CABMS', name : 'Codigo', width :100, sortable :false, align: 'center'},
                                                                                {display: 'U. Medida', name : 'U. Medida', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Cantidad', name : '', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Precio Unitario', name : 'Precio Unitario', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Caracteristicas', name : 'Caracteristicas', width :100, sortable :false, align: 'center'},
                                                                                {display: 'F. Registro', name : 'F. Registro', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Estado', name : 'Estado', width :100, sortable :false, align: 'center'},
                                                                                {display: 'IVA', name : 'IVA', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Descuento', name : 'Descuento', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Almacen', name : 'Almacen', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Cantidad Entregada', name : 'Cantidad Entregada', width :100, sortable :false, align: 'center'}



                                                                            ],
                                                                buttons : [
                                                                                {name: '',onpress:saver_Order},
                                                                                {separator: true}
                                                                            ],
                                                                width: 940,
                                                                height: 250
                                                                }

                                                                );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";


                         //Frid Detalle
                         $Y = date(Y);                     
                        $frm="
                            <fieldset>
                            <legend><div class=\"txt_titulos_bold\">Datos del Pedido</div></legend>
                            <form name='frmPedido' id='frmPedido'  action='' method='post'>
                            <br>
                            <table>
                                    <tr>
                                        <td><div class=\"txt_titulos_bold\">Folio:</div></td>
                                        <td><input  type=\"text\" id=\"txtPeriodo\"  name=\"txtPeriodo\" value='$Y' class=\"boxes_form100px\"/>&nbsp;/&nbsp;<input  type=\"text\" id=\"txtClave\"  name=\"txtClave\" class=\"boxes_form100px\"/></td>
                                    </tr>
                            </table>
                            <table>
                                <tr>
                                    <td><div class=\"txt_titulos_bold\">Proveedor:</div></td>
                                    <td>
                                        <select data-placeholder=\"Proveedor\" style=\"width:380px;\" tabindex=\"1\"  class='chzn-select validate[required]' name='cboProveedor' id='cboProveedor' >
                                            <option value=\"\"></option>
                                             echo $cboProveedor; 
                                        </select>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class=\"txt_titulos_bold\">Requisici&oacute;n:</div>
                                    </td>
                                    <td>
                                        <input  type=\"text\" id=\"txtRequisicion\"  name=\"txtRequisicion\" class=\"boxes_form200px validate[required,minSize[1]]\"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=\"txt_titulos_bold\">Licitaci&oacute;n:</div>
                                    </td>
                                    <td>
                                        <input  type=\"text\" id=\"txtLicitacion\"  name=\"txtLicitacion\" class=\"boxes_form200px validate[required,minSize[1]]\"/>
                                    </td>
                                    <td><div class=\"txt_titulos_bold\">Estatus:</div></td>
                                    <td>
                                        <input  type=\"text\" id=\"txtEstatus\"  name=\"txtEstatus\" value='Activo' class=\"boxes_form100px validate[required,minSize[1]]\" readonly/>
                                    </td>
                                    <td><div class=\"txt_titulos_bold\">Fecha Pedido:</div></td>
                                    <td><input  type=\"text\" id=\"txtFecha\"  name=\"txtFecha\" class=\"boxes_form100px\"/></td>
                                </tr>

                            </table>
                            <table>
                            <tr>
                                   <td><div class=\"txt_titulos_bold\">U.Admin.:</div></td>
                                    <td>
                                        <select name='cbouadmin' id='cbouadmin' data-placeholder=\"Unidad Admin.\" style=\"width:480px;\" tabindex=\"1\"  class='chzn-select validate[required]'>
                                            <option value=\"\"></option>
                                            <?php echo $cboUAdministrativa; ?>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                             </table> 
                             <br>
                            <table>
                                <tr>
                                    <td><input type='hidden' name='txtFolio' id='txtFolio'/><div id='DivFolio' class=\"txt_titulos_bold\" style='display:none'></div><div id='DivBtnGuardar'><img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG1\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG1','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"guardar_pedido();\" style=\"cursor:pointer\"/></div></td>
                                </tr>
                            </table> 
                            </form>
                        </fieldset>
                        <br>
                        <!-- Aqui Empiesan  Pestañas -->
                        <fieldset>
                            <legend><div class=\"txt_titulos_bold\">Detalles del pedido</div></legend>  
                            
                            <div id=\"tabs\">
                                 
                                    <ul>
                                            <li><a href=\"#tabs-1\">Pedido</a></li>
                                            <li><a href=\"#tabs-2\">Fecha de Entrega</a></li>
                                    </ul>
                                    
                                    <div id=\"tabs-1\">
                                         <div id='contenido1'>  
                                            <div id='GridForm'>
                                                <table>
                                                        <tr>
                                                            <td>
                                                                <fieldset style=\"width:200px\">
                                                                    <legend><div class=\"txt_titulos_bold\">Almacen</div></legend>
                                                                    <table>
                                                                        <tr>
                                                                            <td><div class=\"txt_titulos_bold\">Consumible</div></td>
                                                                            <td><input type=\"radio\" id=\"rdAlmacen\" name=\"rdConsumible\" value=\"C\"/></td>
                                                                            <td><div class=\"txt_titulos_bold\">Inventariable</div></td>
                                                                            <td><input type=\"radio\" id=\"rdAlmacen\" name=\"rdConsumible\" value=\"I\"/></td>
                                                                        </tr>
                                                                    </table>
                                                                </fieldset>
                                                            </td> 
                                                            
                                                        </tr>
                                                </table> 
                                                <table>
	                                                   <tr>
	                                                      <td><div class=\"txt_titulos_bold\"> Partida : </div></td>
	                                                      <td>
	                                                            <input type=\"text\" name=\"txtPartida\" id=\"txtPartida\" class=\"boxes_form100px\">
	                                                       </td>
	                                                   </tr>		
                                                </table>
                                                <table>
                                                       <tr>
                                                           <td>
                                                                <select data-placeholder=\"Cabms\" style=\"width:460px;\" tabindex=\"1\"  class='chzn-select validate[required]' id='cbocambs' name='cbocambs'>
                                                                    <option value=\"\"></option>
                                                                     $cboCambs;
                                                                </select>
                                                               
                                                                
                                                            </td>
                                                            <td>
                                                               &nbsp;&nbsp;
                                                            </td>
                                                            <td>
                                                                 <div id='DivCboArtCambs'>
                                                                        
                                                                </div>
                                                            </td>
                                                        </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Descripci&oacute;n</div></td>
                                                        <td>
                                                            <textarea id='txtDescripcion' name='txtDescripcion' class=\"boxes_form_textarea400px\"></textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                        <tr>
                                                            <td><div class=\"txt_titulos_bold\">Cantidad:</div></td>
                                                            <td>
                                                                <input  type=\"text\" id=\"txtCantidad\"  name=\"txtCantidad\" value='0' class=\"boxes_form100px\"/>
                                                            </td>
                                                            <td>
                                                            <td>
                                                                <select name='cboUMedida' id='cboUMedida' data-placeholder=\"Medida\" style=\"width:200px;\" tabindex=\"1\"  class='chzn-select validate[required]'>
                                                                    <option value=\"\"></option>
                                                                    $cboUMedida
                                                                </select>
                                                            </td>
                                                            <td><div class=\"txt_titulos_bold\">Precio:</div></td>
                                                            <td><input  type=\"text\" id=\"txtPrecio\"  name=\"txtPrecio\" class=\"boxes_form100px\" value='0'/></td>
                                                            <td><div class=\"txt_titulos_bold\">IVA:</div></td>
                                                            <td><input  type=\"text\" id=\"txtIVA\"  name=\"txtIVA\" class=\"boxes_form100px\" value='0'/></td>
                                                            <td><div class=\"txt_titulos_bold\">Descuentos:</div></td>
                                                            <td><input  type=\"text\" id=\"txtDescuento\"  name=\"txtDescuento\" class=\"boxes_form100px\" value='0'/></td>
                                                        </tr>
                                                </table>
                                                <br>
                                                    <table>
                                                        <tr>
                                                            <td><img src=\"../../interfaz_modulos/botones/agregar.jpg\" name=\"ImageGuardar1\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageGuardar1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageGuardar1','','../../interfaz_modulos/botones/agregar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"add_partida();\"/></td>
                                                        </tr>
                                                    </table> 
                                              </div>
                                              <div id='GridDetalle'>
                                                      $FliexGrid
                                              </div> 
                                           </div>       
                                    </div>
                                    <div id=\"tabs-2\">
                                            <div id='contenido2'>
                                               <div id='GridDetalleFecha'></div>
                                               (Para cambiar la fecha damos doble click en la fecha entrega)
                                           </div> 
                                    </div>
                            </div>
                            
                        </fieldset>
                        <br>
                           &nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/alta.jpg\"  name=\"ImageA\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA','','../../interfaz_modulos/botones/alta_over.jpg',1)\" onclick=\"terminar_pedido();\" style=\"cursor:pointer\"/>
                         <script>
                                                $(function() {
                                                        $(\"#txtFecha\").datepicker();
                                                });
                                                        $(function() {
                                                                 $(\"#tabs\").tabs();
                                                         });
                                                         jQuery(document).ready(function(){
                                                     // binds form submission and fields to the validation engine
                                                     jQuery(\"#frmPedido\").validationEngine();
                                             });


                                        function checkHELLO(field, rules, i, options){
                                                if (field.val() != \"HELLO\") {
                                                        // this allows to use i18 for the error msgs
                                                        return options.allrules.validate2fields.alertText;

                                                }

                                        }
                                         $(\".chzn-select\").chosen(); 
                                        $(\".chzn-select-deselect\").chosen({allow_single_deselect:true});
                                      
        
                            </script>
                            ";
                        return $frm;
        
    }
    public function nuevo_pedido($AData)
    {
        $Id_Proveedor=$AData->Id_Proveedor;
        $Id_UnidadAdmonDes=$AData->Id_UnidadAdmonDes;
        $dFechaPedido=$AData->dFechaPedido;
        $vNoRequisicion=$AData->vNoRequisicion;
        $vNoLicitacion=$AData->vNoLicitacion;
        $Folio = $AData->Folio;
        
        $cEstado=$AData->cEstado;
        switch ($cEstado)
        {
            case 'Activo':
                           $cEstado ="A";
                      break;
           case 'Cerrado':
                           $cEstado = "C";
                      break;
            default :

                break;
        }
        $D=date(d);
        $M=date(m);
        $Y=date(Y);
        $Fecha="$Y/$M/$D";
        $dFechaPedidoArray = split("/",$dFechaPedido);
        $FechaPedido="$dFechaPedidoArray[2]/$dFechaPedidoArray[0]/$dFechaPedidoArray[1]";
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos($con);
        $sql="INSERT INTO sa_pedido values('0','$Folio','$Id_Proveedor','$Id_UnidadAdmonDes','$FechaPedido','$vNoRequisicion','$vNoLicitacion','$Fecha','0000-00-00', '$cEstado','Null','0')";
        $R=$ObjAdd->Query($sql,$con);
        $Id_Pedido=mysqli_insert_id($con);
        $ObjAdd->Cerrar($con,$R);
        //obtenemos el ultimo registro

        return $Folio;
    }
    public function cboArt($idCambs)
    {
        
        $objArtCambs = new poolConnection();
        $con=$objArtCambs->Conexion();
        $objArtCambs->BaseDatos($con);
        $sql="SELECT Id,Id_CveARTCABMS,vDescripcion FROM sa_cabmsconsumible  where Id_CABMS='$idCambs' order by vDescripcion";
        $RSet=$objArtCambs->Query($con,$sql);
        while($fila=  mysqli_fetch_array($RSet))
        {
            $cboArtCambs .= "<option value='$fila[Id]'>$fila[vDescripcion]</option>";
        }
        $objArtCambs->Cerrar($con,$RSet);
        $cbo = "<select id='cboArtCambs' name='cboArtCambs' data-placeholder=\" Art. Cabms\" style=\"width:460px;\" tabindex=\"1\"  class='chzn-select validate[required]'>
                <option value=\"\"></option>
                $cboArtCambs
         </select>
        <script>$(\".chzn-select\").chosen(); </script>";
        return $cbo;
    }
    public function agragar_detalle($info)
    {

        $Id_Pedido=$info->Id_Pedido;
        $Id_Partida = $info->Id_Partida;
        $Id_CABMS=$info->Id_CABMS;
        $Id_CveARTCABMS=$info->Id_CveARTCABMS;
        $Id_UMedida=$info->Id_UMedida;
        $Id_CveInternaAC=$info->Id_CveInternaAC;
        $eCantidad=$info->eCantidad;
        $mPrecioUnitario=$info->mPrecioUnitario;
        $vCaracteristicas=$info->vCaracteristicas;
        $nIva=$info->nIva;
        $nDescuento=$info->nDescuento;
        $cTipoAlmacen=$info->cTipoAlmacen;
        
         /* Fecha  de Registro*/
        $Dia=date(d);
        $Mes=date(m);
        $Anio=date(Y);
        $Fecha="$Anio/$Mes/$Dia";
        $objAddArticulo =  new poolConnection();
        $con=$objAddArticulo->Conexion();
        $R=$objAddArticulo->BaseDatos($con);
        $sql="INSERT INTO sa_detallepedido  values(
                '0', 
                '$Id_Partida',
                '$Id_Pedido', 
                '$Id_CABMS', 
                '$Id_CveARTCABMS', 
                '$Id_UMedida',
                '$Id_CveInternaAC',
                '$eCantidad',
                '$mPrecioUnitario',
                '$vCaracteristicas',
                '$Fecha',
                '0000-00-00',
                'A',
                '$nIva',
                '$nDescuento',
                '$cTipoAlmacen',
                '0')";
        $objAddArticulo->Query($con,$sql);
         $Id_Secuencia=mysqli_insert_id($con);
        $objAddArticulo->Cerrar($con,$R);
        
        
        //agremado a Fechaentergapedido
        $sql2= "INSERT INTO sa_fechaprogramadaentrega values(
                 '0',
                 '$Id_Pedido',
                 '$Id_Partida',
                 '0000-00-00',
                 '$eCantidad',
                 '0',
                 '$Fecha',
                 '0000-00-00'
                 )";
       $objFechasEntregas = new poolConnection();
       $con=$objFechasEntregas->Conexion();
       $objFechasEntregas->BaseDatos($con);
       $R=$objFechasEntregas->Query($con,$sql2);
       $objFechasEntregas->Cerrar($con,$R);
       return $sql;
  
    }
    public function load_grid($idpedido)
    {
      
        //Grid

        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";

        $objGridPedido = new poolConnection();
        $con=$objGridPedido->Conexion();
        $objGridPedido->BaseDatos($con);
        $sql="SELECT sa_detallepedido.Id_Partida, 
                    sa_detallepedido.Id_CABMS, 
                    sa_detallepedido.Id_CveARTCABMS,
                    sa_detallepedido.Id_UMedida,
                    sa_detallepedido.Id_CveInternaAC,
                    sa_detallepedido.eCantidad,
                    sa_detallepedido.mPrecioUnitario,
                    sa_detallepedido.vCaracteristicas,
                    sa_detallepedido.dFechaRegistro,
                    sa_detallepedido.dFechaModRegistro,
                    sa_detallepedido.cEstado,
                    sa_detallepedido.nIva,
                    sa_detallepedido.nDescuento,
                    sa_detallepedido.cTipoAlmacen,
                    sa_detallepedido.eCantidadEntregada,
                    sa_fechaprogramadaentrega.Id As DNIFechaEntregas
                    FROM sa_detallepedido,sa_fechaprogramadaentrega 
                    WHERE 
                    sa_detallepedido.Id_Pedido='$idpedido'
                    and
                    sa_fechaprogramadaentrega.Id_Pedido=sa_detallepedido.Id_Pedido
                    and 
                     sa_fechaprogramadaentrega.Id_Partida = sa_detallepedido.Id_Partida";
        $RSet=$objGridPedido->Query($con,$sql);
        while($fila=mysqli_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"EliminarDetalle$i\" width=\"120\" height=\"45\" border=\"0\" id=\"EliminarDetalleG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('EliminarDetalleG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\"  onclick=\"borrar_pedido($fila[Id_Partida],$fila[DNIFechaEntregas],'$idpedido');\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[mPrecioUnitario]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCaracteristicas]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cEstado]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nIva]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nDescuento]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoAlmacen]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidadEntregada]</td>    
                              </tr>";
        }
        $objGridPedido->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Eliminar', name : 'Eliminar', width :120, sortable :false, align: 'center'},
                                          {display: 'CABMS', name : 'Codigo', width :100, sortable :false, align: 'center'},
                                          {display: 'U. Medida', name : 'U. Medida', width :100, sortable :false, align: 'center'},
                                          {display: 'Cantidad', name : '', width :100, sortable :false, align: 'center'},
                                          {display: 'Precio Unitario', name : 'Precio Unitario', width :100, sortable :false, align: 'center'},
                                          {display: 'Caracteristicas', name : 'Caracteristicas', width :100, sortable :false, align: 'center'},
                                          {display: 'F. Registro', name : 'F. Registro', width :100, sortable :false, align: 'center'},
                                          {display: 'Estado', name : 'Estado', width :100, sortable :false, align: 'center'},
                                          {display: 'IVA', name : 'IVA', width :100, sortable :false, align: 'center'},
                                          {display: 'Descuento', name : 'Descuento', width :100, sortable :false, align: 'center'},
                                          {display: 'Almacen', name : 'Almacen', width :100, sortable :false, align: 'center'},
                                          {display: 'Cantidad Entregada', name : 'Cantidad Entregada', width :100, sortable :false, align: 'center'}

                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 940,
                          height: 250
                          }

                          );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>$sql";
        return $FliexGrid;
    }
 public function load_grid_fechaentrega($idpedido)
 {
     
          //Grid

        $FliexGrid = "<hr><form action=''  id='frmOrderGridFecha' name='frmOrderGridFecha' method='post'><table class=\"flexme2\">
                                         <tbody>";

        $objGridPedido = new poolConnection();
        $con=$objGridPedido->Conexion();
        $objGridPedido->BaseDatos($con);
        $sql="SELECT 
                Id,
                Id_Pedido,
                Id_Partida,
                Id_dFechEntrega,
                eCantidad,
                Id_Modificacion,
                dFechaRegistro,
                dFechaModRegistro
                FROM  sa_fechaprogramadaentrega Where Id_Pedido='$idpedido'";
        $RSet=$objGridPedido->Query($con,$sql);
        while($fila=mysqli_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><input type=\"hidden\" name=\"txtid[$i]\" value=\"$fila[Id]\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageFechaG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageFechaG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageFechaG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\"  onclick=\"borrar_fecha_entrega($fila[Id],$fila[Id_Partida],'$fila[Id_Pedido]');\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Partida]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblfecha$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblfecha$i').hide();\$('#Fecha$i').show();\">$fila[Id_dFechEntrega]</span><input style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;width:390px;display:none\" type=\"text\" id=\"Fecha$i\" name=\"Fecha[$i]\" value=\"$fila[Id_dFechEntrega]\"></td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaModRegistro]</td>   
                              </tr>";
           $scriptFecha .="$(function() {\$(\"#Fecha$i\").datepicker();});\n";
           
        }
        $objGridPedido->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme2').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Eliminar', name : 'Eliminar', width :120, sortable :false, align: 'center'},
                                          {display: 'Partida', name : 'Partida', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Entrega', name : 'Fecha Entrega', width :100, sortable :false, align: 'center'},
                                          {display: 'Cantidad', name : 'Cantidad', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Registro', name : 'Fecha Registro', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Modificacion', name : '', width :100, sortable :false, align: 'center'},
                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 940,
                          height: 250
                          }

                          );
                          $scriptFecha
                          </script><input type=\"hidden\"  name=\"ActGridFechas\" value=\"Si\"></form>";
        return $FliexGrid;
    }
 
public function borrar_partida($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_detallepedido Where Id='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
     
 }
 public function borrar_fecha_entrega($id)
 {
    $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos($con);
     $sql="Delete from sa_fechaprogramadaentrega Where Id='$id'";
     $R=$objBorrar->Query($con,$sql);
     $objBorrar->Cerrar($con,$R);
 }
 
 public function frm_buscar_editar()
 {
     $frm="<div  id='divBuscador' name='divBuscador'>
              <form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Pedido</div></td>
                            <td><input  type=\"text\" id=\"txtPatron\"  name=\"txtPatron\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar_pedido_edit();\"/></td>
                        </tr>
                </table>
                <table>
                <tr>
                    <td><div class=\"txt_titulos_bold\">No. Folio:<input type=\"checkbox\" name=\"chkFolio\" id=\"chkFolio\" value=\"Folio\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Requisicion:<input type=\"checkbox\" name=\"chkRequisicion\" id=\"chkRequisicion\" value=\"Requisicion\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Licitacion:<input type=\"checkbox\" name=\"chkLicitacion\" id=\"chkLicitacion\" value=\"Licitacion\"/></div></td>
                    
                </tr>
            </table> 
              </fieldset>
              </form>
              </div>
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
        <div id=\"DivBusqueda\"></div>";
        return $frm;
 }
  public function getProveedor($id)
    {
        $objProveedor = new poolConnection();
        $con=$objProveedor->Conexion();
        $objProveedor->BaseDatos($con);
        $sqlp="select vNombre from sa_proveedor where Id_Proveedor='$id'";
        $RSetPro=$objProveedor->Query($con,$sqlp);
        while($fila = mysqli_fetch_array($RSetPro))
        {
            $NProveedor = $fila[vNombre];
        }
        return $NProveedor;
    } 
public function grid_buscar_editar($AData)
  {
        $Patron=$AData->Patron;
        $ACFolio=$AData->Folio;
        $ACRequisicion=$AData->Requisicion;
        $ACLicitacion=$AData->Licitacion;
        #Preparamos ware
        if($ACFolio=="Si")
        {
            $where.="Id_Pedido  like '%$Patron%' or "; 
        }
        
        if($ACRequisicion=="Si")
        {
            $where.="vNoRequisicion like '%$Patron%' or "; 
        }
        if($ACLicitacion)
        {
           $where.="vNoLicitacion like '%$Patron%' or "; 
        }  
        $where = substr($where, 0, -3);
        
        $objGridFacturas = new poolConnection();
        $objGetProveedor = new Pedidos(); 
        $con=$objGridFacturas->Conexion();
        $objGridFacturas->BaseDatos($con);
        $sql="SELECT 
                Id_Pedido,
                Id_Proveedor,
                dFechaPedido,
                vNoRequisicion,
                vNoLicitacion
                FROM sa_pedido
                Where $where";
        $RSet=$objGridFacturas->Query($con,$sql);
        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";
        while($fila=mysqli_fetch_array($RSet))
        {
            $i++;
            $proveedor = $objGetProveedor->getProveedor($fila[Id_Proveedor]); 
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_factura_editar('$fila[Id_Pedido]');\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$proveedor</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaPedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoRequisicion]</td> 
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoLicitacion]</td>   
                              </tr>";
        }
        $objGridFacturas->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                          {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Proveedor', name : 'Proveedor', width :300, sortable :false, align: 'center'},
                                          {display: 'Fecha Pedido', name : 'Fecha Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Requisicion', name : 'Requisicion', width :200, sortable :false, align: 'center'},
                                          {display: 'Licitacion', name : 'Licitacion', width :200, sortable :false, align: 'center'},
                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 940,
                          height: 520
                          }

                          );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
        return $FliexGrid;
   }
 function frm_editar_pedido($id)
 {

                               //Obtenemos los datos
                               $objDatos =  new poolConnection();
                               $con=$objDatos ->Conexion();
                               $objDatos ->BaseDatos($con);
                               $sql="select Id_Proveedor,Id_UnidadAdmonDes,dFechaPedido,vNoRequisicion,vNoLicitacion,dFechaRegistro,cEstado,eNumModificaciones  from sa_pedido where Id_Pedido='$id'";
                               $Rset=$objDatos ->Query($con,$sql);
                               while ($row = mysqli_fetch_array($Rset))
                                   {
                                       $Id_Pedido=$row[Id_Pedido];
                                       $Id_Proveedor=$row[Id_Proveedor];
                                       $Id_UnidadAdmonDes=$row[Id_UnidadAdmonDes];
                                       $dFechaPedido=$row[dFechaPedido];
                                       $vNoRequisicion=$row[vNoRequisicion];
                                       $vNoLicitacion=$row[vNoLicitacion];
                                       $dFechaRegistro=$row[dFechaRegistro];
                                       $cEstado=$row[cEstado];
                                       $eNumModificaciones =$row[eNumModificaciones ];
                                    }
                               $objDatos ->Cerrar($con,$Rset);
                               $ArrayFecha = split("-",$dFechaRegistro);
                               $D=$ArrayFecha[2];
                               $M=$ArrayFecha[1];
                               $Y=$ArrayFecha[0];
                               $Fecha = "$M/$D/$Y";
                               switch ($cEstado)
                                    {
                                        case 'A':
                                                       $cEstadoLabel ="<option value=\"A\" selected>Activo</option>
                                                       				   <option value=\"C\">Cerrado</option>";
                                                  break;
                                       case 'C':
                                                       $cEstadoLabel ="<option value=\"A\">Activo</option>
                                                       				   <option value=\"C\" selected>Cerrado</option>";
                                                  break;
                                        default :

                                            break;
                                    }
                               $objProveedor = new poolConnection();
                               $con=$objProveedor->Conexion();
                               $objProveedor->BaseDatos($con);
                               $sql="SELECT Id_Proveedor,vNombre FROM sa_proveedor order by vNombre";
                               $RSet=$objProveedor->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   if($Id_Proveedor==$fila[Id_Proveedor])
                                   {
                                       $cboProveedor .= "<option value='$fila[Id_Proveedor]' selected>$fila[vNombre]</option>";
                                   }
                                  else
                                  {
                                    $cboProveedor .= "<option value='$fila[Id_Proveedor]'>$fila[vNombre]</option>";  
                                  }
                                   
                               }
                               $objProveedor->Cerrar($con,$RSet);

                               $objUAdministrativa = new poolConnection();
                               $con=$objUAdministrativa->Conexion();
                               $objUAdministrativa->BaseDatos($con);
                               $sql="SELECT Id_Unidad,vDescripcion FROM sa_unidadadmva order by vDescripcion";
                               $RSet=$objUAdministrativa->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   if($Id_UnidadAdmonDes==$fila[Id_Unidad])
                                   {
                                      $cboUAdministrativa .= "<option value='$fila[Id_Unidad]' selected>$fila[vDescripcion]</option>"; 
                                   }
                                  else
                                  {
                                     $cboUAdministrativa .= "<option value='$fila[Id_Unidad]'>$fila[vDescripcion]</option>"; 
                                  }
                                   
                               }
                               $objUAdministrativa->Cerrar($con,$RSet);

                                $objCambs = new poolConnection();
                               $con=$objCambs->Conexion();
                               $objCambs->BaseDatos($con);
                               $sql="SELECT Id_CABMS,vDescripcionCABMS FROM sa_cabms order by vDescripcionCABMS ";
                               $RSet=$objCambs->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   $cboCambs .= "<option value='$fila[Id_CABMS]'>$fila[vDescripcionCABMS]</option>";
                               }
                               $objCambs->Cerrar($con,$RSet);
                          
                               $objUMedida = new poolConnection();
                               $con=$objUMedida->Conexion();
                               $objCambs->BaseDatos($con);
                               $sql="SELECT Id_UMedida,vDescripcion FROM sa_umedida order by vDescripcion ";
                               $RSet=$objUMedida->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   $cboUMedida .= "<option value='$fila[Id_UMedida]'>$fila[vDescripcion]</option>";
                               }
                               $objUMedida->Cerrar($con,$RSet);

       //Frid Detalle
                        $frm="
                            <fieldset>
                            <legend><div class=\"txt_titulos_bold\">Datos del Pedido : $id</div></legend>
                            <form name='frmPedido' id='frmPedido'  action='' method='post'>
                            <br>
                            <table>
                                <tr>
                                    <td><div class=\"txt_titulos_bold\">Proveedor:</div></td>
                                    <td>
                                        <select data-placeholder=\"Proveedor\" style=\"width:380px;\" tabindex=\"1\"  class='chzn-select validate[required]' name='cboProveedor' id='cboProveedor' >
                                            <option value=\"\"></option>
                                          $cboProveedor
                                        </select>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class=\"txt_titulos_bold\">Requesici&oacute;n:</div>
                                    </td>
                                    <td>
                                        <input  type=\"text\" id=\"txtRequisicion\"  name=\"txtRequisicion\" value='$vNoRequisicion' class=\"boxes_form200px validate[required,minSize[1]]\"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=\"txt_titulos_bold\">Licitaci&oacute;n:</div>
                                    </td>
                                    <td>
                                        <input  type=\"text\" id=\"txtLicitacion\"  name=\"txtLicitacion\" value='$vNoLicitacion' class=\"boxes_form200px validate[required,minSize[1]]\"/>
                                    </td>
                                    <td><div class=\"txt_titulos_bold\">Estatus:</div></td>
                                    <td>
                                         <select data-placeholder=\"Estado\" style=\"width:100px;\" tabindex=\"1\"  class='chzn-select validate[required]' name='txtEstatusr' id='txtEstatus' >
                                           $cEstadoLabel
                                        </select> 
                                   </td>
                                    <td><div class=\"txt_titulos_bold\">Fecha Pedido:</div></td>
                                    <td><input  type=\"text\" id=\"txtFecha\"  name=\"txtFecha\" value='$Fecha' class=\"boxes_form100px\"/></td>
                                </tr>

                            </table>
                            <table>
                            <tr>
                                   <td><div class=\"txt_titulos_bold\">U.Admin.:</div></td>
                                    <td>
                                        <select name='cbouadmin' id='cbouadmin' data-placeholder=\"Unidad Admin.\" style=\"width:480px;\" tabindex=\"1\"  class='chzn-select validate[required]'>
                                            <option value=\"\"></option>
                                            $cboUAdministrativa
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                             </table> 
                             <br>
                             
                            </form>
                        </fieldset>
                        <br>
                        <!-- Aqui Empiesan  Pestañas -->
                        <fieldset>
                            <legend><div class=\"txt_titulos_bold\">Detalles del pedido</div></legend>  
                            
                            <div id=\"tabs\">
                                 
                                    <ul>
                                            <li><a href=\"#tabs-1\">Pedido</a></li>
                                            <li><a href=\"#tabs-2\">Fecha de Entrega</a></li>
                                    </ul>
                                    
                                    <div id=\"tabs-1\">
                                         <div id='contenido1'>  
                                            <div id='GridForm'>
                                                <table>
                                                        <tr>
                                                            <td>
                                                                <fieldset style=\"width:200px\">
                                                                    <legend><div class=\"txt_titulos_bold\">Almacen</div></legend>
                                                                    <table>
                                                                        <tr>
                                                                            <td><div class=\"txt_titulos_bold\">Consumible</div></td>
                                                                            <td><input type=\"radio\" id=\"rdAlmacen\" name=\"rdConsumible\" value=\"C\"/></td>
                                                                            <td><div class=\"txt_titulos_bold\">Inventariable</div></td>
                                                                            <td><input type=\"radio\" id=\"rdAlmacen\" name=\"rdConsumible\" value=\"I\"/></td>
                                                                        </tr>
                                                                    </table>
                                                                </fieldset>
                                                            </td> 
                                                        </tr>
                                                </table> 
                                                <table>
	                                                   <tr>
	                                                      <td><div class=\"txt_titulos_bold\"> Partida : </div></td>
	                                                      <td>
	                                                            <input type=\"text\" name=\"txtPartida\" id=\"txtPartida\" class=\"boxes_form100px\">
	                                                       </td>
	                                                   </tr>		
                                                </table>
                                                <table>
                                                       <tr>
                                                           <td>
                                                                <select data-placeholder=\"Cabms\" style=\"width:460px;\" tabindex=\"1\"  class='chzn-select validate[required]' id='cbocambs' name='cbocambs'>
                                                                    <option value=\"\"></option>
                                                                     $cboCambs;
                                                                </select>
                                                               
                                                                
                                                            </td>
                                                            <td>
                                                               &nbsp;&nbsp;
                                                            </td>
                                                        </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Descripci&oacute;n</div></td>
                                                        <td>
                                                            <textarea id='txtDescripcion' name='txtDescripcion' class=\"boxes_form_textarea400px\"></textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                        <tr>
                                                            <td><div class=\"txt_titulos_bold\">Cantidad:</div></td>
                                                            <td>
                                                                <input  type=\"text\" id=\"txtCantidad\"  name=\"txtCantidad\" value='0' class=\"boxes_form100px\"/>
                                                            </td>
                                                            <td>
                                                            <td>
                                                                <select name='cboUMedida' id='cboUMedida' data-placeholder=\"Medida\" style=\"width:200px;\" tabindex=\"1\"  class='chzn-select validate[required]'>
                                                                    <option value=\"\"></option>
                                                                    $cboUMedida
                                                                </select>
                                                            </td>
                                                            <td><div class=\"txt_titulos_bold\">Precio:</div></td>
                                                            <td><input  type=\"text\" id=\"txtPrecio\"  name=\"txtPrecio\" class=\"boxes_form100px\" value='0'/></td>
                                                            <td><div class=\"txt_titulos_bold\">IVA:</div></td>
                                                            <td><input  type=\"text\" id=\"txtIVA\"  name=\"txtIVA\" class=\"boxes_form100px\" value='0'/></td>
                                                            <td><div class=\"txt_titulos_bold\">Descuentos:</div></td>
                                                            <td><input  type=\"text\" id=\"txtDescuento\"  name=\"txtDescuento\" class=\"boxes_form100px\" value='0'/></td>
                                                        </tr>
                                                </table>
                                                <br>
                                                    <input type=\"hidden\" name=\"txtFolios\" id=\"txtFolios\" value=\"$id\"/>
                                                    <table>
                                                        <tr>
                                                            <td><img src=\"../../interfaz_modulos/botones/agregar.jpg\" name=\"ImageAdd\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageAdd\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAdd','','../../interfaz_modulos/botones/agregar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"add_partida_editar();\"/></td>
                                                        </tr>
                                                    </table> 
                                                    
                                              </div>
                                              <div id='GridDetalle'>
                                                      $FliexGrid
                                              </div> 
                                           </div>       
                                    </div>
                                    <div id=\"tabs-2\">
                                            <div id='contenido2'>
                                               <div id='GridDetalleFecha'></div>
                                           </div> 
                                    </div>
                            </div>
                            
                        </fieldset>
                        <br>
                          &nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageA\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"actualizar_pedido($eNumModificaciones);\" style=\"cursor:pointer\"/>
                         <script>
                                                $(function() {
                                                        $(\"#txtFecha\").datepicker();
                                                });
                                                        $(function() {
                                                                 $(\"#tabs\").tabs();
                                                         });
                                                         jQuery(document).ready(function(){
                                                     // binds form submission and fields to the validation engine
                                                     jQuery(\"#frmPedido\").validationEngine();
                                             });


                                        function checkHELLO(field, rules, i, options){
                                                if (field.val() != \"HELLO\") {
                                                        // this allows to use i18 for the error msgs
                                                        return options.allrules.validate2fields.alertText;
                                                }
                                        }
                                         $(\".chzn-select\").chosen(); 
                                         $(\".chzn-select-deselect\").chosen({allow_single_deselect:true});
                                         reload_grid('$id');
                            </script>
                            ";
                        return $frm; 
 }
 public function  guardar_edicion_pedido($AData)
 {
        $Id_Proveedor=$AData->Id_Proveedor;
        $Id_UnidadAdmonDes=$AData->Id_UnidadAdmonDes;
        $dFechaPedido=$AData->dFechaPedido;
        $vNoRequisicion=$AData->vNoRequisicion;
        $vNoLicitacion=$AData->vNoLicitacion;
        $eNumModificaciones=$AData->eNumModificaciones;
        $cEstado=$AData->cEstado;
        $Filio = $AData->Folio;
        switch ($cEstado)
        {
            case 'Activo':
                           $cEstado ="A";
                      break;
           case 'Cerrado':
                           $cEstado = "C";
                      break;
            default :

                break;
        }
        
        $dFechaPedidoArray = split("/",$dFechaPedido);
        $FechaPedido="$dFechaPedidoArray[2]/$dFechaPedidoArray[0]/$dFechaPedidoArray[1]";
        
        	
        $Y = date(Y);
        $M = date(m);
        $D = date(d);
        $dFechaModRegistro ="$Y/$M/$D";
        $eNumModificaciones=$eNumModificaciones + 1;
        
        $objActualizar = new poolConnection();
     $con=$objActualizar->Conexion();
        $objActualizar->BaseDatos($con);
        $sql="update  sa_pedido set
            Id_Proveedor='$Id_Proveedor',
            Id_UnidadAdmonDes='$Id_UnidadAdmonDes', 
            dFechaPedido='$FechaPedido', 
            vNoRequisicion='$vNoRequisicion', 
            vNoLicitacion='$vNoLicitacion', 
            cEstado='$cEstado', 
            eNumModificaciones='$eNumModificaciones',
            dFechaModRegistro ='$dFechaModRegistro'
        Where  Id_Pedido='$Filio'";
        
        $R=$objActualizar->Query($con,$sql);
        $objActualizar->Cerrar($con,$R);
     return $sql;
         
 }
 
 public function frm_borrar_pedido()
 {
     $frm="<div  id='divBuscador' name='divBuscador'>
              <form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Borrar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Pedido</div></td>
                            <td><input  type=\"text\" id=\"txtPatron\"  name=\"txtPatron\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar_borrar_pedido();\"/></td>
                        </tr>
                </table>
                <table>
                <tr>
                    <td><div class=\"txt_titulos_bold\">No. Folio:<input type=\"checkbox\" name=\"chkFolio\" id=\"chkFolio\" value=\"Folio\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Requisicion:<input type=\"checkbox\" name=\"chkRequisicion\" id=\"chkRequisicion\" value=\"Requisicion\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Licitacion:<input type=\"checkbox\" name=\"chkLicitacion\" id=\"chkLicitacion\" value=\"Licitacion\"/></div></td>
                    
                </tr>
            </table> 
              </fieldset>
              </form>
              </div>
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
        <div id=\"DivBusqueda\"></div>";
        return $frm;
 }
 function buscar_borrar_pedido($AData)
 {
        $Patron=$AData->Patron;
        $ACFolio=$AData->Folio;
        $ACRequisicion=$AData->Requisicion;
        $ACLicitacion=$AData->Licitacion;
        #Preparamos ware
     $where = "";
        if($ACFolio=="Si")
        {
            $where.="Id_Pedido  like '%$Patron%' or "; 
        }
        
        if($ACRequisicion=="Si")
        {
            $where.="vNoRequisicion like '%$Patron%' or "; 
        }
        if($ACLicitacion)
        {
           $where.="vNoLicitacion like '%$Patron%' or "; 
        }  
        $where = substr($where, 0, -3);
        
        $objGridFacturas = new poolConnection();
        $objGetProveedor = new Pedidos(); 
        $con=$objGridFacturas->Conexion();
        $objGridFacturas->BaseDatos($con);
        $sql="SELECT 
                Id_Pedido,
                Id_Proveedor,
                dFechaPedido,
                vNoRequisicion,
                vNoLicitacion
                FROM sa_pedido
                Where $where";
        $RSet=$objGridFacturas->Query($con,$sql);
        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";
        while($fila=mysqli_fetch_array($RSet))
        {
            $i++;
            $proveedor = $objGetProveedor->getProveedor($fila[Id_Proveedor]); 
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/borrar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/borrar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_todo_pedido('$fila[Id_Pedido]');\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$proveedor</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaPedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoRequisicion]</td> 
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoLicitacion]</td>   
                              </tr>";
        }
        $objGridFacturas->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                          {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Proveedor', name : 'Proveedor', width :300, sortable :false, align: 'center'},
                                          {display: 'Fecha Pedido', name : 'Fecha Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Requisicion', name : 'Requisicion', width :200, sortable :false, align: 'center'},
                                          {display: 'Licitacion', name : 'Licitacion', width :200, sortable :false, align: 'center'},
                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 940,
                          height: 520
                          }

                          );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
        return $FliexGrid;  
     
 }
 public function borrar_todo_pedido($id)
 {
     //Borramos los detalles del pedido
     $sql[0]="delete from sa_fechaprogramadaentrega where Id_Pedido='$id'";
     $sql[1]="delete from sa_detallepedido where Id_Pedido='$id'";
     $sql[2]="delete from sa_pedido where Id_Pedido='$id'";
     
     foreach ($sql as $key => $value)
         {
            if(!empty($value))
              {
                    $objBorrar = new poolConnection();
                    $con=$objBorrar ->Conexion();
                    $objBorrar->BaseDatos($con);
                    $R=$objBorrar->Query($con,$value);
                    $objBorrar->Cerrar($con,$R);
              }  
         }
     
     
     
 }
public function frm_buscar_consultar()
{
    $frm="<div  id='divBuscador' name='divBuscador'>
              <form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Pedido</div></td>
                            <td><input  type=\"text\" id=\"txtPatron\"  name=\"txtPatron\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar_consultar();\"/></td>
                        </tr>
                </table>
                <table>
                <tr>
                    <td><div class=\"txt_titulos_bold\">No. Folio:<input type=\"checkbox\" name=\"chkFolio\" id=\"chkFolio\" value=\"Folio\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Requisicion:<input type=\"checkbox\" name=\"chkRequisicion\" id=\"chkRequisicion\" value=\"Requisicion\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Licitacion:<input type=\"checkbox\" name=\"chkLicitacion\" id=\"chkLicitacion\" value=\"Licitacion\"/></div></td>
                    
                </tr>
            </table> 
              </fieldset>
              </form>
              </div>
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
        <div id=\"DivBusqueda\"></div>";
        return $frm;
}
public function buscar_consultar_pedido($AData)
{
    $Patron=$AData->Patron;
        $ACFolio=$AData->Folio;
        $ACRequisicion=$AData->Requisicion;
        $ACLicitacion=$AData->Licitacion;
        #Preparamos ware
    $where = "";
        if($ACFolio=="Si")
        {
            $where.="Id_Pedido  like '%$Patron%' or "; 
        }
        
        if($ACRequisicion=="Si")
        {
            $where.="vNoRequisicion like '%$Patron%' or "; 
        }
        if($ACLicitacion)
        {
           $where.="vNoLicitacion like '%$Patron%' or "; 
        }  
        $where = substr($where, 0, -3);
        
        $objGridFacturas = new poolConnection();
        $objGetProveedor = new Pedidos(); 
        $con=$objGridFacturas->Conexion();
        $objGridFacturas->BaseDatos($con);
        $sql="SELECT 
                Id_Pedido,
                Id_Proveedor,
                dFechaPedido,
                vNoRequisicion,
                vNoLicitacion
                FROM sa_pedido
                Where $where";
        $RSet=$objGridFacturas->Query($con,$sql);
        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";
        while($fila=mysqli_fetch_array($RSet))
        {
            $i++;
            $proveedor = $objGetProveedor->getProveedor($fila[Id_Proveedor]); 
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/examinar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/examinar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"show_detalle('$fila[Id_Pedido]');\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$proveedor</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaPedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoRequisicion]</td> 
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoLicitacion]</td>   
                              </tr>";
        }
        $objGridFacturas->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                          {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Proveedor', name : 'Proveedor', width :300, sortable :false, align: 'center'},
                                          {display: 'Fecha Pedido', name : 'Fecha Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Requisicion', name : 'Requisicion', width :200, sortable :false, align: 'center'},
                                          {display: 'Licitacion', name : 'Licitacion', width :200, sortable :false, align: 'center'},
                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 940,
                          height: 520
                          }

                          );
                        $(function() {  
                                        $( \"#dialog\" ).dialog({
                                                            autoOpen: false,
                                                            width: 750,
                                                            height: 400
                                                    });
                                                });

                                    function on()
                                    {
                                       $(\"#dialog\").dialog(\"open\"); 
                                    }  
                        </script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
        return $FliexGrid;
    
}




public function detalle($id)
{
    
      //Obtenemos los datos
                               $objDatos =  new poolConnection();
                               $con=$objDatos ->Conexion();
                               $objDatos ->BaseDatos($con);
                               $sql="select Id_Proveedor,Id_UnidadAdmonDes,dFechaPedido,vNoRequisicion,vNoLicitacion,dFechaRegistro,cEstado,eNumModificaciones  from sa_pedido where Id_Pedido='$id'";
                               $Rset=$objDatos ->Query($con,$sql);
                               while ($row = mysqli_fetch_array($Rset))
                                   {
                                       $Id_Pedido=$row[Id_Pedido];
                                       $Id_Proveedor=$row[Id_Proveedor];
                                       $Id_UnidadAdmonDes=$row[Id_UnidadAdmonDes];
                                       $dFechaPedido=$row[dFechaPedido];
                                       $vNoRequisicion=$row[vNoRequisicion];
                                       $vNoLicitacion=$row[vNoLicitacion];
                                       $dFechaRegistro=$row[dFechaRegistro];
                                       $cEstado=$row[cEstado];
                                       $eNumModificaciones =$row[eNumModificaciones ];
                                    }
                               $objDatos ->Cerrar($con,$Rset);
                               $ArrayFecha = split("-",$dFechaRegistro);
                               $D=$ArrayFecha[2];
                               $M=$ArrayFecha[1];
                               $Y=$ArrayFecha[0];
                               $Fecha = "$M/$D/$Y";
                               switch ($cEstado)
                                    {
                                        case 'A':
                                                       $cEstado ="Activo";
                                                  break;
                                       case 'C':
                                                       $cEstado = "Cerrado";
                                                  break;
                                        default :

                                            break;
                                    }
                               $objProveedor = new poolConnection();
                               $con=$objProveedor->Conexion();
                               $objProveedor->BaseDatos($con);
                               $sql="SELECT Id_Proveedor,vNombre FROM sa_proveedor order by vNombre";
                               $RSet=$objProveedor->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   if($Id_Proveedor==$fila[Id_Proveedor])
                                   {
                                       $cboProveedor = "$fila[vNombre]";
                                   }
                                  
                                   
                               }
                               $objProveedor->Cerrar($con,$RSet);

                               $objUAdministrativa = new poolConnection();
                               $con=$objUAdministrativa->Conexion();
                               $objUAdministrativa->BaseDatos($con);
                               $sql="SELECT Id_Unidad,vDescripcion FROM sa_unidadadmva order by vDescripcion";
                               $RSet=$objUAdministrativa->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   
                                      $cboUAdministrativa = "$fila[vDescripcion]"; 
                                  
                                   
                               }
                               $objUAdministrativa->Cerrar($con,$RSet);

                                $objCambs = new poolConnection();
                               $con=$objCambs->Conexion();
                               $objCambs->BaseDatos($con);
                               $sql="SELECT Id_CABMS,vDescripcionCABMS FROM sa_cabms order by vDescripcionCABMS ";
                               $RSet=$objCambs->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   $cboCambs .= "<option value='$fila[Id_CABMS]'>$fila[vDescripcionCABMS]</option>";
                               }
                               $objCambs->Cerrar($con,$RSet);
                          
                               $objUMedida = new poolConnection();
                               $con=$objUMedida->Conexion();
                               $objCambs->BaseDatos($con);
                               $sql="SELECT Id_UMedida,vDescripcion FROM sa_umedida order by vDescripcion ";
                               $RSet=$objUMedida->Query($con,$sql);
                               while($fila=  mysqli_fetch_array($RSet))
                               {
                                   $cboUMedida .= "<option value='$fila[Id_UMedida]'>$fila[vDescripcion]</option>";
                               }
                               $objUMedida->Cerrar($con,$RSet);
       $Flex=$this->detalle_peido_grid($id);
       $Flex2=$this->detalle_peidofehca_grid($id);
       //Frid Detalle
                        $frm="
                            <fieldset>
                            <legend><div class=\"txt_titulos_bold\">Datos del Pedido : $id</div></legend>
                            <form name='frmPedido' id='frmPedido'  action='' method='post'>
                            <br>
                            <table>
                                <tr>
                                    <td><div class=\"txt_titulos_bold\">Proveedor:</div></td>
                                    <td>$cboProveedor</td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class=\"txt_titulos_bold\">Requusici&oacute;n:</div>
                                    </td>
                                    <td>
                                        $vNoRequisicion
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=\"txt_titulos_bold\">Licitaci&oacute;n:</div>
                                    </td>
                                    <td>
                                        $vNoLicitacion
                                    </td>
                                    <td><div class=\"txt_titulos_bold\">Estatus:</div></td>
                                    <td>$cEstado</td>
                                    <td><div class=\"txt_titulos_bold\">Fecha Pedido:</div></td>
                                    <td>$Fecha</td>
                                </tr>

                            </table>
                            <table>
                            <tr>
                                   <td><div class=\"txt_titulos_bold\">U.Admin.:</div></td>
                                    <td>$cboUAdministrativa</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                             </table> 
                             <br>
                             
                            </form>
                        </fieldset>
                        <br>
                        <!-- Aqui Empiesan  Pestañas -->
                        <fieldset>
                            <legend><div class=\"txt_titulos_bold\">Detalles del pedido</div></legend>  
                            
                            <div id=\"tabs\">
                                 
                                    <ul>
                                            <li><a href=\"#tabs-1\">Pedido</a></li>
                                            <li><a href=\"#tabs-2\">Fecha de Entrega</a></li>
                                    </ul>
                                    
                                    <div id=\"tabs-1\">
                                         <div id='contenido1'>  
                                            <div id='GridForm'></div>
                                              <div id='GridDetalle'>
                                                 $Flex     
                                              </div> 
                                           </div>       
                                    </div>
                                    <div id=\"tabs-2\">
                                            <div id='contenido2'>
                                               <div id='GridDetalleFecha'>
                                               $Flex2
                                               </div>
                                           </div> 
                                    </div>
                            </div>
                            
                        </fieldset>
                        <script>
                                    $(function() {
                                             $(\"#tabs\").tabs();
                                     });
                                     
                            </script>
                            ";
                        return $frm;
    
    
    
    
}
 public function grid_pedido($idpedido)
    {
      
        //Grid

        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";

        $objGridPedido = new poolConnection();
        $con=$objGridPedido->Conexion();
        $objGridPedido->BaseDatos($con);
        $sql="SELECT sa_detallepedido.Id_Partida, 
                    sa_detallepedido.Id_CABMS, 
                    sa_detallepedido.Id_CveARTCABMS,
                    sa_detallepedido.Id_UMedida,
                    sa_detallepedido.Id_CveInternaAC,
                    sa_detallepedido.eCantidad,
                    sa_detallepedido.mPrecioUnitario,
                    sa_detallepedido.vCaracteristicas,
                    sa_detallepedido.dFechaRegistro,
                    sa_detallepedido.dFechaModRegistro,
                    sa_detallepedido.cEstado,
                    sa_detallepedido.nIva,
                    sa_detallepedido.nDescuento,
                    sa_detallepedido.cTipoAlmacen,
                    sa_detallepedido.eCantidadEntregada,
                    sa_fechaprogramadaentrega.Id As DNIFechaEntregas
                    FROM sa_detallepedido,sa_fechaprogramadaentrega 
                    WHERE 
                    sa_detallepedido.Id_Pedido='$idpedido'
                    and
                    sa_fechaprogramadaentrega.Id_Pedido=sa_detallepedido.Id_Pedido
                    and 
                     sa_fechaprogramadaentrega.Id_Partida = sa_detallepedido.Id_Partida";
        $RSet=$objGridPedido->Query($con,$sql);
        while($fila=mysqli_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CveARTCABMS]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CveInternaAC]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[mPrecioUnitario]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCaracteristicas]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cEstado]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nIva]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nDescuento]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoAlmacen]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidadEntregada]</td>    
                              </tr>";
        }
        $objGridPedido->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          
                                          {display: 'CABMS', name : 'Codigo', width :100, sortable :false, align: 'center'},
                                          {display: 'Art. CABMS', name : 'Responsable', width :100, sortable :false, align: 'center'},
                                          {display: 'U. Medida', name : 'U. Medida', width :100, sortable :false, align: 'center'},
                                          {display: 'CveInternaAC', name : 'CveInternaAC', width :100, sortable :false, align: 'center'},
                                          {display: 'Cantidad', name : '', width :100, sortable :false, align: 'center'},
                                          {display: 'Precio Unitario', name : 'Precio Unitario', width :100, sortable :false, align: 'center'},
                                          {display: 'Caracteristicas', name : 'Caracteristicas', width :100, sortable :false, align: 'center'},
                                          {display: 'F. Registro', name : 'F. Registro', width :100, sortable :false, align: 'center'},
                                          {display: 'Estado', name : 'Estado', width :100, sortable :false, align: 'center'},
                                          {display: 'IVA', name : 'IVA', width :100, sortable :false, align: 'center'},
                                          {display: 'Descuento', name : 'Descuento', width :100, sortable :false, align: 'center'},
                                          {display: 'Almacen', name : 'Almacen', width :100, sortable :false, align: 'center'},
                                          {display: 'Cantidad Entregada', name : 'Cantidad Entregada', width :100, sortable :false, align: 'center'},

                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 940,
                          height: 250
                          }

                          );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
        return $FliexGrid;
    }
 public function grid_fechaentrega($idpedido)
 {
     
          //Grid

        $FliexGrid = "<hr><form action=''  id='frmOrderGridFecha' name='frmOrderGridFecha' method='post'><table class=\"flexme2\">
                                         <tbody>";

        $objGridPedido = new poolConnection();
        $con=$objGridPedido->Conexion();
        $objGridPedido->BaseDatos($con);
        $sql="SELECT 
                Id,
                Id_Pedido,
                Id_Partida,
                Id_dFechEntrega,
                eCantidad,
                Id_Modificacion,
                dFechaRegistro,
                dFechaModRegistro
                FROM  sa_fechaprogramadaentrega Where Id_Pedido='$idpedido'";
        $RSet=$objGridPedido->Query($con,$sql);
        while($fila=mysqli_fetch_array($RSet))
        {
            $i++;
            $FliexGrid.="
                              <tr>
                                  
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Partida]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblfecha$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblfecha$i').hide();\$('#Fecha$i').show();\">$fila[Id_dFechEntrega]</span><input style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;width:390px;display:none\" type=\"text\" id=\"Fecha$i\" name=\"Fecha[$i]\" value=\"$fila[Id_dFechEntrega]\"></td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaModRegistro]</td>   
                              </tr>";
           $scriptFecha .="$(function() {\$(\"#Fecha$i\").datepicker();});\n";
           
        }
        $objGridPedido->Cerrar($con,$RSet);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme2').flexigrid({
                          title: '',
                          colModel : [

                                          
                                          {display: 'Partida', name : 'Partida', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Entrega', name : 'Fecha Entrega', width :100, sortable :false, align: 'center'},
                                          {display: 'Cantidad', name : 'Cantidad', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Registro', name : 'Fecha Registro', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Modificacion', name : '', width :100, sortable :false, align: 'center'},
                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 940,
                          height: 250
                          }

                          );
                          $scriptFecha
                          </script><input type=\"hidden\"  name=\"ActGridFechas\" value=\"Si\"></form>";
        return $FliexGrid;
    }
 public function detalle_peido_grid($id)
 {
			 	//Grid
			 	
			 	$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
			 	<tbody>";
			 	
			 	$objGridPedido = new poolConnection();
			 	$con=$objGridPedido->Conexion();
			 	$objGridPedido->BaseDatos($con);
			 	$sql="SELECT sa_detallepedido.Id_Partida,
			 	sa_detallepedido.Id_CABMS,
			 	sa_detallepedido.Id_CveARTCABMS,
			 	sa_detallepedido.Id_UMedida,
			 	sa_detallepedido.Id_CveInternaAC,
			 	sa_detallepedido.eCantidad,
			 	sa_detallepedido.mPrecioUnitario,
			 	sa_detallepedido.vCaracteristicas,
			 	sa_detallepedido.dFechaRegistro,
			 	sa_detallepedido.dFechaModRegistro,
			 	sa_detallepedido.cEstado,
			 	sa_detallepedido.nIva,
			 	sa_detallepedido.nDescuento,
			 	sa_detallepedido.cTipoAlmacen,
			 	sa_detallepedido.eCantidadEntregada,
			 	sa_fechaprogramadaentrega.Id As DNIFechaEntregas
			 	FROM sa_detallepedido,sa_fechaprogramadaentrega
			 	WHERE
			 	sa_detallepedido.Id_Pedido='$id'
			 	and
			 	sa_fechaprogramadaentrega.Id_Pedido=sa_detallepedido.Id_Pedido
			 	and
			 	sa_fechaprogramadaentrega.Id_Partida = sa_detallepedido.Id_Partida";
			 	$RSet=$objGridPedido->Query($con,$sql);
			 	while($fila=mysqli_fetch_array($RSet))
			 	{
			 	$i++;
			 	$FliexGrid.="
			 	<tr>
			 
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_UMedida]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[mPrecioUnitario]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCaracteristicas]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cEstado]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nIva]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[nDescuento]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoAlmacen]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidadEntregada]</td>
			 	</tr>";
			 	}
			 	$objGridPedido->Cerrar($con,$RSet);
			 	$FliexGrid.="       </tbody>
			 	</table><script>$('.flexme1').flexigrid({
			 	title: '',
			 	colModel : [
			 	
			 	
			 	{display: 'CABMS', name : 'Codigo', width :100, sortable :false, align: 'center'},
			 	{display: 'U. Medida', name : 'U. Medida', width :100, sortable :false, align: 'center'},
			 	{display: 'Cantidad', name : '', width :100, sortable :false, align: 'center'},
			 	{display: 'Precio Unitario', name : 'Precio Unitario', width :100, sortable :false, align: 'center'},
			 	{display: 'Caracteristicas', name : 'Caracteristicas', width :100, sortable :false, align: 'center'},
			 	{display: 'F. Registro', name : 'F. Registro', width :100, sortable :false, align: 'center'},
			 	{display: 'Estado', name : 'Estado', width :100, sortable :false, align: 'center'},
			 	{display: 'IVA', name : 'IVA', width :100, sortable :false, align: 'center'},
			 	{display: 'Descuento', name : 'Descuento', width :100, sortable :false, align: 'center'},
			 	{display: 'Almacen', name : 'Almacen', width :100, sortable :false, align: 'center'},
			 	{display: 'Cantidad Entregada', name : 'Cantidad Entregada', width :100, sortable :false, align: 'center'}
			 	
			 	],
			 	buttons : [
			 	{name: '',onpress:saver_Order},
			 	{separator: true}
			 	],
			 	width: 940,
			 	height: 250
			 	}
			 	
			 	);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
			 	return $FliexGrid;
 }
 
 public function detalle_peidofehca_grid($id)
 {
 	
			 	$FliexGrid = "<hr><form action=''  id='frmOrderGridFecha' name='frmOrderGridFecha' method='post'><table class=\"flexme2\">
			 	<tbody>";
			 	
			 	$objGridPedido = new poolConnection();
			 	$con=$objGridPedido->Conexion();
			 	$objGridPedido->BaseDatos($con);
			 	$sql="SELECT
			 	Id,
			 	Id_Pedido,
			 	Id_Partida,
			 	Id_dFechEntrega,
			 	eCantidad,
			 	Id_Modificacion,
			 	dFechaRegistro,
			 	dFechaModRegistro
			 	FROM  sa_fechaprogramadaentrega Where Id_Pedido='$id'";
			 	$RSet=$objGridPedido->Query($con,$sql);
			 	while($fila=mysqli_fetch_array($RSet))
			 	{
			 	$i++;
			 	$FliexGrid.="
			 	<tr>
			 	
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Partida]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><span id='lblfecha$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblfecha$i').hide();\$('#Fecha$i').show();\">$fila[Id_dFechEntrega]</span><input style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;width:390px;display:none\" type=\"text\" id=\"Fecha$i\" name=\"Fecha[$i]\" value=\"$fila[Id_dFechEntrega]\"></td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
			 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaModRegistro]</td>
			 	</tr>";
			 	
			 	 
			 	}
			 	$objGridPedido->Cerrar($con,$RSet);
			 	$FliexGrid.="       </tbody>
			 	</table><script>$('.flexme2').flexigrid({
			 	title: '',
			 	colModel : [
			 	
			 	
			 	{display: 'Partida', name : 'Partida', width :100, sortable :false, align: 'center'},
			 	{display: 'Fecha Entrega', name : 'Fecha Entrega', width :100, sortable :false, align: 'center'},
			 	{display: 'Cantidad', name : 'Cantidad', width :100, sortable :false, align: 'center'},
			 	{display: 'Fecha Registro', name : 'Fecha Registro', width :100, sortable :false, align: 'center'},
			 	{display: 'Fecha Modificacion', name : '', width :100, sortable :false, align: 'center'},
			 	],
			 	buttons : [
			 	{name: '',onpress:saver_Order},
			 	{separator: true}
			 	],
			 	width: 940,
			 	height: 250
			 	}
			 	
			 	);
			 	$scriptFecha
			 	</script><input type=\"hidden\"  name=\"ActGridFechas\" value=\"Si\"></form>";
			 	return $FliexGrid;
 }
}

?>
