<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/configBD.php");
        $boleta = $_GET["boleta"];
        $respAX = "";
        $sqlElmnAlmn = "DELETE FROM student WHERE id_boleta = '$boleta'";
        $resElmnAlmn = mysqli_query($conexion, $sqlElmnAlmn);
        $infElmnAlmn = mysqli_affected_rows($conexion);
        if($infElmnAlmn == 1){
            $respAX = "<h5>El registro se elimin&oacute; correctamente. Gracias :)</h5>";
        }else{
            $respAX = "<h5>No se pudo eliminar el registro. Favor de intentarlo nuevamente.</h5>";
        }
        echo $respAX;
    }else{
        header("location:./loginAdmin.php");
    }
?>