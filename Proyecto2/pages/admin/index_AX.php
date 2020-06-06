<?php
    session_start();
    //include("./../fix/configBD.php");
    include("./../fix/getPosts.php");

    //$contrasena = md5($contrasena);
    $respAX = [];
    if($usuario== "admin" && $contrasena == "tweb2020"){ 
        $_SESSION["admin"] = "bepti";
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5 class='center-align'>Bienvenido :)</h5>";
        //header("location: ../admin/inicio.php");
    }else{
        $respAX["val"] = 0;
        $respAX["msj"] = "<h5 class='center-align'>No coinciden los datos. Favor de intentarlo nuevamente</h5>";
    }

    echo json_encode($respAX);
?>