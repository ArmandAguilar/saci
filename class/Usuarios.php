<?php
/**
 * Description of Usuarios
 *
 * @author armand
 */
class Usuarios extends poolConnection{
    
    public function add_usuario($AData)
    {
        
        
        $usuario=$AData->Usuario;
        $nombre=$AData->Nombres;
        $pass=$AData->Password;
        $idempleado=$AData->IdEmpleado;
        $Squema=$AData->Squema;
        /* obtenemos el ultimo insert */
        $objID= new poolConnection();
        $con=$objID->Conexion();
        $objID->BaseDatos($con);
        $sql="SELECT AUTO_INCREMENT As Id FROM information_schema.tables WHERE table_schema = '$Squema' AND table_name ='sa_usuarios'";
        $RSet=$objID->Query($con,$sql);
        while($filaId = mysqli_fetch_array($RSet))
           {
              $IDFile = $filaId[Id];   
          }
        $objID->Cerrar($con,$RSet);
        $password=md5($pass);
        
        $sql="insert into sa_usuarios values('0','$idempleado','$usuario','$nombre','$password','NO')";
        $obj = new poolConnection();
        $con=$obj->Conexion();
        $obj->BaseDatos($con);
        $R=$obj->Query($con,$sql);
        $obj->Cerrar($con,$R);
        
        /*insertamos los menus */
        $sqlcatalogos="insert into sa_menu_catalogos values('0','$IDFile','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO','NO')";
        $sqlprocesos="insert into sa_menu_procesos values('0','$IDFile','NO','NO','NO','NO','NO','NO')";
        $sqlreportes="insert into sa_menu_reportes values('0','$IDFile','NO','NO','NO','NO')";
        
        $obj1 = new poolConnection();
        $con1=$obj1->Conexion();
        $obj1->BaseDatos($con1);
        $R=$obj1->Query($con1,$sqlcatalogos);
        $obj1->Cerrar($con1,$R);
        
        $obj2 = new poolConnection();
        $con2=$obj1->Conexion();
        $obj2->BaseDatos($con2);
        $R=$obj2->Query($con2,$sqlprocesos);
        $obj2->Cerrar($con2,$R);
        
        $obj3 = new poolConnection();
        $con3=$obj1->Conexion();
        $obj3->BaseDatos($con3);
        $R=$obj3->Query($con3,$sqlreportes);
        $obj3->Cerrar($con3,$R);

        return $sql;
    }
    
    public function edit_usuario($AData)
    {
        $id=$AData->id;
        $usuario=$AData->usuario;
        $nombre=$AData->nomnre;
        if(!empty($pass))
        {
          $pass=$AData->password;
          $password=md5($pass);  
          $Campo = "Password='$password'";
        }
        $sql="update sa_usuarios set Usuario='$usuario',Nombre='$nombre' $Campo where Id='$id'";
        $obj = new poolConnection();
        $con=$obj->Conexion();
        $obj->BaseDatos($con);
        $R=$obj->Query($con,$sql);
        $obj->Cerrar($con,$R);
        
    }
    public function onoff_usuario()
    {
        $id=$AData->id;
        $activo=$AData->activo;
        if($activo=='YES')
        {
           $newstatus = "NO"; 
        }
       else{
             if($activo=="NO")
             {
               $newstatus = "YES";  
             }
       }
        $sql="update sa_usuarios set Activo='$newstatus' where Id='$id'";
        $obj = new poolConnection();
        $con=$obj->Conexion();
        $obj->BaseDatos($con);
        $R=$obj->Query($con,$sql);
        $obj->Cerrar($con,$R);
    }
    public function delete_usuario($AData)
    {
        $id=$AData->id;
        $sql="delete from sa_usuarios  where Id='$id'";
        $obj = new poolConnection();
        $con=$obj->Conexion();
        $obj->BaseDatos($con);
        $R=$obj->Query($con,$sql);
        $obj->Cerrar($con,$R);
    }
}

?>
