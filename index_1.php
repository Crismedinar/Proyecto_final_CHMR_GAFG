<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$opcion=$_POST['opcion'];
$i=0;

$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Fallo de conexion: ".$conn->connect_error);
}
$sql = "select Nivel_usuario from Usuarios_68053_65866 order by Ultima_entrada desc";
$result = $conn->query($sql);
while($row = $result->fetch_assoc() and $i==0){
    if ($opcion=="1"){
        if ($row[Nivel_usuario]=="1"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo1_1.html");
        }
        elseif ($row[Nivel_usuario]=="2"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo1_2.html");
        }
        else{
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo1_d.html");
        }
    }
    elseif ($opcion=="2"){
        if ($row[Nivel_usuario]=="1"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo2_1.html");
        }
        elseif ($row[Nivel_usuario]=="2"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo2_2.html");
        }
        else{
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo2_3.html");
        }
    }
    elseif ($opcion=="3"){
        if ($row[Nivel_usuario]=="1"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo3_1.html");
        }
        elseif ($row[Nivel_usuario]=="2"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo3_2.html");
        }
        elseif ($row[Nivel_usuario]=="3"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo3_d.html");
        }
        else{
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo3_4.html");
        }
    }
    elseif ($opcion=="4"){
        header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo4.php");
    }
    else{
        if ($row[Nivel_usuario]=="1"){
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo5_1.html");
        }
        else{
            header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo5_2.html");
        }
    }
    $i=1;
}
$conn->close();
?>