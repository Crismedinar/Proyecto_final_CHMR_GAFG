<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$usuario=$_POST['usuario'];
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
            $sql = "select Usuario from Usuarios_68053_65866 where Usuario='".$usuario."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                if ($opcion=="1"){
                    $sql="update Usuarios_68053_65866 
                    set Usuario='".$nuevo."' where Usuario='".$usuario."'";
                }
                elseif ($opcion=="2"){
                    $sql="update Usuarios_68053_65866 
                    set Nombre_completo='".$nuevo."' where Usuario='".$usuario."'";      
                }
                elseif ($opcion=="3"){
                    $sql="update Usuarios_68053_65866 
                    set Domicilio='".$nuevo."' where Usuario='".$usuario."'";      
                }
                elseif ($opcion=="4"){
                    $sql="update Usuarios_68053_65866 
                    set Telefono='".$nuevo."' where Usuario='".$usuario."'";      
                }
                elseif ($opcion=="5"){
                    $sql="update Usuarios_68053_65866 
                    set Contacto_accidente='".$nuevo."' where Usuario='".$usuario."'";      
                }
                elseif ($opcion=="6"){
                    if ($nuevo=="1" or $nuevo=="2" or $nuevo=="3" or $nuevo=="4"){
                        $sql="update Usuarios_68053_65866 
                        set Nivel_usuario=".$nuevo." where Usuario='".$usuario."'";
                        $conn->query($sql);
                        echo "Usuario actualizado correctamente";
                    }
                    else{
                        echo "El nivel de usuario solo puede ser 1, 2, 3 o 4";
                    }
                }
                elseif ($opcion=="7"){
                    $sql="update Usuarios_68053_65866 
                    set Puesto='".$nuevo."' where Usuario='".$usuario."'";      
                }
                if ($opcion!="6"){
                    $conn->query($sql);
                    echo "Usuario actualizado correctamente";
                }
            }
            else{
                echo "Usuario no existente, favor de verificarlo";
            }
        }
        else{
            $sql = "select Usuario, Nivel_usuario from Usuarios_68053_65866 where Usuario='".$usuario."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    if($row[Nivel_usuario]!="1"){
                        if ($opcion=="1"){
                            $sql="update Usuarios_68053_65866 
                            set Usuario='".$nuevo."' where Usuario='".$usuario."'";
                        }
                        elseif ($opcion=="2"){
                            $sql="update Usuarios_68053_65866 
                            set Nombre_completo='".$nuevo."' where Usuario='".$usuario."'";      
                        }
                        elseif ($opcion=="3"){
                            $sql="update Usuarios_68053_65866 
                            set Domicilio='".$nuevo."' where Usuario='".$usuario."'";      
                        }
                        elseif ($opcion=="4"){
                            $sql="update Usuarios_68053_65866 
                            set Telefono='".$nuevo."' where Usuario='".$usuario."'";      
                        }
                        elseif ($opcion=="5"){
                            $sql="update Usuarios_68053_65866 
                            set Contacto_accidente='".$nuevo."' where Usuario='".$usuario."'";      
                        }
                        elseif ($opcion=="6"){
                            if ($nuevo=="2" or $nuevo=="3" or $nuevo=="4"){
                                $sql="update Usuarios_68053_65866 
                                set Nivel_usuario=".$nuevo." where Usuario='".$usuario."'";
                                $conn->query($sql);
                            echo "Usuario actualizado correctamente";
                            }
                            else{
                                echo "El nivel de usuario solo puede ser 2, 3 o 4";
                            }
                        }
                        elseif ($opcion=="7"){
                            $sql="update Usuarios_68053_65866 
                            set Puesto='".$nuevo."' where Usuario='".$usuario."'";      
                        }
                        if ($opcion!="6"){
                            $conn->query($sql);
                            echo "Usuario actualizado correctamente";
                        }
                    }
                    else{
                        echo "No puedes modificar un usuario de nivel 1";
                    }
                }
            }
            else{
                echo "Usuario no existente, favor de verificarlo";
            }            
        }
        $i=1;
    }
}
?>