<?php
    session_start();
    if(isset($_SESSION["id_boleta"])){
      include("../../logic_php/student_info.php");
      include("../../logic_php/subject_info.php");
    
    $con = mysqli_connect('localhost','root','','preinscripcion');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    mysqli_select_db($con,"preinscripcion");

    if(isset($_POST["id_subject"],$_POST["estado"]) and $_POST["id_subject"]!="" and $_POST["estado"]!=""){
        $id_subject=$_POST["id_subject"];
        $estado=$_POST["estado"];
        /*if($estado==0) $estado="Ordinario";
        else $estado="Recurse";*/
        
        $sql="INSERT into student_subject values ($boleta, $id_subject, $estado)";
        $result = mysqli_query($con,$sql);
        if(!$result){
            echo"<p> No se pudo agregar </p>";
        }
    }
    if(isset($_POST["id"]) and $_POST["id"]!=""){
        $id=$_POST["id"];

        $sql="DELETE FROM student_subject WHERE student_subject.student_id_boleta = $boleta AND student_subject.subject_id_student = $id";
        $result=mysqli_query($con,$sql);
        if(!$result){
            echo"<p> No se pudo eliminar </p>";
        }
    }
    header("location:./materiasAlumno.php");

    }else{
        //NO se detectó la sesion que hubo de generarse después de pasar por el login, entonces es un intento de acceso no autorizado, lo redireccionamos a la pantalla correspondiente
        header("location:./../../index.php");
    }
?>