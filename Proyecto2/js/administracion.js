$(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();

    //Nos ayudamos del evento on() de jQuery  [https://www.w3schools.com/jquery/event_on.asp] ya que las clases '***Almn' se generan de forma dinámica y no están disponibles en primera instancia para el DOM de JS
    var boleta;
    $("main").on("click",".verAlmn",function(){
        boleta = $(this).attr("data-ver");
        var titulo = "<h2>Alumno</h2>";
        //En algunos casos podemos ahorrarnos algunas líneas de código haciendo uso de la posibilidad que desde el plugin de confirm.js se hgan peticiones AJAX
        $.confirm({
            title:titulo,
            content: "url:./administracionVer.php?boleta="+boleta,
            theme:"supervan",
            icon:"fas fa-eye fa-2x"
        });
    });

    $("main").on("click",".editarAlmn",function(){
        boleta = $(this).attr("data-editar");
        window.location.href = "./administracionEditar.php?boleta="+boleta;
        //alert("Editar - "+ boleta);
    });

    $("main").on("click",".eliminarAlmn",function(){
        boleta = $(this).attr("data-eliminar");
        var titulo = "<h2>Eliminado</h2>";
        $.confirm({
            title:titulo,
            content:"<h5>Est&aacute; seguro de eliminar el registro de la Boleta: "+boleta+"</h5>",
            theme:"supervan",
            icon:"fas fa-times",
            buttons:{
                Sí:function(){
                    $.alert({
                        title:titulo,
                        content: "url:./administracionEliminar_AX.php?boleta="+boleta,
                        theme:"supervan",
                        icon:"fas fa-times fa-2x",
                        onDestroy:function(){
                            location.reload();
                        }
                    });
                },
                No:function(){
                }
            }
        });
        //alert("Eliminar - "+ boleta);
    });

    $("main").on("click",".pdfAlmn",function(){
        boleta = $(this).attr("data-pdf");
        window.location.href = "./administracionPDF.php?boleta="+boleta;
    });

});