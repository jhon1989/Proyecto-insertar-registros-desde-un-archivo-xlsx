<?php
   
//Create class AutoLoad
class AutoLoad
{
	//Declare attributes private
	//private $path;
	//Create method construct
	public function __construct()
	{
		spl_autoload_register(function($file)
		{
			$path = 'controllers/' . $file . '.php';

			if(file_exists($path))
			{
				require_once($path);
			}
			
		});
	}
}

 ?>