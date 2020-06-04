<?php
    include("../../fix/configBD.php");
    
    $boleta = $_SESSION["id_boleta"];
    $sqlInfBoleta = "SELECT * FROM student WHERE id_boleta = '$id_boleta'";
    $resInfBoleta = mysqli_query($conexion, $sqlInfBoleta);
    $infInfBoleta = mysqli_fetch_row($resInfBoleta);

    $infBoleta = "<h3 class='center-align'>Bienvenido $infInfBoleta[1] $infInfBoleta[2] $infInfBoleta[3] ($infInfBoleta[0])</h3>";

    /*$info = "<p>&nbsp;</p><h5>
        <i class='fas fa-venus-mars deep-orange-text accent-2'></i> G&eacute;nero: <strong>$infInfBoleta[4]</strong><br>
        <i class='fas fa-envelope deep-orange-text accent-2'></i> Correo: <strong>$infInfBoleta[5]</strong><br>
        <i class='fas fa-birthday-cake deep-orange-text accent-2'></i> Cumplea&ntilde;os: <strong>$infInfBoleta[6]</strong>
    </h5>";*/
?>