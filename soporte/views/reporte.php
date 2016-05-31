<?php
    require_once('models/ReporteModels.php');
    $reporteModels = new ReporteModels();
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
 ?>


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
			  foreach ($result as $value) {
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
		?>
		
					
	</table>
	
	</div>
	<div class="clearfix"></div>
	<ul class="pagination">
		
		    <?php 
		       $reporteModels->previous();
		       $reporteModels->numberPages();
		       $reporteModels->next();
		     ?>	
		
	</ul>
	