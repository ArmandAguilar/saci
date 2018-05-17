<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author armand
 */
class Reporte_Catalogos extends poolConnection{
    public function ObtenerJSONCatalogoEmpleados($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_empleado";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_empleado ORDER BY Id_NumEmpleado LIMIT ".$start." , ".$limit;
        $TEmpleados = $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($Empleado = mysqli_fetch_array($TEmpleados)){
            $Respuesta->rows[$Contador]["id"] = $Empleado["Id_NumEmpleado"];
            $Respuesta->rows[$Contador]["cell"] = array($Empleado["Id_NumEmpleado"], $Empleado["vNombre"], $Empleado["vRFC"], $Empleado["eZonaPago"], $Empleado["eZonaPagoAnterior"], $Empleado["vCargo"], $Empleado["bEstadoEmpleado"]);
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    
    public function ObtenerArregloCatalogoEmpleados(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_empleado ORDER BY Id_NumEmpleado";
        $TEmpleados = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($Empleado = mysqli_fetch_array($TEmpleados)){
            $Catalogo[] = array($Empleado["Id_NumEmpleado"], $Empleado["vNombre"], $Empleado["vRFC"], $Empleado["eZonaPago"], $Empleado["eZonaPagoAnterior"], $Empleado["vCargo"], $Empleado["bEstadoEmpleado"]);
        }
        return $Catalogo;
    }
  
    public function ObtenerJSONCatalogoCABMS($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_cabms";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_cabms ORDER BY Id_CABMS LIMIT ".$start." , ".$limit;
        $TCABMS = $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($CABMS = mysqli_fetch_array($TCABMS)){
            $Respuesta->rows[$Contador]["id"] = $CABMS["Id"];
            $Respuesta->rows[$Contador]["cell"] = array($CABMS["Id"], $CABMS["Id_CABMS"], $CABMS["Id_UMedida"], $CABMS["vDescripcionCABMS"], $CABMS["cTipoAlmacen"], $CABMS["nConsecutivoInv"], $CABMS["ePartidaPresupuestal"]);
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    
    public function ObtenerArregloCatalogoCABMS(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_cabms ORDER BY Id";
        $TCABMS = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($CABMS = mysqli_fetch_array($TCABMS)){
            $Catalogo[] = array($CABMS["Id"], $CABMS["Id_CABMS"], $CABMS["Id_UMedida"], $CABMS["vDescripcionCABMS"], $CABMS["cTipoAlmacen"], $CABMS["nConsecutivoInv"], $CABMS["ePartidaPresupuestal"]);
        }
        return $Catalogo;
    }
    
    public function ObtenerJSONCatalogoGiros($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_giro";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_giro ORDER BY Id_Giro LIMIT ".$start." , ".$limit;
        $TGiros = $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($Giro = mysqli_fetch_array($TGiros)){
            $Respuesta->rows[$Contador]["id"] = $Giro["Id_Giro"];
            $Respuesta->rows[$Contador]["cell"] = array($Giro["Id_Giro"], $Giro["vDescripcionGR"]);
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    
    public function ObtenerArregloCatalogoGiros(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos();
        
        $StrConsulta = "SELECT * FROM sa_giro ORDER BY Id_Giro";
        $TGiros = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($Giro = mysqli_fetch_array($TGiros)){
            $Catalogo[] = array($Giro["Id_Giro"], $Giro["vDescripcionGR"]);
        }
        return $Catalogo;
    }
    
    public function ObtenerJSONCatalogoUnidadesMedida($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos();
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_umedida";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_umedida ORDER BY Id_UMedida LIMIT ".$start." , ".$limit;
        $TUnidadesMedida= $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($UnidadMedida = mysqli_fetch_array($TUnidadesMedida)){
            $Respuesta->rows[$Contador]["id"] = $UnidadMedida["Id_UMedida"];
            $Respuesta->rows[$Contador]["cell"] = array($UnidadMedida["Id_UMedida"], $UnidadMedida["vDescripcion"]);
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    
    public function ObtenerArregloCatalogoUnidadesMedida(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos();
        
        $StrConsulta = "SELECT * FROM sa_umedida ORDER BY Id_UMedida";
        $TUnidadesMedida = $objMenu ->Query($StrConsulta);
        $Catalogo = array();
        while ($UnidadMedida = mysql_fetch_array($TUnidadesMedida)){
            $Catalogo[] = array($UnidadMedida["Id_UMedida"], $UnidadMedida["vDescripcion"]);
        }
        return $Catalogo;
    }
    
    public function ObtenerJSONCatalogoProveedores($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_proveedor";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_proveedor ORDER BY Id_Proveedor LIMIT ".$start." , ".$limit;
        $TProveedor= $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($Proveedor = mysqli_fetch_array($TProveedor)){
            $Respuesta->rows[$Contador]["id"] = $Proveedor["Id_UMedida"];
            $Respuesta->rows[$Contador]["cell"] = array($Proveedor["Id_Proveedor"], $Proveedor["Id_Giro"], $Proveedor["vNombre"], $Proveedor["vResponsable"], $Proveedor["vCalle"], $Proveedor["vNumero"], $Proveedor["Colonia"], $Proveedor["vPoblacion"], $Proveedor["vCP"], $Proveedor["cRFC"], $Proveedor["cPadronFedProv"], $Proveedor["cCedulaEmpadr"], $Proveedor["cCamaraComercio"], $Proveedor["cCanacintra"], $Proveedor["cCamaraRamo"], $Proveedor["vTelefono1"], $Proveedor["vTelefono2"], $Proveedor["bNacional"], $Proveedor["vTelFax"]);
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    
    public function ObtenerArregloCatalogoProveedores(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_proveedor ORDER BY Id_Proveedor";
        $TProveedor = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($Proveedor = mysqli_fetch_array($TProveedor)){
            $Catalogo[] = array($Proveedor["Id_Proveedor"], $Proveedor["Id_Giro"], $Proveedor["vNombre"], $Proveedor["vResponsable"], $Proveedor["vCalle"], $Proveedor["vNumero"], $Proveedor["Colonia"], $Proveedor["vPoblacion"], $Proveedor["vCP"], $Proveedor["cRFC"], $Proveedor["cPadronFedProv"], $Proveedor["cCedulaEmpadr"], $Proveedor["cCamaraComercio"], $Proveedor["cCanacintra"], $Proveedor["cCamaraRamo"], $Proveedor["vTelefono1"], $Proveedor["vTelefono2"], $Proveedor["bNacional"], $Proveedor["vTelFax"]);
        }
        return $Catalogo;
    }
    /*AAL */
    
    public function ObtenerArregloCatalogoUnidadAdministrativa(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_unidadadmva ORDER BY Id";
        $Rset = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($row = mysqli_fetch_array($Rset)){
            $Catalogo[] = array(
                                $row["Id"],	
                                $row["Id_Unidad"],
                                $row["Id_ResponsableArea"],
                                $row["Id_Zonas"],
                                $row["vDescripcion"], 
                                $row["vCalle"],
                                $row["VNumero"], 	
                                $row["vColonia"],	
                                $row["vPoblacion"], 	
                                $row["vCP"] ,	
                                $row["vTelefono"],
                                $row["vTelFax"],	
                                $row["eNumFolio"],
                                $row["uEjec"],	
                                $row["eNumEmpleados"]
            );
        }
        return $Catalogo;
    }
    
    public function ObtenerArregloCatalogoTipoMovimiento(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_tipomovimiento ORDER BY Id";
        $Rset = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($row = mysqli_fetch_array($Rset)){
            $Catalogo[] = array(
                                $row["Id"],
                                $row["Id_TipoMovimiento"],
                                $row["vDescripcion"],
                                $row["bEntrada"],
                                $row["bBaja"],
                                $row["cTipoAlmacen"],
                                $row["bSalida"],
                                $row["bEstadoMov"]
                                            );
        }
        return $Catalogo;
    }
   public function ObtenerArregloCatalogoParametro(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_parametro ORDER BY Id_Parametro";
        $Rset = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($row = mysqli_fetch_array($Rset)){
            $Catalogo[] = array(
                                $row["Id_Parametro"],
                                $row["sDescripcion"],
                                $row["sValor"]
                                            );
        }
        return $Catalogo;
    } 
    public function ObtenerArregloCatalogoEdoBien(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_estadobien ORDER BY Id_EdoBien";
        $Rset = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($row = mysqli_fetch_array($Rset)){
            $Catalogo[] = array(
                                $row["Id_EdoBien"],			
                                $row["vDescripcion"]
                                            );
        }
        return $Catalogo;
    }  
    public function ObtenerArregloCatalogoTipoBien(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_tipobieninventariable ORDER BY Id";
        $Rset = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($row = mysqli_fetch_array($Rset)){
            $Catalogo[] = array(
                                $row["Id_TipoBien"],
                                $row["vDescripcion"]
                                            );
        }
        return $Catalogo;
    } 
   public function ObtenerArregloCatalogoFactorPronostico(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM  sa_factorpronostico ORDER BY Id";
        $Rset = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($row = mysqli_fetch_array($Rset)){
            $Catalogo[] = array(
                                $row["Id"],
                                $row["eAnio"],
                                $row["eMes"], 	
                                $row["eFactor"]
                                            );
        }
        return $Catalogo;
    } 
    public function ObtenerJSONCatalogoUnidadAdmin($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_unidadadmva";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_unidadadmva ORDER BY Id LIMIT ".$start." , ".$limit;
        $TProveedor= $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($rowF = mysqli_fetch_array($TProveedor)){
            $Respuesta->rows[$Contador]["id"] = $row["Id"];
            $Respuesta->rows[$Contador]["cell"] = array($rowF["Id"],	
                                                        $rowF["Id_Unidad"],	
                                                        $rowF["Id_ResponsableArea"],
                                                        $rowF["Id_Zonas"],
                                                        $rowF["vDescripcion"], 
                                                        $rowF["vCalle"],
                                                        $rowF["VNumero"], 	
                                                        $rowF["vColonia"],	
                                                        $rowF["vPoblacion"], 	
                                                        $rowF["vCP"] ,	
                                                        $rowF["vTelefono"],
                                                        $rowF["vTelFax"],
                                                        $rowF["ePrioridad"],
                                                        $rowF["bAreaActiva"],	
                                                        $rowF["eNumFolio"],
                                                        $rowF["uEjec"],	
                                                        $rowF["eNumEmpleados"]
                                                    );
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    public function ObtenerJSONCatalogoTipoMovimiento($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_tipomovimiento";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_tipomovimiento ORDER BY Id LIMIT ".$start." , ".$limit;
        $TProveedor= $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($row = mysqli_fetch_array($TProveedor)){
            $Respuesta->rows[$Contador]["id"] = $row["Id"];
            $Respuesta->rows[$Contador]["cell"] = array($row["Id"],
                                                        $row["Id_TipoMovimiento"],
                                                        $row["vDescripcion"],
                                                        $row["bEntrada"],
                                                        $row["bBaja"],
                                                        $row["cTipoAlmacen"],
                                                        $row["bSalida"],
                                                        $row["bEstadoMov"]
                                                    );
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    public function ObtenerJSONCatalogoParametro($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_parametro";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_parametro ORDER BY Id_Parametro LIMIT ".$start." , ".$limit;
        $TProveedor= $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($row = mysqli_fetch_array($TProveedor)){
            $Respuesta->rows[$Contador]["id"] = $row["Id_Parametro"];
            $Respuesta->rows[$Contador]["cell"] = array($row["Id_Parametro"],
                                                        $row["sDescripcion"],
                                                        $row["sValor"]
                                                    );
            $Contador++;
        }
        return json_encode($Respuesta);
    }
     public function ObtenerJSONCatalogoEstadoBien($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_estadobien";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_estadobien ORDER BY Id_EdoBien LIMIT ".$start." , ".$limit;
        $TProveedor= $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($row = mysqli_fetch_array($TProveedor)){
            $Respuesta->rows[$Contador]["id"] = $row["Id_EdoBien"];
            $Respuesta->rows[$Contador]["cell"] = array($row["Id_EdoBien"],			
                                                        $row["vDescripcion"]
                                                    );
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    public function ObtenerJSONCatalogoTipoBien($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_tipobieninventariable";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_tipobieninventariable ORDER BY Id_TipoBien LIMIT ".$start." , ".$limit;
        $TProveedor= $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($row = mysqli_fetch_array($TProveedor)){
            $Respuesta->rows[$Contador]["id"] = $row["Id_TipoBien"];
            $Respuesta->rows[$Contador]["cell"] = array($row["Id_TipoBien"],
                                                        $row["vDescripcion"]
                                                    );
            $Contador++;
        }
        return json_encode($Respuesta);
    }
      public function ObtenerJSONCatalogoFactorPronostico($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_factorpronostico";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_factorpronostico ORDER BY Id LIMIT ".$start." , ".$limit;
        $TProveedor= $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($row = mysqli_fetch_array($TProveedor)){
            $Respuesta->rows[$Contador]["id"] = $row["Id"];
            $Respuesta->rows[$Contador]["cell"] = array($row["Id"],
                                                        $row["eAnio"],
                                                        $row["eMes"],
                                                        $row["eFactor"]
                                                    );
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    public function ObtenerJSONCatalogoCABMSConsumible($page, $limit, $sidx, $sord){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        if(!$sidx) $sidx =1;
        
        $StrConsulta = "SELECT COUNT(*) AS count FROM sa_cabmsconsumible";
        $ResultadoTotal = $objMenu->Query($con,$StrConsulta);
        $row = mysqli_fetch_array($ResultadoTotal);
        $count = $row['count'];
        
        if( $count > 0 ) {
                $total_pages = ceil($count/$limit);
        } else {
                $total_pages = 0;
        }
        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        
        $StrConsulta = "SELECT * FROM sa_cabmsconsumible ORDER BY Id LIMIT ".$start." , ".$limit;
        $TCABMS = $objMenu ->Query($con,$StrConsulta);
        $Respuesta->page = $page;
        $Respuesta->total = $total_pages;
        $Respuesta->records = $count;
        $Contador = 0;
        while ($CABMS = mysqli_fetch_array($TCABMS)){
            $Respuesta->rows[$Contador]["id"] = $CABMS["Id_CveInternaAC"];
            $Respuesta->rows[$Contador]["cell"] = array(
                                                        $CABMS["Id_CveInternaAC"],
                                                        $CABMS["Id_CveARTCABMS"], 
                                                        $CABMS["vDescripcion"],
                                                        $CABMS["Id_CABMS"],
                                                        $CABMS["Id_UMedida"],
                                                        $CABMS["ePartidaPresupuestal"]
                );
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    
    public function ObtenerArregloCatalogoCABMSConsumible(){        
        $objMenu = new poolConnection();
        $con=$objMenu -> Conexion();
        $objMenu -> BaseDatos($con);
        
        $StrConsulta = "SELECT * FROM sa_cabmsconsumible ORDER BY Id";
        $TCABMS = $objMenu ->Query($con,$StrConsulta);
        $Catalogo = array();
        while ($CABMS = mysqli_fetch_array($TCABMS)){
            $Catalogo[] = array($CABMS["Id_CveInternaAC"], $CABMS["Id_CveARTCABMS"], $CABMS["vDescripcion"], $CABMS["Id_CABMS"], $CABMS["Id_UMedida"], $CABMS["ePartidaPresupuestal"]);
        }
        return $Catalogo;
    }
}
?>
