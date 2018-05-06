<?php
    include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Catalogos.php");
    
    $RC = new Reporte_Catalogos();
    
    switch ($_GET[o]) {
        case 'ObtenerEmpleados':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoEmpleados($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerCABMS':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoCABMS($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerGiros':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoGiros($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerUnidadesMedida':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoUnidadesMedida($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerProveedores':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoProveedores($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerUnidadAdministrativa':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoUnidadAdmin($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerTipoMovimiento':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoTipoMovimiento($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerParametro':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoParametro($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerEdoBien':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoEstadoBien($page, $limit, $sidx, $sord);
            break;
         case 'ObtenerTipoBien':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoTipoBien($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerFactorPronostico':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoFactorPronostico($page, $limit, $sidx, $sord);
            break;
        case 'ObtenerCABMSConsumible':
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            echo $RC->ObtenerJSONCatalogoFactorPronostico($page, $limit, $sidx, $sord);
            break;
    }
?>
