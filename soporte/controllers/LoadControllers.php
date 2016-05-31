<?php


//Create class LoadControllers
class LoadControllers
{
	
	//Create construct 
	public function __construct($view)
	{
      if(isset($view) and file_exists('controllers/' . $view . 'Controllers.php'))
      {
      	require_once('controllers/' . $view . 'Controllers.php');
      }
      else
      {
            require_once('controllers/ConsultaControllers.php');
      }
	}
}

?>