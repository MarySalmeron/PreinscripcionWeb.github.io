$(document).ready(function(){
   
    $("#formEditAlumno").validetta({
        echo:"pase formRegistro",
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                method:"POST",
                url:"./alumnoEditar_AX.php",
                data:$("#formEditAlumno").serialize(),
                cache:false,
                success:function(resp){
                    //console.log(resp);
                    //M.toast({html:resp});
                    var AX = JSON.parse(resp);
                    var titulo = "<h2>Gracias :)</h2>";
                    //M.toast({html:AX.msj,classes:'rounded'});
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        onDestroy:function(){
                            if(AX.cod == 0 || AX.cod == 2){
                                //location.reload();
                            }
                            if(AX.cod == 1){
                                //location.replace("./../../index.php");
                            }
                        }
                    });
                }
            });
        }
    });
      
      $("#formCambiarContrasena").validetta({
          bubblePosition: "bottom",
          bubbleGapTop: 10,
          bubbleGapLeft: -5,
          onValid:function(e){
              e.preventDefault();
              $.ajax({
                  url:"./alumnoContrasena_AX.php",
                  method:"POST",
                  data:$("#formCambiarContrasena").serialize(),
                  cache:false,
                  success:function(respAX){
                      var AX = JSON.parse(respAX);
                      var titulo = "<h2>Preinscripcion ESCOM</h2>";
                      $.alert({
                          title:titulo,
                          content:AX.msj,
                          icon:"fas fa-cogs fa-2x",
                          theme:"supervan",
                          onDestroy:function(){
                              location.reload();
                          }
                      });
                  }
              });
          }
      });
});


/*
$(document).ready(function(){
    
    var rango = [1993,2020];
    $('.datepicker').datepicker({
        format:"yyyy-mm-dd",
        autoClose:true,
        minDate:new Date(1993,0,1),
        maxDate:new Date(2020,11,31),
        yearRange:rango,
        i18n:{
            months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            monthsShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
            weekdays:["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],
            weekdaysShort:["Dom","Lun","Mar","Mie","Jue","Vie","Sab"],
            weekdaysAbbrev:["D","L","M","M","J","V","S"]
        }
    });

    $("#formEditAlumno").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./alumnoEditar_AX.php",
                method:"POST",
                data:$("#formEditAlumno").serialize(),
                cache:false,
                success:function(respAX){
                    var AX = JSON.parse(respAX);
                    var titulo = "<h2>Preinscripcion ESCOM</h2>";
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        onDestroy:function(){
                            //location.reload();
                        }
                    });
                }
            });
        }
    });

    $("#formCambiarContrasena").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./alumnoContrasena_AX.php",
                method:"POST",
                data:$("#formCambiarContrasena").serialize(),
                cache:false,
                success:function(respAX){
                    var AX = JSON.parse(respAX);
                    var titulo = "<h2>Preinscripcion ESCOM</h2>";
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        onDestroy:function(){
                            location.reload();
                        }
                    });
                }
            });
        }
    });
});*/