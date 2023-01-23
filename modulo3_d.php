<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$descripcion=$_POST['descripcion'];
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
            $sql = "select * from Control_68053_65866 where Descripcion='".$descripcion."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo "Id: ".$row[Id];
                    echo "<br>GPIO: ".$row[GPIO];
                    echo "<br>Tipo: ".$row[Tipo];
                    echo "<br>Descripcion: ".$row[Descripcion];
                    echo "<br>Ubicacion: ".$row[Ubicacion];
                    echo "<br>Estado: ".$row[Estado];
                }
            }
            else{
                echo $descripcion." no existe, favor de verificarlo";
            }
        }
        else{
            $sql = "select Estado from Control_68053_65866 where Descripcion='".$descripcion."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo "Estado: ".$row[Estado];
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