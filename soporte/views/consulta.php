<form method="post" action="">
<div class="container">
	<div class="row">
        <div class="col-md-11">
            <div id="custom-search-input">
                <div class="input-group col-sm-12 ">
                    <input name="txtName" type="text" class="form-control input-lg" placeholder="Buscar" required/>
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
	</div>
</div>
</form>
    
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>F.Creacion</th>
				<th>Asesor</th>
				<th>Sumar</th>
				<th>Gnero</th>
				<th>Edad</th>
				<th>Departamento</th>
				<th>Es 0 KM</th>
				<th>Modelo</th>
				<th>Clase</th>
				<th>Marca</th>
				<th>Referencia</th>
				<th>P.Fasecolda</th>
			</tr>
		</thead>
	<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
            require_once('models/ConsultaModels.php');
            $reporteModels = new ConsultaModels($_POST['txtName']);
            $numberPages = 1;
        if(isset($_GET["numPag"]))
	      {
		    $numberPages = $_GET["numPag"];
	      }
        else
          {
	        $namberPages = 1;
	      }
            $result = $reporteModels->pagination($numberPages);

      if($result->num_rows > 0)
      {
      	  
	    foreach ($result as $value)
	    {
	    ?>
		<tbody>
			<tr>
			 
				<td><?php echo $value['fechaCreacion']?></td>
				<td><?php echo $value['asesor']?></td>
				<td><?php echo $value['sumar']?></td>
				<td><?php echo $value['genero']?></td>
				<td><?php echo $value['edad']?></td>
				<td><?php echo $value['departamento']?></td>
				<td><?php echo $value['es0km']?></td>
				<td><?php echo $value['modelo']?></td>
				<td><?php echo $value['clase']?></td>
				<td><?php echo $value['marca']?></td>
				<td><?php echo $value['referencia']?></td>
                <td><?php echo $value['precioFasecolda']?></td>
                 
            </tr>
		</tbody>        
		<?php
		}

       } 
       else
       {
       	echo "<h2 style='text-align:center;'>No se encontro ningun registro</h2>";
       }   
		?>
		
		   
	<?php
	}	
	?>
					
	</table>
	
	</div>
	<?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
        ?>
           <div class="clearfix"></div>
	       <ul class="pagination">
		      <?php
		          $reporteModels->previous();
		          $reporteModels->numberPages();
		          $reporteModels->next();
		       ?>	
	       </ul>
	     <?php     
	      }
	      ?>
	       
    
	
