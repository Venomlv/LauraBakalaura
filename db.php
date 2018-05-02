<?php

class Db
{
	public static function getConnection()
	{
		echo "<meta charset='utf-8'>";

		$dblocation = 'localhost';
		$dbuser = 'root';
		$dbpassword = "";
		$dbname = "rozes";

		$conn = new mysqli($dblocation, $dbuser, $dbpassword, $dbname);
		$conn->set_charset("utf8");
		
		return $conn;
	}
}