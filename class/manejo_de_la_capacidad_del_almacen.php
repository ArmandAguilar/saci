<?php
class Reporte_Manejo_Almacen extends poolConnection {
    public function ObtenerReporte($xValor) {
        $StrConsulta = "
            SELECT
                EC.Id_CveARTCABMS AS \"ClaveArticulo\",
                EC.Id_CveInternaAC AS \"ClaveInternaArticulo\",
                CC.vDescripcion AS \"Descripcion_Articulo\",
                EC.eCantidadExistenciaDisponible AS \"Disponible\",
                UM.vDescripcion AS \"Descripcion_Medida\",
                IFNULL((select (PA.svalor * EC.eConsumoPromedio)
                    from   sa_existenciasconsumible EC, sa_parametro PA
                    where  EC.Id_CveARTCABMS  = CC.Id_CveARTCABMS
                    AND    EC.Id_CveInternaAC = CC.Id_CveInternaAC
                    AND 	  Id_Parametro	     = 7
                    group by EC.eConsumoPromedio, PA.svalor),0) AS \"Maximo\",
                IFNULL((select (PA.svalor * EC.eConsumoPromedio)
                    from   sa_existenciasconsumible EC, sa_parametro PA
                    where  EC.Id_CveARTCABMS  = CC.Id_CveARTCABMS
                    AND    EC.Id_CveInternaAC = CC.Id_CveInternaAC
                    AND 	  Id_Parametro	     = 6
                    group by EC.eConsumoPromedio, PA.svalor),0) AS \"Minimo\",
                case
                    when EC.eCantidadExistenciaDisponible >=
                        IFNULL((select (PA.svalor * EC.eConsumoPromedio)
                                from   sa_existenciasconsumible EC, sa_parametro PA
                                where  EC.Id_CveARTCABMS  = CC.Id_CveARTCABMS
                                AND    EC.Id_CveInternaAC = CC.Id_CveInternaAC
                                AND 	  Id_Parametro	     = 7
                                group by EC.eConsumoPromedio, PA.svalor),0) then \"Alto\"
                    when EC.eCantidadExistenciaDisponible <=
                        IFNULL((select (PA.svalor * EC.eConsumoPromedio)
                        from   sa_existenciasconsumible EC, sa_parametro PA
                        where  EC.Id_CveARTCABMS  = CC.Id_CveARTCABMS
                        AND    EC.Id_CveInternaAC = CC.Id_CveInternaAC
                        AND 	  Id_Parametro	     = 6
                        group by EC.eConsumoPromedio, PA.svalor),0)then \"Bajo\"
                else \"Normal\"
                end AS 'Valor'
                FROM 	
                    sa_existenciasconsumible EC,
                    sa_cabmsconsumible CC,
                    sa_umedida UM
                WHERE 	eCantidadExistenciaDisponible > 0
                    AND 	EC.Id_CveARTCABMS = CC.Id_CveARTCABMS
                    AND 	EC.Id_CveInternaAC = CC.Id_CveInternaAC
                    AND	CC.Id_UMedida = UM.Id_UMedida
                ORDER BY 
                    EC.Id_CveARTCABMS, EC.Id_CveInternaAC
        ";
        //echo $StrConsulta."<p/>";
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos($con);
        $TReporte = $objConexion->Query($con,$StrConsulta);
        $Contador = 0;
        if (mysqli_num_rows($TReporte) > 0) {
            $AgregarTodos = false;
            if ($xValor == "Todos") {
                    $AgregarTodos = true;
                }
            while ($Registro = mysqli_fetch_array($TReporte)) {
                if (($AgregarTodos) || ($Registro["Valor"] == $xValor)) {
                    $Respuesta[$Contador]->ClaveArticulo = $Registro["ClaveArticulo"];
                    $Respuesta[$Contador]->ClaveInternaArticulo = $Registro["ClaveInternaArticulo"];
                    $Respuesta[$Contador]->Descripcion_Articulo = $Registro["Descripcion_Articulo"];
                    $Respuesta[$Contador]->Disponible = $Registro["Disponible"];
                    $Respuesta[$Contador]->Descripcion_Medida = $Registro["Descripcion_Medida"];
                    $Respuesta[$Contador]->Maximo = $Registro["Maximo"];                
                    $Respuesta[$Contador]->Minimo = $Registro["Minimo"];
                    $Respuesta[$Contador]->Valor = $Registro["Valor"];
                    $Contador++;
                }
            }
        } else {
            $Respuesta = json_decode("[]");
        }
        return $Respuesta;
    }
}
?>
