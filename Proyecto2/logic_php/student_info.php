<?php
    include("../../pages/fix/connection.php");
    
    $boleta = $_SESSION["id_boleta"];
    $sqlInfBoleta = "SELECT * FROM student WHERE id_boleta = '$boleta'";
    $resInfBoleta = mysqli_query($connection, $sqlInfBoleta);
    $infInfBoleta = mysqli_fetch_row($resInfBoleta);

    $s="";
    if($infInfBoleta[9]==1){
        $s="disabled";
    }
?>