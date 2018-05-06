<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_existencias_informatico.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include($path."/class/poolConnection.inic");
    include($path."/class/Reporte_Existencias.php");
    require_once $path."class/phpexcel/Classes/PHPExcel.php";
    require_once $path."class/phpexcel/Classes/PHPExcel/IOFactory.php";
        
    $ObjImgLogo = new poolConnection();
            $con=$ObjImgLogo->Conexion();
            $ObjImgLogo->BaseDatos();
            $sql="SELECT Reportes FROM sa_settings Where Id='1'";
            $RSetImg=$ObjImgLogo->Query($sql);
            while($rowimg = mysql_fetch_array($RSetImg))
            {
                $Logo = $rowimg[Reportes];
            }
            mysql_free_result($RSetImg);
            $ObjImgLogo->Cerrar($con);
    $PHPExcel = new PHPExcel();
    
    $PHPExcel->getProperties()->setCreator("Be-Intelligent")
    ->setLastModifiedBy("")
    ->setTitle("")
    ->setSubject("")
    ->setDescription("")
    ->setKeywords("")
    ->setCategory("");
    $PHPExcel->getActiveSheet()->setTitle('Informatico');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:H1')->setCellValue('A1', 'REPORTE EXISTENCIAS INFORMATICO')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:H2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:H3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:H4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:H5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:J7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:J7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
    //$this->CabeceraTabla = array('Cve.Usuario','No.Inventario','Fecha Registro','Marca','Mouse','Teclado','Procesador','Modelo','Ram','Disco Duro');
		
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "Cve.Usuario")
    ->setCellValue("B7", "No.Inventario")
    ->setCellValue("C7", "Fecha Registro")
    ->setCellValue("D7", "Marca")
    ->setCellValue("E7", "Mouse")
    ->setCellValue("F7", "Teclado")
    ->setCellValue("G7", "Procesador")
    ->setCellValue("H7", "Modelo")
    ->setCellValue("I7", "Modelo")
    ->setCellValue("J7", "Disco Duro");
    
    $RC = new Reporte_Existencias();
    $info->txtIdEmpleadoInicial=$_GET[txtIdEmpleadoInicial];
	$info->txtIdEmpleadoFinal=$_GET[txtIdEmpleadoFinal];
	$info->txtAreaInicial=$_GET[txtAreaInicial];
	$info->txtAreaFinal=$_GET[txtAreaFinal];
	$info->txtInventarioInicial=$_GET[txtInventarioInicial];
	$info->txtInventarioFinal=$_GET[txtInventarioFinal];
	$info->txtFechaInicial=$_GET[txtFechaInicial];
	$info->txtFechaFinal=$_GET[txtFechaFinal];
	$info->txtMovimientoInicial = $_GET[txtMovimientoInicial];
	$info->txtMovimientoFinal = $_GET[txtMovimientoFinal];
	$info->txtMarcaBienInfomaticoInicio=$_GET[txtMarcaBienInfomaticoInicio];
	$info->txtMarcaBienInfomaticoFinal=$_GET[txtMarcaBienInfomaticoFinal];
	$info->txtMarcaMouseInformaticoInicio=$_GET[txtMarcaMouseInformaticoInicio];
	$info->txtMarcaMouseInformaticoFinal=$_GET[txtMarcaMouseInformaticoFinal];
	$info->txtMarcaTecladoInformaticoInicio=$_GET[txtMarcaTecladoInformaticoInicio];
	$info->txtMarcaTecladoInformaticoFinal=$_GET[txtMarcaTecladoInformaticoFinal];
	$info->txtMarcaProcesadorInformaticoInicio=$_GET[txtMarcaProcesadorInformaticoInicio];
	$info->txtMarcaProcesadorInformaticoFinal=$_GET[txtMarcaProcesadorInformaticoFinal];
	$info->txtMarcaMarcaInformaticoInicio=$_GET[txtMarcaMarcaInformaticoInicio];
	$info->txtMarcaMarcaInformaticoFinal=$_GET[txtMarcaMarcaInformaticoFinal];
	$info->txtMarcaRamInformaticoInicio=$_GET[txtMarcaRamInformaticoInicio];
	$info->txtMarcaRamInformaticoFinal=$_GET[txtMarcaRamInformaticoFinal];
	$info->txtMarcaDdInformaticoInicio=$_GET[txtMarcaDdInformaticoInicio];
	$info->txtMarcaDdInformaticoFinal=$_GET[txtMarcaDdInformaticoFinal];
    $Datos = $RC->print_informatico_pdf($info);
    $i = 8;
    foreach ($Datos as $F) {
        $PHPExcel->setActiveSheetIndex(0)
        ->setCellValueByColumnAndRow(0, $i, $F[0])
        ->setCellValueByColumnAndRow(1, $i, $F[1])
        ->setCellValueByColumnAndRow(2, $i, $F[2])
        ->setCellValueByColumnAndRow(3, $i, $F[3])
        ->setCellValueByColumnAndRow(4, $i, $F[4])
        ->setCellValueByColumnAndRow(5, $i, $F[5])
        ->setCellValueByColumnAndRow(6, $i, $F[6])
        ->setCellValueByColumnAndRow(7, $i, $F[7])
        ->setCellValueByColumnAndRow(8, $i, $F[8])
        ->setCellValueByColumnAndRow(9, $i, $F[9]);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>