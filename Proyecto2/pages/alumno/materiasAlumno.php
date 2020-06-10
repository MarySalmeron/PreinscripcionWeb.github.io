<?php
session_start();
if (isset($_SESSION["id_boleta"])) {
    include("../../logic_php/student_info.php");
    include("../../logic_php/subject_info.php");

    $con = mysqli_connect('localhost', 'root', '', 'preinscripcion');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "preinscripcion");
    $sql1 = "SELECT distinct
      subject.id_subject as id, 
      subject.nombre, 
      subject.tipo, 
      student_subject.estado
      from subject join student_subject on subject.id_subject=student_subject.subject_id_student JOIN student on student_subject.student_id_boleta=$boleta ";
    $result1 = mysqli_query($con, $sql1);
?>

    <html>

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
        <script>
            function showUser(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "getNivel.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
        <style>
            DIV.table {
                display: table;
                width: 100%;
                border-collapse: collapse;
            }

            FORM.tr,
            DIV.tr {
                display: table-row;
                border: 1px solid black;
                padding: 5px;
            }

            SPAN.td {
                display: table-cell;
                border: 1px solid black;
                padding: 5px;
            }
        </style>
    </head>

    <body>
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
                <h1 class="h3 mb-2 text-gray-800">&nbsp;</h1>
                <p class="mb-4">Recuerda seleccionar de 1 a 7 unidades de aprendizaje y revisar antes de confirmar.</p>
                <form>
                    <select name="users" onchange="showUser(this.value)">
                        <option value="">Nivel</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </form>
                <br>
                <div id="txtHint"><b>Nivel...</b></div>
                <h1 class="h3 mb-2 text-gray-800">&nbsp;</h1>
                <h1 class="h3 mb-2 text-gray-800">Materias agregadas</h1>
                <?php
                echo "<div class='table'>
                <div class='tr'>
                <span class='td'>Nombre</span>
                <span class='td'>Nivel</span>
                <span class='td'>Estado</span>
                <span class='td'>Agregar</span>
                </div>";
                while ($row = mysqli_fetch_array($result1)) {
                    echo "<form method = 'post' action = 'materiasTabla.php' class='tr'>
                            <input type='hidden' name='id' value=" . $row["id"] . ">";
                    echo "<span class='td'>" . $row['nombre'] . "</span>";
                    echo "<span class='td'>" . $row['tipo'] . "</span>";
                    echo "<span class='td'>" . $row['estado'] . "</span>";
                    echo "<span class='td'>
                            <input type='submit' value='Quitar' class='btn btn-danger btn-xs active' ".$s."> 
                        </span>";
                    echo "</form>";
                }
                echo "</div>";
                echo "<form method = 'post' action='materiasTabla.php'>
                        <input type='submit' name='confirmar' value='Confirmar' class='btn btn-primary btn-lg btn-block' ".$s.">";
                echo "</form>";
               
                ?>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Instituto Politécnico Nacional</span>
                            <p>Escuela Superior de Cómputo</p>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </body>

    </html>
<?php
} else {
    //NO se detectó la sesion que hubo de generarse después de pasar por el login, entonces es un intento de acceso no autorizado, lo redireccionamos a la pantalla correspondiente
    header("location:./../../index.php");
}
?>