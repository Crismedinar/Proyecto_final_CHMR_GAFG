<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$nueva=$_POST['nueva'];
$verificar=$_POST['verificar'];

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select Contrasena, Nivel_usuario from Usuarios_68053_65866 where Usuario='".$usuario."'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        if($row[Nivel_usuario]!="1"){
            if($row[Contrasena]==$contrasena){
                if ($nueva!=""){
                    if($nueva==$verificar){
                        $sql = "update Usuarios_68053_65866 set Contrasena='"
                        .$nueva."' where Usuario='".$usuario."'";
                        $conn->query($sql);
                        echo "Contraseña actualizada correctamente";
                    }
                    else{
                        echo "La contraseña nueva no coincide con la verificacion";
                    }
                }
                else{
                    echo "Ingresa una cotrasena nueva";
                }
            }
            else{
                echo "La contraseña ingresada no es correcta";
            }
        }
        else{
            echo "No puedes cambiar la contraseña de un usuario nivel 1";
        }
    }
}
else{
    echo "Usuario no existente, favor de verificarlo";
}
?>