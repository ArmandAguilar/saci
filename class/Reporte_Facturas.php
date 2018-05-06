<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reporte_Facturas
 *
 * @author armand
 */
class Reporte_Facturas extends poolConnection {
    
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
        $objNomProveedor = new Reporte_Facturas();
        
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
        $objNomProveedor = new Reporte_Facturas();
        
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
                                  <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageH$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageH$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageH$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"$('#txtPedidoFinal').val('$fila[Id_Pedido]'); $('#dialog2').dialog('close');\">&nbsp;</td>
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
     public function JSONC_Facturas($page, $limit, $sidx, $sord,$Where){  
         $sql="Select sa_pedido.Id_Pedido,
       sa_pedido.Id_Proveedor,
       sa_pedido.dFechaPedido,
       sa_contrarecibo.vNoRemisionFactura,
       sa_contrarecibo.dFechaRegistro,
       sa_contrarecibo.mImporte
       From sa_pedido,sa_contrarecibo $Where";
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos();
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "Select COUNT(*) AS count From sa_pedido,sa_contrarecibo $Where";
        $ResultadoTotal = $objMenu->Query($StrConsulta);
        $row = mysql_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $sql .= " LIMIT ".$start." , ".$limit;
        $RSet = $objMenu ->Query($sql);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($rows = mysql_fetch_array($RSet)){
            $Respuesta->rows[$Contador]["Id"] = $rows["Id_Pedido"];
            $Respuesta->rows[$Contador]["cell"] = array($rows["Id_Pedido"], $rows["Id_Proveedor"], $rows["dFechaPedido"], $rows["vNoRemisionFactura"], $rows["mImporte"]);
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    
    
    public function print_pdf($AData)
    {
        $PeriodoInicial =$AData->PeriodoInicial;
        $PeriodoFinal =$AData->PeriodoFinal;
        $FechaInicial =$AData->FechaInicial;
        $FechaFinal =$AData->FechaFinal;
        
        
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
        
        if(!empty($FechaInicial) && !empty($FechaFinal))
        {
        	$where .=" sa_contrarecibo.dFechaRegistro>='$FechaInicial' and sa_contrarecibo.dFechaRegistro<='$FechaFinal' and ";
        }
        else
        {
        if(!empty($FechaInicial))
        {
        $where .=" sa_contrarecibo.dFechaRegistro='$FechaInicial' and ";
        }
        else
        {
        if(!empty($FechaFinal))
        {
        $where .=" sa_contrarecibo.dFechaRegistro='$FechaFinal' and ";
        }
        
        }
        }
        
        if(!empty($PeriodoInicial) && !empty($PeriodoFinal))
        {
        $where .=" sa_contrarecibo.Id_Pedido>='$PeriodoInicial' and sa_contrarecibo.Id_Pedido<='$PeriodoFinal' and ";
        }
        else{
        if(!empty($PeriodoInicial))
        	{
        		$where .=" sa_contrarecibo.Id_Pedido='$PeriodoInicial' and ";
        }
        		else
        		{
        			if(!empty($PeriodoFinal))
        			{
        			$where .=" sa_contrarecibo.Id_Pedido='$PeriodoFinal' and ";
        }
        }
        }
        
        $whereFinal = substr($where, 0, -4);
        
        $objDatosPDF = new poolConnection();
        $con=$objDatosPDF -> Conexion();
        $objDatosPDF -> BaseDatos();
        
        $StrConsulta = "Select sa_pedido.Id_Pedido,
       sa_pedido.Id_Proveedor,
       sa_proveedor.vNombre As Proveedor,
       sa_pedido.dFechaPedido,
       sa_contrarecibo.vNoRemisionFactura,
       sa_contrarecibo.dFechaRegistro,
       Format(sa_contrarecibo.mImporte,2) As Importe
       From sa_pedido,sa_contrarecibo,sa_proveedor where $whereFinal and sa_pedido.Id_Pedido = sa_contrarecibo.Id_Pedido and sa_contrarecibo.Id_Proveedor=sa_proveedor.Id";
        $RSet = $objDatosPDF ->Query($StrConsulta);
        $Catalogo = array();
        while ($Row = mysql_fetch_array($RSet)){
            $Importe = "$ $Row[Importe]";
            $Catalogo[] = array($Row["Id_Pedido"], 
                                $Row["Proveedor"],
                                $Row["dFechaPedido"],
                                $Row["vNoRemisionFactura"],
                                $StrConsulta
                                );
        }
        
        mysql_free_result($RSet);
        $objDatosPDF->Cerrar($con);
        return $Catalogo;
    }
    
    
}

?>
