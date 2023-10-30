<?php

namespace App\Database;

final readonly class Database
{
	
	public static function Connect(){
		try {
			$user = 'root'; // name of the user ie: lyceestvincent_csebts1g1 OR root
			$pass = ''; // password of the user
			$dbName = 'footclub';
			$host = 'localhost'; // name of the database
			$connexion = new \PDO("mysql:host=$host;dbname=$dbName;charset=UTF8", $user, $pass);
		} catch (\Exception $exception) {
			echo 'Erreur lors de la connexion à la base de données : ' . $exception->getMessage();
			exit;
		}
		return $connexion;
	}
}

?>