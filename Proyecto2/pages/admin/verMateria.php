<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/configBD.php");
        $materia = $_GET["nombre"];
        $sqlInfMat = "SELECT * FROM subject WHERE id_subject = '$materia'";
        $resInfMat = mysqli_query($conexion, $sqlInfMat);
        $infMat = mysqli_fetch_row($resInfMat);
        $sqlInfCant= "SELECT subject_id_student, COUNT(*) from student_subject where subject_id_student=$materia";
        $resInfCant=mysqli_query($conexion, $sqlInfCant);
        $infCant=mysqli_fetch_row($resInfCant);
        
        $respAX = "
            <h5 class='center-align'>
            ID: $infMat[0] <br>
            Nivel: $infMat[1]  <br>
            Nombre: $infMat[2] <br>
            Alumnos registrados: $infCant[1] <br>
            </h5>
        ";
        echo $respAX;
    }else{
        header("location:./index.php");
    }
?>