<?php
    session_start();
    if(isset($_SESSION["id_boleta"])){
      include("../../logic_php/student_info.php");
    if($infInfBoleta[9]==0){
      echo"
      <style>
        #disabled {
        pointer-events: none;
        cursor: default;
        color:grey;
        }
      </style>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Alumno</title>

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
          <span>Preinscribir</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./../../pages/alumno/editarAlumno.php">
          <i class="fas fa-user-edit"></i>
          <span>Modificar información</span></a>
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
          <span>Comprobante</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./../../pages/fix/cerrar_sesion.php?nombreSesion=id_boleta">
        <i class="fas fa-sign-out-alt"></i>
          <span>Salir</span></a>
      </li>

    </ul>
    
    
    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">&nbsp;</h1>
          <h1 class="h3 mb-1 text-gray-800">Comprobante</h1>
          <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
              nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

          <!-- Content Row -->
          <div class="row">

            <!-- Border Left Utilities -->
            <div class="col-lg-6">

              <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                Generar PDF
                <a id="disabled" class="nav-link" href="./../../pages/alumno/alumnopdf.php">
                    <i class="fas fa-file-pdf fa-7x"></i>
                </a>
                </div>
              </div>

            </div>

            <!-- Border Bottom Utilities -->

          </div>

        </div>
        </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Instituto Politécnico Nacional</span>
            <p>Escuela Superior de Cómputo</p>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

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

  <!-- Page level custom scripts -->
  <!--<script src="./../../js/demo/chart-area-demo.js"></script>
  <script src="./../../js/demo/chart-pie-demo.js"></script>-->

</body>

</html>
<?php
    }else{
        //NO se detectó la sesion que hubo de generarse después de pasar por el login, entonces es un intento de acceso no autorizado, lo redireccionamos a la pantalla correspondiente
        header("location:./../../index.php");
    }
?>