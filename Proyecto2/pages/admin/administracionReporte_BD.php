<?php
    $sqlMaterias = "SELECT nombre, COUNT(*) as estudiantes FROM student_subject, subject where student_subject.subject_id_student=subject.id_subject GROUP BY subject_id_student"; 
    $resMaterias = mysqli_query($conexion, $sqlMaterias);
    $materiaX = [];
    $estudiantesY = [];
    while($ver=mysqli_fetch_array($resMaterias)){
        $materiaX[]=$ver[0];
        $estudiantesY[]=$ver[1];
    }

    $sqlRecurse = "SELECT nombre, COUNT(*) as estudiantes FROM student_subject, subject where student_subject.subject_id_student=subject.id_subject and student_subject.estado='Recurse' GROUP BY subject_id_student";
    $resRecurse = mysqli_query($conexion, $sqlRecurse);
    $materia1X = [];
    $estudiantes1Y = [];
    while($ver1=mysqli_fetch_array($resRecurse)){
        $materia1X[]=$ver1[0];
        $estudiantes1Y[]=$ver1[1];
    }

    $sqlOrdinario = "SELECT nombre, COUNT(*) as estudiantes FROM student_subject, subject where student_subject.subject_id_student=subject.id_subject and student_subject.estado='Ordinario' GROUP BY subject_id_student"; 
    $resOrdinario = mysqli_query($conexion, $sqlOrdinario);
    $materia2X = [];
    $estudiantes2Y = [];
    while($ver2=mysqli_fetch_array($resOrdinario)){
        $materia2X[]=$ver2[0];
        $estudiantes2Y[]=$ver2[1];
    }
?>