<?php
    $sqlMaterias = "SELECT nombre, COUNT(*) as estudiantes FROM student_subject, subject where student_subject.subject_id_student=subject.id_subject GROUP BY subject_id_student"; 
    $resMaterias = mysqli_query($conexion, $sqlMaterias);
    $materiaX = array();
    $estudiantesY = array();
    while($ver=mysqli_fetch_array($resMaterias)){
        $materiaX[]=$ver[0];
        $estudiantesY[]=$ver[1];
    }
    $datosX=json_encode($materiaX);
    $datosY=json_encode($estudiantesY);
?>