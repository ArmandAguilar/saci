<?php
    header('Content-type: application/msword');
    header("Content-Disposition: inline; filename=reporte_catalogo_giros.doc");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Catalogos.php");
    require_once $path."class/phpword/PHPWord.php";

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
    
    
    
    $PHPWord = new PHPWord();

    $section = $PHPWord->createSection();
    $sectionStyle = $section->getSettings();
    $sectionStyle->setLandscape();

    $header = $section->createHeader();
    $imageStyle = array('width'=>63, 'height'=>64, 'marginTop'=>30, 'marginLeft'=>0);
    $header->addWatermark("../../../logos/$Logo", $imageStyle);

    $table = $header->addTable();
    $table->addRow(100);
    $cell = $table->addCell(16000);
    $imageStyle = array('width'=>927, 'height'=>89, 'align'=>'center', 'marginTop'=>-20, 'marginLeft'=>0);
    $cell->addImage("../../../modulos/interfaz_modulos/reportes/rep_sup_vertical.jpg", $imageStyle);
    $cell->addText(utf8_decode('Reporte del Catálogo de Giros'), array('name'=>'Arial', 'size'=>16, 'bold'=>true), array('align'=>'center'));
    $table->addRow(100);
    $cell = $table->addCell(16000);
    $cell->addText('Fecha: '.date('d/m/Y'), array('size'=>10, 'italic'=>true), array('align'=>'left'));
    $cell->addText('Hora: '.date('H:i:s'), array('size'=>10, 'italic'=>true), array('align'=>'left'));

    $footer = $section->createFooter();
    $table = $footer->addTable();
    $table->addRow(100);
    $cell = $table->addCell(16000);
    $imageStyle = array('width'=>927, 'height'=>53, 'align'=>'center', 'marginTop'=>660, 'marginLeft'=>0);
    $cell->addImage("../../../modulos/interfaz_modulos/reportes/rep_inf_vertical.jpg", $imageStyle);
    $cell->addPreserveText('Pagina {PAGE}', array(), array('align'=>'right'));

    //Aproximadamente 16000 para abarcar el ancho de la hoja
    $styleTable = array();
    $styleFirstRow = array('borderSize'=>1, 'borderColor'=>'000000', 'borderInsideHColor'=>'00FF00', 'valign'=>'center');
    $PHPWord->addTableStyle('Reporte_Catalogo', $styleTable, $styleFirstRow);
    $styleCell = array('bold'=>true);
    $table = $section->addTable('Reporte_Catalogo');
    $table->addRow(100);
    $table->addCell(1600)->addText('IDGiro', $styleCell, array('align'=>'center'));
    $table->addCell(14400)->addText(utf8_decode('Descripción'), $styleCell, array('align'=>'center'));
    $RC = new Reporte_Catalogos();
    $Datos = $RC->ObtenerArregloCatalogoGiros();
    $i = 1;
    foreach ($Datos as $F) {
        $table->addRow(100);
        $table->addCell(1600)->addText($F[0], array(), array('align'=>'center'));
        $table->addCell(14400)->addText($F[1]);
    }

    $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('php://output');
    exit;
?>