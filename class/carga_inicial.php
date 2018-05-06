<?php

class Carga_Inicial extends poolConnection{
    
    public function ObtenerUnidadesAdministrativas() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);
        $StrConsulta = "SELECT * FROM sa_unidadadmva ua ORDER BY ua.Id";
        $TUnidades = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysql_num_rows($TUnidades) > 0) {
            while ($Unidad = mysql_fetch_array($TUnidades)) {
                $Respuesta[$Contador]->ID = $Unidad["Id_Unidad"];
                $Respuesta[$Contador]->Descripcion = $Unidad["Id_Unidad"].' - '.$Unidad["vDescripcion"];
                $Contador++;
            }
        }
        return $Respuesta;
    }
    
    public function ObtenerCABMSAgregarCargaInicial($xIDUnidadAdministrativa) {        
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();

        /*$StrConsulta = "
            SELECT cc.id AS 'IDCABMS', cc.vdescripcion FROM sa_cabmsconsumible cc
            WHERE cc.id NOT IN (
            SELECT
              CC.id AS 'idcabms'
            FROM
              sa_cargainiarticulo CI, sa_unidadadmva UA, sa_cabmsconsumible CC, sa_umedida UM
            WHERE
              UA.Id_Unidad=CI.Id_Unidad
              AND CI.ID_CveARTCABMS=CC.ID_CveARTCABMS
              AND CI.Id_CveInternaAC=CC.Id_CveInternaAC
              AND CC.ID_UMedida=UM.Id_UMedida
              AND CI.cEstadoCarga='A'
              AND CI.Id_Unidad='".$xIDUnidadAdministrativa."'
            )
            ";*/
        $StrConsulta = "SELECT Id_CABMS,vDescripcionCABMS FROM sa_cabms  Where ePartidaPresupuestal>='1' and  ePartidaPresupuestal <='3000' ORDER BY  vDescripcionCABMS";
        $TCABMS = $objConexion->Query($StrConsulta);
        $Contador = 0;
        if (mysql_num_rows($TCABMS) > 0) {
            while ($CABMS = mysql_fetch_array($TCABMS)) {
                $Respuesta[$Contador]->IDCABMSConsumible = $CABMS["Id_CABMS"];
                $Respuesta[$Contador]->Descripcion = $CABMS["vDescripcionCABMS"];
                $Contador++;
            }
        }
        return json_encode($Respuesta);
    }
    
    public function ObtenerUnidadesMedidaHTML() {        
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();

        $StrConsulta = "SELECT * FROM sa_umedida um ORDER BY um.Id_UMedida";
        $TUnidades = $objConexion->Query($StrConsulta);
        $Respuesta = "<option value='0'></option>";
        if (mysql_num_rows($TUnidades) > 0) {
            while ($Unidad = mysql_fetch_array($TUnidades)) {
                $Respuesta = $Respuesta."<option value='".$Unidad["Id_UMedida"]."'>".$Unidad["Id_UMedida"]." - ".$Unidad["vDescripcion"]."</option>";
            }
        }
        return $Respuesta;
    }
    
    public function ObtenerDetalleCargaInicial($xIDUnidadAdministrativa) {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();

      
         $StrConsulta = "
         SELECT
        CI.Id_CveCABMS As idcabms, 
		 CC.vDescripcionCABMS As Cabms,
        CI.Id_Unidad AS idunidadmedida,
        UM.vDescripcion AS unidadmedida,
        CI.cTipoCarga As tipocarga, 
        CI.dFechaCaptura As fechacaptura, 
		 CI.eCantidadCargaIni As cantidadsolicitada, 
		 CI.eCantidadEntregada As cantidadentregada
        FROM
        sa_cargainiarticulo CI,
        sa_cabms CC ,
		 sa_umedida UM
        WHERE
        CI.Id_Unidad = '$xIDUnidadAdministrativa'  and
        CI.Id_CveCABMS = CC.Id_CABMS and
        CC.Id_UMedida = UM.Id_UMedida and
        CI.cEstadoCarga = 'A'";
        $TUnidades = $objConexion->Query($StrConsulta);
        $Contador = 0;
        if (mysql_num_rows($TUnidades) > 0) {
            while ($Unidad = mysql_fetch_array($TUnidades)) {
                
                /*$Respuesta->TipoCarga = $Unidad["tipocarga"];
                $Respuesta->FechaElaboracion = $Unidad["fechacaptura"];
               
                $Respuesta->CABMS[$Contador]->idcabms = $Unidad["idcabms"];
                $Respuesta->CABMS[$Contador]->cambs = $Unidad["Cabms"];
                $Respuesta->CABMS[$Contador]->idunidadmedida = $Unidad["idunidadmedida"];
                $Respuesta->CABMS[$Contador]->unidadmedida = $Unidad["unidadmedida"];
                $Respuesta->CABMS[$Contador]->cantidadsolicitada = $Unidad["cantidadsolicitada"];
                $Respuesta->CABMS[$Contador]->cantidadentregada = $Unidad["cantidadentregada"];*/
                $Contador++;
                $Celdas[] = array(
                		'idcabms' => $Unidad[idcabms],
                		'cambs' =>$Unidad[Cabms],
                		'idunidadmedida' =>$Unidad[idunidadmedida],
                		'unidadmedida' =>$Unidad[unidadmedida],
                		'cantidadsolicitada' =>$Unidad[cantidadsolicitada],
                		'cantidadentregada' =>$Unidad[cantidadentregada]
                );
                
            }
            
           //return json_encode($Respuesta);
        } else {
            //return "{ CABMS: [] }";
        }
           $data[] = array(
                               'TotalRows' => $Contador,
                                   'Rows' => $Celdas
                                );
                                echo json_encode($data);
    }
    
    public function ModificarEncabezado($xIDUnidadAdministrativa, $xTipoCarga, $xFechaCaptura){
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();

        $StrConsulta = "
            UPDATE sa_cargainiarticulo SET 
                ctipocarga='".$xTipoCarga."', cestadodocto='".$xTipoCarga."', dfechacaptura='".$xFechaCaptura."'
            WHERE id_unidad='".$xIDUnidadAdministrativa."'
        ";
        
        $Actualizado = $objConexion->Query($StrConsulta);
        $Respuesta = "0";
        if ($Actualizado) {
            $Respuesta = "1";
        }
        
        return "{ Modificado: ".$Respuesta." }";
    }
    
    public function EliminarArticuloCargaInicial($xIDUnidadAdministrativa, $xClaveAC, $xClaveInternaAC) {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();

        $StrConsulta = "
            UPDATE sa_cargainiarticulo 
                SET cEstadoCarga = 'C'  
            WHERE 
                Id_Unidad = '".$xIDUnidadAdministrativa."'
		AND Id_CveARTCABMS  = ".$xClaveAC."
		AND Id_CveInternaAC = ".$xClaveInternaAC;
        $Resultado = $objConexion->Query($StrConsulta);
        $Eliminado = mysql_affected_rows();
        return $Eliminado;
    }
    
    public function InsertarModificarArticuloCargaInicial($xIDUnidadAdministrativa, $xIDCABMS, $xClaveAC, $xClaveInternaAC, $xCantidadSolicitada, $xTipoCarga, $xFechaElaboracion) {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();
        // cia.cEstadoCarga = 'C'
        //Aqui hay que reahacer el modulo por completoooo
        if (($xClaveAC == "") && ($xClaveInternaAC == "")){
            $StrConsulta = "
            SELECT cia.*
            FROM sa_cargainiarticulo cia, sa_cabmsconsumible cc
            WHERE
                cia.Id_CveARTCABMS=cc.id_cveartcabms
                AND cia.Id_CveInternaAC=cc.id_cveinternaac
                AND cc.id=".$xIDCABMS."
                AND cia.Id_Unidad='".$xIDUnidadAdministrativa."'";
        } else {
            $StrConsulta = "
                SELECT cia.*
                FROM sa_cargainiarticulo cia
                WHERE
                    cia.Id_CveARTCABMS=".$xClaveAC."
                    AND cia.Id_CveInternaAC=".$xClaveInternaAC."
                    AND cia.Id_Unidad='".$xIDUnidadAdministrativa."'";
        }
        $Resultado = $objConexion->Query($StrConsulta);
        $Existe = mysql_num_rows($Resultado);
        if ($Existe) {
            $Articulo = mysql_fetch_array($Resultado);
            if ($xClaveAC == "")
                $xClaveAC = $Articulo["Id_CABMS"];
            if ($xClaveInternaAC == "")
                $xClaveInternaAC = $xIDCABMS;
            
            if ($Articulo["cEstadoCarga"] == "C") {
                $StrConsulta = "
                    UPDATE sa_cargainiarticulo
                       SET eCantidadCargaIni=".$xCantidadSolicitada.",
                           cEstadoCarga='A',
                           dFechaModRegistro=CURDATE()
                     WHERE Id_Unidad='".$xIDUnidadAdministrativa."'
                       AND cEstadoCarga='C'
                       AND Id_CveARTCABMS=".$xClaveAC."
                       AND Id_CveInternaAC=".$xClaveInternaAC;
            } else {
                $StrConsulta = "
                    UPDATE sa_cargainiarticulo
                       SET eCantidadCargaIni=".$xCantidadSolicitada.",
                           dFechaModRegistro=CURDATE()
                     WHERE Id_Unidad='".$xIDUnidadAdministrativa."'
                       AND Id_CveARTCABMS=".$xClaveAC."
                       AND Id_CveInternaAC=".$xClaveInternaAC;
            }
        } else {
            $StrConsulta = "
            SELECT *
            FROM sa_cabmsconsumible cc
            WHERE
                cc.id=".$xIDCABMS;
            $Resultado = $objConexion->Query($StrConsulta);
            $Existe = mysql_affected_rows();
            if ($Existe)
            {
                $Articulo = mysql_fetch_array($Resultado);
                if ($xClaveAC == "")
                    $xClaveAC = $Articulo["Id_CABMS"];
                
                if ($xClaveInternaAC == "")
                    $xClaveInternaAC = $Articulo["Id_CABMS"];
            
                $StrConsulta = "
                    INSERT sa_cargainiarticulo (
                        Id_Unidad,
                        nAnioCarga,
                        Id_CABMS,
                        cTipoCarga,
                        cEstadoCarga,
                        eCantidadCargaIni,
                        eCantidadEntregada,
                        cEstadoDocto,
                        dFechaCaptura,
                        dFechaUltimoMovimiento,
                        dFechaRegistro,
                        dFechaModRegistro)
                VALUES ('".$xIDUnidadAdministrativa."', 
                        DATE_FORMAT(CURDATE(), '%Y'), 
                        ".$xClaveAC.",
                        '".$xTipoCarga."',
                        'A',
                        ".$xCantidadSolicitada.",
                        0,
                        '".$xTipoCarga."',
                        '".$xFechaElaboracion."',
                        CURDATE(),
                        CURDATE(),
                        CURDATE()
                        )
                ";
            } else {
                $StrConsulta = "";
            }
        }
        $Resultado = $objConexion->Query($StrConsulta);
        $Registrado = mysql_affected_rows();
        return $Registrado;
    }
}
?>