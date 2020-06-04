<?php
    //error_reporting(E_ALL ^ E_NOTICE);
    include ("../pages/fix/connection.php");
    session_start();
    $id_boleta=$_POST['id_boleta'];
    $pass=$_POST['pass'];
    echo("Password: $pass \tBoleta: $id_boleta");
    /* No registra! :c pero no marca error, A ver perame tantito en donde esta ese php?*/
    $pass=md5($pass);
    $q= "SELECT COUNT(*) as contar from student where id_boleta='$id_boleta' and contrasena='$pass' ";
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

<?php  
/*function nombreidycont($boleta,$pass)/*BUSCAR NOMBRE OFICINA y ciudad*/
/*{ 
    include ("./../pages/fix/connection.php");
    /* ¿Hay conexión? */
    /*if($q){
        $consulta=mysqli_query($q,"SELECT COUNT(*) as contar from student where id_boleta='$id_boleta' and constrasena='$pass' ");
        /* ¿La consulta se ejecutó bien? */
        /*if($q){

            $array=mysqli_fetch_array($consulta); /* Linea de error*/
             /*if($array['contar']>0){
                $_SESSION['id_boleta']=$id_boleta; 
                header("location:./../pages/alumno/inicio.php");
            }                

        }else{
            echo mysqli_error($q);   
            header("location:index.php");
        }

    }else{

        echo ("Error: La conexión no existe");
    }
} 
?> */