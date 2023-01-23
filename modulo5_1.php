<?php
$opcion=$_GET['opcion'];

if($opcion=="1"){
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo5_a.html");
}
elseif($opcion=="2"){
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo5_b.html");
}
elseif($opcion=="3"){
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo5_c.html");
}
elseif($opcion=="4"){
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo5_d.html");
}
else{
    header("Location: http://localhost/Proyecto_final_CHMR_GAFG/modulo5_e.html");
}
?>