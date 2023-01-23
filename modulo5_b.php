<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$nombre=$_POST['nombre'];
$i=0;

date_default_timezone_set("America/Mexico_City");
$fecha=date("Y:m:d:H:i:s");

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select Usuario from Usuarios_68053_65866 order by Ultima_entrada desc";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc() and $i==0){
        $sql2 = "select Fecha_ingreso from Pacientes_68053_65866 where Nombre='".$nombre."'";
        $result2 = $conn->query($sql2);
        if($result2->num_rows>0){
            $sql="update Pacientes_68053_65866 set Fecha_alta='".$fecha."', 
            Usuario_alta='".$row[Usuario]."' where Nombre='".$nombre."'";
            echo "Paciente dado de alta correctamente";
            $conn->query($sql);
        }
        else{
            echo "Paciente no existente, favor de verificarlo";
        }
        $i=1;
    }
}
?>