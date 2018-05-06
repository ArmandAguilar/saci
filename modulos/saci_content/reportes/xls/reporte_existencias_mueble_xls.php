<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_existencias_muebles.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include($path."/class/poolConnection.php");
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
    $PHPExcel->getActiveSheet()->setTitle('MUEBLES');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:H1')->setCellValue('A1', 'REPORTE EXISTENCIAS MUEBLE')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:H2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:H3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:H4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:H5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:L7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:L7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
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
    //$this->CabeceraTabla = array('','','','','','','','','','','','');
		
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "Cve.Usuario")
    ->setCellValue("B7", "No.Inventario")
    ->setCellValue("C7", "Fecha Registro")
    ->setCellValue("D7", "Tipo")
    ->setCellValue("E7", "Modelo")
    ->setCellValue("F7", "Pedestal")
    ->setCellValue("G7", "Fija")
    ->setCellValue("H7", "Giratoria")
    ->setCellValue("I7", "Rodajas")
    ->setCellValue("J7", "Plegable")
    ->setCellValue("K7", "No.Cajon")
    ->setCellValue("L7", "No.Entrepanio");
    $RC = new Reporte_Existencias();
    $info->txtIdEmpleadoInicial=$_GET[txtIdEmpleadoInicial];
    $info->txtIdEmpleadoFinal=$_GET[txtIdEmpleadoFinal];
    $info->txtAreaInicial=$_GET[txtAreaInicial];
    $info->txtAreaFinal=$_GET[txtAreaFinal];
    $info->txtInventarioInicial=$_GET[txtInventarioInicial];
    $info->txtInventarioFinal=$_GET[txtInventarioFinal];
    $info->txtFechaInicial=$_GET[txtFechaInicial];
    $info->txtFechaFinal=$_GET[txtFechaFinal];
    $info->txtMarcaMuebleInicio=$_GET[txtMarcaMuebleInicio];
    $info->txtMarcaMuebleFinal=$_GET[txtMarcaMuebleFinal];
    $info->txtMuebleTipoInicial=$_GET[txtMuebleTipoInicial];
    $info->txtMuebleTipoFinal=$_GET[txtMuebleTipoFinal];
    $info->txtMuebleModeloInicial=$_GET[txtMuebleModeloInicial];
    $info->txtMuebleModeloFinal=$_GET[txtMuebleModeloFinal];
    $info->chkMueblePedestal=$_GET[chkMueblePedestal];
    $info->chkMuebleFija=$_GET[chkMuebleFija];
    $info->chkMuebleGiratoria=$_GET[chkMuebleGiratoria];
    $info->chkMuebleRodajas=$_GET[chkMuebleRodajas];
    $info->chkMueblePlegable=$_GET[chkMueblePlegable];
    $info->chkMuebleCajones=$_GET[chkMuebleCajones];
    $info->chkMuebleGavetas=$_GET[chkMuebleGavetas];
    $info->chkMuebleEntrepano=$_GET[chkMuebleEntrepano];
    $info->chkMuebleSerie=$_GET[chkMuebleSerie];
    $Datos = $RC->print_muebles_pdf($info);
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
        ->setCellValueByColumnAndRow(9, $i, $F[9])
        ->setCellValueByColumnAndRow(10, $i, $F[10])
        ->setCellValueByColumnAndRow(11, $i, $F[11]);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>