<?php
class Reporte_Consumibles_S
{
    public function print_pdf($AData) {
        $ArrayInicio = split("/",$AData->FechaInicial);
        $ArrayFinal = split("/",$AData->FechaFinal);
        $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
        $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
        $where .=" ";

        if(!empty($AData->FechaInicial) && !empty($AData->FechaFinal)) {
            $where .=" and sa_movconsumo.dFechaRegistro >='$FechaInicio' and sa_movconsumo.dFechaRegistro <='$FechaFinal'"; 
        } else {
           if(!empty($AData->FechaInicial)) {
               $where .=" and sa_movconsumo.dFechaRegistro ='$FechaInicio'";
           } else {
               if(!empty($AData->FechaFinal)) {
                  $where .=" and sa_movconsumo.dFechaRegistro ='$FechaFinal'"; 
               }
           }
        }
        //$whereFinal = substr($where, 0, -4);
        $whereFinal = $where;
        $objG = new poolConnection();
        $con= $objG -> Conexion();
        $objG->BaseDatos();
        
        $StrConsulta = "
            Select
                sa_movconsumo.dFechaRegistro,
                sa_movconsumo.nFolio, 
                sa_movconsumo.vDocumento, 
                sa_unidadadmva .vDescripcion,
                sa_cabmsconsumible.ePartidaPresupuestal, 
                sa_movconsumo.Id_CveARTCABMS, 
                sa_movconsumo.Id_CveInternaAC,
                sa_movconsumo.eCantidad, 
                sa_movconsumo.mCostoUnitario,
                Format(sa_movconsumo.eCantidad * sa_movconsumo.mCostoUnitario,2) as nImporte,
                sa_cabmsconsumible.Id_CABMS, 
                sa_movconsumo.vNumPedido,
                sa_cabmsconsumible.vDescripcion  
            From
                sa_movconsumo,
                sa_cabmsconsumible, 
                sa_tipomovimiento,
                sa_unidadadmva 
            Where
                sa_movconsumo.Id_TipoMovimiento = sa_tipomovimiento.Id_TipoMovimiento
                AND sa_movconsumo.Id_CveARTCABMS = sa_cabmsconsumible.Id_CveARTCABMS
                AND sa_movconsumo.Id_CveInternaAC = sa_cabmsconsumible.Id_CveInternaAC
                AND sa_movconsumo.Id_Unidad = sa_unidadadmva.Id_Unidad
                AND sa_tipomovimiento.bEstadoMov = 1
                and sa_tipomovimiento.Id_TipoMovimiento = '2502'
                ".$whereFinal." 
            LIMIT 10;"
        ;
        
        //$StrConsulta = "SELECT * FROM sa_movconsumo LIMIT 100";
        //echo $StrConsulta."<br/>";
        $TResultado = $objG->Query($StrConsulta);
        return $TResultado;
    }    
}
?>