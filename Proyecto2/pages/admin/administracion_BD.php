<?php
    include("./../fix/configBD.php");

    $filasAlumnos = "";
    $sqlAlumnos = "SELECT * FROM student ORDER BY m_name";
    $resAlumnos = mysqli_query($conexion, $sqlAlumnos);
    while($filas = mysqli_fetch_array($resAlumnos,MYSQLI_BOTH)){
        $filasAlumnos .= "<tr>
            <td>$filas[0]</td>
            <td>$filas[1] $filas[2] $filas[3]</td>
            <td>
                <i class='fas fa-eye verAlmn' data-ver='$filas[0]'></i>&nbsp;
                <i class='fas fa-pen editarAlmn' data-editar='$filas[0]'></i>&nbsp;
                <i class='fas fa-times eliminarAlmn' data-eliminar='$filas[0]'></i>&nbsp;
                <i class='fas fa-file-pdf pdfAlmn' data-pdf='$filas[0]'></i>&nbsp;
            </td>
        </tr>";
    }
?>