<?php
$opcion=$_GET['opcion'];

if($opcion=="1"){
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo3_a.html");
}
elseif($opcion=="2"){
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo3_b.html");
}
elseif($opcion=="3"){
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo3_c.html");
}
else{
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo3_d.html");
}
?>