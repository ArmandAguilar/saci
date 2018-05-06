<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/carga_inicial.php");
    include("$path/class/Inventario.php");
    
    $CI = new Carga_Inicial();
    
    switch ($_GET[o]) {
        case 'ObtenerDetalleCargaInicial':
            $IDUnidadAdministrativa = $_GET["idunidadadministrativa"];
            echo $CI->ObtenerDetalleCargaInicial($IDUnidadAdministrativa);
            break;        
        case 'ObtenerCABMSAgregarCargaInicial':
            $IDUnidadAdministrativa = $_GET["idunidadadministrativa"];
            echo $CI->ObtenerCABMSAgregarCargaInicial($IDUnidadAdministrativa);
            break;
        case 'ObtenerUnidadesMedida':
            echo json_encode($CI->ObtenerUnidadesMedida());
            break;   
        case 'ObtenerCABMS':
            $I = new Inventario();
            echo json_encode($I->ObtenerDescripcionArticulosCABMS2000());
            break;
        case 'ModificarEncabezado':
            $IDUnidadAdministrativa = $_GET["idunidadadministrativa"];
            $TipoCarga = $_GET["tipocarga"];
            $FechaCaptura = $_GET["fechacaptura"];
            echo $CI->ModificarEncabezado($IDUnidadAdministrativa, $TipoCarga, $FechaCaptura);
            break;
        case 'EliminarArticuloCargaInicial':
            $IDUnidadAdministrativa = $_GET["idunidadadministrativa"];
            $ClaveAC = $_GET["claveac"];
            $ClaveInternaAC = $_GET["claveinternaac"];
            echo "{ Eliminado: ".$CI->EliminarArticuloCargaInicial($IDUnidadAdministrativa, $ClaveAC, $ClaveInternaAC)." }";
            break;
        case 'InsertarModificarArticuloCargaInicial':
            $IDUnidadAdministrativa = $_GET["idunidadadministrativa"];
            $IDCABMS = $_GET["idcabms"];
            //$ClaveAC = $_GET["claveac"];
           // $ClaveInternaAC = $_GET["claveinternaac"];
            $CantidadSolicitada = $_GET["cantidadsolicitada"];
            $TipoCarga = $_GET["tipocarga"];
            $FechaElaboracion = $_GET["fechaelaboracion"];
            //echo $IDUnidadAdministrativa."<br/>".$IDCABMS."<br/>".$ClaveAC."<br/>".$ClaveInternaAC."<br/>".$CantidadSolicitada."<br/>".$TipoCarga."<br/>".$FechaElaboracion."<br/>";
            echo "{ Insertado: ".$CI->InsertarModificarArticuloCargaInicial('', $IDCABMS,'', '', $CantidadSolicitada, $TipoCarga, $FechaElaboracion)." }";
            break;
    }
?>
