<?php
/**
 * Description of Inventario
 *
 * @author UnKnOwN
 */
class Inventario extends poolConnection{
    public function ObtenerDescripcionArticulosCABMS() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();
        
        $StrConsulta = "SELECT * FROM sa_cabmsconsumible c ORDER BY vdescripcion";
        $TArticulo = $objConexion->Query($StrConsulta);
        if (mysql_num_rows($TArticulo) > 0) {
            $Contador = 0;
            while ($Articulo = mysql_fetch_array($TArticulo)){
                $Respuesta[$Contador]->IDCABMSConsumible = $Articulo["Id"];
                $Respuesta[$Contador]->Descripcion = utf8_encode($Articulo["vDescripcion"]);
                $Contador++;
            }
        }
        return $Respuesta;
    }
    public function ObtenerDescripcionArticulosCABMS2000() {
    	$objConexion = new poolConnection();
    	$con = $objConexion->Conexion();
    	$objConexion->BaseDatos();
    
    	$StrConsulta = "SELECT * FROM sa_cabms c Where ePartidaPresupuestal>='1' and  ePartidaPresupuestal <='3000' ORDER BY  	vDescripcionCABMS";
    	$TArticulo = $objConexion->Query($StrConsulta);
    	if (mysql_num_rows($TArticulo) > 0) {
    		$Contador = 0;
    		while ($Articulo = mysql_fetch_array($TArticulo)){
    			$Respuesta[$Contador]->IDCABMSConsumible = $Articulo["Id_CABMS"];
    			$Respuesta[$Contador]->Descripcion = utf8_encode($Articulo["vDescripcionCABMS"]);
    			$Contador++;
    		}
    	}
    	return $Respuesta;
    }
    public function ObtenerDescripcionArticulosCABMSJQGrid() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();
        
        $StrConsulta = "SELECT * FROM sa_cabmsconsumible c ORDER BY vdescripcion";
        $TArticulo = $objConexion->Query($StrConsulta);
        $StrCatalogo = "";
        if (mysql_num_rows($TArticulo) > 0) {
            $Contador = 0;
            while ($Articulo = mysql_fetch_array($TArticulo)){
                if ($StrCatalogo != ""){
                    $StrCatalogo .= ", ";
                }
                $StrCatalogo .= $Articulo["Id"].": '".utf8_encode($Articulo["vDescripcion"])."'";
            }
        }
        return $Respuesta;
    }
    
    public function ObtenerDescripcionArticuloCABMS($xIDCABMSConmbustible) {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();
        
        $StrConsulta = "SELECT c.id, c.id_cveartcabms, c.id_cveinternaAC, l.id_localizacion, l.vdescripcion, la.ecantidadlocalizacion FROM sa_cabmsconsumible c, sa_localizacion l, sa_locarticulos la WHERE l.id_localizacion=la.id_localizacion AND la.id_cveartcabms=c.id_cveartcabms AND la.id_cveinternaac=c.id_cveinternaac AND c.id=".$xIDCABMSConmbustible;
        $TLocalizacion = $objConexion->Query($StrConsulta);
        $Contador = 0;
        while ($Localizacion = mysql_fetch_array($TLocalizacion)){
            $Respuesta->Areas[$Contador]->claveAC = $Localizacion["id_cveartcabms"];
            $Respuesta->Areas[$Contador]->claveinternaAC = $Localizacion["id_cveinternaAC"];
            $Respuesta->Areas[$Contador]->idlocalizacion = $Localizacion["id_localizacion"];
            $Respuesta->Areas[$Contador]->descripcion = $Localizacion["vdescripcion"];
            $Respuesta->Areas[$Contador]->cantidad = $Localizacion["ecantidadlocalizacion"];
            //echo $Localizacion["id_localizacion"]." - ".$Localizacion["vdescripcion"]." - ".$Localizacion["ecantidadlocalizacion"]."<br/>";
            $Contador++;
        }
        return json_encode($Respuesta);
    }
    
    public function ObtenerLocalizaciones() {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();
        
        $StrConsulta = "SELECT * FROM sa_localizacion l ORDER BY l.id_localizacion";
        $TLocalizacion = $objConexion->Query($StrConsulta);
        $Contador = 0;
        if (mysql_num_rows($TLocalizacion) > 0) {
            while ($Localizacion = mysql_fetch_array($TLocalizacion)) {
                $Respuesta[$Contador]->IDLocalizacion = $Localizacion["Id_Localizacion"];
                $Respuesta[$Contador]->Descripcion = $Localizacion["Id_Localizacion"]." - ".$Localizacion["vDescripcion"];
                $Contador++;
            }
        }
        return $Respuesta;
    }
    
    public function ObtenerDescripcionLocalizacion($xIDLocalizacion) {
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();
        
        $StrConsulta = "SELECT * FROM sa_localizacion l WHERE l.id_localizacion=".$xIDLocalizacion." LIMIT 1";
        $TLocalizacion = $objConexion->Query($StrConsulta);
        $Respuesta->Descripcion = "";
        if (mysql_num_rows($TLocalizacion) > 0) {
            $Localizacion = mysql_fetch_array($TLocalizacion);
            $Respuesta->Descripcion = $Localizacion["vDescripcion"];
        }
        return json_encode($Respuesta);
    }
    
    public function RegistrarTransferencia($xIDCABMS, $xClaveAC, $xClaveInternaAC, $xIDLocalizacionOrigen, $xIDLocalizacionTraspaso, $xCantidad){
        $objConexion = new poolConnection();
        $con = $objConexion->Conexion();
        $objConexion->BaseDatos();
        
        $StrConsulta = "SELECT la.ecantidadlocalizacion FROM sa_cabmsconsumible c, sa_localizacion l, sa_locarticulos la WHERE l.id_localizacion=la.id_localizacion AND la.id_cveartcabms=c.id_cveartcabms AND la.id_cveinternaac=c.id_cveinternaac AND c.id=".$xIDCABMS;
        $TArticulo = $objConexion->Query($StrConsulta);
        $CantidadActual = 0;
        if (mysql_num_rows($TArticulo) > 0){
            $Articulo = mysql_fetch_array($TArticulo);
            $CantidadActual = $Articulo["ecantidadlocalizacion"];
        }
        
        $Transferido = 0;        
        $SeReduce = false;
        if ($xCantidad <= $CantidadActual){
            $CantidadActual = $CantidadActual - $xCantidad;
            $SeReduce = true;
        }
        
        if ($SeReduce) {
            $StrConsulta = "SELECT * FROM sa_locarticulos WHERE id_cveartcabms=".$xClaveAC." AND id_cveinternaAC=".$xClaveInternaAC." AND id_localizacion=".$xIDLocalizacionTraspaso;
            $TArticulo = $objConexion->Query($StrConsulta);
            
            if (mysql_num_rows($TArticulo) > 0){
                $StrConsulta = "UPDATE sa_locarticulos SET eCantidadLocalizacion=".$xCantidad." WHERE id_cveartcabms=".$xClaveAC." AND id_cveinternaAC=".$xClaveInternaAC." AND id_localizacion=".$xIDLocalizacionTraspaso;
            } else {
                $StrConsulta = "INSERT INTO sa_locarticulos(id_localizacion, id_cveartcabms, id_cveinternaAC, ecantidadlocalizacion, dfecharegistro) VALUES(".$xIDLocalizacionTraspaso.", ".$xClaveAC.", ".$xClaveInternaAC.", ".$xCantidad.", '".date("o-m-d H:i:s")."')";
            }
            
            $TArticulo = $objConexion->Query($StrConsulta);
            $TransferenciaRegistrada = mysql_affected_rows();
            if ($TransferenciaRegistrada > 0) {
                if ($CantidadActual > 0) {
                    $StrConsulta = "UPDATE sa_locarticulos SET eCantidadLocalizacion=".$CantidadActual." WHERE id_cveartcabms=".$xClaveAC." AND id_cveinternaAC=".$xClaveInternaAC." AND id_localizacion=".$xIDLocalizacionOrigen;
                } else {
                    $StrConsulta = "DELETE FROM sa_locarticulos WHERE id_cveartcabms=".$xClaveAC." AND id_cveinternaAC=".$xClaveInternaAC." AND id_localizacion=".$xIDLocalizacionOrigen;
                }
                $TArticulo = $objConexion->Query($StrConsulta);
                $TransferenciaRegistrada = mysql_affected_rows();

                if ($TransferenciaRegistrada > 0){
                    $Transferido= 1;
                } else {
                    //No se registro la REDUCCION
                    $Transferido = -2;
                }
            } else {
                //No se registro o actualizo la AMPLIACION
                $Transferido = -1;
            }
        } else {
            //El numero de Articulos a Transferir es Mayor al numero de Articulos Existentes.
            $Transferido = 0;
        }
        return "{ Transferido: ".$Transferido." }";
    }
}
?>