<?php
session_start();
if (isset($_SESSION["id_boleta"])) {
  include("../../logic_php/student_info.php");
  include("../../logic_php/subject_info.php");

?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

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

    <?php
    $q = intval($_GET['q']);

    $con = mysqli_connect('localhost', 'root', '', 'preinscripcion');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "preinscripcion");
    $sql = "SELECT * FROM subject WHERE tipo = '" . $q . "'";
    $result = mysqli_query($con, $sql);

    echo "<div class='table'>
<div class='tr'>
<span class='td'>Nombre</span>
<span class='td'>Nivel</span>
<span class='td'>Estado</span>
<span class='td'>Agregar</span>
</div>";
    while ($row = mysqli_fetch_array($result)) {
      echo "<form method = 'post' action = 'materiasTabla.php' class='tr'>
            <input type='hidden' name='id_subject' value=" . $row["id_subject"] . ">";
      echo "<span class='td'>" . $row['nombre'] . "</span>";
      echo "<span class='td'>" . $row['tipo'] . "</span>";
      echo "<span class='td'>
                <input type = 'radio' name = 'estado' value = '0' >Ordinario</input>
                <input type = 'radio' name = 'estado' value = '1' >Recurse</input> 
        </span>";
      echo "<span class='td'>
            <input type='submit' value='Añadir' class='btn btn-success btn-xs active'  ".$s.">
        </span>";
      echo "</form>";
    }
    echo "</div>";

    ?>


  </body>

  </html>
<?php
} else {
  //NO se detectó la sesion que hubo de generarse después de pasar por el login, entonces es un intento de acceso no autorizado, lo redireccionamos a la pantalla correspondiente
  header("location:./../../index.php");
}
?>