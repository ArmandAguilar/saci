function InicializarReporteCatalogoEmpleados(){
    $("#TblEmpleados").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerEmpleados',
        datatype: 'json',
        colNames: ['No. Empleado', 'Nombre', 'RFC', 'Zona de Pago', 'Cargo', 'Zona de Pago Anterior', 'Estado'],
        colModel: [
            { name: 'Id_NumEmpleado', index: 'Id_NumEmpleado' },
            { name: 'vNombre', index: 'vNombre' },
            { name: 'vRFC', index: 'vRFC' },
            { name: 'eZonaPago', index: 'eZonaPago' },
            { name: 'eZonaPagoAnterior', index: 'eZonaPagoAnterior' },
            { name: 'vCargo', index: 'vCargo' },
            { name: 'bEstadoEmpleado', index: 'bEstadoEmpleado' },
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
    
    $("#BtnImprimirPDF").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        //window.location = "reporte_empleados_pdf.php";
        window.open("reporte_empleados_pdf.php", '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
    });
    
    $("#BtnImprimirXLS").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_empleados_xls.php";
    });
    
    $("#BtnImprimirDOC").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_empleados_doc.php";
    });
}

function InicializarReporteCatalogoCABMS(){
    $("#TblCABMS").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerCABMS',
        datatype: 'json',
        colNames: ['ID', 'ID_CAMBS', 'ID_UMedida', 'Descripción', 'Tipo de Almacen', 'Consecutivo Inv.', 'Partida Presupuestal'],
        colModel: [
            { name: 'Id', index: 'Id' },
            { name: 'Id_CABMS', index: 'Id_CABMS' },
            { name: 'Id_UMedida', index: 'Id_UMedida' },
            { name: 'vDescripcionCABMS', index: 'vDescripcionCABMS' },
            { name: 'cTipoAlmacen', index: 'cTipoAlmacen' },
            { name: 'nConsecutivoInv', index: 'nConsecutivoInv' },
            { name: 'ePartidaPresupuestal', index: 'ePartidaPresupuestal' },
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
    
    $("#BtnImprimirPDF").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        //window.location = "reporte_empleados_pdf.php";
        window.open("reporte_cabms_pdf.php", '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
    });
    
    $("#BtnImprimirXLS").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_cabms_xls.php";
    });
    
    $("#BtnImprimirDOC").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_cabms_doc.php";
    });
}

function InicializarReporteCatalogoGiros(){
    $("#TblGiros").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerGiros',
        datatype: 'json',
        colNames: ['ID_Giro', 'Descripción'],
        colModel: [
            { name: 'Id_Giro', index: 'Id_Giro' },
            { name: 'vDescripcionGR', index: 'vDescripcionGR' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
    
    $("#BtnImprimirPDF").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        //window.location = "reporte_empleados_pdf.php";
        window.open("reporte_giros_pdf.php", '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
    });
    
    $("#BtnImprimirXLS").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_giros_xls.php";
    });
    
    $("#BtnImprimirDOC").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_giros_doc.php";
    });
}

function InicializarReporteCatalogoUnidadesMedida(){
    $("#TblUnidadesMedida").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerUnidadesMedida',
        datatype: 'json',
        colNames: ['ID_UMedida', 'Descripción'],
        colModel: [
            { name: 'Id_UMedida', index: 'Id_UMedida' },
            { name: 'vDescripcion', index: 'vDescripcion' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
    
    $("#BtnImprimirPDF").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        //window.location = "reporte_empleados_pdf.php";
        window.open("reporte_unidades_de_medida_pdf.php", '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
    });
    
    $("#BtnImprimirXLS").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_unidades_de_medida_xls.php";
    });
    
    $("#BtnImprimirDOC").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_unidades_de_medida_doc.php";
    });
}

function InicializarReporteCatalogoProveedores(){
    $("#TblProveedores").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerProveedores',
        datatype: 'json',
        colNames: [ "Id_Proveedor", "Id_Giro", "Nombre", "Responsable", "Calle", "Numero", "Colonia", "Poblacion", "CP", "RFC", "PadronFedProv", "Cedula Empadron", "Camara de Comercio", "Canacintra", "Camara Ramo", "Telefono1", "Telefono2", "Nacional", "Fax" ],
        colModel: [
            { name: 'Id_Proveedor', index: 'Id_Proveedor' },
            { name: 'Id_Giro', index: 'Id_Giro' },
            { name: 'vNombre', index: 'vNombre' },
            { name: 'vResponsable', index: 'vResponsable' },
            { name: 'vCalle', index: 'vCalle' },
            { name: 'vNumero', index: 'vNumero' },
            { name: 'Colonia', index: 'Colonia' },
            { name: 'vPoblacion', index: 'vPoblacion' },
            { name: 'vCP', index: 'vCP' },
            { name: 'cRFC', index: 'cRFC' },
            { name: 'cPadronFedProv', index: 'cPadronFedProv' },
            { name: 'cCedulaEmpadr', index: 'cCedulaEmpadr' },
            { name: 'cCamaraComercio', index: 'cCamaraComercio' },
            { name: 'cCanacintra', index: 'cCanacintra' },
            { name: 'cCamaraRamo', index: 'cCamaraRamo' },
            { name: 'vTelefono1', index: 'vTelefono1' },
            { name: 'vTelefono2', index: 'vTelefono2' },
            { name: 'bNacional', index: 'bNacional' },
            { name: 'vTelFax', index: 'vTelFax' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
    
    $("#BtnImprimirPDF").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        //window.location = "reporte_empleados_pdf.php";
        window.open("reporte_proveedores_pdf.php", '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
    });
    
    $("#BtnImprimirXLS").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_proveedores_xls.php";
    });
    
    $("#BtnImprimirDOC").button({icons: { primary: 'ui-icon-document' }}).click(function () {
        window.location = "reporte_proveedores_doc.php";
    });
}
function InicializarReporteCatalogoUnidadAdministrativa(){
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerUnidadAdministrativa',
        datatype: 'json',
        colNames: [ "Id", 	
	"Id Unidad", 	
	"Id Responsable Area", 
	"Id Zonas",
	"Descripcion", 
	"Calle", 
	"Numero", 	
	"Colonia", 	
	"Poblacion", 	
	"CP", 	
	"Telefono",
	"TelFax",
	"Prioridad", 
	"AreaActiva", 	
	"NumFolio", 
	"Ejec", 	
 	"NumEmpleados" ],
        colModel: [
            { name: 'Id', index: 'Id' },
            { name: 'Id Unidad', index: 'Id Unidad' },
            { name: 'Id Responsable Area', index: 'Id Responsable Area' },
            { name: 'Id Zonas', index: 'Id Zonas' },
            { name: 'Descripcion', index: 'Descripcion' },
            { name: 'Calle', index: 'Calle' },
            { name: 'Numero', index: 'Numero' },
            { name: 'Colonia', index: 'Colonia' },
            { name: 'Poblacion', index: 'Poblacion' },
            { name: 'CP', index: 'CP' },
            { name: 'Telefono', index: 'Telefono' },
            { name: 'TelFax', index: 'TelFax' },
            { name: 'Prioridad', index: 'Prioridad' },
            { name: 'AreaActiva', index: 'AreaActiva' },
            { name: 'NumFolio', index: 'NumFolio' },
            { name: 'Ejec', index: 'Ejec' },
            { name: 'NumEmpleados', index: 'NumEmpleados' }
            
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
 
}
/* AAL*/

function InicializarReporteCatalogoArtCABMS(){
    
    $("#TblCABMS").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerCABMSConsumible',
        datatype: 'json',
        colNames: ['Id_CveInternaAC', 
                  'Id_CveARTCABMS',
                  'vDescripcion',
                  'Id_CABMS',
                  'Id_UMedida',
                  'ePartidaPresupuestal'],
        colModel: [
            { name: 'Id', index: 'Id_CveInternaAC' },
            { name: 'Id_CveARTCABMS', index: 'Id_CveARTCABMS' },
            { name: 'vDescripcion', index: 'vDescripcion' },
            { name: 'Id_CABMS', index: 'Id_CABMS' },
            { name: 'Id_UMedida', index: 'Id_UMedida' },
            { name: 'ePartidaPresupuestal', index: 'ePartidaPresupuestal' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
    
    
}


function InicializarReporteCatalogoTipoMovimiento(){
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerTipoMovimiento',
        datatype: 'json',
        colNames: ["Id",
                    "Id TipoMovimiento",
                    "Descripcion",
                    "Entrada",
                    "Baja",
                    "Tipo Almacen",
                    "Salida",
                    "Estado Mov." ],
        colModel: [
            { name: 'Id', index: 'Id' },
            { name: 'Tipo Movimiento', index: 'Id TipoMovimiento' },
            { name: 'vDescripcion', index: 'vDescripcion' },
            { name: 'bEntrada', index: 'bEntrada' },
            { name: 'bBaja', index: 'vDescripcion' },
            { name: 'cTipoAlmacen', index: 'cTipoAlmacen' },
            { name: 'bSalida', index: 'bSalida' },
            { name: 'bEstadoMov', index: 'bEstadoMov' }
            
            
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
 
}
function InicializarReporteCatalogoParametro(){
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerParametro',
        datatype: 'json',
        colNames: ["Id Parametro",
                    "Descripcion",
                    "Valor" ],
        colModel: [
            { name: 'Id Parametro', index: 'Id Parametro' },
            { name: 'Descripcion', index: 'Descripcion' },
            { name: 'Valor', index: 'Valor' } 
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
 
}
function InicializarReporteCatalogoEdoBien(){
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerEdoBien',
        datatype: 'json',
        colNames: ["Id EdoBien",			
                    "Descripcion" ],
        colModel: [
            { name: 'Id EdoBien', index: 'Id EdoBien' },
            { name: 'Descripcion', index: 'Descripcion' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
 
}
function InicializarReporteCatalogoTipoBien(){
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerTipoBien',
        datatype: 'json',
        colNames: ["Id TipoBien",
                   "Descripcion" ],
        colModel: [
            { name: 'Id TipoBien', index: 'Id TipoBien' },
            { name: 'Descripcion', index: 'Descripcion' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
 
}
function InicializarReporteCatalogoFactorPronostico(){
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerFactorPronostico',
        datatype: 'json',
        colNames: ["Id",
                    "eAnio",
                    "eMes", 	
                    "eFactor" ],
        colModel: [
            { name: 'Id', index: 'Id' },
            { name: 'eAnio', index: 'eAnio' },
            { name: 'eMes', index: 'vDescripcion' },
            { name: 'eFactor', index: 'vDescripcion' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
 
}