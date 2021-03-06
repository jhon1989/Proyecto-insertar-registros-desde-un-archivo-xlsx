<?php
//Create class ReporteModel
class ReporteModels
{
	//Declare attributes privates and public
	private $connection;
	private $result;
	private $numberRecords;
	private $records;
	private $page;
	private $start;
	private $resultPagination;
	private $pages;
	private $numPage;
	private $contadorPaginas = 10;

	//Create method report
	public function __construct()
	{
		//We include the class Connection
		require_once('./models/Connection.php');
        $this->connection = new Connection();

        if($this->result = $this->connection->querys("SELECT * FROM cotizaciones"))
        {
        	if($this->result->num_rows > 0)
            {
        	   $this->numberRecords = $this->result->num_rows;
            }
        }   
	}

	public function pagination($nPages)
	{
		//Create pagination
        $this->page = $this->numPage = $nPages;
        $this->records = 5;
        //Validate that this page user
        if(is_numeric($this->page))
        {
           $this->start = (($this->page - 1) * $this->records);
        }
        else
        {
        	$this->start = 0;
        }

        $this->resultPagination = $this->connection->querys("SELECT * FROM cotizaciones LIMIT $this->start, $this->records");
       
        return $this->resultPagination;
	}

	//Create number pages
	public function numberPages()
	{
		$this->pages = ceil($this->numberRecords / $this->records);
		$maximoPages = $this->page;

		if($this->pages > $this->contadorPaginas and $this->resultPagination->num_rows > 0)
		{
			$this->contadorPaginas = $maximoPages + $this->contadorPaginas;
		}

        for ($i= $maximoPages; $i <=  $this->contadorPaginas; $i++) 
        { 
        	
        	   if($i == $this->page)
        	     {
        		    echo "<li class='active'><a href='index.php?numPag=" . $i . "' > $i </a></li> ";
        	     }
        	     else
        	     {
        		    echo "<li><a href='index.php?numPag=" . $i . "' > $i </a></li>  ";
        	     }
        	
        }
       
	}

	//Create method for button previous
	public function previous()
	{
		if($this->page > 1)
		{
			echo "<li><a href='index.php?numPag=" . ($this->page - 1) . "' > Anterior</a></li>  ";
		}
	}
	//Create method for button previous
	public function next()
	{
		if($this->page < $this->pages)
		{
			echo "<li><a href='index.php?numPag=" . ($this->page + 1) . "' > Siguiente</a></li>  ";
		}
	}
	
	//Create method destruct
	public function __destruct()
	{
       unset($this->connection);
	   unset($this->result);
	   unset($this->numberRecords);
	   unset($this->records);
	   unset($this->page);
	   unset($this->start);
	   unset($this->resultPagination);
	   unset($this->pages);
	   unset($this->numPage);
	   unset($this->contadorPaginas);
	}
}


 ?>