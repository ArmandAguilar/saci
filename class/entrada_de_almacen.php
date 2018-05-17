<?php

class Entrada_de_Almacen extends poolConnection{
       
    public function ObtenerTiposMovimiento() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $StrConsulta = "SELECT * FROM sa_tipomovimiento tm ORDER BY tm.Id";
        $TTiposMovimiento = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TTiposMovimiento) > 0) {
            while ($TipoMovimiento = mysqli_fetch_array($TTiposMovimiento)) {
                $Respuesta[$Contador]->ID = $TipoMovimiento["Id_TipoMovimiento"];
                $Respuesta[$Contador]->Descripcion = $TipoMovimiento["Id_TipoMovimiento"].' - '.$TipoMovimiento["vDescripcion"];
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
    
    public function ObtenerDetallePedido($xIDPedido) {
        $StrConsulta = "
            SELECT
                DP.Id_CABMS AS 'idcabms', DP.Id_CveARTCABMS AS 'idclaveAC', DP.Id_CveInternaAC AS 'idclaveinternaAC', 
                CC.vdescripcion AS 'descripcion_cabms', um.vdescripcion AS 'descripcion_umedida',
                IFNULL(DP.eCantidadEntregada, 0) AS 'cantidadentregada',
                eCantidad AS 'cantidadpedido', CASE (DP.eCantidad - IFNULL(DP.eCantidadEntregada, 0))
                    WHEN 0 THEN 'P' -- Partida por cerrar
                    ELSE DP.cEstado
                    END AS 'estado',
                DP.Id_Partida AS 'idpartida', DP.vCaracteristicas AS 'caracteristicas',
                (
                  SELECT MD.vdocumento
                  FROM sa_movdirecto MD
                  WHERE
                    MD.id_unidad=P.id_unidadadmondes
                    AND MD.id_cveartcabms=DP.Id_CveARTCABMS
                    AND MD.id_cveinternaac=DP.Id_CveInternaAC
                ) AS 'remisionfactura'
            FROM
                sa_Pedido P, sa_DetallePedido DP
                 , sa_cabmsconsumible CC, sa_umedida UM
            WHERE
                P.Id_Pedido =".$xIDPedido."
                AND P.Id_Pedido = DP.Id_Pedido
                AND DP.Id_Partida IN (
                    SELECT DISTINCT
                        DP1.Id_Partida
                    FROM
                        sa_pedido P1, sa_detallepedido DP1
                    WHERE
                        P1.Id_Pedido = DP1.Id_Pedido
                        AND   P1.Id_Pedido = P.Id_Pedido
                        AND   DP1.cTipoAlmacen = 'C'
                )
                AND DP.eCantidad > DP.eCantidadEntregada
                AND DP.id_cabms=CC.id_cabms
                AND UM.id_umedida=CC.id_umedida
            ";
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $TDetallePedido = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TDetallePedido) > 0) {
            while ($Detalle = mysql_fetch_array($TDetallePedido)) {
                $Respuesta->Detalle[$Contador]->idcabms = $Detalle["idcabms"];
                $Respuesta->Detalle[$Contador]->idclaveAC = $Detalle["idclaveAC"];
                $Respuesta->Detalle[$Contador]->idclaveinternaAC = $Detalle["idclaveinternaAC"];
                $Respuesta->Detalle[$Contador]->descripcion_cabms = $Detalle["descripcion_cabms"];
                $Respuesta->Detalle[$Contador]->descripcion_umedida = $Detalle["descripcion_umedida"];
                $Respuesta->Detalle[$Contador]->cantidadpedido = $Detalle["cantidadpedido"];
                $Respuesta->Detalle[$Contador]->cantidadentregada = $Detalle["cantidadentregada"];
                $Respuesta->Detalle[$Contador]->idpartida = $Detalle["idpartida"];
                $Respuesta->Detalle[$Contador]->carateristicas = $Detalle["caracteristicas"];
                $Respuesta->Detalle[$Contador]->remisionfactura = $Detalle["remisionfactura"];
                $Contador++;
            }
            return json_encode($Respuesta);
        } else {
            return "{ Detalle: [] }";
        }
    }
  
    public function ModificarDetallePedido($xIDPedido, $xIDUnidadAdministrativa, $xIDCABMS, $xIDPartida, $xIDTipoMovimiento, $xCantidadEntrada, $xRemisionFactura) {
        $Modificado = 1;
        $StrConsulta = "
            SELECT
                mPrecioUnitario * (1 - (IFNULL(nDescuento, 0)/100)) AS 'precio',
                (mPrecioUnitario * (1 - (IFNULL(nDescuento, 0)/100))) * (1 + (IFNULL(nIVA, 0)/100)) AS 'iva',
                IFNULL((
                    SELECT
                        eCantidadExistenciaDisponible
                    FROM
                        sa_ExistenciasConsumible EC
                    WHERE
                        EC.id_cveartcabms=DP.id_cveartcabms
                        AND EC.id_cveinternaac=DP.id_cveinternaac
                ), 0) AS 'existenciainimovto',
                IFNULL((
                    SELECT
                        mCostoPromedioActual
                    FROM
                        sa_ExistenciasConsumible EC
                    WHERE
                        EC.id_cveartcabms=DP.id_cveartcabms
                        AND EC.id_cveinternaac=DP.id_cveinternaac
                ), 0) AS 'costopromedioactual',
                DP.id_cveartcabms AS 'idclaveAC',
                DP.id_cveinternaac AS 'idclaveinternaAC'
            FROM 
                sa_DetallePedido DP
            WHERE
                Id_Pedido = ".$xIDPedido."
                AND id_cabms='".$xIDCABMS."'
                AND Id_Partida = ".$xIDPartida;
        ///echo $StrConsulta."<p/>";
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);
        
        $TblPrecios = $objConexion->Query($con,$StrConsulta);
        
        $PrecioUnitario = 0;
        $PrecioIVA = 0;
        $Existencia = 0;
        if (mysqli_num_rows($TblPrecios) > 0) {
            $Precios = mysqli_fetch_array($TblPrecios);
            $PrecioUnitario = $Precios["precio"];
            $PrecioIVA = $Precios["iva"];
            $ExistenciaDisponible = $Precios["existenciainimovto"];
            $CostoPromedioActual = $Precios["costopromedioactual"];
            $IDClaveAC = $Precios["idclaveAC"];
            $IDClaveInternaAC = $Precios["idclaveinternaAC"];   
            $IDLocalizacion = 9980;
            
            $StrConsulta = "
                INSERT INTO sa_movconsumo(
                    Id_CveARTCABMS, Id_CveInternaAC, dFechaMovRegistro, Id_Unidad, 
                    Id_TipoMovimiento, eCantidad, mCostoUnitario, nFolio, 
                    vNumPedido, vDocumento, eExistenciaIniMovto, eCantidadApartadaSalida,
                    dFechaRegistro, mCostoPromedioIniMovto
                ) VALUES (
                    ".$IDClaveAC.", ".$IDClaveInternaAC.", now(), ".$xIDUnidadAdministrativa.",
                    ".$xIDTipoMovimiento.", ".$xCantidadEntrada.", ".$PrecioUnitario.", null,
                    ".$xIDPedido.", '".$xRemisionFactura."', ".$Existencia.", 0,
                    now(), ".$CostoPromedioActual."
                )
            ";
            ///echo $StrConsulta."<p/>";
            $objConexion->Query($con,"SET AUTOCOMMIT=0");
            $objConexion->Query($con,"START TRANSACTION");
            
            $Resultado = $objConexion->Query($con,$StrConsulta);
            if (!$Resultado) {
                //$objConexion->Query("ROLLBACK");
                $Modificado = 0;
            }
            
            if ($xIDTipoMovimiento == "102") {
                $CantidadExistenciaApartada = $xCantidadEntrada;
                $StrConsulta = "
                    SELECT COUNT(*) AS 'existe'
                    FROM sa_movdirecto
                    WHERE
                      id_unidad=(SELECT id_unidad FROM sa_unidadadmva WHERE id=".$xIDUnidadAdministrativa.")
                      AND id_cveartcabms=".$IDClaveAC."
                      AND id_cveinternaac=".$IDClaveInternaAC."
                ";
                ///echo $StrConsulta."<p/>";
                $Resultado = $objConexion->Query($con,$StrConsulta);
                $Existe = mysqli_fetch_array($Resultado);
                ///echo "Existe MovDirecto) ".$Existe["existe"]."<p/>";
                if ($Existe["existe"] == "0") {
                    $StrConsulta = "
                        INSERT sa_movdirecto(
                            id_unidad, id_cveartcabms, id_cveinternaac, ecantidadentrada, ecantidadsurtida, vdocumento
                        ) VALUES(
                            (SELECT id_unidad FROM sa_unidadadmva WHERE id=".$xIDUnidadAdministrativa."), 
                            ".$IDClaveAC.", ".$IDClaveInternaAC.", ".$xCantidadEntrada.", 0, 
                            '".$xRemisionFactura."'
                        )
                    ";
                } else {                    
                    $StrConsulta = "
                        UPDATE sa_movdirecto SET 
                            ecantidadentrada=IFNULL(ecantidadentrada, 0) + ".$xCantidadEntrada.",
                            vdocumento='".$xRemisionFactura."'
                        WHERE
                            id_unidad=(SELECT id_unidad FROM sa_unidadadmva WHERE id=".$xIDUnidadAdministrativa.")
                            AND id_cveartcabms=".$IDClaveAC."
                            AND id_cveinternaac=".$IDClaveInternaAC."
                    ";
                }
                ///echo $StrConsulta."<p/>";
                $Resultado = $objConexion->Query($con,$StrConsulta);
                if (!$Resultado) {
                    //$objConexion->Query("ROLLBACK");
                    $Modificado = 0;
                }
            }
            $MontoActual = $xCantidadEntrada * $PrecioUnitario;
            $CostoPromedioActual = $Existencia * $CostoPromedioActual;
            $CostoPromedioActual = ($CostoPromedioActual + $MontoActual)/($ExistenciaDisponible + $xCantidadEntrada);
            
            if ($xIDTipoMovimiento == "104") {
                $CantidadDisponible = 0;
                $CantidadApartdada = 0;
            } else {
                $CantidadDisponible = $xCantidadEntrada;
                $CantidadApartdada = $CantidadExistenciaApartada;
            }
            
            $StrConsulta = "
                SELECT COUNT(*) AS 'existe'
                FROM sa_existenciasconsumible
                WHERE
                  id_cveartcabms=".$IDClaveAC."
                  AND id_cveinternaac=".$IDClaveInternaAC."
            ";
            ///echo $StrConsulta."<p/>";
            $Reporte = "";
            $Resultado = $objConexion->Query($con,$StrConsulta);
            $Existe = mysqli_fetch_array($Resultado);
            ///echo "Existe EXISTENCIASCONSUMIBLE) ".$Existe["existe"]."<p/>";
            if ($Existe["existe"] == "0") {
                $StrConsulta = "
                    INSERT  sa_existenciasconsumible(
                        Id_CveARTCABMS, Id_CveInternaAC, eCantidadExistenciaDisponible,
			eCantidadExistenciaApartada, mCostoPromedioActual, eConsumoPromedio,
			dFechaRegistro, dFechaModRegistro
                    ) VALUES(	
                        ".$IDClaveAC.", ".$IDClaveInternaAC.", ".$CantidadDisponible.",
	 		".$CantidadApartdada.", ".$CostoPromedioActual.", 0,
			now(), now())
                ";
            } else {
                $StrConsulta = "
                    UPDATE sa_existenciasconsumible SET
                        eCantidadExistenciaDisponible=eCantidadExistenciaDisponible + ".$CantidadDisponible.",
			eCantidadExistenciaApartada=eCantidadExistenciaApartada + ".$CantidadApartdada.",
			mCostoPromedioActual=".$CostoPromedioActual.", dFechaModRegistro=now()
                    WHERE 
                        Id_CveARTCABMS=".$IDClaveAC."
                        AND Id_CveInternaAC=".$IDClaveInternaAC."
                ";
            }
            ///echo $StrConsulta."<p/>";
            $Resultado = $objConexion->Query($con,$StrConsulta);
            if (!$Resultado) {
                //$objConexion->Query("ROLLBACK");
                $Modificado = 0;
            }
            
            if ($xIDTipoMovimiento == "104") {
                $SalidaCerrado = '2502';
                $StrConsulta = "
                    INSERT sa_movconsumo (
                        Id_CveARTCABMS, Id_CveInternaAC, dFechaMovRegistro,
                        Id_Unidad, Id_TipoMovimiento, eCantidad,
                        mCostoUnitario, nFolio, vNumPedido, 
                        vDocumento, eExistenciaIniMovto, 
                        dFechaRegistro, mCostoPromedioIniMovto, eCantidadApartadaSalida
                    ) VALUES(	
                        ".$IDClaveAC.", ".$IDClaveInternaAC.", now(),
                        ".$xIDUnidadAdministrativa.", ".$SalidaCerrado.", ".$xCantidadEntrada.",
                        ".$CostoPromedioActual.", 0, ".$xIDPedido.", 
                        null, ".$Existencia." + ".$xCantidadEntrada.", 
                        now(), ".$CostoPromedioActual.", 0
                    )
                ";
                ///echo $StrConsulta."<p/>";
                $Resultado = $objConexion->Query($con,$StrConsulta);
                if (!$Resultado) {
                    //$objConexion->Query("ROLLBACK");
                    $Modificado = 0;
                }
            }
              
            $StrConsulta = "
                UPDATE sa_detallepedido SET
                    ecantidadentregada = IFNULL(eCantidadEntregada,0) + ".$xCantidadEntrada."
                WHERE 	
                    id_pedido = ".$xIDPedido."
                    AND id_cveartcabms = ".$IDClaveAC."
                    AND id_cveinternaac = ".$IDClaveInternaAC."
                    /* AND id_modificacion = @Id_Modificacion */
                    AND id_partida = ".$xIDPartida."
            ";
            ///echo $StrConsulta."<p/>";
            $Resultado = $objConexion->Query($con,$StrConsulta);
            if (!$Resultado) {
                //$objConexion->Query("ROLLBACK");
                ///echo $StrConsulta."<p/>";
                $Modificado = 0;
            }
            
            if (($xIDTipoMovimiento == "102") || ($xIDTipoMovimiento == "103")) {
                $StrConsulta = "
                    SELECT COUNT(*) AS 'existe'
                    FROM sa_locarticulos 
                    WHERE 
                        id_localizacion=".$IDLocalizacion."
                        AND id_cveartcabms=".$IDClaveAC." 
                        AND id_cveinternaAC=".$IDClaveInternaAC."
                ";
                ///echo $StrConsulta."<p/>";
                $Resultado = $objConexion->Query($con,$StrConsulta);
                $Existe = mysqli_fetch_array($Resultado);
                ///echo "Existe LOCARTICULOS) ".$Existe["existe"]."<p/>";
                if ($Existe["existe"] == "0") {
                    $StrConsulta = "
                        INSERT LocArticulos (	
                            Id_Localizacion, Id_CveARTCABMS, Id_CveInternaAC,
                            eCantidadLocalizacion, dFechaRegistro, dFechaModRegistro
                        ) VALUES (	
                            ".$IDLocalizacion.", ".$IDClaveAC.", ".$IDClaveInternaAC.",
                            ".$xCantidadEntrada.", now(), now()
                        )
                    ";
                } else {
                    $StrConsulta = "
                        UPDATE sa_locarticulos
                        SET
                            eCantidadLocalizacion=IFNULL(eCantidadLocalizacion,0) + ".$xCantidadEntrada.",
                            dFechaModRegistro=now()
                        WHERE 
                            id_localizacion=".$IDLocalizacion."
                            AND id_cveartcabms=".$IDClaveAC." 
                            AND id_cveinternaAC=".$IDClaveInternaAC."
                    ";
                }
            }
            ///echo $StrConsulta."<p/>";
            /*
            $Resultado = $objConexion->Query("COMMIT");
            if (!$Resultado) {
                $Modificado = 0;
            } else {
                $Modificado = 1;
            }*/
        }
        return "{ Modificado: ".$Modificado." }";
    }
}
?>