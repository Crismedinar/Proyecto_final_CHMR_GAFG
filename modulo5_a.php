<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$nombre=$_POST['nombre'];
$padecimiento=$_POST['padecimiento'];

date_default_timezone_set("America/Mexico_City");
$fecha=date("Y:m:d:H:i:s");

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
if($nombre=="" or $padecimiento==""){
    echo "Favor de ingresar nombre y padecimiento";
}
else{
    $sql = "select Nombre, Fecha_alta from Pacientes_68053_65866 where Nombre='".$nombre."'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            if ($row[Fecha_alta]!=NULL){
                $sql="update Pacientes_68053_65866 set Fecha_ingreso='".$fecha."', 
                Padecimiento='".$padecimiento."', Fecha_alta=NULL, 
                Usuario_alta=NULL where Nombre='".$nombre."'";
                $conn->query($sql);
                echo "Paciente ingresado correctamente";
            }
            else{
                echo "El paciente no puede ser ingresado ya que aun no ha sido de alta";
            }
        }
    }
    else{
        $sql = "insert into Pacientes_68053_65866 (Nombre, Padecimiento) 
        values ('".$nombre."','".$padecimiento."')";
        $conn->query($sql);
        echo "Paciente ingresado correctamente";
    }
}        
?>