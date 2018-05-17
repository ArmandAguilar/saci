<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsumoPromedio
 *
 * @author armand
 */
class ConsumoPromedio {
    
    public function CPromedio($AData)
    {
        //vars
        $F1=$AData->FechaInicial;
        $F2=$AData->FechaFinal;
        $Existe = "No";
        $NoDiasProcesar =0;
       /* 
        select MC.id_cveartcabms, MC.id_cveinternaAC
--	   from   movconsumo MC, ExistenciasConsumible EC
--	   where  MC.id_cveartcabms  = EC.id_cveartcabms
--	   and    MC.id_cveinternaAC = EC.id_cveinternaAC
--	   and    MC.dfecharegistro between @FechaInicial + " 00:00:00.000am"  AND @FechaFinal + " 23:59:59.997pm"
--	   and    id_tipomovimiento = "2502"* 
        */
        $Sql="Select  MC.Id_CveARTCABMS, MC.Id_CveInternaAC
             From sa_movconsumo MC,sa_existenciasconsumible EC
             Where
             MC.Id_CveARTCABMS  = EC.Id_CveARTCABMS and
             MC.Id_CveInternaAC = EC.Id_CveInternaAC and
             MC.dFechaRegistro>='$F1'  and MC.dFechaRegistro<='$F2' and
             MC.Id_TipoMovimiento='103'";
        //Ejecutamos Dias a Procesa y verificamos si se puede ejecutar el proceo
        $obj= new poolConnection();
        $con=$obj->Conexion();
        $obj->BaseDatos($con);
        $RSet = $obj->Query($con,$Sql);
        $i=0;
        while($row = mysqli_fetch_array($RSet))
        {
           $i++; 
           $NoDiasProcesar++; 
           $Existe="Si";

        }
        $obj->Cerrar($con,$RSet);

        /*
         * 
         * select id_cveartcabms, id_cveinternaAC, sum(eCantidad)
		from   movconsumo
		where dfecharegistro between @FechaInicial + " 00:00:00.000am"  AND @FechaFinal + " 23:59:59.997pm"
		and   id_tipomovimiento = "2502"
		group by id_cveartcabms, id_cveinternaAC
		order by id_cveartcabms, id_cveinternaAC
         * 
         */
        if($Existe=="Si")
        {
            $SqlMov ="select Id_CveARTCABMS,Id_CveInternaAC, sum(eCantidad) As TCantidad
		      from   sa_movconsumo
                      where
                         Id_TipoMovimiento='103'  and dFechaRegistro>='$F1'  and dFechaRegistro<='$F2'
                         group by Id_CveARTCABMS, Id_CveInternaAC
		         order by Id_CveARTCABMS, Id_CveInternaAC";
            $objArrays =  new poolConnection();
            $con=$objArrays->Conexion();
            $objArrays->BaseDatos($con);
            $RsetA=$objArrays->Query($con,$SqlMov);
            $i=0;
            while ($rows = mysqli_fetch_array($RsetA))
                {
                   $i++;
                   $ArrayCveARTCABMS[$i]=$rows[Id_CveARTCABMS];
                   $ArrayCveInternaAC[$i]=$rows[Id_CveInternaAC];
                   $ArrayTotal[$i]=$rows[TCantidad];
                }
            $objArrays->Cerrar($con),$RsetA;
            
            foreach($ArrayCveARTCABMS as $key => $value)
                {
                     if(!empty($value))
                     {
                         /*update existenciasconsumible set eConsumoPromedio = @Resultado
                         where  id_cveartcabms  = @id_cveartcabms
		         and    id_cveinternaAC = @id_cveinternaAC
                          * 
                          select  @Resultado = ( (convert(numeric(9,6),@Sum_Salidas) / convert(numeric(9,6),@NumDIas))* 30 )
                          */
                         $Resultado = $ArrayTotal[$key]/($NoDiasProcesar*30);
                         $Resultado =  number_format($Resultado, '2');
                         $sqlUpdate="update sa_existenciasconsumible set eConsumoPromedio='$Resultado';
                                where Id_CveARTCABMS='$ArrayCveARTCABMS[$key]' and  Id_CveInternaAC='$ArrayCveInternaAC[$key]'";
                         $objUpdate = new poolConnection();
                         $con=$objUpdate->Conexion();
                         $objUpdate->BaseDatos($con);
                         $R=$objUpdate->Query($con,$sqlUpdate);
                         $objUpdate->Cerrar($con,$R);
                     }
                }
            
        }  
      return 1;  
    }
}

?>
