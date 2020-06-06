<?php
    //error_reporting(E_ALL ^ E_NOTICE);
    include ("../pages/fix/connection.php");
    session_start();
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    //$pass=md5($pass);
    //$q= "SELECT COUNT(*) as contar from student where id_boleta='$id_boleta' and contrasena='$pass' ";
    $consulta=mysqli_query($connection, $q);
    if($consulta){
        echo($q);
            $array=mysqli_fetch_array($consulta) or die(mysqli_error($connection));
        //$array=mysqli_fetch_array($consulta); 

        if($array['contar']>0){
            $_SESSION['id_boleta']=$id_boleta; 
            header("location: ../pages/alumno/inicio.php");
        }
        else{
            echo("Error");
        }
    }else{
        die("Error en query: ".mysqli_error($connection));
        /* A ver prueba esto..., a ver perame tantito */
    }
    
?>
