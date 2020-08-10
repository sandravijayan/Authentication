<?php
require_once 'DbConnect.php';
session_start();

class AuthFunction {

	private $db;

	function __construct() {
		// connecting to the database
		$conn = new DbConnect();
		$this->db = $conn->dbconnect();

	}

	/**
	 * function for user registration
	 * @param string $email, $firstname, $lastname, $password, $dob
	 * @return $query
	 * @throws \Exception
	 */
	public function userRegister($email, $firstname, $lastname, $password, $dob) {
		try {
			$query = $this->db->query(sprintf("INSERT INTO user(email, first_name, last_name, password, dob) values('%s','%s','%s','%s','%s')", $email, $firstname, $lastname, md5($password), $dob)) or die(mysql_error());
			return $query;
		} catch (\Exception $e) {
			return $e->getMessage();
		}
	}

	/**
	 * function for login.
	 * @param string $email, $password
	 * @return boolean
	 * @throws \Exception
	 */
	public function login($email, $password) {

		try {
			$stmt = $this->db->query(sprintf("SELECT * FROM user WHERE email = '%s' AND password = '%s'", $email, md5($password)));

			$user_data = $stmt->fetch();

			//get the number of rows return
			if (!empty($user_data)) {
				$_SESSION['login'] = true;
				$_SESSION['uid'] = $user_data['user_id'];
				$_SESSION['name'] = $user_data['first_name'] . ' ' . $user_data['last_name'];
				$_SESSION['email'] = $user_data['email'];
				return TRUE;
			} else {
				return FALSE;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	/**
	 * function for login.
	 * @param string $email
	 * @return boolean
	 * @throws \Exception
	 */
	public function isUserExist($email) {

		try {
			$stmt = $this->db->query(sprintf("SELECT * FROM user WHERE email = '%s'", $email));
			//get the number of rows returned
			$user = $stmt->fetch();

			if ($user > 0) {
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}