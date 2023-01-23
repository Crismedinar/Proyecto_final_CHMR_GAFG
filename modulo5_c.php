<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$nombre=$_POST['nombre'];
$i=0;

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select Usuario from Usuarios_68053_65866 order by Ultima_entrada desc";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc() and $i==0){
        $sql2 = "select Fecha_alta from Pacientes_68053_65866 where Nombre='".$nombre."'";
        $result2 = $conn->query($sql2);
        if($result2->num_rows>0){
            while($row2 = $result2->fetch_assoc()){
                if ($row2[Fecha_alta]==NULL){
                    $a = exec("sudo python3 /var/www/html/Proyecto_final_CHMR_GAFG/sensor.py");
                    $sql = "update Monitoreo_68053_65866 set Paciente='".$nombre."', 
                    Usuario_monitoreo='".$row[Usuario]."' where Numero_monitoreo=
                    (select max(Numero_monitoreo) from Monitoreo_68053_65866)";
                    $conn->query($sql);
                    echo "Monitoreo registrado";
                }
                else{
                    echo "Paciente ya dado de alta";
                }
            }
        }
        else{
            echo "Paciente no registrado";
        }
        $i=1;
    }
}
?>