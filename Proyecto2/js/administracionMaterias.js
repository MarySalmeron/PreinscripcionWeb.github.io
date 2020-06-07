$(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();

    //Nos ayudamos del evento on() de jQuery  [https://www.w3schools.com/jquery/event_on.asp] ya que las clases '***Almn' se generan de forma dinámica y no están disponibles en primera instancia para el DOM de JS
    var materia;
    
    $("main").on("click",".verMat",function(){
        materia = $(this).attr("data-ver");
        
        var titulo = "<h2>Materia</h2>";
        //En algunos casos podemos ahorrarnos algunas líneas de código haciendo uso de la posibilidad que desde el plugin de confirm.js se hgan peticiones AJAX
        $.confirm({
            title:titulo,
            content: "url:./verMateria.php?nombre="+materia,
            theme:"supervan",
            icon:"fas fa-eye fa-2x"
        });
    });

    $("main").on("click",".pdfMat",function(){
        materia = $(this).attr("data-pdf");
        window.location.href = "./pdfMateria.php?nombre="+materia;
    });
    
});