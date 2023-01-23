<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$descripcion=$_POST['descripcion'];

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select Descripcion from Control_68053_65866 where Descripcion='".$descripcion."'";
$result = $conn->query($sql);
if($result->num_rows>0){
    $sql = "delete from Control_68053_65866 where Descripcion='".$descripcion."'";
    $conn->query($sql);
    echo "Eliminado correctamente";
}
else{
    echo $descripcion." no existe, favor de verificarlo";
}
?>