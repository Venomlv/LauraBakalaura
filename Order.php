<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/Db.php');

class Order
{
	public static function isOrdered($id, $uid)
	{
		$db = Db::getConnection();
		$sql = "SELECT oid FROM orders WHERE tid = $id AND uid = $uid";
		$result = $db->query($sql);		
		$order = $result->fetch_assoc();
		
		return $order ? (true) : (false);
	}
	
	public static function DoneOrder($id, $uid)
	{
		$db = Db::getConnection();
		$sql = "INSERT INTO orders (oid,uid,tid) VALUES (NULL, '$uid', '$id')";
		$result = $db->query($sql);		
	}

}