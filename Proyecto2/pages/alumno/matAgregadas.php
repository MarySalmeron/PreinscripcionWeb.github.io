<?php
    session_start();
    if(isset($_SESSION["id_boleta"])){
      include("../../logic_php/student_info.php");
      include("../../logic_php/subject_info.php");
    
?>
<?
mysqli_select_db($con,"preinscripcion");
$sqlInfTable="SELECT distinct subject.id_subject, subject.tipo, subject.nombre from subject join student_subject on subject.id_subject=student_subject.subject_id_student JOIN student on student_subject.student_id_boleta=$boleta ";
$resInfTable=mysqli_query($conexion,$sqlInfTable);;
//$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>ID</th>
<th>Nivel</th>
<th>Nombre</th>
</tr>";
while($row=$infInfTable=mysqli_fetch_array($resInfTable)){
    echo "<tr>";
    echo "<td>" .$row[0] . "</td>";
    echo "<td>" .$row[1] . "</td>";
    echo "<td>" .$row[2] . "</td>";
}

echo "</table>";
mysqli_close($con);
?>
<?php
}else{

        //NO se detectó la sesion que hubo de generarse después de pasar por el login, entonces es un intento de acceso no autorizado, lo redireccionamos a la pantalla correspondiente
        header("location:./../../index.php");
}
?>