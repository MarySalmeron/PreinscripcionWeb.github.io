$(document).ready(function(){
    //alert("Si recibe");
    
    datosX=crearGrafica('<?php echo $datosX ?>');
    datosY=crearGrafica('<?php echo $datosY ?>');
    var total={
        x: datosX,
        y: datosY,
        type:'scatter'
    };
    var data = [total];
    Plotly.newPlot("materiastotal",data);
});