<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$nombre=$_POST['nombre'];

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select * from Pacientes_68053_65866 where Nombre='".$nombre."'";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo "Id: ".$row[Id];
        echo "<br>Nombre: ".$row[Nombre];
        echo "<br>Fecha de ingreso: ".$row[Fecha_ingreso];
        echo "<br>Padecimiento: ".$row[Padecimiento];
        echo "<br>Fecha de alta: ".$row[Fecha_alta];
        echo "<br>Usuario que lo dio de alta: ".$row[Usuario_alta];
        $sql2 = "select * from Monitoreo_68053_65866 where Paciente='".$nombre."'";
        $result2 = $conn->query($sql2);
        if($result2->num_rows>0){
            while($row2 = $result2->fetch_assoc()){
                echo "<br><br>Oxigenacion: ".$row2[Oxigenacion];
                echo "<br>Fecha: ".$row2[Fecha];
                echo "<br>Usuario que lo monitoreo: ".$row2[Usuario_monitoreo];
            }
        }
        else{
            echo "<br><br>Paciente sin registros";
        }
    }
}
else{
    echo "Usuario no existente, favor de verificarlo";
}

?>