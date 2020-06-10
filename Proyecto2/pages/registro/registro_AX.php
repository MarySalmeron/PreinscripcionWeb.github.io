<?php
    include("./../fix/configBD.php");
    include("./../fix/getPosts.php");

    $respAX = array();
    $sqlChckBoleta = "SELECT * FROM student WHERE id_boleta = '$id_boleta'";
    $resChckBoleta = mysqli_query($conexion,$sqlChckBoleta);
    $infChckBoleta = mysqli_num_rows($resChckBoleta);
    if($infChckBoleta >= 1){
        $respAX["cod"] = 2; /*Esque estoy buscando de donde sale la parte que dice AX.code porque no me acuerdo donde esta y a lo mejor de ahi podemos sacar algo, mmm me acabas de dar una idea de algo que ignoro a ver deja veo */
        $respAX["msj"] = "La Boleta ya est&aacute; registrada. Favor de intentarlo nuevamente.";
    }else{
        $contrasena = md5($contrasena);
        $sqlInsBoleta = "INSERT INTO student VALUES ('$id_boleta','$f_name','$m_name','$l_name','$email','$phone','$gender','$b_date','$contrasena',0)";
        $resInsBoleta = mysqli_query($conexion,$sqlInsBoleta);
        $infInsBoleta = mysqli_affected_rows($conexion);
        if($infInsBoleta == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "El registro se realiz&oacute; correctamente. Gracias :)";
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "No se pudo realizar el registro. Favor de intentarlo nuevamente ".mysqli_error($conexion);
        }
    }
    $resp=json_encode($respAX);
    echo $resp;
?>