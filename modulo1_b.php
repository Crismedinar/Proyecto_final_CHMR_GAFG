<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$usuario=$_POST['usuario'];
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
                $sql = "delete from Usuarios_68053_65866 where Usuario='".$usuario."'";
                $conn->query($sql);
                echo "Usuario eliminado correctamente";
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
                        $sql = "delete from Usuarios_68053_65866 where Usuario='".$usuario."'";
                        $conn->query($sql);
                        echo "Usuario eliminado correctamente";
                    }
                    else{
                        echo "No puedes eliminar un usuario de nivel 1";
                    }
                }
            }
        }
        $i=1;
    }
}
?>