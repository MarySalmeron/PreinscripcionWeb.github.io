<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="./js/plugins/validetta/validetta.min.css" rel="stylesheet">
  <link href="./js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
  <link href="./css/general.css" rel="stylesheet">
  <link href="./js/plugins/validetta/validetta.css" rel="stylesheet" type="text/css" media="screen" >
  <script src="./js/plugins/validetta/validetta.min.js"></script>
  <script src="./js/plugins/validetta/validettaLang-es-ES.js"></script>
  <script src=".//js/plugins/confirm/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="./js/plugins/validetta/validetta.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
  

  <title>Inicio</title>

  <!-- Custom fonts for this template-->
  <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin-2.min.css" rel="stylesheet">
  <script src="./js/index.js"></script>
</head>

<body class="bg-gradient-primary">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
              <img src="./img/escom.jpg" width="425" height="550">
            </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Preinscripción ESCOM</h1>
                  </div>
                  <form id="formIndex" autocomplete="off">
                  <div class="form-group">
                      <!--<div class="form-control form-control-user">-->
                        <i class="fas fa-user prefix blue-text"></i>
                        <label for="boleta">Boleta</label>
                        <input type="text" id="id_boleta" name="id_boleta" maxlength="10" data-validetta="required,number,minLength[8],maxLength[10]">
                      <!--</div>-->
                      <!--<div class="form-control form-control-user">-->
                        <i class="fas fa-key prefix blue-text"></i>
                        <label for="contrasena">Contrase&ntilde;a</label>
                        <input type="password" id="contrasena" name="contrasena" data-validetta="required,minLength[6]">
                      <!--</div>-->
                      <div class="col s12 input-field">
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Entrar" style="width: 100%;">
                      </div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <a href="pages/registro/registro.php" class="btn btn-google btn-user btn-block" > 
                        Registrar
                      </a>
                      </div>
                  </form>
                  <hr>
                  <div class="text-center">
                  <a class="small" href="./pages/inicio/forgot-password.html">¿Olvidaste tu contraseña?</a>
                    <br>
                    <a class="small" href="./pages/admin/loginAdmin.php">Entrar como administrador</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="./vendor/jquery/jquery.min.js"></script>
  <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./js/sb-admin-2.min.js"></script>
  <script>
    var $x = jQuery.noConflict();
    
  </script>
</body>

</html>
