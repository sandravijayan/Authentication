<?php
class DbConnect {

	function __construct() {
		$this->dbconnect();
	}

	/**
	 * function for database connection.
	 *
	 * @return $conn
	 * @throws \Exception
	 */
	function dbconnect() {
		try {
			//configuration data for connection
			$host = 'localhost';
			$username = 'root';
			$password = '';
			$db = 'db_user';
			$dsn = "mysql:host=$host;dbname=$db";
			// create a PDO connection with the configuration data
			$conn = new PDO($dsn, $username, $password);
			return $conn;
			// $stm = $conn->query("SELECT * fROM user");

			// $version = $stm->fetch();
			// print_r($version);
			// print_r($conn);die("sdfsdfsdf");
			// check connection is extablished or not
			if ($conn) {
				return $conn;
			} else {
				die("Connection Error.");
			}
		} catch (PDOException $e) {
			// report error message
			echo $e->getMessage();
		}
	}
}