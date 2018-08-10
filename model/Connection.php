<?php

class Connection
{

	protected function dbConnect()
		{
			try
			{
				$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				return $db;
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
		}
}