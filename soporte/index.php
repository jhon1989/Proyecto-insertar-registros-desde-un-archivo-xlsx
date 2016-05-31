<!DOCTYPE html>
<html lang="es">
<head>
	<title>Prueba Basica Soporte</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="other/css.css">

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
    <!--Creamos tres paneles el panel-heading, panel-content y panel-footer -->
    <div class="container">

         <div class="alert alert-success" id="msg-succefull">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success!!</strong>   Operacion exitosa.
         </div>

    	<h2 style="text-align:center;">Reporte de Cotizaciones</h2>

    	<div class="panel panel-default">
    		<div class="panel-heading panel-primary">
                <ul class="list-unstyled list-inline">
                    <li><a href="index.php?view=Archivo">Caragr Archivo</a></li>
                    <li><a href="index.php?view=Reporte">Reporte</a></li>
                    <li><a href="index.php?view=Consulta">Buscar</a></li>
                    <li><a href="index.php?view=Estadisticas">Estadistica</a></li>
                </ul>  
            </div>
    		<div class="panel-body">

    			<!--Aqui llamamos al controlador para cargar las vistas correspondientes -->
    			<?php

                //Including class Autoload
                require_once('controllers/configuration/AutoLoad.php');
                new Autoload();

                //Instantiating class LoadController
                if(isset($_GET['view']) and !empty($_GET['view']))
                {
                     new LoadControllers($_GET['view']);
                }
                else
                {
                     require_once('controllers/ReporteControllers.php');
                }
               

    			 ?>

    		</div>
    		<div class="panel-footer">
    			
    		</div>
    	</div>
    </div>

</body>
</html>