<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$descripcion=$_POST['descripcion'];
$opcion=$_POST['opcion'];
$nuevo=$_POST['nuevo'];
$i=0;

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select Nivel_usuario from Usuarios_68053_65866 order by Ultima_entrada desc";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc() and $i==0){
        if($row[Nivel_usuario]=="1"){
            $sql = "select Descripcion, Tipo from Control_68053_65866 where Descripcion='".$descripcion."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){   
                if ($opcion=="1"){
                    $sql="update Control_68053_65866 set Descripcion='".$nuevo."' where 
                    Descripcion='".$descripcion."'";      
                }
                elseif ($opcion=="2"){
                    $sql="update Control_68053_65866 set Ubicacion='".$nuevo."' where 
                    Descripcion='".$descripcion."'";      
                }
                elseif ($opcion=="3"){
                    while($row = $result->fetch_assoc()){
                        if(($row[Tipo]=="Salida" and ($nuevo=="Encendido" or $nuevo=="Apagado")) or ($row[Tipo]=="PWM")){
                            $sql="update Control_68053_65866 set Estado='".$nuevo."' where 
                            Descripcion='".$descripcion."'";
                            $conn->query($sql);
                            echo "Actualizado correctamente";
                        }
                        else{
                            echo "Error, verifica los datos";
                        }
                    }             
                }  
                if ($opcion!="3"){
                    $conn->query($sql);
                    echo "Actualizado correctamente";
                }
            }
            else{
                echo $descripcion." no existe, favor de verificarlo";
            }
        }
        else{
            $sql = "select Descripcion, Tipo from Control_68053_65866 where Descripcion='".$descripcion."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                if ($opcion=="3"){
                    while($row = $result->fetch_assoc()){
                        if(($row[Tipo]=="Salida" and ($nuevo=="Encendido" or $nuevo=="Apagado")) or $row[Tipo]=="PWM"){
                            $sql="update Control_68053_65866 set Estado='".$nuevo."' where 
                            Descripcion='".$descripcion."'";
                            $conn->query($sql);
                            echo "Actualizado correctamente";
                        }
                        else{
                            echo "Verifica los datos";
                        }
                    }             
                }
                else {
                    echo"No tienes el permiso de modificarlo";
                }
            }
        }
        $i=1;
    }
}
?>