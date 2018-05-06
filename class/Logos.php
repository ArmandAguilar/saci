<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logos
 *
 * @author armand
 */
class Logos extends poolConnection {
    
    public function header()
    {
        $obj = new poolConnection();
        $con=$obj->Conexion();
        $obj->BaseDatos($con);
        $sql="Select Header from sa_settings Where Id='1'";
        $Rset=$obj->Query($con,$sql);
        while($fila = mysqli_fetch_array($Rset))
        {
            $Img = $fila[Header];
        }
        $obj->Cerrar($con,$Rset);
        return $Img;
    }
    public function home()
    {
        $obj = new poolConnection();
        $con=$obj->Conexion();
        $obj->BaseDatos($con);
        $sql="Select Inicio from sa_settings Where Id='1'";
        $Rset=$obj->Query($con,$sql);
        while($fila = mysqli_fetch_array($Rset))
        {
            $Img = $fila[Inicio];
        }
        $obj->Cerrar($con,$Rset);
        return $Img;
    }
    public function SaveImagen($AData)
    {
        $Tipo = $AData->tipo;
        $Imagen =  $AData->img;
        $obj = new poolConnection();
        $con=$obj->Conexion();
        $obj->BaseDatos($con);
        $sql="update sa_settings set $Tipo = '$Imagen'  where Id='1'";
        $Rset=$obj->Query($con,$sql);
        $obj->Cerrar($con,$Rset);
        return $sql;
    }
}

?>
