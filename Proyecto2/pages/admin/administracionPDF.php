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

        $boleta = $_GET["boleta"];
        $sqlAlumno = "SELECT * FROM student WHERE id_boleta = '$boleta'";
        $resAlumno = mysqli_query($conexion, $sqlAlumno);
        $infAlumno = mysqli_fetch_row($resAlumno);
        $cumple = strftime("%e de %B de %Y", strtotime($infAlumno[7]));
        
        $sqlInfTable="SELECT distinct subject.id_subject, subject.tipo, subject.nombre from subject join student_subject on subject.id_subject=student_subject.subject_id_student JOIN student on student_subject.student_id_boleta=$boleta ";
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
        $pdf->Cell(0,7,"Boleta: $infAlumno[0]",0,1,"L");
        $pdf->Cell(0,7,utf8_decode("Nombre: $infAlumno[2] $infAlumno[3] $infAlumno[1]"),0,1,"L");
        $pdf->Cell(0,7,utf8_decode("Correo: $infAlumno[4]"),0,1,"L");
        $pdf->Cell(0,7,utf8_decode("Fecha de nacimiento: $cumple"),0,1,"L");
        //$qrcode = new QRcode("$boleta / TWeb-20202", "H");
        //$qrcode->displayFPDF($pdf,10,130,50);
        $pdf->Cell(0,7,"Carrera: Ingenieria en Sistemas Computacionales",0,1,"L");
        $pdf->Ln(20);
        $pdf->Cell(24,6,"",0,0);
        $pdf->Cell(15,6,"ID",1,0,"C");
        $pdf->Cell(15,6,"Nivel",1,0,"C");
        $pdf->Cell(107,6,"Nombre",1,1,"C");
        while($fila=$infInfTable=mysqli_fetch_array($resInfTable)){
            $pdf->Cell(24,6,"",0,0);
            $pdf->Cell(15,7,$fila[0],1,0,"L");
            $pdf->Cell(15,7,$fila[1],1,0,"L");
            $pdf->Cell(107,7,$fila[2],1,1,"L");
        }
        $pdf->Output();
    }else{
        header("location:./loginAdmin.php");
    }
?>