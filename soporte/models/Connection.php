<?php

//Create class Connectio
class Connection
{
	//Define attributes privates
	private $connection;
	private $result;
	private $credentialConnection = array('host'=>'localhost',
	                                     'user'=>'root',
	                                     'password'=>'',
	                                     'dbName'=>'cotizaciones');
	//Create method construct
	public function __construct()
	{
		$this->connection = new mysqli($this->credentialConnection['host'],
			                           $this->credentialConnection['user'],
			                           $this->credentialConnection['password'],
			                           $this->credentialConnection['dbName']);
	}

	//Create method for  do query
	public function querys($sql)
	{
		$this->result = $this->connection->query($sql);
		return $this->result;
	}

	//Create method for destroy variables
	public function __destruct()
	{
		unset($this->connection);
		unset($this->credentialConnection);
	}
}


 ?>