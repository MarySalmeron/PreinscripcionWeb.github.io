<?php
    session_start();
    include("./../fix/configBD.php");
    include("./../fix/getPosts.php");

    $boleta = $_SESSION["id_boleta"];
    $contrasenaAct = md5($contrasenaAct);
    $sqlChckContrasena = "SELECT * FROM student where contrasena = '$contrasenaAct' AND id_boleta = '$boleta'";
    $resChckContrasena = mysqli_query($conexion, $sqlChckContrasena);
    $infChckContrasena = mysqli_num_rows($resChckContrasena);

    $respAX = [];
    if($infChckContrasena == 1){
        $contrasenaNva = md5($contrasenaNva);
        $sqlUpdContrasena = "UPDATE student SET contrasena = '$contrasenaNva' WHERE id_boleta = '$boleta'";
        $resUpdContrasena = mysqli_query($conexion, $sqlUpdContrasena);
        $infUpdContrasena = mysqli_affected_rows($conexion);
        if($infUpdContrasena == 1){
            $respAX["val"] = 1;
            $respAX["msj"] = "<h5>Su contrase&ntilde;a se actializ&oacute; correctamente. Gracias :)</h5>";
        }else{
            $respAX["val"] = 0;
            $respAX["msj"] = "<h5>No se pudo realizar la actualizaci&oacute;n de su contrasen&ntilde;a. Favor de intentarlo nuevamente.</h5>";
        }
    }else{
        $respAX["val"] = 2;
        $respAX["msj"] = "<h5>No coincide su contrase&ntilde;a actual. Favor de intentarlo nuevamente.</h5>";
    }

    echo json_encode($respAX);
?>