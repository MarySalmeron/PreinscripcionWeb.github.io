<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/configBD.php");
        include("./../fix/fpdf182/fpdf.php");
        //include("./../fix/qrcode/qrcode.class.php");

        setlocale(LC_ALL, "es_MX");
        
        class PDF extends FPDF
        {
            // Cabecera de página
            function Header()
            {
                // Logo
                $this->Image("./../../img/header.jpg",5,8,200);
                $this->Ln(20);
            }

            // Pie de página
            function Footer()
            {
                // Posición: a 1.5 cm del final
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Número de página
                $this->Cell(0,10,"Preinscrpciones ESCOM ".strftime("%Y"),0,0,'C');
            }
        }

        $materia = $_GET["nombre"];
        $sqlMat = "SELECT * FROM subject WHERE id_subject = '$materia'";
        $resMat = mysqli_query($conexion, $sqlMat);
        $infMat = mysqli_fetch_row($resMat);
        $sqlInfTable="SELECT distinct student.id_boleta, student_subject.estado, student.f_name, student.m_name, student.l_name from student, student_subject, subject where subject.id_subject=$materia and student_subject.subject_id_student=subject.id_subject and student.id_boleta=student_subject.student_id_boleta";
        //$sqlInfTable="SELECT distinct student.id_boleta, student_subject.estado, student.f_name, student.m_name, student.l_name from student, student_subject where student_subject.subject_id_student=$materia and subject.id_subject=student_subject.subject_id_student " ;
        //$sqlInfTable="SELECT distinct subject.tipo, subject.nombre  from subject INNER JOIN student_subject on subject.id_subject=student_subject.subject_id_student INNER JOIN student on student_subject.student_id_boleta=$boleta ";
        $resInfTable=mysqli_query($conexion,$sqlInfTable);

        // Creación del objeto de la clase heredada
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',10);
        $pdf->Ln(10);
        $pdf->Cell(0,7,"ESCOM-IPN, ".strftime("%A %d de %B de %Y"),0,1,"R");
        $pdf->Ln(12);
        $pdf->SetFont('Arial','b',18);
        $pdf->Cell(0,7,"Comprobante de Preinscripcion",0,1,"C");
        $pdf->Ln(15);
        $pdf->SetFont('Arial','b',13);
        $pdf->Cell(16,6,"",0,0);
        $pdf->Cell(0,7,"Id: $infMat[0]",0,1,"L");
        $pdf->Cell(16,6,"",0,0);
        $pdf->Cell(0,7,utf8_decode("Nivel: $infMat[1]"),0,1,"L");
        $pdf->Cell(16,6,"",0,0);
        $pdf->Cell(0,7,utf8_decode("Nombre: $infMat[2]"),0,1,"L");
        $pdf->Cell(16,6,"",0,0);
        $pdf->Cell(0,7,"Carrera: Ingenieria en Sistemas Computacionales",0,1,"L");
        $pdf->Ln(20);
        $pdf->Cell(10,6,"",0,0);
        $pdf->Cell(30,6,"Boleta",1,0,"C");
        $pdf->Cell(30,6,"Estado",1,0,"C");
        $pdf->Cell(107,6,"Nombre",1,1,"C");
        //$pdf->Cell(20,6,"Estado",1,1,"C");
        while($fila=$infInfTable=mysqli_fetch_array($resInfTable)){
            $pdf->Cell(10,6,"",0,0);
            $pdf->Cell(30,7,$fila[0],1,0,"L");
            $pdf->Cell(30,7,$fila[1],1,0,"L");
            $pdf->Cell(107,7,utf8_decode("$fila[2] $fila[3] $fila[4]"),1,1,"L");
        }
        $pdf->Output();
    }else{
        header("location:./loginAdmin.php");
    }
?>