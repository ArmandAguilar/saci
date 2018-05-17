<?php

class Entrada_Inventariables extends poolConnection{
       
    public function ObtenerTiposMovimiento() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $StrConsulta = "SELECT * FROM sa_tipomovimiento tm ORDER BY tm.Id";
        $TTiposMovimiento = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TTiposMovimiento) > 0) {
            while ($TipoMovimiento = mysql_fetch_array($TTiposMovimiento)) {
                $Respuesta[$Contador]->ID = $TipoMovimiento["Id_TipoMovimiento"];
                $Respuesta[$Contador]->Descripcion = $TipoMovimiento["Id_TipoMovimiento"].' - '.$TipoMovimiento["vDescripcion"];
                $Contador++;
            }
        }
        return $Respuesta;
    }
       
    public function ObtenerEstdosBien() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $StrConsulta = "SELECT * FROM sa_estadobien eb ORDER BY eb.Id_EdoBien";
        $TTiposMovimiento = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TTiposMovimiento) > 0) {
            while ($TipoMovimiento = mysql_fetch_array($TTiposMovimiento)) {
                $Respuesta[$Contador]->ID = $TipoMovimiento["Id_EdoBien"];
                $Respuesta[$Contador]->Descripcion = $TipoMovimiento["Id_EdoBien"].' - '.$TipoMovimiento["vDescripcion"];
                $Contador++;
            }
        }
        return $Respuesta;
    }
    
    public function ObtenerCABMS() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $StrConsulta = "SELECT * FROM sa_cabms c ORDER BY c.id";
        $CABMS = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($CABMS) > 0) {
            while ($Articulo = mysqli_fetch_array($CABMS)) {
                $Respuesta[$Contador]->ID = $Articulo["Id_CABMS"];
                $Respuesta[$Contador]->Descripcion = $Articulo["Id_CABMS"].' - '.$Articulo["vDescripcionCABMS"];
                $Contador++;
            }
        }
        return $Respuesta;
    }
    
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
                        DP.cTipoAlmacen = 'C' AND
                        DP.cEstado = 'A'
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
                        DP.cTipoAlmacen = 'C' AND
                        DP.cEstado = 'A'
                    ORDER BY  
                        PE.Id_Pedido
                ";
                break;             
        }
        if ($StrConsulta != "") {
            $objConexion = new poolConnection();
            $con = $objConexion->Conexion();
            $objConexion->BaseDatos($con);
            
            $TPedidos = $objConexion->Query($con,$StrConsulta);
            $Contador = 0;            
            if (mysqli_num_rows($TPedidos) > 0) {
                while ($Pedido = mysqli_fetch_array($TPedidos)) {
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
    
    public function ConsultaEmpleados($xTextoBusqueda, $xCriterio){
        $StrConsulta = "";
        switch($xCriterio) {
            case "1":
                $StrConsulta = "
                    SELECT DISTINCT * FROM sa_empleado e
                    WHERE vRFC LIKE '%".$xTextoBusqueda."%'
                    ORDER BY  e.vRFC
                ";
                break;
            case "2":
                $StrConsulta = "
                    SELECT DISTINCT * FROM sa_empleado e
                    WHERE vNombre LIKE '%".$xTextoBusqueda."%'
                    ORDER BY  e.vRFC
                ";
                break;             
        }
        if ($StrConsulta != "") {
            $objConexion = new poolConnection();
            $con = $objConexion->Conexion();
            $objConexion->BaseDatos($con);
            
            $TEmpleados = $objConexion->Query($con,$StrConsulta);
            $Contador = 0;            
            if (mysqli_num_rows($TEmpleados) > 0) {
                while ($Empleado = mysqli_fetch_array($TEmpleados)) {
                    $Respuesta->Empleados[$Contador]->rfc = $Empleado["vRFC"];
                    $Respuesta->Empleados[$Contador]->nombre = $Empleado["vNombre"];
                    $Respuesta->Empleados[$Contador]->cargo = $Empleado["vCargo"];
                    $Contador++;
                }
                return json_encode($Respuesta);
            } else {
                return "{ Empleados: [] }";
            }
        } else {            
            return "{ Empleados: [] }";
        }
    }
    
    public function ObtenerDetallePedido($xIDPedido) {
        $StrConsulta = "
            SELECT  
                DP.Id_Partida AS 'idpartida', DP.Id_CABMS AS 'idcabms',
                C.vDescripcionCABMS AS 'descripcion_cabms', 
                UM.vDescripcion AS 'descripcion_umedida',
                DP.eCantidad AS 'cantidadpedido',
                DP.eCantidadEntregada AS 'cantidadentregada', 
                DP.mPrecioUnitario AS 'preciounitario', 
                DP.vCaracteristicas AS 'caracteristicas',  
                P.dFechaRegistro AS 'fecharegistro'
            FROM  
                sa_Pedido P, sa_DetallePedido DP, sa_UMedida UM, sa_CABMS C
            WHERE  
                P.Id_Pedido=".$xIDPedido."
                AND P.Id_Pedido=DP.Id_Pedido
                AND DP.cTipoAlmacen='C'
                AND UM.id_UMedida=DP.id_UMedida
                AND DP.ID_CABMS=C.ID_CABMS
                AND DP.eCantidad>DP.eCantidadEntregada
            ORDER BY 
                DP.Id_Partida
            ";
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $TDetallePedido = $objConexion->Query($StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TDetallePedido) > 0) {
            while ($Detalle = mysqli_fetch_array($TDetallePedido)) {
                $Respuesta->Detalle[$Contador]->idpartida = $Detalle["idpartida"];
                $Respuesta->Detalle[$Contador]->idcabms = $Detalle["idcabms"];
                //$Respuesta->Detalle[$Contador]->idclaveAC = $Detalle["idclaveAC"];
                //$Respuesta->Detalle[$Contador]->idclaveinternaAC = $Detalle["idclaveinternaAC"];
                $Respuesta->Detalle[$Contador]->descripcion_cabms = $Detalle["descripcion_cabms"];
                $Respuesta->Detalle[$Contador]->descripcion_umedida = $Detalle["descripcion_umedida"];
                $Respuesta->Detalle[$Contador]->cantidadpedido = $Detalle["cantidadpedido"];
                $Respuesta->Detalle[$Contador]->cantidadentregada = $Detalle["cantidadentregada"];
                $Respuesta->Detalle[$Contador]->preciounitario = $Detalle["preciounitario"];
                $Respuesta->Detalle[$Contador]->caracteristicas = $Detalle["caracteristicas"];
                $Respuesta->Detalle[$Contador]->fecharegistro = $Detalle["dfecharegistro"];
                //$Respuesta->Detalle[$Contador]->remisionfactura = $Detalle["remisionfactura"];
                $Contador++;
            }
            return json_encode($Respuesta);
        } else {
            return "{ Detalle: [] }";
        }
    }
}
?>
