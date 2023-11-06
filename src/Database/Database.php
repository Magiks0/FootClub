<?php

namespace App\Database;

final readonly class Database
{
	
	public static function Connect(){
		try {
			$user = $_ENV['DB_USER']; // name of the user ie: lyceestvincent_csebts1g1 OR root
			$pass = $_ENV['DB_PASS']; // password of the user
			$dbName = $_ENV['DB_NAME'];
			$host = $_ENV['DB_HOST']; // name of the database
			$connexion = new \PDO("mysql:host=$host;dbname=$dbName;charset=UTF8", $user, $pass);
		} catch (\Exception $exception) {
			echo 'Erreur lors de la connexion à la base de données : ' . $exception->getMessage();
			exit;
		}
		return $connexion;
	}
}

?>