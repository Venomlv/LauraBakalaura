<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/Db.php');

class User
{
	public static function SignUp($email, $password)
	{
		$password = md5($password);
		
		$db = Db::getConnection();
		$sql = "INSERT INTO `users` (`uid`, `umail`, `upassword`) VALUES (NULL, '$email', '$password')";
		$db->query($sql);		
	}
	
	public static function CheckPassword($password)
	{
		if(strlen($password) >= 6) return true; else return false; 
	}
	
	public static function CheckEmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) return true; else return false;
	}
	
	public static function CheckExistEmail($email)
	{
		$db = Db::getConnection();
		$sql = "SELECT COUNT(*) FROM users WHERE umail = '$email'";
		$result = $db->query($sql);		
		$user = $result->fetch_assoc();
		
		return ($user['COUNT(*)'] > 0) ? (true) : (false);
	}
	
}