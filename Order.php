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
	
	public static function GetBasket($uid)
	{
		$db = Db::getConnection();
		$sql = "SELECT rid,rnamelv,rnameru,rprice FROM orders, roses WHERE tid = rid AND uid = $uid";
		$result = $db->query($sql);		
		
		return $result;
	}
	
	public static function DeleteItem($id, $uid)
	{
		$db = Db::getConnection();
		$sql = "DELETE FROM orders WHERE tid = $id AND uid = $uid";
		$result = $db->query($sql);
	}
	
	public static function ClearBasket($uid)
	{
		$db = Db::getConnection();
		$sql = "DELETE FROM orders WHERE uid = $uid";
		$result = $db->query($sql);
	}
}