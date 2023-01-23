<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

date_default_timezone_set("America/Mexico_City");
$fecha=date("Y:m:d:H:i:s");

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select Contrasena, Nivel_usuario from Usuarios_68053_65866 where Usuario='".$usuario."'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        if($row[Contrasena]==$contrasena){
            if ($row[Nivel_usuario]=="1"){
                header("Location: http://localhost/Proyecto_final_CHMR_GAFG/index_1.html");                
            }
            elseif ($row[Nivel_usuario]=="2"){
                header("Location: http://localhost/Proyecto_final_CHMR_GAFG/index_2.html");
            }
            elseif ($row[Nivel_usuario]=="3"){
                header("Location: http://localhost/Proyecto_final_CHMR_GAFG/index_3.html");
            }
            else{
                header("Location: http://localhost/Proyecto_final_CHMR_GAFG/index_4.html");
            }
            $sql="update Usuarios_68053_65866 set Ultima_entrada='".$fecha."' where Usuario='".$usuario."'";
            $conn->query($sql);
        }
        else{
            echo "Contraseña incorrecta";
        }
    }
}
else{
    echo "Usuario no valido, verifique sus credenciales<br>";
}
$conn->close();
?>