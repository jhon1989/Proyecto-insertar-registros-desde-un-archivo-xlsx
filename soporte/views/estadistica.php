<script type="text/javascript">
    //Declare variables
  $(document).ready(function(){
      
    $("#grafica").submit(function(){

        var date1, date2, param;
       
        date1 = $("#txtFecha1").val();
        date2 =  $("#txtFecha2").val();
         param = {fecha1: date1, fecha2:date2};
        //Send request whit ajax for bring data
    	   var datos = $.ajax({ 
         headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
           },
    		data:param,
    		url:'./models/EstadisticasModels.php',
    		type:'post',
    		dataType:'json',
    		async:false
    	}).responseText;

    	datos = JSON.parse(datos);
    	google.load("visualization", "1", {packages:["corechart"]});
      	google.setOnLoadCallback(dibujarGrafico);

      	function dibujarGrafico() {
        	var data = google.visualization.arrayToDataTable(datos);

        	var options = {
          	title: 'COTIZACIONES POR DEPARTAMENTO',
          	hAxis: {title: 'DEPARTAMENTOS', titleTextStyle: {color: 'green'}},
          	vAxis: {title: 'TOTAL COTIZACIONES', titleTextStyle: {color: '#FF0000'}},
          	backgroundColor:'#ffffcc',
          	legend:{position: 'bottom', textStyle: {color: 'blue', fontSize: 13}},
          	width:880,
            height:500
        	};

        	var grafico = new google.visualization.ColumnChart(document.getElementById('grafica'));
        	grafico.draw(data, options);
      	  } 
    });      

  });

      </script>


<form method="POST" id="grafica">
    <div class="row col-md-offset-2">
        <div class="form-group col-md-4">
   	      <input type="date" name="txtFecha1" id="txtFecha1" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
   	      <input type="date" name="txtFecha2" id="txtFecha2" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
          <button type="submit" class="btn btn-primary">Buscar</button> 
        </div>
    </div>   
</form> 
<div class="container">
	<div id="grafica" class="span3 col-md-offset2"></div>
</div>


  