<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reporte_DesglosePedido
 *
 * @author armand
 */
class Reporte_DesglosePedido extends poolConnection
{
   
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
    public function buscar_pedidoInicial($AData)
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
        $objNomProveedor = new Reporte_DesglosePedido();
        
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
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"$('#txtPedidoInicial').val('$fila[Id_Pedido]'); $('#dialog').dialog('close');\">&nbsp;</td>
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
     public function buscar_pedidoFinal($AData)
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
        $objNomProveedor = new Reporte_DesglosePedido();
        
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
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"$('#txtPedidoFinal').val('$fila[Id_Pedido]'); $('#dialog2').dialog('close');\">&nbsp;</td>
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
    
  function print_pdf($AData)
  {

              $cTipoAlmacen=$AData->cTipoAlmacen;
              $PedidoInicial=$AData->PedidoInicial;
              $PedidoFinal=$AData->PedidoFinal;
              $FechaInicial = $AData->FechaInicial;
              $FechaFinal = $AData->FechaFianl;
              
                $ArrayFechaInicial = split("/",$FechaInicial);
                $ArrayFechaFinal =split("/",$FechaFinal);
                $FechaInicial = "$ArrayFechaInicial[2]/$ArrayFechaInicial[0]/$ArrayFechaInicial[1]";
                $FechaFinal = "$ArrayFechaFinal[2]/$ArrayFechaFinal[0]/$ArrayFechaFinal[1]";
                if($FechaInicial=="//")
                {
                        $FechaInicial="";
                }
                if($FechaFinal=="//")
                {
                        $FechaFinal="";
                }
              

      $where .=" ";
                   if(!empty($cTipoAlmacen))
                    {
                       $where .=" sa_detallepedido.cTipoAlmacen='$cTipoAlmacen' and";   
                    } 
                    if(!empty($PedidoInicial) && !empty($PedidoFinal))
                    {
                        $where .=" sa_detallepedido.Id_Pedido>='$PedidoInicial' and sa_detallepedido.Id_Pedido<='$PedidoFinal' and "; 
                    }
                    else
                    {
                        if(!empty($PedidoInicial))
                        {
                           $where .=" sa_detallepedido.Id_Pedido='$PedidoInicial' and "; 
                        }
                        else
                            {
                               if(!empty($PedidoFinal))
                               {
                                 $where .=" sa_detallepedido.Id_Pedido='$PedidoFinal' and ";   
                               }
                            
                            }
                    }
                    
                    if(!empty($FechaInicial) && !empty($FechaFinal))
                    {
                        $where .=" sa_detallepedido.dFechaRegistro>='$FechaInicial' and sa_detallepedido.dFechaRegistro<='$FechaFinal' and "; 
                    } 
                   else{
                       if(!empty($FechaInicial))
                       {
                           $where .=" sa_detallepedido.dFechaRegistro='$FechaInicial' and ";
                       }
                       else
                       {
                           if(!empty($FechaFinal))
                           {
                              $where .=" sa_detallepedido.dFechaRegistro='$FechaFinal' and "; 
                           }
                       }
                   }
                   $whereFinal = substr($where, 0, -4);
      
        $objDatosPDF = new poolConnection();
        $con=$objDatosPDF -> Conexion();
        $objDatosPDF -> BaseDatos();
        
        $StrConsulta = "SELECT 
                                        sa_detallepedido.Id_Pedido As Pedido,
                                        sa_pedido.dFechaPedido As FechaRegistro,
                                        sa_pedido.vNoLicitacion As Licitacion,
                                        sa_proveedor.vNombre As Proveedor,
                                        sa_unidadadmva.vDescripcion As AreaSolicitante,
                                        sa_detallepedido.vCaracteristicas As Descripcion,
                                        sa_detallepedido.mPrecioUnitario As PrecioUnitario,
                                        (sa_detallepedido.nIva + sa_detallepedido.mPrecioUnitario) As PrecioConIva,
                                        sa_detallepedido.eCantidad As Cantidad,
                                        sa_umedida.VDescripcion As Unidad

                                        FROM 
                                        sa_pedido,
                                        sa_detallepedido,
                                        sa_unidadadmva,
                                        sa_proveedor,
                                        sa_umedida
                                        where
                                         $whereFinal  and
                                        sa_detallepedido.Id_Pedido = sa_pedido.Id_Pedido and 
                                        sa_unidadadmva.Id_Unidad =sa_pedido.Id_UnidadAdmonDes and
                                        sa_pedido.Id_Proveedor = sa_proveedor.Id_Proveedor  and
                                        sa_detallepedido.Id_UMedida=sa_umedida.Id_UMedida";
       $RSet = $objDatosPDF ->Query($StrConsulta);
        $Catalogo = array();
        while ($Row = mysql_fetch_array($RSet)){
            
          $Catalogo[] = array($Row["Pedido"], 
                                $Row["Licitacion"],
                                $Row["Proveedor"],
                                $Row["AreaSolicitante"],
                                $Row["Descripcion"],
                                $Row["PrecioUnitario"],
                                $Row["PrecioConIva"],
                                $Row["Cantidad"],
                                $Row["Unidad"]
                                );
        }
        
        mysql_free_result($RSet);
        $objDatosPDF->Cerrar($con);
        //$Catalogo[] = array( $whereFinal);
        return $Catalogo;
  
  }
    
}

?>
