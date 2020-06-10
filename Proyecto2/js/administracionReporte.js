

    $(document).ready(function(){    
        var total = [{
            x: materiaX,
            y: estudiantesY,
            type: "bar"
        }];
    
        var primera = [{
            x: materia1X,
            y: estudiantes1Y,
            type: "bar"
        }];
    
        var recurse = [{
            x: materia2X,
            y: estudiantes2Y,
            type: "bar"
        }];
    
        var layout2 = {
            yaxis: {
                title: {
                  text: "Alumnos",
                  font: {
                    size: 12,
                    color: "#545454"
                  }
                }
            },
            height: 400
        };
    
        var config = {
            responsive: true
        };
    
        Plotly.newPlot("materiastotal",total,layout2,config);
        Plotly.newPlot("materiasprimera",primera,layout2,config);
        Plotly.newPlot("materiasrecurse",recurse,layout2,config);
      });