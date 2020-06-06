<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/configBD.php");
        include("./../fix/getPosts.php");

        $respAX = [];
        $sqlUpdAlmn = "UPDATE student SET f_name = '$nombre', m_name = '$primerApe', l_name = '$segundoApe', gender = '$genero', email = '$correo', b_date = '$fechaNac' WHERE id_boleta = '$boleta'";
        $resUpdAlmn = mysqli_query($conexion, $sqlUpdAlmn);
        $infUpdAlmn = mysqli_affected_rows($conexion);
        if($infUpdAlmn == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "<h5 class='center-align'>Los datos del alumno se actualizar&oacute;n correctamente. Gracias :)</h5>";
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5 class='center-align'>No se pudo actualizar los datos. Favor de intentarlo nuevamente.</h5>";
        }
        echo json_encode($respAX);
    }else{
        header("location:./administracion.php");
    }
?>