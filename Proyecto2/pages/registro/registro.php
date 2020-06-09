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
  <link href="./../../js/plugins/validetta/validetta.min.css" rel="stylesheet">
    <link href="./../../js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="./../../css/general.css" rel="stylesheet">
  <link href="./../../js/plugins/validetta/validetta.css" rel="stylesheet" type="text/css" media="screen" >

  <script type="text/javascript" src="./../../js/plugins/validetta/validetta.js"></script>
  <title>Registro</title>

  <!-- Custom fonts for this template-->
  <link href="./../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./../../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

  <script src="./../../js/plugins/validetta/validetta.min.js"></script>
  <script src="./../../js/plugins/validetta/validettaLang-es-ES.js"></script>
  <script src="./../../js/plugins/confirm/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="./../../js/registro.js"></script>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!--<div class="col-lg-5 d-none d-lg-block">
            <img src="./../../img/escom.jpg" width="350" height="620">
          </div>-->
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">¡Crea una cuenta!</h1>
              </div>
              <form class="user" name="formRegistro" id="formRegistro">

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" class="form-control form-control-user" id="id_boleta" name="id_boleta" placeholder="Boleta"  required="id_boleta" minLength="8">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="f_name" name="f_name" placeholder="First Name" required="f_name">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="m_name" name="m_name" placeholder="Middle Name" required="m_name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="l_name" name="l_name" placeholder="Last Name" required="l_name">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" required="email">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="number" class="form-control form-control-user" id="phone" name="phone" placeholder="Phone" required="phone">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <div class="col s12 m10 input-field">
                    <select id="gender" name="gender" data-validetta="required">
                        <option value="">--- Seleccionar ---</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                    </select>
                    <label for="genero">G&eacute;nero</label>
                </div>
                 
                  </div>
                  <div class="col-sm-6">
                  <label for="b_date">Fecha de nacimiento</label>
                    <input type="text" class="datepicker" id="b_date" name="b_date" readonly required="b_date">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="contrasena" name="contrasena" placeholder="Password" data-validetta="required,minLength[6],equalTo[contrasena2]">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="contrasena2" name="contrasena2" placeholder="Repeat Password"  data-validetta="required,minLength[6],equalTo[contrasena]">
                  </div>
                </div>
                <input type="submit" class="btn blue" style="width:100%;" value="Registrar">
              </form>
              <br>
              <div class="text-center">
                <a class="small" href="./../../pages/inicio/forgot-password.html">¿Olvidaste tu contraseña?</a>
              </div>
              <div class="text-center">
                <a class="small" href="./../../index.php">¿Ya tienes una cuenta? Entra!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- A qué archivo pho mandas esta información? -->
  </div>

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
