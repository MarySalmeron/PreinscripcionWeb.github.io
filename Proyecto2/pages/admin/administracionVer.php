<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/configBD.php");
        $boleta = $_GET["boleta"];
        $sqlInfAlmn = "SELECT * FROM student WHERE id_boleta = '$boleta'";
        $resInfAlmn = mysqli_query($conexion, $sqlInfAlmn);
        $infAlmn = mysqli_fetch_row($resInfAlmn);
        $respAX = "
            <h5 class='center-align'>
            Boleta: $infAlmn[0] <br>
            Nombre: $infAlmn[1] $infAlmn[2] $infAlmn[3] <br>
            G&eacute;nero: $infAlmn[6] <br>
            Correo: $infAlmn[4] <br>
            Fecha de Nacimiento: $infAlmn[7]<br>
            Tel&eacute;fono: $infAlmn[5]
            </h5>
        ";
        echo $respAX;
    }else{
        header("location:./index.php");
    }
?>