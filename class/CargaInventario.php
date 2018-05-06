<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CargaInventario
 *
 * @author armand
 */
class CargaInventario {
    
    public function buscarArt($AData) 
    {

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
        $objBExistencias = new CargaInventario();
        $con=$objBuscar->Conexion();
        $objBuscar->BaseDatos();
        $sql="select vDescripcionCABMS,Id_CABMS  from sa_cabms  where $where order by vDescripcionCABMS";
        $RSet=$objBuscar->Query($sql);
        while ($row = mysql_fetch_array($RSet))
            {
                 $i++;
                 $info->Id_CABMS=$row[Id_CABMS];
                 $Arrays=$objBExistencias->buscar_existencia($info);
                 if(!empty($Arrays[1]))
                 {
                     
                 }
                 else{
                    $Arrays[1]=0; 
                 }
                 if(!empty($Arrays[2]))
                 {
                     
                 }
                 else{
                    $Arrays[2]=0; 
                 }
                 if($Arrays[3]==" ")
                 {
                 	$Arrays[3]="-membrete-";
                 }
                 else{
                 	
                 }
                $FliexGrid.="
                                  <tr>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageSelCambs2$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageSelCambs2$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageSelCambs2$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"acpetar_Art('$row[Id_CABMS]','$row[vDescripcionCABMS]',$Arrays[1],$Arrays[2],'$Arrays[3]');\">&nbsp;</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
                                      
                                  </tr>
                              ";
            }
         mysql_free_result($RSet);  
        $objBuscar->Cerrar($con);
        $FliexGrid.="  </tbody>
                                 </table><script>$('.flexme2').flexigrid({
                                            title: '',
                                            colModel : [    {display: 'Seleccion', name : 'Seleccion', width :150, sortable :false, align: 'center'},
                                                            {display: 'CAMBS', name : 'CAMBS', width :200, sortable :false, align: 'center'},
                                                            {display: 'Descripcion', name: 'Descripcion', width :470, sortable :false, align: 'center'},
                                                            
                                  
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order2},
                                                            {separator: true}
                                                        ],
                                            width: 820,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridBuscar\" value=\"Si\"></form>";
        
        return $FliexGrid;
    }
     public function buscarArt2($AData) 
    {

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
        $objBExistencias = new CargaInventario();
        $con=$objBuscar->Conexion();
        $objBuscar->BaseDatos();
        $sql="select  vDescripcionCABMS,Id_CABMS  from sa_cabms  where $where order by vDescripcionCABMS";
        $RSet=$objBuscar->Query($sql);
        while ($row = mysql_fetch_array($RSet))
            {
                 $i++;
                 
                 $info->Id_CABMS=$row[Id_CABMS];     
                 $Arrays=$objBExistencias->buscar_existencia($info);
                 if(!empty($Arrays[1]))
                 {
                     
                 }
                 else{
                    $Arrays[1]=0; 
                 }
                 if(!empty($Arrays[2]))
                 {
                     
                 }
                 else{
                    $Arrays[2]=0; 
                 }
                $FliexGrid.="
                                  <tr>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageSelC$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageSelC$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageSelC$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"acpetar_Art2('$row[Id_CABMS]','$row[vDescripcionCABMS]',$Arrays[1],$Arrays[2],'$Arrays[3]');$('#dialog2').dialog('close');\">&nbsp;</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
                                      
                                  </tr>
                              ";
            }
         mysql_free_result($RSet);  
        $objBuscar->Cerrar($con);
        $FliexGrid.="  </tbody>
                                 </table><script>$('.flexme2').flexigrid({
                                            title: '',
                                            colModel : [    {display: 'Seleccion', name : 'Seleccion', width :150, sortable :false, align: 'center'},
                                                            {display: 'CAMBS', name : 'CAMBS', width :200, sortable :false, align: 'center'},
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
   public function buscar_existencia($AData)
   {
            $Id_CABMS=$AData->Id_CABMS;
            
            $BuscarMembrete ="NO";
            $sql = "Select eCantidadExistenciaDisponible,mCostoPromedioActual from sa_existenciasconsumible where Id_CABMS='$Id_CABMS' ";
            $objIds = new poolConnection();
            $con=$objIds->Conexion();
            $objIds->BaseDatos();
            $Rset=$objIds->Query($sql);
            while($fila = mysql_fetch_array($Rset))
            {
                $ArrayData[1]=$fila[eCantidadExistenciaDisponible];
                $ArrayData[2]=$fila[mCostoPromedioActual];
                $BuscarMembrete ="YES";
            }
            //mysql_free_result($Rset);
            //$objIds->Cerrar($con);
            
            /*obtenemos membrete */
            if($BuscarMembrete=="YES")
            {
                $objMembrete = new poolConnection();
                $objMembrete->Conexion();
                $objMembrete->BaseDatos();
                $sqlMembrete = "SELECT vDocumento FROM sa_movconsumo where Id_CABMS='$Id_CABMS'";
                $RSetm=$objMembrete->Query($sqlMembrete);
                while($fila = mysql_fetch_array($RSetm))
                {
                    $Membrete = $fila[vDocumento];
                }
                $ArrayData[3]="$Membrete";
            } 
            else{
               $ArrayData[3]=" "; 
            }
            return $ArrayData;
   }
   public function art_apartados($AData)
   {
       
       $Id_CABMS=$AData->Id_CABMS;
       $con=$objArtApartados = new poolConnection();
       $objArtApartados->Conexion();
       $objArtApartados->BaseDatos();
       $sql="SELECT Count(Id_Partida) As ArtAparatados FROM sa_detallepedido WHERE  Id_CABMS='$Id_CABMS'";
       $RSet=$objArtApartados->Query($sql);
       while($row = mysql_fetch_array($RSet))
       {
             $Apartados = $row[ArtAparatados];
       }
       //mysql_free_result($RSet);
       //$objArtApartados->Cerrar($con);
       return $Apartados;
   }  
   public function Add_Grid($AData)
   {
       
            $Id_CveARTCABMS=$AData->Id_CveARTCABMS;
            $Id_CveInternaAC=$AData->Id_CveInternaAC;
            $IdCABMS=$AData->IdCABMS;
            $VDescripcion=$AData->VDescripcion;
            $ArtApartado=$AData->ArtApartado;
            $ArtDisponibles=$AData->ArtDisponibles;
            $CostoPromedio=$AData->CostoPromedio;
            $NoMarbete=$AData->NoMarbete;
            $Session=$AData->Session;
            
          $objInsertarGrid =  new poolConnection();
          $con=$objInsertarGrid->Conexion();
          $objInsertarGrid->BaseDatos();
          $sqlInsret="insert into sa_grid values('0','$Id_CveARTCABMS','$Id_CveInternaAC','$IdCABMS','$VDescripcion','$ArtApartado','$ArtDisponibles','$CostoPromedio','$NoMarbete','$Session')";
          $objInsertarGrid->Query($sqlInsret);
          $objInsertarGrid->Cerrar($con);
       
   }
   public function Grid($Session)
   {
       $FliexGrid = "<center><table class=\"flexme1\">
                                            <tbody>";
                $objBuscar = new poolConnection();
                $con=$objBuscar->Conexion();
                $objBuscar->BaseDatos();
                $sql="Select Id,Id_CveARTCABMS,Id_CveInternaAC,IdCABMS,VDescripcion,ArtApartado,ArtDisponibles,CostoPromedio,NoMarbete from sa_grid Where Session='$Session'";
                $RSet=$objBuscar->Query($sql);
                while($fila=mysql_fetch_array($RSet))
                {
                    $i++;
                    $FliexGrid.="
                                      <tr>
                                          <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_grid_alert('$fila[IdCABMS]',$fila[Id]);\">&nbsp;
                                          <input type='hidden' id='IdCABMS' name='IdCABMS[$i]' value='$fila[IdCABMS]'>
                                          </td>
                                          <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[IdCABMS]<input type='hidden' name='txtCABMS[$i]' id='txtCABMS' value='$fila[IdCABMS]'/> </td>
                                          <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[VDescripcion]<input type='hidden' name='txtVDescripcion[$i]' id='txtVDescripcion' value='$fila[VDescripcion]'/></td>
                                          <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ArtApartado]<input type='hidden' name='txtArtApartado[$i]' id='txtArtApartado' value='$fila[ArtApartado]'/></td>
                                          <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ArtDisponibles]<input type='hidden' name='txtArtDisponibles[$i]' id='txtArtDisponibles' value='$fila[ArtDisponibles]'/></td>
                                          <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[CostoPromedio]<input type='hidden' name='txtCostoPromedio[$i]' id='txtCostoPromedio' value='$fila[CostoPromedio]'/></td>
                                          <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[NoMarbete]<input type='hidden' name='txtNoMarbete[$i]' id='txtNoMarbete' value='$fila[NoMarbete]'/></td>
                                      </tr>
                                  ";
                }
                mysql_free_result($RSet);
                $objBuscar->Cerrar($con);
                $FliexGrid.="       </tbody>
                                                              </table><script>$('.flexme1').flexigrid({
                                  title: '',
                                  colModel : [
                                                  {display: 'Accion', name : 'Accion', width :120, sortable :false, align: 'center'},
                                                  {display: 'CABMS', name : 'CveARTCABMS', width :150, sortable :false, align: 'center'},
                                                  {display: 'Descripcion', name : 'Descripcion', width :370, sortable :false, align: 'center'},
                                                  {display: 'Art. Apartados', name : 'Art. Apartados', width :100, sortable :false, align: 'center'},
                                                  {display: 'Art. Disponibles', name: 'Art. Disponibles', width :120, sortable :false, align: 'center'},
                                                  {display: 'Costo Promedio', name : 'Costo Promedio', width :100, sortable :false, align: 'center'},
                                                  {display: 'Marbete', name : 'Marbete', width :100, sortable :false, align: 'center'},

                                              ],
                                  buttons : [
                                                  {name: '',onpress:saver_Order},
                                                  {separator: true}
                                              ],
                                  width: 950,
                                  height: 200
                                  }

                                  );</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\">";
                return $FliexGrid;
        
   }
   function borrar_elemento_grid($id)
   {
      $objBorrar = new poolConnection();
      $con=$objBorrar->Conexion();
      $objBorrar->BaseDatos();
      $sql="Delete from sa_grid where Id='$id'";
      $objBorrar->Query($sql);
      $objBorrar->Cerrar($con);
   }
  function Agregar_existencia($AData)
  {
      
      $Id_CABMS=$AData->Id_CABMS;
      $eCantidadExistenciaDisponible=$AData->eCantidadExistenciaDisponible;
      $eCantidadExistenciaApartada=$AData->eCantidadExistenciaApartada;
      $mCostoPromedioActual=$AData->mCostoPromedioActual;
      $vMenbrete =$AData->bMembrete;
      $session = $AData->Session;
      //Verificamos si existe producto y lo insertamos o lo actualizamos
      $Accion ="Insertar";
      $objVerficar =  new poolConnection();
      $con=$objVerficar->Conexion();
      $objVerficar->BaseDatos();
      $sqlv="Select Id from sa_existenciasconsumible where Id_CABMS='$Id_CABMS'";
      $RSet=$objVerficar->Query($sqlv);
      while($fila = mysql_fetch_array($RSet))
      {
         $Accion ="Actualizar"; 
      }
      mysql_free_result($RSet);
      $objVerficar->Cerrar($con);
      
      
      $D=date(d);
      $M=date(m);
      $Y=date(Y);
      $Fecha="$Y/$M/$D";
      $dFechaRegistro=$Fecha;
      switch ($Accion) {
                        case 'Actualizar':
                                         
                                         //Buscamos Registro  a actualizar 
                                         $sqlIDs = "Select Id from sa_existenciasconsumible where Id_CABMS='$Id_CABMS'";
                                         $objIds = new poolConnection();
                                         $con=$objIds->Conexion();
                                         $objIds->BaseDatos();
                                         $Rset=$objIds->Query($sqlIDs);
                                         while($fila = mysql_fetch_array($Rset))
                                         {
                                            
                                             $ids = $fila[Id];
                                         }
                                         //mysql_free_result($Rset);
                                         //$objIds->Cerrar($con);
                                         //Preparamos las consulta a actualizar
                                         $Y=date(Y);
                                         $M=date(m);
                                         $D=date(d);
                                         $Fecha="$Y/$M/$D";
                                         $sqlupdate="UPDATE sa_existenciasconsumible SET   
                                             eCantidadExistenciaDisponible = '$eCantidadExistenciaDisponible',
                                             mCostoPromedioActual = '$mCostoPromedioActual',
                                             dFechaModRegistro = '$Fecha'
                                             WHERE  Id_CABMS = '$Id_CABMS' and Id='$ids'";
                                         
                                         $objActualizar = new poolConnection();
                                         $con=$objActualizar->Conexion();
                                         $objActualizar->BaseDatos();
                                         $objActualizar->Query($sqlupdate);
                                         $objActualizar->Cerrar($con);
                                         
                                         //Insertamos en Mov
                                        $Datos->Id_CABMS=$Id_CABMS;
                                        $Datos->vDocumento=$vMenbrete;
                                        $Datos->eCantidad=$eCantidadExistenciaDisponible;
                                        $Datos->mCostoUnitario=$mCostoPromedioActual;
                                        $Datos->eCantidadApartadaSalida=$eCantidadExistenciaApartada;
                                        $objMov = new CargaInventario();
                                        $objMov->InsertMov($Datos);
                                        
                                     

                            break;
                        case  'Insertar':
                                         
                                       $sql="Insert Into sa_existenciasconsumible values (
                                                '0',
                                                '$Id_CABMS',
                                                '$eCantidadExistenciaDisponible',
                                                '$eCantidadExistenciaApartada',
                                                '$mCostoPromedioActual',
                                                '$dFechaRegistro',
                                                '0000-00-00',
                                                '0')";  
                                       $objInsertar = new poolConnection();
                                       $con=$objInsertar->Conexion();
                                       $objInsertar->BaseDatos();
                                       $objInsertar->Query($sql);
                                       $objInsertar->Cerrar($con);
                                       
                                       /*insertamos movimiento */
                                       $Datos->Id_CABMS=$Id_CABMS;
                                       $Datos->vDocumento=$vMenbrete;
                                       $Datos->eCantidad=$eCantidadExistenciaDisponible;
                                       $Datos->mCostoUnitario=$mCostoPromedioActual;
                                       $Datos->eCantidadApartadaSalida=$eCantidadExistenciaApartada;
                                       $objMov = new CargaInventario();
                                       $objMov->InsertMov($Datos);
                                       
                                       
                            break;
                        

                    }
                    //Borramos Grid
                    $sqlDelete = "Delete From sa_grid Where Session='$session'";
                    $objBorrar = new poolConnection();
                    $con=$objBorrar->Conexion();
                    $objBorrar->BaseDatos();
                    $objBorrar->Query($sqlDelete);
                    $objBorrar->Cerrar($con);
        return $Accion;            
  }
  public function InsertMov($AData)
  {
      
               $Id_CABMS=$AData->Id_CABMS;
               $vDocumento=$AData->vDocumento;
               $eCantidad=$AData->eCantidad;
               $mCostoUnitario=$AData->mCostoUnitario;
               $eCantidadApartadaSalida=$AData->eCantidadApartadaSalida;
               
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
      //Tipo movimiento
      $Id_TipoMovimiento='0103';
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
      $objInsertarMov->BaseDatos();
      $objInsertarMov->Query($Sql);
      $objInsertarMov->Cerrar($con);
  }
  public function frm_agregar($a)
  {
      $frm="<form  id='frmCargaInventario' name='frmCargaInventario' action='' method='post'>
                       <br>
                        <fieldset>
                             <legend class=\"txt_titulos_bold\">Clave Cabms</legend>
                                <table>
                                       <tr>
                                           <td><input type='text' id='txtCABMS' name='txtCABMS' class=\"boxes_form200px\"  readonly/>&nbsp;&nbsp;&nbsp;<input type='text' id='txtDescripcion' name='txtDescripcion' class=\"boxes_form1\" readonly/></td>
                                           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                           <td><img src=\"../../interfaz_modulos/botones/examinar.jpg\" name=\"ImageBfrmagregar\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBfrmagregar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBfrmagregar','','../../interfaz_modulos/botones/examinar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"on();\"/></td>
                                       </tr>
                                </table>
                                 
                        </fieldset> 
                        <fieldset>
                             <legend class=\"txt_titulos_bold\">Existencias</legend>
                             <table>
                                   <tr>
                                       <td>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <span class=\"txt_titulos_bold\"> Articulos Apartados:</span>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txtArtApartados' id='txtArtApartados' class=\"boxes_form150px validate[required,minSize[1]]\"/> 
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                          <span class=\"txt_titulos_bold\">Costo Promedio:</span>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txtCostoPromedio' id='txtCostoPromedio' class=\"boxes_form150px validate[required,minSize[1]]\"/>
                                                        </td>
                                                    </tr>
                                              </table>

                                       </td>
                                       <td>
                                             <table>
                                                    <tr>
                                                        <td>
                                                          <span class=\"txt_titulos_bold\">Articulos Disponible:</span>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txtArtDisponible' id='txtArtDisponible' class=\"boxes_form150px validate[required,minSize[1]]\"/>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                          <span class=\"txt_titulos_bold\">No. Marbete:</span>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txtNoMarbete' id='txtNoMarbete' class=\"boxes_form150px validate[required,minSize[1]]\"/>
                                                        </td>
                                                    </tr>
                                              </table>
                                       </td>
                                   </tr>
                               </table>
                               <br>
                               <br>
                               <div id='DivBtnAgrega' style='display:none'><img src=\"../../interfaz_modulos/botones/agregar.jpg\" name=\"ImageAdd\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageAdd\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAdd','','../../interfaz_modulos/botones/agregar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"agragar_grid();\"/></div>
                             <br>
                        </fieldset>
                        <br><br><div id='GridInventario'></div>
                            <br>
                            <div id='DivBtnAceptar' style='display:none'></div>
                            <br></center></form>
                           
                        ";
      return $frm;
  }
  public function frm_consultar()
  {
      $frm="<form  id='frmCargaInventario' name='frmCargaInventario' action='' method='post'>
                       <br>
                        <fieldset>
                             <legend class=\"txt_titulos_bold\">Consultar(Clave Cabms)</legend>
                                <table>
                                       <tr>
                                           <td><input type='text' id='txtCABMS' name='txtCABMS' class=\"boxes_form200px\"  readonly/>&nbsp;&nbsp;&nbsp;<input type='text' id='txtDescripcion' name='txtDescripcion' class=\"boxes_form1\" readonly/></td>
                                           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                           <td><img src=\"../../interfaz_modulos/botones/examinar.jpg\" name=\"ImageBfrmconsultar\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBfrmconsultar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBfrmconsultar','','../../interfaz_modulos/botones/examinar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"on2();\"/></td>
                                       </tr>
                                </table> 
                        </fieldset> 
                        <fieldset>
                             <legend class=\"txt_titulos_bold\">Existencias</legend>
                             <table>
                                   <tr>
                                       <td>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <span class=\"txt_titulos_bold\"> Articulos Apartados:</span>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txtArtApartados' id='txtArtApartados' class=\"boxes_form150px\" readonly/> 
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                          <span class=\"txt_titulos_bold\">Costo Promedio:</span>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txtCostoPromedio' id='txtCostoPromedio' class=\"boxes_form150px \" readonly/>
                                                        </td>
                                                    </tr>
                                              </table>

                                       </td>
                                       <td>
                                             <table>
                                                    <tr>
                                                        <td>
                                                          <span class=\"txt_titulos_bold\">Articulos Disponible:</span>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txtArtDisponible' id='txtArtDisponible' class=\"boxes_form150px\" readonly/>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                          <span class=\"txt_titulos_bold\">No. Marbete:</span>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txtNoMarbete' id='txtNoMarbete' class=\"boxes_form150px\" readonly/>
                                                        </td>
                                                    </tr>
                                              </table>
                                       </td>
                                   </tr>
                               </table>
                               <br>
                               <br>
                               
                        </fieldset>
                        <center><div id=\"DivLoad3\" style=\"display:none\"><img src=\"../../../interfaz/cargando.png\"/></div></center>
                        <br><br><div id='GridDetalle'></div>
                           </center></form>
                           
                        ";
      return $frm;
  }
  public function detalles_movimeintos($AData)
  {
      $FliexGrid = "<center><table class=\"flexme1\">
                                            <tbody>";
         $Id_CABMS=$AData->Id_CABMS;
        $objBuscarDetalles = new poolConnection();
        $objtipoMovimiento = new CargaInventario();
        $con=$objBuscarDetalles->Conexion();
        $objBuscarDetalles->BaseDatos();
        $sql="SELECT 
            Id_CABMS,
            Id_Unidad,
            Id_TipoMovimiento,
            dFechaMovRegistro,
            nFolio,
            vNumPedido,
            vDocumento,
            eCantidad,
            mCostoUnitario,
            eExistenciaIniMovto,
            eCantidadApartadaSalida,
            mCostoPromedioIniMovto
            FROM sa_movconsumo Where Id_CABMS='$Id_CABMS'";
        $RSet=$objBuscarDetalles->Query($sql);
        while ($row = mysql_fetch_array($RSet))
            {
                 $mCostoUnitario=number_format($row[mCostoUnitario], 2, '.',',');
                 $mCostoPromedioIniMovto=number_format($row[mCostoPromedioIniMovto], 2, '.',',');
                 $TM=$objtipoMovimiento->Movimiento($row[Id_TipoMovimiento]);
                $FliexGrid.="
                                  <tr>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_Unidad]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$TM</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[dFechaMovRegistro]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[nFolio]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vNumPedido]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDocumento]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[eCantidad]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$mCostoUnitario</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[eExistenciaIniMovto]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[eCantidadApartadaSalida]</td>
                                      <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$mCostoPromedioIniMovto</td>
                                      
                                  </tr>
                              ";
            }
         mysql_free_result($RSet);  
        $objBuscarDetalles->Cerrar($con);
        $FliexGrid.="  </tbody>
                                 </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [    {display: 'CABMS', name : 'CABMS', width :100, sortable :false, align: 'center'},
                                                            {display: 'Unidad', name : 'Unidad', width :150, sortable :false, align: 'center'},
                                                            {display: 'Tipo Mov.', name : 'Tipo Mov.', width :150, sortable :false, align: 'center'},
                                                            {display: 'F. Registro', name : 'F. Registro', width :100, sortable :false, align: 'center'},
                                                            {display: 'Folio', name : 'Folio', width :80, sortable :false, align: 'center'},
                                                            {display: 'Num. Pedido', name : 'Num. Pedido', width :100, sortable :false, align: 'center'},
                                                            {display: 'Documento', name : 'Documento', width :100, sortable :false, align: 'center'},
                                                            {display: 'Cantidad', name : 'Cantidad', width :80, sortable :false, align: 'center'},
                                                            {display: 'Costo Unitario', name : 'Costo Unitario', width :80, sortable :false, align: 'center'},
                                                            {display: 'Existencia Inical', name : 'Existencia Inical', width :80, sortable :false, align: 'center'},
                                                            {display: 'Cantidad Apartada', name : 'Cantidad Apartada', width :80, sortable :false, align: 'center'},
                                                            {display: 'Costo Promedio', name : 'Costo Promedio', width :80, sortable :false, align: 'center'},
                                                            
                                                            
                                  
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order3},
                                                            {separator: true}
                                                        ],
                                            width: 950,
                                            height: 200
                                            }

                                            );</script>";
        
        return $FliexGrid;
  }
  public function  Movimiento($id)
  {
      $objTipoMovimiento = new poolConnection();
      $objTipoMovimiento->BaseDatos();
      $sql="SELECT vDescripcion FROM sa_tipomovimiento Where Id_TipoMovimiento='$id'";
      $Rset=$objTipoMovimiento->Query($sql);
      return mysql_result($Rset, 0);
      //return $sql;
      
  }
  public function limpiar($session)
  {
		  	$objBorrar = new poolConnection();
		  	$con=$objBorrar->Conexion();
		  	$objBorrar->BaseDatos();
		  	$sql="Delete from sa_grid where Session='$session'";
		  	$objBorrar->Query($sql);
		  	$objBorrar->Cerrar($con);
  }
 
}

?>
