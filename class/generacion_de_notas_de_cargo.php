<?php
class Reporte_Generacion_Notas_Cargo extends poolConnection {
    public function ConsultaPedidos($xTextoBusqueda, $xCriterio){
        $StrConsulta = "";
        switch($xCriterio) {
            case "1":
                $StrConsulta = "
                    SELECT DISTINCT
                        PE.id_pedido,
                        PR.vnombre,
                        PE.dfecharegistro,
                        (
                            SELECT UA.id 
                            FROM sa_unidadadmva UA 
                            WHERE PE.Id_UnidadAdmonDes=UA.Id_Unidad
                         ) AS 'idua',
                        PE.Id_UnidadAdmonDes AS 'idunidadadministrativa',
                        (
                            SELECT UA.vDescripcion 
                            FROM sa_unidadadmva UA 
                            WHERE PE.Id_UnidadAdmonDes=UA.Id_Unidad
                         ) AS 'unidadadministrativa'
                    FROM
                        sa_pedido PE, sa_proveedor PR, sa_detallepedido DP
                    WHERE
                        PE.Id_Pedido LIKE  '%".$xTextoBusqueda."%' AND
                        PE.Id_Proveedor = PR.ID_Proveedor AND
                        PE.Id_Pedido = DP.Id_Pedido AND
                        DP.eCantidad > DP.eCantidadEntregada AND
                        DP.cTipoAlmacen = 'C'
                    ORDER BY  
                        PE.Id_Pedido
                ";
                break;
            case "2":
                $StrConsulta = "
                    SELECT DISTINCT
                        PE.id_pedido,
                        PR.vnombre,
                        PE.dfecharegistro,
                        (
                            SELECT UA.id 
                            FROM sa_unidadadmva UA 
                            WHERE PE.Id_UnidadAdmonDes = UA.Id_Unidad
                         ) AS 'idua',
                        PE.Id_UnidadAdmonDes AS 'idunidadadministrativa',
                        (
                            SELECT UA.vDescripcion 
                            FROM sa_unidadadmva UA 
                            WHERE PE.Id_UnidadAdmonDes = UA.Id_Unidad
                         ) AS 'unidadadministrativa'
                    FROM
                        sa_pedido PE, sa_proveedor PR, sa_detallepedido DP
                    WHERE
                        PR.vNombre LIKE  '%".$xTextoBusqueda."%' AND
                        PE.Id_Proveedor = PR.ID_Proveedor AND
                        PE.Id_Pedido = DP.Id_Pedido AND
                        DP.eCantidad > DP.eCantidadEntregada AND
                        DP.cTipoAlmacen = 'C'
                    ORDER BY  
                        PE.Id_Pedido
                ";
                break;             
        }
        if ($StrConsulta != "") {
            $objConexion = new poolConnection();
            $con = $objConexion->Conexion();
            $objConexion->BaseDatos();
            
            $TPedidos = $objConexion->Query($StrConsulta);
            $Contador = 0;            
            if (mysql_num_rows($TPedidos) > 0) {
                while ($Pedido = mysql_fetch_array($TPedidos)) {
                    //$Respuesta->rows[$Contador]["cell"] = Array($Pedido["id_pedido"], utf8_encode($Pedido["vnombre"]), $Pedido["dfecharegistro"]);
                    $Respuesta->Pedidos[$Contador]->idpedido = $Pedido["id_pedido"];
                    $Respuesta->Pedidos[$Contador]->proveedor = $Pedido["vnombre"];
                    $Respuesta->Pedidos[$Contador]->fecharegistro = $Pedido["dfecharegistro"];
                    $Respuesta->Pedidos[$Contador]->idua = $Pedido["idua"];
                    $Respuesta->Pedidos[$Contador]->idunidadadministrativa = $Pedido["idunidadadministrativa"];
                    $Respuesta->Pedidos[$Contador]->unidadadministrativa = $Pedido["idunidadadministrativa"]." - ".$Pedido["unidadadministrativa"];
                    $Contador++;
                }
                return json_encode($Respuesta);
            } else {
                return "{ Pedidos: [] }";
            }
        } else {            
            return "{ Pedidos: [] }";
        }
    }
    
    public function ObtenerReporte($xFolioPeriodo, $xDesde, $xHasta, $xEstatus) {
        $StrCondicionFolioPedido = "";
        switch($xFolioPeriodo) {
            case "P":
                $StrCondicionFolioPedido = "
                    P.dFechaPedido>='".$xDesde."'
                    AND P.dFechaPedido<='".$xHasta."'
                ";
                break;
            case "F":
                $StrCondicionFolioPedido = "
                    P.Id_Pedido>='".$xDesde."'
                    AND P.Id_Pedido<='".$xHasta."'
                ";
                break;
        }
        $StrCondicionEstatus = "";
        if ($xEstatus != 'T') {
            $StrCondicionEstatus = "AND P.cEstado='".$xEstatus."'";
        }
        $StrConsulta = "
            SELECT
                P.dFechaPedido,
                DP.Id_CABMS,
                DP.eCantidad,
                C.vDescripcionCabms,
                UM.vDescripcion,
                DP.mPrecioUnitario,
                Format(DP.eCantidad * DP.mPrecioUnitario,2) As 'Total'
              FROM
                sa_pedido P,
                sa_detallepedido DP,
                sa_cabms C,
                sa_umedida UM
              WHERE
                ".$StrCondicionFolioPedido."
                AND P.Id_Pedido=DP.Id_Pedido
                AND DP.Id_CABMS=C.Id_CABMS
                AND DP.Id_UMedida=UM.Id_UMedida
                ".$StrCondicionEstatus."
              ORDER BY
                P.dFechaPedido;
        ";
        //echo $StrConsulta."<p/>";
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();
        $TReporte = $objConexion->Query($StrConsulta);        
        $Contador = 0;
        if (mysql_num_rows($TReporte) > 0) {
            while ($Registro = mysql_fetch_array($TReporte)) {
                $Respuesta[$Contador]->FechaPedido = $Registro["dFechaPedido"];
                $Respuesta[$Contador]->IDCABMS = $Registro["Id_CABMS"];
                $Respuesta[$Contador]->Cantidad = $Registro["eCantidad"];
                $Respuesta[$Contador]->DescripcionArticulo = $Registro["vDescripcionCabms"];
                $Respuesta[$Contador]->DescripcionUnidadMedida = $Registro["vDescripcion"];
                $Respuesta[$Contador]->Precio = $Registro["mPrecioUnitario"];                
                $Respuesta[$Contador]->Total = $Registro["Total"];
                $Contador++;
            }
        } else {
            $Respuesta = json_decode("[]");
        }
        return $Respuesta;
    }
}
?>