<?php
    session_start();
    if(isset($_SESSION["id_boleta"])){
      include("./../../logic_php/student_info.php");
    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Alumno</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
    <script src="./../../js/jquery-3.4.1.min.js"></script>
    <script src="./../../js/jquery-1.8.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="./../../js/plugins/validetta/validetta.min.css" rel="stylesheet">
    <link href="./../../js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="./../../css/general.css" rel="stylesheet">
    <link href="./../../js/plugins/validetta/validetta.css" rel="stylesheet" type="text/css" media="screen" >
    <script src="./../../js/plugins/confirm/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="./../../js/plugins/validetta/validetta.js"></script>
    <title>Editar</title>

<!-- Custom fonts for this template-->
  <link href="./../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
  <link href="./../../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

  <script src="./../../js/plugins/validetta/validetta.min.js"></script>
  <script src="./../../js/plugins/validetta/validettaLang-es-ES.js"></script>
  
<script src="./../../js/alumno.js"></script>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./../../pages/alumno/inicio.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $infInfBoleta[1]; ?></div>
            </a>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./../../pages/alumno/inicio.php">
                <div class="sidebar-brand-text mx-3"><?php echo $infInfBoleta[0]; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

             <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Acciones
            </div>

            <li class="nav-item">
                <a class="nav-link" href="./../../pages/alumno/materiasAlumno.php">
                    <i class="fas fa-book"></i>
                    <span>Preinscribir</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./../../pages/alumno/editarAlumno.php">
                    <i class="fas fa-user-edit"></i>
                    <span>Modificar información</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./../../pages/alumno/contraEdit.php">
                    <i class="fas fa-book"></i>
                    <span>Cambiar contraseña</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./../../pages/alumno/comprobante.php">
                    <i class="fas fa-pager"></i>
                    <span>Comprobante</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./../../pages/fix/cerrar_sesion.php?nombreSesion=id_boleta">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Salir</span>
                </a>
            </li>
        </ul>
    
        <div id="editar" class="col s12">
            <h1 class="h3 mb-2 text-gray-800">&nbsp;</h1>
            <h1 class="h3 mb-2 text-gray-800">Configuración de la cuenta</h1>
            
            <div class="row">
                <form id="formEditAlumno" autocomplete="off">
                    <div class="col s12 m4 input-field">
                        <label for="boleta">Boleta</label>
                        <input type="text" id="id_boleta" name="id_boleta" maxLength="10" value="<?php echo $infInfBoleta[0];  ?>" readonly required name="boleta">
                    </div>
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
                        <input type="text" id="correo" name="correo" value="<?php echo $infInfBoleta[4]; ?>" data-validetta="required,email">
                    </div>
                    <div class="col s12 m4 input-field">
                        <label for="fechaNac">Fecha de nacimiento</label>
                        <input type="text" id="fechaNac" name="fechaNac" class="datepicker" value="<?php echo $infInfBoleta[7]; ?>" readonly data-validetta="required">
                    </div>
                    <div class="col s12 m4 input-field">
                        <input type="submit" class="btn deep-orange accent-2" style="width:100%" value="Editar">
                    </div>
                </form>
            </div>
        </div>
        <!--<div class="container Editar">
            <h1 class="h3 mb-2 text-gray-800">&nbsp;</h1>
            <h1 class="h3 mb-2 text-gray-800">Configuración de la cuenta</h1>
            <div class="row">
              <form class="user" id="formEditAlumno" autocomplete="off">
                <div class="col s12 m4 input-field">
                    <label for="boleta">Boleta</label>
                    <input type="text" id="id_boleta" name="id_boleta" maxLength="10" value="<?php echo $infInfBoleta[0];  ?>" readonly required name="boleta">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="f_name" name="f_name" value="<?php echo $infInfBoleta[1]; ?>" required name="f_name">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="primerApe">Primer apellido</label>
                    <input type="text" id="m_name" name="m_name" value="<?php echo $infInfBoleta[2]; ?>" required name="m_name">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="segundoApe">Segundo apellido</label>
                    <input type="text" id="l_name" name="l_name" value="<?php echo $infInfBoleta[3]; ?>" required name="l_name">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="correo">Correo</label>
                    <input type="text" id="email" name="email" value="<?php echo $infInfBoleta[4]; ?>" required name="email">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="correo">Tel&eacute;fono</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $infInfBoleta[5]; ?>" required name="phone">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="fechaNac">Fecha de nacimiento</label>
                    <input type="text" class="datepicker" id="b_date" name="b_date" readonly value="<?php echo $infInfBoleta[7]; ?>" required name="b_date">
                </div>
                <div class="col s12 m4 input-field">
                    <a href="./../../pages/alumno/inicio.php" class="btn orange" style="width:100%;">Cancelar</a>
                </div>
                <div class="col s12 m4 input-field">
                    <input type="submit" class="btn blue" style="width:100%;" value="Actualizar" >
                </div>
              </form>
            </div>row
        </div>container Editar-->
    </div><!--wrapper-->
 
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Instituto Politécnico Nacional</span>
            <p>Escuela Superior de Cómputo</p>
          </div>
        </div>
    </footer>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
  <script src="./../../vendor/jquery/jquery.min.js"></script>
  <script src="./../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./../../js/sb-admin-2.min.js"></script>
    
    <script>
    var $x = jQuery.noConflict();
    
    </script>
    
</body>

</html>
<?php
    }else{
        //NO se detectó la sesion que hubo de generarse después de pasar por el login, entonces es un intento de acceso no autorizado, lo redireccionamos a la pantalla correspondiente
        header("location:./../../index.php");
    }
?>
