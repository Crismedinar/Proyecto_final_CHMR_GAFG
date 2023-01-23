<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$gpio=$_POST['gpio'];
$tipo=$_POST['tipo'];
$descripcion=$_POST['descripcion'];
$ubicacion=$_POST['ubicacion'];

if ($tipo=="1"){
    $tipo2="Sin uso";
    $estado="Nulo";
}
elseif ($tipo=="2"){
    $tipo2="Entrada";
    $estado="Cerrado";
}
elseif ($tipo=="3"){
    $tipo2="Salida";
    $estado="Apagado";
}
elseif ($tipo=="4"){
    $tipo2="PWM";
    $estado="0";
}
else{
    $tipo2="I2C";
    $estado="Reservado";
}

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
if($gpio=="" or $descripcion=="" or $ubicacion==""){
    echo "Favor de ingresar GPIO, descripcion y ubicacion";
}
else{
    $sql = "select GPIO from Control_68053_65866 where GPIO=".$gpio;
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo "El GPIO ingresado se encuentra en uso, favor de ingresar otro";
    }
    else{
        $sql = "insert into Control_68053_65866 (GPIO, Tipo, Descripcion, Ubicacion, Estado) 
        values (".$gpio.",'".$tipo2."','".$descripcion."','".$ubicacion."','".$estado."')";
        $conn->query($sql);
        echo "Agregado correctamente";
    }
}        
?>