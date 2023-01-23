<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$contrasena=$_POST['contrasena'];
$nueva=$_POST['nueva'];
$verificar=$_POST['verificar'];
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
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/index_1.html");
        }
        elseif($row[Nivel_usuario]=="2"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/index_2.html");
        }
        elseif($row[Nivel_usuario]=="3"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/index_3.html");
        }
        elseif($row[Nivel_usuario]=="4"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/index_4.html");
        }
        $i=1;
    }
}
?>