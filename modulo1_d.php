<?php
$servername = "localhost";
$username = "gafg_chmr_65866_68053";
$password = "abc123";
$db_name = "BD_Proyecto_2021_CHMR_GAFG";

$usuario=$_POST['usuario'];
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
            $sql = "select * from Usuarios_68053_65866 where Usuario='".$usuario."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo "Id: ".$row[Id];
                    echo "<br>Usuario: ".$row[Usuario];
                    echo "<br>Nombre completo: ".$row[Nombre_completo];
                    echo "<br>Domicilio: ".$row[Domicilio];
                    echo "<br>Telefono: ".$row[Telefono];
                    echo "<br>Contacto en caso de accidente: ".$row[Contacto_accidente];
                    echo "<br>Nivel de usuario: ".$row[Nivel_usuario];
                    echo "<br>Turno: ".$row[Turno];
                }
            }
            else{
                echo "Usuario no existente, favor de verificarlo";
            }
        }
        elseif($row[Nivel_usuario]=="2"){
            $sql = "select * from Usuarios_68053_65866 where Usuario='".$usuario."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    if($row[Nivel_usuario]!="1"){
                        echo "Id: ".$row[Id];
                        echo "<br>Usuario: ".$row[Usuario];
                        echo "<br>Nombre completo: ".$row[Nombre_completo];
                        echo "<br>Domicilio: ".$row[Domicilio];
                        echo "<br>Telefono: ".$row[Telefono];
                        echo "<br>Contacto en caso de accidente: ".$row[Contacto_accidente];
                        echo "<br>Nivel de usuario: ".$row[Nivel_usuario];
                        echo "<br>Turno: ".$row[Turno];
                    }
                    else{
                        echo "Usuario: ".$row[Usuario];
                        echo "<br>Nombre completo: ".$row[Nombre_completo];
                        echo "<br>Telefono: ".$row[Telefono];
                        echo "<br>Contacto en caso de accidente: ".$row[Contacto_accidente];
                    }
                }
            }
            else{
                echo "Usuario no existente, favor de verificarlo";
            }            
        }
        else{
            $sql = "select * from Usuarios_68053_65866 where Usuario='".$usuario."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo "Usuario: ".$row[Usuario];
                    echo "<br>Nombre completo: ".$row[Nombre_completo];
                    echo "<br>Telefono: ".$row[Telefono];
                    echo "<br>Contacto en caso de accidente: ".$row[Contacto_accidente];
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