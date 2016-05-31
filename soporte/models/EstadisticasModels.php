<?php 

//Create clas EstadisticasModels
class EstadisticasModels
{
			//Declare atributes
	private $fecha1;
	private $fecha2;
	private $sumaValor;
	private $connection;
	private $valleCauca = array('Valle del cauca');
	private $santander = array('Santander');
	private $atlantico = array('Atlantico');
	private $antioquia = array('Antioquia');
	private $bogota = array('Bogota');
	private $boyaca = array('Boyaca');
	private $norteSantander = array('N. Santander');
	private $cesar = array('Cesar');
	private $bolivar = array('Bolivar');
	private $narino = array('Narino');
	private $meta = array('Meta');
	private $huila = array('Huila');
	private $cundinamarca = array('Cundinamarca');
	private $risaralda = array('Risaralda');
	private $casanare = array('Casanare');
	private $tolima = array('Tolima');
	private $cordoba = array('Cordoba');
	private $magdalena = array('Magdalena');
	private $sucre = array('Sucre');
	private $cauca = array('Cauca');
	private $quindio = array('Quindio');
	private $guajira = array('La guajira');
	private $caqueta = array('Caqueta');
	private $putumayo = array('Putumayo');
	private $caldas = array('Caldas');
	private $bucaramanga = array('Bucaramanga');
	private $atlantico1 = array('Atlantico');

	//Create method estadisticas
	public function estadisticas($fecha1, $fecha2)
	{
		require_once('Connection.php');
								$this->connection = new Connection();
								$this->fecha1 = $fecha1;
								$this->fecha2 = $fecha2;

		$departamentos = array('DEPARTAMENTO');
					$departamentos[] = "Cotizaciones de  $this->fecha1 a $this->fecha2";
								
								//Create qurys for bring the records
					$consulta = "SELECT departamento, COUNT(departamento) as total FROM cotizaciones
					WHERE fechaCreacion BETWEEN '{$this->fecha1}' AND  '{$this->fecha2}'  GROUP BY departamento HAVING COUNT(departamento) > 1";

							//Validate if the query is rnu
				if($result = $this->connection->querys($consulta))
				{
									if($result->num_rows > 0)
												{
															while($fila = $result->fetch_array())
																{ 
																				//switch por validate department
																	switch ($fila['departamento'])
																	{
																	case '5-Antioquia':
																						$this->antioquia[] = (double)$fila['total'];
																						break;
																			case '11-Bogota':
																							$this->bogota[] = (double)$fila['total'];
																							break; 
																		case  '0-Atlantico':    
																								$this->atlantico[] = (double)$fila['total'];
																								break;
																		case  '76-Valle del cauca':    
																								$this->valleCauca[] = (double)$fila['total'];
																								break;  
																		case  '68-Santander':    
																								$this->santander[] = (double)$fila['total'];
																								break;  
																		case  '15-Boyaca':    
																								$this->boyaca[] = (double)$fila['total'];
																								break;   
																		case  '54-N. De santander':
																		case  '54-NORTE SANTANDER':  
																								$this->sumaValor += (double)$fila['total'];
																								break;  
																		case  '20-Cesar':  
																								$this->cesar[] = (double)$fila['total'];
																								break;
																		case  '13-Bolivar':  
																								$this->bolivar[] = (double)$fila['total'];
																								break; 
																		case  '52-Narino':  
																								$this->narino[] = (double)$fila['total'];
																								break;
																		case  '50-Meta':  
																								$this->meta[] = (double)$fila['total'];
																								break;
																		case  '41-Huila':  
																								$this->huila[] = (double)$fila['total'];
																								break; 
																		case  '25-Cundinamarca':  
																								$this->cundinamarca[] = (double)$fila['total'];
																								break; 
																		case  '66-Risaralda':  
																								$this->risaralda[] = (double)$fila['total'];
																								break;
																		case  '85-Casanare':  
																								$this->casanare[] = (double)$fila['total'];
																								break; 
																		case  '73-Tolima':  
																								$this->tolima[] = (double)$fila['total'];
																								break;
																		case  '23-Cordoba':  
																								$this->cordoba[] = (double)$fila['total'];
																								break;
																		case  '47-Magdalena':  
																								$this->magdalena[] = (double)$fila['total'];
																								break; 
																		case  '70-Sucre':  
																								$this->sucre[] = (double)$fila['total'];
																								break; 
																		case  '19-Cauca':  
																								$this->cauca[] = (double)$fila['total'];
																								break; 
																		case  '63-Quindio':  
																								$this->quindio[] = (double)$fila['total'];
																								break; 
																		case  '44-La guajira':  
																								$this->guajira[] = (double)$fila['total'];
																								break;
																		case  '18-Caqueta':  
																								$this->caqueta[] = (double)$fila['total'];
																								break; 
																		case  '86-Putumayo':  
																								$this->putumayo[] = (double)$fila['total'];
																								break;
																		case  '17-Caldas':  
																								$this->caldas[] = (double)$fila['total'];
																								break;
																		case  '47-Magdalena':  
																								$this->bucaramanga[] = (double)$fila['total'];
																								break; 
																		case  '8-Atlantico':  
																								$this->atlantico1[] = (double)$fila['total'];
																								break;                                                                                               
														}                
													}
																												$this->norteSantander[] = $this->sumaValor;
									}
									else
												{
													echo '0';
												}
								}
				//Send data in JSON format   
	echo json_encode(array($departamentos,$this->antioquia, $this->bogota,$this->atlantico, $this->valleCauca, $this->santander,  $this->boyaca, $this->norteSantander, $this->cesar, $this->narino, $this->bolivar, $this->meta, $this->huila, $this->cundinamarca,
		$this->risaralda, $this->casanare, $this->tolima, $this->cordoba, $this->magdalena, $this->sucre,
			$this->cauca,
			$this->atlantico1, $this->quindio, $this->guajira, $this->caqueta, $this->putumayo, $this->caldas) );

	}

}

//Instantiate class EstadisticasModels
	   $estadisticasModels = new EstadisticasModels();
				$estadisticasModels->estadisticas($_POST['fecha1'], $_POST['fecha2']);
	
?>