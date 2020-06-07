<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/configBD.php");
        include("./../fix/phpMailer/class.phpmailer.php");
        include("./../fix/phpMailer/class.smtp.php");

        setlocale(LC_ALL, "es_MX");
        $boleta = $_GET["boleta"];
        $sqlAlumno = "SELECT * FROM student WHERE id_boleta = '$boleta'";
        $resAlumno = mysqli_query($conexion, $sqlAlumno);
        $infAlumno = mysqli_fetch_row($resAlumno);
        $txtIntroduccion = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vestibulum hendrerit varius. Curabitur sapien mauris, facilisis eu turpis sed, tincidunt condimentum nunc. Curabitur purus risus, lacinia at justo sodales, volutpat rutrum metus. Nullam quis leo ac velit molestie dictum. Nunc dignissim dolor sit amet felis tempor mattis. Vivamus a quam a ex vulputate egestas. Nulla posuere dui accumsan tincidunt commodo.";
        $cumple = strftime("%e de %B de %Y", strtotime($infAlumno[6]));

        $email_user = ""; 
        $email_password = ""; 
        $the_subject = "Comprobante Registro de Datos - Sem. 20202";
        $address_to = $infAlumno[5]; 
        $from_name = "ESCOM-IPN";
        $phpmailer = new PHPMailer();

        // ---------- datos de la cuenta de Gmail -------------------------------
        $phpmailer->Username = $email_user;
        $phpmailer->Password = $email_password; 
        //-----------------------------------------------------------------------
        $phpmailer->SMTPSecure = 'ssl';
        $phpmailer->Host = "smtp.gmail.com"; // GMail
        $phpmailer->Port = 465;
        $phpmailer->IsSMTP(); // use SMTP
        $phpmailer->SMTPAuth = true;

        $phpmailer->setFrom($phpmailer->Username,$from_name);
        $phpmailer->AddAddress($address_to);

        $phpmailer->Subject = $the_subject;	
        $phpmailer->Body .="<h1 style='color:#3498db;'>Hola $infAlumno[1]</h1>";
        $phpmailer->Body .= "<p>$txtIntroduccion</p>";
        $phpmailer->Body .= "<p>
        Boleta: $infAlumno[0] <br>
        Apellidos: $infAlumno[2] $infAlumno[3] <br>
        G&eacute;nero: $infAlumno[4] <br>
        Correo: $infAlumno[5] <br>
        Fecha de nacimiento: $cumple
        </p>";
        $phpmailer->IsHTML(true);

        if($phpmailer->Send()){
            header("location:./administracion.php");
        }else{
            echo "<p>ERROR. No se pudo enviar el correo. Favor de intentarlo nuevamente<br><a href='./administracion.php'>Regresar</a></p>";
        }
    }else{
        header("location:./administracion.php");
    }
?>