$(document).ready(function(){
    $("#formIndex").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./pages/index_AX.php",
                method:"POST",
                data:$("#formIndex").serialize(),
                cache:false,
                success:function(respAX){
                    //Aquí llega la respuesta del servidor en formato JSON y no olvidemos que JSON NO hace nada, debemos convertirlo en algo que JS entienda y a partir de aquí acceder mediante notación punto o la que sea necesaría a toda la información disponible.
                    var AX = JSON.parse(respAX);
                    var titulo = "<h2>Preinscripcion ESCOM</h2>";
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        onDestroy:function(){
                            if(AX.val == 0){
                                //Significa que no se encontraron registros con los datos proporcionados, indicarlo al usuario y presentarle nuevamente el formulario para que lo intente nuevamente.
                                location.reload();
                            }
                            if(AX.val == 1){
                                //Significa que los datos fueron correctos, entonces indicarlo al usuario y en cuanto cierre el 'confirm' redireccionar automaticamete a la página exclusiva del alumno en cuestión.
                                location.replace("./pages/alumno/inicio.php");
                            }
                        }
                    });
                }
            });
        }
    });
    $("#formAdmin").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./index_AX.php",
                method:"POST",
                data:$("#formAdmin").serialize(),
                cache:false,
                success:function(respAX){
                    //Aquí llega la respuesta del servidor en formato JSON y no olvidemos que JSON NO hace nada, debemos convertirlo en algo que JS entienda y a partir de aquí acceder mediante notación punto o la que sea necesaría a toda la información disponible.
                    var AX = JSON.parse(respAX);
                    var titulo = "<h2>Preinscripcion ESCOM</h2>";
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        
                        onDestroy:function(){
                            console.info("Pase al inicio"+ AX.val);
                            if(AX.val == 0){
                                //Significa que no se encontraron registros con los datos proporcionados, indicarlo al usuario y presentarle nuevamente el formulario para que lo intente nuevamente.
                                location.reload();
                            }
                            if(AX.val == 1){
                                //Significa que los datos fueron correctos, entonces indicarlo al usuario y en cuanto cierre el 'confirm' redireccionar automaticamete a la página exclusiva del alumno en cuestión.
                                console.info("Pase al inicio");
                                location.replace("./inicio.php");
                            }
                        }
                    });
                }
            });
        }
    });
});