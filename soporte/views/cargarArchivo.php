<!-- Creamos el foemulario para cargar el archivo xls -->
<form method="post" action=" " enctype="multipart/form-data">
  <div class="form-group col-sm-offset-3">
    <h3>Seleccione el archivo - Formato (Excel.xlsx)</h3>
  </div>
	<div class="form-group col-lg-12 colo-sm-4 col-md-6 col-md-offset-3">
		<input type="file" name="excel" class="form-control" required>
	</div>
	<div class="form-group col-lg-12 col-md-4 col-sm-4 col-md-offset-3">
		<button type="submit" class="btn btn-primary">Cargar Archivo</button>
	</div>
</form>

<?php 
    //Verify if the button was pressed
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

      //WE include the class to load excel data
       require_once ("./Classes/PHPExcel/IOFactory.php");  

       //We include the class Connection
       require_once('./models/Connection.php');
       $connection = new Connection();
       

       $objPHPExcel = PHPExcel_IOFactory::load(($_FILES['excel']['tmp_name']));  
      
       //We peruse the rows and columns to extract data
       foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
      {  
          $highestRow = $worksheet->getHighestRow();  

          for ($row=2; $row<=$highestRow; $row++)  
          {  
           
              $fechaCreacion = $worksheet->getCellByColumnAndRow(0, $row)->getValue(); 
              $timeStamp = PHPExcel_Shared_Date::ExcelToPHP($fechaCreacion);
              $fechaPhp = date('Y-m-d', $timeStamp);

              $asesor = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
              $sumar = $worksheet->getCellByColumnAndRow(2, $row)->getValue();  
              $genero = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
              $edad = $worksheet->getCellByColumnAndRow(4, $row)->getValue();  
              $departamento = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
              $es0km = $worksheet->getCellByColumnAndRow(6, $row)->getValue();  
              $modelo = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
              $clase = $worksheet->getCellByColumnAndRow(8, $row)->getValue();  
              $marca = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
              $referencia = $worksheet->getCellByColumnAndRow(10, $row)->getValue();  
              $precioFasecolda = $worksheet->getCellByColumnAndRow(11, $row)->getValue();


               $sql = "INSERT INTO cotizaciones(fechaCreacion, asesor, sumar, genero, edad, departamento, es0km, modelo, clase, marca, referencia, precioFasecolda)
               VALUES ('".$fechaPhp."', '".$asesor."', '".$sumar."', '".$genero."',
                '".$edad."', '".$departamento."', '".$es0km."', '".$modelo."', '".$clase."',
                '".$marca."', '".$referencia."', '".$precioFasecolda."')"; 

             
               if($connection->querys($sql))
               {
                  echo "<script type='text/javascript'>
                  document.getElementById('msg-succefull').style.display ='block';
                  </script>";
               }
        
          }  
      }  
    }
?>