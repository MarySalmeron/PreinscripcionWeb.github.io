$(document).ready(function(){
    $('select').formSelect();
 
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

    $("#formRegistro").validetta({
        echo:"pase formRegistro",
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                method:"POST",
                url:"./registro_AX.php",
                data:$("#formRegistro").serialize(),
                cache:false,
                success:function(resp){
                    var AX = JSON.parse(resp);
                    var titulo = "<h2>Registro</h2>";
                    //M.toast({html:AX.msj,classes:'rounded'});
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        onDestroy:function(){
                            if(AX.cod == 0 || AX.cod == 2){
                                location.reload();
                            }
                            if(AX.cod == 1){
                                location.replace("./../../index.php");
                            }
                        }
                    });
                }
            });
        }
    });
   
});