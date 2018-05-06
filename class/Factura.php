<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Factura
 *
 * @author armand
 */
class Factura {
    
    public function frm_factura()
    {
                        
                           $objProveedor = new poolConnection();
                           $con=$objProveedor->Conexion();
                           $objProveedor->BaseDatos();
                           $sql="SELECT Id,Id_Proveedor,vNombre FROM sa_proveedor order by vNombre";
                           $RSet=$objProveedor->Query($sql);
                           while($fila=  mysql_fetch_array($RSet))
                           {
                               $cboProveedor .= "<option value='$fila[Id_Proveedor]'>$fila[vNombre]</option>";
                           }
                           mysql_free_result($RSet);
                           $objProveedor->Cerrar($con);
                   $Y=date(Y);
                    $frm="<form name=\"frmFactura\" id=\"frmFactura\" action=\"\" method=\"post\">
                    <fieldset>
                        <legend><div class=\"txt_titulos_bold\">Datos del Alta Factura</div></legend>
                        <table>
                            <tr>
                                <td>
                                    <div class=\"txt_titulos_bold\">Folio:</div>
                                </td>
                                <td>
                                     <input type=\"text\" name=\"txtFolio\" id=\"txtFolio\" value=\"$Y\" class=\"boxes_form100px\"/>-<input type=\"text\" name=\"txtClave\" id=\"txtClave\" class=\"boxes_form100px\"/>
                                </td>
                                <td>
                                    <div class=\"txt_titulos_bold\">Fecha de Alta:</div>
                                </td>
                                <td>
                                    <input type=\"text\" name=\"txtFechaAlta\" id=\"txtFechaAlta\" class=\"boxes_form100px\"/>
                                </td>
                                <td>
                                    <div class=\"txt_titulos_bold\">Estatus:</div>
                                </td>
                                <td>
                                    <input type=\"text\" name=\"txtEstado\" id=\"txtEstado\" class=\"boxes_form100px validate[required,minSize[1]]\"/>
                                </td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
                                <td><input type=\"text\" name=\"txtPedido\" id=\"txtPedido\" class=\"boxes_form200px\" onclick=\"on();\"/></td>
                                <td><div class=\"txt_titulos_bold\">Factura:</div></td>
                                <td><input type=\"text\" name=\"txtFactura\" id=\"txtFactura\" class=\"boxes_form100px validate[required,minSize[1]]\"/></td>
                                <td><div class=\"txt_titulos_bold\">Importe:</div></td>
                                <td><input type=\"text\" name=\"txtImporte\" id=\"txtImporte\" class=\"boxes_form100px validate[required,minSize[1]]\"/></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <div class=\"txt_titulos_bold\">Proveedor:</div>
                                </td>
                                <td>
                                   <div id=\"DivCbo\">
                                        <select data-placeholder=\"Proveedor\" style=\"width:460px;\" tabindex=\"1\"  class='chzn-select' name='cboProveedor' id='cboProveedor'>
                                            <option value=\"\"></option>
                                            $cboProveedor
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <img src=\"../../interfaz_modulos/botones/guardar.jpg\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onmouseout=\"MM_swapImgRestore()\" name=\"Image8\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" style=\"cursor:pointer\" onclick=\"guardar();\" />    
                    </fieldset>
                    </form>    
                    <script>
                            $(function() {
                                    $(\"#txtFechaAlta\").datepicker();
                             });
                                  jQuery(document).ready(function()
                                   {
                                       jQuery(\"#frmFactura\").validationEngine();
                                    });

                                function checkHELLO(field, rules, i, options)
                                        {
                                               if (field.val() != \"HELLO\") 
                                                   {
                                                        return options.allrules.validate2fields.alertText;

                                                    }

                                         }
                              $(\".chzn-select\").chosen(); 
                              $(\".chzn-select-deselect\").chosen({allow_single_deselect:true}); 

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



                    </script>";
                    return $frm;
    }
    public function Buscar_pedido($AData)
    {

        

        $Patron=$AData->Patron;
        $ACFolio=$AData->Folio;
        $ACLicitacion=$AData->Licitacion;
        $ACRequisicion=$AData->Requisicion;
        #Preparamos ware
        if($ACFolio=="Si")
        {
            $where.="Id_Pedido like '%$Patron%' or "; 
        }
        
        if($ACLicitacion=="Si")
        {
            $where.="vNoLicitacion like '%$Patron%' or "; 
        }
        if($ACRequisicion)
        {
           $where.="vNoRequisicion like '%$Patron%' or "; 
        }  
        $where = substr($where, 0, -3);
        $objNomProveedor = new Factura();
        
        $objGridPedido = new poolConnection();
        $con=$objGridPedido->Conexion();
        $objGridPedido->BaseDatos();
        $sql="SELECT Id_Pedido, 
                     vNoRequisicion,
                     vNoLicitacion,
                     Id_Proveedor,
                     dFechaPedido
                     FROM sa_pedido Where $where";
        $RSet=$objGridPedido->Query($sql);
        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";
        while($fila=mysql_fetch_array($RSet))
        {
            $i++;
            $proveedor = $objNomProveedor->getProveedor($fila[Id_Proveedor]);
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"acpetar_pedido($fila[Id_Pedido],'$fila[vNoRequisicion]','$fila[Id_Proveedor]');\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoRequisicion]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNoLicitacion]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$proveedor</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaPedido]</td>    
                              </tr>";
        }
        mysql_free_result($RSet);
        $objGridPedido->Cerrar($con);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                          {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Requisicion', name : 'Requisicion', width :100, sortable :false, align: 'center'},
                                          {display: 'Licitacion', name : 'Licitacion', width :100, sortable :false, align: 'center'},
                                          {display: 'Proveedor', name : 'Proveedor', width :200, sortable :false, align: 'center'},
                                          {display: 'Fecha Pedido', name : 'Fecha Pedido', width :100, sortable :false, align: 'center'},
                                         


                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 640,
                          height: 250
                          }

                          );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
        return $FliexGrid;

    }
    public function getProveedor($id)
    {
        $objProveedor = new poolConnection();
        $objProveedor->Conexion();
        $objProveedor->BaseDatos();
        $sqlp="select vNombre from sa_proveedor where Id_Proveedor='$id'";
        $RSetPro=$objProveedor->Query($sqlp);
        while($fila = mysql_fetch_array($RSetPro))
        {
            $NProveedor = $fila[vNombre];
        }
        return $NProveedor;
    }
    public function getRequisiscionFactura($id)
    {
        $objRequisicion = new poolConnection();
        $objRequisicion->Conexion();
        $objRequisicion->BaseDatos();
        $sqlp="select vNoRequisicion from sa_pedido where Id_Pedido='$id'";
        $RSetRe=$objRequisicion->Query($sqlp);
        while($fila = mysql_fetch_array($RSetRe))
        {
            $NR = $fila[vNombre];
        }
        return $NR;
    }
    public function add_factura($AData)
    {
        
        $IdProveedor =$AData->IdProveedor;
        $dFechaAlta=$AData->dFechaAlta;
        $Id_Pedido=$AData->Id_Pedido;
        $mImporte=$AData->mImporte;
        $cEstado=$AData->cEstado;
        $Folio = $AData->Folio;
        $Clave = $AData->Clave;
        $Factura = $AData->Factura;
        
        //Folio creado
        $FolioCreado = $Folio.'-'.$Clave;
        $AFecha = split('/',$dFechaAlta);
        $dFechaAlta="$AFecha[2]/$AFecha[0]/$AFecha[1]";
        $ObjReq =new Factura();
        $vNoRemisionFactura=$Factura;

        $objAdd=new poolConnection();
        $con=$objAdd->Conexion();
        $objAdd->BaseDatos();
        $sql="INSERT INTO sa_contrarecibo values
                ('0' ,
                    '$FolioCreado',
                    '$dFechaAlta' ,
                    '$Id_Pedido',
                    '$IdProveedor',   
                    '$vNoRemisionFactura',
                    '$mImporte',
                    '$cEstado',
                    '0000-00-00',
                    '0000-00-00')";
        $objAdd->Query($sql);
        $objAdd->Cerrar($con);
        return $sql;
    }
   public function fmr_buscar_factura()
    {
        $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Modificar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Factura</div></td>
                            <td><input  type=\"text\" id=\"txtPatron\"  name=\"txtPatron\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageBuscarFactura1\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBuscarFactura1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBuscarFactura1','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar_factura_editar();\"/></td>
                        </tr>
                </table>
                <table>
                <tr>
                    <td><div class=\"txt_titulos_bold\">No. Folio:<input type=\"checkbox\" name=\"chkFolio\" id=\"chkFolio\" value=\"Folio\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Pedido:<input type=\"checkbox\" name=\"chkPedido\" id=\"chkPedido\" value=\"Pedido\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Remici&oacute;n:<input type=\"checkbox\" name=\"chkRemicion\" id=\"chkRemicion\" value=\"Remicion\"/></div></td>
                    
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
    public function buscar($AData)
    {
        $Patron=$AData->Patron;
        $ACFolio=$AData->Folio;
        $ACPedido=$AData->Pedido;
        $ACRemicion=$AData->Remicion;
        #Preparamos ware
        if($ACFolio=="Si")
        {
            $where.="Id_Folio like '%$Patron%' or "; 
        }
        
        if($ACPedido=="Si")
        {
            $where.="Id_Pedido like '%$Patron%' or "; 
        }
        if($ACRemicion)
        {
           $where.="vNoRemisionFactura like '%$Patron%' or "; 
        }  
        $where = substr($where, 0, -3);
        
        $objGridFacturas = new poolConnection();
        $con=$objGridFacturas->Conexion();
        $objGridFacturas->BaseDatos();
        $sql="SELECT Id_Folio, 
                     Id_Pedido,
                     dFechaAlta,
                     vNoRemisionFactura,
                     mImporte
                     FROM sa_contrarecibo Where $where";
        $RSet=$objGridFacturas->Query($sql);
        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";
        while($fila=mysql_fetch_array($RSet))
        {
            $i++;
            $importe = number_format($fila[mImporte],'2');
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/editar.jpg\"  name=\"ImageBFE$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBFE$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBFE$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"frm_editar('$fila[Id_Folio]');\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Folio]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaAlta]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ $importe</td>    
                              </tr>";
        }
        mysql_free_result($RSet);
        $objGridFacturas->Cerrar($con);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                          {display: 'Folio', name : 'Folio', width :100, sortable :false, align: 'center'},
                                          {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Alta', name : 'Fecha Alta', width :100, sortable :false, align: 'center'},
                                          {display: 'Importe', name : 'Importe', width :200, sortable :false, align: 'center'},
                                  
                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 640,
                          height: 220
                          }

                          );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
        return $FliexGrid;
    }
 public function frm_editar_factura($id)
 {
     
                    $objDatos = new poolConnection();
                    $con=$objDatos->Conexion();
                    $objDatos->BaseDatos();
                    $sqlF="select Id_Pedido,mImporte,cEstado,vNoRemisionFactura,Id_Proveedor from sa_contrarecibo Where Id_Folio='$id'";
                    $Rset=$objDatos->Query($sqlF);
                    while($fila = mysql_fetch_array($Rset))
                    {
                        $Id_Pedido=$fila[Id_Pedido];
                        $cEstado=$fila[cEstado]; 
                        $vNoRemisionFactura = $fila[vNoRemisionFactura];
                        $IdProveedor = $fila[Id_Proveedor];
                        $importe = number_format($fila[mImporte], 2, '.', '');
                    }
                    $objDatos->Cerrar($con);
                    
                           $objProveedor = new poolConnection();
                           $con=$objProveedor->Conexion();
                           $objProveedor->BaseDatos();
                           $sql="SELECT Id,vNombre FROM sa_proveedor order by vNombre";
                           $RSet=$objProveedor->Query($sql);
                           while($fila=  mysql_fetch_array($RSet))
                           {
                               if($IdProveedor==$fila[Id])
                               {
                                   $cboProveedor .= "<option value='$fila[Id]' selected>$fila[vNombre]</option>";
                               }
                               else
                                   {
                                     $cboProveedor .= "<option value='$fila[Id]'>$fila[vNombre]</option>";
                                   }
                               
                           }
                           mysql_free_result($RSet);
                           $objProveedor->Cerrar($con);
                   
                    $frm="<form name=\"frmFacturaEdit\" id=\"frmFacturaEdit\" action=\"\" method=\"post\">
                    <fieldset>
                        <legend><div class=\"txt_titulos_bold\">Editar del Alta Factura</div></legend>
                        <table>
                            <tr>
                                <td>
                                    <div class=\"txt_titulos_bold\">Folio:</div>
                                </td>
                                <td>
                                     <div class=\"txt_titulos_bold\">$id</div>
                                </td>
                                
                                <td>
                                    <div class=\"txt_titulos_bold\">Estatus:</div>
                                </td>
                                <td>
                                    <input type=\"text\" name=\"txtEstadoE\" id=\"txtEstadoE\"  value='$cEstado' class=\"boxes_form100px validate[required,minSize[1]]\"/>
                                </td>
                            </tr>
                            <tr>
                                <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
                                <td><input type=\"text\" name=\"txtPedido\" id=\"txtPedido\" class=\"boxes_form200px\" value='$Id_Pedido' onclick=\"on();\"/></td>
                                <td><div class=\"txt_titulos_bold\">Factura:</div></td>
                                <td><input type=\"text\" name=\"txtFactura\" id=\"txtFactura\" class=\"boxes_form100px validate[required,minSize[1]]\" value='$vNoRemisionFactura' /></td>
                                <td><div class=\"txt_titulos_bold\">Importe:</div></td>
                                <td><input type=\"text\" name=\"txtImporteE\" id=\"txtImporteE\" class=\"boxes_form100px validate[required,minSize[1]]\" value='$importe'/></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <div class=\"txt_titulos_bold\">Proveedor:</div>
                                </td>
                                <td>
                                    <select data-placeholder=\"Proveedor\" style=\"width:460px;\" tabindex=\"1\"  class='chzn-select' name='cboProveedorE' id='cboProveedorE'>
                                        <option value=\"\"></option>
                                         $cboProveedor
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <img src=\"../../interfaz_modulos/botones/guardar.jpg\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onmouseout=\"MM_swapImgRestore()\" name=\"Image8\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" style=\"cursor:pointer\" onclick=\"guardar_edicion();\" />    
                    </fieldset>
                    <input type='hidden' name='txtId' id='txtId' value='$id'/>
                    </form>    
                    <script>
                           
                                  jQuery(document).ready(function()
                                   {
                                       jQuery(\"#frmFacturaEdit\").validationEngine();
                                    });

                                function checkHELLO(field, rules, i, options)
                                        {
                                               if (field.val() != \"HELLO\") 
                                                   {
                                                        return options.allrules.validate2fields.alertText;

                                                    }

                                         }
                              $(\".chzn-select\").chosen(); 
                              $(\".chzn-select-deselect\").chosen({allow_single_deselect:true}); 

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
                    </script>";
                    return $frm;
 }
 public function guardar_cambios($AData)
 {
        $IdProveedor =$AData->IdProveedor;
        $Id_Pedido=$AData->Id_Pedido;
        $mImporte=$AData->mImporte;
        $cEstado=$AData->cEstado;
        $vNoRemisionFactura=$AData->vNoRemisionFactura;
        $Id=$AData->Id;
        $sql="Update sa_contrarecibo set
              Id_Pedido='$Id_Pedido',
              mImporte='$mImporte',
              cEstado='$cEstado', 
              vNoRemisionFactura='$vNoRemisionFactura', 
              Id_Proveedor='$IdProveedor'    
              where Id_Folio='$Id'; 
            ";
        $objUpdate = new poolConnection();
        $con=$objUpdate->Conexion();
        $objUpdate->BaseDatos();
        $objUpdate->Query($sql);
        $objUpdate->Cerrar($con);
        return $sql;
 }
 public function frm_buscar_borrar()
 {
   $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Borrar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Factura</div></td>
                            <td><input  type=\"text\" id=\"txtPatron\"  name=\"txtPatron\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageBuscarBorrar1\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBuscarBorrar1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBuscarBorrar1','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"buscar_eliminar();\"/></td>
                        </tr>
                </table>
                <table>
                <tr>
                    <td><div class=\"txt_titulos_bold\">No. Folio:<input type=\"checkbox\" name=\"chkFolio\" id=\"chkFolio\" value=\"Folio\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Pedido:<input type=\"checkbox\" name=\"chkPedido\" id=\"chkPedido\" value=\"Pedido\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Remici&oacute;n:<input type=\"checkbox\" name=\"chkRemicion\" id=\"chkRemicion\" value=\"Remicion\"/></div></td>
                    
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
public function buscar_borrar($AData)
    {
        $Patron=$AData->Patron;
        $ACFolio=$AData->Folio;
        $ACPedido=$AData->Pedido;
        $ACRemicion=$AData->Remicion;
        #Preparamos ware
        if($ACFolio=="Si")
        {
            $where.="Id_Folio like '%$Patron%' or "; 
        }
        
        if($ACPedido=="Si")
        {
            $where.="Id_Pedido like '%$Patron%' or "; 
        }
        if($ACRemicion)
        {
           $where.="vNoRemisionFactura like '%$Patron%' or "; 
        }  
        $where = substr($where, 0, -3);
        
        $objGridFacturas = new poolConnection();
        $con=$objGridFacturas->Conexion();
        $objGridFacturas->BaseDatos();
        $sql="SELECT Id_Folio, 
                     Id_Pedido,
                     dFechaAlta,
                     vNoRemisionFactura,
                     mImporte
                     FROM sa_contrarecibo Where $where order by Id_Folio";
        $RSet=$objGridFacturas->Query($sql);
        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";
        while($fila=mysql_fetch_array($RSet))
        {
            $i++;
            $importe = number_format($fila[mImporte],'2');
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/borrar.jpg\"  name=\"ImageBFB$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBFB$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBFB$i','','../../interfaz_modulos/botones/borrar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"eliminar($fila[Id_Folio]);\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Folio]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaAlta]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ $importe</td>    
                              </tr>";
        }
        mysql_free_result($RSet);
        $objGridFacturas->Cerrar($con);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                          {display: 'Folio', name : 'Folio', width :100, sortable :false, align: 'center'},
                                          {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Alta', name : 'Fecha Alta', width :100, sortable :false, align: 'center'},
                                          {display: 'Importe', name : 'Importe', width :200, sortable :false, align: 'center'},
                                  
                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 640,
                          height: 220
                          }

                          );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
        return $FliexGrid;
    }
public function borrar_factura($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos();
     $sql="Delete from sa_contrarecibo Where Id_Folio='$id'";
     $objBorrar->Query($sql);
     $objBorrar->Cerrar($con);
     return $sql;
     
 }
  public function frm_buscar_consultar()
 {
   $frm="<form id='frmBuscador' name='frmBuscador' method='post'><br><fieldset>
                <legend class=\"txt_titulos_bold\">Consultar</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >Factura</div></td>
                            <td><input  type=\"text\" id=\"txtPatron\"  name=\"txtPatron\" class=\"boxes_form1 validate[required]\" /></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\"  name=\"ImageBuscarConsultar1\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBuscarConsultar1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBuscarConsultar1','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"consultar();\"/></td>
                        </tr>
                </table>
                <table>
                <tr>
                    <td><div class=\"txt_titulos_bold\">No. Folio:<input type=\"checkbox\" name=\"chkFolio\" id=\"chkFolio\" value=\"Folio\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Pedido:<input type=\"checkbox\" name=\"chkPedido\" id=\"chkPedido\" value=\"Pedido\"/></div></td>
                    <td><div class=\"txt_titulos_bold\">Remici&oacute;n:<input type=\"checkbox\" name=\"chkRemicion\" id=\"chkRemicion\" value=\"Remicion\"/></div></td>
                    
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
 public function consultar($AData)
    {
        $Patron=$AData->Patron;
        $ACFolio=$AData->Folio;
        $ACPedido=$AData->Pedido;
        $ACRemicion=$AData->Remicion;
        #Preparamos ware
        if($ACFolio=="Si")
        {
            $where.="Id_Folio like '%$Patron%' or "; 
        }
        
        if($ACPedido=="Si")
        {
            $where.="Id_Pedido like '%$Patron%' or "; 
        }
        if($ACRemicion)
        {
           $where.="vNoRemisionFactura like '%$Patron%' or "; 
        }  
        $where = substr($where, 0, -3);
        
        $objGridFacturas = new poolConnection();
        $con=$objGridFacturas->Conexion();
        $objGridFacturas->BaseDatos();
        $sql="SELECT Id_Folio, 
                     Id_Pedido,
                     dFechaAlta,
                     vNoRemisionFactura,
                     mImporte
                     FROM sa_contrarecibo Where $where order by Id_Folio";
        $RSet=$objGridFacturas->Query($sql);
        $FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                         <tbody>";
        while($fila=mysql_fetch_array($RSet))
        {
            $i++;
            $importe = number_format($fila[mImporte],'2');
            $FliexGrid.="
                              <tr>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/imprimir.jpg\"  name=\"ImageBFC$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBFC$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBFC$i','','../../interfaz_modulos/botones/imprimir_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"open_Print('$fila[Id_Folio]')\">&nbsp;</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Folio]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaAlta]</td>
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ $importe</td>    
                              </tr>";
        }
        mysql_free_result($RSet);
        $objGridFacturas->Cerrar($con);
        $FliexGrid.="       </tbody>
                                                      </table><script>$('.flexme1').flexigrid({
                          title: '',
                          colModel : [

                                          {display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
                                          {display: 'Folio', name : 'Folio', width :100, sortable :false, align: 'center'},
                                          {display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
                                          {display: 'Fecha Alta', name : 'Fecha Alta', width :100, sortable :false, align: 'center'},
                                          {display: 'Importe', name : 'Importe', width :200, sortable :false, align: 'center'},
                                  
                                      ],
                          buttons : [
                                          {name: '',onpress:saver_Order},
                                          {separator: true}
                                      ],
                          width: 640,
                          height: 220
                          }

                          );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
        return $FliexGrid;
    }
}

?>
