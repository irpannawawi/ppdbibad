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
	// 		$host = 'localhost';
	// $user = 'liwvzvgu_ppdb';
	// $pass = 'liwvzvgu_ppdb';
	// $debe = 'liwvzvgu_ppdb';
		$this->host = 'localhost';
		$this->user = 'liwvzvgu_ppdb';
		$this->pass = 'liwvzvgu_ppdb';
		$this->database = 'liwvzvgu_ppdb';
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database) or die();
	}
}