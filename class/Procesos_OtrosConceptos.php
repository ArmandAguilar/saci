<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OtrosConceptos
 *
 * @author armand
 */
class OtrosConceptos extends poolConnection{
    
    
    public function frm_alta($session)
    {
        
        $MostrarAceptar="No";
        $FliexGrid = "<center><table class=\"flexme1\">
                                            <tbody>";
         
        $objBuscarDetalles = new poolConnection();
        $con=$objBuscarDetalles->Conexion();
        $objBuscarDetalles->BaseDatos($con);
        $sql="SELECT * FROM sa_grid_otroscargos where Session='$session'";
        $RSet=$objBuscarDetalles->Query($con,$sql);
        while ($row = mysqli_fetch_array($RSet))
            {
                $MostrarAceptar="Si"; 
                $FliexGrid.="
                                  <tr>
                                      
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CveARTCABMS]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Descripcion]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[UnidadMedida]</td>    
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Cantidad]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[RemFac]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[CostoPromedio]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_grid($row[Id]);\">&nbsp;    
                                      
                                  </tr>
                              ";
            }
        $objBuscarDetalles->Cerrar($con,$RSet);
        if($MostrarAceptar=="Si")
        {
            $btnAceptar = "<img src=\"../../interfaz_modulos/botones/aceptar.jpg\" name=\"ImageAceptar\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageAceptar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAceptar','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"click_save();\"/>";
        }  
        $FliexGrid.="  </tbody>
                                 </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [    
                                                            {display: 'CABMS', name : 'CveARTCABMS', width :100, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                                            {display: 'Unidad Medida', name : 'Unidad Medida', width :250, sortable :false, align: 'center'},
                                                            {display: 'Cantidad Entrar', name : 'Cantidad Entregada', width :150, sortable :false, align: 'center'},
                                                            {display: 'Remicion/Factura', name : 'Remicion/Factura', width :100, sortable :false, align: 'center'},
                                                            {display: 'Costo Promedio', name : 'Costo Promedio', width :80, sortable :false, align: 'center'},
                                                            {display: 'Borrar', name : 'Borrar', width :150, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 950,
                                            height: 200
                                            }

                                            );</script>";
        
        $frm="<form  id='frmCargaInventario' name='frmOtrosConceptos' action='' method='post'>
                      <input type='hidden' name='txtSession' id='txtSession' value='$session'/>
                      <input type='hidden' name='txtidumedida' id='txtidumedida'/> 
                      <input type='hidden' name='txtGrid' id='txtGrid' value='Si'/>
                       <br>
                        <fieldset>
                             <legend class=\"txt_titulos_bold\">Articulos</legend>
                                <table>
                                       <tr>
                                           <td><input type='text' id='txtCABMS' name='txtCABMS' class=\"boxes_form150px\"  readonly/>&nbsp;&nbsp;&nbsp;<input type='text' id='txtDescripcion' name='txtDescripcion' class=\"boxes_form1\" readonly/></td>
                                           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                           <td><img src=\"../../interfaz_modulos/botones/examinar.jpg\" name=\"ImageBExaminar\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBExaminar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBExaminar','','../../interfaz_modulos/botones/examinar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"on();\"/></td>
                                       </tr>
                                </table> 
                                <table>
                                       <tr>
                                            <td><div class=\"txt_titulos_bold\">Unidad de Medida</div></td>
                                            <td><input  type=\"text\" id=\"txtUMedida\"  name=\"txtUMedida\" class=\"boxes_form300px validate[required,minSize[6]]\" onclick=\"on2();\"/></td>
                                            <td><div class=\"txt_titulos_bold\">Cantidad a Entrar</div></td>
                                            <td><input  type=\"text\" id=\"txtCTratar\"  name=\"txtCTratar\" class=\"boxes_form100px validate[required,minSize[6]]\" /></td>
                                       </tr>
                                       <tr>
                                             <td><div class=\"txt_titulos_bold\">Remisi&oacute;n/Factura</div></td>
                                            <td><input  type=\"text\" id=\"txtRFactura\"  name=\"txtRFactura\" class=\"boxes_form300px validate[required,minSize[6]]\" /></td>
                                            <td><div class=\"txt_titulos_bold\">Costo Promedio</div></td>
                                            <td><input  type=\"text\" id=\"txtCPromedio\"  name=\"txtCPromedio\" class=\"boxes_form100px validate[required,minSize[6]]\" /></td>
                                            
                                       </tr>
                                </table>
                                <br>
                                <div id='DivBoton' style=\"display:none\"><!-- <img src=\"../../interfaz_modulos/botones/agregar.jpg\" name=\"ImageAdd\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageAdd\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAdd','','../../interfaz_modulos/botones/agregar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"agregar_grid();\"/> --></div>
                               <br>
                               <br>
                               <div id='Grid'>$FliexGrid</div>
                               <br>
                               <br>
                               
                        </fieldset>
                           </center>
                           </form>";
      return $frm;
    }
    public function buscarArt($AData) 
    {
        $where = "";
        $Patron=$AData->Patron;
        $ACClave=$AData->Clave;
        $ACDescripcion=$AData->Descripcion;
        
        #Preparamos ware
        if($ACClave=="Si")
        {
            $where.="Id_CABMS like '%$Patron%' or "; 
        }
        
        if($ACDescripcion=="Si")
        {
            $where.="vDescripcionCABMS like '%$Patron%' or "; 
        }
        $where = substr($where, 0, -3);
        $FliexGrid = "<center><form action='' name='frmOrderGrid' method='post'><table class=\"flexme2\">
                                            <tbody>";
         
        $objBuscar = new poolConnection();
        $ObjDetalles = new OtrosConceptos();
        $con=$objBuscar->Conexion();
        $objBuscar->BaseDatos($con);
        $sql="select Id_CABMS,vDescripcionCABMS  from sa_cabms  where $where order by vDescripcionCABMS";
        $RSet=$objBuscar->Query($con,$sql);
        while ($row = mysqli_fetch_array($RSet))
            {
                 $i++;
                 $info->Id_CABMS = $row[Id_CABMS]; 
                $arrays = $ObjDetalles->Verficamos_art($info);
                $FliexGrid.="
                                  <tr>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"acpetar_Art('$row[Id_CABMS]','$row[vDescripcionCABMS]','$arrays[0]','$arrays[4]','$arrays[3]',$arrays[2]);$('#dialog').dialog('close');\">&nbsp;</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
                                      
                                  </tr>
                              ";
            }
        $objBuscar->Cerrar($con,$RSet);
        $FliexGrid.="  </tbody>
                                 </table><script>$('.flexme2').flexigrid({
                                            title: '',
                                            colModel : [    
                                                            {display: 'Seleccion', name : 'Seleccion', width :150, sortable :false, align: 'center'},
                                                            {display: 'CAMBS', name : 'CAMBS', width :100, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name: 'Descripcion', width :370, sortable :false, align: 'center'}
                                                            
                                  
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order2},
                                                            {separator: true}
                                                        ],
                                            width: 650,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridBuscar\" value=\"Si\"></form>";
        
        return $FliexGrid;
    }
    
  public function Verficamos_art($AData)
  {

       $Id_CABMS=$AData->Id_CABMS;
      //Primero buscamos si exixte este producto registrado
      $Existe="NO";
      $arrayDatos[0]="0";
      $arrayDatos[1]=" ";
      $arrayDatos[2]="0";
      $arrayDatos[3]=" ";
      $arrayDatos[5]=" ";
      $sql="Select eCantidadExistenciaDisponible,mCostoPromedioActual,eCantidadExistenciaApartada from sa_existenciasconsumible Where Id_CABMS='$Id_CABMS'";
      $objArticulo  = new poolConnection();
      $con=$objArticulo->Conexion();
      $objArticulo->BaseDatos($con);
      $RsetArticulo = $objArticulo->Query($con,$sql);
      while($fila=  mysqli_fetch_array($RsetArticulo))
      {
          $Existe="YES";
          $arrayDatos[0]=$fila[eCantidadExistenciaApartada];
          $arrayDatos[4]=$fila[mCostoPromedioActual];
          
      } 
      if($Existe=="YES")
      {
          
           //Buscamos Descripcion y idunidadamedida
             $objArtCambs =  new poolConnection();
             $objArtCambs->Conexion();
             $objArtCambs->BaseDatos($con);
             $sql="SELECT vDescripcionCABMS,Id_UMedida  FROM sa_cabms Where Id_CABMS='$Id_CABMS'";
             $RsetArtCambs=$objArtCambs->Query($con,$sql);
             while($row = mysqli_fetch_array($RsetArtCambs))
                    {
                        $arrayDatos[1]=$row[vDescripcionCABMS];
                        $arrayDatos[2]=$row[Id_UMedida];
                    }

            //Buscamos unidada de medida 
             $objUnidadMedida = new poolConnection();
             $con=$objUnidadMedida->Conexion();
             $objUnidadMedida->BaseDatos($con);
             $sql="SELECT  vDescripcion FROM sa_umedida Where Id_UMedida='$arrayDatos[2]'";
             $RsetUM=$objUnidadMedida->Query($con,$sql);
             $arrayDatos[3]=mysqli_result($RsetUM,0);
   
      }
      else{
              //Buscamos Descripcion y idunidadamedida
             $objArtCambs =  new poolConnection();
             $con=$objArtCambs->Conexion();
             $objArtCambs->BaseDatos($con);
             $sql="SELECT vDescripcionCABMS,Id_UMedida  FROM sa_cabms Where Id_CABMS='$Id_CABMS'";
             $RsetArtCambs=$objArtCambs->Query($con,$sql);
             while($row = mysqli_fetch_array($RsetArtCambs))
                    {
                        $arrayDatos[1]=$row[vDescripcionCABMS];
                        $arrayDatos[2]=$row[Id_UMedida];
                    }

            //Buscamos unidada de medida 
             $objUnidadMedida = new poolConnection();
             $con=$objUnidadMedida->Conexion();
             $objUnidadMedida->BaseDatos($con);
             $sql="SELECT  vDescripcion FROM sa_umedida Where Id_UMedida='$arrayDatos[2]'";
             $RsetUM=$objUnidadMedida->Query($con,$sql);
             $arrayDatos[3]=mysqli_result($RsetUM,0);
      }
      return $arrayDatos;
  }
  public function add_grid($AData)
  {
              
              $Id_CABMS=$AData->Id_CABMS;
              $Descripcion=$AData->Descripcion;
              $UnidadMedida=$AData->UnidadMedida;
              $RemFac=$AData->RemFac;
              $CostoPromedio=$AData->CostoPromedio;
              $Cantidad=$AData->Cantidad;
              $Session=$AData->Session;
              $IdUMedida=$AData->IdUMedida;
              $sql ="INSERT INTO sa_grid_otroscargos value('0','$Id_CABMS','$Descripcion','$UnidadMedida','$IdUMedida','$RemFac','$CostoPromedio','$Cantidad','$Session')";
              $objAddGrid = new poolConnection();
              $con=$objAddGrid ->Conexion();
              $objAddGrid ->BaseDatos($con);
              $R=$objAddGrid ->Query($con,$sql);
              $objAddGrid ->Cerrar($con,$R);
              return $sql;
  }
  public function grid($session)
  {
      $MostrarAceptar="No"; 
      $FliexGrid = "<center><table class=\"flexme1\">
                                            <tbody>";
         
        $objBuscarDetalles = new poolConnection();
        $con=$objBuscarDetalles->Conexion();
        $objBuscarDetalles->BaseDatos($con);
        $sql="SELECT * FROM sa_grid_otroscargos where Session='$session'";
        $RSet=$objBuscarDetalles->Query($con,$sql);
        $i=0;
        while ($row = mysqli_fetch_array($RSet))
            {
                $i++; 
                $MostrarAceptar="Si"; 
                $FliexGrid.="
                                  <tr>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageGArt$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageGArt$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageGArt$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_grid($row[Id]);\">&nbsp;
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Descripcion]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[UnidadMedida]</td>    
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Cantidad]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[RemFac]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[CostoPromedio]</td>
                                      
                                  </tr>
                              ";
            }
        $objBuscarDetalles->Cerrar($con,$RSet);
        if($MostrarAceptar=="Si")
        {
            $btnAceptar = "<img src=\"../../interfaz_modulos/botones/aceptar.jpg\" name=\"ImageAceptar\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageAceptar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAceptar','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"click_save();\"/>";
        } 
        $FliexGrid.="  </tbody>
                                 </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [    {display: 'Borrar', name : 'Borrar', width :150, sortable :false, align: 'center'},
                                                            {display: 'CABMS', name : 'CABMS', width :100, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name : 'Descripcion', width :450, sortable :false, align: 'center'},
                                                            {display: 'Unidad Medida', name : 'Unidad Medida', width :250, sortable :false, align: 'center'},
                                                            {display: 'Cantidad Entregada', name : 'Cantidad Entregada', width :150, sortable :false, align: 'center'},
                                                            {display: 'Remicion/Factura', name : 'Remicion/Factura', width :100, sortable :false, align: 'center'},
                                                            {display: 'Costo Promedio', name : 'Costo Promedio', width :80, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 950,
                                            height: 200
                                            }

                                            );</script>
                                            <br>
                                            <br>
                                            ";
      return $FliexGrid;
  }
  public function borrar_elemento($id)
  {
      $objBorrar = new poolConnection();
      $con=$objBorrar->Conexion();
      $objBorrar->BaseDatos($con);
      $sql="delete from sa_grid_otroscargos Where Id='$id'";
      $R=$objBorrar->Query($con,$sql);
      $objBorrar->Cerrar($con,$R);
      return $sql;
  }
  public function InsertMov($AData)
  {
      
               $Id_CABMS=$AData->Id_CABMS;
               $vDocumento=$AData->vDocumento;
               $eCantidad=$AData->eCantidad;
               $mCostoUnitario=$AData->mCostoUnitario;
               $eCantidadApartadaSalida=$AData->eCantidadApartadaSalida;
               $Id_TipoMovimiento=$AData->TipoMovimiento;
        $eExistenciaIniMovto=0;
        $mCostoPromedioIniMovto=0;
        $D=date(d);
        $M=date(m);
        $Y=date(Y);
      $dFechaMovRegistro = "$Y/$M/$D";
      $dFechaRegistro="$Y/$M/$D";
      $nFolio=0;
      #sValorP
      $sValorP=0;
      /*$objsValor = new poolConnection();
      $con=$objsValor->Conexion();
      $objsValor->BaseDatos();
      $SqlValor="Select";
      $RSet=$objsValor->Query($SqlValor);
      $sValorP= mysql_result($RSet,0);
      $objsValor->Cerrar($con);*/
      
      $Sql="insert into sa_movconsumo values(
               '0',
               '$Id_CABMS',
               '$sValorP',
               '$Id_TipoMovimiento',
               '$dFechaMovRegistro',
               '$nFolio',
               '0' ,    
               '$vDocumento',  
               '$eCantidad',
               '$mCostoUnitario',
               '$eExistenciaIniMovto',
               '$eCantidadApartadaSalida',
               '$dFechaRegistro',
               '$mCostoPromedioIniMovto')";
      $objInsertarMov =  new poolConnection();
      $con=$objInsertarMov->Conexion();
      $objInsertarMov->BaseDatos($con);
      $R=$objInsertarMov->Query($con,$Sql);
      $objInsertarMov->Cerrar($con,$con);
  }
  public function guardar($AData)
  {
      
      $Id_CABMS=$AData->Id_CABMS;
      $Id_UnidadMedida=$AData->Id_UnidadMedida;
      $RemFactura=$AData->RemFactura;
      $Cantidad=$AData->Cantidad;
      $CostoPromedio=$AData->CostoPromedio;
      //Acutliazamo unidad medida para cmabs
      $objUpdateCambs =  new poolConnection();
      $con=$objUpdateCambs->Conexion();
      $objUpdateCambs->BaseDatos();
      $sqlUpdateCAmbs = "update sa_cabms set Id_UMedida ='$Id_UnidadMedida' Where Id_CABMS='$Id_CABMS'";
      $R=$objUpdateCambs->Query($con,$sqlUpdateCAmbs);
      $objUpdateCambs->Cerrar($con,$R);
      
      //vars
      $eExistenciaIniMovto=0;
      $mCostoPromedioAnterior=0;
      $eCantidadExistenciaApartada=0;
      $MontoActual =$CostoPromedio*$Cantidad;
      $mCostoPromedioActual=0;
      $eCantidadExistenciaDisponible=0;
      $Id_Localizacion = 9980;
      //obj
      $objInsertarMov = new OtrosConceptos();
      
      //Determinamos si elregistro debe actualizarse
      $Accion ="Insertar";
      $objBuscar = new poolConnection();
      $con=$objBuscar->Conexion();
      $objBuscar->BaseDatos($con);
      $sql="SELECT * FROM sa_existenciasconsumible WHERE Id_CABMS = '$Id_CABMS'";
      $RSetB=$objBuscar->Query($sql);
      while($fila = mysqli_fetch_array($RSetB))
      {
           $Accion ="Actualizar";
           $eExistenciaIniMovto=$fila[eCantidadExistenciaDisponible];
           $mCostoPromedioAnterior=$fila[mCostoPromedioActual];
           
           $eCantidadExistenciaApartada=$fila[eCantidadExistenciaApartada];
           $mCostoPromedioActual=$fila[mCostoPromedioActual];
           $eCantidadExistenciaDisponible=$fila[eCantidadExistenciaDisponible];
      }
      $objBuscar->Cerrar($con,$RSetB);
      
       $infos->Id_CABMS=$Id_CABMS;
       $infos->vDocumento=$RemFactura;
       $infos->eCantidad=$Cantidad;
       $infos->mCostoUnitario=$CostoPromedio;
       $infos->eCantidadApartadaSalida=$eCantidadExistenciaDisponible;
       $infos->TipoMovimiento="1000000";
       $objInsertarMov->InsertMov($infos);
       $mCostoPromedioActual=($mCostoPromedioActual+$MontoActual)/($eCantidadExistenciaDisponible+$Cantidad);
      
      
      
      switch ($Accion)
      {
          
          case 'Insertar':
              
                          $d=date(d);
                          $m=date(m);
                          $y=date(Y);
                          $dFechaRegistro="$y/$m/$d";
                          $SqlInsertar = "INSERT into  sa_existenciasconsumible values(
                                               '0',
                                               '$Id_CABMS',
                                               '$Cantidad',
                                               '$eCantidadExistenciaApartada',
                                               '$mCostoPromedioActual',
                                               '$dFechaRegistro',
                                               '0000-00-00',
                                               '0')";
                          $objQuy  =  new poolConnection();
                          $con=$objQuy->Conexion();
                          $objQuy->BaseDatos($con);
                          $R=$objQuy->Query($con,$SqlInsertar);
                          $objQuy->Cerrar($con,$R);
                          
              break;
          
          case 'Actualizar':
                                $d=date(d);
                                $m=date(m);
                                $y=date(Y);
                                $dFechaModRegistro="$y/$m/$d";
                                $eCantidadExistenciaApartadaI=$eCantidadExistenciaApartada+$Cantidad;
                                $eCantidadExistenciaDisponibleI=$Cantidad+$eCantidadExistenciaDisponible;
                                $SqlUpdate="UPDATE sa_existenciasconsumible SET
                                            eCantidadExistenciaDisponible = '$eCantidadExistenciaDisponibleI',
                                            eCantidadExistenciaApartada = '$eCantidadExistenciaApartadaI',
                                            mCostoPromedioActual = '$mCostoPromedioActual',
                                            dFechaModRegistro = '$dFechaModRegistro'
                                            WHERE Id_CABMS = '$Id_CABMS'";
                                $objQuy  =  new poolConnection();
                                $con=$objQuy->Conexion();
                                $objQuy->BaseDatos($con);
                                $R=$objQuy->Query($con,$SqlUpdate);
                                $objQuy->Cerrar($con,$R);
              break;
      }
     
      //vars
      $ArtExiste = "Insertar";
      $eCantidadLocalizacion=0;
      //Local Art
      //Verficamos si  actualizamos o insetramos loccalArt
      $sqlBuscarArt = "SELECT * FROM sa_locarticulos  WHERE Id_Localizacion = '$Id_Localizacion' AND Id_CABMS = '$Id_CABMS' ";
      $objBArt = new poolConnection();
      $con=$objBArt->Conexion();
      $objBArt->BaseDatos($con);
      $RSetBArt=$objBArt->Query($con,$sqlBuscarArt);
      while($fila = mysql_fetch_array($RSetBArt))
      {
         $ArtExiste = "Actualizar";
         $eCantidadLocalizacion=$fila[eCantidadLocalizacion];
      }
      $objBArt->Cerrar($con,$RSetBArt);
      
      
      switch ($ArtExiste)
      {
          case 'Insertar':
                                $d=date(d);
                                $m=date(m);
                                $y=date(Y);
                                $dFechaModRegistro="$y/$m/$d";
                                $sqlArtInsert = "INSERT INTO sa_locarticulos values
                                                ('0',
                                                '$Id_Localizacion',
                                                '$Id_CABMS', 
                                                '$Cantidad',
                                                '$dFechaRegistro',
                                                '0000-00-00')";
                                $objQuyArt = new poolConnection();
                                $con=$objQuyArt->Conexion();
                                $objQuyArt->BaseDatos($con);
                                $R=$objQuyArt->Query($con,$sqlArtInsert);
                                $objQuyArt->Cerrar($con,$R);
                                
              break;
    
          case 'Actualizar':
                                $d=date(d);
                                $m=date(m);
                                $y=date(Y);
                                $dFechaModRegistro="$y/$m/$d";
                                $eCantidadLocalizacionI=eCantidadLocalizacion+$Cantidad;
                            $sqlArtUpdate = "UPDATE sa_locarticulos SET
                                          eCantidadLocalizacion = '$eCantidadLocalizacionI',
			                  dFechaModRegistro = '$dFechaModRegistro'
	                                  WHERE 
                                               Id_Localizacion = '$Id_Localizacion' AND Id_CABMS = '$Id_CABMS'";
                                $objQuyArt = new poolConnection();
                                $con=$objQuyArt->Conexion();
                                $objQuyArt->BaseDatos($con);
                                $R=$objQuyArt->Query($con,$sqlArtUpdate);
                                $objQuyArt->Cerrar($con,$R);
              break;
          
      }
      return "esto es el insert $SqlInsertar   $Accion  $sql" ;
  }
  public function   borramos_session($session)
  {
      $objBorrar = new poolConnection();
      $con=$objBorrar->Conexion();
      $objBorrar->BaseDatos($con);
      $sql="delete from sa_grid_otroscargos Where Session='$session'";
      $R=$objBorrar->Query($con,$sql);
      $objBorrar->Cerrar($con,$R);
      return $sql;
  }
}

?>
