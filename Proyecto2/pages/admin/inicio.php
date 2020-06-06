<?php
    session_start();
    if(isset($_SESSION["admin"])){
      include("./administracion_BD.php");
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="./../../js/jquery-3.4.1.min.js"></script>
  <script src="./../../js/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="./../../js/plugins/validetta/validetta.min.css" rel="stylesheet">
  <link href="./../../js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
  <link href="./../../css/general.css" rel="stylesheet">
  <link href="./../../js/plugins/validetta/validetta.css" rel="stylesheet" type="text/css" media="screen" >
  <script src="./../../js/plugins/validetta/validetta.min.js"></script>
  <script src="./../../js/plugins/validetta/validettaLang-es-ES.js"></script>
  <script src="./../../js/plugins/confirm/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="./../../js/plugins/validetta/validetta.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
  <script src="./../../js/administracion.js"></script>
  <title>Administrador</title>

  <!-- Custom fonts for this template-->
  <link href="./../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./../../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./../../pages/admin/inicio.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo "Bienvenido"; ?></div>
      </a>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./../../pages/admin/inicio.php">
        <div class="sidebar-brand-text mx-3"><?php echo "Administrador"; ?></div>
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
          <span>Materias</span></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="./../../pages/fix/cerrar_sesion.php?nombreSesion=user">
        <i class="fas fa-sign-out-alt"></i>
        <span>Salir</span></a>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <main>
      <!--<div class="row">-->
      <div class="col-xl-12 col-lg-9">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Alumnos registrados</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Boleta</th><th>Nombre</th><th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php echo $filasAlumnos; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <!--</div>-->
    
      <!-- End of Main Content -->
      
      <!-- Footer container my-auto-->
      
        <footer class="sticky-footer bg-white">
          <div class="container">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Instituto Politécnico Nacional</span>
              <p>Escuela Superior de Cómputo</p>
            </div>
          </div>
        </footer>
       <!--End of Footer -->
    </main>

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
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

  <!-- Page level plugins -->
    <script src="./../../vendor/chart.js/Chart.min.js"></script>

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

