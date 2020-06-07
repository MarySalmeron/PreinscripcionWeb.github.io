<?php
    include("./../fix/configBD.php");

    $filasMaterias = "";
    $sqlMaterias = "SELECT * FROM subject ORDER BY id_subject";
    $resMaterias = mysqli_query($conexion, $sqlMaterias);
    while($filas = mysqli_fetch_array($resMaterias,MYSQLI_BOTH)){
        $filasMaterias .= "<tr>
            <td>$filas[0]</td>
            <td>$filas[1]</td> 
            <td>$filas[2] </td> 
            <td>
                <i class='fas fa-eye verMat' data-ver='$filas[0]'></i>&nbsp;
                <i class='fas fa-file-pdf pdfMat' data-pdf='$filas[0]'></i>&nbsp;
            </td>
        </tr>";
    }
?>