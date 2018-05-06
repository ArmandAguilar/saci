<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
 include("../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/CargaInventario.php");
    
     switch ($_GET[o])
          {
               case '1':
                           $info->Patron=$_POST[txtPatron];
                           $info->Clave=$_POST[Clave];
                           $info->Descripcion=$_POST[Descripcion];
                           $objBuscador = new CargaInventario();
                           $frm = $objBuscador ->buscarArt($info);
                           echo $frm;
               break;
           
              case '2':
                  
                       
                       $info->Id_CABMS=$_POST[Id_CABMS];
                       $objArtAparaatdos =  new CargaInventario();
                      $frm =  $objArtAparaatdos->art_apartados($info);
                       echo $frm;
                  break;
              case '3':
                        $info->Id_CveARTCABMS=$_POST[Id_CveARTCABMS];
                        $info->Id_CveInternaAC=$_POST[Id_CveInternaAC];
                        $info->IdCABMS=$_POST[Id_CABMS];
                        $info->VDescripcion=$_POST[vDescripcion];
                        $info->ArtApartado=$_POST[ArtApartado];
                        $info->ArtDisponibles=$_POST[ArtDisponibles];
                        $info->CostoPromedio=$_POST[CostoPromedio];
                        $info->NoMarbete=$_POST[NoMarbete];
                        $info->Session=$_POST[Session];
                        
                        $objGridAdd = new CargaInventario();
                        $objGridAdd->Add_Grid($info);
                  break;
              case '4':
                         $objGridView = new CargaInventario();
                         $frm =$objGridView->Grid($_POST[session]);
                         echo $frm;
                  break;
              case '5':
                        $objBorrarGrid = new CargaInventario();
                        $objBorrarGrid->borrar_elemento_grid($_POST[id]);
                  break;
              case '6':
                       $a = session_id();
                        $objFrm =  new CargaInventario();
                        $frm = $objFrm->frm_agregar($a);
                        echo $frm;
                  break;
               case '7':
                       $a = session_id();
                        $objFrm =  new CargaInventario();
                        $frm = $objFrm->frm_consultar();
                        echo $frm;
                  break;
              case '8':
                           $info->Patron=$_POST[txtPatron];
                           $info->Clave=$_POST[Clave];
                           $info->Descripcion=$_POST[Descripcion];
                           $objBuscador = new CargaInventario();
                           $frm = $objBuscador ->buscarArt2($info);
                           echo $frm;
                  break;
              case '9':
                           $objGrid = new CargaInventario();
                           $info->Id_CABMS=$_POST[Id_CABMS];
                           $frm=$objGrid->detalles_movimeintos($info);
                           echo $frm;
                  break;
              case '10':
              				$objLimiar = new CargaInventario();
              				$objLimiar->limpiar($_POST[id]);
              	break;
                          
          }                
?>
