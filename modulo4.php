<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$i=0;
$a = exec("sudo python /var/www/html/Proyecto_final_CHMR_GAFG/modulo4.py");
echo $a;

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select Id from Usuarios_68053_65866 order by Ultima_entrada desc";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc() and $i==0){
        $sql = "update Metereologica_68053_65866 set Id_usuario=".$row[Id]." where Numero_consulta=(select max(Numero_consulta) from Metereologica_68053_65866)";
        $conn->query($sql);
        $i=1;
    }
}

$i=0;

$sql = "select * from Metereologica_68053_65866 order by Fecha_Hora desc";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc() and $i==0){
        echo "Fecha y hora: ".$row[Fecha_hora];
        echo "<br>Teperatura: ".$row[Temperatura];
        echo "<br>Presion: ".$row[Presion];
        echo "<br>Humemdad: ".$row[Humedad];
        echo "<br>Id del usuario: ".$row[Id_usuario];
        $i=1;
    }
}
?>