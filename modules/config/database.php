<?php

/**
 * 
 */
class Database
{
	private $host;
	private $user;
	private $pass;
	private $database;
	public $conn;
	function __construct()
	{
		$this->host = 'localhost';
		$this->user = 'root';
		$this->pass = '';
		$this->database = 'ppdbibad';
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database) or die();
	}
}