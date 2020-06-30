<?php

class DBConnection
{
	private string $host;
	private string $port;
	private string $dbname;
	private string $user;
	private string $password;
	public function __construct(string $host = 'localhost', string $port = '3308', string $dbname = 'suretranfer', string $user = 'root', string $password = '')
	{
		$this->host = $host;
		$this->port = $port;
		$this->dbname = $dbname;
		$this->user = $user;
		$this->password = $password;
	}

	public function setConnection(): PDO
	{
		//try {
		return new PDO("mysql:host=" . $this->host . ":" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->password);
		//} catch (PDOException $e) {
		//return null;
		//}
	}
}
