<?php
class Reporte_Consumibles_E
{
    public function print_pdf($AData) {
        $ArrayInicio = split("/",$AData->FechaInicial);
        $ArrayFinal = split("/",$AData->FechaFinal);
        $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
        $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
        $where =" ";

        if(!empty($AData->FechaInicial) && !empty($AData->FechaFinal)) {
            $where .=" sa_movconsumo.dFechaRegistro >='$FechaInicio' and sa_movconsumo.dFechaRegistro <='$FechaFinal' and "; 
        } else {
            if(!empty($AData->FechaInicial)) {
                $where .=" sa_movconsumo.dFechaRegistro ='$FechaInicio' and ";
            } else {
                if(!empty($AData->FechaFinal)) {
                   $where .=" sa_movconsumo.dFechaRegistro ='$FechaFinal' and "; 
                }
            }
        }
        $whereFinal = substr($where, 0, -4);

        $objG = new poolConnection();
        $con= $objG -> Conexion();
        $objG->BaseDatos($con);

        $StrConsulta = "
            Select
                sa_movconsumo.Id_CveARTCABMS, 
                sa_movconsumo.Id_CveInternaAC,
                sa_movconsumo.dFechaMovRegistro, 
                sa_movconsumo.vNumPedido, 
                sa_movconsumo.vDocumento, 
                Format(sa_movconsumo.mCostoUnitario  * sa_movconsumo.eCantidad,2 ) As Total, 
                sa_movconsumo.eCantidad,
                sa_cabmsconsumible.Id_CABMS,
                sa_cabmsconsumible.vdescripcion,
                sa_tipomovimiento.vDescripcion,
                sa_pedido.Id_Proveedor, 
                sa_proveedor.vNombre
            From
                sa_movconsumo,
                sa_cabmsconsumible,
                sa_tipomovimiento,
                sa_pedido,
                sa_proveedor
            Where
                ".$whereFinal."
                sa_movconsumo.Id_CveARTCABMS  = sa_cabmsconsumible.Id_CveARTCABMS and
                sa_movconsumo.Id_CveInternaAC = sa_cabmsconsumible.Id_CveInternaAC and
                sa_movconsumo.vNumPedido      = sa_pedido.Id_Pedido and
                (sa_tipomovimiento.Id_TipoMovimiento like '01%' or sa_tipomovimiento.Id_TipoMovimiento='4000') and
                sa_tipomovimiento.bEntrada =  '1' and
                sa_tipomovimiento.bEstadoMov =  '1'
                and sa_proveedor.Id_Proveedor=sa_pedido.Id_PRoveedor";
        $TResultado = $objG ->Query($con,$StrConsulta);
        return $TResultado;
    }    
}
?>