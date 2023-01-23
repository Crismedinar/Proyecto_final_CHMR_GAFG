<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$nombre=$_POST['nombre'];
$nivel=$_POST['nivel'];

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
if($usuario=="" or $contrasena=="" or $nombre==""){
    echo "Favor de ingresar usuario, contrasena y nombre";
}
else{
    $sql = "select Usuario from Usuarios_68053_65866 where Usuario='".$usuario."'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo "Usuario ya existente, favor de ingresar otro";
    }
    else{
        $sql = "insert into Usuarios_68053_65866 (Usuario, Contrasena, Nombre_completo, 
        Nivel_usuario) values ('".$usuario."','".$contrasena."','".$nombre."',".$nivel.")";
        $conn->query($sql);
        echo "Usuario agregado correctamente";
    }
}      
?>