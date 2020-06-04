<?php
    /*
        Esta página es exclusiva de un alumno que se haya autentificado por medio del login. Un acceso directo a ésta deberá de ser rechazado. Aquí aparecen las sesiones en escena para cuidar este 'detalle'.
    */

    session_start();
    if(isset($_SESSION["id_boleta"])){
        //La sesion está disponible, significa que es un alumno válido, entonces hay que permitir el acceso y personalizar la infomación que se despliegue.
        //Regularmente separo las funcionalidades en archivos y aquellos que vean con el sufijo '_BD' significa que realiza operaciones de solo consulta a la BD y cuyos resultados se utilizarán en el archivo actual; también observen que tiene el nombre del archivo base (alumno.php), esto con la intención de identificar rapidamente aquel conjunto de archivos que están relacionados; así pues sera común que, de ser necesario, encuentren archivos que se llamen 'alumno.js', 'alumno.css', 'alumno_AX.php', por ejemplo, el último contienen todo el código que el servidor realizará ante una llamada AJAX hecha por 'alumno.php' por medio del archivo 'alumno.js' concretamente en la función '$.ajax({})'
        include("./alumno_BD.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Preinscripcion ESCOM</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
<link href="./../../js/plugins/validetta/validetta.min.css" rel="stylesheet">
<link href="./../../js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
<link href="./../../css/general.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="./../../js/plugins/validetta/validetta.min.js"></script>
<script src="./../../js/plugins/validetta/validettaLang-es-ES.js"></script>
<script src="./../../js/plugins/confirm/jquery-confirm.min.js"></script>
<script src="./../../js/alumno.js"></script>
</head>
<body>
    <?php
        readfile("./../fix/header.html");
    ?>
    <main>
        <div class="container">
            <div class="row">
                <?php echo $infBoleta; ?>
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#info"><i class="fas fa-eye"></i> Info</a></li>
                        <li class="tab col s3"><a href="#editar"><i class="fas fa-edit"></i> Editar</a></li>
                        <li class="tab col s3"><a href="#contrasena"><i class="fas fa-key"></i> Contrase&ntilde;a</a></li>
                        <li class="tab col s3"><a href="#comprobante"><i class="fas fa-folder"></i> Comprobante</a></li>
                    </ul>
                </div>
                <div id="info" class="col s12">
                    <?php echo $info; ?>
                </div>
                <div id="editar" class="col s12">
                    <p>&nbsp;</p>
                    <div class="row">
                        <form id="formEditAlumno" autocomplete="off">
                        <div class="col s12 m4 input-field">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo $infInfBoleta[1]; ?>" data-validetta="required">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="primerApe">Primer apellido</label>
                            <input type="text" id="primerApe" name="primerApe" value="<?php echo $infInfBoleta[2]; ?>" data-validetta="required">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="segundoApe">Segundo apellido</label>
                            <input type="text" id="segundoApe" name="segundoApe" value="<?php echo $infInfBoleta[3]; ?>" data-validetta="required">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="correo">Correo</label>
                            <input type="text" id="correo" name="correo" value="<?php echo $infInfBoleta[5]; ?>" data-validetta="required,email">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="fechaNac">Fecha de nacimiento</label>
                            <input type="text" id="fechaNac" name="fechaNac" class="datepicker" value="<?php echo $infInfBoleta[6]; ?>" readonly data-validetta="required">
                        </div>
                        <div class="col s12 m4 input-field">
                            <input type="submit" class="btn deep-orange accent-2" style="width:100%" value="Editar">
                        </div>
                        </form>
                    </div>
                </div>
                <div id="contrasena" class="col s12">
                    <p>&nbsp;</p>
                    <div class="row">
                        <form id="formCambiarContrasena">
                        <div class="col s12 m4 input-field">
                            <label for="contrasenaAct">Contrase&ntilde;a actual</label>
                            <input type="password" id="contrasenaAct" name="contrasenaAct" data-validetta="required,minLength[6]">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="contrasenaNva">Contrase&ntilde;a nueva</label>
                            <input type="password" id="contrasenaNva" name="contrasenaNva" data-validetta="required,minLength[6],equalTo[contrasenaNva2]">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="contrasenaNva2">Confirmar contrase&ntilde;a</label>
                            <input type="password" id="contrasenaNva2" name="contrasenaNva2" data-validetta="required,minLength[6],equalTo[contrasenaNva]">
                        </div>
                        <div class="col s12 input-field">
                            <input type="submit" class="btn deep-orange accent-2" style="width:100%" value="Cambiar contrase&ntilde;a">
                        </div>
                        </form>
                    </div>
                </div>
                <div id="comprobante" class="col s12">
                    <div class="row center-align">
                        <div class="col s12 m6">
                            <h1>
                                <a href="./alumnoPDF.php"><i class="fab fa-adobe fa-2x deep-orange-text accent-2"></i></a>
                            </h1>
                            <h5>PDF</h5>
                        </div>
                        <div class="col s12 m6">
                            <h1>
                                <a href="./alumnoCorreo.php"><i class="fas fa-envelope fa-2x deep-orange-text accent-2"></i></a>
                            </h1>
                            <h5>Correo</h5>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="fixed-action-btn click-to-toggle">
                <a class="btn-floating btn-large red">
                    <i class="fas fa-ellipsis-h"></i>
                </a>
                <ul>
                    <li><a href="./../fix/cerrarSesion.php?nombreSesion=boleta" class="btn-floating red"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
    </main>
    <?php
        readfile("./../fix/footer.html");
    ?>
</body>
</html>

<?php
    }else{
        //NO se detectó la sesion que hubo de generarse después de pasar por el login, entonces es un intento de acceso no autorizado, lo redireccionamos a la pantalla correspondiente
        header("location:./../../index.php");
    }
?>