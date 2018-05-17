<?php

class Carga_Inventario extends poolConnection{
    
    public function ObtenerCABMS() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $StrConsulta = "SELECT * FROM sa_cabms c ORDER BY c.vDescripcionCABMS";
        $TCABMS = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TCABMS) > 0) {
            while ($Articulo = mysqli_fetch_array($TCABMS)) {
                $Respuesta[$Contador]->ID = $Articulo["Id_CABMS"];
                $Respuesta[$Contador]->Descripcion = $Articulo["vDescripcionCABMS"];
                $Contador++;
            }
        }
        return $Respuesta;
    }
    
    public function ObtenerCABMSConsumibles() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $StrConsulta = "SELECT * FROM sa_cabmsconsumible cc ORDER BY cc.vDescripcion";
        $TCABMS = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TCABMS) > 0) {
            while ($Articulo = mysqli_fetch_array($TCABMS)) {
                $Respuesta[$Contador]->ID = $Articulo["Id"];
                $Respuesta[$Contador]->Descripcion = $Articulo["vDescripcion"];
                $Contador++;
            }
        }
        return $Respuesta;
    }
    
    public function ObtenerExistenciaConsumibles($xIDCABMS) {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);

        $StrConsulta = "
            SELECT
                ec.Id, ec.Id_CABMS, c.vDescripcionCABMS, ec.eCantidadExistenciaDisponible,
                ec.eCantidadExistenciaApartada, ec.mCostoPromedioActual, ec.dFechaRegistro,
                (ec.eCantidadExistenciaDisponible - ec.eCantidadExistenciaApartada) AS 'total',
                um.vDescripcion AS 'unidadmedida'
            FROM
                sa_existenciasconsumible ec, sa_cabms c, sa_umedida AS um
            WHERE
                c.Id_CABMS=ec.Id_CABMS
                AND c.Id_UMedida=um.Id_UMedida
                AND ec.Id_CABMS='".$xIDCABMS."' 
            ORDER BY 
                ec.dFechaRegistro
        ";
        $TCABMS = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TCABMS) > 0) {
            while ($Articulo = mysqli_fetch_array($TCABMS)) {
                $Respuesta[$Contador]->id = $Articulo["Id"];
                $Respuesta[$Contador]->idcabms = $Articulo["Id_CABMS"];
                $Respuesta[$Contador]->descripcion = $Articulo["vDescripcionCABMS"];
                $Respuesta[$Contador]->unidadmedida = $Articulo["unidadmedida"];
                $Respuesta[$Contador]->disponible = $Articulo["eCantidadExistenciaDisponible"];
                $Respuesta[$Contador]->apartado = $Articulo["eCantidadExistenciaApartada"];
                $Respuesta[$Contador]->total = $Articulo["total"];
                $Respuesta[$Contador]->costo_promedio = $Articulo["mCostoPromedioActual"];
                $Respuesta[$Contador]->fecha_registro = $Articulo["dFechaRegistro"];
                $Contador++;
            }
        }
        return $Respuesta;
    }
    
    public function InsertarExistenciaConsumible($xIDCABMS, $xDisponible, $xApartado, $xCosto){        
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);
        $FechaActual = date('Y-m-d',time());
        $StrConsulta = "
            INSERT INTO sa_existenciasconsumible(Id, Id_CABMS, eCantidadExistenciaDisponible, eCantidadExistenciaApartada, 
                mCostoPromedioActual, dFechaRegistro, dFechaModRegistro, eConsumoPromedio)
            VALUES(null, '$xIDCABMS', $xDisponible, $xApartado, $xCosto, '$FechaActual', '$FechaActual', 0)
        ";
        //echo $StrConsulta."<br/>";
        $Resultado = $objConexion->Query($con,$StrConsulta);
        $Registrado = mysqli_affected_rows();
        return $Registrado;
    }
    
    public function ModificarExistenciaConsumible($xID, $xDisponible, $xApartado, $xCosto){        
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);
        $FechaActual = date('Y-m-d',time());
        $StrConsulta = "
            UPDATE sa_existenciasconsumible SET 
                eCantidadExistenciaDisponible=$xDisponible, 
                eCantidadExistenciaApartada=$xApartado,
                mCostoPromedioActual=$xCosto, 
                dFechaModRegistro=$FechaActual
            WHERE
                Id=$xID
        ";
        //echo $StrConsulta."<br/>";
        $Resultado = $objConexion->Query($con,$StrConsulta);
        $Modificado = mysqli_affected_rows();
        return $Modificado;
    }
}
?>